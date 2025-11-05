<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geffen
 */

// Get the post type of the specified post ID
$post_type = get_post_type(get_the_ID());
?>

<div class="row  search-page-conteiner-product">
	<div class="col-6">
		<div class="search-page-conteiner-product-img">
			<?php
				if (has_post_thumbnail()) {
					if ($post_type === 'product') {
						the_post_thumbnail('search-thumb-product');
					} else {
						the_post_thumbnail('search-thumb');
					}

				} else {
					// If there's no featured image, display a default image
					echo '<img src="' . wc_placeholder_img_src('woocommerce_single') . '" alt="Default Product Image">';
				}
			?>
		</div>
	</div>
	<div class="col-6 search-page-conteiner-product-info">
		<a class="search-page-conteiner-product-info-content"
			href="<?= get_the_permalink() ?>">
			<div class="product-info">
				<h1 class="product-title">
					<?php 
						if (wp_is_mobile()) {
							//$title = str_word(get_the_title($id), 4, ' ...'); 
							echo mb_strimwidth(get_the_title($id), 0, 35, '...');
						} else {
							echo get_the_title(); 
						}
					?>
				</h1>
				<p class="product-info-subtitle">
					<?php if ($post_type === 'product'):
						$product = wc_get_product(get_the_ID());

						if (wp_is_mobile()) {
							//$title = str_word(get_the_title($id), 4, ' ...');
							$title = mb_strimwidth(get_the_title($id), 0, 35, '...');

							$subtitle = mb_strimwidth(get_field('subtitle', $id), 0, 50, ' ...');
						} else {
							$title = get_the_title($id);
							$subtitle = get_field('subtitle', $id);
						}
					else :
						if (!wp_is_mobile()) {
							the_excerpt();
						} else {
						?>
						<p><?php echo mb_strimwidth(get_the_content(), 0, 50, ' ...'); ?></p>
						<?php
						}
					endif ?>
				</p>

				<?php if ($post_type === 'product'): ?>
					<div class="promotions-prise">
						<?php
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
						<?php if ($product->get_sale_price()): ?>
							<p class="promotions-item-prise"><?= $sale ?></p>
							<p class="promotions-item-aktionprise"><?= $regular ?></p>
						<?php else: ?>
							<p class="promotions-item-prise"><?= $regular ?></p>
						<?php endif ?>
					</div>
				<?php endif ?>
			</div>
		</a>
	</div>
</div>