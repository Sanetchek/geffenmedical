<?php
$product = $args['product'];
$product_id = $product->get_id();
$first_variations = get_first_variation($product, 'singular');
$second_variations = get_second_variations($product, $first_variations);
?>

<?php if ($second_variations) : ?>
  <div class="tastes-content">
    <?php get_template_part('template-parts/product/singular/attributes', 'two', ['product' => $product]); ?>
  </div>
<?php else: ?>
  <?php get_template_part('template-parts/product/singular/attributes', 'one', ['product' => $product]); ?>
<?php endif ?>
