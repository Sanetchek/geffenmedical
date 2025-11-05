<?php
/**
 * @version 50.0.0
 */


defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<?php
	$product = wc_get_product( get_the_ID() );
	$sale = wc_price($product->get_sale_price());

	if ($product->is_type('variable')) {
		// Get the variation prices
		$variations = $product->get_available_variations();

		// Initialize variables for min and max prices
		$min_price = PHP_INT_MAX;
		$max_price = 0;

		// Loop through variations to find min and max prices
		foreach ($variations as $variation) {
			$price = $variation['display_price'];

			if ($price < $min_price) {
				$min_price = $price;
			}

			if ($price > $max_price) {
				$max_price = $price;
			}
		}

		// Output the price range
		$regular = wc_price($min_price) . ' - ' . wc_price($max_price);
	} else {
		// If it's not a variable product, get and output the regular price
		$price = $product->get_regular_price();
		$regular = wc_price($price);
	}
?>

<?php
	$promotion = '';
	if ($product->get_sale_price()) {
		$promotion = ' promotions-action-content';
	}
?>

<div class="main-page-promotions-content<?= $promotion ?>">
	<div class="main-page-promotions-item">

	<?php if ($product->get_sale_price()) : ?>
		<div class="main-page-promotions-flag">
			<p><?= __('מחיר מיוחד ', 'geffen') ?></p>
		</div>
	<?php endif ?>

	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' );?>
	<a href="<?php the_permalink() ?>">
		<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $id; ?>">
	</a>

	</div>

	<div class="promotions-item-content-info">

	<div class="promotions-item-content">
		<a href="<?php the_permalink() ?>">
			<?php if (wp_is_mobile()): ?>
				<p class="promotions-item-title"><?= mb_strimwidth( get_the_title(),  0, 38, '...') ?></p>
          	<?php else: ?>
          		<p class="promotions-item-title"><?php the_title() ?></p>
        	<?php endif; ?>
		</a>
		<?php if (wp_is_mobile()): ?>
		<p class="promotions-item-subtitle"><?= mb_strimwidth( get_field('subtitle'),  0, 50, '...') ?></p>
		<?php else: ?>
		<p class="promotions-item-subtitle"><?php the_field('subtitle') ?></p>
		<?php endif; ?>
	</div>

	<div class="promotions-prise">
		<?php if ($product->get_sale_price()) : ?>
			<p class="promotions-item-prise"><?= $sale ?></p>
			<p class="promotions-item-aktionprise"><?= $regular ?></p>
		<?php else: ?>
			<p class="promotions-item-prise"><?= $regular ?></p>
		<?php endif ?>
	</div>

	</div>
</div>

