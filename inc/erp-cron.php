<?php
// The function that will execute via cron
function execute_cron_task($order_id) {
  // Get the order object
  $order = wc_get_order($order_id);

  if (!$order) {
    return; // Exit if no valid order is found
  }

  if ($order->get_status() === 'failed') {
    return;
  }

  // Tranzilla request
  // $transaction_id = 29713;
  $transaction_id = $order->get_meta('transaction_id');

  if (!$transaction_id) {
    return;
  }

  // Extract the ORDNAME field
  $ordname = $order->get_meta('ordname');

  // 1. ORDNAME
  if (!$ordname) {
    // Call the function for creating the CRM order
    $is_order_created = create_crm_order_on_thankyou($order_id);

    if ( empty($is_order_created) ) {
      return;
    }
  }

  // 2. ORDStatus
  $ordstatus = null;
  $recepient_params = null;
  $recepient = null;

  if ($ordname) {
    $ordstatus = update_order_status($ordname);
    $ordstatus = json_decode($ordstatus, true);

    // Call the function for order status
    send_error_email('2. ORDStatus Response', $ordname, $ordstatus);

    $log = [
      [
        'message' => '2. ORDStatus Response',
        'params_send' => $ordname,
        'crm_resp' => $ordstatus
      ],
    ];

    log_data($log, $subdir = 'create-orders');
  }

  // 4. Recepient
  $document_number = $order->get_meta('financial_receipt_number');
  if ($document_number) {
    if ($ordname && $ordstatus && isset($ordstatus['ORDNAME']) && $ordstatus['ORDNAME'] === $ordname) {
      $abs = $order->get_meta('מספר אישור ABS');
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

      // Create order in CRM
      $order_date = $order->get_date_created(); // Returns a WC_DateTime object

      // To format it as a string:
      $formatted_date = $order_date->date( 'Y-m-d\TH:i:sP' );

      $recepient_params = [
        "ORDNAME" => (string)$ordname,
        "IVDATE" => (string)$formatted_date,
        "BOOKNUM" => (string)$document_number,
        "TPAYMENT2_SUBFORM" => [
          [
            "PAYMENTCODE" => "10",
            "PAYACCOUNT" => (string)$card_last_four_digits,
            "QPRICE" => (float)number_format($order_total, 2, '.', ''),
            "PAYCODE" => $paycode,
            "CARDNUM" => $abs,
            "SHVA_TERMINALNAME" => "01",
            'VALIDMONTH' => $order->get_meta('cc_expdate')
          ]
        ]
      ];

      $recepient = create_recepient($recepient_params);

      // Call the function for recepient
      send_error_email('4. Recepient Response', print_r($recepient_params, true), $recepient);

      $log = [
        [
          'message' => '4. Recepient Response',
          'params_send' => $recepient_params,
          'crm_resp' => $recepient
        ],
      ];

      log_data($log, $subdir = 'create-orders');

      // Update the order meta with the recepient ID
      update_post_meta($order_id, 'erp_request', 'true');
    }
  } else {
    // 3. Tranzilla Request
    // Call the function to get the Tranzilla request
    $tranzilla_request = get_financial_document_tranzilla($transaction_id);
    $tranzilla_request = json_decode($tranzilla_request, true);

    if (!isset($tranzilla_request['documents'][0]['number'])) {
      return; // Exit early if no document number
    }

    $document_number = $tranzilla_request['documents'][0]['number'];

    // Call the function for Tranzilla request
    send_error_email('3. Tranzilla Response', $transaction_id, $tranzilla_request);

    $log = [
      [
        'message' => '3. Tranzilla Response',
        'params_send' => $transaction_id,
        'crm_resp' => $tranzilla_request,
        'document_number' => $document_number
      ],
    ];

    log_data($log, $subdir = 'create-orders');

    update_post_meta($order_id, 'financial_receipt_number', $document_number);
  }
}