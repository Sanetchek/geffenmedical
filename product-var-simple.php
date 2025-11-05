<?php

 /**
  * Template Name: Variable Simple
  * Template Post Type: product
  *
  * This is the most generic template file in a WordPress theme
  * and one of the two required files for a theme (the other being style.css).
  * It is used to display a page when nothing more specific matches a query.
  * E.g., it puts together the home page when no home.php file exists.
  *
  * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
  *
  * @package geffen
  */

  defined('ABSPATH') || exit;

  global $product;

  // Form processing
  get_template_part('template-parts/product/form', 'processing-package');

  get_header('shop');

  /**
    * Hook: woocommerce_before_single_product.
    *
    * @hooked woocommerce_output_all_notices - 10
    */
  do_action('woocommerce_before_single_product');

  if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
  }

  $product = wc_get_product(get_the_ID());
  $args = ['product' => $product];
 ?>

<?php while (have_posts()): ?>
    <?php the_post(); ?>

      <div class="singl-product-page">
        <?php
        /**
         * Hook: woocommerce_before_main_content.
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20
         * @hooked WC_Structured_Data::generate_website_data() - 30
         */
        do_action('woocommerce_before_main_content');
        ?>
      </div>

      <div class="conteiner-968">
        <div class="row slider">
          <div class="col-md-6">
            <?php if ($product->get_type() === 'variable'): ?>
              <?php get_template_part('template-parts/product/content', 'variable-simple') ?>
            <?php endif ?>
          </div>

          <div class="col-md-6">
            <?php get_template_part('template-parts/product/thumbnail') ?>
          </div>
        </div>
      </div>

      <div class="conteiner-968 product-description-tab-row">
        <div class="row">
          <div class="col-md-12">
            <?php get_template_part('template-parts/product/tabs', '', $args) ?>
          </div>
        </div>
      </div>

      <?php get_template_part('template-parts/product/promotions', '', $args) ?>

<?php endwhile; // end of the loop. ?>


<?php
get_footer('shop');
