<?php
$product = $args['product'];

$product_id = $product->get_id();
$first_variations = get_first_variation($product, 'singular');
$second_variations = get_second_variations($product, $first_variations);

?>
<div class="product-info-package-select case">
  <?php if ($first_variations): ?>
    <div class="variation-product-head">
      <h3 class="variation-product-subtitle"><?= __('טעם', 'geffen') ?></h3>
      <div class="product-select-container">
        <select name="variation_id" id="case_variation_id" class="product-select">
          <?php foreach ($first_variations as $key => $var): ?>
            <?php $var_obj = wc_get_product($var['id']); ?>
            <option value="<?= $var['id'] ?>"><?= $var['name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  <?php endif; ?>

  <?php
    $count_rows = 0;
    $count_var = 0;
  ?>
  <?php foreach ($second_variations as $name => $value) : ?>
    <?php $active = $count_rows === 0 ? 'active' : ''; ?>
    <div class="case-second-var <?= $active ?>" data-product="<?= $value[$count_rows]['main_id'] ?>">
      <?php foreach ($value as $item) : ?>
        <?php
        // Determine if the input should be disabled based on stock status
        $disabled = $item['disabled'] == 'disabled' ? 'disabled' : '';
        $checked = $count_var ===0 ? 'checked' : '';
        ?>
        <label>
          <?php if (!$disabled) : ?>
            <input type="radio"
            name="package_select"
            class="case-package-select"
            value="<?= htmlspecialchars($item['id']) ?>"
            <?= $checked ?> />
          <?php endif ?>
          <span class="package-select-btn <?= $disabled ?>"><?= htmlspecialchars($item['max_quantity']) . __(' יח’', 'geffen') ?></span>
        </label>
        <?php $count_var++; ?>
      <?php endforeach; ?>
    </div>
    <?php $count_rows++; ?>
  <?php endforeach; ?>

</div>

<div class="tastes-content case">
  <p class="qty-case-label"><?= __('כמות מארזים ', 'geffen') ?></p>

  <div class="variation-product-quantity">
    <?php if ($var_obj->get_stock_status() === 'outofstock'): ?>
      <p class="stock out-of-stock"><?= __('המלאי אזל', 'geffen') ?></p>
    <?php else: ?>
      <?php do_action('woocommerce_before_add_to_cart_quantity'); ?>
      <?php render_quantity_input($product_id); ?>
      <?php do_action('woocommerce_after_add_to_cart_quantity'); ?>
    <?php endif; ?>

    <?php $count_rows = 0; ?>
    <?php foreach ($second_variations as $key => $var_group): ?>
      <?php foreach ($var_group as $var): ?>
        <?php
        $var_obj = wc_get_product($var['id']);
        if (!$var_obj || !is_object($var_obj)) continue;

        $hidden_class = $count_rows > 0 ? 'is-hidden' : '';
        ?>
        <div class="variation-product-quantity-item <?= htmlspecialchars($hidden_class); ?>" data-product="<?= htmlspecialchars($var['id']); ?>">
          <?php
            render_variation_price($var_obj);
          ?>
        </div>
        <?php $count_rows++; ?>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </div>

  <h3 class="variation-product-subtitle"><?= __('כמות', 'geffen') ?></h3>
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
      <?php echo __( 'הוסף לסל ', 'geffen' ); ?>
      <?php get_template_part('template-parts/svg/single', 'cart') ?>
    </button>

    <input type="hidden" name="package_add_to_cart" value="<?php echo absint( $product->get_id() ); ?>" />
    <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
  </div>
</div>
