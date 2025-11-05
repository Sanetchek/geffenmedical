<?php
$total_text = $args['total_text'];
$show_discount = $args['show_discount'];
?>

<div class="product-tastes-info">
  <?php if ($show_discount):  ?>
    <div class="product-total-discount">
      <span><?= __('חסכת:', 'geffen') ?></span>
      <span class="discount-num calculate-discount">0</span>
      <span><?= get_woocommerce_currency_symbol(); ?></span>
    </div>
  <?php endif ?>
</div>

<div class="product-sum-total-wrap">
  <div class="product-sum-total-item product-sum-total-label">
    <?= __('סה”כ:', 'geffen') ?>
  </div>
  <div class="product-sum-total-item" style="text-align: center;">
    <span class="product-sum-total-qty calculate-total-qty">0</span>
    <span><?= $total_text ?></span>
  </div>
  <div class="product-sum-total-item product-sum-total-price" style="text-align: center;">
    <span class="product-sum-total-price-num calculate-total-price">0</span>
    <?= get_woocommerce_currency_symbol() ?>
  </div>
</div>