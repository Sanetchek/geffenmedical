<?php
/**
 *
 * This Template for all variable products who has ONE Attribute
 *
 */
$product = $args['product'];
$product_id = $product->get_id();
$first_variations = get_first_variation($product, 'singular');

$name = $product_id == 2542 ?  __('מידה', 'geffen') : __('צבע', 'geffen');
?>

<div class="variable-header variable-table">
  <div class="var-header-item"><?= $name ?></div>
  <div class="var-header-item"><?= __('כמות', 'geffen') ?></div>
  <div class="var-header-item"><?= __('מחיר ליח’', 'geffen') ?></div>
</div>

<?php if ($first_variations): ?>
  <div class="variable-products-container">
    <?php foreach ($first_variations as $key => $var): ?>
      <?php
      $var_obj = wc_get_product($var['id']);
      $show_price = get_priority_price($var_obj);

      // Get the product image ID and URL
      $image_id = $var_obj->get_image_id();
      $image_url = wp_get_attachment_image_url($image_id, 'woocommerce_thumbnail');
      ?>

      <div class="var-products-item variable-table calculate-item" data-price="<?= esc_attr($show_price) ?>">
        <div class="var-products-info">
          <img src="<?= esc_url($image_url); ?>" alt="<?= esc_attr($var['name']); ?>" class="var-product-image"> <!-- Use placeholder if no image -->
          <h2><?= esc_html($var['name']); ?></h2>
        </div>

        <div class="var-products-qty">
          <?php if ($var['disabled']): ?>
            <p class="stock out-of-stock"><?= __('המלאי אזל', 'geffen') ?></p>
          <?php else: ?>
            <?php do_action('woocommerce_before_add_to_cart_quantity'); ?>
            <?php render_quantity_input($var['id']); ?>
            <?php do_action('woocommerce_after_add_to_cart_quantity'); ?>
          <?php endif; ?>
        </div>

        <div class="var-products-price">
          <?php render_variation_price($var_obj); ?>
        </div>
      </div>

    <?php endforeach; ?>
  </div>
<?php endif; ?>

<div class="variable-footer">
  <div class="var-calculation variable-table">
    <div class="product-sum-total-item product-sum-total-label">
      <?= __('סה”כ:', 'geffen') ?>
    </div>
    <div class="product-sum-total-item" style="text-align: center;">
      <span class="product-sum-total-qty calculate-total-qty">0</span>
      <span><?= __('יחידות', 'geffen') ?></span>
    </div>
    <div class="product-sum-total-item product-sum-total-price" style="text-align: center;">
      <span class="product-sum-total-price-num calculate-total-price">0</span>
      <?= get_woocommerce_currency_symbol() ?>
    </div>
  </div>

  <div class="product-add-cart">
    <button type="submit" class="product-add-cart-button">
      <?= __('הוספה לסל', 'geffen'); ?>
      <?php get_template_part('template-parts/svg/single', 'cart'); ?>
    </button>

    <input type="hidden" name="variables_add_to_cart" value="<?= absint($product->get_id()); ?>" />
    <input type="hidden" name="product_id" value="<?= absint($product->get_id()); ?>" />
  </div>
</div>
