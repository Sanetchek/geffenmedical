<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 50.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<?php do_action('woocommerce_before_cart'); ?>

<div id="checkout_form_items">
	<?php get_template_part('template-parts/cart/form', 'items') ?>
</div>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
	<div class="cart-collaterals">
		<div class="cart__flex">
			<div class="cart__flex_side">
				<?php // get_template_part('template-parts/cart/shipping') ?>
				<?php // get_template_part('template-parts/cart/note') ?>
			</div>

			<div class="cart__flex_side">
				<div class="cart_totals cart__wrap <?php echo (WC()->customer->has_calculated_shipping()) ? 'calculated_shipping' : ''; ?>">

						<?php if ( $checkout->get_checkout_fields() ) : ?>
							<?php get_template_part('template-parts/cart/checkout', 'fields') ?>
						<?php endif; ?>

						<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

						<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

						<h2 class="cart__title"><?php esc_html_e('סה״כ לתשלום', 'geffen'); ?></h2>

						<?php get_template_part('template-parts/cart/coupon') ?>

						<div id="order_review" class="woocommerce-checkout-review-order">
							<div id="order_review_total">
								<?php do_action( 'woocommerce_checkout_order_review' ); ?>
							</div>
						</div>

						<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
				</div>
			</div>

		</div>
	</div>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

<div class="offers-slider">
  <?php get_template_part('template-parts/cart/offers') ?>
</div>
