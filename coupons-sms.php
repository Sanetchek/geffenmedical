<?php
/**
 * Template Name: Coupon to show from SMS
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

// Get the values from the URL parameters
$coupon_code = $_GET['coupon_code'] ? $_GET['coupon_code'] : '';
$type = $_GET['type'] ? $_GET['type'] : '';
$date = $_GET['date'] ? $_GET['date'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Form</title>

  <script src="/wp-includes/js/jquery/jquery.min.js?ver=3.7.1"></script>

</head>
<body>

  <?= coupon_email_message($coupon_code, $type, $date) ?>

</body>
</html>