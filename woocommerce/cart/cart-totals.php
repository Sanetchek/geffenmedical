<?php
/**
 * @version 50.0.0
 */


defined('ABSPATH') || exit;

?>

<div class="cart_totals <?php echo (WC()->customer->has_calculated_shipping()) ? 'calculated_shipping' : ''; ?>">

  <?php do_action('woocommerce_before_cart_totals'); ?>

  <section class="shop_table shop_table_responsive">

    <div class="cart-subtotal cart__grid">
      <div clas="cart__grid_head"><?php esc_html_e('מחיר', 'geffen'); ?></div>
      <div class="cart__grid_content" data-title="<?php esc_attr_e('מחיר', 'geffen'); ?>">
        <?php wc_cart_totals_subtotal_html(); ?></div>
    </div>

    <?php foreach (WC()->cart->get_coupons() as $code => $coupon): ?>
    <div class="cart__grid cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
      <div class="cart__grid_head"><?= __('קוד קופון ', 'geffen') ?> <?php echo esc_attr(sanitize_title($code)); ?>
      </div>
      <div class="cart__grid_content" data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>">
        <?php wc_cart_totals_coupon_html($coupon); ?></div>
    </div>
    <?php endforeach; ?>

    <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()): ?>

      <?php do_action('woocommerce_cart_totals_before_shipping'); ?>

        <?php get_template_part('template-parts/cart/shipping', 'total') ?>

      <?php do_action('woocommerce_cart_totals_after_shipping'); ?>

    <?php endif; ?>

    <?php foreach (WC()->cart->get_fees() as $fee): ?>
    <div class="fee cart__grid">
      <div class="cart__grid_head"><?php echo esc_html($fee->name); ?></div>
      <div class="cart__grid_content" data-title="<?php echo esc_attr($fee->name); ?>">
        <?php wc_cart_totals_fee_html($fee); ?></div>
    </div>
    <?php endforeach; ?>

    <?php
    if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) {
      $taxable_address = WC()->customer->get_taxable_address();
      $estimated_text = '';

      if (WC()->customer->is_customer_outside_base() && !WC()->customer->has_calculated_shipping()) {
        /* translators: %s location. */
        $estimated_text = sprintf(' <small>' . esc_html__('(estimated for %s)', 'woocommerce') . '</small>', WC()->countries->estimated_for_prefix($taxable_address[0]) . WC()->countries->countries[$taxable_address[0]]);
      }

      if ('itemized' === get_option('woocommerce_tax_total_display')) {
        foreach (WC()->cart->get_tax_totals() as $code => $tax) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
          ?>
        <div class="cart__grid tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
          <div class="cart__grid_head">
            <?php echo esc_html($tax->label) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
          </div>
          <div class="cart__grid_content" data-title="<?php echo esc_attr($tax->label); ?>">
            <?php echo wp_kses_post($tax->formatted_amount); ?></div>
        </div>
    <?php
        }
      } else {
        ?>
        <div class="tax-total cart__grid">
          <div class="cart__grid_head">
            <?php echo esc_html(WC()->countries->tax_or_vat()) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
          </div>
          <div class="cart__grid_content" data-title="<?php echo esc_attr(WC()->countries->tax_or_vat()); ?>">
            <?php wc_cart_totals_taxes_total_html(); ?></div>
        </div>
        <?php
      }
    }
    ?>

    <?php do_action('woocommerce_cart_totals_before_order_total'); ?>

    <?php if (is_user_logged_in()): ?>
    <div class="order-total cart__grid">
      <div class="cart__grid_head">
        <div class="cart__total_text"><?php esc_html_e('סה״כ  ', 'geffen'); ?></div>
        <!--<div class="cart__total_ship"><?php //esc_html_e('כולל משלוח  ', 'geffen'); ?></div>-->
      </div>
      <div class="cart__grid_content" data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>">
        <?php wc_cart_totals_order_total_html(); ?>
      </div>
    </div>
    <?php endif; ?>

    <?php do_action('woocommerce_cart_totals_after_order_total'); ?>

  </section>