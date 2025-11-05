<?php

/**
 * Default URL
 */
function crm_url() {
  return $_ENV['CRM_URL'];
}

/**
 * Headers
 */
function curlopt_header()
{
  $auth = $_ENV['CRM_AUTH'];

  return array(
    'Content-Type: application/json',
    'Authorization: Basic ' . $auth,
  );
}

/**
 * Get Existing User from CRM
 */
function get_existing_user_crm($phone_number) {
  $curl = curl_init();
  $filter = "%24filter=PHONE%20eq%20%27$phone_number%27%20or%20GEFN_PHONEA%20eq%20%27$phone_number%27%20or%20GEFN_PHONEB%20eq%20%27$phone_number%27%20or%20FAX%20eq%20%27$phone_number%27";
  $select = "%24select=CUSTNAME%2C%20FGEF_FIRSTNAME%2C%20FGEF_LASTNAME%2C%20PHONE%2C%20EMAIL%2C%20MGEF_MEMBERFLAG%2C%20MGEF_PRI_POLICY_FLAG";

  $url = crm_url() . "/medical/CUSTOMERS?$filter&$select";

  curl_setopt_array(
    $curl,
    array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => curlopt_header(),
    )
  );

  $json_string = curl_exec($curl);

  if (curl_errno($curl)) {
    // Handle curl error
    $res['success'] = false;
    $res['message'] = "cURL Error: " . curl_error($curl);
    curl_close($curl);
    return $res;
  }

  curl_close($curl);

  return $json_string;
}

/**
 * User Authentification by Phone Number
 */
function user_auth_by_phone($phone_number)
{
  $json_string = get_existing_user_crm($phone_number);

  // Decode the JSON string into an associative array
  $data = json_decode($json_string, true);

  if (empty($data['value'])) {
    // Add a hyphen after the first 3 digits
    $phone_number = preg_replace('/^(\d{3})(\d+)/', '$1-$2', $phone_number);
    // Authenticate user from CRM with new phone format 051-5555555
    $json_string = get_existing_user_crm($phone_number);

    // Decode the JSON string into an associative array
    $data = json_decode($json_string, true);
  }

  $res = [];

  // Check if decoding was successful
  if ($data === null) {
    $res['success'] = false;
    $res['message'] = "Error decoding JSON\n";
  }

  // Check if 'value' key exists and if it's an array
  if (!isset($data['value']) || !is_array($data['value'])) {
    $res['success'] = false;
    $res['message'] = "Error: 'value' key is missing or not an array\n";
  }

  // Access the 'value' array
  $values = $data['value'];

  // Check if there are any items in the 'value' array
  if (empty($values)) {
    $res['success'] = false;
    $res['message'] = "No data found\n";
  } else {
    $res['success'] = true;
    $res['message'] = "User Exist\n";
  }

  $res['data'] = $data;
  $res['value'] = $values;

  return $res;
}

/**
 * Create user by phone number in crm
 *
 * @param [type] $phone_number
 * @return void
 */
function create_user_in_crm($data)
{
  $curl = curl_init();

  $data_string = json_encode($data, JSON_PRESERVE_ZERO_FRACTION);

  curl_setopt_array($curl, array(
    CURLOPT_URL => crm_url() .'/medical/CUSTOMERS',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data_string,
    CURLOPT_HTTPHEADER => curlopt_header(),
  ));

  $response = curl_exec($curl);
  if (curl_errno($curl)) {
    $error_msg = curl_error($curl);
    curl_close($curl);
    return json_encode(['error' => 'cURL Error: ' . $error_msg]);
  }

  curl_close($curl);

  return $response;
}

/**
 * Create user by phone number in crm
 *
 * @param [type] $phone_number
 * @return void
 */
function create_user_by_phone($phone_number)
{
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => crm_url() .'/medical/CUSTOMERS',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
      "FGEF_FIRSTNAME": "Site",
      "FGEF_LASTNAME": "User",
      "PHONE": "' . $phone_number . '",
      "GEFN_PHONEA": null,
      "GEFN_PHONEB": null,
      "EMAIL": null,
      "ADDRESS": null,
      "ADDRESS2": null,
      "ADDRESS3": null,
      "STATE": null,
      "ZIP": null,
      "CTYPECODE": "70",
      "MGEF_MEMBERFLAG": "N",
      "MGEF_PRI_POLICY_FLAG": "N"
  }',
    CURLOPT_HTTPHEADER => curlopt_header(),
  )
  );

  $response = curl_exec($curl);

  curl_close($curl);

  // Decode the JSON string into an associative array
  $data = json_decode($response, true);

  return $data['CUSTNAME'];
}

/**
 * Update Existing Customer
 *
 * @return void
 */
function update_existing_customer($customer = '100051', $data = array())
{
  $curl = curl_init();

  $url = crm_url() . '/medical/CUSTOMERS(\''.$customer.'\')';

  $data_string = json_encode($data, JSON_PRESERVE_ZERO_FRACTION);

  curl_setopt_array(
    $curl,
    array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PATCH',
      CURLOPT_POSTFIELDS => $data_string,
      CURLOPT_HTTPHEADER => curlopt_header(),
    )
  );

  $response = curl_exec($curl);

  curl_close($curl);
  return $response;
}

/**
 * Orders of a Specific Customer
 *
 * @return bool|string
 */
function get_order_specific_customer($customer_name = '032110')
{
  $curl = curl_init();

  $filter = "%24filter=CUSTNAME%20eq%20%27" . $customer_name . "%27";
  $select = "&%24select=CURDATE%2C%20ORDNAME%2C%20BOOKNUM%2C%20ORDSTATUSDES%2C%20DISPRICE%2C%20TOTPRICE";
  $expend = "&%24expand=DOCTODOLISTLOG_SUBFORM%2CORDERITEMS_SUBFORM(%24select%3DYOURORDLINE%2CPARTNAME%2CPDES%2C%20PRICE%2C%20TQUANT%2C%20VATPRICE)";
  $url = crm_url() . "/medical/ORDERS?" . $filter . $select . $expend;

  curl_setopt_array(
    $curl,
    array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => curlopt_header(),
    )
  );

  $response = curl_exec($curl);

  curl_close($curl);
  return $response;
}

/**
 * Summary of create_sales_order
 * @param mixed $data
 * @return bool|string
 */
function create_sales_order($data = array())
{
  // Ensuring that JSON is encoded with IEEE754 compatibility if the API supports it
  $customer_json = json_encode($data, JSON_PRESERVE_ZERO_FRACTION);

  // return $customer_json;
  $curl = curl_init();

  curl_setopt_array(
    $curl,
    array(
      CURLOPT_URL => crm_url() . '/medical/ORDERS',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $customer_json,
      CURLOPT_HTTPHEADER => array_merge(
        curlopt_header(),
        ['Content-Type: application/json']
      ),
    )
  );

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    return "cURL Error #: " . $err;
  } else {
    return $response;
  }
}

/**
 * Summary of create_recepient
 * @param mixed $params
 * @return bool|string
 */
function create_recepient($params = array()) {
  // Ensuring that JSON is encoded with IEEE754 compatibility if the API supports it
  $customer_json = json_encode($params, JSON_PRESERVE_ZERO_FRACTION);

  $curl = curl_init();

  curl_setopt_array(
    $curl,
    array(
      CURLOPT_URL => crm_url() . '/medical/TINVOICES',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $customer_json,
      CURLOPT_HTTPHEADER => curlopt_header(),
    )
  );

  $response = curl_exec($curl);

  curl_close($curl);
  return $response;
}

/**
 *  Update Order Status
 */
function update_order_status($order = 'SO24000003')
{
  $curl = curl_init();

  curl_setopt_array(
    $curl,
    array(
      CURLOPT_URL => crm_url() . '/medical/ORDERS(\'' . $order . '\')',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PATCH',
      CURLOPT_POSTFIELDS => '{
      "ORDSTATUSDES": "הזמנת אתר"
  }',
      CURLOPT_HTTPHEADER => curlopt_header(),
    )
  );

  $response = curl_exec($curl);

  curl_close($curl);
  return $response;
}

/**
 * Get Financial Document from Tranzilla
 */
function get_financial_document_tranzilla($transaction_id) {
  $curl = curl_init();
  $time = time();
  $appKey = 'fgZT5Wo2Lct9XICgJXy4q5UPuZRjs3RfZg74Sq23aRA9SMWN6yqRGv9PsAivjNl01Ai6rFbO9ET';
  $secret = 'FefBq78wrR';
  $nonce = bin2hex(random_bytes(40)); // 80 characters long string
  $accessToken = hash_hmac('sha256', $appKey, $secret . $time . $nonce); // Adjust if needed based on API
  $transaction_id = (int) $transaction_id;

  $payload = json_encode([
    "terminal_names" => ["gmwebshop"],
    "transaction_ids" => [$transaction_id]
  ]);

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://billing5.tranzila.com/api/documents_db/get_documents',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'X-tranzila-api-app-key: ' . $appKey,
      'X-tranzila-api-request-time: ' . $time,
      'X-tranzila-api-nonce: ' . $nonce,
      'X-tranzila-api-access-token: ' . $accessToken
    ),
  ));

  $response = curl_exec($curl);

  // Error handling
  if (curl_errno($curl)) {
    $error_msg = curl_error($curl);
    curl_close($curl);
    return "cURL error: " . $error_msg;
  }

  curl_close($curl);
  return $response;
}