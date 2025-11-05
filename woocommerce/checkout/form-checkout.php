<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 50.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if (WC()->cart->is_empty()) {
	// If cart is empty, include specific template part
	get_template_part('woocommerce/cart/cart-empty');
	exit;
}

// Call the custom function to handle the product logic
add_product_if_condition_met();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<div class="checkout-overlay"></div>

<form name="checkout" id="geffen_checkout_form" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<div id="checkout_form_items">
		<?php get_template_part( 'template-parts/checkout-one-page/form', 'items' ); ?>
	</div>

	<?php if (is_user_logged_in()) : ?>
		<div class="checkout-shipping">
			<div class="cart__flex">
				<div class="cart__flex_side">
					<div class="cart__wrap">
						<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
							<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>
							<?php wc_cart_totals_shipping_html(); ?>
							<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>
						<?php endif; ?>
					</div>
				</div>

				<div class="cart__flex_side">
					<!-- Shipping method choose template -->
					<?php get_template_part( 'template-parts/checkout-one-page/shipping' ); ?>
				</div>
			</div>
		</div>
	<?php endif ?>

	<div class="cart-collaterals checkout-review">
		<div class="cart__flex">
			<div class="cart__flex_side">
				<!-- Note template -->
				<?php // get_template_part('template-parts/cart/note'); ?>
			</div>

			<div class="cart__flex_side">
				<div class="cart_totals cart__wrap <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

					<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

					<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

					<h2 class="cart__title"><?php esc_html_e( 'סה״כ לתשלום', 'geffen' ); ?></h2>

					<!-- Coupon template -->
					<?php get_template_part( 'template-parts/cart/coupon' ); ?>

					<!-- Shipping fields template -->
					<div id="customer_shipping_details">
						<?php // get_template_part( 'template-parts/checkout-one-page/checkout-fields-shipping' ); ?>
					</div>

					<!-- Order review template -->
					<div id="order_review" class="woocommerce-checkout-review-order">
						<?php get_template_part( 'template-parts/checkout-one-page/review', 'order' ); ?>
					</div>

					<!-- Payment template -->
					<?php get_template_part( 'template-parts/checkout-one-page/payment' ); ?>

					<!-- Checkout Button template -->
					<?php get_template_part( 'template-parts/checkout-one-page/checkout-next' ); ?>

					<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
				</div>
			</div>
		</div>
	</div>
</form>

<?php
	$args = array(
		'post_type' => 'city',
		'numberposts' => -1,  // Retrieve all posts of the specified post type
	);

	$cities = get_posts($args);
?>

<div id="shipping_form_popup">
	<div class="popup-content-contactpage shipping-form-popup">
		<span class="close-contactpage" id="online_form_form">×</span>
		<?php get_template_part('template-parts/cart/shipping', 'form', ['cities' => $cities]); ?>
	</div>
</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

<div class="offers-slider">
  <?php get_template_part( 'template-parts/cart/offers' ); ?>
</div>
