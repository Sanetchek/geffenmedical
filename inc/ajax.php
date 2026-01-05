<?php

/**
 * Logs data to a file in the WordPress uploads directory.
 *
 * This function saves a provided data object to a log file within the 'geffen-logs'
 * directory under the WordPress uploads directory. A subdirectory can be specified
 * to further categorize logs. Each log entry is timestamped and appended to a
 * daily log file. The log directory and file are created with 777 permissions if
 * they do not already exist.
 *
 * @param mixed  $data   The data to be logged, which will be encoded as JSON.
 * @param string $subdir Optional. A subdirectory to append to the log directory.
 */

function log_data($data, $subdir = '') {
  // Get WordPress uploads directory
  $upload_dir = wp_upload_dir();
  $log_dir = trailingslashit($upload_dir['basedir']) . 'geffen-logs/';

  // If a subdirectory is provided, append it to the log directory
  if (!empty($subdir)) {
    $log_dir .= trailingslashit($subdir);
  }

  // Ensure the directory exists
  if (!file_exists($log_dir)) {
    wp_mkdir_p($log_dir);
    chmod($log_dir, 0777); // Set permissions to 777 for the directory
  }

  // Log file name with current date
  $log_file = $log_dir . 'log-' . date('Y-m-d') . '.log';

  // Create log entry
  $log_entry = '[' . date('Y-m-d H:i:s') . '] ' . json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . PHP_EOL;

  // Write log to file
  file_put_contents($log_file, $log_entry, FILE_APPEND);

  // Ensure the log file has 777 permissions
  chmod($log_file, 0777);
}


/**
 * Handler for FAQ Search Form
 */
function handle_faq_form()
{
  // Get form data
  $s = sanitize_text_field($_POST['search']);

  // Variables
  $response = [];

  $args = array(
    'post_type' => 'fl_faq',
    'posts_per_page' => -1,
    's' => $s
  );

  $custom_posts = get_posts($args);
  $per_page = 10;
  $faq_count = 0;
  $pages = 1;
  $current = ' active';

  foreach ($custom_posts as $post):

    if (($faq_count % $per_page) === 0):
      $response['template'] .= '<section id="paginated_content_' . $pages . '" class="paginated-content' . $current . '">';

      $current = '';
      $pages++;

    endif;

    $response['template'] .= '<div class="faq-category-post">';
    $response['template'] .= '<h3 class="faq-category-title">' . $post->post_title . '</h3>';
    $response['template'] .= '<div class="faq-category-text">' . $post->post_content . '</div>';
    $response['template'] .= '</div>';

    if (($faq_count % $per_page) === ($per_page - 1)):
      $response['template'] .= '</section>';
    endif;

    $faq_count++;

  endforeach;

  if (($pages - 1) > 1):
    $response['template'] .= '<div class="paginated-pages" data-pages="' . ($pages - 1) . '">';
    $response['template'] .= '<a href="javascript:void(0)" class="paginated-number page-next" data-page="2"> < </a>';

    for ($page = $pages - 1; $page > 0; $page--):
      $cur = $page == 1 ? ' current' : '';
      $response['template'] .= '<a href="javascript:void(0)" class="paginated-number paginated-count' . $cur . '" data-page="' . $page . '">' . $page . '</a>';
    endfor;

    $response['template'] .= '<a href="javascript:void(0)" class="paginated-number page-prev hidden" data-page="0"> > </a>';
    $response['template'] .= '</div>';
  endif;

  // Return a response
  wp_send_json($response);
  wp_die(); // This is required to terminate the script
}

add_action('wp_ajax_handle_faq_form', 'handle_faq_form');
add_action('wp_ajax_nopriv_handle_faq_form', 'handle_faq_form');

/**
 * Apply Coupon Code
 */
function geffen_apply_coupon()
{
  if (isset($_POST['coupon_codes'])) {
    $coupon_codes = $_POST['coupon_codes'];

    // Split the string of coupon codes into an array
    $coupon_codes_array = explode(',', $coupon_codes);

    // Apply each coupon code separately
    $success = true;
    foreach ($coupon_codes_array as $coupon_code) {
      $coupon_code = trim($coupon_code); // Remove any extra whitespace
      if (!WC()->cart->apply_coupon($coupon_code)) {
        $success = false;
        break; // If any coupon fails to apply, stop applying further coupons
      }
    }

    if ($success) {
      $response = array(
        'message' => 'Coupons applied successfully.',
        'cart_totals' => WC()->cart->get_totals(),
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
add_action('wp_ajax_apply_coupon', 'geffen_apply_coupon');
add_action('wp_ajax_nopriv_apply_coupon', 'geffen_apply_coupon');

// get template part like a string
function get_part_string($template_path)
{
  // Start output buffering
  ob_start();

  // Include template part
  get_template_part($template_path);

  // Assign buffered content to a variable
  return ob_get_clean();
}

/**
 * Save Done Fields
 */
function save_done_fields()
{
  $area = $_POST['area'];
  $city = $_POST['city'];
  $street = $_POST['street'];
  $number = $_POST['number'];
  $user_id = get_current_user_id();
  $response = [];

  if (isset($area)) {
    // Update the field value for the specific user
    update_field('country_area', $area, 'user_' . $user_id);
    $response['area'] = $area;
  }

  if (isset($city)) {
    // Update the field value for the specific user
    update_field('city', $city, 'user_' . $user_id);
    $response['city'] = $city;
  }

  if (isset($street)) {
    // Update the field value for the specific user
    update_field('address', $street, 'user_' . $user_id);
    $response['address'] = $street;
  }

  if (isset($number)) {
    // Update the field value for the specific user
    update_field('station_number', $number, 'user_' . $user_id);
    $response['station_number'] = $number;
  }

  echo json_encode($response);
  wp_die();
}
add_action('wp_ajax_save_done_fields', 'save_done_fields');
add_action('wp_ajax_nopriv_save_done_fields', 'save_done_fields');

// Save Billing form
function save_billing_fields($user_id, $formFields)
{
  if (isset($formFields['shipping_first_name'])) {
    update_user_meta($user_id, 'billing_first_name', sanitize_text_field($formFields['shipping_first_name']));
  }
  if (isset($formFields['shipping_last_name'])) {
    update_user_meta($user_id, 'billing_last_name', sanitize_text_field($formFields['shipping_last_name']));
  }
  if (isset($formFields['shipping_company'])) {
    update_user_meta($user_id, 'billing_company', sanitize_text_field($formFields['shipping_company']));
  }
  if (isset($formFields['shipping_street'])) {
    update_user_meta($user_id, 'billing_address_1', sanitize_text_field($formFields['shipping_street']));
  }
  if (isset($formFields['shipping_city'])) {
    update_user_meta($user_id, 'billing_city', sanitize_text_field($formFields['shipping_city']));
  }
  if (isset($formFields['shipping_postal'])) {
    update_user_meta($user_id, 'billing_postcode', sanitize_text_field($formFields['shipping_postal']));
  }
  if (isset($formFields['email'])) {
    update_user_meta($user_id, 'billing_country', sanitize_text_field($formFields['email']));
  }
  if (isset($formFields['shipping_phone'])) {
    update_user_meta($user_id, 'billing_phone', sanitize_text_field($formFields['shipping_phone']));
  }
  if (isset($formFields['shipping_email'])) {
    update_user_meta($user_id, 'billing_email', sanitize_email($formFields['shipping_email']));
  }
  if (isset($formFields['shipping_address_type'])) {
    update_user_meta($user_id, 'billing_address_type', sanitize_text_field($formFields['shipping_address_type']));
  }
  if (isset($formFields['shipping_house_number'])) {
    update_user_meta($user_id, 'billing_house_number', sanitize_text_field($formFields['shipping_house_number']));
  }
  if (isset($formFields['shipping_apartment'])) {
    update_user_meta($user_id, 'billing_apartment_number', sanitize_text_field($formFields['shipping_apartment']));
  }
}

// Save Shipping fields
function save_shipping_fields($user_id, $formFields)
{
  if (isset($formFields['shipping_first_name'])) {
    update_user_meta($user_id, 'shipping_first_name', sanitize_text_field($formFields['shipping_first_name']));
  }
  if (isset($formFields['shipping_last_name'])) {
    update_user_meta($user_id, 'shipping_last_name', sanitize_text_field($formFields['shipping_last_name']));
  }
  if (isset($formFields['shipping_company'])) {
    update_user_meta($user_id, 'shipping_company', sanitize_text_field($formFields['shipping_company']));
  }
  if (isset($formFields['shipping_street'])) {
    update_user_meta($user_id, 'shipping_address_1', sanitize_text_field($formFields['shipping_street']));
  }
  if (isset($formFields['shipping_city'])) {
    update_user_meta($user_id, 'shipping_city', sanitize_text_field($formFields['shipping_city']));
  }
  if (isset($formFields['shipping_postal'])) {
    update_user_meta($user_id, 'shipping_postcode', sanitize_text_field($formFields['shipping_postal']));
  }
  if (isset($formFields['email'])) {
    update_user_meta($user_id, 'shipping_country', sanitize_text_field($formFields['email']));
  }
  if (isset($formFields['shipping_phone'])) {
    update_user_meta($user_id, 'shipping_phone', sanitize_text_field($formFields['shipping_phone']));
  }
  if (isset($formFields['shipping_email'])) {
    update_user_meta($user_id, 'shipping_email', sanitize_email($formFields['shipping_email']));
  }
  if (isset($formFields['shipping_address_type'])) {
    update_user_meta($user_id, 'shipping_address_type', sanitize_text_field($formFields['shipping_address_type']));
  }
  if (isset($formFields['shipping_house_number'])) {
    update_user_meta($user_id, 'shipping_house_number', sanitize_text_field($formFields['shipping_house_number']));
  }
  if (isset($formFields['shipping_apartment'])) {
    update_user_meta($user_id, 'shipping_apartment_number', sanitize_text_field($formFields['shipping_apartment']));
  }
}

// Save Shipping form
function save_shipping_user_profile()
{
  // Check if form data exists
  if (!isset($_POST['formData']) || empty($_POST['formData'])) {
    wp_send_json_error(['message' => __('Form data missing', 'geffen')]);
    wp_die();
  }

  // Parse form data
  parse_str($_POST['formData'], $formFields);

  // Get the current user ID
  $user_id = get_current_user_id();

  // Check if user is logged in
  if (!$user_id) {
    wp_send_json_error(['message' => __('User not found. Please login', 'geffen')]);
    wp_die();
  }

  // Validate required fields
  $required_fields = [
    'shipping_first_name',
    'shipping_last_name',
    'shipping_phone',
    'shipping_email',
    'shipping_city',
    'shipping_street',
    'shipping_house_number',
    'shipping_apartment',
    'shipping_address_type'
  ];

  $missing_fields = [];
  foreach ($required_fields as $field) {
    if (empty($formFields[$field])) {
      $missing_fields[] = $field;
    }
  }

  if (!empty($missing_fields)) {
    wp_send_json_error(['message' => __('Please fill in all required fields', 'geffen')]);
    wp_die();
  }

  try {
    // Save shipping fields
    save_shipping_fields($user_id, $formFields);

    // Save billing user profile if meta is empty
    save_billing_fields($user_id, $formFields);

    // Handle WooCommerce cart operations only if WooCommerce is available and cart exists
    if (function_exists('WC') && WC()->cart && !WC()->cart->is_empty()) {
      // Handle coupons if provided
      $coupon_codes = isset($_POST['coupons']) && !empty($_POST['coupons']) ? sanitize_text_field($_POST['coupons']) : '';
      if (!empty($coupon_codes)) {
        // Check if add_multiple_coupons function exists
        if (function_exists('add_multiple_coupons')) {
          add_multiple_coupons($coupon_codes);
        }
      }

      // Update shipping method if provided and WooCommerce session is available
      $shipping_method = isset($_POST['shipping_method']) && !empty($_POST['shipping_method']) ? sanitize_text_field($_POST['shipping_method']) : '';
      if (!empty($shipping_method) && WC()->session) {
        WC()->session->set('chosen_shipping_methods', array($shipping_method));
        WC()->cart->calculate_shipping();
      }

      // Update total
      WC()->cart->calculate_totals();
    }

    // Get review order HTML if function exists and we're on checkout page
    $review_order = '';
    if (function_exists('get_part_string')) {
      $review_order = get_part_string('template-parts/checkout-one-page/review-order');
    }

    // Prepare response data
    $response_data = [
      'name' => isset($formFields['shipping_first_name']) && isset($formFields['shipping_last_name'])
        ? sanitize_text_field($formFields['shipping_first_name']) . ' ' . sanitize_text_field($formFields['shipping_last_name'])
        : '',
      'city' => isset($formFields['shipping_city']) ? sanitize_text_field($formFields['shipping_city']) : '',
      'address' => isset($formFields['shipping_street']) ? sanitize_text_field($formFields['shipping_street']) : '',
    ];

    if (!empty($review_order)) {
      $response_data['review_order'] = $review_order;
    }

    wp_send_json_success($response_data);
    wp_die();

  } catch (Exception $e) {
    wp_send_json_error(['message' => __('An error occurred while saving data: ', 'geffen') . $e->getMessage()]);
    wp_die();
  }
}
add_action('wp_ajax_save_shipping_user_profile', 'save_shipping_user_profile');
add_action('wp_ajax_nopriv_save_shipping_user_profile', 'save_shipping_user_profile');

// Save shipping_checkbox into user profile
function save_shipping_checkbox()
{
  if (isset($_POST['isChecked'])) {
    $isChecked = $_POST['isChecked'];

    $current_user = wp_get_current_user();
    $user_id = $current_user->ID;

    // Update the user meta for 'shipping_checkbox' field
    update_user_meta($user_id, 'shipping_checkbox', $isChecked);

    // Send a success response back
    wp_send_json_success('Checkbox state updated successfully.');
  } else {
    // Send an error response if data is missing
    wp_send_json_error('Checkbox state data missing.');
  }
}
add_action('wp_ajax_save_shipping_checkbox', 'save_shipping_checkbox');
add_action('wp_ajax_nopriv_save_shipping_checkbox', 'save_shipping_checkbox');

/**
 * Create user in WPDB
 *
 * @param [type] $user_id
 * @param [type] $phone_number
 * @return void
 */
function create_user_wpdb($phone_number)
{
  $random_password = wp_generate_password(12);
  $new_user_id = wp_create_user($phone_number, $random_password);

  update_user_meta($new_user_id, 'first_name', $phone_number); // Save custom fields
  update_user_meta($new_user_id, 'billing_phone', $phone_number); // Save custom fields
  update_user_meta($new_user_id, 'phone_number', $phone_number); // Save custom fields
  update_user_meta($new_user_id, 'geffen_phone', $phone_number); // Save custom fields

  if (!$new_user_id) {
    $message = __('אינך רשום למערכת ', 'geffen');
    wp_send_json(['success' => false, 'message' => $message]);
    return;
  }

  return $new_user_id;
}

/**
 * Generate sms parameters
 *
 * @param [type] $message
 * @param [type] $phone_number
 * @return []
 */
function sms_params($message, $phone_number)
{
  return [
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
    'SendToPhoneNumbers' => $phone_number
  ];
}

/**
 * Send SMS Code to phone number
 */
function login_by_phone() {
  if (isset($_POST['phone'])) {
    // Sanitize and process phone number
    $phone_number = sanitize_text_field($_POST['phone']);
    $phone_number = preg_replace('/(\W*)/', '', $phone_number); // Clear all symbols

    // Retrieve user ID from DB by phone number
    $users = get_user_id_by_phone_number($phone_number);
    $user_id = $users[0];
    $new_user_id = 0;
    $is_crm_multiaccount = false;

    // Authenticate user from CRM
    $auth = user_auth_by_phone($phone_number);

    // if we have multi accounts
    if (isset($_POST['account'])) {
      $account = $_POST['account'];
      if ($account && is_array($auth['value'])) {
        foreach ($auth['value'] as $option) {
          if ( isset($option['CUSTNAME']) && $option['CUSTNAME'] == $account ) {
            $USER_values = $option;
            break;
          }
        }
      }
    } else {
      $USER_values = (is_array($auth['value']) && isset($auth['value'][0])) ? $auth['value'][0] : [];
      $accounts = is_array($auth['value']) ? count($auth['value']) : 0;
      $is_crm_multiaccount = $accounts > 1;
    }

    // Check if user filled registration form in CRM
    $is_email_crm = $USER_values['EMAIL'] === null ? false : true;
    $is_policy_crm = $USER_values['MGEF_PRI_POLICY_FLAG'] === 'Y' ? true : false;
    $is_club_member = $USER_values['MGEF_MEMBERFLAG'] === 'Y' ? true : false;
    $new_user_crm = $USER_values['CUSTNAME'] ? $USER_values['CUSTNAME'] : '';
    $update_wp_message = '';

    // Check if user exists in CRM, if not, create new user
    if (!$auth['success']) {
      if (!$user_id) {
        // Create new user in WordPress
        $new_user_id = create_user_wpdb($phone_number);
      }
    } else {
      // Handle existing users in WordPress
      if (is_array($users) && count($users) > 1) {
        // Multiple users found in WordPress
        $message = __('מישהו נרשם עם מספר הטלפון שלך, צור קשר עם מנהל המערכת ', 'geffen');
        wp_send_json(['success' => false, 'message' => $message]);
      }

      if ($user_id) {
        // update crm id field
        update_user_meta($user_id, 'user_crm_id', $new_user_crm);
      } else {
        // Create new user in WordPress
        $new_user_id = create_user_wpdb($phone_number);
        // update crm id field
        update_user_meta($new_user_id, 'user_crm_id', $new_user_crm);
      }
    }

    // Send SMS
    $code = mt_rand(100000, 999999);
    $message = $code . ' ' . __('הוא קוד האימות החד פעמי שלך', 'geffen');
    $parameters = sms_params($message, $phone_number);
    $response = send_sms($parameters);

    // Handle response and save code to user profile
    if ($response !== false) {
      $user_id = $new_user_id ? $new_user_id : $user_id;
      update_user_meta($user_id, 'geffen_phone_code', $code);
    } else {
      wp_send_json(['success' => false, 'message' => __('שגיאה: שליחת SMS נכשלה.', 'geffen')]);
    }

    $user = new WP_User($user_id);
    if (!in_array('administrator', $user->roles)) {
      if ($is_club_member) {
        update_user_meta($user_id, 'geffen_subscription', true);
        $user->set_role('club_member');
      } else {
        update_user_meta($user_id, 'geffen_subscription', false);
        $user->set_role('customer');
      }

      if ($is_policy_crm) {
        update_user_meta($user_id, 'geffen_privacy_policy', true);
      } else {
        update_user_meta($user_id, 'geffen_privacy_policy', false);
      }
    }

    // update wp user profile with crm user id
    $new_user_crm = !$is_crm_multiaccount ? $new_user_crm : '';
    // Update or delete user meta based on the value
    if ($is_crm_multiaccount) {
      delete_user_meta($user_id, 'user_crm_id'); // Delete the meta if it's empty
      update_user_meta($user_id, 'geffen_privacy_policy', true);
    } else {
      update_user_meta($user_id, 'user_crm_id', $new_user_crm);
    }

    $is_user_crm = $is_email_crm && $is_policy_crm || $is_crm_multiaccount;

    $response = [
      'success' => true,
      'user' => $user_id,
      'crmUser' => $new_user_crm,
      'newUser' => !$is_user_crm,
      'club_member' => $is_club_member,
      'sms_response' => $response,
      'crm_value' => $USER_values,
      'update_wp_user' => $update_wp_message,
      'phone_number' => $phone_number,
      'user_in_crm' => $auth
    ];

    log_data($response, 'login-responses');

    $response = [
      'success' => true,
      'user' => $user_id,
      'crmUser' => $new_user_crm,
      'newUser' => !$is_user_crm,
      'club_member' => $is_club_member,
    ];
    // Send final JSON response
    wp_send_json($response);
  }
  wp_die();
}

add_action('wp_ajax_login_by_phone', 'login_by_phone');
add_action('wp_ajax_nopriv_login_by_phone', 'login_by_phone');

/**
 * Update user profile in WordPress
 */
function update_user_profile($user_id, $user_values) {
  $crm_id = $user_values['CUSTNAME'];
  $firstname = $user_values['FGEF_FIRSTNAME'];
  $lastname = $user_values['FGEF_LASTNAME'];
  $email = $user_values['EMAIL'];
  $subscription = $user_values['MGEF_MEMBERFLAG'] === 'Y' ? true : false;

  // update crm id field
  update_user_meta($user_id, 'user_crm_id', $crm_id);

  // Update the user first and last names in user meta
  update_user_meta($user_id, 'first_name', $firstname);
  update_user_meta($user_id, 'last_name', $lastname);

  // Update the user's billing details in user meta
  update_user_meta($user_id, 'billing_first_name', $firstname);
  update_user_meta($user_id, 'billing_last_name', $lastname);
  update_user_meta($user_id, 'billing_email', $email);

  // Update geffen_subscription based on $subscription value
  update_user_meta($user_id, 'geffen_subscription', $subscription);

  // Check if the email is already in use by another user
  if (email_exists($email) && email_exists($email) != $user_id) {
    // Handle the error appropriately in your application context
    return 'The email address is already in use: ' . $email;
  }

  // Update the user email and display name using wp_update_user
  $user_data = array(
    'ID'         => $user_id,
    'user_email' => $email,
    'display_name' => $firstname . ' ' . $lastname
  );
  $user_id = wp_update_user($user_data);

  // Check for errors
  if (is_wp_error($user_id)) {
    // There was an error; possibly this email is already taken
    $error_message = $user_id->get_error_message();
    // Handle the error appropriately in your application context
    return 'User update failed: ' . $error_message;
  }

  return 'User updated';
}
/**
 * Send SMS
 */
function send_sms($parameters) {
  $url = 'https://www.smscenter.co.il/Web/WebServices/SendMessage.asmx/SendMessagesV2';
  $body = http_build_query($parameters);
  $headers = ['Content-Type: application/x-www-form-urlencoded'];

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($ch);
  curl_close($ch);

  return $response;
}

/**
 * Login by email
 */
function login_by_email()
{
  $user_id = $_POST['userID'];
  $email = $_POST['email'];

  if (isset($user_id) && isset($email)) {
    $phone_code = get_user_meta($user_id, 'geffen_phone_code', true);

    $to = $email;
    $subject = 'קוד הגישה החד פעמי שלכם לאתר גפן ';
    $mail_message = __('Use this code to enter on site  - השתמש בקוד הגישה הזה לאימות באתר ', 'geffen') . "\r\n";
    $mail_message .= '<strong>' . $phone_code . '</strong>';

    // Send email with HTML content type
    $headers = get_header_for_email(); // return array with headers option

    $send = wp_mail($to, $subject, $mail_message, $headers);

    if ($send) {
      $message = __('קוד הגישה החד פעמי נשלח אלכתובת: ', 'geffen') . $email;
      wp_send_json(['success' => true, 'message' => $message]);
    }
  }

  wp_die();
}

add_action('wp_ajax_login_by_email', 'login_by_email');
add_action('wp_ajax_nopriv_login_by_email', 'login_by_email');

// Get Header for email
function get_header_for_email()
{
  return ['Content-Type: text/html; charset=UTF-8', 'From: GeffenMedical'];
}

/**
 * Login with generated Code
 */
function login_by_code()
{
  if (isset($_POST['code'])) {
    $user_id = sanitize_text_field($_POST['user']);
    $user_crm = sanitize_text_field($_POST['userCRM']);
    $code = sanitize_text_field($_POST['code']);
    $phone = sanitize_text_field($_POST['phone']);
    $phone_code = get_user_meta($user_id, 'geffen_phone_code', true);

    block_user_brute_force($user_id);

    if ($user_id != '0') {
      $code = intval($code);
      $phone_code = intval($phone_code);

      if ($code == $phone_code) {
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id);

        // Clear Code from user profile
        update_user_meta($user_id, 'geffen_phone_code', '');

        // get user info
        $user_info = get_userdata( $user_id );
        $first_name = $user_info->first_name;
        $last_name = $user_info->last_name;

        // Delete Brute force count
        delete_user_from_brute_force($user_id);

        $message = __('אינך רשום למערכת, הינך מועבר להרשמה', 'geffen');
        wp_send_json(['success' => true, 'message' => $message, 'notregister' => true, 'phone' => $phone, 'user' => $user_id, 'userName' => $first_name, 'userLastName' => $last_name, 'userCRM' => $user_crm]);
      } else {

        $message = __('הקוד שלך אינו חוקי ', 'geffen');
        wp_send_json(['success' => false, 'message' => $message]);

      }
    } else {

      $message = __('אינך רשום למערכת, הינך מועבר להרשמה', 'geffen');
      wp_send_json(['success' => false, 'message' => $message, 'notregister' => true, 'phone' => $phone]);

    }

  }

  wp_die();
}

add_action('wp_ajax_login_by_code', 'login_by_code');
add_action('wp_ajax_nopriv_login_by_code', 'login_by_code');
