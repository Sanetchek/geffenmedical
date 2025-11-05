<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package geffen
 */

get_header();
?>
	<?php $post_type = get_post_type(); ?>
	<main id="primary" class="site-main">
		<?php
		 	if (get_post_type() !== 'managements' && get_post_type() !== 'medical_profile' && get_post_type() !== 'customer') {
				get_template_part('template-parts/breadcrumbs');
			}
		?>

		<?php
		while ( have_posts() ) :
			the_post();

			switch($post_type) {
				case 'recipes':
					get_template_part( 'template-parts/single/recipe' );
					break;
				case 'personal_stories':
					get_template_part( 'template-parts/single/story' );
					break;
				case 'webinars':
					get_template_part( 'template-parts/single/webinar' );
					break;
				case 'medical_profile':
					get_template_part( 'template-parts/single/hcp' );
					break;
				case 'customer':
					get_template_part( 'template-parts/single/customer' );
					break;
				case 'managements':
					get_template_part( 'template-parts/single/managements' );
					break;
				default: get_template_part( 'template-parts/single/articles' );
			}

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
