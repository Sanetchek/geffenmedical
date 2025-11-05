<?php
// Get the current shipping method
$chosen_methods = WC()->session->get('chosen_shipping_methods');

$label = __('איסוף עצמי  - DMC', 'geffen');
$price = '';
$shipping_price = 0;
$shipping_title = '';

// Get all shipping zones
$shipping_zones = WC_Shipping_Zones::get_zones();

foreach ($shipping_zones as $zone) {
  $zone_methods = $zone['shipping_methods'];

  foreach ($zone_methods as $method) {
    if (!empty($chosen_methods)) {
      $first_chosen_method = reset($chosen_methods);
      $chosen_shipping = explode(':', $first_chosen_method);

      // Check if the array has at least two elements before accessing index 1
      $chosen_methods_id = isset($chosen_shipping[1]) ? $chosen_shipping[1] : null;

      if ($chosen_methods_id !== null) {
        foreach ($shipping_zones as $zone) {
          $zone_methods = $zone['shipping_methods'];

          foreach ($zone_methods as $method) {
            $id = $method->instance_id;

            if (intval($id) === intval($chosen_methods_id)) {
              $shipping_price = $method->cost;
              $shipping_title = $method->title;
              $price = $method->cost == 0 ? __('חינם', 'geffen') : wc_price($method->cost);

              $label = $method->title == 'DONE' ?
                '<img src="'. assets('img/done.png') .'" alt="done">' :
                $method->title;
            }
          }
        }
      }
    }
  }
}
?>

<?php if (is_user_logged_in()): ?>
  <div class="cart__shipping cart__grid">
    <div class="cart__grid_head">
      <?= $label ?>
      <input type="hidden" id="shipping_method_title" name="shipping_method_title" value="<?= htmlspecialchars($shipping_title) ?>">
    </div>
    <div class="cart__grid_content">
      <?= $price ?>
      <input type="hidden" id="shipping_method_price" name="shipping_method_price" value="<?= $shipping_price ?>">
    </div>
  </div>
<?php endif; ?>