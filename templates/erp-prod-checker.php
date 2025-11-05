<?php
/**
 * Template Name: Simple Check Phone in ERP
 */

// Check if the page/post is password protected and if the correct password has been entered
if ( post_password_required() ) :
    // The post/page is password protected
    echo get_the_password_form(); // Display the default password form
    return; // Stop further execution if the password is required
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Check Phone in ERP</title>
  <style>
    /* Basic flat styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
    }

    .phone-check-container {
      max-width: 400px;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    label {
      font-size: 16px;
    }

    input {
      padding: 10px;
      font-size: 14px;
      border: 2px solid #ddd;
      border-radius: 4px;
      transition: border-color 0.2s ease;
    }

    input:focus {
      border-color: #0073aa;
    }

    button {
      padding: 10px;
      background-color: #0073aa;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    button:hover {
      background-color: #005885;
    }

    #response {
      margin-top: 20px;
    }

    #response p {
      font-size: 16px;
      color: #333;
    }
  </style>
</head>
<body>

<div class="phone-check-container">
  <h1>Check Phone Number in ERP</h1>

  <form id="phone-check-form" method="get">
    <label for="phoneNumber">Phone Number:</label>
    <input type="text" id="phoneNumber" name="phoneNumber" required pattern="\d{10}" placeholder="Enter your phone number">
    <button type="submit">Check Phone</button>
  </form>

  <div id="response">
    <?php
    // Check if phone number is submitted via GET
    if (!empty($_GET['phoneNumber'])) {
      $phone_number = sanitize_text_field($_GET['phoneNumber']);
      // Check if the function exists and call it
      if (function_exists('user_auth_by_phone')) {
        $response = user_auth_by_phone($phone_number);
        echo '<p>ERP Response: </p>';
        echo '<pre>';
        print_r($response);
        echo '</pre>';
      } else {
        echo '<p>Function user_auth_by_phone is not available.</p>';
      }
    }
    ?>
  </div>
</div>

<div class="order-check">
  <h2>Order Check</h2>

  <?php
  $order_id = 17168; // Replace with your order ID
  $order = wc_get_order( $order_id );

  // Get all meta data
  $order_meta = $order->get_meta_data();

  $transaction_id = $order->get_meta('transaction_id');
  $tranzilla_request = get_financial_document_tranzilla($transaction_id);
  // Decode the JSON response to an array
  $tranzilla_request = json_decode($tranzilla_request, true);

  // Extract the number from the documents array
  $document_number = $tranzilla_request['documents'][0]['number'];

  echo 'Transaction ID: ' . $transaction_id . '<br>';
  echo 'Tranzilla Request: <br>';
  echo 'Document Number: ' . $document_number . '<br><br><br>';


  foreach ( $order_meta as $meta ) {
    echo 'Meta key: value: ' . $meta->key . ' => <strong>' . $meta->value . '</strong><br>';
  }
  ?>
</div>

</body>
</html>
