<?php
$product = $args['product'];
$product_id = $product->get_id();
$first_variations = get_first_variation($product, 'singular');
$second_variations = get_second_variations($product, $first_variations);
$colors = ['#f2758a', '#f79649', '#ce88ba', 'grey'];  // Color palette
$count_var = 0;  // Initialize counter
?>

<?php get_template_part('template-parts/product/package/header', '', ['title' => __('מארז 12 יחידות', 'geffen')]); ?>

<div class="variation-product-quantity">
  <div class="case-var-wrap">
    <?php foreach ($second_variations as $name => $items): ?>
      <div class="case-var change-quantity">
        <h3 class="case-var-title"><?= esc_html($name) ?></h3>
        <?php foreach ($items['items'] as $item):
          $max_qty = $item['disabled'] ? 0 : (get_post_meta($product_id, '_max_quantity_on_hands', true) ?: 100);
          $color = $colors[$count_var] ?? 'grey';
          echo render_variation_item($item, $color, $max_qty, $count_var);
          $count_var++;
        endforeach; ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php get_template_part('template-parts/product/package/submit', '', ['action' => 'package_add_to_cart', 'product_id' => $product_id, 'total_text' => __('מארזים', 'geffen'), 'show_discount' => true]); ?>