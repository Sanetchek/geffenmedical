<?php
  $shipping = geffen_get_shipping_fields();
  $first_name = isset($shipping['shipping_first_name']) ? $shipping['shipping_first_name'] : '';
  $last_name = isset($shipping['shipping_last_name']) ? $shipping['shipping_last_name'] : '';
  $city = isset($shipping['shipping_city']) ? $shipping['shipping_city'] : '';
  $address = isset($shipping['shipping_address_1']) ? $shipping['shipping_address_1'] : '';

  // $ship = geffen_get_shipping_fields();
?>
<div id="shipping_details_flat_rate4" class="shipping__details">
  <h2 class="cart__title"><?php echo __('שליח עד הבית', 'geffen') ?></h2>

  <div class="shipping__details_address shipping__details_shipping">
    <div class="shipping__details_underline"><?= __('כתובת למשלוח: ', 'geffen') ?></div>

    <div class="shipping__details_address-wrap">
      <div class="shipping__details_address-area">

        <?php if ($shipping) : ?>
          <span
            class="shipping-name"><?= $first_name . ' ' . $last_name ?></span><br /><br />
          <span class="shipping-city"><?= $city ?></span><br />
          <span class="shipping-address"><?= $address ?></span>
        <?php endif ?>
      </div>

      <div class="shipping__details_address-edit">
        <button type="button" id="show_shipping_edit" class="address__edit_btn">
          <span><?= __('עריכת פרטים ', 'geffen') ?></span>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path
              d="M17 10V17C17 18.1046 16.1046 19 15 19H3C1.89543 19 1 18.1046 1 17V5C1 3.89543 1.89543 3 3 3H9H10"
              stroke="#0A3B64" stroke-width="2" stroke-linecap="round" />
            <path
              d="M14.4202 2.89427L6.94114 10.3733L6.40029 13.7147L9.76957 13.2017L17.2288 5.74247M14.4202 2.89427L14.8995 2.41496C15.6805 1.63391 16.9469 1.63391 17.7279 2.41496V2.41496C18.509 3.19601 18.509 4.46234 17.7279 5.24338L17.2288 5.74247M14.4202 2.89427L17.2288 5.74247"
              stroke="#0A3B64" stroke-width="2" stroke-linejoin="round" />
          </svg>
          </span>
      </div>
    </div>
  </div>
</div>