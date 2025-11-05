<?php
// Include WooCommerce if not already included
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

// Instantiate WooCommerce Checkout object
$checkout = WC()->checkout;
?>

<?php if ( true === WC()->cart->needs_shipping_address() ) : ?>
  <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox" style="position: absolute; visibility: hidden; top: -1000px; opacity: 0;">
    <input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" />
  </label>

  <div class="shipping_address2">
    <div class="woocommerce-shipping-fields__field-wrapper">
      <?php
      $fields = $checkout->get_checkout_fields( 'shipping' );

      // Add phone field to the fields array
      $fields['shipping_phone'] = array(
        'type' => 'tel',
        'label' => __('Phone', 'woocommerce'),
        'required' => false,
        'class' => array('form-row-wide'),
        'validate' => array('phone'),
      );

      foreach ( $fields as $key => $field ) {
        $field['type'] = 'hidden';
        $field['label'] = '';
        woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
      }
      ?>
    </div>
  </div>

<?php endif; ?>