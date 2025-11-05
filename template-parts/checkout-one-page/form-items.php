<section class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
  <div>
    <?php do_action('woocommerce_before_cart_contents'); ?>

    <?php
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
      $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
      $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

      $item_id = $product_id;

      if ($cart_item['variation_id'] > 0) {
        $item_id = $cart_item['variation_id']; // Variation ID
        // Do something with the variation ID
      }
      /**
       * Filter the product name.
       *
       * @since 2.1.0
       * @param string $product_name Name of the product in the cart.
       * @param array $cart_item The product in the cart.
       * @param string $cart_item_key Key for the product in the cart.
       */
      $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);

      if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) :
        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
        ?>
        <div id="product-<?= $product_id ?>" class="geffen-checkout-product-item woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

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

          <?php if (wp_is_mobile()): ?>
          <div class="cart-product-name-price-wrap">
          <?php endif; ?>

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

            <?php if (wp_is_mobile()): ?>
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
            <?php endif; ?>

          <?php if (wp_is_mobile()): ?>
          </div>
          <?php endif; ?>

          <div class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>" data-id="<?= $product_id ?>" data-item-key="<?= $cart_item_key ?>">
            <?php
              if ($_product->is_sold_individually()) {
                $min_quantity = 1;
                $max_quantity = 1;
              } else {
                $max_qty = get_post_meta( $product_id, '_max_quantity_on_hands', true );
                $max_qty = $max_qty ? $max_qty : $_product->get_max_purchase_quantity();
                $min_quantity = 1;
                $max_quantity = $max_qty;
              }

              $product_quantity = woocommerce_quantity_input(
                array(
                  'input_name' => "cart[{$item_id}][qty]",
                  'input_value' => $cart_item['quantity'],
                  'max_value' => $max_quantity,
                  'min_value' => $min_quantity,
                  'product_name' => $product_name,
                ),
                $_product,
                false
              );

              do_action('woocommerce_before_add_to_cart_quantity');
              echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
              do_action('woocommerce_after_add_to_cart_quantity');
            ?>
          </div>
          <?php if (!wp_is_mobile()): ?>
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
          <?php endif; ?>

          <div class="product-remove">
            <a href="#" class="remove remove-from-cart-btn" aria-label="<?= esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))) ?>" data-product-id="<?= esc_attr($product_id) ?>" data-product-sku="<?= esc_attr($_product->get_sku()) ?>" data-item-key="<?= $cart_item_key ?>">
              <span><?= __("הסר פריט ", "geffen") ?></span>
              <?php get_template_part('template-parts/svg/trash') ?>
            </a>
          </div>
        </div>
    <?php
      endif;
    endforeach;
    ?>

    <?php do_action('woocommerce_cart_contents'); ?>

    <div>
      <div class="actions">
        <?php do_action('woocommerce_cart_actions'); ?>

        <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
      </div>
    </div>

    <?php do_action('woocommerce_after_cart_contents'); ?>
  </div>
</section>