<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
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

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */

do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
<div class="reader realReader freestyle-libre2-reader">
	<div class="row">

	<!--<div class="col-lg-6 col-sm-12 button-cart-empty-all-products">
			<div class="page-menu-title cart-empty-mobile-title"><?= __('סל קניות', 'geffen') ?></div>


		</div>-->
		<div class="col-12 img-cart-empty-products"  style="text-align: center;">
			<img src="/wp-content/uploads/2023/12/סל-ריק-1.png" alt="">
			<div class="customer-club-button" style="justify-content: center;">
				<a class="btn btn__blue" style="color: #fff!important;font-weight: 500;justify-content: center;" href="/all-products/"><?= __('לכל המוצרים', 'geffen') ?></a>
			</div>
		</div>

	</div>
</div>
<!--<p class="return-to-shop">
	<a class="button wc-backward<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"
		href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
		<?php
				/**
				 * Filter "Return To Shop" text.
				 *
				 * @since 4.6.0
				 * @param string $default_text Default text.
				 */
				echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
			?>
	</a>
</p>-->
<?php endif; ?>