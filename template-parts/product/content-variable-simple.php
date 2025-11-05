<?php
defined( 'ABSPATH' ) || exit;
global $product;
?>

<div class="product-info">
  <h1 class="product-title"><?php the_title() ?></h1>
  <p class="product-info-subtitle"><?= get_field('subtitle') ?></p>
  <p class="product-info-subtitle2"><?= get_field('variable_subtitle') ?></p>
</div>

<?php get_template_part('template-parts/product/sale', 'cards') ?>

<div class="product-info-tabs-row">
  <?php
    do_action('woocommerce_before_add_to_cart_form');

    $tab = ['empty'];
    $args = ['product' => $product];
    foreach ($product->get_available_variations() as $variation) {
      $variation_id = $variation['variation_id'];
      $selected_tab = get_post_meta($variation_id, '_selected_tab', true);
      $tab[] = $selected_tab;
    }
    $is_tab = in_array('case', $tab) && in_array('singular', $tab);
  ?>

  <?php if ($is_tab): ?>
  <div class="product-info-tabs">
    <div class="product-info-tab active" id="case"><?= __('מארז ', 'geffen') ?></div>
    <div class="product-info-tab" id="singular"><?= __('יחידות ', 'geffen') ?></div>
  </div>
  <?php endif ?>

  <form class="variations_form cart"
    action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
    method="post" enctype='multipart/form-data' data-product_id="<?php echo absint($product->get_id()); ?>">
    <div class="product-info-tab-content package-product calculate-price active" id="case-content">
      <div class="tastes-content">
        <?php get_template_part('template-parts/product/package/var', 'simple', $args) ?>
      </div>
    </div>
  </form>
</div>