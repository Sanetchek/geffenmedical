<?php
// Include WooCommerce if not already included
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Instantiate WooCommerce Checkout object
$checkout = WC()->checkout;
?>

<?php
$fields = $checkout->get_checkout_fields( 'billing' );

foreach ( $fields as $key => $field ) {
  $field['type'] = 'hidden';
  $field['label'] = '';
  woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
}
?>