<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geffen
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="conteiner-968">
    <div class="page-title-wrap">
      <div class="page-menu-title">
        <?php the_title() ?>
      </div>

			<?php
				// Check if WooCommerce is active
				if ( class_exists( 'WooCommerce' ) && !is_order_received_page() ) { ?>
					<div class="cart-total-items">
						<?php
						// Get the cart instance
						$cart = WC()->cart;

						// Get cart contents
						$cart_items = $cart->get_cart();

						// Initialize a variable to store the total item count
						$total_items = 0;

						// Loop through the cart items and count the quantities
						foreach ( $cart_items as $cart_item_key => $cart_item ) {
								$total_items += $cart_item['quantity'];
						}

						// Display the total item count
						echo __("פריטים בעגלה ", 'geffen') . '<b>' . $total_items . '</b>'; ?>
					</div>
				<?php
				}
			?>
    </div>
  </div>

	<div class="blog-page-menu-row">
    <div class="conteiner-968">
			<?php the_post_thumbnail(); ?>

			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'geffen' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->

			<?php if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'geffen' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						),
						'<span class="edit-link">',
						'</span>'
					);
					?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
