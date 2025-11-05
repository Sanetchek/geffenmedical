<?php

// Add admin menu item
function geffen_blocked_users_menu() {
  add_menu_page(
    'Geffen Blocked Users',
    'Blocked Users',
    'manage_options',
    'geffen-blocked-users',
    'geffen_blocked_users_page',
    'dashicons-lock', // Icon for the menu item
    30 // Menu position
  );
}
add_action('admin_menu', 'geffen_blocked_users_menu');

// Function to display the blocked users' page content
function geffen_blocked_users_page() {
  if (!current_user_can('manage_options')) {
    return;
  }

  ?>
  <div class="wrap">
    <h1><?= __('Geffen Blocked Users', 'geffen') ?></h1>
    <?php
    $blocked_users = get_option('geffen_blocked_users', array());

    if (empty($blocked_users)) {
        echo '<p>No users are currently blocked.</p>';
    } else { ?>
        <table class="wp-list-table widefat fixed striped">
          <thead>
            <tr>
              <th><?= __('User IP', 'geffen') ?></th>
              <th><?= __('Block Expiry Time', 'geffen') ?></th>
              <th><?= __('Action', 'geffen') ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($blocked_users as $user_ip => $block_time) { ?>
              <tr>
                <td><?php echo esc_html($user_ip); ?></td>
                <td><?php echo esc_html(date('Y-m-d H:i:s', $block_time)); ?></td>
                <td>
                  <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="geffen_unblock_user">
                    <input type="hidden" name="geffen_unblock_user" value="<?php echo esc_attr($user_ip); ?>">
                    <?php wp_nonce_field('geffen_unblock_user_nonce', 'geffen_unblock_user_nonce'); ?>
                    <button type="submit" class="button"><?= __('Unblock', 'geffen') ?></button>
                  </form>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
    <?php } ?>
  </div>
  <?php
}

// Handle unblocking users
function geffen_handle_unblock_user() {
  if (isset($_POST['geffen_unblock_user'])) {
    if (!current_user_can('manage_options') || !wp_verify_nonce($_POST['geffen_unblock_user_nonce'], 'geffen_unblock_user_nonce')) {
      wp_die('Unauthorized request');
    }

    $user_to_unblock = sanitize_text_field(wp_unslash($_POST['geffen_unblock_user']));

    $blocked_users = get_option('geffen_blocked_users', array());

    if (isset($blocked_users[$user_to_unblock])) {
      unset($blocked_users[$user_to_unblock]);
      update_option('geffen_blocked_users', $blocked_users);
    }

    wp_safe_redirect(admin_url('admin.php?page=geffen-blocked-users'));
    exit;
  }
}
add_action('admin_post_geffen_unblock_user', 'geffen_handle_unblock_user');

/**
 * Block user brute force
 */
function block_user_brute_force($user_id)
{
  // Check if the user has a key for counting requests
  $request_count_key = 'geffen_request_count_' . $user_id;
  $request_count = get_transient($request_count_key);

  $user_ip = $_SERVER['REMOTE_ADDR'];

  if (is_user_blocked($user_ip)) {
    $message = __('נחסמת זמנית, אנא נסה מאוחר יותר ', 'geffen');
    wp_send_json(['success' => false, 'blocked' => true, 'message' => $message]);
    wp_die();
  }

  if (!$request_count) {
    $request_count = 1;
    set_transient($request_count_key, $request_count, HOUR_IN_SECONDS);
  } else {
    $request_count++;
    set_transient($request_count_key, $request_count, HOUR_IN_SECONDS);
  }

  // If the request count exceeds 3, block the user
  if ($request_count > 3) {
    add_blocked_user($user_ip);

    $request_count = 0;
    set_transient($request_count_key, $request_count, HOUR_IN_SECONDS);

    // Block user
    $message = __('נחסמת בשל כמות ניסיונות מרובה, אנא נסה מאוחר יותר', 'geffen');
    wp_send_json(['success' => false, 'blocked' => true, 'message' => $message]);
    wp_die();
  }
}

function delete_user_from_brute_force($user_id)
{
  $request_count_key = 'geffen_request_count_' . $user_id;
  delete_transient($request_count_key);
}

function add_blocked_user($user_ip)
{
  $blocked_users = get_option('geffen_blocked_users', array());
  $blocked_users[$user_ip] = time() + HOUR_IN_SECONDS; // Store block expiration time (1 hour from now)
  update_option('geffen_blocked_users', $blocked_users);
}

function is_user_blocked($user_ip)
{
  $blocked_users = get_option('geffen_blocked_users', array());
  if (isset($blocked_users[$user_ip]) && $blocked_users[$user_ip] > time()) {
    return true; // User is blocked
  }
  return false; // User is not blocked or block expired
}

function remove_expired_blocked_users()
{
  $blocked_users = get_option('geffen_blocked_users', array());
  foreach ($blocked_users as $user_ip => $block_time) {
    if ($block_time <= time()) {
      unset($blocked_users[$user_ip]); // Remove expired block
    }
  }
  update_option('geffen_blocked_users', $blocked_users);
}

// Schedule cron event on plugin activation or theme activation
function schedule_blocked_user_cleanup()
{
  if (!wp_next_scheduled('geffen_remove_expired_blocked_users')) {
    wp_schedule_event(time(), 'hourly', 'geffen_remove_expired_blocked_users');
  }
}
add_action('init', 'schedule_blocked_user_cleanup');

// Hook to remove expired blocked users
add_action('geffen_remove_expired_blocked_users', 'remove_expired_blocked_users');
