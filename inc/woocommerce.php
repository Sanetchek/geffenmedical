<?php
/**
 * All Woocommerce hooks
 */

// Woocommerce support
if (
  in_array(
    'woocommerce/woocommerce.php',
    apply_filters('active_plugins', get_option('active_plugins'))
  )
) {
  function dmc_add_woocommerce_support()
  {
    // Add Woocommerce Support to site
    add_theme_support('woocommerce');
    // add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
  }

  add_action('after_setup_theme', 'dmc_add_woocommerce_support');
}

/**
 * Remove Actions
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);

/**
 * Archive Before main Content
 *
 * @return void
 */
function custom_content_before_main_content()
{
  $all_product = __('כל המוצרים ', 'geffen');
  $cat_id = 0;
  $template = '<div class="allproduct-page">';
  $template .= '<div class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">';
  $template .= '<span class="breadcrumbs__parent" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">';
  $template .= '<a href="/" itemprop="item" class="home">';
  $template .= '<span itemprop="name">' . __('עמוד הבית ', 'geffen') . '</span>';
  $template .= '</a>';
  $template .= '</span>';
  $template .= '<span class="sep"> > </span>';

  if (is_shop()) {
    $name = $all_product;
    $template .= '<span class="breadcrumbs__current">' . $all_product . '</span>';
    $template .= '</div>';
  } elseif (is_product_category()) {
    $product_cat = get_queried_object(); // Get the current product category object
    $cat_id = $product_cat->term_id;
    $name = $product_cat->name; // Get the category name

    $template .= '<span class="breadcrumbs__parent" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">';
    $template .= '<a href="/all-product" itemprop="item" class="home">';
    $template .= '<span itemprop="name">' . $all_product . '</span>';
    $template .= '</a>';
    $template .= '</span>';
    $template .= '<span class="sep"> > </span>';

    $template .= '<span class="breadcrumbs__current">' . $name . '</span>';
    $template .= '</div>';
  } elseif (is_product()) {
    $category = get_the_terms(get_the_ID(), 'product_cat');

    $template .= '<span class="breadcrumbs__parent" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">';
    $template .= '<a href="/all-product" itemprop="item" class="home">';
    $template .= '<span itemprop="name">' . $all_product . '</span>';
    $template .= '</a>';
    $template .= '</span>';
    $template .= '<span class="sep"> > </span>';

    $template .= '<span class="breadcrumbs__parent" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">';
    $template .= '<a href="' . get_category_link($category[0]->term_id) . '" itemprop="item" class="home">';
    $template .= '<span itemprop="name">' . $category[0]->name . '</span>';
    $template .= '</a>';
    $template .= '</span>';
    $template .= '<span class="sep"> > </span>';
    $template .= '<span class="breadcrumbs__current">' . get_the_title(get_the_ID()) . '</span>';
  } else {
    $template .= '<span class="breadcrumbs__current">' . get_the_title() . '</span>';
    $template .= '</div>';
  }

  if (is_product_category() || is_shop()) {
    $template .= '<div class="conteiner-968">';

    $template .= '<div class="row">';
    $template .= '<div class="col-md-12 main-page-menu-title">';
    $template .= '<h1 class="text-al-start">' . $name . '</h1>';
    $template .= '</div>';
    $template .= '</div>';

    $template .= '<div class="row main-page-menu-row">';
    $template .= '<div class="col-md-12">';
    $template .= '<div class="main-page-menu">';
    $template .= '<div class="multiple-items">';

    $all_categories = get_all_product_categories();

     $template .= ' <div class="main-page-menu-content">';
     $template .= ' <a href="/freestyle-libre/sensors/#product-info-fl-sensor">';
     $template .= '<div class="main-page-menu-item">';
     $template .= ' <img class="fl-icon-all-menu"
          src="/wp-content/uploads/2023/12/5bb3236ffebc036896b190bd76f0de3d.png"
          alt="category">';
          $template .= ' </div>';
          $template .= '  <span class="caption">פריסטייל ליברה';
          $template .= '</span>';
          $template .= ' </a>';
          $template .= ' </div>';
          $template .= '  <div class="main-page-menu-content">';
          $template .= '  <a href="/omnipod/omnipod-main/">';
          $template .= ' <div class="main-page-menu-item">';
          $template .= ' <img src="/wp-content/uploads/2023/07/icon-omnipod.png" alt="category">';
          $template .= ' </div>';
          $template .= '  <span class="caption">Omnipod';
          $template .= '</span>';
          $template .= '</a>';
          $template .= ' </div>';

    if ($all_categories):
      foreach ($all_categories as $cat):
        $term_name = $cat->name;
        $term_id = $cat->term_id;
        $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
        $image = get_image($thumbnail_id, [36, 36], ['class' => 'category-icon']);
        $current = '';

        if ($cat_id == $term_id) {
          $current = ' current';
        }

        $template .= '<div class="main-page-menu-content">';
        $template .= '<a href="' . get_term_link($term_id, 'product_cat') . '">';
        $template .= '<div class="main-page-menu-item' . $current . '">';
        $template .= $image;
        $template .= '</div>';
        $template .= '<span class="caption">' . $term_name . '</span>';
        $template .= '</a>';
        $template .= '</div>';
      endforeach;
    endif;

    $template .= '</div>';
    $template .= '</div>';
    $template .= '</div>';
    $template .= '</div>';

    $template .= '</div>';
  }

  echo $template;
}
add_action('woocommerce_before_main_content', 'custom_content_before_main_content');

function custom_product_loop_wrap_start()
{
  echo '<div class="conteiner-968"><div class="row"><div class="col-md-12"><div class="allproduct-page-promotions">';
}

function custom_product_loop_wrap_end()
{
  echo '</div></div></div></div>';
}

add_action('woocommerce_before_shop_loop', 'custom_product_loop_wrap_start', 5);
add_action('woocommerce_after_shop_loop', 'custom_product_loop_wrap_end', 5);

/**
 * On Sale on Single Product
 *
 * @param [type] $html
 * @param [type] $post
 * @param [type] $product
 * @return void
 */
function custom_woocommerce_sale_flash($html, $post, $product)
{
  if ($product->is_on_sale()) {
    $html = '<span class="single-onsale">' . esc_html__('מחיר מועדון ', 'geffen') . '</span>';
  }
  return $html;
}

add_filter('woocommerce_sale_flash', 'custom_woocommerce_sale_flash', 10, 3);

/**
 * Plus Before Quantity
 *
 * @return void
 */
function custom_add_plus_button_before_quantity()
{
  echo '<div class="change-quantity">';
  echo '<button type="button" class="quantity__plus">+</button>';
}
add_action('woocommerce_before_add_to_cart_quantity', 'custom_add_plus_button_before_quantity');

/**
 * Minus After Quantity
 *
 * @return void
 */
function custom_add_minus_button_after_quantity() {
  echo '<button type="button" class="quantity__minus">-</button>';
  echo '</div>';
}
add_action('woocommerce_after_add_to_cart_quantity', 'custom_add_minus_button_after_quantity');

/**
 * Add Club Price field to product
 */
function add_club_price_field()
{
  woocommerce_wp_text_input(
    array(
      'id' => 'club_price',
      'label' => __('Club Price', 'woocommerce') . ' (' . get_woocommerce_currency_symbol() . ')',
      'placeholder' => '',
      'description' => __('Enter the Club Price for this product.', 'woocommerce'),
      'desc_tip' => 'true',
    )
  );
}
add_action('woocommerce_product_options_pricing', 'add_club_price_field');

/**
 * Save Club Price field data
 *
 * @param int $product_id
 */
function save_club_price_field($product_id)
{
  if (isset($_POST['club_price'])) {
    $club_price = $_POST['club_price'];
    update_post_meta($product_id, 'club_price', sanitize_text_field($club_price));
  }
}
add_action('woocommerce_process_product_meta', 'save_club_price_field');

/**
 * Replace regular price with Club Price when adding to cart
 *
 * @param [type] $cart
 * @return void
 */
function replace_regular_price_with_club_price($cart)
{
  if (is_admin() && !defined('DOING_AJAX'))
    return;

  // Loop through cart items
  foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
    $product = $cart_item['data'];
    $club_price = get_post_meta($product->get_id(), 'club_price', true);

    if (!empty($club_price) && is_user_logged_in()) {
      // Get the current user ID
      $current_user_id = get_current_user_id();

      // Get the meta field value
      $is_subscribe = get_user_meta($current_user_id, 'geffen_subscription', true) ? 1 : 0;

      if ($is_subscribe) {
        // Set the Club Price as the product price
        $cart_item['data']->set_price($club_price);
      }

    }
  }
}
add_action('woocommerce_before_calculate_totals', 'replace_regular_price_with_club_price');

/**
 * Hide Grouped product and External product in Single Product
 *
 * @param [type] $types
 * @return void
 */
function remove_grouped_and_external_product_types($types)
{
  // Remove the "Grouped" and "External" product types from the array
  unset($types['grouped']);
  unset($types['external']);

  return $types;
}
add_filter('product_type_selector', 'remove_grouped_and_external_product_types');

/**
 * Add Variation fields
 *
 * @param [type] $loop
 * @param [type] $variation_data
 * @param [type] $variation
 * @return string
 */
function add_variation_max_quantity_field($loop, $variation_data, $variation)
{
  $selected_tab = get_post_meta($variation->ID, '_selected_tab', true);
  $max_quantity = get_post_meta($variation->ID, '_max_quantity', true);

  echo '<div class="options_group">';

  woocommerce_wp_radio(
    array(
      'id' => 'selected_tab[' . $loop . ']',
      'class' => 'select short tab-radio',
      'label' => __('Tab', 'geffen'),
      'options' => array(
        'singular' => __('Singular tab', 'geffen'),
        'case' => __('Package tab', 'geffen'),
      ),
      'value' => $selected_tab ? $selected_tab : 'singular', // Default value
    )
  );

  // Custom text field for Max Quantity (only shown when Case Tab is checked)
  $hidden = $max_quantity ? '' : ' style="display:none;"';
  echo '<p class="form-field form-row form-row-first max-quantity-field"' . $hidden . '>
    <label for="max_quantity[' . $loop . ']">' . __('Max Quantity', 'geffen') . '</label>
    <input type="number" class="short max-quantity-input" name="max_quantity[' . $loop . ']" id="max_quantity[' . $loop . ']" value="' . esc_attr($max_quantity) . '" required>
  </p>';


  $club_price = get_post_meta($variation->ID, '_club_price_variation', true);

  // Custom text field for Club Price
  echo '<p class="form-field club-price-field form-row form-row-last">
    <label for="club_price_variation[' . $loop . ']">' . __('Club Price', 'geffen') . ' (' . get_woocommerce_currency_symbol() . ')</label>
    <input type="text" style="width: 100%" name="club_price_variation[' . $loop . ']" id="club_price_variation[' . $loop . ']" value="' . esc_attr($club_price) . '">
  </p>';

  echo '</div>';
}
add_action('woocommerce_variation_options', 'add_variation_max_quantity_field', 10, 3);

/**
 * Add Script file to Woocommerce single product editor
 *
 * @return void
 */
function enqueue_custom_js()
{
  // Check if you are on the single product editor page
  if (is_admin() && isset($_GET['post']) && get_post_type($_GET['post']) === 'product') {
    // Enqueue your custom JavaScript file
    wp_enqueue_script('custom-product-editor-js', get_template_directory_uri() . '/assets/js/product-editor.js', array('jquery'), null, true);
  }
}
add_action('admin_enqueue_scripts', 'enqueue_custom_js');

/**
 * Save the custom text field values when variations are saved
 *
 * @param [type] $variation_id
 * @param [type] $i
 * @return void
 */
function save_variation_max_quantity_field($variation_id, $i)
{
  $selected_tab = isset($_POST['selected_tab'][$i]) ? wc_clean($_POST['selected_tab'][$i]) : 'singular';
  $club_price = isset($_POST['club_price_variation'][$i]) ? wc_clean($_POST['club_price_variation'][$i]) : '';
  $max_quantity = isset($_POST['max_quantity'][$i]) ? wc_clean($_POST['max_quantity'][$i]) : '';

  update_post_meta($variation_id, '_selected_tab', $selected_tab);
  update_post_meta($variation_id, '_club_price_variation', $club_price);
  update_post_meta($variation_id, '_max_quantity', $max_quantity);
}
add_action('woocommerce_save_product_variation', 'save_variation_max_quantity_field', 10, 2);

/**
 * Change Cart Item Price
 *
 * @param [type] $cart_object
 * @return void
 */
function change_cart_item_price($cart_object)
{
  if (is_user_logged_in()) {
    // Get the current user ID
    $current_user_id = get_current_user_id();

    // Get the meta field value
    $is_subscribe = get_user_meta($current_user_id, 'geffen_subscription', true) ? 1 : 0;

    if ($is_subscribe) {
      foreach ($cart_object->cart_contents as $key => $value) {
        $variation_id = $value['variation_id'];

        // Get the "Club Price Variation" for the product variation
        $club_price_variation = get_post_meta($variation_id, '_club_price_variation', true);

        // Set the item price to the "Club Price Variation"
        if ($club_price_variation) {
          $cart_object->cart_contents[$key]['data']->set_price($club_price_variation);
        }
      }
    }
  }
}

add_action('woocommerce_before_calculate_totals', 'change_cart_item_price');

function custom_shipping_method_label($label, $method)
{
  // Check if the shipping cost is zero
  if ($method->cost == 0) {
    // Modify the label to display 'חינם' (free)
    $label .= __(' חינם', 'geffen');
  }

  return $label;
}
add_filter('woocommerce_cart_totals_shipping_method_label', 'custom_shipping_method_label', 10, 2);

// Save custom field data
function save_custom_checkout_field($order_id)
{
  $user_id = get_current_user_id();

  if (!empty($_POST['done_area'])) {
    $custom_field_value = sanitize_text_field($_POST['done_area']);
    update_post_meta($order_id, 'country_area', $custom_field_value);

    // Clear user profile DONE field
    update_field('country_area', '', 'user_' . $user_id);
  }
  if (!empty($_POST['done_city'])) {
    $custom_field_value = sanitize_text_field($_POST['done_city']);
    update_post_meta($order_id, 'city', $custom_field_value);

    // Clear user profile DONE field
    update_field('city', '', 'user_' . $user_id);
  }
  if (!empty($_POST['done_address'])) {
    $custom_field_value = sanitize_text_field($_POST['done_address']);
    update_post_meta($order_id, 'address', $custom_field_value);

    // Clear user profile DONE field
    update_field('address', '', 'user_' . $user_id);
  }
  if (!empty($_POST['done_station_number'])) {
    $custom_field_value = sanitize_text_field($_POST['done_station_number']);
    update_post_meta($order_id, 'station_number', $custom_field_value);

    // Clear user profile DONE field
    update_field('station_number', '', 'user_' . $user_id);
  }
}

add_action('woocommerce_checkout_update_order_meta', 'save_custom_checkout_field');

// Remove required fields from Billing info
function make_shipping_optional($fields)
{
  $fields['billing']['billing_first_name']['required'] = false;
  $fields['billing']['billing_last_name']['required'] = false;
  $fields['billing']['billing_address_1']['required'] = false;
  $fields['billing']['billing_city']['required'] = false;
  $fields['billing']['billing_postcode']['required'] = false;
  $fields['billing']['billing_country']['required'] = false;
  $fields['billing']['billing_state']['required'] = false;

  $fields['shipping']['shipping_first_name']['required'] = false;
  $fields['shipping']['shipping_last_name']['required'] = false;
  $fields['shipping']['shipping_address_1']['required'] = false;
  $fields['shipping']['shipping_city']['required'] = false;
  $fields['shipping']['shipping_postcode']['required'] = false;
  $fields['shipping']['shipping_country']['required'] = false;
  $fields['shipping']['shipping_state']['required'] = false;
  $fields['shipping']['shipping_email']['required'] = false;

  return $fields;
}
add_filter('woocommerce_checkout_fields', 'make_shipping_optional');

// Display the checkbox field in user profile
add_action('show_user_profile', 'add_shipping_checkbox_field');
add_action('edit_user_profile', 'add_shipping_checkbox_field');

function add_shipping_checkbox_field($user)
{
  $shipping_checkbox = get_user_meta($user->ID, 'shipping_checkbox', true);
  ?>
  <h3><?php _e('Shipping Checkbox', 'text-domain'); ?></h3>
  <table class="form-table">
    <tr>
      <th><label for="shipping_checkbox"><?php _e('Use shipping address', 'geffen'); ?></label></th>
      <td>
        <input type="checkbox" name="shipping_checkbox" id="shipping_checkbox"
          <?php echo ($shipping_checkbox == 'yes') ? 'checked' : ''; ?>>
        <span class="description"><?php _e('Enable', 'geffen'); ?></span>
      </td>
    </tr>
  </table>
  <?php
}

// Save the checkbox field data
add_action('personal_options_update', 'save_shipping_checkbox_field');
add_action('edit_user_profile_update', 'save_shipping_checkbox_field');

function save_shipping_checkbox_field($user_id)
{
  if (isset($_POST['shipping_checkbox'])) {
    update_user_meta($user_id, 'shipping_checkbox', 'yes');
  } else {
    update_user_meta($user_id, 'shipping_checkbox', 'no');
  }
}

// Add new fields to the billing form
add_filter('woocommerce_checkout_fields', 'add_custom_billing_fields');

function add_custom_billing_fields($fields)
{
  $fields['billing']['billing_address_type'] = array(
    'label' => __('Address Type', 'geffen'),
    'required' => false,
    'type' => 'text',
    'class' => array('form-row-wide'),
  );

  $fields['billing']['billing_house_number'] = array(
    'label' => __('House Number', 'geffen'),
    'required' => false,
    'type' => 'text',
    'class' => array('form-row-wide'),
  );

  $fields['billing']['billing_apartment_number'] = array(
    'label' => __('Apartment Number', 'geffen'),
    'required' => false,
    'type' => 'text',
    'class' => array('form-row-wide'),
  );

  $fields['shipping']['shipping_email'] = array(
    'label' => __('Email', 'geffen'),
    'required' => true,
    'type' => 'text',
    'class' => array('form-row-wide'),
  );

  $fields['shipping']['shipping_address_type'] = array(
    'label' => __('Address Type', 'geffen'),
    'required' => false,
    'type' => 'text',
    'class' => array('form-row-wide'),
  );

  $fields['shipping']['shipping_house_number'] = array(
    'label' => __('House Number', 'geffen'),
    'required' => false,
    'type' => 'text',
    'class' => array('form-row-wide'),
  );

  $fields['shipping']['shipping_apartment_number'] = array(
    'label' => __('Apartment Number', 'geffen'),
    'required' => false,
    'type' => 'text',
    'class' => array('form-row-wide'),
  );

  return $fields;
}

// Save the custom billing fields to user meta
add_action('woocommerce_checkout_update_user_meta', 'save_custom_billing_fields');

function save_custom_billing_fields($user_id)
{
  if (isset($_POST['billing_address_type'])) {
    update_user_meta($user_id, 'billing_address_type', sanitize_text_field($_POST['billing_address_type']));
  }
  if (isset($_POST['billing_house_number'])) {
    update_user_meta($user_id, 'billing_house_number', sanitize_text_field($_POST['billing_house_number']));
  }
  if (isset($_POST['billing_apartment_number'])) {
    update_user_meta($user_id, 'billing_apartment_number', sanitize_text_field($_POST['billing_apartment_number']));
  }
}

// Add custom billing fields to the customer billing address section in user profile
function add_custom_billing_fields_to_user_profile($fields)
{
  $fields['billing']['fields']['billing_address_type'] = array(
    'label' => __('Address Type', 'geffen'),
    'description' => '',
  );

  $fields['billing']['fields']['billing_house_number'] = array(
    'label' => __('House Number', 'geffen'),
    'description' => '',
  );

  $fields['billing']['fields']['billing_apartment_number'] = array(
    'label' => __('Apartment Number', 'geffen'),
    'description' => '',
  );

  return $fields;
}
add_filter('woocommerce_customer_meta_fields', 'add_custom_billing_fields_to_user_profile');

// Add custom shipping fields to the customer shipping address section in user profile
function add_custom_shipping_fields_to_user_profile($fields)
{
  $fields['shipping']['fields']['shipping_email'] = array(
    'label' => __('Email', 'geffen'),
    'description' => '',
  );

  $fields['shipping']['fields']['shipping_address_type'] = array(
    'label' => __('Address Type', 'geffen'),
    'description' => '',
  );

  $fields['shipping']['fields']['shipping_house_number'] = array(
    'label' => __('House Number', 'geffen'),
    'description' => '',
  );

  $fields['shipping']['fields']['shipping_apartment_number'] = array(
    'label' => __('Apartment Number', 'geffen'),
    'description' => '',
  );

  return $fields;
}
add_filter('woocommerce_customer_meta_fields', 'add_custom_shipping_fields_to_user_profile');

// Display custom billing fields in order edit billing section
function show_custom_billing_fields_order_edit($order)
{
  $billing_address_type = $order->get_meta('_billing_address_type');
  $billing_house_number = $order->get_meta('_billing_house_number');
  $billing_apartment_number = $order->get_meta('_billing_apartment_number');

  echo '<p><strong>' . __('Billing Address Type', 'geffen') . ':</strong> ' . esc_html($billing_address_type) . '</p>';
  echo '<p><strong>' . __('Billing House Number', 'geffen') . ':</strong> ' . esc_html($billing_house_number) . '</p>';
  echo '<p><strong>' . __('Billing Apartment Number', 'geffen') . ':</strong> ' . esc_html($billing_apartment_number) . '</p>';
}
add_action('woocommerce_admin_order_data_after_billing_address', 'show_custom_billing_fields_order_edit', 10, 1);

// Display custom shipping fields in order edit shipping section
function show_custom_shipping_fields_order_edit($order)
{
  $shipping_email = $order->get_meta('_shipping_email');
  $shipping_address_type = $order->get_meta('_shipping_address_type');
  $shipping_house_number = $order->get_meta('_shipping_house_number');
  $shipping_apartment_number = $order->get_meta('_shipping_apartment_number');

  echo '<p><strong>' . __('Shipping email') . ':</strong> ' . esc_html($shipping_email) . '</p>';
  echo '<p><strong>' . __('Shipping Address Type') . ':</strong> ' . esc_html($shipping_address_type) . '</p>';
  echo '<p><strong>' . __('Shipping House Number') . ':</strong> ' . esc_html($shipping_house_number) . '</p>';
  echo '<p><strong>' . __('Shipping Apartment Number') . ':</strong> ' . esc_html($shipping_apartment_number) . '</p>';
}
add_action('woocommerce_admin_order_data_after_shipping_address', 'show_custom_shipping_fields_order_edit', 10, 1);

// Get all billing fields from user profile
function geffen_get_billing_fields()
{
  $user_id = get_current_user_id();

  // Get all billing fields for the current user
  $billing_fields = get_user_meta($user_id);

  $billing_info = array();
  foreach ($billing_fields as $key => $value) {
    if ((strpos($key, 'billing_') === 0) || $key === 'first_name' ) {
      $billing_info[$key] = $value[0];
    }
  }

  return $billing_info;
}

// Get all shipping fields from user profile
function geffen_get_shipping_fields()
{
  $user_id = get_current_user_id();

  // Get all shipping fields for the current user
  $shipping_fields = get_user_meta($user_id);

  $shipping_info = array();
  foreach ($shipping_fields as $key => $value) {
    if ((strpos($key, 'shipping_') === 0) || $key === 'first_name' ) {
      $shipping_info[$key] = $value[0];
    }
  }

  return $shipping_info;
}

// Hook into the WooCommerce order completion event
add_action('woocommerce_checkout_order_processed', 'update_shipping_checkbox_after_checkout', 10, 3);

function update_shipping_checkbox_after_checkout($order_id, $posted_data, $order)
{
  $user_id = $order->get_user_id();

  if ($user_id) {
    // Update the user meta for 'shipping_checkbox' field to 'no'
    update_user_meta($user_id, 'shipping_checkbox', 'no');
  }
}

function get_variation($product)
{
  $attr = [];
  foreach ($product->get_available_variations() as $variation) {
    $variation_id = $variation['variation_id'];
    // Get the variation object.
    $var = wc_get_product($variation_id);
    // Get variation attributes (e.g., size, color).
    $attributes = $var->get_variation_attributes();

    // Get variation image
    $variation_image = wp_get_attachment_image_src($var->get_image_id(), 'full');

    // Get variation regular price without currency symbol
    $variation_price = $var->get_regular_price();

    // Get variation sale price without currency symbol
    $variation_sale_price = $var->get_sale_price();

    // Get custom field 'club_price_variation'
    $club_price_variation = $var->get_meta('_club_price_variation');

    $attr[$variation_id]['attributes'] = [];

    foreach ($attributes as $attribute_name => $option) {
      // Get attribute taxonomy and term object to retrieve the label.
      $taxonomy = str_replace('attribute_', '', $attribute_name);
      $term = get_term_by('slug', $option, urldecode($taxonomy));

      // Fetch the attribute name (label).
      $name = $term ? $term->name : '';

      // Add the attribute name (label) to the array.
      $attr[$variation_id]['attributes'][] = $name;
    }

    // Add variation image, regular price, sale price, and custom field to the array
    $attr[$variation_id]['image'] = $variation_image;
    $attr[$variation_id]['price'] = $variation_price;
    $attr[$variation_id]['sale_price'] = $variation_sale_price;
    $attr[$variation_id]['club_price'] = $club_price_variation;
  }

  return $attr;
}

function add_to_cart_notification()
{
  $template = '<section id="confirm_addcart_popup">
  <div class="confirm-logout">
   <img src="/wp-content/themes/geffenmedical/assets/img/logo.png" alt="logo">
   <div class="confirm-logout-wrap">
    <h2 class="confirm-logout-title" style="font-size: 35px;text-align: center;">המוצר שבחרת<br> נוסף לסל</h2>
    <div class="confirm-addcart-out-btns">
     <a class="white-btn" href="#" id="close_confirm_addcart_out">להמשך קנייה</a>
     <a class="btn-blue" style="display: flex;flex-direction: row-reverse;color: #fff!important;" href="/cart/">
     <img src="/wp-content/uploads/2023/12/Component-4.png" alt="">
     מעבר לסל</a>
    </div>
   </div>
  </div>
  </section>';

  return $template;
}

// add_action('woocommerce_thankyou', 'custom_redirect_after_purchase');

function custom_redirect_after_purchase($order_id)
{
  $order = wc_get_order($order_id);
  $redirect_url = '/thank-you'; // Replace with your custom thank you page URL
  if ($order) {
    wp_safe_redirect($redirect_url);
    exit;
  }
}

// Add custom field to Single Product editor in Inventory
function add_max_quantity_on_hands_field() {
  global $post;

  echo '<div class="options_group">';

  // Field
  woocommerce_wp_text_input(
    array(
      'id'          => '_max_quantity_on_hands',
      'label'       => __( 'Max Quantity on Hands', 'geffen' ),
      'placeholder' => __( 'Enter max quantity on hands...', 'geffen' ),
      'desc_tip'    => 'true',
      'description' => __( 'Enter the maximum quantity of this product available on hands.', 'geffen' ),
      'type'        => 'number',
      'custom_attributes' => array(
          'step' => '1',
          'min'  => '0',
      ),
    )
  );

  echo '</div>';
}

add_action( 'woocommerce_product_options_inventory_product_data', 'add_max_quantity_on_hands_field' );

// Save custom field value
function save_max_quantity_on_hands_field( $post_id ) {
  $max_quantity_on_hands = isset( $_POST['_max_quantity_on_hands'] ) ? sanitize_text_field( $_POST['_max_quantity_on_hands'] ) : '';

  update_post_meta( $post_id, '_max_quantity_on_hands', $max_quantity_on_hands );
}

add_action( 'woocommerce_process_product_meta', 'save_max_quantity_on_hands_field' );

function get_product_qty_in_cart($product_id) {
  // Get the cart contents
  $cart_contents = WC()->cart->get_cart();

  // Initialize the quantity variable
  $product_quantity = false;

  // Loop through the cart contents to find the product
  foreach ($cart_contents as $cart_item) {
    if ($cart_item['product_id'] == $product_id) {
      $max_qty = get_post_meta( $product_id, '_max_quantity_on_hands', true );

      if ($max_qty && $cart_item['quantity'] == $max_qty) {
        $product_quantity = true;
        break; // Stop the loop once the product is found
      }
    }
  }

  return $product_quantity;
}

// Override woocommerce_cart_item_price hook to add sale price and club price condition
add_filter('woocommerce_cart_item_price', 'custom_cart_item_price', 10, 3);

function custom_cart_item_price($price, $cart_item, $cart_item_key) {
  $_product = $cart_item['data'];
  $regular_price = $_product->get_regular_price();
  $sale_price = $_product->get_sale_price();
  $club_price = get_post_meta($_product->get_id(), 'club_price', true);

  // Check if the product is a variable product and get club price for the specific variation
  if ($_product->is_type('variable') && isset($cart_item['variation_id']) && !empty($cart_item['variation_id'])) {
    $variation_id = $cart_item['variation_id'];
    $club_price = get_post_meta($variation_id, 'club_price', true);
  }

  // Check for sale price or club price and format accordingly
  if ($sale_price) {
    $price = '<span class="cart-regular-price">';
    $price .= '<del>' . wc_price($regular_price) . '</del>';
    $price .= '</span> ';
    $price .= '<span class="cart-discount cart-sale-price">';
    $price .= '<ins>' . wc_price($sale_price) . '</ins>';
    $price .= '</span>';
  } elseif ($club_price) {
    $price = '<span class="cart-regular-price">';
    $price .= '<del>' . wc_price($regular_price) . '</del>';
    $price .= '</span> ';
    $price .= '<span class="cart-discount cart-club-price">';
    $price .= '<ins>' . wc_price($club_price) . '</ins>';
    $price .= '</span>';
  } else {
    // Return the default price if no sale or club price is set
    return $price;
  }

  return $price;
}

function update_erp_sended_meta_key( $order_id, $erp_sended_value ) {
  // Make sure the value is either true or false
  $erp_sended_value = filter_var( $erp_sended_value, FILTER_VALIDATE_BOOLEAN );

  // Update the order meta key 'erp_sended' with true/false
  update_post_meta( $order_id, 'erp_sended', $erp_sended_value );
}

// make product sku same
add_filter('wc_product_has_unique_sku', '__return_false');

function add_product_if_condition_met() {
  // Ensure WooCommerce is loaded
  if (!function_exists('WC')) {
    return;
  }

  $cart = WC()->cart->get_cart();
  $target_product_id = 888; // ID of the target product
  $additional_product_id = 891; // ID of the additional product to add
  $required_quantity = 3;

  $has_target_product = false;
  $found_additional_product = false;

  // Check for the target product and additional product in the cart
  foreach ($cart as $cart_item_key => $cart_item) {
    if ($cart_item['product_id'] == $target_product_id && $cart_item['quantity'] == $required_quantity) {
      $has_target_product = true;
    }
    if ($cart_item['product_id'] == $additional_product_id) {
      $found_additional_product = true;
    }
  }

  // Add the additional product if conditions are met
  if ($has_target_product && ! $found_additional_product) {
    WC()->cart->add_to_cart($additional_product_id);
  }
}

/**
 * Handles updating the CUSTNAME_ID for an order when the AJAX request is received
 *
 * @since 1.0.0
 */
function add_custname_id() {
  // Check if the nonce is valid
  if (!isset($_POST['security']) || !wp_verify_nonce($_POST['security'], 'add_custname_nonce')) {
    wp_send_json_error(['message' => 'Nonce verification failed.']);
  }

  // Validate input
  if (!isset($_POST['order_id']) || !isset($_POST['reciepient_id'])) {
    wp_send_json_error(['message' => 'Invalid request.']);
  }

  $order_id = intval($_POST['order_id']);
  $reciepient_id = sanitize_text_field($_POST['reciepient_id']);
  $order = wc_get_order($order_id);

  if (!$order) {
    wp_send_json_error(['message' => 'Invalid Order ID.']);
  }

  // Update order meta
  update_post_meta($order_id, 'CUSTNAME_ID', $reciepient_id);

  wp_send_json_success(['message' => 'CUSTNAME_ID updated successfully!']);
}
add_action('wp_ajax_add_custname_id', 'add_custname_id');
add_action('wp_ajax_nopriv_add_custname_id', 'add_custname_id');

/**
 * Server-side validation for max quantity on hands
 * Validates quantity updates in WooCommerce Side Cart Premium
 */
add_filter('xoo_wsc_update_quantity', 'geffen_validate_max_quantity_on_hands', 10, 3);

function geffen_validate_max_quantity_on_hands($validated, $cart_key, $new_qty)
{
  if (!$validated || !$cart_key || !function_exists('WC') || !WC()->cart) {
    return $validated;
  }

  $cart_item = WC()->cart->get_cart_item($cart_key);

  if (!$cart_item) {
    return $validated;
  }

  $product_id = $cart_item['product_id'];
  $max_qty = get_post_meta($product_id, '_max_quantity_on_hands', true);

  if ($max_qty && intval($max_qty) > 0) {
    $max_qty_int = intval($max_qty);

    if ($new_qty > $max_qty_int) {
      // Set notice and return false to prevent update
      wc_add_notice(
        sprintf(
          __('Maximum quantity allowed for this product is %d.', 'geffen'),
          $max_qty_int
        ),
        'error'
      );
      return false;
    }
  }

  return $validated;
}

/**
 * Get max quantity limits for cart items
 */
function geffen_get_max_quantity_limits()
{
  if (!function_exists('WC') || !WC()->cart) {
    return array('limits_by_key' => array(), 'limits_by_product' => array());
  }

  $limits_by_key = [];
  $limits_by_product = [];

  foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
    $product_id = $cart_item['product_id'];
    $max_qty = get_post_meta($product_id, '_max_quantity_on_hands', true);
    $max_qty_int = $max_qty ? intval($max_qty) : 0;

    if ($max_qty_int > 0) {
      $limits_by_key[$cart_item_key] = $max_qty_int;
      if (!isset($limits_by_product[$product_id])) {
        $limits_by_product[$product_id] = $max_qty_int;
      }
    }
  }

  return array(
    'limits_by_key' => $limits_by_key,
    'limits_by_product' => $limits_by_product,
  );
}

/**
 * Enqueue scripts and styles for max quantity validation
 */
function geffen_enqueue_side_cart_max_quantity_assets()
{
  // Enqueue CSS (always, as cart might be empty initially)
  wp_enqueue_style(
    'geffen-side-cart-max-quantity',
    get_template_directory_uri() . '/assets/css/side-cart-max-quantity.css',
    array(),
    _S_VERSION
  );

  // Enqueue JS (always, as cart might be empty initially)
  wp_enqueue_script(
    'geffen-side-cart-max-quantity',
    get_template_directory_uri() . '/assets/js/side-cart-max-quantity.js',
    array('jquery'),
    _S_VERSION,
    true
  );

  // Get limits data
  $limits_data = geffen_get_max_quantity_limits();

  // Localize script with data
  wp_localize_script(
    'geffen-side-cart-max-quantity',
    'geffenMaxQuantity',
    array(
      'limitsByKey' => $limits_data['limits_by_key'],
      'limitsByProduct' => $limits_data['limits_by_product'],
    )
  );
}

add_action('wp_enqueue_scripts', 'geffen_enqueue_side_cart_max_quantity_assets');

/**
 * Initialize max quantity limits after cart fragments are loaded
 */
add_action('wp_footer', function () {
  // Check if script is enqueued
  if (!wp_script_is('geffen-side-cart-max-quantity', 'enqueued')) {
    return;
  }
  ?>
  <script>
    (function ($) {
      if (typeof geffenMaxQuantity !== 'undefined' && typeof window.geffenMaxQuantityInit === 'function') {
        window.geffenMaxQuantityInit(
          geffenMaxQuantity.limitsByKey || {},
          geffenMaxQuantity.limitsByProduct || {}
        );
      }
    })(jQuery);
  </script>
  <?php
}, 99);

/**
 * Update max quantity limits data when cart fragments are refreshed
 * This ensures limits are updated when cart is modified via AJAX
 */
add_filter('woocommerce_add_to_cart_fragments', 'geffen_update_max_quantity_fragments');

function geffen_update_max_quantity_fragments($fragments)
{
  $limits_data = geffen_get_max_quantity_limits();

  // Only add script if there are limits to update
  if (!empty($limits_data['limits_by_key']) || !empty($limits_data['limits_by_product'])) {
    // Add script to update limits in fragments
    ob_start();
    ?>
    <script type="text/javascript" class="geffen-max-quantity-update">
      (function ($) {
        if (typeof geffenMaxQuantity !== 'undefined' && typeof window.geffenMaxQuantityInit === 'function') {
          geffenMaxQuantity.limitsByKey = <?php echo wp_json_encode($limits_data['limits_by_key']); ?>;
          geffenMaxQuantity.limitsByProduct = <?php echo wp_json_encode($limits_data['limits_by_product']); ?>;
          window.geffenMaxQuantityInit(
            geffenMaxQuantity.limitsByKey || {},
            geffenMaxQuantity.limitsByProduct || {}
          );
        }
      })(jQuery);
    </script>
    <?php
    $fragments['script.geffen-max-quantity-update'] = ob_get_clean();
  }

  return $fragments;
}
