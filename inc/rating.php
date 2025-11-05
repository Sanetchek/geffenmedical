<?php

function create_site_rating_post_type() {
  $args = array(
    'public' => false, // Hide from public
    'labels' => array(
      'name' => __('Site Ratings'),
      'singular_name' => __('Site Rating')
    ),
    'supports' => array('title', 'editor'),
    'show_ui' => true,
    'show_in_menu' => 'options-general.php',
  );
  register_post_type('site_rating', $args);
}
add_action('init', 'create_site_rating_post_type');

// Change column header from 'Title' to 'ID'
function change_title_column_name($columns) {
  $columns['title'] = __('ID');
  return $columns;
}
add_filter('manage_site_rating_posts_columns', 'change_title_column_name');

// Reorder columns
function reorder_rating_columns($columns) {
  // Create a new array to hold the reordered columns
  $new_columns = array();

  // Add columns before 'date'
  foreach ($columns as $key => $value) {
    $new_columns[$key] = $value;

    if ($key == 'title') {
      // Add 'User Info' column
      $new_columns['user_info'] = __('User Info');

      // Add 'rating' column after 'title'
      $new_columns['site_rating'] = __('Rating');

      // Add 'editor_content' column after 'rating'
      $new_columns['editor_content'] = __('Message');
    }
  }

  return $new_columns;
}
add_filter('manage_site_rating_posts_columns', 'reorder_rating_columns');

// Display column content
function display_rating_column($column, $post_id) {
  if ($column == 'site_rating') {
    // Get rating value from custom field
    $rating = get_field('site_rating', $post_id);
    echo $rating; // Output rating value
  }

  if ($column == 'user_info') {
    // Get name and phone fields
    $name = get_post_meta($post_id, 'site_contact_name', true);
    $phone = get_post_meta($post_id, 'site_contact_phone', true);
    $service = get_post_meta($post_id, 'site_service', true) == 'yes' ? 'Yes' : 'No';

    // Output user info
    echo 'Name: ' . $name . '<br>';
    echo 'Phone: ' . $phone . '<br>';
    echo 'Service: ' . $service . '<br>';
  }

  if ($column == 'editor_content') {
    // Get editor content
    $editor_content = get_post_field('post_content', $post_id);
    echo wp_trim_words($editor_content, 10); // Output trimmed content
  }
}
add_action('manage_site_rating_posts_custom_column', 'display_rating_column', 10, 2);

function add_site_rating_meta_box() {
  add_meta_box(
    'site-rating-meta-box',
    __('Rating'),
    'display_site_rating_meta_box',
    'site_rating',
    'side', // Position the meta box on the side
    'default'
  );

  // Add meta box for Name and Phone
  add_meta_box(
    'site-contact-meta-box',
    __('Contact Information'),
    'display_site_contact_meta_box',
    'site_rating',
    'side', // Position the meta box on the side
    'default'
  );
}
add_action('add_meta_boxes', 'add_site_rating_meta_box');

function display_site_contact_meta_box($post) {
  // Retrieve the current name and phone values
  $name = get_post_meta($post->ID, 'site_contact_name', true);
  $phone = get_post_meta($post->ID, 'site_contact_phone', true);
  $service = get_post_meta($post->ID, 'site_service', true);
  ?>
  <label for="site_contact_name">Name:</label>
  <input type="text" id="site_contact_name" name="site_contact_name" value="<?php echo esc_attr($name); ?>" />
  <br /><br />
  <label for="site_contact_phone">Phone:</label>
  <input type="text" id="site_contact_phone" name="site_contact_phone" value="<?php echo esc_attr($phone); ?>" />
  <br /><br />
  <label for="site_service">Service:</label>
  <input type="checkbox" id="site_service" name="site_service" value="yes" <?php checked($service, 'yes'); ?> />
  <?php
}

function display_site_rating_meta_box($post) {
  // Retrieve the current rating value
  $rating = get_post_meta($post->ID, 'site_rating', true);
  ?>
  <label for="site_rating">Rating:</label>
  <input type="number" id="site_rating" name="site_rating" value="<?php echo esc_attr($rating); ?>" min="1" max="5" step="1" />
  <?php wp_nonce_field('save_site_rating', 'site_rating_nonce'); ?>
  <?php
}

function save_site_rating_meta_box($post_id) {
  // Check if nonce is set and verify nonce
  if (!isset($_POST['site_rating_nonce']) || !wp_verify_nonce($_POST['site_rating_nonce'], 'save_site_rating')) {
    return;
  }

  // Check if this is an autosave or if the user has permissions to edit the post
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE || !current_user_can('edit_post', $post_id)) {
    return;
  }

  // Save rating field
  if (isset($_POST['site_rating'])) {
    $rating = sanitize_text_field($_POST['site_rating']);
    update_post_meta($post_id, 'site_rating', $rating);
  }

  // Save name and phone fields
  if (isset($_POST['site_contact_name'])) {
    $name = sanitize_text_field($_POST['site_contact_name']);
    update_post_meta($post_id, 'site_contact_name', $name);
  }

  if (isset($_POST['site_contact_phone'])) {
    $phone = sanitize_text_field($_POST['site_contact_phone']);
    update_post_meta($post_id, 'site_contact_phone', $phone);
  }

  $service = isset($_POST['site_service']) ? 'yes' : 'no';
  update_post_meta($post_id, 'site_service', $service);
}
add_action('save_post', 'save_site_rating_meta_box');

/**
 * Save new rating in post
 */
function geffen_site_rating()
{
  parse_str($_POST['formData'], $data);

  // Create a new post of the "Site Rating" custom post type
  $post_data = array(
    'post_title'    => '', // Set an empty title
    'post_content'  => $data['message'], // Set the post content to the message
    'post_type'     => 'site_rating', // Set the post type to 'site_rating'
    'post_status'   => 'publish' // Set the post status to 'publish'
  );

  // Insert the post into the database
  $post_id = wp_insert_post($post_data);

  if ($post_id) {
    // If post insertion is successful, update post title to post ID
    wp_update_post(array(
      'ID' => $post_id,
      'post_title' => $post_id // Set post title to post ID
    ));

    // Update post meta for rating
    update_post_meta($post_id, 'site_rating', $data['rating']);

    $name = sanitize_text_field($data['user_name']);
    update_post_meta($post_id, 'site_contact_name', $name);

    $phone = sanitize_text_field($data['user_phone']);
    update_post_meta($post_id, 'site_contact_phone', $phone);

    $service = $data['service'] == 'on' ? 'yes' : 'no';
    update_post_meta($post_id, 'site_service', $service);

    // Prepare email content
    $subject = 'New Site Rating Submission';
    $message = "Rating: {$data['rating']}\n";
    if ($data['message']) {
      $message .= "Message: {$data['message']}\n";
    }

    if ($data['user_name']) {
      $message .= "Contact Name: {$data['user_name']}\n";
    }

    if ($data['user_phone']) {
      $message .= "Contact Phone: {$data['user_phone']}\n";
    }

    if ($data['service']) {
      $need_service = $data['service'] == 'on' ? 'Yes' : 'No';
      $message .= "Service: {$need_service}\n";
    }

    $to = 'gm-marketing@geffenmedical.com';
    $headers = get_header_for_email(); // return array with headers option

    // Send email
    $email_sent = wp_mail($to, $subject, $message, $headers);

    if ($email_sent) {
      // Print success message if email sent successfully
      echo 'Post created successfully with ID: ' . $post_id . '. Email sent.';
    } else {
      // Print error message if email sending fails
      echo 'Post created successfully with ID: ' . $post_id . '. Error sending email.';
    }
  } else {
    // Print error message if post creation fails
    echo 'Error creating post';
  }

  // Ensure that no further output is sent to the browser
  wp_die();
}

add_action('wp_ajax_geffen_site_rating', 'geffen_site_rating');
add_action('wp_ajax_nopriv_geffen_site_rating', 'geffen_site_rating');

