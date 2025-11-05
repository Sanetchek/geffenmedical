<?php
// Register AJAX handler actions
add_action('wp_ajax_check_email_db', 'check_email_db');
add_action('wp_ajax_nopriv_check_email_db', 'check_email_db');

function check_email_db() {
  // Verify the nonce
  $nonce = isset($_POST['nonce']) ? $_POST['nonce'] : '';
  if ($nonce != 'KNCeih7Y638URIHT5IJGKSJa') {
      // Nonce verification failed
      wp_send_json_error('Invalid nonce.');
  }

  // Check if email parameter is provided
  if (isset($_POST['email'])) {
    // Sanitize and retrieve email
    $email = sanitize_email($_POST['email']);

    // Check if email exists in the custom table and not used
    global $wpdb;
    $table_name = $wpdb->prefix . 'geffen_email_coupons';
    $query = $wpdb->prepare("SELECT * FROM $table_name WHERE email = %s AND used = 0", $email);
    $coupon_data = $wpdb->get_row($query);

    $is_email = (is_object($coupon_data) && $coupon_data->email == $email && $coupon_data->used == '0') ? 1 : 0;

    if ($is_email) {
      // Products included into coupon
      $products_included = get_field('product', 'option');
      $is_coupon = $products_included ? 1 : 0;

      if ($is_coupon) {
        // Generate WooCommerce coupon code
        $new_coupon_code = generate_unique_coupon_code_for_email( $email, $products_included );

        if ($new_coupon_code) {
          // Mark coupon as used in the database
          $db_update = $wpdb->update(
            $table_name,
            array('used' => 1, 'coupon_code' => $new_coupon_code),
            array('email' => $email)
          );

          if ($db_update) {
            // Prepare response
            $response_data = array(
              'coupon_code' => $new_coupon_code,
              'product' => $products_included,
              'domain' => site_url(),
            );

            // Output the response in JSON format
            wp_send_json_success($response_data);
          } else {
            wp_send_json_error('DB not updated.');
          }

        } else {
          wp_send_json_error('Failed to generate coupon.');
        }
      } else {
        wp_send_json_error('Product not set. Check Geffen Settings in Admin Menu.');
      }
    } else {
      // Email not found or coupon already used
      wp_send_json_error('No available coupon for this email.');
    }
  } else {
    // Email parameter not provided
    wp_send_json_error('Email parameter not provided.');
  }

  // Terminate script execution
  wp_die();
}

/**
 * Generate coupon code
 */
function generate_unique_coupon_code_for_email( $email, $products = [] ) {
  if (! $email) {
    return;
  }

  $coupon_code = 'FREEPRODUCT_' . substr( md5( $email ), 0, 8 );  // Generate a unique code based on email

  $coupon = new WC_Coupon();
  $coupon->set_code( $coupon_code );
  $coupon->set_description( '' );

  // General tab
  // discount type can be 'fixed_cart', 'percent' or 'fixed_product', defaults to 'fixed_cart'
  $coupon->set_discount_type( 'percent' );
  // discount amount
  $coupon->set_amount( 100 );
  // allow free shipping
  $coupon->set_free_shipping( false );

  // Usage Restriction
  // individual use only
  $coupon->set_individual_use( true );
  // products
  $coupon->set_product_ids( $products );
  // allowed emails
  $coupon->set_email_restrictions(
    array(
      $email,
    )
  );

  // Usage limit tab
  // usage limit per coupon
  $coupon->set_usage_limit( 1 );
  // limit usage to X items
  $coupon->set_limit_usage_to_x_items( 1 );
  // usage limit per user
  $coupon->set_usage_limit_per_user( 1 );

  $coupon->save();

  return $coupon->get_code();
}