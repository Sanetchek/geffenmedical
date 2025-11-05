 <?php

/**
 * Template Name: Check Blocked Users
 */


$blocked_users = get_option('geffen_blocked_users', array());

foreach ($blocked_users as $user_ip => $block_time) {
  if ($block_time <= time()) {
    unset($blocked_users[$user_ip]); // Remove expired block
  }
}
update_option('geffen_blocked_users', $blocked_users);

// https://geffenmedical.co.il/wp-content/themes/geffenmedical/inc/remove-blocked-user