<div class="col2-set" id="customer_details">
  <div class="col-1">
    <?php do_action( 'woocommerce_checkout_billing' ); ?>
  </div>

  <div class="col-2">
    <?php do_action( 'woocommerce_checkout_shipping' ); ?>
  </div>
</div>

<div class="done_fields">
  <?php
    // Get the current user's ID
    $current_user_id = get_current_user_id();
    $area = get_field('country_area', 'user_' . $current_user_id);
    $city = get_field('city', 'user_' . $current_user_id);
    $address = get_field('address', 'user_' . $current_user_id);
    $station_number = get_field('station_number', 'user_' . $current_user_id);
  ?>
  <input type="hidden" name="done_area" value="<?= $area ?>">
  <input type="hidden" name="done_city" value="<?= $city ?>">
  <input type="hidden" name="done_address" value="<?= $address ?>">
  <input type="hidden" name="done_station_number" value="<?= $station_number ?>">
</div>