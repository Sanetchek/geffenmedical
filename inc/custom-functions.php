<?php

/**
 * Break content on N words
 *
 * @param [type] $text
 * @param integer $counttext
 * @param string $sep
 * @return string
 */
function str_word($text, $counttext = 30, $end = '', $sep = ' ') {
	$text = wp_strip_all_tags( $text );
	$words = explode($sep, $text);

	if ( count($words) > $counttext ) {
		$text = join($sep, array_slice($words, 0, $counttext));
		$text .= $end;
	}

	return $text;
}

/**
 * Counting the number of page visits
 */
add_action('wp_head', function ($args = []) {
	global $user_ID, $post, $wpdb;
	$cont_id = '';

	$rg = (object) wp_parse_args($args, [
		// The post meta field key, where the number of views will be recorded.
		'meta_key' => 'views',
		// Whose visits count? 0 - All. 1 - Guests only. 2 - Only registered users.
		'who_count' => 0,
		// Exclude bots, robots? 0 - no, let them also count. 1 - yes, exclude from the count.
		'exclude_bots' => true,
	]);

	$do_count = false;
	switch ($rg->who_count) {
		case 0:
			$do_count = true;
			break;
		case 1:
			if (!$user_ID) {
				$do_count = true;
			}
			break;
		case 2:
			if ($user_ID) {
				$do_count = true;
			}
			break;
	}

	if ($do_count && $rg->exclude_bots) {
		$notbot = 'Mozilla|Opera'; // Chrome|Safari|Firefox|Netscape - all equal Mozilla
		$bot = 'Bot/|robot|Slurp/|yahoo';
		if (!preg_match("/$notbot/i", $_SERVER['HTTP_USER_AGENT']) ||
			preg_match("~$bot~i", $_SERVER['HTTP_USER_AGENT'])) {
			$do_count = false;
		}
	}

	if ($do_count) {
		// for single page
		if (is_singular()) {
			$up = $wpdb->query(
				$wpdb->prepare(
					"UPDATE $wpdb->postmeta SET meta_value = (meta_value+1) WHERE post_id = %d AND meta_key = %s",
					$post->ID,
					$rg->meta_key
				)
			);

			if (!$up) {
				add_post_meta($post->ID, $rg->meta_key, 1, true);
			}

			wp_cache_delete($post->ID, 'post_meta');
		}

		// for user/author page
		if (is_author()) {
			$user = get_user_by('slug', get_query_var('author_name'));
			$up = $wpdb->query(
				$wpdb->prepare(
					"UPDATE $wpdb->usermeta SET meta_value = (meta_value+1) WHERE user_id = %d AND meta_key = %s",
					$user->ID,
					$rg->meta_key
				)
			);

			if (!$up) {
				add_user_meta($user->ID, $rg->meta_key, 1, true);
			}

			wp_cache_delete($user->ID, 'user_meta');
		}
	}
});

/**
 * Show Count Page View on Front
 *
 * @param string $cont_id
 * @param boolean $user
 * @return void
 */
function view($cont_id = '', $user = false) {
	global $post;

	if (!$cont_id) {
		$cont_id = $post->ID;
	}

	$view = get_post_meta($cont_id, 'views', true);

	if ($user) {
		$view = get_user_meta($cont_id, 'views', true);
	}

	if ($view) {
		if ($view > 999999) {
			$view /= 1000000;
			$view = round($view, 1);
			return $view . 'KK';
		} elseif ($view > 999) {
			$view /= 1000;
			$view = round($view, 1);
			return $view . 'K';
		} else {
			return $view;
		}
	} else {
		return '0';
	}
}

/**
 * Login redirect if not administrator
 */
add_action('admin_init', function () {
	if (is_admin() && !(current_user_can('administrator')) && (!defined('DOING_AJAX') || !DOING_AJAX)) {
		wp_redirect(home_url(404), 302);
		exit();
	}
});

/**
 * Contact form 7 remove span
 */
add_filter('wpcf7_form_elements', function($content) {
	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

	$content = str_replace('<br />', '', $content);

	return $content;
});

/**
* Get Current Url
*/
function currUrl() {
	 global $wp;
	 return home_url($wp->request);
}

/**
 * get assets
 */
function assets($source = '') {
	return get_template_directory_uri() . '/assets/' . $source;
}

/**
 * get image
 */
function get_image($img = '', $thumb = 'large', $attr = []) {
	return wp_get_attachment_image($img, $thumb, '', $attr);
}

/**
 * show image
 */
function show_image($img = '', $thumb = 'large', $attr = []) {
	if ($img) {
		echo wp_get_attachment_image($img, $thumb, '', $attr);
	}
}

/**
 * redirect non logged in user
 */
function redirect_non_logged_in_user() {
	if (!is_user_logged_in()) {
		global $wp_query;
		$wp_query->set_404();
		status_header(404);
		get_template_part(404); // Ensure your theme has a 404.php file
		exit();
	}
}

/**
 * Does user email exist
 */
function does_user_email_exist($user_id) {
	// Retrieve user data by ID
	$user = get_userdata($user_id);

	// Check if user data exists and has an email
	if ($user && !empty($user->user_email)) {
		return true;
	} else {
		return false;
	}
}

/**
 * Social Share
 *
 * @param [string] $url
 * @param [string] $title
 * @return string
 */
function socialShare($url, $title) {
	return '<div class="social_share">
		<div class="article-social">
			<a class="social_share_link social_share_whatsapp"
				href="https://api.whatsapp.com/send?text='.$title.'%0A'.$url.'"
				title="Whatsapp" rel="nofollow noopener" target="_blank">
				<span
					class="social_share_svg"><img src="'.
					get_template_directory_uri() . '/assets/img/icons/s-whatsapp.svg'
				.'" /></span>
			</a>
			<a class="social_share_link social_share_facebook"
				href="https://www.facebook.com/sharer/sharer.php?u='.$url.'"
				title="Facebook" rel="nofollow noopener" target="_blank">
				<span class="social_share_svg"><img src="'.
					get_template_directory_uri() . '/assets/img/icons/s-facebook.svg'
				.'" /></span>
			</a>
			<a class="social_share_link social_share_gmail"
					href="mailto:?subject='.$title.'&body='.$title.'%0A'.$url.'"
				title="Mail" rel="nofollow noopener" target="_blank">
				<span class="social_share_svg"><img src="'.
					get_template_directory_uri() . '/assets/img/icons/s-mail.svg'
				.'" /></span>
			</a>
		</div>
	</div>';
}

/**
 * Show YouTube Video
 */
function showYoutubeVideo( $link ) {
	$video = $link;
	$video = substr($video, strpos($video, "=") + 1);
	if($link) :	?>
		<iframe width="635" height="405" src="https://www.youtube.com/embed/<?= $video ?>" title="YouTube video player" frameborder="0" allow="autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<?php else: ?>
		<img src="https://img.youtube.com/vi/<?php $video ?>/default.jpg" class="br-40" alt="youtube">
	<?php endif;
}

/**
 * Summary of get_all_product_categories
 * @return array
 */
function get_all_product_categories() {
	$taxonomy = 'product_cat';
	$show_count = 0;      // 1 for yes, 0 for no
	$pad_counts = 0;      // 1 for yes, 0 for no
	$hierarchical = 1;      // 1 for yes, 0 for no
	$title = '';
	$empty = 0;

	$args = array(
		'taxonomy' => $taxonomy,
		'show_count' => $show_count,
		'pad_counts' => $pad_counts,
		'hierarchical' => $hierarchical,
		'title_li' => $title,
		'hide_empty' => $empty,
		'exclude' => '170'
	);
	return get_categories($args);
}

// Round all prices in cart - Roman 21.10.24
// add_filter('woocommerce_cart_item_subtotal', 'mytheme_custom_round_cart_item_subtotal', 20, 3);

// function mytheme_custom_round_cart_item_subtotal($subtotal, $cart_item, $cart_item_key) {
// 	// Get the product ID
// 	$product_id = $cart_item['product_id'];
// 	$round_array = round_product_array();

// 	// Check if the product ID is 866 or 867
// 	if (in_array($product_id, $round_array)) {
// 		// Round subtotal to the nearest integer for products with ID 866 or 867
// 		$rounded_subtotal = round($cart_item['line_total'], 0); // Change to 2 for two decimal places
// 	} else {
// 		// Use the regular subtotal for other products
// 		$rounded_subtotal = $cart_item['line_total'];
// 	}

// 	return wc_price($rounded_subtotal);
// }

// // עיגול מחירי כל המוצרים בעגלה (מחיר כפול כמות) לחישובים בפועל
// add_action('woocommerce_before_calculate_totals', 'mytheme_custom_round_cart_item_prices', 20, 1);

// function mytheme_custom_round_cart_item_prices($cart) {
// 	if (is_admin() && !defined('DOING_AJAX')) {
// 		return;
// 	}

// 	foreach ($cart->get_cart() as $cart_item) {
// 		// Get the product ID
// 		$product_id = $cart_item['product_id'];

// 		// Check if the product ID is 866 or 867
// 		if (in_array($product_id, $round_array)) {
// 			// Round the price to the nearest integer for products with ID 866 or 867
// 			$price = $cart_item['data']->get_price();
// 			$cart_item['data']->set_price(round($price, 0)); // Change to 2 for two decimal places
// 		}
// 	}
// }

// // עיגול הסאב-טוטאל בעגלה (סכום המוצרים בלבד)
// add_filter('woocommerce_cart_subtotal', 'mytheme_custom_round_cart_subtotal', 20, 3);

// function mytheme_custom_round_cart_subtotal($cart_subtotal, $compound, $cart) {
// 	$round_array = round_product_array();
// 	// Check if any cart item has product ID 866 or 867
// 	foreach ($cart->get_cart() as $cart_item) {
// 		if (in_array($cart_item['product_id'], $round_array)) {
// 			$price = $cart_item['data']->get_price();
// 			$cart_item['data']->set_price(round($price, 0)); // Change to 2 for two decimal places
// 		}
// 	}

// 	// Return the regular subtotal if no matching products are found
// 	return $cart_subtotal;
// }


// // עיגול הסכום הכולל (Total) שנשלח לשערי התשלום
// add_filter('woocommerce_calculated_total', 'mytheme_custom_round_cart_total', 20, 1);

// function mytheme_custom_round_cart_total($total) {
// 	// Access the WooCommerce cart
// 	$cart = WC()->cart;
// 	$round_array = round_product_array();

// 	// Check if any cart item has product ID 866 or 867
// 	foreach ($cart->get_cart() as $cart_item) {
// 		if (in_array($cart_item['product_id'], $round_array)) {
// 			$price = $cart_item['data']->get_price();
// 			$cart_item['data']->set_price(round($price, 0)); // Change to 2 for two decimal places
// 		}
// 	}

// 	// Return the regular total if no matching products are found
// 	return $total;
// }


// //Send rounded prices to Tranzila
// add_filter('woocommerce_order_get_total', 'mytheme_custom_round_order_total_for_payment', 10, 2);
// function mytheme_custom_round_order_total_for_payment($total, $order) {
// 	$round_array = round_product_array();

// 	// Check if any item in the order has product ID 866 or 867
// 	foreach ($order->get_items() as $item) {
// 		if (in_array($item->get_product_id(), $round_array)) {
// 			$price = $cart_item['data']->get_price();
// 			$cart_item['data']->set_price(round($price, 0)); // Change to 2 for two decimal places
// 		}
// 	}

// 	// Return the regular total if no matching products are found
// 	return $total;
// }

// function round_product_array() {
// 	return [866, 9679, 3566, 4134];
// }
