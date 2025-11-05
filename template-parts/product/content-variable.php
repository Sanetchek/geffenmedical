<?php
defined( 'ABSPATH' ) || exit;
global $product;
?>

<div class="product-info">
  <h1 class="product-title"><?php the_title() ?></h1>
  <p class="product-info-subtitle"><?= get_field('subtitle') ?></p>
  <p class="product-info-subtitle2"><?= get_field('variable_subtitle') ?></p>
</div>

<?php
$field = get_field('sales');
?>
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
<!------singl-product--->
<!---product-package--->
<?php $pack = get_field('sales_package') ?>
<?php if ($pack) : ?>
  <div class="single-onsale-package">
  <div class="single-onsale-club">
    <div class="single-onsale-icon-package">
    <img src="/wp-content/uploads/2024/09/ri_discount-percent-fill.svg" alt="">
    </div>
    <p class="single-onsale-title">מחיר מיוחד לחברי מועדון!</p>
  </div>
  <div class="single-onsale-club-text">
  <p><?php echo get_field('sales_package_text')?></p>
  </div>

    <ul class="single-onsale-list-package">
    <?php foreach ($pack as $packitem) : ?>
      <li class="single-onsale-item-package">
      <p class="sale_quantity"><?= $packitem['sale_quantity'] ?></p>
      <p class="sale_club_price"><span>₪</span><?= $packitem['sale_club_price'] ?></p>
      <div class="retail_price_block"><p class="retail_price"><?= $packitem['retail_price'] ?></p><p class="retail_price_currency">₪</p></div>
    </li>
    <?php endforeach ?>
    </ul>
    <div><?php get_template_part('template-parts/product/subscribe-popup') ?></div>
  </div>
<?php endif ?>
<!---product-packege--->

<div class="product-info-tabs-row">
  <?php
    do_action( 'woocommerce_before_add_to_cart_form' );

    $args = ['product' => $product];
  ?>

  <form class="variations_form cart"
    action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>"
    method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>">
    <div class="product-info-tab-content singularity-products active" id="singular-content">
      <?php get_template_part('template-parts/product/singular', '', $args) ?>
    </div>
  </form>
</div>
</div>