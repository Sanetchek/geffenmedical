<?php

function add_post_types() {
  /**
   * Think About Us
   */
  register_post_type('think-about-us', [
    'labels' => [
      'name' => _x('Think About Us', 'geffen'),
    ],
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'hierarchical' => false,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'menu_position' => 10,
    'menu_icon' => 'dashicons-format-quote',
    'can_export' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'supports' => ['title', 'editor'],
  ]);

  /**
   * Our Team Category
   */
  register_taxonomy('team_roles', 'projects', [
    'hierarchical' => true,
    'labels' => [
        'name' => _x('Roles', 'geffen'),
        'singular_name' => _x('Roles', 'geffen'),
    ],
    'show_ui' => true,
    'query_var' => true,
  ]);

  /**
   * Our Team CPT
   */
  register_post_type('our-team', [
    'labels' => [
      'name' => _x('Our Team', 'geffen'),
    ],
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'hierarchical' => false,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'menu_position' => 10,
    'menu_icon' => 'dashicons-buddicons-buddypress-logo',
    'can_export' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'supports' => ['title', 'editor', 'thumbnail'],
    'taxonomies' => ['team_roles'],
  ]);

  /**
   * Vacancies CPT
   */
  register_post_type('vacancies', [
    'labels' => [
      'name' => _x('Personal needed', 'geffen'),
    ],
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'hierarchical' => false,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'menu_position' => 11,
    'menu_icon' => 'dashicons-money',
    'can_export' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'supports' => ['title'],
  ]);

  /**
   * Recipes CPT
   */
  $labels = array(
    'name' => _x('Recipes', 'geffen'),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'can_export' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_in_menu' => 'edit.php',
    'capability_type' => 'post',
    'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    'taxonomies' => array('recipes_category'),
    'rewrite' => array('slug' => 'recipes'),
  );

  register_post_type('recipes', $args);

  /**
   * Taxonomy Recipes Category
   */
  register_taxonomy('recipes_category', 'recipes', [
    'hierarchical' => true,
    'labels' => [
      'name' => _x('Recipes Category', 'geffen'),
    ],
    'show_ui' => true,
    'query_var' => true,
    'show_in_menu' => 'edit.php',
    'show_in_nav_menus' => true,
    'show_admin_column' => true,
    'rewrite' => array('slug' => 'recipes-category'),
  ]);

  /**
   * Personal Stories CPT
   */
  $labels = array(
    'name' => _x('Personal Stories', 'geffen'),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'can_export' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_in_menu' => 'edit.php',
    'capability_type' => 'post',
    'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    'taxonomies' => array('personal_stories_category'),
    'rewrite' => array('slug' => 'personal-stories'),
  );

  register_post_type('personal_stories', $args);

  /**
   * Taxonomy Personal stories Category
   */
  register_taxonomy('personal_stories_category', 'personal_stories', [
    'hierarchical' => true,
    'labels' => [
      'name' => _x('Personal stories Category', 'geffen'),
    ],
    'show_ui' => true,
    'query_var' => true,
    'show_in_menu' => 'edit.php',
    'show_in_nav_menus' => true,
    'show_admin_column' => true,
    'rewrite' => array('slug' => 'personal-stories-category'),
  ]);


  /**
   * Freestyle Libre FAQ CPT
   */
  $labels = array(
    'name' => _x('Freestyle Libre FAQ', 'geffen'),
  );

  $args = array(
    'labels' => $labels,
    'public' => false,
    'has_archive' => false,
    'show_in_rest' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'can_export' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'supports' => array('title', 'editor', 'page-attributes'),
    'taxonomies' => array('fl_faq_category'),
    'rewrite' => array('slug' => 'freestyle-faq'),
  );

  register_post_type('fl_faq', $args);

  /**
   * Taxonomy Freestyle Libre FAQ Category
   */
  register_taxonomy('fl_faq_category', 'fl_faq', [
    'hierarchical' => true,
    'labels' => [
      'name' => _x('Categories', 'geffen'),
    ],
    'show_ui' => true,
    'query_var' => true,
    'show_in_menu' => 'edit.php?post_type=fl_faq',
    'show_in_nav_menus' => true,
    'show_admin_column' => true,
    'rewrite' => array('slug' => 'freestyle-faq-category'),
  ]);

  /**
   * Freestyle Libre CPT
   */
  register_post_type('freestyle_libre', [
    'labels' => [
      'name' => _x('Freestyle Libre', 'geffen'),
    ],
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'hierarchical' => false,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'can_export' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_in_menu' => 'edit.php?post_type=page',
    'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    'rewrite' => array(
      'slug' => 'freestyle-libre',
    ),
  ]);

  /**
   * Omnipod CPT
   */
  register_post_type('omnipod', [
    'labels' => [
      'name' => _x('Omnipod', 'geffen'),
    ],
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'hierarchical' => false,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'can_export' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_in_menu' => 'edit.php?post_type=page',
    'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
  ]);
}
add_action('init', 'add_post_types');

/**
 * Add Columns to Press and Awards page list
 */
add_filter( 'manage_' . 'our-team' . '_posts_columns', function( $columns ) {
  // Add new columns
  $custom_col_order = array(
    'cb' => $columns['cb'],
    'title' => $columns['title'],
    'role' => __('Role', 'geffen'),
    'author' => __('Author', 'geffen'),
    'date' => $columns['date']
  );
  return $custom_col_order;
} );

/*
* Fill new column
* @param string $row_output text/HTML output of a table cell
* @param string $column_id_attr column ID
* @param int $user user ID (in fact - table row ID)
*/
add_filter( 'manage_' . 'our-team' . '_posts_custom_column', function( $column, $post_id ) {
switch ( $column ) {
  case 'role' :
    $post_categories = wp_get_post_terms( $post_id, 'team_roles' );
    $count = 1;

    if ($post_categories) {
      foreach ($post_categories as $category_id) {
        $category = get_category($category_id);
        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';

        if (count($post_categories) > 1 && count($post_categories) > $count) {
          echo ', ';
        }

        $count++;
      }
    }
    break;
}

return $column;
}, 10, 3 );

/**
 * Change Admin Menu Labels
 *
 * @return void
 */
function change_admin_menu_label() {
  global $menu;
  global $submenu;

  // Find the 'Posts' menu item and change its label
  foreach ($menu as $key => $item) {
    if ($item[0] == 'Posts') {
      $menu[$key][0] = 'Blog';
      $submenu['edit.php'][5][0] = 'Articles';
      break;
    }
  }

  // Remove the 'Add New' subpage
  if (isset($submenu['edit.php'][10])) {
    unset($submenu['edit.php'][10]);
  }

  // Remove the 'Category' subpage
  if (isset($submenu['edit.php'][15])) {
    unset($submenu['edit.php'][15]);
  }
}

add_action('admin_menu', 'change_admin_menu_label');


/**
 * Remove tags taxonomy from posts
 *
 * @return void
 */
function remove_tags_taxonomy_from_posts() {
  unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'remove_tags_taxonomy_from_posts');

/**
 * Edit Categories Subpage
 *
 * @return void
 */
function add_edit_categories_subpage_to_posts() {
  add_submenu_page(
    'edit.php',                // Parent menu slug (edit.php for Posts)
    'Edit Categories',          // Page title
    'Edit Categories',          // Menu title
    'manage_options',          // Capability required to access
    'edit-categories',          // Menu slug (unique)
    'edit_categories_subpage_callback'  // Callback function to display content
  );
}

function edit_categories_subpage_callback() {
  echo '
  <style>
    .links-wrap {
      display: flex;
      gap: 40px;
      padding: 100px 50px;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
    }

    .links-wrap a {
      padding: 20px;
      background: #fff;
      border: 1px solid #000;
      color: #000;
      text-decoration: none;
      font-weight: 700;
    }

    .links-wrap a:hover {
      background: #0A3B64;
      border: 1px solid #0A3B64;
      color: #fff;
    }
  </style>
  ';
  echo '<div class="wrap"><h2>Edit Categories</h2>';
  echo '<div class="links-wrap">';
  echo '<a href="/wp-admin/edit-tags.php?taxonomy=category">' . __('Edit Article Categories', 'geffen') . '</a>';
  echo '<a href="/wp-admin/edit-tags.php?taxonomy=recipes_category">' . __('Edit Recipes Categories', 'geffen') . '</a>';
  echo '<a href="/wp-admin/edit-tags.php?taxonomy=personal_stories_category">' . __('Edit Personal stories Categories', 'geffen') . '</a>';
  echo '</div>';
  echo '</div>';
}

add_action('admin_menu', 'add_edit_categories_subpage_to_posts');


/**
 * Create Cities CPT
 */
function create_city_custom_post_type() {
  $labels = array(
    'name'               => _x('Cities', 'post type general name', 'geffen'),
    'singular_name'      => _x('City', 'post type singular name', 'geffen'),
    'menu_name'          => _x('Cities', 'admin menu', 'geffen'),
    'name_admin_bar'     => _x('City', 'add new on admin bar', 'geffen'),
    'add_new'            => _x('Add New', 'city', 'geffen'),
    'add_new_item'       => __('Add New City', 'geffen'),
    'new_item'           => __('New City', 'geffen'),
    'edit_item'          => __('Edit City', 'geffen'),
    'view_item'          => __('View City', 'geffen'),
    'all_items'          => __('Cities', 'geffen'),
    'search_items'       => __('Search Cities', 'geffen'),
    'parent_item_colon'  => __('Parent Cities:', 'geffen'),
    'not_found'          => __('No cities found.', 'geffen'),
    'not_found_in_trash' => __('No cities found in Trash.', 'geffen')
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __('Description.', 'geffen'),
    'public'             => false,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => 'options-general.php',
    'query_var'          => true,
    'rewrite'            => array('slug' => 'city'),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array('title'),
  );

  register_post_type('city', $args);
}

add_action('init', 'create_city_custom_post_type');

// Add meta box for "Delivery prohibited" checkbox
function add_delivery_prohibited_meta_box() {
  add_meta_box(
    'delivery_prohibited_meta_box',
    'Delivery Prohibited',
    'render_delivery_prohibited_meta_box',
    'city',
    'normal',
    'default'
  );
}

add_action('add_meta_boxes', 'add_delivery_prohibited_meta_box');

// Render content of the "Delivery prohibited" meta box
function render_delivery_prohibited_meta_box($post) {
  // Retrieve current value of "Delivery prohibited" meta field
  $delivery_prohibited = get_post_meta($post->ID, '_delivery_prohibited', true);

  // Use nonce for verification
  wp_nonce_field('delivery_prohibited_nonce', 'delivery_prohibited_nonce');

  // Output the checkbox
  ?>
  <label for="delivery_prohibited">
    <input type="checkbox" name="delivery_prohibited" id="delivery_prohibited" <?php checked($delivery_prohibited, 'on'); ?> />
    yes / no
  </label>
  <?php
}

// Save "Delivery prohibited" meta field when the post is saved
function save_delivery_prohibited_meta_field($post_id) {
  // Check if nonce is set
  if (!isset($_POST['delivery_prohibited_nonce'])) {
    return;
  }

  // Verify nonce
  if (!wp_verify_nonce($_POST['delivery_prohibited_nonce'], 'delivery_prohibited_nonce')) {
    return;
  }

  // Check if this is an autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  // Check user permissions
  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  // Save the checkbox value
  $delivery_prohibited = isset($_POST['delivery_prohibited']) ? 'on' : 'off';
  update_post_meta($post_id, '_delivery_prohibited', $delivery_prohibited);
}

add_action('save_post', 'save_delivery_prohibited_meta_field');

// Add "Delivery Prohibited" checkbox to the quick edit section
function add_quick_edit_delivery_prohibited($column_name, $post_type) {
  if ($column_name !== 'delivery_prohibited' || $post_type !== 'city') {
    return;
  }

  // Retrieve current value of "Delivery prohibited" meta field
  $delivery_prohibited = get_post_meta(get_the_ID(), '_delivery_prohibited', true);

  // Output the checkbox
  ?>
  <fieldset class="inline-edit-col-left">
    <div class="inline-edit-col">
      <label class="inline-edit-group">
        <span class="title"><?php esc_html_e('Prohibited', 'geffen'); ?></span>
        <span>
          <input type="checkbox" name="delivery_prohibited" class="delivery-prohibited-checkbox" <?php checked($delivery_prohibited, 'on'); ?> /> <span>yes / no</span>
        </span>
      </label>
    </div>
  </fieldset>
  <?php
}

add_action('quick_edit_custom_box', 'add_quick_edit_delivery_prohibited', 10, 2);

// Save "Delivery prohibited" meta field when the post is saved using quick edit
function save_quick_edit_delivery_prohibited($post_id, $post) {
  if ($post->post_type !== 'city') {
    return;
  }

  // Save the checkbox value
  $delivery_prohibited = isset($_REQUEST['delivery_prohibited']) ? 'on' : 'off';
  update_post_meta($post_id, '_delivery_prohibited', $delivery_prohibited);
}

add_action('save_post', 'save_quick_edit_delivery_prohibited', 10, 2);

// Add custom columns for "Delivery prohibited" and "Date" in the list of cities
function add_custom_columns($columns) {
  $new_columns = array();
  foreach ($columns as $key => $value) {
      $new_columns[$key] = $value;
      if ($key === 'title') {
          $new_columns['delivery_prohibited'] = __('Delivery Prohibited', 'geffen');
      }
  }
  return $new_columns;
}

add_filter('manage_city_posts_columns', 'add_custom_columns');

// Make the "Delivery Prohibited" column sortable
function make_delivery_prohibited_column_sortable($sortable_columns) {
  $sortable_columns['delivery_prohibited'] = 'delivery_prohibited';
  return $sortable_columns;
}

add_filter('manage_edit-city_sortable_columns', 'make_delivery_prohibited_column_sortable');

// Display the value of "Delivery prohibited" and "Date" in the custom columns
function display_custom_columns($column, $post_id) {
  if ($column === 'delivery_prohibited') {
    $delivery_prohibited = get_post_meta($post_id, '_delivery_prohibited', true);
    echo esc_html($delivery_prohibited === 'on' ? 'Yes' : 'No');
  }
}

add_action('manage_city_posts_custom_column', 'display_custom_columns', 10, 2);

// Sort by "Delivery Prohibited" in the admin list
function sort_delivery_prohibited_column($query) {
  if (!is_admin()) {
      return;
  }

  $orderby = $query->get('orderby');

  if ('delivery_prohibited' === $orderby) {
      $query->set('meta_key', '_delivery_prohibited');
      $query->set('orderby', 'meta_value');
  }
}

add_action('pre_get_posts', 'sort_delivery_prohibited_column');

// Generate List of Cities
function generate_cities()
{
  $cities = israel_cities();
  $prohib = prohibition();

  foreach ($cities as $item) {
    if ( in_array($item['name'], $prohib) ) {
      // Set the post data
      $post_data = array(
        'post_type'     => 'city',
        'post_title'    => $item['name'],
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_author'   => 1, // Set the author ID
      );

      // Insert the post into the database
      $post_id = wp_insert_post($post_data);

      update_post_meta($post_id, '_delivery_prohibited', 'on');

      print_r($post_id);
    } else {
      // Set the post data
      $post_data = array(
        'post_type'     => 'city',
        'post_title'    => $item['name'],
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_author'   => 1, // Set the author ID
      );

      // Insert the post into the database
      $post_id = wp_insert_post($post_data);
      print_r($post_id);
    }
  }


  wp_die();
}
add_action('wp_ajax_generate_cities', 'generate_cities');
add_action('wp_ajax_nopriv_generate_cities', 'generate_cities');

// israel cities array
function israel_cities() {
  $file_path = get_template_directory_uri() . '/cities.json';

  // Read the JSON file
  $json_data = file_get_contents($file_path);

  // Decode the JSON data into a PHP array
  $data = json_decode($json_data, true);

  return $data;
}

function prohibition() {
  $locations = [
    "חגי",
    "סנסנה",
    "סוסיה",
    "עשהאל",
    "סיכה",
    "שני ליבנה",
    "ליבנה",
    "טנא",
    "כרמל",
    "כרמי צור",
    "עתניאל",
    "מעון",
    "קרית ארבע",
    "שמעה",
    "אספר",
    "מעין",
    "מצדות יהודה",
    "נגוהות",
    "פני חבר",
    "יתיר",
    "אשכולות",
    "שלומציון",
    "אבנת",
    "ייט\"ב",
    "אדורה",
    "יפית",
    "עין תמר",
    "עיר אובות",
    "נירן",
    "מסוף גשר אלנבי",
    "כמהין",
    "אלמוג",
    "תלם",
    "באר מילכה",
    "ארגמן",
    "בית הערבה",
    "נעומי",
    "נעמה",
    "מצדה",
    "עין בוקק",
    "בקעות",
    "מחולה",
    "זובידאת",
    "מצוקי דרגות",
    "מכורה",
    "שחרות",
    "שיטים",
    "קליה",
    "גלגל",
    "מצפה שלם",
    "תומר",
    "נאות סמדר",
    "נווה זוהר",
    "נווה חריף",
    "ורד יריחו",
    "חברון",
    "משואה",
    "משכיות",
    "קציעות",
    "נעמ\"ה",
    "קדש ברנע",
    "נתיב הגדוד",
    "עין גדי",
    "ים המלח",
    "פצאל",
    "רועי",
    "גילגל",
    "רותם",
    "שדמות מחולה",
    "חמדת",
    "חולות",
    "חמרה"
  ];

  return $locations;
}

/**
 * Register Coupon Custom Post Type
 *
 * @return void
 */
function register_coupon_post_type() {
  $labels = array(
    'name'               => 'DMC Coupons',
    'singular_name'      => 'DMC Coupon',
    'menu_name'          => 'DMC Coupons',
    'add_new'            => 'Add New Coupon',
    'add_new_item'       => 'Add New Coupon',
    'edit_item'          => 'Edit Coupon',
    'new_item'           => 'New Coupon',
    'view_item'          => 'View Coupon',
    'search_items'       => 'Search Coupons',
    'not_found'          => 'No coupons found',
    'not_found_in_trash' => 'No coupons found in Trash',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => false,
    'publicly_queryable' => false,
    'show_ui'            => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'coupon' ),
    'show_in_menu'       => 'options-general.php',
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title' ),
  );

  register_post_type( 'coupon', $args );
}
add_action( 'init', 'register_coupon_post_type' );

// Add Meta Box for Coupon Status and Options
function add_coupon_meta_box() {
  add_meta_box(
    'coupon_meta_box',
    'Coupon Details',
    'render_coupon_meta_box',
    'coupon',
    'normal',
    'default'
  );
}
add_action( 'add_meta_boxes', 'add_coupon_meta_box' );

// Render Meta Box Content
function render_coupon_meta_box( $post ) {
  // Use nonce for verification
  wp_nonce_field( basename( __FILE__ ), 'coupon_nonce' );

  // Retrieve current value of 'used' checkbox
  $used = get_post_meta( $post->ID, '_coupon_used', true );

  // Retrieve current value of 'options' radio button
  $selected_option = get_post_meta( $post->ID, '_coupon_option', true );

  // Retrieve current value of 'order_id' field
  $order_id = get_post_meta( $post->ID, '_coupon_order_id', true );

  ?>
  <style>
    .box-wrap {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #f00;
      transition: .4s;
      border-radius: 34px;
    }

    .slider:before {
      position: absolute;
      content: "<?= __('NO', 'geffen') ?>";
      height: 20px;
      width: 20px;
      left: 2px;
      bottom: 2px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
      font-size: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    input:checked + .slider {
      background-color: #29c866;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #29c866;
    }

    input:checked + .slider:before {
      content: "<?= __('YES', 'geffen') ?>";
      transform: translateX(26px);
    }

    /* Optional: Style the label text */
    .switch-label {
      margin-left: 10px;
    }
  </style>
  <p>
    <label class="box-wrap">
      <span><?= __('Used', 'geffen') ?></span>
      <span class="switch">
        <input type="checkbox" name="coupon_used" id="coupon_used" value="<?= $used ?>" <?php checked( $used, 'on' ); ?>>
        <span class="slider"></span>
      </span>
    </label>
  </p>

  <style>
    .control {
      font-family: arial;
      display: block;
      position: relative;
      padding-left: 30px;
      margin-bottom: 10px;
      padding-top: 3px;
      cursor: pointer;
      font-size: 16px;
    }
    .control input {
      position: absolute;
      z-index: -1;
      opacity: 0;
    }
    .control_indicator {
      position: absolute;
      top: 2px;
      left: 0;
      height: 20px;
      width: 20px;
      background: #e6e6e6;
      border: 0px solid #000000;
      border-radius: undefinedpx;
    }
    .control:hover input ~ .control_indicator,
    .control input:focus ~ .control_indicator {
      background: #cccccc;
    }

    .control input:checked ~ .control_indicator {
      background: #2aa1c0;
    }
    .control:hover input:not([disabled]):checked ~ .control_indicator,
    .control input:checked:focus ~ .control_indicator {
      background: #0e6647d;
    }
    .control input:disabled ~ .control_indicator {
      background: #e6e6e6;
      opacity: 0.6;
      pointer-events: none;
    }
    .control_indicator:after {
      box-sizing: unset;
      content: '';
      position: absolute;
      display: none;
    }
    .control input:checked ~ .control_indicator:after {
      display: block;
    }
    .control-radio .control_indicator {
      border-radius: 50%;
    }

    .control-radio .control_indicator:after {
      left: 7px;
      top: 7px;
      height: 6px;
      width: 6px;
      border-radius: 50%;
      background: #ffffff;
      transition: background 250ms;
    }
    .control-radio input:disabled ~ .control_indicator:after {
      background: #7b7b7b;
    }.control-radio .control_indicator::before {
      content: '';
      display: block;
      position: absolute;
      left: 0;
      top: 0;
      width: 4.5rem;
      height: 4.5rem;
      margin-left: -1.3rem;
      margin-top: -1.3rem;
      background: #2aa1c0;
      border-radius: 3rem;
      opacity: 0.6;
      z-index: 99999;
      transform: scale(0);
    }
    @keyframes s-ripple {
      0% {
        opacity: 0;
        transform: scale(0);
      }
      20% {
        transform: scale(1);
      }
      100% {
        opacity: 0.01;
        transform: scale(1);
      }
    }
    .control-radio input + .control_indicator::before {
      animation: s-ripple 250ms ease-out;
    }
  </style>
  <label for="coupon_option"><?= __('Choose Coupon Type:', 'geffen') ?></label><br>
  <div class="control-group">
    <?php
    $options = coupon_types();
    foreach ( $options as $key => $option ) {
      ?>
      <label class="control control-radio">
        <input type="radio" name="coupon_option" value="<?php echo esc_attr($key); ?>"
          <?php checked(empty($selected_option) || $selected_option == $key, true); ?>
          >
        <div class="control_indicator"></div>
        <span><?php echo esc_html(ucfirst($option)); ?></span>
      </label>
      <?php
    }
    ?>
  </div>

  <p>
    <label for="coupon_order_id"><?= __('Order ID:', 'geffen') ?></label>
    <input type="text" name="coupon_order_id" id="coupon_order_id" value="<?php echo esc_attr( $order_id ); ?>" />
  </p>
  <?php
}

// Coupon Types
function coupon_types() {
  return array(
    '50'  => '1',
    '100' => '2',
    '150' => '3',
    '200' => '4',
    '300' => '5+1',
  );
}

// Save Meta Box Data
function save_coupon_meta_data( $post_id ) {
  // Check if nonce is set
  if ( ! isset( $_POST['coupon_nonce'] ) || ! wp_verify_nonce( $_POST['coupon_nonce'], basename( __FILE__ ) ) ) {
    return;
  }

  // Save 'used' checkbox value
  $used = isset( $_POST['coupon_used'] ) ? 'on' : 'off';
  update_post_meta( $post_id, '_coupon_used', $used );

  // Save 'options' radio button value
  $option = isset( $_POST['coupon_option'] ) ? sanitize_text_field( $_POST['coupon_option'] ) : '';
  update_post_meta( $post_id, '_coupon_option', $option );

  // Save 'order_id' field value
  $order_id = isset( $_POST['coupon_order_id'] ) ? sanitize_text_field( $_POST['coupon_order_id'] ) : '';
  update_post_meta( $post_id, '_coupon_order_id', $order_id );
}
add_action( 'save_post', 'save_coupon_meta_data' );

// Add Custom Columns to Admin Post List
// Modify Coupon Code Column Title
function modify_coupon_title_column( $columns ) {
  $new_columns = array(
    'cb' => '<input type="checkbox" />', // Checkbox column
    'title' => __('Coupon Code', 'geffen'),
    'coupon_used' => __('Used', 'geffen'),
    'coupon_option' => __('Coupon Type', 'geffen'),
    'date' => __('Date', 'geffen')
  );

  return $new_columns;
}
add_filter( 'manage_coupon_posts_columns', 'modify_coupon_title_column' );

// Populate Custom Columns with Data
function populate_coupon_columns( $column, $post_id ) {
  switch ( $column ) {
    case 'coupon_used':
      $used = get_post_meta( $post_id, '_coupon_used', true );
      echo $used === 'on' ? __('YES', 'geffen') : __('NO', 'geffen');
      break;

    case 'coupon_option':
      $option = get_post_meta( $post_id, '_coupon_option', true );
      echo esc_html( ucfirst( $option ) );
      break;

    default:
      break;
  }
}
add_action( 'manage_coupon_posts_custom_column', 'populate_coupon_columns', 10, 2 );

// Make Custom Columns Sortable
function make_coupon_columns_sortable( $columns ) {
  $columns['coupon_used'] = 'coupon_used';
  $columns['coupon_option'] = 'coupon_option';
  return $columns;
}
add_filter( 'manage_edit-coupon_sortable_columns', 'make_coupon_columns_sortable' );

/**
 * Create Posts HCP.
 */
function create_medical_profile_post_type() {
  $labels = array(
    'name'                  => _x('HCPs', 'Post Type General Name', 'giovanni'),
    'singular_name'         => _x('HCP', 'Post Type Singular Name', 'giovanni'),
    'menu_name'             => __('HCPs', 'giovanni'),
    'name_admin_bar'        => __('HCP', 'giovanni'),
    'archives'              => __('HCP Archives', 'giovanni'),
    'attributes'            => __('HCP Attributes', 'giovanni'),
    'parent_item_colon'     => __('Parent HCP:', 'giovanni'),
    'all_items'             => __('All HCPs', 'giovanni'),
    'add_new_item'          => __('Add New HCP', 'giovanni'),
    'add_new'               => __('Add New', 'giovanni'),
    'new_item'              => __('New HCP', 'giovanni'),
    'edit_item'             => __('Edit HCP', 'giovanni'),
    'update_item'           => __('Update HCP', 'giovanni'),
    'view_item'             => __('View HCP', 'giovanni'),
    'view_items'            => __('View HCPs', 'giovanni'),
    'search_items'          => __('Search HCP', 'giovanni'),
    'not_found'             => __('Not found', 'giovanni'),
    'not_found_in_trash'    => __('Not found in Trash', 'giovanni'),
    'featured_image'        => __('Featured Image', 'giovanni'),
    'set_featured_image'    => __('Set featured image', 'giovanni'),
    'remove_featured_image' => __('Remove featured image', 'giovanni'),
    'use_featured_image'    => __('Use as featured image', 'giovanni'),
    'insert_into_item'      => __('Insert into HCP', 'giovanni'),
    'uploaded_to_this_item' => __('Uploaded to this HCP', 'giovanni'),
    'items_list'            => __('HCPs list', 'giovanni'),
    'items_list_navigation' => __('HCPs list navigation', 'giovanni'),
    'filter_items_list'     => __('Filter HCPs list', 'giovanni'),
  );
  $args = array(
    'label'                 => __('HCP', 'giovanni'),
    'description'           => __('HCP Description', 'giovanni'),
    'labels'                => $labels,
    'supports'              => array('title'),
    'public'                => true,
    'has_archive'           => false,
    'show_in_rest'          => true,
    'hierarchical'          => false,
    'show_ui'               => true,
    'show_in_nav_menus'     => true,
    'show_in_admin_bar'     => true,
    'can_export'            => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
    'rewrite' => array('slug' => 'hcp'),
  );
  register_post_type('medical_profile', $args);
}
add_action('init', 'create_medical_profile_post_type', 0);

/**
 * Create Posts Customer.
 */
function create_customer_post_type() {
  $labels = array(
    'name'                  => _x('Customers', 'Post Type General Name', 'giovanni'),
    'singular_name'         => _x('Customer', 'Post Type Singular Name', 'giovanni'),
    'menu_name'             => __('Customers', 'giovanni'),
    'name_admin_bar'        => __('Customer', 'giovanni'),
    'archives'              => __('Customer Archives', 'giovanni'),
    'attributes'            => __('Customer Attributes', 'giovanni'),
    'parent_item_colon'     => __('Parent Customer:', 'giovanni'),
    'all_items'             => __('All Customers', 'giovanni'),
    'add_new_item'          => __('Add New Customer', 'giovanni'),
    'add_new'               => __('Add New', 'giovanni'),
    'new_item'              => __('New Customer', 'giovanni'),
    'edit_item'             => __('Edit Customer', 'giovanni'),
    'update_item'           => __('Update Customer', 'giovanni'),
    'view_item'             => __('View Customer', 'giovanni'),
    'view_items'            => __('View Customers', 'giovanni'),
    'search_items'          => __('Search Customer', 'giovanni'),
    'not_found'             => __('Not found', 'giovanni'),
    'not_found_in_trash'    => __('Not found in Trash', 'giovanni'),
    'featured_image'        => __('Featured Image', 'giovanni'),
    'set_featured_image'    => __('Set featured image', 'giovanni'),
    'remove_featured_image' => __('Remove featured image', 'giovanni'),
    'use_featured_image'    => __('Use as featured image', 'giovanni'),
    'insert_into_item'      => __('Insert into Customer', 'giovanni'),
    'uploaded_to_this_item' => __('Uploaded to this Customer', 'giovanni'),
    'items_list'            => __('Customers list', 'giovanni'),
    'items_list_navigation' => __('Customers list navigation', 'giovanni'),
    'filter_items_list'     => __('Filter Customers list', 'giovanni'),
  );
  $args = array(
    'label'                 => __('Customer', 'giovanni'),
    'description'           => __('Customer Description', 'giovanni'),
    'labels'                => $labels,
    'supports'              => array('title'),
    'public'                => true,
    'has_archive'           => false,
    'show_in_rest'          => true,
    'hierarchical'          => false,
    'show_ui'               => true,
    'show_in_nav_menus'     => true,
    'show_in_admin_bar'     => true,
    'show_in_menu'          => 'edit.php?post_type=medical_profile',
    'can_export'            => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
  );
  register_post_type('customer', $args);
}
add_action('init', 'create_customer_post_type', 0);


/**
 * Create Managements Posts.

function create_managements_post_type() {
  $labels = array(
    'name'                  => _x('Managements', 'Post Type General Name', 'giovanni'),
    'singular_name'         => _x('Management', 'Post Type Singular Name', 'giovanni'),
    'menu_name'             => __('Managements', 'giovanni'),
    'name_admin_bar'        => __('Management', 'giovanni'),
    'archives'              => __('Management Archives', 'giovanni'),
    'attributes'            => __('Management Attributes', 'giovanni'),
    'parent_item_colon'     => __('Parent Management:', 'giovanni'),
    'all_items'             => __('All Managements', 'giovanni'),
    'add_new_item'          => __('Add New Management', 'giovanni'),
    'add_new'               => __('Add New', 'giovanni'),
    'new_item'              => __('New Management', 'giovanni'),
    'edit_item'             => __('Edit Management', 'giovanni'),
    'update_item'           => __('Update Management', 'giovanni'),
    'view_item'             => __('View Management', 'giovanni'),
    'view_items'            => __('View Managements', 'giovanni'),
    'search_items'          => __('Search Management', 'giovanni'),
    'not_found'             => __('Not found', 'giovanni'),
    'not_found_in_trash'    => __('Not found in Trash', 'giovanni'),
    'featured_image'        => __('Featured Image', 'giovanni'),
    'set_featured_image'    => __('Set featured image', 'giovanni'),
    'remove_featured_image' => __('Remove featured image', 'giovanni'),
    'use_featured_image'    => __('Use as featured image', 'giovanni'),
    'insert_into_item'      => __('Insert into Management', 'giovanni'),
    'uploaded_to_this_item' => __('Uploaded to this Management', 'giovanni'),
    'items_list'            => __('Managements list', 'giovanni'),
    'items_list_navigation' => __('Managements list navigation', 'giovanni'),
    'filter_items_list'     => __('Filter Managements list', 'giovanni'),
  );
  $args = array(
    'label'                 => __('Management', 'giovanni'),
    'description'           => __('Management Description', 'giovanni'),
    'labels'                => $labels,
    'public'                => true,
    'has_archive'           => false,
    'show_in_rest'          => true,
    'hierarchical'          => false,
    'show_ui'               => true,
    'show_in_nav_menus'     => true,
    'show_in_admin_bar'     => true,
    'show_in_menu'          => 'edit.php?post_type=medical_profile',
    'can_export'            => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
    'supports'              => array('title'),
  );
  register_post_type('managements', $args);

  if( function_exists('acf_add_options_page') ) {
    acf_add_options_sub_page(array(
      'page_title'    => 'Page Settings',
      'menu_title'    => 'Page Settings',
      'parent_slug'   => 'edit.php?post_type=medical_profile',
      'capability'    => 'manage_options',
      'redirect'      => false
    ));
  }
}
add_action('init', 'create_managements_post_type', 0);
 */
/**
 * Create Managements Posts.
 */
function create_managements_post_type() {
  $labels = array(
    'name'                  => _x('Managements', 'Post Type General Name', 'giovanni'),
    'singular_name'         => _x('Management', 'Post Type Singular Name', 'giovanni'),
    'menu_name'             => __('Managements', 'giovanni'),
    'name_admin_bar'        => __('Management', 'giovanni'),
    'archives'              => __('Management Archives', 'giovanni'),
    'attributes'            => __('Management Attributes', 'giovanni'),
    'parent_item_colon'     => __('Parent Management:', 'giovanni'),
    'all_items'             => __('All Managements', 'giovanni'),
    'add_new_item'          => __('Add New Management', 'giovanni'),
    'add_new'               => __('Add New', 'giovanni'),
    'new_item'              => __('New Management', 'giovanni'),
    'edit_item'             => __('Edit Management', 'giovanni'),
    'update_item'           => __('Update Management', 'giovanni'),
    'view_item'             => __('View Management', 'giovanni'),
    'view_items'            => __('View Managements', 'giovanni'),
    'search_items'          => __('Search Management', 'giovanni'),
    'not_found'             => __('Not found', 'giovanni'),
    'not_found_in_trash'    => __('Not found in Trash', 'giovanni'),
    'featured_image'        => __('Featured Image', 'giovanni'),
    'set_featured_image'    => __('Set featured image', 'giovanni'),
    'remove_featured_image' => __('Remove featured image', 'giovanni'),
    'use_featured_image'    => __('Use as featured image', 'giovanni'),
    'insert_into_item'      => __('Insert into Management', 'giovanni'),
    'uploaded_to_this_item' => __('Uploaded to this Management', 'giovanni'),
    'items_list'            => __('Managements list', 'giovanni'),
    'items_list_navigation' => __('Managements list navigation', 'giovanni'),
    'filter_items_list'     => __('Filter Managements list', 'giovanni'),
  );
  $args = array(
    'label'                 => __('Management', 'giovanni'),
    'description'           => __('Management Description', 'giovanni'),
    'labels'                => $labels,
    'public'                => true,
    'has_archive'           => false,
    'show_in_rest'          => true,
    'hierarchical'          => false,
    'show_ui'               => true,
    'show_in_nav_menus'     => true,
    'show_in_admin_bar'     => true,
    'show_in_menu'          => 'edit.php?post_type=medical_profile',
    'can_export'            => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
    'supports'              => array('title'),
    'rewrite'               => array(
      'slug' => 'm',       // Set the custom slug here
      'with_front' => false // Optional: Prevents adding the front base (if using /blog/ as front)
    ),
  );
  register_post_type('managements', $args);

  if( function_exists('acf_add_options_page') ) {
    acf_add_options_sub_page(array(
      'page_title'    => 'Page Settings',
      'menu_title'    => 'Page Settings',
      'parent_slug'   => 'edit.php?post_type=medical_profile',
      'capability'    => 'manage_options',
      'redirect'      => false
    ));
  }
}
add_action('init', 'create_managements_post_type', 0);
