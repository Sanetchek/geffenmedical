<?php
$action = $args['action'];
$product_id = $args['product_id'];
$total_text = $args['total_text'];
$show_discount = $args['show_discount'];
?>

<div class="product-info-package-tastes-sum">
  <?php get_template_part('template-parts/product/package/total', '', ['show_discount' => $show_discount, 'total_text' => $total_text]) ?>

  <div class="product-add-cart">
    <button type="submit" class="product-add-cart-button">
      <?= __('הוספה לסל', 'geffen') ?>
      <?php get_template_part('template-parts/svg/single', 'cart') ?>
    </button>

    <input type="hidden" name="<?= $action ?>" value="<?= esc_attr($product_id) ?>" />
    <input type="hidden" name="product_id" value="<?= esc_attr($product_id) ?>" />
  </div>
</div>