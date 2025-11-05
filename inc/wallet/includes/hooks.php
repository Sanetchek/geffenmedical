<?php

add_action( 'add_meta_boxes', 'add_pkpass_metabox' );

add_action('admin_post_geffen_pkpass_download', 'geffen_pkpass_download');


add_action('admin_menu', function (){
	$options = [
		'geffen_cert_pass' => [
			'title' => 'Certificate password',
			'type'  => 'password'
		],
		'geffen_pass_type_identifier' => [
			'title' => 'Pass type identifier',
			'type'  => 'text'
		],
		'geffen_team_id' => [
			'title' => 'Team ID',
			'type'  => 'text',
		]
	];

	foreach ($options as $option => $optionSettings) {
		register_setting( 'general', $option );

		add_settings_field(
			$option,
			$optionSettings['title'],
			'geffen_option_field_render',
			'general',
			'default',
			[
				'id' => $option . '_id',
				'option_name' => $option,
				'type' => $optionSettings['type'],
			]
		);
	}
});

add_action( 'admin_print_scripts-post-new.php', 'geffen_pkpass_admin_script', 11 );
add_action( 'admin_print_scripts-post.php', 'geffen_pkpass_admin_script', 11 );

add_action('wp_ajax_geffen_pkpass_send', 'ajax_geffen_send_pkpass');