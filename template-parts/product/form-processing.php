<?php
$custom_notice = add_to_cart_notification();

// Multiple add to cart with couple variations
if (isset($_POST['multiple_add_to_cart'])) {
  $variations = $_POST['variations'];
  $quantities = $_POST['quantities'];
  $product_id = $_POST['product_id'];

  if (!empty($variations) && is_array($variations)) {
    foreach ($variations as $variation) {
      if ( $quantities[$variation] > 0 ) {
        $quantity = $quantities[$variation];

        // Add the variation to the cart
        WC()->cart->add_to_cart($product_id, $quantity, $variation);
      }
    }

    // Add the custom notice to the cart.
    wc_add_notice($custom_notice, 'success');
  }
}