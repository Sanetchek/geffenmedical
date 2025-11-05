<?php
$custom_notice = add_to_cart_notification();

// Single Tab Handler
if (isset($_POST['package_add_to_cart'])) {
  $product_id = intval($_POST['product_id']);
  $variations = isset($_POST['variation']) ? $_POST['variation'] : array();

  foreach ($variations as $var_id => $variation) {
    $remaining_quantity = intval($variation['qty']);

    // Process each pack configuration
    if (isset($variation['packs'])) {
      // Sort the array in descending order by value
      arsort($variation['packs']);

      foreach ($variation['packs'] as $pack_id => $pack_qty) {
        // Determine the number of packages to add
        $num_packages = floor($remaining_quantity / $pack_qty);

        if ($num_packages > 0) {
          WC()->cart->add_to_cart($product_id, $num_packages, $pack_id);
          $remaining_quantity -= $num_packages * $pack_qty;
        }
      }
    }

    // Add any remaining quantity as individual items
    if ($remaining_quantity > 0) {
      WC()->cart->add_to_cart($product_id, $remaining_quantity, $var_id);
    }
  }

  // Add a custom success notice to the cart
  wc_add_notice($custom_notice, 'success');
}

if (isset($_POST['variables_add_to_cart'])) {
  $product_id = intval($_POST['product_id']);
  $variations = isset($_POST['variation']) ? $_POST['variation'] : array();

  foreach($variations as $var_id => $var_qty) {
    if ($var_qty > 0) {
      WC()->cart->add_to_cart($product_id, $var_qty, $var_id);
    }
  }

  // Add a custom success notice to the cart
  wc_add_notice($custom_notice, 'success');
}