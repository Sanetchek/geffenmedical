<?php
$custom_notice = add_to_cart_notification();
// Libre Add to cart process
if (isset($_POST['libre_add_to_cart']) && !get_product_qty_in_cart($_POST['product_id'])) {
  $quantity = $_POST['quantity'];
  $product_id = $_POST['product_id'];

  // Add the variation to the cart
  WC()->cart->add_to_cart($product_id, $quantity);

  // Add the custom notice to the cart.
  echo $custom_notice;
}