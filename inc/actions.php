<?php

/**
 * Allow SVG
 */
add_action('upload_mimes', function ($mimes) {
    $mimes['svg-xml'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

function add_gtm_to_head()
{

    $user_id = get_current_user_id();
    if ($user_id > 0) { ?>
    <script>
    window.dataLayer = window.dataLayer || [];
    dataLayer.push({
    'event': 'logged_in',
    'user_id': <?php echo json_encode($user_id); ?>
    });
    </script>
    <?php } ?>
    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NG8M37B');
    </script>
    <!-- End Google Tag Manager -->
    <?php
}
add_action('wp_head', 'add_gtm_to_head', 1);

function my_custom_script()
{
    // Enqueue your script
    ?>
<!-- Start of Glassix Chat Widget -->
<script>
var widgetOptions = {
  apiKey: "4ca25874-d24f-4128-9009-4a4fddc8c927",
  snippetId: "u2E834u4ZVI57Ol9gnOM"
};

(function(n) {
  var u = function() {
      GlassixWidgetClient && typeof GlassixWidgetClient == "function" ? (window.widgetClient =
        new GlassixWidgetClient(n), widgetClient.attach(), window.glassixWidgetScriptLoaded && window
        .glassixWidgetScriptLoaded()) : f()
    },
    f = function() {
      r.src = "https://cdn.glassix.net/clients/widget.1.2.min.js";
      r.onload = u;
      document.body.removeChild(t);
      i.parentNode.insertBefore(r, i)
    },
    i = document.getElementsByTagName("script")[0],
    t = document.createElement("script"),
    r;
  (t.async = !0, t.type = "text/javascript", t.crossorigin = "anonymous", t.id = "glassix-widget-script", r = t
    .cloneNode(), t.onload = u, t.src = "https://cdn.glassix.com/clients/widget.1.2.min.js", !document.getElementById(
      t.id) && document.body) && (i.parentNode.insertBefore(t, i), t.onerror = f)
})(widgetOptions)
</script>
<!-- End of Glassix Chat Widget -->
<?php
}
add_action('wp_footer', 'my_custom_script');

// Define a new function to send purchase event when an order is placed.
function send_purchase_event($order_id)
{
    // If there is no order ID, exit the function.
    if (!$order_id)
        return;

    // Check if the code has already been executed for this order.
    $order_data_sent = get_post_meta($order_id, 'order_data_sent', true);
    if ($order_data_sent)
        return;

    // Get the order using the order ID.
    $order = wc_get_order($order_id);

    // Get the items in the order.
    $items = $order->get_items();

    // Initialize an empty array to hold items for the dataLayer.
    $dataLayer_items = [];

    // Loop over each item in the order.
    foreach ($items as $item) {
        // Get the WC_Product object from the item.
        $product = $item->get_product();

        // Add item details to the dataLayer items array.
        $dataLayer_items[] = [
            'item_name' => $product->get_title(), // The product title.
            'item_id' => strval($product->get_id()), // The product ID.
            'price' => $product->get_price(), // The product price.
            'currency' => 'ILS',
            'item_category' => strip_tags(wc_get_product_category_list($product->get_id())), // The product category.
            'quantity' => $item->get_quantity() // The quantity of the product in the order.
        ];
    }

    // Define the data to be pushed to the dataLayer.
    $data = [
        'event' => 'purchase', // The event name.
        'user_id' => strval($order->get_user_id()), // The user ID.
        'email' => $order->get_billing_email(), // The billing email address.
        'phone' => $order->get_billing_phone(), // The billing phone number.
        'first_name' => $order->get_billing_first_name(), // The billing first name.
        'last_name' => $order->get_billing_last_name(), // The billing last name.
        'address' => $order->get_billing_address_1(), // The billing address.
        'city' => $order->get_billing_city(), // The billing city.
        'state' => $order->get_billing_state(), // The billing state.
        'country' => $order->get_billing_country(), // The billing country.
        'zip' => $order->get_billing_postcode(), // The billing zip code.
        'ecommerce' => [ // Ecommerce data.
            'currency' => 'ILS', // The currency code.
            'value' => $order->get_total(), // The total order value.
            'tax' => $order->get_total_tax(), // The total tax value.
            'shipping' => $order->get_shipping_total(), // The total shipping cost.
            'transaction_id' => $order->get_order_number(), // The order number.
            'coupon' => implode(', ', $order->get_coupon_codes()), // The coupons used in the order.
            'items' => $dataLayer_items // The items in the order.
        ],
    ];

    $json = json_encode($data);

    // Print the JavaScript code to push the data to the dataLayer.
    echo '<script>
        window.dataLayer = window.dataLayer || [];
        dataLayer.push(' . $json . ');
    </script>';

    // Update the post meta to indicate that the code has been executed for this order.
    update_post_meta($order_id, 'order_data_sent', true);
}

/**
 * Send email Coupon if user buy one of the chosen product
 */
function send_coupon_chosen_product( $order_id, $item_id_array )
{
    $chosen_id = get_field('product', 'option');

    if ($chosen_id) {
        $coupon_type = get_field('coupon_type', 'option');

        // Get current user's email
        $current_user = wp_get_current_user();
        $email = $current_user->user_email;
        $phone_number = $current_user->geffen_phone;

        // Ensure $item_id_array is an array before looping through it
        if (is_array($item_id_array) && !empty($item_id_array)) {
            // Loop through the order array
            foreach ($item_id_array as $productId) {
                // Check if the product ID exists in the chosen IDs array
                if ($productId == $chosen_id) {

                    // Send request to Active Trails
                    $first_name = $current_user->first_name;
                    $last_name = $current_user->last_name;

                    $active_trails = post_active_trails($first_name, $last_name, $email, $phone_number);

                    $coupons = coupon_query($coupon_type);

                    if ($coupons && !check_coupon_exists_for_order( $order_id )) {
                        $coupon = $coupons[0];  // Get the first (and only) post in the array

                        // Get the post title
                        $coupon_code = get_the_title($coupon);

                        // Send email or perform any action
                        $subject = 'לרוכשים חיישן פריסטייל ליברה 2' . ' ' . 'הטבה במרכז הרפואי  DMC';

                        // HTML message
                        $message = coupon_email_message($coupon_code, $coupon_type);

                        // Set content-type header for HTML email
                        $headers = get_header_for_email(); // return array with headers option
                        $headers[] = 'Bcc: shira.marton@geffenmedical.com';

                        // Send email using wp_mail function
                        $mail = wp_mail($email, $subject, $message, $headers);

                        $date = date('d-m-Y');
                        $response = dmc_sms($phone_number, $coupon_code, $coupon_type, $date);

                        if ($mail) {
                            // Get the post ID
                            $coupon_id = $coupon->ID;

                            // Update coupon date when it is sent
                            $is_date_updated = update_post_date_to_today($coupon_id); // return bool

                            // Update the meta field '_coupon_used' to 'on'
                            update_post_meta($coupon_id, '_coupon_used', 'on');

                            // Update the meta field '_coupon_order_id' with the order ID
                            update_post_meta($coupon_id, '_coupon_order_id', $order_id);
                        }

                        // Once a match is found, exit the loop
                        break;
                    }
                }
            }
        } else {
            // Handle the case when $item_id_array is not valid or empty
            error_log('Item ID array is not valid or is empty.');
        }
    }
}


/**
 * check coupon exists for order
 *
 * @param [type] $order_id
 * @return void
 */
function check_coupon_exists_for_order( $order_id ) {
    // Perform a query to check for a coupon with the current order ID
    $args = array(
        'post_type'  => 'coupon', // Adjust post type if needed
        'meta_query' => array(
            array(
                'key'   => '_coupon_order_id',
                'value' => $order_id,
            ),
        ),
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        wp_reset_postdata();
        return true;
    }

    return false;
}

/**
 * Add user to Active Trails Api
 */
function post_active_trails($first_name, $last_name, $email, $phone) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://webapi.mymarketing.co.il/api/groups/195833/members',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
        "first_name": "'. $first_name .'",
        "last_name": "'. $last_name .'",
        "email": "'. $email .'",
        "phone1": "'. $phone .'"
    }',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: 0X78BCD267F439BF29ED5765B1870AC7BC4FB2F37FB1D13638E1FB4B14ED6B99B0B4DF3585F58B82B983C5058E980D1470',
        'Cookie: incap_ses_687_68529=JGs0VFkL8TYQWDwo8baICSXzg2YAAAAANN16QKyzcWiQLIyKW4L/ng==; nlbi_68529=XbunT+mhD2UXQJPxFb+mMwAAAACKCyAHm2gN1l0AaXx20pEm; visid_incap_68529=6Ym77pk+QiaA825alSqmNCXzg2YAAAAAQUIPAAAAAACujOxokcWLQhpW/7SFwS9L'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}

/**
 * Update post Date
 */
function update_post_date_to_today($post_id)
{
    // Check if the post ID is valid
    if (!is_numeric($post_id) || $post_id <= 0) {
        return false; // Return false if the post ID is invalid
    }

    // Get today's date
    $current_date = current_time('mysql');

    // Prepare post data to update
    $post_data = array(
        'ID' => $post_id,
        'post_date' => $current_date,
        'post_date_gmt' => get_gmt_from_date($current_date)
    );

    // Update the post
    $updated = wp_update_post($post_data);

    // Check if the post was successfully updated
    if (is_wp_error($updated) || $updated == 0) {
        return false; // Return false if update failed
    }

    return true; // Return true if update was successful
}

/**
 * SMS Handler
 */
function dmc_sms($phone_number, $coupon_code, $coupon_type, $date)
{
    $response = '';
    $url = 'https://www.smscenter.co.il/Web/WebServices/SendMessage.asmx/SendMessagesV2';
    $message = "תודה שרכשת את מערכת פריסטייל ליברה 2 לניטור רמות הסוכר. אנחנו שמחים להעניק לך קופון הנחה אשר יסייע לך להפיק את המיטב מנתוני הסוכר המתקבלים במערכת פריסטייל ליברה. מידע ופרטים נוספים בקישור המצורף: \n\r";
    $message .= site_url() . "/dmc-coupon/?coupon_code=$coupon_code&type=$coupon_type&date=$date" . "\n\r";
    $message .= "גפן מדיקל";

    $parameters = [
        'UserName' => 'geffen.site',
        'Password' => '27E4DC6DB5BE689790556CCAEEDAFC3875508E4380AAE5357202FD8D3ADA3F8E',
        'SenderName' => 'geffenSMS',
        'CCToEmail' => 'vlad.php.jwz@gmail.com',
        'SMSOperation' => 'Push',
        'DeliveryDelayInMinutes' => 0,
        'ExpirationDelayInMinutes' => 1440,
        'Message' => $message,
        'MessageOption' => 'Regular',
        'Price' => '3.00',
        'SendToPhoneNumbers' => $phone_number // Replace $phone_number with the actual phone number
    ];

    $body = http_build_query($parameters);

    $headers = [
        'Content-Type: application/x-www-form-urlencoded'
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);

    if ($resp === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $response = '<br>SMS sent successfully';
    }

    curl_close($ch);
    return $response;
}

/**
 * Coupon Email message
 */
function coupon_email_message($coupon_code, $type, $date = null)
{
    if (!$date) {
        $date = date('d-m-Y');
    }

    $site = site_url();
    $html_content = <<<HTML
    <style media="all" type="text/css">
        table {
            width: 100%;
        }

        .content {
            padding: 0 11.5px;
        }

        .tr-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: row;
            margin: 0 60px;
        }
        .text-decst-padding{
            padding-left: 7rem;
        }
        .text-left{
            margin-right: 20px;
        }
        .center-block{
            width: 54%;
        }
        .two-block{
            width: 68.3%;
        }
        img.img-mobile-block{
            display: none!important;
        }
        @media all {
            .btn-primary table td:hover {
                background-color: #ec0867 !important;
            }

            .btn-primary a:hover {
                background-color: #ec0867 !important;
                border-color: #ec0867 !important;
            }
        }

        @media only screen and (max-width: 640px) {
            body{
                margin: 0;
            }
            .content {
                padding: 0 15px;
            }
            .tr-header {
                    margin: 0;
                }
            .btn table {
                max-width: 100% !important;
                width: 100% !important;
            }
            .two-block{
            width: 41%;
            }
            .btn a {
                font-size: 16px !important;
                max-width: 100% !important;
                width: 100% !important;
            }
            .text-decst-padding {
                padding-left: 1rem;
            }
            .center-block {
                width: 36%;
            }
        }

        @media screen and (max-width: 580px) {
            tr {
                display: flex;
                align-items: center;

            }

            td {
                width: 100% !important;
            }

            p {
                text-align: center;
            }

            img {
                display: block;
                margin: 0 auto;
            }

            #currentDate {
                display: block;
                font-weight: 800;
            }
            .content {
                padding: 0;
            }
            .gefm-mob{
                margin: 0 22px!important;
            }
            .gefm-mob-block{
                display: flex;
                justify-content: end;
            }
            .text-decst-padding {
                padding-right: 10px;
            }
            .text-left {
                margin-left: 10px;
            }
            .center-block {
                width: 22% !important;
            }
            .mob-mrt-5{
                margin-right: 5px!important;
            }
            .img-decs-block{
                display: none !important;
            }
            img.img-mobile-block{
                display: block;
            }
        }

        @media all {
            .ExternalClass {
                width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
                font-size: inherit;
                font-family: inherit;
                font-weight: inherit;
                line-height: inherit;
            }
        }
    </style>

    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" dir="rtl"
    style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f4f5f6;font-family: Helvetica, sans-serif; -webkit-font-smoothing: antialiased; font-size: 16px; line-height: 1.3; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #fff;max-width: 639px;
    margin: 0 auto; padding: 0;"
    width="100%" bgcolor="#f4f5f6">
        <tr>
            <td class="container" style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top; padding: 0; padding: 24px 0; margin: 0 auto;"  valign="top">
                <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto;">

                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main"
                    style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff;"
                    width="100%">

                        <tr>
                            <td class="wrapper content" style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top; box-sizing: border-box;" valign="top">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box;">
                                    <tbody>
                                        <tr class="tr-header">
                                            <td class="wrapper" style="box-sizing: border-box;text-align: -webkit-right;" valign="top">
                                                <img class="gefm-mob" src="$site/wp-content/uploads/2024/11/Frame-19336.svg" alt="" width="100" height="70" style="display:block;">
                                            </td>
                                            <td class="wrapper gefm-mob-block" style="box-sizing: border-box; vertical-align: middle;">
                                                <img class="gefm-mob" src="$site/wp-content/uploads/2024/11/Geffen-Medical-Logo-1.svg" alt="" width="120" height="40" style="display:block;">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h1 style="font-size: 36px;font-weight: 400;line-height: 35.42px;text-align: center;color: #AFD24D; margin: 20px 0;">תתחדשו!</h1>
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary"
                                style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 279px; min-width: 279px;margin: 0 auto;background-repeat: no-repeat!important;background: url($site/wp-content/uploads/2024/11/image-2.png);">
                                    <tbody>
                                        <tr>
                                            <td class="wrapper"
                                                style="box-sizing: border-box; vertical-align: middle;text-align: -webkit-center;width: 60%; ">
                                                <p style="display: flex;flex-direction: column;margin-top: 89px;margin-bottom: 29px;"><span style="color:#fff;font-size: 26px;font-weight: 400;line-height: 25.58px;letter-spacing: -0.007em;text-align: center;">מגיע לך</span><span><span style="color:#fff;font-size: 19px;font-weight: 700;line-height: 18.69px;letter-spacing: -0.07em;text-align: center;">₪</span><span style="color:#fff;font-size: 72px;font-weight: 400;line-height: 70.84px;letter-spacing: -0.07em;text-align: center;">$type</span></p>
                                                <p style="font-size: 14px;font-weight: 400;line-height: 16px;letter-spacing: 0.007em;text-align: center;padding: 24px 28px 23px;">תודה שרכשת את מערכת פריסטייל-ליברה2 לניטור רמות הסוכר. אנו בגפן מדיקל בשיתוף עם המרכז הרפואי DMC שמחים להעניק לך קופון הנחה על סך
                                                    <strong>
                                                    $type ש”ח
                                                    </strong></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p style="color:#707477;font-size: 14px;font-weight: 600;line-height: 18.31px;text-align: center;width: 64%;margin: 6px auto;">
                                    למימוש בקביעת ייעוץ מומחה במרכז, אשר יסייע להפיק את המיטב מנתוני הסוכר המתקבלים במערכת פריסטייל ליברה.
                                </p>
                                <!--<p style="line-height: 26px;font-family: Assistant, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px; margin-top: 25px; text-align: right;">
                                    <span style="font-weight: 700;color:#013764; ">תודה שרכשת את מערכת פריסטייל ליברה 2</span> לניטור רמות הסוכר. אנו בגפן מדיקל בשיתוף עם המרכז הרפואי DMC שמחים להעניק לך קופון הנחה על סך-
                                    <span style="color:#001489;font-weight: 700;">$type ₪</span> למימוש בקביעת ייעוץ מומחה במרכז, אשר יסייע להפיק את המיטב מנתוני הסוכר המתקבלים במערכת פריסטייל ליברה.
                                </p>-->
                                <p dir="ltr" style="font-family: Assistant;font-size: 18px;font-weight: 600;line-height: 23.54px;text-align: center;color:#97AD4D;">
                                    $coupon_code : קוד הקופון שלך הוא
                                </p>
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary"
                                style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 279px; min-width: 279px;margin: 0 auto;margin-bottom: 20px;">
                                    <tbody>
                                        <tr>
                                            <td class="wrapper"
                                                style="box-sizing: border-box; vertical-align: middle;text-align: -webkit-center;width: 60%; ">
                                                    <img src="$site/wp-content/uploads/2024/11/Frame-19335.svg" alt="logo DMC" srcset="">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="padding: 30px 0;border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box;">
                                    <tbody>
                                        <tr>
                                            <td class="wrapper" style="box-sizing: border-box; vertical-align: middle;text-align: -webkit-right;width: 75%;">
                                                <img class="img-decs-block" src="$site/wp-content/uploads/2024/11/image-46.png" alt="" border="0" width="100%"
                                                height="178" style="display:block;border-radius: 30px;">
                                                <img class="img-mobile-block" src="$site/wp-content/uploads/2024/11/image-46-4.png" alt="" border="0" width="100%"
                                                height="178" style="display:block;border-top-right-radius: 30px;border-bottom-right-radius: 30px;">
                                            </td>
                                            <td class="wrapper" style="box-sizing: border-box;text-align: -webkit-right;width: 25%; vertical-align: middle;">
                                                <img src="$site/wp-content/uploads/2024/11/Dr-1.png" alt="" border="0" width="90" height="93" style="display:block;margin:0 auto;">
                                                <p style="font-family: Assistant;font-size: 12px;font-weight: 600;line-height: 12px;text-align: center;color:#000;">
                                                <span style="font-family: Assistant;font-size: 16px;font-weight: 600;line-height: 20.93px;text-align: center;color:#97AD4D;">ד"ר מאיה איש-שלום</span><br> מנהלת המרכז הרפואי DMC
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box;">
                                    <tbody>
                                        <tr>
                                            <td class="wrapper" style="box-sizing: border-box;text-align: -webkit-right;width: 50%; vertical-align: middle;">
                                                <p class="text-decst-padding" style="font-family: Assistant;font-size: 12px;font-weight: 600;line-height: 15.7px;text-align: right;color:#707477;">
                                                    דיאטנית מקצועית ורופאים מומחים בסוכרת ינתחו יחד איתך את הנתונים שהתקבלו במערכת פריסטייל ליברה, ויספקו לך המלצות מותאמות אישית וטיפים עבור השינויים התזונתיים והרפואיים הנדרשים.
                                                </p>
                                            </td>
                                            <td class="wrapper" style="box-sizing: border-box; vertical-align: middle;text-align: -webkit-right;width: 50%;display: flex;justify-content: end;">
                                                <img class="img-decs-block" src="$site/wp-content/uploads/2024/11/image-46-1.png" alt="" border="0" width="100%"
                                                height="178" style="display:block;border-top-left-radius: 30px;border-bottom-left-radius: 30px;">
                                                <img class="img-mobile-block" src="$site/wp-content/uploads/2024/11/image-46-5.png" alt="" border="0" width="141"
                                                height="178" style="display:block;border-top-left-radius: 30px;border-bottom-left-radius: 30px; margin: 0;">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="padding: 30px 0;border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box;">
                                    <tbody>
                                        <tr>
                                            <td class="wrapper" style="box-sizing: border-box; vertical-align: middle;text-align: -webkit-right; width: 68.3%;">
                                                <img class="img-decs-block" src="$site/wp-content/uploads/2024/11/image-46-2.png" alt="" border="0" width="100%"
                                                height="178" style="display:block;border-top-right-radius: 30px;border-bottom-right-radius: 30px;">
                                                <img class="img-mobile-block" src="$site/wp-content/uploads/2024/11/image-46-6.png" alt="" border="0" width="100%"
                                                height="178" style="display:block;border-top-right-radius: 30px;border-bottom-right-radius: 30px;">
                                            </td>

                                            <td class="wrapper" style="box-sizing: border-box;text-align: -webkit-right;width: 31.7%; vertical-align: middle;">
                                                <p  class="text-left" style="font-family: Assistant;font-size: 12px;font-weight: 600; line-height: 15.7px;text-align: right;color:#707477;">
                                                    דיאטנית מקצועית ורופאים מומחים בסוכרת ינתחו יחד איתך את הנתונים שהתקבלו במערכת פריסטייל ליברה, ויספקו לך המלצות מותאמות אישית וטיפים עבור השינויים התזונתיים והרפואיים הנדרשים.
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box;">
                                    <tbody>
                                        <tr>
                                            <td class="wrapper mob-mrt-5" style="box-sizing: border-box;text-align: -webkit-right;" valign="top">
                                                <p style="font-family: Assistant;font-size: 16px;font-weight: 400;line-height: 20.93px;text-align: right;color:#97AD4D;margin: 0;">המרכז הרפואי לסוכרת DMC</p>
                                                <p  style="font-family: Assistant;font-size: 16px;font-weight: 400;line-height: 20.93px;text-align: right;color:#707477;margin: 0;">הינו מרכז רפואי פרטי המתמחה בטיפול בסוכרת, אנדוקרינולוגיה והשמנה תחת ניהולה הרפואי של ד
                                                    <strong>
                                                    "ר מאיה איש-שלום.</strong>
                                                </p>
                                            </td>
                                            <td class="wrapper center-block" style="box-sizing: border-box;text-align: -webkit-right;" valign="top">
                                            </td>
                                            <td class="wrapper" style="box-sizing: border-box; vertical-align: middle;">
                                                <p style="margin: 0;font-family: Assistant;font-size: 18px;font-weight: 600;line-height: 23.54px;text-align: center;color: #97AD4D;">dmc.org.il</p>
                                                <img src="$site/wp-content/uploads/2024/11/logo-DMC-002-1-2.svg" alt="" width="94" height="105" style="display:block;height:57px;">
                                                <p style="font-family: Assistant;font-size: 14px;font-weight: 600;line-height: 18.31px;text-align: center;margin: 0;color: #707477;display: flex;justify-content: center; align-items: center;">8028*<span><img src="$site/wp-content/uploads/2024/11/Vector.svg" alt="" srcset=""></span></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="padding: 30px 0;border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box;">
                                    <tbody>
                                        <tr>
                                            <td class="wrapper two-block" style="box-sizing: border-box; vertical-align: middle;text-align: -webkit-right;">
                                                <img class="img-decs-block" src="$site/wp-content/uploads/2024/11/image-46-3.png" alt="" border="0" width="100%"
                                                height="444" style="display:block;border-top-right-radius: 30px;border-bottom-right-radius: 30px;">
                                                <img class="img-mobile-block" src="$site/wp-content/uploads/2024/11/image-46-7.png" alt="" border="0" width="100%"
                                                height="444" style="display:block;border-top-right-radius: 30px;border-bottom-right-radius: 30px;">
                                            </td>
                                            <td class="wrapper" style="box-sizing: border-box;text-align: -webkit-right;width: 31.7%; vertical-align: middle;">
                                                <p  class="text-left" style="font-family: Assistant;font-size: 12px;font-weight: 600;line-height: 12px;text-align: right;color:#000;">
                                                    * מובהר, כי גפן מדיקל איננה צד להתקשרות בינך לבין DMC, לרבות לעניין טיב המוצרים או השירותים אשר מוצעים על ידי DMC ובאחריותה הבלעדית, ולא תישא בכל אחריות לאמור. המידע המוצג להלן, ובין היתר לעניין אופן מימוש הקופון, מגבלות וכיוצ"ב, מפורסם בשם DMC ובהתאם להנחיותיה. החברה איננה צד לקביעת התנאים, לרבות המחיר הרגיל של המוצרים או השירותים של DMC.

                                                </p>
                                                <p  class="text-left" style="font-family: Assistant;font-size: 12px;font-weight: 600;line-height: 12px;text-align: right;color:#000;">
                                                    * הקופון תקף ל-3 חודשים מיום הרכישה, לצורך זיהוי יש לשמור את חשבונית הרכישה. המבצע פועל עד ה-01.06.25, גפן מדיקל שומרת לעצמה את הזכות להפסיק את המבצע בכל עת.
                                                </p>
                                                <p  class="text-left" style="font-family: Assistant;font-size: 12px;font-weight: 600;line-height: 12px;text-align: right;color:#000;">
                                                    * לא ניתן להשתמש בקופון יחד עם הנחות אחרות ב-DMC.
                                                </p>
                                                <p  class="text-left" style="font-family: Assistant;font-size: 12px;font-weight: 600;line-height: 12px;text-align: right;color:#000;">
                                                    * הקופון הינו אישי ואינו ניתן להעברה, אלא לבן משפחה מדרגה ראשונה.
                                                </p>
                                                <p  class="text-left" style="font-family: Assistant;font-size: 12px;font-weight: 600;line-height: 12px;text-align: right;color:#000;">
                                                    תר המרפאה. ניתן לקבוע את התור למהלך שלושת החודשים הקרובים, ויש להציג את מספר הקופון בקבלה לפני התור עבור מימוש ההנחה.
                                                </p>
                                                <p class="text-left"
                                                style="font-family: Assistant;font-size: 16px;font-weight: 600;line-height: 12px;text-align: right;color:#000;margin-right:20px;">
                                                <span id="currentDate">$date</span>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                           <!--    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; border-bottom: 0.7px solid #D3D3D3;">
                                    <tbody>
                                        <tr>
                                            <td class="wrapper" style="box-sizing: border-box;text-align: -webkit-right;width: 60%; vertical-align: middle;">
                                                <p
                                                style="line-height: 26px;font-family: Assistant, sans-serif; font-size: 15px; font-weight: 400; margin: 0; margin-bottom: 16px;">
                                                דיאטנית מקצועית ורופאים מומחים בסוכרת ינתחו יחד איתך את הנתונים
                                                שהתקבלו במערכת פריסטייל ליברה, ויספקו לך המלצות מותאמות אישית וטיפים
                                                עבור השינויים התזונתיים והרפואיים הנדרשים.</p>
                                            </td>
                                            <td class="wrapper" style="box-sizing: border-box; vertical-align: middle;text-align: -webkit-center;">
                                                <img src="https://geffenmedical.co.il/wp-content/uploads/2024/02/Dr-1.png" alt="" border="0" width="90" height="93" style="display:block;margin:0 auto;">
                                                <p style="font-family: Assistant, sans-serif; font-size: 15px; font-weight: 400; margin: 16px 0; text-align: center;">
                                                <span style="font-weight: 700;">ד"ר מאיה איש-שלום</span><br> מנהלת המרכז הרפואי DMC
                                                </p>
                                                <p
                                                style="text-align: left;color: #003764;line-height: 16px;font-family: Assistant, sans-serif; font-size: 15px; font-weight: 400; margin: 0; text-align: right;">
                                                <span id="currentDate">$date</span>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="padding: 30px 0;border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; border-bottom: 0.7px solid #D3D3D3;">
                                    <tbody>
                                        <tr>
                                            <td class="wrapper" style="box-sizing: border-box; vertical-align: middle;text-align: -webkit-center;">
                                                <img src="https://geffenmedical.co.il/wp-content/uploads/2024/02/Image-0211.png" alt="" border="0" width="245"
                                                height="178" style="display:block;">
                                            </td>
                                            <td class="wrapper" style="box-sizing: border-box;text-align: -webkit-right;width: 60%; vertical-align: middle;">
                                                <p
                                                style=" text-align: center;line-height: 26px;font-family: Assistant, sans-serif; font-size: 15px; font-weight: 400; margin: 0; margin-bottom: 16px;">
                                                <span style="font-weight: 600;">ניתן לקבוע פגישה עם מומחה
                                                    לבחירתך</span> תוך חודש מיום קבלת המייל, דרך שיחת טלפון או הזמנת
                                                תור באתר המרפאה. ניתן לקבוע את התור למהלך שלושת החודשים הקרובים, ויש
                                                להציג את מספר הקופון בקבלה לפני התור עבור מימוש ההנחה.
                                                </p>
                                                <p dir="ltr"
                                                style=" text-align: center;line-height: 26px;font-family: Assistant, sans-serif; font-size: 17px; font-weight: 400; margin: 0; margin-bottom: 16px;">
                                                <span style="border-right: 2px solid #718E39E3;padding: 5px 15px;"><img src="https://geffenmedical.co.il/wp-content/uploads/2024/02/ph_phone-call-light.png" alt="" border="0" width="30"
                                                    height="30" style="display: inline-block; vertical-align: bottom;">
                                                    *8028</span>
                                                <span style="padding: 5px 15px;"><a style="color: #000!important;text-decoration: none;"
                                                    href="https://dmc.org.il/">dmc.org.il</a></span>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p style="direction: rtl;line-height: 16px;font-family: Assistant, sans-serif; font-size: 10.5px; font-weight: 400; margin: 0;margin-top: 16px; text-align: right;">
                                * מובהר, כי גפן מדיקל איננה צד להתקשרות בינך לבין DMC, לרבות לעניין טיב המוצרים או
                                השירותים אשר מוצעים על ידי DMC ובאחריותה הבלעדית, ולא תישא בכל אחריות לאמור. המידע
                                המוצג להלן, ובין היתר לעניין אופן מימוש הקופון, מגבלות וכיוצ"ב,
                                מפורסם בשם DMC ובהתאם להנחיותיה. החברה איננה צד לקביעת התנאים, לרבות המחיר הרגיל של
                                המוצרים או השירותים של DMC.<br>
                                * הקופון תקף ל-3 חודשים מיום הרכישה, לצורך זיהוי יש לשמור את חשבונית הרכישה. המבצע פועל עד ה-01.06.25, גפן מדיקל שומרת לעצמה את הזכות להפסיק את המבצע בכל עת.
                                </p>
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary"
                                style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%; min-width: 100%;"
                                width="100%">
                                    <tbody>
                                        <tr>
                                            <td class="wrapper"
                                                style="box-sizing: border-box; vertical-align: middle;text-align: -webkit-center;width: 60%; ">
                                                <p
                                                style="direction: rtl;line-height: 16px;font-family: Assistant, sans-serif; font-size: 10.5px; font-weight: 400; margin: 0;text-align: right;">
                                                * לא ניתן להשתמש בקופון יחד עם הנחות אחרות ב-DMC.<br>
                                                * הקופון הינו אישי ואינו ניתן להעברה, אלא לבן משפחה מדרגה ראשונה.
                                                </p>
                                            </td>
                                            <td class="wrapper" style="box-sizing: border-box;text-align: -webkit-right;vertical-align: middle;">

                                                <p
                                                style="text-align: left;color: #003764;line-height: 16px;font-family: Assistant, sans-serif; font-size: 15px; font-weight: 400; margin: 0; text-align: right;">
                                                <span id="currentDate">$date</span>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>-->
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    HTML;

    return $html_content;
}

/**
 * Create coupon query
 */
function coupon_query($option)
{
    $args = array(
        'post_type' => 'coupon',
        'posts_per_page' => 1,
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => '_coupon_used',
                'value' => 'off',
                'compare' => '=',
            ),
            array(
                'key' => '_coupon_option',
                'value' => $option,
                'compare' => '=',
            ),
        ),
    );

    return get_posts($args);
}

/**
 * Clear Cookies after logout
 */
function delete_cookies_on_logout()
{
    $user_id = get_current_user_id();

    // Clear geffen code after logout
    update_user_meta($user_id, 'geffen_phone_code', '');

    // Optionally, you can clear other cookies as well
    // For example, if you have custom cookies, you can unset them like this:
    // setcookie('custom_cookie', '', time() - 3600, '/');

    // Remove the 'popupRegister' cookie
    setcookie('popupRegister', '', time() - 3600, '/');
}
// Hook the function to the 'wp_logout' action
add_action('wp_logout', 'delete_cookies_on_logout');

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter('gutenberg_use_widgets_block_editor', '__return_false', 100);

// Disables the block editor from managing widgets.
add_filter('use_widgets_block_editor', '__return_false');

if (!function_exists('themesdna_activate_classic_widgets')):
    function themesdna_activate_classic_widgets()
    {
        remove_theme_support('widgets-block-editor');
    }
endif;
add_action('after_setup_theme', 'themesdna_activate_classic_widgets');

// Remove X-Powered-By
add_action('wp', 'jltwp_adminify_remove_powered');
function jltwp_adminify_remove_powered()
{
    if (function_exists('header_remove')) {
        header_remove('x-powered-by');
    }
}

function custom_wc_add_to_cart_message($message)
{
    $message = add_to_cart_notification();
    return $message;
}

add_filter('wc_add_to_cart_message_html', 'custom_wc_add_to_cart_message');


add_action('woocommerce_email_after_order_table', 'ecommercehints_show_coupons_used_in_emails', 10, 4);

function ecommercehints_show_coupons_used_in_emails($order, $sent_to_admin, $plain_text, $email)
{
    if (count($order->get_coupons()) > 0) {
        $html = '<div class="used-coupons">
        <h2>קופונים בהזמנה<h2>
        <table class="td" cellspacing="0" cellpadding="6" border="1">
            <tr>
            <th>קוד קופון</th>
            <th>תנאי הקופון</th>
            </tr>';

        foreach ($order->get_coupons() as $item) {
            $coupon_code = $item->get_code();
            $coupon = new WC_Coupon($coupon_code);
            $discount_type = $coupon->get_discount_type();
            $coupon_amount = $coupon->get_amount();

            if ($discount_type == 'percent') {
                $output = $coupon_amount . "%";
            } else {
                $output = wc_price($coupon_amount);
            }

            $html .= '<tr>
                <td>' . strtoupper($coupon_code) . '</td>
                <td>' . $output . '</td>
                </tr>';
        }
        $html .= '
        </table><br>
        </div>';

        $css = '<style>
            .used-coupons table {
                width: 100%;
                font-family: \'Helvetica Neue\', Helvetica, Roboto, Arial, sans-serif;
                color: #737373;
                border: 1px solid #e4e4e4;
                margin-bottom: 8px;
            }

            .used-coupons table th,
                table.tracking-info td {
                text-align: left;
                border-top-width: 4px;
                color: #737373;
                border: 1px solid #e4e4e4;
                padding: 12px;
            }

            .used-coupons table td {
                text-align: left;
                border-top-width: 4px;
                color: #737373;
                border: 1px solid #e4e4e4;
                padding: 12px;
            }
        </style>';

        echo $css . $html;
    }
}

// Create hook to implement events on product selling page
function geffen_send_view_item_event_hook()
{
    do_action('geffen_view_item_event');
}

/**
 * Disable email change notification
 */
add_filter( 'send_email_change_email', '__return_false' );