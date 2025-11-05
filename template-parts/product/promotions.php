<?php $product = $args['product']; ?>

<div class="conteiner-968">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-al-start mt-100"><?= __('אולי גם תאהבו ', 'geffen') ?></h2>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="main-page-promotions">
        <div class="multiple-items3">
          <?php
            $category = get_the_terms( get_the_ID(), 'product_cat' );
            $array_id = [];
            foreach ( $category as $cat){
              $array_id[] = $cat->term_id;
            }
            $args = array(
              'post_type'      => 'product', // WooCommerce products are a custom post type
              'posts_per_page' => -1, // Retrieve all products
              'post__not_in' => array(get_the_ID()),
              'orderby' => 'rand',
              'has_password' => false,
              'tax_query' => array(
                array(
                  'taxonomy' => 'product_cat',
                  'field' => 'term_id',
                  'terms' => $array_id,
                ),
              ),
            );
            $promo = get_posts($args);
          ?>

          <?php if ($promo) : ?>
          <?php foreach ($promo as $product) : ?>
          <?php
                $id = $product->ID;
                $product = wc_get_product( $id );
              ?>

          <?php $args = ['id' => $id, 'product' => $product]; ?>
          <?php get_template_part('template-parts/product', 'related', $args) ?>
          <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>