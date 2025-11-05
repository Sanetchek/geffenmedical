<?php $product_id = $args['id'] ?>

<?php if ( ! get_product_qty_in_cart($product_id) ) : ?>
<form action="<?= currUrl() ?>" method="post">
  <div class="a-product-price">
    <div class="a-product-price__normal-price">
      <?php
      $prod = wc_get_product($product_id);
      $price = $prod->get_sale_price() ? $prod->get_sale_price() : $prod->get_regular_price();
      echo wc_price($price);
      ?>
    </div>
  </div>

  <div style="margin-bottom:25px;">
    <div class="change-quantity">
      <button type="button" class="quantity__plus">+</button>

      <?php
        $max_qty = get_post_meta( $product_id, '_max_quantity_on_hands', true );
        $max_qty = $max_qty ? $max_qty : 100;
      ?>
      <input type="number" id="quantity" class="input-text qty text" name="quantity" value="1" aria-label="Product quantity" size="4" min="1" max="<?= $max_qty ?>" step="1" placeholder="" inputmode="numeric" autocomplete="off">

      <button type="button" class="quantity__minus">-</button>
    </div>
  </div>

  <div class="a-add-to-cart__cta">
    <div class="a-button a-button--md a-button--primary button a-button--icon-">
      <button class="btn custom-add-to-cart-button" data-product_id="<?= esc_attr($product_id) ?>"><?= __('הוספה לסל', 'geffen') ?></button>

      <input type="hidden" name="libre_add_to_cart" value="<?php echo absint($product_id); ?>" />
      <input type="hidden" name="product_id" value="<?php echo absint($product_id); ?>" />
    </div>
  </div>
</form>
<?php else : ?>
  <p><?= __('אתה מגיע למקסימום עבור יד אחת', 'geffen') ?></p>
<?php endif ?>