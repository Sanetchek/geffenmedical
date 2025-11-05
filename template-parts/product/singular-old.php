<?php
$product = $args['product'];
$attr = get_variation($product);
$product_id = $product->get_id();
?>

<div class="tastes-content">
  <?php if ($attr): ?>
    <div class="variation-product-head">
      <div class="variation-product-head-item"><?= __('מוצר', 'geffen') ?></div>
      <div class="variation-product-head-item" style="text-align: center;"><?= __('כמות', 'geffen') ?></div>
      <div class="variation-product-head-item" style="text-align: center;"><?= __('מחיר ליח’', 'geffen') ?></div>
    </div>

    <div class="variation-product-quantity">
      <?php foreach ($attr as $id => $option): ?>
        <div class="variation-product-quantity-item">
          <?php
            // Get the variation object.
            $variation = wc_get_product($id);
          ?>
          <div class="variation-product-info">
            <div class="variation-product-image">
              <?php if ($option['image']): ?>
                <?php
                  $url = $option['image'][0];
                  $alt = $option['attributes'][0];
                  $width = $option['image'][1];
                  $height = $option['image'][2];
                ?>
                <img src="<?= $url ?>" alt="<?= $alt ?>" width="<?= $width ?>" height="<?= $height ?>">
              <?php else: ?>
                <img src="<?= wc_placeholder_img_src('woocommerce_single') ?>" alt="Default Product Image">
              <?php endif ?>
            </div>

            <div class="variation-product-name">
              <?php foreach ($option['attributes'] as $attr_name): ?>
                <p><?= $attr_name ?></p>
              <?php endforeach ?>
            </div>
          </div>

          <div class="variation-product-qty">
            <?php
            do_action('woocommerce_before_add_to_cart_quantity');

            $args = array(
              'input_name' => 'quantities[' . $id . ']',
              'input_value' => 0,
              'min_value' => 0,
              'max_value' => 100,
              'step' => 1,
              'classes' => array('input-text', 'qty', 'text'),
            );

            woocommerce_quantity_input($args);

            echo '<span class="quantity-text">' . __('יח', 'geffen') . '</span>';

            do_action('woocommerce_after_add_to_cart_quantity');
            ?>
            <input type="hidden" name="variations[<?= $id ?>]" class="multi_variation_id" value="<?= $id ?>" />
          </div>

          <div class="variation-product-price">
            <?php if ($variation->is_on_sale()): ?>
              <div class="regular-price" data-price="<?= $option['sale_price'] ?>">
                <?= wc_price($option['sale_price']) ?>
              </div>
              <div class="sale-price">
                <?= wc_price($option['price']) ?>
              </div>
            <?php else: ?>
              <div class="regular-price" data-price="<?= $option['price'] ?>">
                <?= wc_price($option['price']) ?>
              </div>
            <?php endif ?>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>

  <div class="product-info-package-tastes-sum">
    <div class="product-sum-total-wrap">
      <div class="product-sum-total-item product-sum-total-label">
        <?= __('סה”כ:', 'geffen') ?>
      </div>
      <div class="product-sum-total-item" style="text-align: center;">
        <span class="product-sum-total-qty">0</span>
        <span>
          <?= __('יחידות', 'geffen') ?>
        </span>
      </div>
      <div class="product-sum-total-item product-sum-total-price" style="text-align: center;">
        <span class="product-sum-total-price-num">0</span>
        <?= get_woocommerce_currency_symbol() ?>
      </div>
    </div>

    <div class="product-add-cart">
      <button type="submit" class="product-add-cart-button">
        <?php echo __('הוספה לסל', 'geffen'); ?>
        <?php get_template_part('template-parts/svg/single', 'cart') ?>
      </button>

      <input type="hidden" name="multiple_add_to_cart" value="<?php echo absint($product->get_id()); ?>" />
      <input type="hidden" name="product_id" value="<?php echo absint($product->get_id()); ?>" />
    </div>
  </div>
</div>