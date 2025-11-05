<?php
  $is_subscribed = '';
  if (is_user_logged_in()) {
    $user_id = get_current_user_id();
    $is_subscribed = get_user_meta($user_id, 'geffen_subscription', true);
  }

  $popup_subscribe = '';

  if (!is_user_logged_in()) {
    $popup_subscribe = 'show-login-popup';
  } else if (!$is_subscribed) {
    $popup_subscribe = 'show-subscribe-popup';
  }
?>

<?php if (!is_user_logged_in() || !$is_subscribed) : ?>
  <div class="joining-customer-club">
    <button type="button" class="joining-customer-club-button <?= $popup_subscribe ?>">
      <span><?= __('הצטרפות למועדון לקוחות ', 'geffen') ?></span>
    </button>
  </div>
  <?php if (is_user_logged_in()) get_template_part('template-parts/checkout-one-page/subscribe', 'popup'); ?>
<?php endif ?>