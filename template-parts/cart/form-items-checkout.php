<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
  <?php do_action('woocommerce_before_cart_table'); ?>
  <section class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
    <div>
      <?php do_action('woocommerce_before_cart_contents'); ?>

      <?php
      foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
        /**
         * Filter the product name.
         *
         * @since 2.1.0
         * @param string $product_name Name of the product in the cart.
         * @param array $cart_item The product in the cart.
         * @param string $cart_item_key Key for the product in the cart.
         */
        $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);

        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
          $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
          ?>
				<div
					class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

					<div class="product-thumbnail">
						<?php
							$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

							if (!$product_permalink) {
								echo $thumbnail; // PHPCS: XSS ok.
							} else {
								printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
							}
							?>
					</div>

					<div class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
						<?php
						if (!$product_permalink) {
							echo wp_kses_post($product_name . '&nbsp;');
						} else {
							/**
							 * This filter is documented above.
							 *
							 * @since 2.1.0
							 */
							echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
						}

						do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

						// Meta data.
						echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

						// Backorder notification.
						if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
							echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
						}
						?>
					</div>

					<div class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
							<?php
							echo $cart_item['quantity'];
							?>
					</div>

					<div class="product-price-wrap">
						<div class="product-subtotal" data-title="<?php esc_attr_e('מחיר ', 'geffen'); ?>">
							<?php
							echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
							?>
						</div>

						<div class="product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
							<?php
							echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
							?>
							<span><?= __(' ליחידה ', 'geffen') ?></span>
						</div>
					</div>

					<div class="product-remove">
						<?php
						echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							'woocommerce_cart_item_remove_link',
							sprintf(
								'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">
								<span>' . __("הסר פריט ", "geffen") . '</span>
								<svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="Group 102">
									<path id="Rectangle 25" d="M1.25 7L2.97147 17.3288C3.1322 18.2932 3.96658 19 4.94425 19H11.5557C12.5334 19 13.3678 18.2932 13.5285 17.3288L15.25 7" stroke="#EB5757" stroke-opacity="0.8" stroke-width="2" stroke-linecap="round"/>
									<path id="Line 14" d="M1 4.25H4.75M15.5 4.25H11.75M11.75 4.25V3C11.75 1.89543 10.8546 1 9.75 1H6.75C5.64543 1 4.75 1.89543 4.75 3V4.25M11.75 4.25H4.75" stroke="#EB5757" stroke-opacity="0.8" stroke-width="2" stroke-linecap="round"/>
									<line id="Line 27" x1="7.25" y1="10" x2="9.25" y2="10" stroke="#EB5757" stroke-opacity="0.8" stroke-width="2" stroke-linecap="round"/>
									</g>
								</svg>
							</a>',
								esc_url(wc_get_cart_remove_url($cart_item_key)),
								/* translators: %s is the product name */
								esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))),
								esc_attr($product_id),
								esc_attr($_product->get_sku())
							),
							$cart_item_key
						);
						?>
					</div>
				</div>
      	<?php
        }
      }
      ?>

      <?php do_action('woocommerce_cart_contents'); ?>

      <div>
        <div class="actions">

          <button type="submit"
            class="button hidden<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"
            name="update_cart"
            value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

          <?php do_action('woocommerce_cart_actions'); ?>

          <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
        </div>
      </div>

      <?php do_action('woocommerce_after_cart_contents'); ?>
    </div>
  </section>
  <?php do_action('woocommerce_after_cart_table'); ?>
</form>