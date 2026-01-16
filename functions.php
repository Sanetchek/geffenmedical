<?php
/**
 * geffen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package geffen
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function geffen_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on geffen, use a find and replace
	 * to change 'geffen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('geffen', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary Header', 'geffen'),
			'menu-2' => esc_html__('Secondary Header', 'geffen'),
			'menu-libre' => esc_html__('Libre Menu', 'geffen'),
			'menu-omnipod' => esc_html__('Omnipod Menu', 'geffen'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'geffen_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	// Add Image Sizes
	add_image_size('search-thumb', 384, 248, true);
	add_image_size('search-thumb-product', 246, 246, true);
	add_image_size('blog-thumb', 252, 162, true);
	add_image_size('338-200', 338, 200, true);
	add_image_size('single-post-image', 300, 340, false);
	add_image_size('single-post-thumbnail', 222, 262, true);
	add_image_size('single-thumb', 768, 263, true);
	add_image_size('home-thumb', 580, 390, true);
	add_image_size('300-422', 300, 422, true);
	add_image_size('135-148', 135, 148, true);
	/**
	 * Remove WordPress Meta Generator
	 */
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10);
	remove_action('wp_head', 'parent_post_rel_link', 10);
	remove_action('wp_head', 'wp_shortlink_wp_head', 10);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
	remove_action('wp_head', 'print_emoji_detection_script', 7);
}
add_action('after_setup_theme', 'geffen_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function geffen_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'geffen'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'geffen'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__('Footer Widget 1', 'geffen'),
			'id' => 'footer-1',
			'description' => esc_html__('First area', 'geffen'),
			'before_widget' => '<div class="wsfooterwdget">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__('Footer Widget 2', 'geffen'),
			'id' => 'footer-2',
			'description' => esc_html__('Second area', 'geffen'),
			'before_widget' => '<div class="wsfooterwdget">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__('Footer Widget 3', 'geffen'),
			'id' => 'footer-3',
			'description' => esc_html__('Third area', 'geffen'),
			'before_widget' => '<div class="wsfooterwdget">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__('Footer Widget 4', 'geffen'),
			'id' => 'footer-4',
			'description' => esc_html__('Fourth area', 'geffen'),
			'before_widget' => '<div class="wsfooterwdget">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__('Footer Widget 5', 'geffen'),
			'id' => 'footer-5',
			'description' => esc_html__('Fifth area', 'geffen'),
			'before_widget' => '<div class="wsfooterwdget">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);


	register_sidebar(
		array(
			'name' => esc_html__('Footer Widget 6', 'geffen'),
			'id' => 'footer-6',
			'description' => esc_html__('Sixth area', 'geffen'),
			'before_widget' => '<div class="wsfooterwdget">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__('Footer Widget 7', 'geffen'),
			'id' => 'footer-7',
			'description' => esc_html__('Seven area', 'geffen'),
			'before_widget' => '<div class="wsfooterwdget">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__('Footer mobile Widget 1', 'geffen'),
			'id' => 'footer-mobile-1',
			'description' => esc_html__('First mobile area', 'geffen'),
			'before_widget' => '<div class="wsfooterwdget footer-mobile-menu">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__('Footer mobile Widget 2', 'geffen'),
			'id' => 'footer-mobile-2',
			'description' => esc_html__('Second mobile area', 'geffen'),
			'before_widget' => '<div class="wsfooterwdget footer-mobile-menu">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'geffen_widgets_init');



function custom_search_results_per_page($query)
{
	if ($query->is_search) {
		$query->set('posts_per_page', -1); // -1 для отображения всех результатов
	}
	return $query;
}
add_filter('pre_get_posts', 'custom_search_results_per_page');
/**
 * Enqueue scripts and styles.
 */
function geffen_scripts()
{
	// styles
	wp_enqueue_style('geffen-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('geffen-style', 'rtl', 'replace');

	// bootstrap
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION);

	// custom styles
	wp_enqueue_style('header', get_template_directory_uri() . '/assets/css/header.css', array(), _S_VERSION);
	wp_enqueue_style('footer', get_template_directory_uri() . '/assets/css/footer.css', array(), _S_VERSION);

	if (!is_front_page()) {
		wp_enqueue_style('custom', get_template_directory_uri() . '/assets/css/geffen-style.css', array(), _S_VERSION);
	}

	if ('freestyle_libre' == get_post_type()) {
		// custom styles
		wp_enqueue_style('freestyle', get_template_directory_uri() . '/assets/css/fl-style.css', array(), _S_VERSION);
	}

	// custom styles
	wp_enqueue_style('woo-custom', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), _S_VERSION);

	// custom styles
	wp_enqueue_style('responsive-css', get_template_directory_uri() . '/assets/css/responsive.css', array(), _S_VERSION);

	// slick styles
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/slick/slick.css', array(), _S_VERSION);
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css', array(), _S_VERSION);

    // videopopup
     wp_enqueue_style('videopopup', get_template_directory_uri() . '/assets/videotube/videotube.min.css', array(), _S_VERSION);

	// scripts
	wp_enqueue_script('jquery-cdn', 'https://code.jquery.com/jquery-3.7.1.min.js');
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-core');
	wp_enqueue_script('jquery-migrate');
	wp_enqueue_script('jquery-validate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), _S_VERSION, true);

	// slick scripts
	wp_enqueue_script('slick', get_template_directory_uri() . '/assets/slick/slick.min.js', array('jquery'), _S_VERSION, true);

   // videopopup scripts
	wp_enqueue_script('videopopup', get_template_directory_uri() . '/assets/videotube/videotube.min.js', array('jquery'), _S_VERSION, true);
	// main script
	wp_enqueue_script('geffen-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), _S_VERSION, true);

	// js-pdf functions to create pdf files
	if (is_singular('recipes')) {
		wp_enqueue_script('js-pdf', 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js', [], _S_VERSION, false);
	}

	// comments reply
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// wordpress localization
	wp_localize_script('geffen-script', 'geffen', [
		'ajax_url' => admin_url('admin-ajax.php'),
		'site_url' => get_home_url(),
		'theme_url' => get_template_directory_uri(),
		'security' => wp_create_nonce('ajax-nonce'),
		'update_shipping_method_nonce' => wp_create_nonce('update_shipping_method')
	]);

	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'geffen_scripts');

/**
 * Add attributes to SCRIPT link
 *
 * @param [type] $tag
 * @param [type] $handle
 * @param [type] $src
 * @return string
 */
function add_attribs_to_scripts($tag, $handle, $src)
{

	// The handles of the enqueued scripts we want to defer
	$async_scripts = array(
		'jquery-migrate',
		'sharethis',
	);

	$defer_scripts = array(
		'contact-form-7',
		'jquery-form',
		'wpdm-bootstrap',
		'frontjs',
		'jquery-choosen',
		'fancybox',
		'jquery-colorbox',
		'search'
	);

	$jquery = array(
		'jquery'
	);

	if (in_array($handle, $defer_scripts)) {
		return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
	}
	if (in_array($handle, $async_scripts)) {
		return '<script src="' . $src . '" async="async" type="text/javascript"></script>' . "\n";
	}
	if (in_array($handle, $jquery)) {
		return '<script src="' . $src . '" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous" type="text/javascript"></script>' . "\n";
	}

	return $tag;
}
add_filter('script_loader_tag', 'add_attribs_to_scripts', 10, 3);

function custom_redirect_non_admin_users_registration()
{
	// Check if the user is not an administrator and not logged in
	if (!current_user_can('administrator') && !is_user_logged_in()) {
		// Check if the current page is the registration, password change, or my-account/lost-password page
		if ((isset ($_GET['action']) && in_array($_GET['action'], array('register', 'lostpassword'))) || (isset ($GLOBALS['pagenow']) && 'my-account' === $GLOBALS['pagenow'] && strpos($_SERVER['REQUEST_URI'], 'lost-password') !== false)) {
			// Redirect non-administrator, non-logged-in users to the homepage
			wp_redirect(home_url());
			exit;
		}
	}
}
add_action('init', 'custom_redirect_non_admin_users_registration');

function custom_redirect_non_admin_users_lostpassword()
{
	// Check if the user is not an administrator and not logged in
	if (!current_user_can('administrator') && !is_user_logged_in()) {
		// Check if the current page is the registration, password change, or my-account/lost-password page
		if ((isset ($_GET['action']) && in_array($_GET['action'], array('register', 'lostpassword'))) || (is_account_page() && is_wc_endpoint_url('lost-password'))) {
			// Redirect non-administrator, non-logged-in users to the homepage
			wp_redirect(home_url());
			exit;
		}
	}
}
add_action('template_redirect', 'custom_redirect_non_admin_users_lostpassword');

/**
 * Actions.
 */
require get_template_directory() . '/inc/actions.php';

/**
 * Ajax.
 */
require get_template_directory() . '/inc/ajax.php';

/**
 * ACF functionality.
 */
require get_template_directory() . '/inc/acf.php';

/**
 * Custom functionality.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Simple Likes.
 */
require get_template_directory() . '/inc/likes.php';

/**
 * Customizer.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * CPT.
 */
require get_template_directory() . '/inc/cpt.php';

/**
 * Load custom page templates for custom post types
 */
add_filter('single_template', function($template) {
	global $post;
	
	// Check if this is a custom post type that supports page templates
	if ($post && get_post_type($post) === 'omnipod5') {
		// Get the page template assigned to this post
		$page_template = get_post_meta($post->ID, '_wp_page_template', true);
		
		// If a custom template is assigned, use it
		if ($page_template && $page_template != 'default') {
			$template_path = locate_template($page_template);
			if ($template_path) {
				return $template_path;
			}
		}
	}
	
	return $template;
});

/**
 * Woocommerce.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Woocommerce Single Product.
 */
require get_template_directory() . '/inc/woo-single-product.php';

/**
 * Registration.
 */
require get_template_directory() . '/inc/registration.php';

/**
 * Blocked Users.
 */
require get_template_directory() . '/inc/blocked-users.php';

/**
 * Email DB.
 */
require get_template_directory() . '/inc/email-db.php';

/**
 * Email Check.
 */
require get_template_directory() . '/inc/email-check.php';

/**
 * Events.
 */
require get_template_directory() . '/inc/events.php';

/**
 * One Page Checkout.
 */
require get_template_directory() . '/inc/one-page-checkout.php';

/**
 * Site Rating.
 */
require get_template_directory() . '/inc/rating.php';

/**
 * Webinar.
 */
require get_template_directory() . '/inc/webinar.php';

/**
 * User Roles.
 */
require get_template_directory() . '/inc/user-roles.php';

/**
 * CRM.
 */
require get_template_directory() . '/inc/crm.php';

/**
 * Wallet.
 */
require get_template_directory() . '/inc/wallet/wallet.php';

/**
 * ERP Cron.
 */
require get_template_directory() . '/inc/erp-cron.php';

/**
 * Check phone.
 */
require get_template_directory() . '/inc/check-phone.php';
