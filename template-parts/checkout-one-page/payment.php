<?php
/**
 * Checkout Payment Section
 */

defined( 'ABSPATH' ) || exit;

if ( ! wp_doing_ajax() ) {
	do_action( 'woocommerce_review_order_before_payment' );
}
?>

<ul id="geffen_payment">
	<?php
	// Get Available Payment Gateways
	$available_gateways = WC()->payment_gateways->get_available_payment_gateways();

	// Get chosen payment method from session
	$chosen_payment_method = WC()->session->get('chosen_payment_method');
	// print_r($chosen_payment_method);

	// Loop through each available payment gateway
	foreach ( $available_gateways as $gateway ) : ?>
		<li class="wc_payment_method payment_method_<?php echo esc_attr( $gateway->id ); ?>">
			<input id="payment_method_<?php echo esc_attr( $gateway->id ); ?>" type="radio" class="input-radio payment-method" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->id, $chosen_payment_method ); ?> />
			<label class="payment-method-label" for="payment_method_<?php echo esc_attr( $gateway->id ); ?>">
				<span class="peyment-method-title"><?php echo wp_kses_post( $gateway->get_title() ); ?></span>
				<span class="payment-method-icon"><?php echo wp_kses_post( $gateway->get_icon() ); ?></span>
			</label>
			<?php
			if ( $gateway->has_fields() || $gateway->get_description() ) :
				?>
				<div class="payment-box geffen-payment-box payment_method_<?php echo esc_attr( $gateway->id ); ?>">
					<img src="<?php echo assets('img/payments/mastercard.webp') ?>" alt="Mastercart" loading="lazy" class="payment-icon" width="40" height="25">
					<img src="<?php echo assets('img/payments/transparent-diners.webp') ?>" alt="Transparent diner payment" loading="lazy" class="payment-icon" width="32" height="25">
					<img src="<?php echo assets('img/payments/visa.webp') ?>" alt="Visa" loading="lazy" class="payment-icon" width="78" height="25">
				</div>
				<div class="payment-box-message payment_method_<?php echo esc_attr($gateway->id); ?>">
					<?php $gateway->payment_fields(); ?>
				</div>
			<?php endif; ?>
		</li>

	<?php endforeach; ?>

</ul>
<?php
if ( ! wp_doing_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
}
