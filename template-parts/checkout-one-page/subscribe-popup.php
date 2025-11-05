<div id="subscribe_popup" class="popup-contactpage">
  <div class="popup-content-contactpage">
    <span class="close-contactpage" id="online_form_form">×</span>

    <div id="checkout_payment_form">
      <?php wp_nonce_field('save_subscription', 'subscription_nonce') ?>
      <input type="hidden" id="subscribe-user-id" name="user-id" value="<?= get_current_user_id() ?>">

      <label class="label-top team-email-checkbox hide-label" style="margin: 20px 0 30px">
        <span class="wpcf7-form-control wpcf7-checkbox wpcf7-validates-as-required">
          <span class="wpcf7-list-item first last">
            <input type="checkbox" id="subscribe-offers" name="offers">
          </span>
        </span>

        <span
                    class="label-top-mr"><?= __('אני מסכימ/ה לקבל מחברת גפן מדיקל בע"מ דברי פרסומת, לרבות, הטבות, הצעות, מבצעים והנחות באמצעים טכנולוגים (לרבות, בדוא"ל ובסמס) בהתאם <a href="/privacy-policy/" target="_blank" style="font-size: 12px; >למדיניות הפרטיות </a>של החברה', 'geffen') ?></span>
      </label>

      <div class="submit-area">
        <input type="hidden" name="checkout_url" value="<?php echo esc_url(wc_get_checkout_url()); ?>">

        <?php $subscribe_btn = is_checkout() ? 'checkout_payment' : 'join_club'; ?>
        <button type="submit" id="<?= $subscribe_btn ?>" class="btn btn__blue">
          <?= __('שמור ', 'geffen') ?>
          <div class="checkout-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
          </div>
        </button>
      </div>
    </div>
  </div>
</div>