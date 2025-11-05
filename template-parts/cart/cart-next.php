<div class="first_page">
  <div id="shipping_message" class="shipping-message"><?= __('עליך למלא כתובת למשלוח', 'geffen') ?></div>
  <div id="done_message" class="shipping-message"><?= __('עליך לבחור עמדה', 'geffen') ?></div>
  <?php if (is_user_logged_in()): ?>
    <?php
    $user_id = get_current_user_id();

    if ($user_id) :
      // Get user data
      $user_info = get_userdata($user_id);

      if ($user_info && $user_info->user_email) :
        $subscribed = get_user_meta($user_id, 'geffen_subscription', true);

        // Get the WooCommerce cart
        $woocommerce = WC();

        // Get cart items
        $cart_items = $woocommerce->cart->get_cart();

        // Specify the product ID you're looking for
        $specific_product_id = get_field('product', 'option'); // Replace 123 with the actual product ID you want to find

        // Initialize a variable to store the found product
        $found_product = null;

        // Iterate through each cart item
        foreach ($cart_items as $cart_item_key => $cart_item) {
          // Check if the current item matches the specific product ID
          if ($cart_item['product_id'] == $specific_product_id) {
            // Store the found product and break the loop
            $found_product = true;
            break;
          }
        }

        $popup_subscribe = (!$subscribed && $found_product) ? 'show-subscribe-popup' : '';
        ?>

        <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" id="cart_to_checkout"
          class="<?= $popup_subscribe ?> cart__proceed_btn checkout-button alt wc-forward<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>">
          <?php _e('המשך לתשלום ', 'geffen'); ?>
        </a>

        <?php if (!$subscribed && $found_product) {
          get_template_part('template-parts/cart/subscribe', 'popup');
        } ?>

      <?php else: ?>

        <a href="#" id="show_continue_registration"
          class="cart__proceed_btn alt wc-forward<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>">
          <?php _e('לעדכון פרטים ', 'geffen'); ?>
        </a>

      <?php endif ?>
    <?php endif ?>
  <?php else: ?>
    <div class="cart-register-msg"><?= __('כדי להמשיך לתשלום, אנא התחברו לאתר ', 'geffen') ?></div>
    <button type="button" id="cart_register" class="cart__proceed_btn">
      <?= __('התחברות / הרשמה ', 'geffen') ?>
    </button>
  <?php endif ?>
</div>