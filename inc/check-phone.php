<?php

/**
 * Check phone number on Check Phone Page
 */
function geffen_check_phone()
{
  $formData = $_POST['formData'];

  // Parse the serialized form data into an associative array
  parse_str($formData, $parsedData);

  // Access the phone number
  $phone_number = $parsedData['phone'];

  // Generate the verification code and message
  $code = mt_rand(100000, 999999);
  $message = $code . ' ' . __('הוא קוד האימות החד פעמי שלך', 'geffen');

  // Set up SMS parameters and send the SMS
  $parameters = sms_params($message, $phone_number);
  $response = send_sms($parameters);

  // Check if the response indicates success
  if (strpos($response, '<SendMessageReturnValues xmlns="http://www.smscenter.co.il/">OK</SendMessageReturnValues>') !== false) {
    // Store the code in a transient for 15 minutes (900 seconds)
    set_transient('phone_verification_code_' . $phone_number, $code, 900);

    // Return a success message
    echo json_encode(['success' => true, 'message' => __('Verification code sent successfully', 'geffen'), 'phone' => $phone_number]);
  } else {
    // Return an error message if SMS failed
    echo json_encode(['success' => false, 'message' => __('Failed to send verification code', 'geffen')]);
  }

  wp_die(); // Terminate the script
}

add_action('wp_ajax_geffen_check_phone', 'geffen_check_phone');
add_action('wp_ajax_nopriv_geffen_check_phone', 'geffen_check_phone');

/**
 * Confirm code on Check Phone Page
 */
function geffen_confirm_phone_code()
{
  $formData = $_POST['formData'];

  // Parse the serialized form data into an associative array
  parse_str($formData, $parsedData);

  // Access the code
  $code = $parsedData['code'];

  // Access the phone number
  $phone_number = $parsedData['phone'];

  $transient_name = 'phone_verification_code_' . $phone_number;
  $verification_code = get_transient($transient_name);

  if ($code === $verification_code) {
    // Return a success message
    echo json_encode(['success' => true, 'message' => __('Verification code is confirmed', 'geffen')]);
  } else {
    // Return an error message if SMS failed
    echo json_encode(['success' => false, 'message' => __('Failed to confirm verification code', 'geffen')]);
  }

  wp_die(); // Terminate the script
}

add_action('wp_ajax_geffen_confirm_phone_code', 'geffen_confirm_phone_code');
add_action('wp_ajax_nopriv_geffen_confirm_phone_code', 'geffen_confirm_phone_code');
