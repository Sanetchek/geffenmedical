<?php
/**
 * @version 50.0.0
 */


defined('ABSPATH') || exit; ?>

<?php do_action('woocommerce_before_cart'); ?>

<?php get_template_part('template-parts/cart/form', 'items') ?>

<div class="offers-slider">
  <?php get_template_part('template-parts/cart/offers') ?>
</div>

<?php do_action('woocommerce_before_cart_collaterals'); ?>

<div class="cart-collaterals">
  <div class="cart__flex">
    <div class="cart__flex_side">
      <?php get_template_part('template-parts/cart/shipping') ?>
    </div>

    <div class="cart__flex_side">
      <div class="cart__wrap">
        <h2 class="cart__title"><?php esc_html_e('סה״כ לתשלום', 'geffen'); ?></h2>

        <?php get_template_part('template-parts/cart/coupon'); ?>

        <?php
        /**
         * Cart collaterals hook.
         *
         * @hooked woocommerce_cross_sell_display
         * @hooked woocommerce_cart_totals - 10
         */
        do_action('woocommerce_cart_collaterals');
        ?>
      </div>

      <div class="cart__proceed_notes">
        <?php get_template_part('template-parts/cart/cart', 'next'); ?>
      </div>

      <?php do_action('woocommerce_after_cart_totals'); ?>
    </div>
  </div>
</div>

</div>

<?php do_action('woocommerce_after_cart'); ?>