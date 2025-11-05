<?php
/**
 * Template Name: Coupons
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geffen
 */

$response = '';
$response_upload = '';
$active1 = 'active';
$active2 = '';

// Create Array with all coupon code
$coupons_array = [];
$args = array(
  'post_type' => 'coupon',
  'posts_per_page' => -1,  // Set to -1 to retrieve all posts
);

$coupons = get_posts($args);

foreach ($coupons as $coupon) {
  $array[] = get_the_title($coupon->ID);
}

// Check if the form is submitted
if (isset($_POST['submit_coupon_form'])) {
  $active1 = 'active';
  $active2 = '';

  $phone_number = $_POST['phone'];
  $phone_number = sanitize_text_field($phone_number);
  $phone_number = preg_replace('/(\W*)/', '', $phone_number); // clear all symbols
  $email = sanitize_email($_POST['email']);
  $selectOption = sanitize_text_field($_POST['selectOption']);

  $coupons = coupon_query($selectOption);

  // Check if there is a post that matches the criteria
  if ($coupons) {
    $coupon = $coupons[0];  // Get the first (and only) post in the array

    // Get the post title
    $coupon_code = get_the_title($coupon);
    $date = date('d-m-Y');

    /**
     * Send Email
     */
    // Use the $coupon_code variable as needed
    $response = '<h2> Coupon Code: ' . esc_html($coupon_code) . '</h2>';

    // Replace these with your own email and subject
    $to = $email;
    $subject = 'לרוכשים חיישן פריסטייל ליברה 2' . ' ' . 'הטבה במרכז הרפואי  DMC';

    // Email content
    $message = coupon_email_message($coupon_code, $selectOption, $date);

    // Additional headers
    $headers = get_header_for_email(); // return array with headers option
    $headers[] = 'Bcc: shira.marton@geffenmedical.com';

    // Send email
    $sent = wp_mail($to, $subject, $message, $headers);

    if ($sent) {
      // Get the post ID
      $coupon_id = $coupon->ID;

      // Update the meta field '_coupon_used' to 'on'
      update_post_meta($coupon_id, '_coupon_used', 'on');

      // Update coupon date when it is sended
      $is_date_updated = update_post_date_to_today($coupon->ID); // return bool

      $response .= 'Email sent successfully';
    } else {
      $response = 'Error sending email';
    }

    /**
     * Send SMS
     */
    $response .= dmc_sms($phone_number, $coupon_code, $selectOption, $date);

  } else {
    $response = 'There are no coupons. Email not sended';
  }
}

// Check if the form is submitted
if (isset($_POST['submit_upload_form'])) {
  $active1 = '';
  $active2 = 'active';

  // Handle file upload
  if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] == 0) {
    // Read and parse the CSV file
    $csv_file = fopen($_FILES['csvFile']['tmp_name'], 'r');

    // Check if the CSV file is empty
    if ($csv_file === false) {
      $response_upload = 'Error: Unable to open the CSV file.';
    } else {
      // Loop through each row in the CSV
      while (($row = fgetcsv($csv_file)) !== false) {
        // Extract data from the first column (assuming title is in the first column)
        $title = $row[0];

        // Check if the title is empty or not set
        if (empty($title)) {
          continue; // Skip this row if title is empty
        }

        if (!in_array($title, $coupons_array)) {
          // Get the selected option from $_POST
          $selected_option = sanitize_text_field($_POST['selectOption']);

          // Create a new post of post type "coupon"
          $post_id = wp_insert_post(
            array(
              'post_title' => $title,
              'post_content' => '', // You can adjust this if needed
              'post_type' => 'coupon',
              'post_status' => 'publish',
            )
          );

          // Update meta field "_coupon_option" with the value from $_POST
          update_post_meta($post_id, '_coupon_used', 'off');
          update_post_meta($post_id, '_coupon_option', $selected_option);
        }
      }

      // Close the CSV file
      fclose($csv_file);

      $response_upload = 'Coupons created successfully!';
    }
  } else {
    $response_upload = 'Error uploading file.';
  }
}

?>

<!DOCTYPE html>
<html lang="he-IL" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Form</title>

  <script src="/wp-includes/js/jquery/jquery.min.js?ver=3.7.1"></script>

  <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }

  form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
  }

  h2,
  .coupon-message {
    text-align: center;
  }

  label {
    display: block;
    margin-bottom: 8px;
  }

  input,
  select {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }

  .coupon-tabs {
    width: 100%;
    display: flex;
    position: fixed;
    top: 0;
    left: 0;
    border-bottom: 1px solid;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding-bottom: 1px;
    background: #fff;
  }

  .coupon-item {
    padding: 20px 40px;
    background: #fff;
    cursor: pointer;
    border-right: 1px solid rgba(0, 0, 0, 0.1);
  }

  .coupon-item:hover,
  .coupon-item:focus,
  .coupon-item:active,
  .coupon-item.active {
    background: #f1f1f1;
    box-shadow: inset 0 0 20px -12px rgba(0, 0, 0, 0.75);
  }

  .coupon-form {
    display: none;
  }

  .coupon-form.active {
    display: block;
  }
  </style>
</head>

<body>

  <?php
  if ( post_password_required() ) :
    // The post/page is password protected
    echo get_the_password_form(); // This will display the password form
  else : ?>
    <div class="coupon-tabs">
      <div class="coupon-item <?= $active1 ?>" data-id="1">Send Coupon</div>
      <div class="coupon-item <?= $active2 ?>" data-id="2" style="display: none;">Upload Coupons</div>
    </div>

    <form id="form_1" class="coupon-form <?= $active1 ?>" action="/coupons" method="post">
      <div class="coupon-message">
        <?php
        echo $response;
        ?>
      </div>

      <h2>שלח קופון במייל</h2>

      <!-- phone Field -->
      <label for="phone">מספר טלפון:</label>
      <input type="tel" id="phone" name="phone" pattern="\d{10}" minlength="10" maxlength="10" title="<?= __('נא להזין 10 ספרות בדיוק', 'geffen') ?>" required>

      <!-- Email Field -->
      <label for="email">אימייל:</label>
      <input type="email" id="email" name="email" required>

      <!-- Select Dropdown -->
      <label for="selectOption">מס חיישנים שנרכשו:</label>
      <?php $types = coupon_types() ?>
      <select id="selectOption" name="selectOption">
        <?php if ($types): ?>
        <?php foreach ($types as $key => $type): ?>
        <option value="<?= $key ?>"><?= $type ?></option>
        <?php endforeach ?>
        <?php endif ?>
      </select>

      <!-- Submit Button -->
      <input type="submit" value="שלח">
      <input type="hidden" name="submit_coupon_form">
    </form>

    <form id="form_2" class="coupon-form <?= $active2 ?>" action="/coupons" method="post" enctype="multipart/form-data">
      <div class="coupon-message">
        <?php
        echo $response_upload;
        ?>
      </div>

      <h2>Upload New Coupons</h2>

      <!-- Select Dropdown -->
      <label for="selectOption">מס חיישנים שנרכשו:</label>
      <?php $types = coupon_types() ?>
      <select id="selectOption" name="selectOption">
        <?php if ($types): ?>
        <?php foreach ($types as $key => $type): ?>
        <option value="<?= $key ?>"><?= $type ?></option>
        <?php endforeach ?>
        <?php endif ?>
      </select>

      <!-- File Input for CSV -->
      <label for="csvFile">בחר קובץ CSV:</label>
      <input type="file" id="csvFile" name="csvFile" accept=".csv" required>

      <!-- Submit Button -->
      <input type="submit" value="שלח">
      <input type="hidden" name="submit_upload_form">
    </form>


    <script>
    jQuery(document).ready(function($) {
      setTimeout(function() {
        $('.coupon-message').fadeOut()
      }, 4000)

      $('.coupon-item').on('click', function() {
        const id = $(this).attr('data-id')

        $('.coupon-item, .coupon-form').removeClass('active')
        $(this).addClass('active')
        $('#form_' + id).addClass('active')
      })
    })
    </script>
  <?php endif; ?>

</body>

</html>