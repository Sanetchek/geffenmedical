<?php
$product = $args['product'];
$product_id = $product->get_id();
$first_variations = get_first_variation($product, 'singular');
$main_colors = ['#f2758a', '#f79649', '#ce88ba']; // Three main colors
$default_disabled_color = 'grey'; // Color for disabled items
$count_var = 0; // Initialize counter
?>

<?php get_template_part('template-parts/product/package/header', '', ['title' => __('מארז 1 יחידות', 'geffen')]); ?>

<div class="variation-product-quantity">
  <div class="case-var-wrap var-simple">
    <?php foreach ($first_variations as $name => $items): ?>
      <div class="case-var change-quantity">
        <h3 class="case-var-title"><?= esc_html($items['name']) ?></h3>
        <?php
          $max_qty = $items['disabled'] ? 0 : (get_post_meta($product_id, '_max_quantity_on_hands', true) ?: 100);
          $color = $items['disabled'] ? $default_disabled_color : $main_colors[$count_var % count($main_colors)];
          echo render_variation_item($items, $color, $max_qty, $count_var);
          if (!$items['disabled']) {
            $count_var++; // Increment only for enabled items
          }
        ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php get_template_part('template-parts/product/package/submit', '', ['action' => 'package_add_to_cart', 'product_id' => $product_id, 'total_text' => __('מארזים', 'geffen'), 'show_discount' => true]); ?>
