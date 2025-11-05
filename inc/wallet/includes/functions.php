<?php

use PKPass\PKPass;

function add_pkpass_metabox()
{
	add_meta_box(
		'pkpass_download',
		'PKPASS',
		'add_pkpass_metabox_cb',
		['managements'], // для записей и страниц
		'side',
		'default'
	);
}

function add_pkpass_metabox_cb()
{
	?>
		<div style="padding: 10px 0;">
			<a href="<?= add_query_arg(['action' => 'geffen_pkpass_download', 'id' => get_the_ID()], admin_url('admin-post.php')) ?>" class="button button-primary button-large">Download</a>
		</div>
        <div id="geffen_pkpass_email" style="padding: 10px 0;">
            <p class="post-attributes-label-wrapper">
                <label class="post-attributes-label" for="geffen_pkpass_email_input">Email</label>
            </p>
            <p>
                <input style="width: 100%;" type="text" size="4" id="geffen_pkpass_email_input" value="">
            </p>
            <input type="hidden" id="pass_post_id" value="<?= get_the_ID(); ?>">
            <button type="button" class="button button-primary button-large">Send</button>
        </div>
	<?php
}

function geffen_option_field_render($val)
{
	?>
    <input
            type="<?= $val['type'] ?>"
            name="<?= $val['option_name'] ?>"
            id="<?= $val['id'] ?>"
            value="<?= esc_attr( get_option($val['option_name']) ) ?>"
    />
	<?php
}

function geffen_pkpass_download()
{
	geffen_pkpass_generate($_REQUEST['id'], true);
}

function ajax_geffen_send_pkpass()
{
    //check_ajax_referer('geffen_pkpass_send', 'secure');

    if(!isset($_REQUEST['id'])) {
        wp_send_json_error(['message' => 'No ID']);
    }

	if(!isset($_REQUEST['email']) || !is_email($_REQUEST['email'])) {
		wp_send_json_error(['message' => 'Wrong email']);
	}

    $file = geffen_pkpass_generate($_REQUEST['id'], false);

	$tempdir =  get_template_directory() . '/inc/wallet/tmp';

	if (!is_dir($tempdir)) {
		if (!mkdir($tempdir, 0755, false)) {
			wp_send_json_error(['message' => 'Temp dir error']);
		}
	}

	$filepath = $tempdir . '/pass.pkpass';

	if($file) {
	    file_put_contents($filepath, $file);
    }

	if(!file_exists($filepath)) {
		wp_send_json_error(['message' => 'Something went wrong']);
    }

	$to = $_REQUEST['email'];
	$subject = 'Your pass';
	$body = 'Pass attached';
	$attachments = $filepath;

	$sent = wp_mail($to, $subject, $body, '', $attachments);
	unlink($filepath);
	if($sent) {
		wp_send_json_success();
    }

	wp_send_json_error(['message' => 'Something went wrong']);
}

function geffen_pkpass_generate($id, $output = false) {
    $cert_pass = get_option('geffen_cert_pass');
    $type_identifier = get_option('geffen_pass_type_identifier');
    $team_id = get_option('geffen_team_id');

    if(in_array(true, [empty($cert_pass), empty($type_identifier), empty($team_id)])) {
        return new WP_Error('absent_credentials');
    }

    $name = get_the_title($id);
    $position = get_field('subtitle', $id);
    $email = get_field('e-mail', $id);
    $phone = get_field('phone', $id);
    $thumbnail = geffen_get_thumbnail_for_pkpass($id);
    $url = get_permalink($id);
    $icon = get_template_directory() . '/inc/wallet/images/icon.png';
    $icon2 = get_template_directory() . '/inc/wallet/images/icon@2x.png';
    $logo = get_template_directory() . '/inc/wallet/images/logo.png';

	$pass = new PKPass(GEFFEN_CERT_FILE, $cert_pass);

	$pass->setData('{
    "passTypeIdentifier": "' . $type_identifier . '",
	"formatVersion": 1,
	"organizationName": "Geffen Medical",
	"teamIdentifier": "' . $team_id . '",
	"serialNumber": "' . $id . '",
	"backgroundColor": "rgb(255,255,255)",
	"foregroundColor": "rgb(10,59,100)",
	"labelColor": "rgb(10,59,100)",
	"logoText": "Geffen Medical",
	"description": "Geffen Medical personal pass",
	"eventTicket": {
        "primaryFields": [
             {
                "key": "name",
                "label": "",
                "value": "' . $name .  '",
                "textAlignment": "PKTextAlignmentCenter"
            },
        ],
        "secondaryFields": [
            {
                "key": "position",
                "label": "",
                "value": "' . $position . '",
                "textAlignment": "PKTextAlignmentCenter"
            },
        ],
        "auxiliaryFields": [
            {
                "key": "phone",
                "label": "",
                "value": "' . $phone . '"
            },
            {
                "key": "email",
                "label": "",
                "value": "' . $email . '"
            }
        ]
    },
    "barcode": {
        "format": "PKBarcodeFormatQR",
        "message": "' . $url . '",
        "messageEncoding": "iso-8859-1"
    }
    }');


	$pass->addFile($icon);
	$pass->addFile($icon2);
	$pass->addFile($logo);

	if($thumbnail){
	    $pass->addFile($thumbnail['filename'], 'thumbnail.' . $thumbnail['ext']);
    }

	return $pass->create($output);
}

function geffen_get_thumbnail_for_pkpass($id, $size = 'thumbnail')
{
	$image = get_field('image', $id);

	if( ! $image ) {
	    return null;
    }

	$image_metadata = wp_get_attachment_metadata($image);

	if(!$image_metadata) {
	    return null;
    }

	if(!isset($image_metadata['sizes'][$size]['file'])) {
	    return null;
    }

	$file_name = $image_metadata['sizes'][$size]['file'];

	if(!$file_name) {
	    return null;
    }

	$uploads_dir = wp_upload_dir();
	$uploads_base_dir = $uploads_dir['basedir'];

	$full_file_path = $uploads_base_dir . '/' . dirname($image_metadata['file']) . '/' . $file_name;

	return file_exists($full_file_path) ? ['filename' => $full_file_path, 'ext' => $ext = pathinfo($file_name, PATHINFO_EXTENSION)] : null;
}


function geffen_pkpass_admin_script() {
	global $post_type;
	if( 'managements' === $post_type ) {
		wp_enqueue_script( 'geffen-pkpass-admin-script', get_template_directory_uri() . '/inc/wallet/js/script.js', ['jquery'] );
	}
}