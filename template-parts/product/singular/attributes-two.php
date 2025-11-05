<?php
/**
 *
 * This Template for all variable products who has TWO Attributes
 *
 */
$product = $args['product'];
$product_id = $product->get_id();
$first_variations = get_first_variation($product, 'singular');
$second_variations = get_second_variations($product, $first_variations);
$colors = ['#f2758a', '#f79649', '#ce88ba', 'grey'];  // Color palette
$count_var = 0;  // Initialize counter
?>

<?php get_template_part('template-parts/product/package/header', '', ['title' => __('יחידות', 'geffen')]); ?>

<div class="variation-product-quantity">
  <div class="case-var-wrap">
    <?php foreach ($second_variations as $name => $item): ?>
      <div class="case-var change-quantity">
        <h3 class="case-var-title"><?= esc_html($name) ?></h3>
        <?php
          $max_qty = $item['disabled'] ? 0 : (get_post_meta($product_id, '_max_quantity_on_hands', true) ?: 100);
          $color = $colors[$count_var] ?? 'grey';
          echo render_variation_item($item, $color, $max_qty, $count_var);
          $count_var++;

          if (!$item['disabled']) {
            foreach ($item['items'] as $var) {
              if (!$var['disabled']) {
                echo '<input type="hidden" name="variation['. esc_attr($item['id']) .'][packs]['. esc_attr($var['id']) .']" value="'. esc_attr($var['max_quantity']) .'">';
              }
            }
          }
        ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php get_template_part('template-parts/product/package/submit', '', ['action' => 'package_add_to_cart', 'product_id' => $product_id, 'total_text' => __('יחידות', 'geffen'),  'show_discount' => false]); ?>
