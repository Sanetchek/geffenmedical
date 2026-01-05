<?php

// Redirect cart page to checkout page
function redirect_cart_to_checkout()
{
  if (is_cart() && !is_wc_endpoint_url('order-received')) {
    if (!WC()->cart->is_empty() && is_user_logged_in()) {
      // Cart is not empty, redirect to checkout page
      wp_safe_redirect(wc_get_checkout_url());
      exit;
    }
  }
}
add_action('template_redirect', 'redirect_cart_to_checkout');

/**
 * Ensure shipping methods are initialized on checkout page load
 */
function ensure_shipping_methods_on_checkout() {
  if (!is_checkout() || !WC()->cart || WC()->cart->is_empty()) {
    return;
  }

  // Only proceed if shipping is needed
  if (!WC()->cart->needs_shipping()) {
    return;
  }

  // Calculate shipping if not already calculated
  $packages = WC()->cart->get_shipping_packages();
  if (empty($packages)) {
    WC()->cart->calculate_shipping();
    $packages = WC()->cart->get_shipping_packages();
  }

  // Set default shipping method if none is chosen
  $chosen_methods = WC()->session->get('chosen_shipping_methods');
  if (empty($chosen_methods) && !empty($packages)) {
    $shipping_packages = WC()->shipping()->get_packages();
    if (!empty($shipping_packages) && isset($shipping_packages[0]['rates'])) {
      $available_methods = $shipping_packages[0]['rates'];
      if (!empty($available_methods)) {
        // Get the first available method
        $first_method = reset($available_methods);
        WC()->session->set('chosen_shipping_methods', array($first_method->id));
        WC()->cart->calculate_shipping();
        WC()->cart->calculate_totals();
      }
    }
  }
}
add_action('wp', 'ensure_shipping_methods_on_checkout', 20);

// Remove from checkout

function remove_from_cart_callback()
{
  // Verify nonce
  if (!isset ($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'woocommerce-cart')) {
    wp_send_json_error('Invalid nonce');
  }

  // Check if item key is set
  if (!isset ($_POST['item_key'])) {
    wp_send_json_error('Item key is missing');
  }

  // Get the item key from the AJAX request
  $item_key = wc_clean($_POST['item_key']);

  // Remove the item from the cart
  WC()->cart->remove_cart_item($item_key);

  // Send a success response
  wp_send_json_success();

  wp_die();
}
add_action('wp_ajax_remove_from_cart', 'remove_from_cart_callback');
add_action('wp_ajax_nopriv_remove_from_cart', 'remove_from_cart_callback');

/**
 * Update Checkout product items
 */
function update_chechout_product_items()
{
  // Verify nonce
  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'woocommerce-cart')) {
    wp_send_json_error('Invalid nonce');
  }

  // Check if item key and quantity are set
  if (!isset($_POST['item_key']) || !isset($_POST['quantity'])) {
    wp_send_json_error('Item key or quantity is missing');
  }

  // Check if Shipping method is set
  if (!isset($_POST['shipping_method'])) {
    wp_send_json_error('Shipping method is missing');
  }

  // Check if Coupons are set
  if (isset($_POST['coupon_codes']) && !empty($_POST['coupon_codes'])) {
    // Coupons String
    $coupon_codes = $_POST['coupon_codes'];

    // Add Coupons
    add_multiple_coupons($coupon_codes);
  }

  // Get the selected shipping method from the AJAX request
  $shipping_method = $_POST['shipping_method'];

  // Update the chosen shipping method
  WC()->session->set('chosen_shipping_methods', array($shipping_method));
  WC()->cart->calculate_shipping();

  // Get the item key and new quantity from the AJAX request
  $item_key = wc_clean($_POST['item_key']);
  $quantity = intval($_POST['quantity']);

  // Update the product quantity in the cart
  WC()->cart->set_quantity($item_key, $quantity);

  // Implement custom logic: Check if the product with ID 888 and quantity 3 is in the cart
  $target_product_id = 888; // Target product ID
  $additional_product_id = 891; // Additional product ID to add
  $required_quantity = 3;

  $cart = WC()->cart->get_cart();
  $has_target_product = false;
  $found_additional_product = false;

  // Check if the target product exists in the cart with the required quantity
  foreach ($cart as $cart_item) {
    if ($cart_item['product_id'] == $target_product_id && $cart_item['quantity'] == $required_quantity) {
      $has_target_product = true;
    }
    if ($cart_item['product_id'] == $additional_product_id) {
      $found_additional_product = true;
    }
  }

  // Add the additional product if conditions are met
  if ($has_target_product && !$found_additional_product) {
    WC()->cart->add_to_cart($additional_product_id);
  }

  // Update total
  WC()->cart->calculate_totals();

  // Get templates for update
  $form_items = get_part_string('template-parts/checkout-one-page/form-items');
  $review_order = get_part_string('template-parts/checkout-one-page/review-order');

  $response = array(
    'form_items' => $form_items,
    'review_order' => $review_order,
  );

  // Send a success response
  wp_send_json_success($response);

  wp_die();
}

add_action('wp_ajax_update_chechout_product_items', 'update_chechout_product_items');
add_action('wp_ajax_nopriv_update_chechout_product_items', 'update_chechout_product_items');

/**
 * Apply Coupon Code
 */
function geffen_checkout_apply_coupon()
{
  if (isset($_POST['coupon_codes'])) {
    // Coupons String
    $coupon_codes = $_POST['coupon_codes'];

    // Check if the 'fsl' coupon is included
    $coupon_codes_array = explode(',', $coupon_codes);

    // Add product ID 9752 with quantity 3 if 'fsl' or 'FSL' coupon is applied
    // if (in_array('fsl', $coupon_codes_array, true) || in_array('FSL', $coupon_codes_array, true)) {
    //   $product_id = 9752;
    //   $quantity = 3; // Set the desired quantity

    //   // Add the product to the cart if it's not already added
    //   $found = false;
    //   foreach (WC()->cart->get_cart() as $cart_item) {
    //     if ($cart_item['product_id'] == $product_id) {
    //       $found = true;
    //       break;
    //     }
    //   }

    //   if (!$found) {
    //     WC()->cart->add_to_cart($product_id, $quantity); // Add the product with quantity 3
    //   }
    // }

    // Add Coupons
    $success = add_multiple_coupons($coupon_codes);

    if ($success) {
      $shipping_method = $_POST['shipping_method'];

      if (isset($shipping_method)) {
        // Update the chosen shipping method
        WC()->session->set('chosen_shipping_methods', array($shipping_method));
        WC()->cart->calculate_shipping();
      }

      // Refresh the cart and update totals
      WC()->cart->calculate_totals(); // Recalculate cart totals

      // Get the updated review order HTML
      $review_order = get_part_string('template-parts/checkout-one-page/review-order');

      $response = array(
        'message' => 'Coupons applied successfully.',
        'review_order' => $review_order,
      );
      wp_send_json_success($response);
    } else {
      $response = array(
        'message' => 'Coupons could not be applied.',
      );
      wp_send_json_error($response);
    }
  }
  wp_die();
}
add_action('wp_ajax_checkout_apply_coupon', 'geffen_checkout_apply_coupon');
add_action('wp_ajax_nopriv_checkout_apply_coupon', 'geffen_checkout_apply_coupon');



/**
 * Add Multiple Coupons
 */
function add_multiple_coupons($coupons_string) {
  // Split the string of coupon codes into an array
  $coupons_array = explode(',', $coupons_string);

  // Apply each coupon code separately
  $success = true;
  foreach ($coupons_array as $coupon_code) {
    $coupon_code = trim($coupon_code); // Remove any extra whitespace
    if (!WC()->cart->apply_coupon($coupon_code)) {
      $success = false;
      break; // If any coupon fails to apply, stop applying further coupons
    }
  }

  return $success;
}

/**
 * Update Shipping in checkout total
 */
function update_shipping_checkout_total()
{
  // Variables
  $coupon_codes = $_POST['coupons'];
  $shipping_method = $_POST['shipping_method'];

  // Add Coupons
  if (isset($coupon_codes)) {
    add_multiple_coupons($coupon_codes);
  }

  // Update the chosen shipping method
  WC()->session->set( 'chosen_shipping_methods', array( $shipping_method ) );
  WC()->cart->calculate_shipping();

  // Update total
  WC()->cart->calculate_totals();

  $review_order = get_part_string('template-parts/checkout-one-page/review-order');

  $response = array(
    'message' => 'Shipping method applied successfully.',
    'review_order' => $review_order,
  );

  wp_send_json_success($response);
  wp_die();
}
add_action('wp_ajax_update_shipping_checkout_total', 'update_shipping_checkout_total');
add_action('wp_ajax_nopriv_update_shipping_checkout_total', 'update_shipping_checkout_total');

/**
 * Remove Coupon from cart
 */
function remove_coupon_from_cart() {
  if (isset($_POST['coupon_code'])) {
    $coupon_codes = sanitize_text_field($_POST['coupon_code']);
    $shipping_method = $_POST['shipping_method'];

    // Remove Coupon
    add_multiple_coupons($coupon_codes);

    // Update the chosen shipping method
    WC()->session->set( 'chosen_shipping_methods', array( $shipping_method ) );
    WC()->cart->calculate_shipping();

    // Update total
    WC()->cart->calculate_totals();

    $review_order = get_part_string('template-parts/checkout-one-page/review-order');

    $response = array(
      'message' => 'Coupon removed successfully.',
      'review_order' => $review_order,
    );

    wp_send_json_success($response);

  } else {
    wp_send_json_error('Invalid request');
  }

  wp_die();
}
add_action('wp_ajax_remove_coupon', 'remove_coupon_from_cart');
add_action('wp_ajax_nopriv_remove_coupon', 'remove_coupon_from_cart');

/**
 * Update order review when user info change
 */
function update_order_review_user_info_change() {
  $review_order = get_part_string('template-parts/checkout-one-page/review-order');

  $response = array(
    'message' => 'Order review successfully.',
    'review_order' => $review_order,
  );

  wp_send_json_success($response);

  wp_die();
}
add_action('wp_ajax_update_order_review_user_info_change', 'update_order_review_user_info_change');
add_action('wp_ajax_nopriv_update_order_review_user_info_change', 'update_order_review_user_info_change');

/**
 * Check if all mandatory fields are filled
 */

function check_mandatory_fields($data) {
  $is_empty = false;
  $fields = [
    $data['billing_first_name'],
    $data['billing_last_name'],
    $data['billing_email'],
    $data['billing_phone'],
    $data['billing_address_1'],
    $data['billing_address_type'],
    $data['billing_apartment_number'],
    $data['billing_city'],
    $data['billing_country'],
    $data['billing_house_number'],
  ];

  foreach ($fields as $field) {
    if (empty($field)) {
      $is_empty = true;
      break;
    }
  }
  return $is_empty;
}

/**
 * Update order review when user info change
 */
function geffen_create_order() {
  $user_id = get_current_user_id();

  // Access all POST values
  $form = $_POST['formData'];

  // Convert URL-encoded string to PHP array
  parse_str($form, $data);

  // Verify nonce
  if ( ! isset( $data['woocommerce-cart-nonce'] ) || ! wp_verify_nonce( $data['woocommerce-cart-nonce'], 'woocommerce-cart' ) ) {
    // Nonce is invalid, handle the error here
    wp_send_json_error( ['message' => 'Invalid nonce'] );
    wp_die();
  }

  // Get shipping method - try form data first, then session
  $shipping_method_id = '';
  if (isset($data['shipping_method'][0]) && !empty($data['shipping_method'][0])) {
    $shipping_method_id = $data['shipping_method'][0];
  } else {
    // Fallback to session
    $chosen_methods = WC()->session->get('chosen_shipping_methods');
    if (!empty($chosen_methods) && isset($chosen_methods[0])) {
      $shipping_method_id = $chosen_methods[0];
      $data['shipping_method'][0] = $shipping_method_id;
    }
  }

  // Validate shipping method exists
  if (empty($shipping_method_id)) {
    wp_send_json_error( ['message' => __('שיטת משלוח לא נבחרה. אנא בחרו שיטת משלוח', 'geffen')] );
    wp_die();
  }

  // Get shipping method title and price - try form data first, then calculate from method
  $shipping_method_title = '';
  $shipping_method_price = 0;

  if (isset($data['shipping_method_title']) && !empty($data['shipping_method_title'])) {
    $shipping_method_title = $data['shipping_method_title'];
  }

  if (isset($data['shipping_method_price']) && !empty($data['shipping_method_price'])) {
    $shipping_method_price = floatval($data['shipping_method_price']);
  }

  // If title or price missing, get from shipping rates
  if (empty($shipping_method_title) || $shipping_method_price == 0) {
    $shipping_packages = WC()->shipping()->get_packages();
    if (!empty($shipping_packages) && isset($shipping_packages[0]['rates'])) {
      $available_methods = $shipping_packages[0]['rates'];
      foreach ($available_methods as $method) {
        if ($method->id === $shipping_method_id) {
          if (empty($shipping_method_title)) {
            $shipping_method_title = $method->get_label();
          }
          if ($shipping_method_price == 0) {
            $shipping_method_price = floatval($method->get_cost());
          }
          break;
        }
      }
    }
  }

  // Final validation - ensure we have all required shipping data
  if (empty($shipping_method_title)) {
    wp_send_json_error( ['message' => __('לא ניתן לקבוע את פרטי שיטת המשלוח. אנא רעננו את הדף', 'geffen')] );
    wp_die();
  }

  if ($data['shipping_method'][0] == 'flat_rate:4') {
    $is_empty = check_mandatory_fields($data);

    // If any mandatory field is empty, return error and stop further execution
    if ($is_empty) {
      wp_send_json_error( ['message' => __('אנא מלאו את כל שדות החובה', 'geffen'), 'fields' => $data] );
      wp_die();
    }
  }

  // Save Subscription
  $user = new WP_User($user_id);
  if (!in_array('administrator', $user->roles)) {
    if (isset($_POST['subscribed']) && $_POST['subscribed'] === 'on') {
      update_user_meta( $user_id, 'geffen_subscription', true );
      // Get the user object
      $user->set_role('club_member');

      $customer = get_user_meta($user_id, 'user_crm_id', true);
      $name = get_user_meta($user_id, 'first_name', true);
      $last_name = get_user_meta($user_id, 'last_name', true);
      $email = get_user_meta($user_id, 'email', true);
      if ($customer) {
        $crm_data_array = [
          "FGEF_FIRSTNAME" => $name,
          "FGEF_LASTNAME" => $last_name,
          "EMAIL" => $email,
          "MGEF_MEMBERFLAG" => "Y",
          "MGEF_PRI_POLICY_FLAG" => "Y",
          "OWNERLOGIN" => "apiUser"
        ];
        $update_crm_user = update_existing_customer($customer, $crm_data_array);
      }
    }
  }

  // create shipping object
  $shipping = new WC_Order_Item_Shipping();
  $shipping->set_method_title( $shipping_method_title );
  $shipping->set_method_id( $shipping_method_id ); // set an existing Shipping method ID
  $shipping->set_total( $shipping_method_price ); // optional

  // Create New Order
  $order = wc_create_order();
  $order_id = $order->ID;

  // Update Order Status
  $order->update_status('pending'); // or 'processing', 'on-hold', etc.

  // Add shipping method
  $order->add_item( $shipping );

  // Add DONE shipping INFO
  add_done_address_to_order($order_id, $data);

  // Add order comments
  if (isset($data['order_comments']) && !empty($data['order_comments'])) {
    $order->set_customer_note($data['order_comments']);
  }

  // add billing and shipping addresses
  $billing_address = create_billing_array($data);

  // add shipping addresses
  $shipping_address = create_shipping_array($data);

  // add billing and shipping addresses
  $order->set_address( $billing_address, 'billing' );
  $order->set_address( $shipping_address, 'shipping' );

  // add payment method
  $payment_method = $data['payment_method'];
  $order->set_payment_method( $payment_method );

  // Save tranzila payments amount from payments_select field
  if (isset($data['payments_select']) && !empty($data['payments_select'])) {
    $order->update_meta_data('tranzila_payments_amount', sanitize_text_field($data['payments_select']));
  }

  // Apply coupon codes
  if (!empty($data['coupon_codes'])) {
    $coupon_codes = explode(',', $data['coupon_codes']);
    foreach ($coupon_codes as $coupon_code) {
      $coupon_code = trim($coupon_code);
      $order->apply_coupon($coupon_code);
    }
  }

  $order->set_customer_id( $user_id );

  // Add products to the order
  foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
    $product_id = $cart_item['variation_id'] ? $cart_item['variation_id'] : $cart_item['product_id'];
    $product = wc_get_product($product_id);

    $order->add_product($product, $cart_item['quantity'], array(
      'subtotal' => $cart_item['line_subtotal'], // Set the discounted price as the subtotal
      'total' => $cart_item['line_total'] // Set the discounted price as the total
    ));
  }

  // calculate and save
  $order->calculate_totals();

  $is_saved = $order->save();

  // Get Redirect page links
  $payment_page = $order->get_checkout_payment_url();
  $thank_you_page = $order->get_checkout_order_received_url();

  // Remove the 'pay_for_order' parameter
  $payment_page = remove_query_arg('pay_for_order', $payment_page);

  // Update info to start cron event
  update_info_to_start_cron_event($order_id);

  // Redirect to payment page
  $response = [
    'payment' => $payment_method === 'tranzila' ? true : false,
    'paymentlink' => $payment_page,
    'thankyoulink' => $thank_you_page,
    'data' => $data
  ];

  wp_send_json_success($response);

  wp_die();
}
add_action('wp_ajax_geffen_create_order', 'geffen_create_order');
add_action('wp_ajax_nopriv_geffen_create_order', 'geffen_create_order');

/**
 * Updates the order with the given address details
 *
 * @param int   $order_id The order ID to update
 * @param array $data     The address details
 */
function add_done_address_to_order($order_id, $data) {
  // Update Country area
  if (isset($data['done_area']) && $data['done_area']) {
    update_field('country_area', $data['done_area'], $order_id);
  }

  // Update City
  if (isset($data['done_city']) && $data['done_city']) {
    update_field('city', $data['done_city'], $order_id);
  }

  // Update Address
  if (isset($data['done_position']) && $data['done_position']) {
    update_field('address', $data['done_position'], $order_id);
  }

  // Update Station number
  if (isset($data['done_station_number']) && $data['done_station_number']) {
    update_field('station_number', $data['done_station_number'], $order_id);
  }
}

/**
 * Updates order information to initiate a cron event.
 *
 * This function checks if the order ID is valid and retrieves the order object.
 * It extracts product IDs from the order items and checks if the user is subscribed
 * and if the order has not yet been processed by the ERP system. If conditions are met,
 * it sends a coupon for chosen products, updates the 'erp_request' meta to false,
 * and marks the order as sent to the ERP system.
 *
 * @param int $order_id The ID of the order to update and check.
 * @return array An array of product IDs if the order is valid, an empty array otherwise.
 */
function update_info_to_start_cron_event($order_id) {
  // Validate order ID
  if (!$order_id || !is_numeric($order_id)) {
    return;
  }

  // Get the order
  $order = wc_get_order($order_id);
  if (!$order || !is_a($order, 'WC_Order')) {
    return;
  }

  // Get product IDs from order
  $items = $order->get_items();
  $product_id_array = [];

  foreach ($items as $item) {
    if (!is_a($item, 'WC_Order_Item_Product')) {
      continue;
    }

    $product_id = $item->get_product_id();
    $variation_id = $item->get_variation_id();
    $product_id_array[] = $variation_id ? $variation_id : $product_id;
  }

  // Get the user who placed the order
  $user_id = $order->get_user_id();
  if (!$user_id) {
    return; // Skip guest orders
  }

  $subscribed = (bool) get_user_meta($user_id, 'geffen_subscription', true);
  $erp_sended = get_post_meta($order_id, 'erp_sended', true);

  // Proceed if not already sent to ERP
  if (!$erp_sended) {
    if ($subscribed) {
      send_coupon_chosen_product($order_id, $product_id_array);
    }

    update_post_meta($order_id, 'erp_request', 'false');

    // Update 'erp_sended' to true after all conditions are met and actions are taken
    update_erp_sended_meta_key( $order_id, true );
  }
}


/**
 * Create shipping array from posted data.
 *
 * @param array $data Posted data from checkout form.
 *
 * @return array Shipping array.
 */
function create_shipping_array($data) {
  if (empty($data)) { return; }

  return [
    'first_name'        => $data['billing_first_name'],
    'last_name'         => $data['billing_last_name'],
    'company'           => $data['billing_company'],
    'email'             => $data['billing_email'],
    'phone'             => $data['billing_phone'],
    'address_1'         => $data['billing_address_1'],
    'address_2'         => $data['billing_address_2'],
    'city'              => $data['billing_city'],
    'state'             => $data['billing_state'],
    'postcode'          => $data['billing_postcode'],
    'country'           => $data['billing_country'],
    'address_type'      => $data['billing_address_type'],
    'house_number'      => $data['billing_house_number'],
    'apartment_number'  => $data['billing_apartment_number']
  ];
}


/**
 * Create billing array from posted data.
 *
 * @param array $data Posted data from checkout form.
 *
 * @return array Billing array.
 */
function create_billing_array($data) {
  if (empty($data)) { return; }

  return [
    'first_name'        => $data['billing_first_name'],
    'last_name'         => $data['billing_last_name'],
    'company'           => $data['billing_company'],
    'email'             => $data['billing_email'],
    'phone'             => $data['billing_phone'],
    'address_1'         => $data['billing_address_1'],
    'address_2'         => $data['billing_address_2'],
    'city'              => $data['billing_city'],
    'state'             => $data['billing_state'],
    'postcode'          => $data['billing_postcode'],
    'country'           => $data['billing_country'],
    'address_type'      => $data['billing_address_type'],
    'house_number'      => $data['billing_house_number'],
    'apartment_number'  => $data['billing_apartment_number']
  ];
}

// Get cart discount amount
function get_cart_discount_amount() {
  global $woocommerce;

  // Get cart object
  $cart = $woocommerce->cart;

  // Get cart total discount
  $cart_discount = $cart->get_cart_discount_total();

  return $cart_discount;
}

// Create CRM Order on Thank you page after order
function create_crm_order_on_thankyou($order_id) {
  // Get the order
  $order = wc_get_order($order_id);

  // Get user ID
  $user_id = $order->get_user_id();

  // Get shipping method
  $shipping_method = '';

  // Get the shipping methods for the order
  $shipping_items = $order->get_items('shipping');
  $shipping_name = '';

  // Loop through shipping items to get the method ID and instance ID
  foreach ($shipping_items as $shipping_item) {
    // Check if user is admin or club member
    $user = wp_get_current_user();
    $is_admin = in_array('administrator', (array) $user->roles);
    $is_club_member = in_array('club_member', (array) $user->roles);

    // Get the shipping method ID and instance ID
    $shipping_method_id = $shipping_item->get_method_id();
    $shipping_instance_id = $shipping_item->get_instance_id();

    // Combine them to form 'method_id:instance_id' format
    $shipping_method = $shipping_method_id . ':' . $shipping_instance_id;
    $shipping_title = $shipping_item->get_method_title();
    $shipping_total = $shipping_item->get_total();
  }

  $shipping_sku = 0;

  // Shipping code for crm
  switch ($shipping_method) {
    case 'local_pickup:3':
      $shipping_code = 6;
      break;
    case 'local_pickup:6':
      $shipping_code = 65;
      break;
    case 'flat_rate:4':
      $shipping_code = 14;
      $shipping_sku = 2554;
      break;
    case 'flat_rate:5':
      $shipping_code = 2;
      $shipping_sku = 2562;
      break;
  }

  $crm_order = array();
  $is_club_member = get_user_meta($user_id, 'geffen_subscription', true);
  $variation_products = []; // Initialize the array for variation products
  $variation_products_852_633 = []; // Initialize the array for variation products
  $qty_866 = 0;
  $product_discount_866 = 0;
  $qty_867 = 0;
  $product_discount_867 = 0;
  $qty_852 = 0;
  $product_discount_852 = 0;
  $qty_633 = 0;
  $product_discount_633 = 0;

  $product_ids = array();

  foreach ($order->get_items() as $item_id => $item) {
    $product_ids[] = $item->get_product_id();
  }

  // Add products to the order
  foreach ($order->get_items() as $item_id => $item) {
    $product = $item->get_product();
    $parent_id = $product->get_parent_id();
    $product_id = $product->get_id();
    $product_sku = $product->get_sku() ?: '';
    $regular_total = $product->get_regular_price() * $item->get_quantity();
    $item_total = $item->get_subtotal();
    $discount = $regular_total - $item_total;
    $quantity_value = $item->get_quantity();
    $quantity_special = $quantity_value;

    $ids_for_866 = [3335, 3336];
    $ids_for_867 = [9679, 3566, 4134, 9679, 4263];
    $ids_for_3870 = [9752, 4471, 4473, 3880, 3881, 3882, 3883, 3884, 3885, 3886, 3887, 3888, 3889, 3890, 3891, 3892, 3895, 3896, 3897, 3898, 3899, 3900, 3901, 3902, 3903, 3904, 3905, 3906, 3907, 3908, 3909, 3910, 3911, 3912, 3913, 3914, 3915, 3916, 3917, 3918, 3919, 3920, 3921, 3922, 3923];

    $special_products = [
      '3494' => 6,
      '9679' => 12,
      '3566' => 12,
      '4134' => 12
    ];

    // Get product tags
    $product_tags = wp_get_post_terms($product_id, 'product_tag', ['fields' => 'names']);
    $first_tag = !empty($product_tags) ? $product_tags[0] : false;
    $club_price = null;

    // Handle special product quantity
    if (array_key_exists($product_id, $special_products)) {
      $price = number_format($product->get_regular_price(), 2, '.', '') / $special_products[$product_id];
      $quantity_special = $quantity_value * $special_products[$product_id];
    } else {
      $price = number_format($product->get_regular_price(), 2, '.', '');
    }

    if (($is_club_member || $is_admin) && !$product->is_on_sale() && !array_key_exists($product_id, $special_products)) {
      $club_price = !$product->is_type('variation')
                    ? get_post_meta($product_id, 'club_price', true)
                    : get_post_meta($product_id, '_club_price_variation', true);

      if (!empty($club_price)) {
        $price = number_format($club_price, 2, '.', '');
      }
    }

    // Add product to CRM order
    add_crm_order($crm_order, (string)$product_sku, $quantity_special, $price);

    if ($parent_id) {
      if ($parent_id === 866) {
        $qty_866 += $quantity_value;
        $product_discount_866 += $discount;
        $variation_products[$parent_id] = [
          'quantity' => $qty_866,
          'price' => $price,
          'discount' => $product_discount_866
        ];
      }

      if ($parent_id === 867) {
        $qty_867 += $quantity_value;
        $product_discount_867 += $discount;
        $variation_products[$parent_id] = [
          'quantity' => $qty_867,
          'price' => $price,
          'discount' => $product_discount_867
        ];
      }

      // if ($parent_id === 852) {
      //   $qty_852 += $quantity_value;
      //   $product_discount_852 += $discount;
      //   $variation_products_852_633[$parent_id] = [
      //     'quantity' => $qty_852,
      //     'price' => $price,
      //     'discount' => $product_discount_852
      //   ];
      // }

      // if ($parent_id === 633) {
      //   $qty_633 += $quantity_value;
      //   $product_discount_633 += $discount;
      //   $variation_products_852_633[$parent_id] = [
      //     'quantity' => $qty_633,
      //     'price' => $price,
      //     'discount' => $product_discount_633
      //   ];
      // }
    }

    if (($is_club_member || $is_admin) && empty($club_price)) {
      if ($parent_id === 3870) {
        if (in_array($product_id, $ids_for_3870)) {
          handle_ids_for_3870($crm_order, $quantity_value, $product_id);
        }
      }

      // Product rules map
      // mode: 'coupon' —We give out coupons; 'discount' -old discount logic
      // block_size: How many goods are needed for 1 "block" (for example, 3 pcs. => 1 coupon)
      // coupon_qty: how many coupons we give out for 1 block
      // coupon_price: The price of the coupon (usually 0.00, but you can change if necessary)
      $product_rules = [
        1857 => [
          'tag' => '40201-3',
          'mode' => 'coupon',
          'block_size' => 3,
          'coupon_qty' => -1,
        ],
        890 => [
          'tag' => '7165670-1',
          'mode' => 'discount',
        ],
        9890 => [
          'tag' => '202001300003-1',
          'mode' => 'discount',
        ],
      ];

      // ---- main logic ----
      if (isset($product_rules[$product_id])) {
        $rule = $product_rules[$product_id];
        $tag = $rule['tag'];
        $quantity = (int) $item->get_quantity();

        if ($rule['mode'] === 'coupon') {
          $blockSize = max(1, (int) ($rule['block_size'] ?: 1));
          $perBlock = (int) ($rule['coupon_qty'] ? $rule['coupon_qty'] : 1);
          if ($perBlock === 0) {
            $perBlock = 1;
          }

          // how many full blocks fit into the cart quantity
          $blocks = intdiv($quantity, $blockSize);
          $coupon_qty = $blocks * $perBlock;

          if ($coupon_qty !== 0) {
            $unit_price = 0;
            if ($coupon_qty !== 0 && $discount) {
              // Divide the discount by the number of coupons, always a positive number
              $unit_price = $discount / abs($coupon_qty);
            }
            add_crm_order($crm_order, $tag, $coupon_qty, $unit_price);
          }
        } else {
          // default discount logic for other mapped products
          $discount_per_item = calculate_discount_per_item($discount, $quantity);
          // keep your existing negative line (or adjust as needed)
          add_crm_order($crm_order, $tag, -1, $discount, null, $product_sku);
        }
      }

      // product id 888 x4
      // if (in_array(888, $product_ids)) {
      //   if ($product_id === 888 && $quantity_value >= 4) {
      //     // Calculate the dynamic value based on multiples of 4
      //     $dynamic_value = -1 * floor($quantity_value / 4);

      //     // Call add_crm_order with the calculated value
      //     add_crm_order($crm_order, '7869001-2', $dynamic_value, 180);
      //   }
      // }

      // product id 888 x3
      // $required_ids = [888, 891];
      // $matching_ids = array_intersect($required_ids, $product_ids);

      // if (count($matching_ids) === count($required_ids)) {
      //   if ($product_id === 888 && $quantity_value === 3) {
      //     add_crm_order($crm_order, '7869001-1', -1, 80);
      //   }
      // }
    }

    // product Libre - ערכת 6 חיישנים פריסטייל ליברה 2 - 1500
    if ($discount && $product_id == 3494 && empty($club_price)) {
      $price_discount = $discount / $quantity_value;
      add_crm_order($crm_order, '7876101-110', -$quantity_value, $price_discount);
    }
  }

  if (($is_club_member || $is_admin) && $variation_products_852_633) {
    foreach ($variation_products_852_633 as $prod_id => $item) {
      if ($item['quantity'] >= 2) {
        // Calculate the dynamic value based on multiples of 4
        $dynamic_value = -1 * floor($item['quantity'] / 2);

        // Call add_crm_order with the calculated value
        add_crm_order($crm_order, '40251-1', $dynamic_value, 35);
      }
    }
  }


  if (($is_club_member || $is_admin) && $variation_products) {
    foreach ($variation_products as $prod_id => $item) {
      if ($prod_id === 867) {
        // Logic for special products in ids_for_867
        handle_special_product($crm_order, $item['quantity'], $item['discount']);
      } elseif ($prod_id === 866) {
        // Logic for ids_for_866
        handle_ids_for_866($crm_order, $item['quantity']);
      }
    }
  }

  // Get cart discount rules from WooCommerce Dynamic Pricing & Discounts plugin
  $cart_discount_rules = rp_wcdpd_get_cart_discount_rules_applied_to_order($order_id);

  // Initialize an array to hold cart discount titles
  $cart_discount_titles = array();

  // Loop through each rule to get its title
  foreach ($cart_discount_rules as $rule) {
    $cart_discount_titles[] = $rule['title'];
  }

  // Combine cart discount titles with other coupon titles from WooCommerce
  $all_rules_titles = implode(', ', $cart_discount_titles);

  // Initialize an array to hold coupon titles
  $coupon_titles = '';

  // Get applied coupons from the order
  $applied_coupons = $order->get_coupon_codes();

  // Check if any coupons are applied
  if (!empty($applied_coupons)) {
    // If coupons are applied, add their titles to $coupon_titles
    $coupon_titles = '; קופונים בשימוש: ' . implode(', ', $applied_coupons);
  }

  // Get cart discount from the order
  $cart_discount = $order->get_discount_total();

  // Add Shipping cost
  if ($shipping_sku) {
    $crm_order[] = [
      'PARTNAME' => (string)$shipping_sku,
      'TQUANT' => 1,
      'VPRICE' => (float)number_format($shipping_total, 2, '.', ''),
      'DUEDATE' => date('c'),
      'PERCENT' => null,
      'REMARK1' => null,
      'REMARK2' => null
    ];
  }

  // Add cart discount if present
  if ($cart_discount > 0) {
    // Initialize the discount array
    $discount_item = [
      'PARTNAME' => '11119-1', // Part name or code for the discount
      'TQUANT'   => -1, // Quantity set as -1 to denote a discount
      'VPRICE'   => (float) number_format($cart_discount, 2, '.', ''), // Format the discount value
      'DUEDATE'  => date('c'), // Current date in ISO 8601 format
      'PERCENT'  => null, // No percentage discount provided
      'REMARK1'  => null, // Optional remark field left empty
      'REMARK2'  => null  // Optional remark field left empty
    ];

    // Add the discount item to the CRM order
    $crm_order[] = $discount_item;
  }

  // Get the total price of the order
  $order_total = $order->get_total();

  // Get the value of the custom meta field 'cc_order_token'
  $cc_order_token = $order->get_meta('cc_order_token');

  // Get the last 4 characters of the cc_order_token
  $card_last_four_digits = substr($cc_order_token, -4);

  // Get the value of the custom meta field 'w2t_npay'
  $w2t_npay = $order->get_meta('w2t_npay');
  $paycode = '01';

  switch ($w2t_npay) {
    case '0':
      $paycode = '01';
      break;
    case '1':
      $paycode = '16';
      break;
    case '2':
      $paycode = '17';
      break;
  }

  $address = null;
  $city = null;
  $postcode = null;
  $billing_phone = $order->get_billing_phone();
  $phone_number = get_user_meta($user_id, 'geffen_phone', true);
  $email = $order->get_billing_email();

  if ($shipping_code == 14) {
    // Get custom fields for shipping
    $shipping_house_number = $order->get_meta('_shipping_house_number');
    $shipping_apartment_number = $order->get_meta('_shipping_apartment_number');
    $shipping_address_1 = $order->get_shipping_address_1();
    $shipping_city = $order->get_shipping_city();
    $shipping_postcode = $order->get_shipping_postcode();
    $shipping_phone = $order->get_shipping_phone();

    // Get custom fields for billing
    $billing_house_number = $order->get_meta('_billing_house_number');
    $billing_apartment_number = $order->get_meta('_billing_apartment_number');
    $billing_address_1 = $order->get_billing_address_1();
    $billing_city = $order->get_billing_city();
    $billing_postcode = $order->get_billing_postcode();
    $email = $order->get_billing_email();

    // Conditionally set the address fields
    if ($shipping_address_1) {
      $city = $shipping_city;
      $address = $shipping_address_1 . ' ' . $shipping_house_number;
      $address2 = ' דירה ' . $shipping_apartment_number;
      $postcode = $shipping_postcode;
      $phone_number = $shipping_phone ? $shipping_phone : $billing_phone;
    } else {
      $city = $billing_city;
      $address = $billing_address_1 . ' ' . $billing_house_number . ' דירה ' . $billing_apartment_number;
      $address2 = ' דירה ' . $billing_apartment_number;
      $postcode = $billing_postcode;
    }
  }

  if ($shipping_code == 2) {
    $country_area = get_field('country_area', $order_id);
    $done_city = get_field('city', $order_id);
    $done_address = get_field('address', $order_id);

    $address = null;
  }

  // Get customer information
  $full_name = str_replace("'", "~", $order->get_formatted_billing_full_name());
  $first_name = str_replace("'", "~", $order->get_billing_first_name());

  // $geffen_subscription = get_user_meta($user_id, 'geffen_subscription', true) ? 'Y' : 'N';
  $geffen_subscription = 'Y';
  $user_crm_id = get_user_meta($user_id, 'user_crm_id', true);
  $custname_id = get_post_meta($order_id, 'CUSTNAME_ID', true);
  $params = [];
  $response = [];

  $CUSTNAME = $user_crm_id ? $user_crm_id : $custname_id;

  // Create order in CRM
  if (!empty($CUSTNAME)) {
    $params = [
      'CUSTNAME' => $CUSTNAME,
      'NAME' => null,
      'CURDATE' => null,
      'ORDSTATUSDES' => null,
      'DETAILS' => null,
      'STCODE' => (string)$shipping_code,
      'BOOKNUM' => (string)$order_id,
      'AGENTCODE' => '242-1',
      'BONUSFLAG' => $geffen_subscription,
      'WARHSNAME' => '79',
      // 'PAYCODE' => $paycode,
      'QPRICE' => (float)number_format($order_total, 2, '.', ''),
      'CODE' => 'ש"ח',
      'ORDERITEMS_SUBFORM' => $crm_order,
      'SHIPTO2_SUBFORM' => [
        'CUSTDES' => $full_name,
        'NAME' => $first_name,
        'PHONENUM' => $phone_number,
        'EMAIL' => $email,
        'CELLPHONE' => $phone_number,
        'ADDRESS' => $address,
        'ADDRESS2' => $address2,
        'ADDRESS3' => null,
        'STATE' => $city,
        'ZIP' => $postcode
      ],
      'PAYMENTDEF_SUBFORM' => [
        'PAYMENTCODE' => '7',
        'PAYACCOUNT' => $card_last_four_digits,
        'VALIDMONTH' => $order->get_meta('cc_expdate'),
        'IDNUM' => '',
        'PAYCODE' => $paycode,
        'QPRICE' => (float)number_format($order_total, 2, '.', ''),
      ]
    ];

    // Done Station number
    if ($shipping_code == 2) {
      $station_number = get_field('station_number', $order_id);
      if ($station_number) {
        $params['SHIPTO2_SUBFORM']['ESTR_DEST'] = (string)$station_number;
      }
    }
  }

  if ( $params ) {
    // Call the function to create the order in CRM
    $crm_resp = create_sales_order($params);

    // Decode JSON response to an associative array
    $crm_resp = json_decode($crm_resp, true);

    $log = [
      [
        'message' => 'Create Sales Order',
        'params_sended' => $params,
        'crm_resp' => $crm_resp
      ],
    ];

    log_data($log, $subdir = 'create-sales-order');

    // Get the 'ORDNAME' from the response and save it as meta for the order
    $ordname = isset($crm_resp['ORDNAME']) ? $crm_resp['ORDNAME'] : false;

    if ($ordname) {
      // Assuming $order_id is defined earlier
      update_post_meta($order_id, 'ordname', $ordname);
    } else {
      // Handle the case where 'ORDNAME' is not found in the response
      error_log('ORDNAME not found in CRM response.');
    }

    // Call the function for CRM response
    send_error_email('1. CRM Response', print_r($params, true), $crm_resp);

    if (!empty($crm_resp['FORM']['InterfaceErrors'])) {
      update_post_meta($order_id, 'erp_request', 'true');
      return $response;
    }

    $response = [
      'crm_resp' => $crm_resp
    ];

    $log = [
      'message' => '1. CRM Response',
      'params_send' => $params,
      'crm_resp' => $crm_resp
    ];

    log_data($log, $subdir = 'create-orders');
  }

  return $response;
}

// Function to send error email
function send_error_email($name, $params_sent, $response_data) {
  // Set up the email details
  $to = ['eli@segevsolutions.com', 'roman@bsx.co.il'];
  $subject = __('הודעת שגיאה ב-CRM', 'geffen');

  // Prepare the error message with all required parameters
  $error_code = isset($response_data['code']) ? $response_data['code'] : 'Unknown';
  $error_message = isset($response_data['message']) ? $response_data['message'] : 'No message provided';

  $body = sprintf(
    __("From Request:<br>\n%s<br><br>\n\nParameters Sent to CRM:<br>\n%s<br><br>\n\nנתוני תגובה:<br>\n%s", 'geffen'),
    $name,
    print_r($params_sent, true),
    print_r($response_data, true)
  );

  $headers = get_header_for_email();

  // Send the email
  wp_mail($to, $subject, $body, $headers);
}

// ---- helper ----
/**
 * Push a line into the CRM order array.
 * @param array  $crm_order   Accumulator (by ref)
 * @param string $partname    PARTNAME code for CRM
 * @param int    $quantity    Quantity (can be negative for discount lines)
 * @param float  $price       Unit price (0 for free coupon)
 * @param float  $discount    (unused; kept for compatibility)
 * @param string $product_sku (unused; kept for compatibility)
 */
function add_crm_order(&$crm_order, $partname, $quantity, $price, $discount = 0, $product_sku = '')
{
  $args = [
    'PARTNAME' => $partname,
    'TQUANT' => (int) $quantity,
    'VPRICE' => (float) number_format((float) $price, 2, '.', ''),
    'DUEDATE' => date('c'),
    'PERCENT' => null,
    'REMARK1' => null,
    'REMARK2' => null,
  ];
  $crm_order[] = $args;
}

// Helper function to calculate discount per item
function calculate_discount_per_item($discount, $quantity) {
  return number_format($discount / $quantity, 2, '.', '');
}

// Handle logic for special products in ids_for_867
function handle_special_product(&$crm_order, $quantity_value, $discount) {
  // Define partnames based on quantity ranges
  if ($quantity_value == 1) {
    add_crm_order($crm_order, '13143-6', -1, 40);
  } elseif ($quantity_value == 2) {
    add_crm_order($crm_order, '13143-8', -1, 120);
  } elseif ($quantity_value == 3) {
    // Split into 2 and 1
    add_crm_order($crm_order, '13143-8', -1, 120);
    add_crm_order($crm_order, '13143-6', -1, 40);
  } elseif ($quantity_value == 4) {
    add_crm_order($crm_order, '13143-9', -1, 261);
  } elseif ($quantity_value >= 5) {
    // Add one for 13143-9 for sets of 4, and remainder as 13143-6
    if ($quantity_value%4 === 0) {
      $qty = $quantity_value / 4;
      add_crm_order($crm_order, '13143-9', -$qty, 261);
    } else {
      $times_4 = intdiv($quantity_value, 4);
      if ($times_4 > 0) {
        add_crm_order($crm_order, '13143-9', -$times_4, 261);
      }

      $remainder = $quantity_value % 4;

      if ($remainder%2 === 0) {
        $qty = $remainder / 2;
        add_crm_order($crm_order, '13143-8', -$qty, 120);
      } else {
        $times_2 = intdiv($remainder, 2);
        $remainder = $quantity_value % 2;

        if ($times_2) {
          add_crm_order($crm_order, '13143-8', -$times_2, 120);
        }

        if ($remainder > 0) {
          add_crm_order($crm_order, '13143-6', -$remainder, 40);
        }
      }
    }

  }
}

// Handle logic for ids_for_866
function handle_ids_for_866(&$crm_order, $quantity_value) {
  // If divisible by 3, create a single order with partname 13145-7 or 13145-8 for special quantities

  $times_12 = intdiv($quantity_value, 12);
  $remainder = $quantity_value % 12;
  $times_3 = intdiv($remainder, 3);

  if ($times_12 > 0) {
    add_crm_order($crm_order, '13145-8', -($times_12), 79);
  }

  // Add order for the full sets of 3 with partname 13145-7
  if ($times_3 > 0) {
    add_crm_order($crm_order, '13145-7', -($times_3), 13.5);
  }
}

// Function to handle logic for ids_for_3870
function handle_ids_for_3870(&$crm_order, $quantity_value, $product_id) {
  // Variable for the accumulation of the total number of free goods
  $total_free_items_11112_9 = 0;
  $total_free_items_11112_8 = 0;

  // If the amount of goods from 6 to 10 inclusive, add one free product with code 11112-8
  if ($quantity_value >= 6 && $quantity_value <= 10) {
    $total_free_items_11112_8 = 1;
    add_crm_order($crm_order, '11112-8', -$total_free_items_11112_8, 3);
    return;
  }

  // We calculate the number of full groups of 11 goods starting from 11 goods
  if ($quantity_value > 10) {
    $group_count = floor(($quantity_value - 10) / 11);
    $remaining_items = ($quantity_value - 10) % 11;

    // Accumulation of the number of free goods from full groups
    if ($group_count > 0) {
      for ($i = 1; $i <= $group_count; $i++) {
        $total_free_items_11112_9 += $i; // The number of free goods is growing with each group
      }
    }

    // Add free goods based on the balance of goods
    if ($remaining_items >= 1 && $remaining_items <= 4) {
      $total_free_items_11112_9 += $remaining_items;
    } elseif ($remaining_items >= 5) {
      $total_free_items_11112_9 += 5;
    }

    // Добавляем бесплатные товары с кодом 11112-9
    if ($total_free_items_11112_9 > 0) {
      add_crm_order($crm_order, '11112-9', -$total_free_items_11112_9, 12);
    }
  }
}