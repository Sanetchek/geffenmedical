<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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
 *
 * @var WC_Order $order
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

  <?php if ( $order ) : ?>
    <?php $order_id = $order->get_order_number(); ?>

    <div class="success-payment">

      <div class="success-payment-header">
        <div class="conteiner-968">
          <div class="success-payment-header-infopayment">
            <div class="success-payment-thanks">
              <p style="text-align: right;margin-top: 0!important;"><?= __('היי ', 'geffen') ?>
                <span><?= $order->get_formatted_billing_full_name() ?></span> <?= __('תודה שקנית אצלנו!', 'geffen') ?></p>
            </div>

            <div class="infopayment-date-order">
              <p class="title" style="color: #0A3B64;"><?= __('תאריך - ', 'geffen') ?></p>
              <p>
                <?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
              </p>
            </div>

            <div class="infopayment-order-number">
              <p class="title" style="color: #0A3B64;"><?= __('מספר הזמנה - ', 'geffen') ?></p>
              <p><?php echo $order_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
            </div>
          </div>
        </div>

        <div class="success-payment-order-info">
          <article class="page type-page status-publish hentry">
            <div class="conteiner-968">
              <div class="page-title-wrap">
                <div class="page-menu-title"><?= __('פרטי ההזמנה', 'geffen') ?></div>
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
                                  <a href="<?= $product_link ?>"><?= $product_name ?></a>
                                </div>

                                <div class="product-quantity">
                                  <?= $quantity . ' ' . __('יח’', 'geffen') ?>
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
                          endif;
                        ?>
                      </section>
                    </div>
                  </div><!-- .entry-content -->
                </div>
              </div>
            </div>
          </article>
        </div>

        <div class="success-payment-order-additionalinfo" style="margin-bottom: 210px;">
          <?php
              $order_subtotal = $order->get_subtotal(); // Order subtotal
              $order_total = $order->get_total(); // Order total
            ?>
          <div class="conteiner-968">
            <div class="page-menu-title" style="border-top: 1px solid #D3D3D3;padding-top: 70px;">
              <?= __('סיכום ההזמנה ', 'geffen') ?></div>

            <?php
                // Get shipping method
                $shipping_method = $order->get_shipping_method();
                if ($shipping_method) : ?>
            <p class="order-additionalinfo-delivery" style="text-align: right!important;"><?= __('משלוח - ', 'geffen') ?>
              <span><?= esc_html($shipping_method) ?></span></p>
            <?php endif; ?>

            <?php
            // Get order comments
            $order_comments = $order->get_customer_note();
            if ($order_comments) : ?>
            <p class="order-additionalinfo-commit" style="text-align: right!important;"><?= __('הערות - ', 'geffen') ?>
              <span><?= nl2br(esc_html($order_comments)) ?></span></p>
            <?php endif; ?>

            <p class="order-additionalinfo-total" style="text-align: right!important;"><?= __('סך הכל - ', 'geffen') ?>
              <span> <?= wc_price($order_total) ?></span></p>
          </div>
        </div>
      </div>
    </div>

  <?php endif; ?>

  <?php
    // Send purchase event when an order is placed
    send_purchase_event($order_id);
  ?>

</div>