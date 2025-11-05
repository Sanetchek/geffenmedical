<?php $product_id = $args['id'] ?>

<?php if ( ! get_product_qty_in_cart($product_id) ) : ?>
<form action="<?= currUrl() ?>" method="post">
  <div class="check">
    <div class="change-quantity quantity">
      <?php
        $max_qty = get_post_meta( $product_id, '_max_quantity_on_hands', true );
        $max_qty = $max_qty ? $max_qty : 100;
      ?>
      <input type="number" id="quantity" class="input-text qty text inp-desk" name="quantity" value="1" aria-label="Product quantity" size="4" min="1" max="<?= $max_qty ?>" step="1" placeholder="" inputmode="numeric" autocomplete="off">

      <button type="button" class="quantity__plus btn_qty btn_qty_plus">
        <img src="/wp-content/uploads/2023/12/reader-row3.png" alt="">
      </button>

      <button type="button" class="quantity__minus btn_qty btn_qty_minus">
        <img src="/wp-content/uploads/2023/12/reader-row4.png" alt="">
      </button>
    </div>

    <div class="price">
      <span class="he-number">
        <?php $prod = wc_get_product($product_id); ?>
        <?= $prod->get_price_html() ?>
      </span>
    </div>
  </div>
  <div class="a-add-to-cart__cta">
    <div class="a-button a-button--md a-button--primary button a-button--icon-">
      <button class="btn btn-orange add-cart-button indef148 custom-add-to-cart-button" data-product_id="<?= esc_attr($product_id) ?>"><?= __('הוסף לסל', 'geffen') ?></button>

      <input type="hidden" name="libre_add_to_cart" value="<?php echo absint($product_id); ?>" />
      <input type="hidden" name="product_id" value="<?php echo absint($product_id); ?>" />
    </div>
  </div>
</form>
<?php else : ?>
  <p><?= __('אתה מגיע למקסימום עבור יד אחת', 'geffen') ?></p>
<?php endif ?>
