<?php
/**
 * Template Name: Change User Role
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geffen
 */

get_header();

if (isset($_POST['change_user_roles']) && current_user_can('manage_options')) {
  // Nonce verification for security
  check_admin_referer('change_user_roles_nonce');

  // Get all users with the custom field 'geffen_subscription' checked
  $args = array(
    'meta_key'     => 'geffen_subscription',
    'meta_value'   => '1', // Assuming '1' means checked, adjust if needed
    'fields'       => 'ID', // We only need user IDs
  );

  $users = get_users($args);
  $updated_users = [];

  foreach ($users as $user_id) {
    $user = new WP_User($user_id);

    if (in_array('administrator', $user->roles)) {
      continue; // Skip administrators
    }

    // Check if user has the subscription checked
    $has_subscription = get_user_meta($user_id, 'geffen_subscription', true);

    if (!in_array('administrator', $user->roles)) {
      if ($has_subscription) {
        // User has subscription, change role to 'club_member'
        if (!in_array('club_member', $user->roles)) {
          $user->set_role('club_member');
          $updated_users[] = $user_id; // Log updated user IDs for debugging
        }
      } else {
        // User does not have subscription, change role to 'customer'
        if (!in_array('customer', $user->roles)) {
          $user->set_role('customer');
          $updated_users[] = $user_id; // Log updated user IDs for debugging
        }
      }
    }
  }

  if (!empty($updated_users)) {
    echo '<div class="notice notice-success"><p>User roles changed successfully for user IDs: ' . implode(', ', $updated_users) . '.</p></div>';
  } else {
    echo '<div class="notice notice-info"><p>No users were updated.</p></div>';
  }
}
?>

<style>
  .wrap {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background: #f7f7f7;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  .wrap h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
    line-height: 1.5;
  }
  .wrap form {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .wrap button {
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background: #0073aa;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.3s;
  }
  .wrap button:hover {
    background: #005a87;
  }
  .notice {
    margin: 20px 0;
    padding: 10px;
    border-left: 4px solid #0073aa;
    background: #e7f3fe;
  }
  .notice-success {
    border-color: #46b450;
    background: #dff0d8;
  }
  .notice p {
    margin: 0;
  }
</style>

<div class="wrap">
  <h1>If you want to change the user Role who has Subscription checked on "Club Member", press "Change"</h1>
  <form method="post">
    <?php wp_nonce_field('change_user_roles_nonce'); ?>
    <input type="hidden" name="change_user_roles" value="1">
    <button type="submit">Change</button>
  </form>
</div>

<?php
get_footer();
?>
