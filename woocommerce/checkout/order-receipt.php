<?php
/**
 * Checkout Order Receipt Template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/order-receipt.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 50.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<div class="success-payment">
<div class="row">
		<div class="col-6 col-md-8">
		<ul class="order_details">
		<li class="order">
			<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
			<strong><?php echo esc_html( $order->get_order_number() ); ?></strong>
		</li>
		<li class="date">
			<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
			<strong><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></strong>
		</li>
		<li class="total">
			<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
			<strong><?php echo wp_kses_post( $order->get_formatted_order_total() ); ?></strong>
		</li>
		<?php if ( $order->get_payment_method_title() ) : ?>
		<li class="method">
			<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
			<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
		</li>
		<?php endif; ?>
	</ul>
		</div>
		<div class="col-6 col-md-4">
		<a class="button cancel" href="https://geffenmedical.co.il/cart/?cancel_order=true&amp;order=wc_order_zr9gLqE9xoHLN&amp;order_id=6593&amp;redirect&amp;_wpnonce=7767d5dd41">חזור לעגלת הקניות</a>
		</div>
	</div>



	<?php do_action( 'woocommerce_receipt_' . $order->get_payment_method(), $order->get_id() ); ?>

	<div class="clear"></div>
</div>