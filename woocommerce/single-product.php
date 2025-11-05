<?php
/**
 * @version 50.0.0
 */


defined( 'ABSPATH' ) || exit;

global $product;

// Form processing
get_template_part('template-parts/product/form', 'processing-package');

get_header( 'shop' );

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
$product = wc_get_product( get_the_ID() );
$args = ['product' => $product];
?>

<?php while ( have_posts() ) : ?>
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
			do_action( 'woocommerce_before_main_content' );
			?>

		</div>

		<div class="conteiner-968">
			<div class="row slider">
				<div class="col-md-6">
					<?php if ($product->get_type() === 'simple') : ?>
						<?php get_template_part('template-parts/product/content', 'simple') ?>
					<?php elseif ($product->get_type() === 'variable') : ?>
						<?php get_template_part('template-parts/product/content', 'variable-package') ?>
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
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
