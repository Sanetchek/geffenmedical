<?php
$product = $args['product'];
$product_id = $product->get_id();
$first_variations = get_first_variation($product, 'singular');
$second_variations = get_second_variations($product, $first_variations);
?>

<div class="tastes-content">
  <h2 class="tastes-title"><?= esc_html(get_field('attribute_name')) ?></h2>

  <?php if ($first_variations): ?>
    <div class="variation-product-head">
      <h3 class="variation-product-subtitle"><?= __('טעם', 'geffen') ?></h3>
      <div class="product-select-container">
        <select name="variation_id" id="variation_id" class="product-select">
          <?php foreach ($first_variations as $key => $var): ?>
            <?php $var_obj = wc_get_product($var['id']); ?>
            <option value="<?= $var['id'] ?>"><?= $var['name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="variation-product-quantity">
      <?php if ($var_obj->get_stock_status() === 'outofstock'): ?>
        <p class="stock out-of-stock"><?= __('המלאי אזל', 'geffen') ?></p>
      <?php else: ?>
        <?php do_action('woocommerce_before_add_to_cart_quantity'); ?>
        <?php render_quantity_input($product_id); ?>
        <?php do_action('woocommerce_after_add_to_cart_quantity'); ?>
      <?php endif; ?>

      <?php foreach ($first_variations as $key => $var): ?>
        <?php
        $var_obj = wc_get_product($var['id']);
        $hidden_class = $key > 0 ? 'is-hidden' : '';
        ?>
        <div class="variation-product-quantity-item <?= $hidden_class ?>" data-product="<?= $var['id'] ?>">
          <?php
            render_variation_price($var_obj);

            foreach ($second_variations as $name => $items) {
              if ($var['name'] === $name) {
                foreach ($items as $item) {
                  $disabled = $key > 0 ? 'disabled' : '';

                  if (!$item['disabled']) {
                    echo '<input type="hidden" name="packages['. $item['max_quantity'] .']" value="'. $item['id'] .'" '.$disabled.'>';
                  }
                }
              }
            }
          ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <div class="product-info-package-tastes-sum">
    <h3 class="variation-product-subtitle"><?= __('כמות', 'geffen') ?></h3>
    <div class="product-sum-total-wrap">
      <div class="product-sum-total-item product-sum-total-label">
        <?= __('סה”כ:', 'geffen') ?>
      </div>
      <div class="product-sum-total-item" style="text-align: center;">
        <span class="product-sum-total-qty">0</span>
        <span><?= __('יחידות', 'geffen') ?></span>
      </div>
      <div class="product-sum-total-item product-sum-total-price" style="text-align: center;">
        <span class="product-sum-total-price-num">0</span>
        <?= get_woocommerce_currency_symbol() ?>
      </div>
    </div>

    <div class="product-add-cart">
      <button type="submit" class="product-add-cart-button">
        <?= __('הוספה לסל', 'geffen'); ?>
        <?php get_template_part('template-parts/svg/single', 'cart'); ?>
      </button>

      <input type="hidden" name="single_add_to_cart" value="<?= absint($product->get_id()); ?>" />
      <input type="hidden" name="product_id" value="<?= absint($product->get_id()); ?>" />
    </div>
  </div>
