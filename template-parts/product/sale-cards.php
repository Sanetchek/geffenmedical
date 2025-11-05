<!------single-product--->
<?php $field = get_field('sales'); ?>
<?php if ($field) : ?>
<div class="single-onsale">
  <div class="single-onsale-club">
    <div class="single-onsale-icon">
      <?php get_template_part('template-parts/svg/sale') ?>
    </div>

    <ul class="single-onsale-list">
      <?php foreach ($field as $item) : ?>
        <li class="single-onsale-item"><?= $item['sale_text'] ?></li>
      <?php endforeach ?>
    </ul>
  </div>
</div>
<?php endif ?>

<!---product-package--->
<?php $pack = get_field('sales_package') ?>
<?php if ($pack) : ?>
<div class="single-onsale-package show-login-popup-block">
  <div class="single-onsale-club">
    <div class="single-onsale-icon-package">
      <img src="/wp-content/uploads/2024/09/ri_discount-percent-fill.svg" alt="">
    </div>
    <p class="single-onsale-title">מחיר מיוחד לחברי מועדון!</p>
  </div>
  <div iv class="single-onsale-club-text">
    <p><?php echo get_field('sales_package_text')?></p>
  </div>

  <ul class="single-onsale-list-package">
    <?php foreach ($pack as $packitem) : ?>
    <li class="single-onsale-item-package">
      <p class="sale_quantity"><?= $packitem['sale_quantity'] ?></p>
      <p class="sale_club_price"><span>₪</span><?= $packitem['sale_club_price'] ?></p>
      <div class="retail_price_block">
        <p class="retail_price"><?= $packitem['retail_price'] ?></p>
        <p class="retail_price_currency">₪</p>
      </div>
    </li>
    <?php endforeach ?>
  </ul>
  <div><?php get_template_part('template-parts/product/subscribe-popup') ?></div>
</div>
<?php endif ?>