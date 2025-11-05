<?php
defined( 'ABSPATH' ) || exit;
global $product;

$product_id = $product->get_id();
?>
<?php $sale = $product->get_sale_price(); ?>
<?php $regular = $product->get_regular_price(); ?>
<?php $club_price = get_post_meta(get_the_ID(), 'club_price', true); ?>
<div class="product-info">
  <h1 class="product-title"><?php the_title() ?></h1>
  <p class="product-info-subtitle"><?= get_field('subtitle') ?></p>
</div>

<?php get_template_part('template-parts/product/sale', 'cards') ?>

<div class="product-info--row">
  <div class="tastes-content">
    <div class="product-info-package-tastes-sum">
      <?php
      if ( ! $product->is_purchasable() ) {
        return;
      }

      echo wc_get_stock_html( $product ); // WPCS: XSS ok.

      if ( $product->is_in_stock() ) : ?>

      <?php // do_action( 'woocommerce_before_add_to_cart_form' ); ?>

      <?php if ( ! get_product_qty_in_cart($product_id) ) : ?>
      <form class="cart"
        action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>"
        method="post" enctype='multipart/form-data'>
        <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

        <?php
            $max_qty = get_post_meta( $product_id, '_max_quantity_on_hands', true );
            $max_qty = $max_qty ? $max_qty : 100;

            do_action( 'woocommerce_before_add_to_cart_quantity' );

            woocommerce_quantity_input(
              array(
                'min_value'   => 0,
                'max_value'   => $max_qty,
                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
              )
            );

            do_action( 'woocommerce_after_add_to_cart_quantity' );
            ?>

        <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>"
          class="product-add-cart-button">
          <?php echo __( 'הוספה לסל', 'geffen' ); ?>
          <?php get_template_part('template-parts/svg/single', 'cart') ?>
        </button>

        <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
      </form>
      <?php else : ?>
      <p><?= __('אתה מגיע למקסימום עבור רכישה אחת', 'geffen') ?></p>
      <?php endif ?>

      <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

      <?php endif; ?>
    </div>

    <?php if ($sale) : ?>
    <div class="product-special-price">
      <div class="product-special-price-sale">
        <p class="product-special-price-new"><?= wc_price($sale) ?></p>
        <p class="product-special-price-title"><?= __('מחיר מועדון ', 'geffen') ?></p>
      </div>

      <div class="product-special-price-regular">
        <p class="product-special-price-old"><?= wc_price($regular) ?></p>
        <p class="product-special-price-old-title"><?= __('מחיר רגיל ', 'geffen') ?></p>
      </div>
    </div>
    <?php else : ?>
      <div class="product-special-price singularity-product-special-price">
        <p class="product-special-price-new"><?= wc_price($regular) ?></p>
        <p class="product-special-price-title"><?= __('מחיר מועדון ', 'geffen') ?></p>
      </div>
    <?php endif; ?>


    <?php if ($club_price) : ?>
    <div class="product-special-price-club singularity-special-price-club">
      <p class="product-club-price"><?php echo wc_price($club_price) ?></p>
      <p class="product-club-price-title"><?php echo __('מחיר מועדון ', 'geffen') ?></p>
    </div>
    <?php endif ?>

    <div style="display: flex;justify-content: end;"><?php get_template_part('template-parts/product/subscribe-popup') ?></div>


  </div>
</div>