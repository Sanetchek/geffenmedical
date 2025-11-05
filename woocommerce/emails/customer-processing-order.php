<?php
/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 50.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!--customs-mail--->
<style>
	@import url('https://fonts.googleapis.com/css2?family=Assistant:wght@200;300&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap');

	body {
		margin: 0;
	}

	.success-payment {
		font-family: 'Assistant';
	}

	.conteiner-968 {
		max-width: 600px;
		margin: 0 auto;
		width: 100%;
	}

	.page-title-wrap {
		display: flex;
		justify-content: end;
		flex-wrap: wrap;
		align-items: baseline;
	}

	.page-menu-title {
		color: #0A3B64;
		font-size: 30px;
		font-style: normal;
		font-weight: 800;
		line-height: normal;
		margin-bottom: 50px;
		text-align: end;
	}

	.success-payment-thanks p {
		color: #000;
		text-align: center;
		font-family: Assistant;
		font-size: 26px;
		font-style: normal;
		font-weight: 400;
		line-height: 42px;
		margin-top: 50px !important;
		margin-bottom: 33px !important;
	}

	.success-payment-thanks,
	.success-payment-order-info .product-quantity p,
	.success-payment-order-additionalinfo p {
		text-align: center !important;
	}

	.success-payment-order-additionalinfo p {
		color: #0A3B64;
		font-family: Assistant;
		font-size: 20px;
		font-style: normal;
		font-weight: 600;
		line-height: normal;
	}

	.success-payment-order-additionalinfo p>span {
		color: #000;
	}

	.success-payment-thanks p>span {
		color: #458DB4;
		font-weight: 600;
	}

	.success-payment-order-info .page-title-wrap {
		border-top: 1px solid #d3d3d3;
		padding-top: 45px;
	}

	.success-payment-thanks a,
	.success-payment-thanks a:hover,
	.success-payment-thanks a.btn:active {
		color: #FFF !important;
		font-size: 26px;
		font-style: normal;
		font-weight: 400;
		line-height: 33.8px;
		border-radius: 60px;
		background: #0A3B64;
		padding: 16px 32px;
		border: 2px solid #0A3B64 !important;
		display: inline-block;
		text-decoration: none;
	}

	.success-payment-thanks .link-oursite {
		color: #0A3B64;
		font-family: Assistant;
		font-size: 24px;
		font-style: normal;
		font-weight: 700;
		line-height: normal;
	}

	.success-payment-order-info .cart_item {
		align-items: center;
		display: flex;
		flex-direction: row-reverse;
	}

	.success-payment-order-info .product-price-wrap::before {
		display: none;
	}

	.success-payment-order-info .product-name a {
		color: #458DB4 !important;
		text-align: right;
		font-family: Assistant;
		font-size: 20px;
		font-style: normal;
		font-weight: 600;
		line-height: 40px;
		text-decoration: none;
	}

	.success-payment-order-info .product-quantity p,
	.product-price-wrap {
		color: #000;
		text-align: right;
		font-family: Assistant;
		font-size: 20px;
		font-style: normal;
		font-weight: 600;
		line-height: 40px;
		direction: rtl;
	}

	.product-price-wrap bdi {
		direction: rtl;
	}

	.success-payment-order-additionalinfo {
		margin: 70px 0;
	}

	.success-payment-order-footer {
		padding: 40px 15px;
		background: #F2F6FA;
	}

	.success-payment-order-footer-info {
		display: flex;
		justify-content: space-between;
	}

	.success-payment-order-footer-info>div {
		display: flex;
		align-items: center;
		flex-direction: row-reverse;
	}

	.success-payment-order-footer-info img {
		border-radius: 50%;
		background: #C4E7FB;
		padding: 10px;
		margin-left: 10px;
	}

	.success-payment-order-footer-info a {
		color: #0A3B64 !important;
		font-size: 18px;
		font-style: normal;
		font-weight: 400;
		line-height: 25.38px;
	}

	.success-payment-thanks .verification-code {
		color: #0A3B64;
		font-family: Assistant;
		font-size: 33px;
		font-style: normal;
		font-weight: 700;
		line-height: 53.308px;
	}

	.success-payment-header {
		display: flex;
		justify-content: space-between;
		margin: 37px 28px;
	}
	.success-payment-header-infopayment {
		display: flex;
		flex-direction: column;
	}

	.infopayment-date-order,
	.infopayment-order-number {
		display: flex;
		flex-direction: row-reverse;
	}

	.infopayment-date-order p,
	.infopayment-order-number p {
		color: #000;
		text-align: right;
		font-family: Assistant;
		font-size: 20px;
		font-style: normal;
		font-weight: 600;
		line-height: normal;
		margin-right: 5px;
		margin-bottom: 0 !important;

	}

	.infopayment-date-order p.title,
	.infopayment-order-number p.title {
		color: #458DB4;
		text-align: right;
		font-family: Assistant;
		font-size: 20px;
		font-style: normal;
		font-weight: 600;
		line-height: normal;
	}

	.woocommerce img,
	.woocommerce-page img {
		height: auto;
		max-width: 100%;
	}

	.product-thumbnail a {
		display: flex;
		width: 140px;
		align-items: center;
		justify-content: center;
	}

	.product-quantity {
		border-right: 1px solid #D3D3D3;
		border-left: 1px solid #D3D3D3;
		padding: 0 18px;
	}

	.product-name {
		max-width: 150px;
		text-align: end;
	}

	.product-thumbnail,
	.product-name,
	.product-price-wrap {
		padding: 0 18px;
	}

	.product-price {
		color: #828282;
		text-align: center;
		font-size: 18px;
		font-weight: 600;
		line-height: normal;
	}

	.page-menu-title {
		color: #0A3B64;
		font-size: 30px;
		font-style: normal;
		font-weight: 700;
		line-height: normal;
		margin-bottom: 50px;
		text-align: right!important;
	}

	.success-payment {
		background: #fff;
		margin: 0 auto;
		max-width: 600px;
		width: 100%;
	}
	@media (max-width: 430px) {
		.success-payment-header {
			display: block !important;
		}
		.success-payment-header-infopayment {
			display: flex;
			justify-content: center;
		}
		.success-payment-order-footer {
		    padding: 40px 45px;
		}
	}
</style>
<div class="success-payment">
	<div class="success-payment-header">
		<div class="success-payment-header-logo">
			<img src="https://geffenmedical.co.il/wp-content/uploads/2023/12/LOGO-1.png" alt="">
		</div>
		<div class="success-payment-header-infopayment">
			<div class="infopayment-date-order">
				<p class="title" dir="rtl"><?=  __('תאריך  - ', 'geffen') ?></p>
				<p dir="rtl">
					<?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</p>
			</div>
			<div class="infopayment-order-number">
				<p class="title" dir="rtl"><?= __('מספר הזמנה  - ', 'geffen') ?></p>
				<p dir="rtl">
					<?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</p>
			</div>
		</div>
	</div>

	<div class="success-payment-thanks">
		<p dir="rtl">
			<?= __('היי ', 'geffen') ?><span><?= $order->get_formatted_billing_full_name() ?></span>,<br>
			<?= __('קיבלנו את הזמנתך ואנחנו מכניסים אותה לעבודה.<br> תודה שקנית אצלנו!', 'geffen') ?>
		</p>
		<a href="geffenmedical.co.il" target="_self" dir="rtl" style="margin-bottom: 40px;">
			<?= __('ביקור באתר שלנו', 'geffen') ?>
		</a>
	</div>

	<div class="success-payment-order-info">
		<article class="page type-page status-publish hentry">
			<div class="conteiner-968">
				<div class="page-title-wrap">
					<div class="page-menu-title" dir="rtl"><?= __('פרטי ההזמנה', 'geffen') ?></div>
				</div>
				<div class="blog-page-menu-row">
					<div class="conteiner-968">

						<div class="entry-content">
							<div class="woocommerce">
								<section class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
									<?php
										// Get items in the order
										$items = $order->get_items();

										if ($items):
											foreach ($items as $item): ?>

									<?php
												// Get product data
												$product = $item->get_product();
												$product_name = $item->get_name(); // Product name
												$quantity = $item->get_quantity(); // Product quantity
												$subtotal = $item->get_subtotal(); // Subtotal for the line item
												$product_price = $product ? $product->get_price() : ''; // Product price HTML
												$product_image = $product ? $product->get_image() : ''; // Product image HTML
												$product_link = $product ? $product->get_permalink() : ''; // Product link
											?>

									<div class="woocommerce-cart-form__cart-item cart_item">

										<div class="product-thumbnail">
											<a href="<?= $product_link ?>"><?= $product_image ?></a>
										</div>

										<div class="product-name">
											<a href="<?= $product_link ?>" dir="rtl"><?= $product_name ?></a>
										</div>

										<div class="product-quantity">
											<p dir="rtl"><?= $quantity . ' ' . __('יח’', 'geffen') ?></p>
										</div>

										<div class="product-price-wrap">
											<div class="product-subtotal">
												<?= wc_price($subtotal) ?>
											</div>
											<div class="product-price">
												<?= wc_price($product_price) ?>
											</div>
										</div>
									</div>

									<?php	endforeach;
												endif;?>

								</section>
							</div>
						</div><!-- .entry-content -->
					</div>
				</div>
			</div>
		</article>
	</div>

	<div class="success-payment-order-additionalinfo">
		<?php
			$order_subtotal = $order->get_subtotal(); // Order subtotal
			$order_total = $order->get_total(); // Order total
		?>
		<p class="order-additionalinfo-subtotal" dir="rtl">
			<?= __('סכום ביניים - ', 'geffen') ?><span><?= wc_price($order_subtotal) ?></span></p>

		<?php
			// Get shipping method
			$shipping_method = $order->get_shipping_method();
			if ($shipping_method) : ?>
		<p class="order-additionalinfo-delivery" dir="rtl"><?= __('משלוח - ', 'geffen') ?>
			<span><?= esc_html($shipping_method) ?></span></p>
		<?php endif; ?>

		<?php
			// Get order comments
			$order_comments = $order->get_customer_note();
			if ($order_comments) : ?>
		<p class="order-additionalinfo-commit" dir="rtl"><?= __('הערות - ', 'geffen') ?>
			<span><?= nl2br(esc_html($order_comments)) ?></span></p>
		<?php endif; ?>

		<p class="order-additionalinfo-total" dir="rtl"><?= __('סך הכל - ', 'geffen') ?> <span>
				<?= wc_price($order_total) ?></span></p>
	</div>

	<div class="success-payment-order-footer">
		<div class="page-menu-title" dir="rtl"><?= __('אנחנו כאן בשבילך!', 'geffen') ?></div>
		<div class="success-payment-order-footer-info">
			<div>
				<img src="/wp-content/uploads/2023/12/email-2.svg" alt="">
				<a href="https://api.whatsapp.com/send?phone=972526390910" target="_blank">052-6390910</a>
			</div>
			<div>
				<img src="/wp-content/uploads/2023/12/email-2-1.svg" alt="">
				<a href="" target="_blank">6364*</a>
			</div>
			<div>
				<img src="/wp-content/uploads/2023/12/email-2-2.svg" alt="">
				<a href="mailto:cs@geffenmedical.com" target="_blank">cs@geffenmedical.com</a>
			</div>
			<div>
				<img src="/wp-content/uploads/2023/12/email-2-3.svg" alt="">
				<a href="https://www.messenger.com/t/geffenmedical" target="_blank">Geffen Medical</a>
			</div>
		</div>
	</div>
</div>
