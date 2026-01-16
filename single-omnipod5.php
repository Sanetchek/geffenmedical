<?php
/**
 * The template for displaying all single posts of type omnipod5
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package geffen
 */

get_header();
?>

<?php
while ( have_posts() ) :
	the_post();
	
	// Get the page template assigned to this post
	// For custom post types, we need to check the meta field directly
	$page_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
	
	// If a custom template is assigned, load it
	if ( $page_template && $page_template != 'default' ) {
		// Get the template file path
		$template_path = locate_template( $page_template );
		
		if ( $template_path ) {
			// Load the template
			load_template( $template_path, false );
			// Exit to prevent default rendering
			return;
		}
	}
	
	// Fallback: default display if no template assigned or template not found
	get_template_part( 'template-parts/breadcrumbs' );
	get_template_part( 'template-parts/content', 'page' );

endwhile; // End of the loop.
?>

<?php
get_footer();

