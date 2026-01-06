<?php if (!is_user_logged_in()): ?>
<div id="login_form_popup" class="popup-contactpage">
  <div class="popup-content-contactpage logip-page-formcontent registratet-popup-forms">
    <span class="close-contactpage" id="online_form_form">×</span>

    <div id="login_form_messages"></div>

    <div id="popup_login_form">
      User is not logged in
      <h2 class="login-form-title"><?= __('התחברות/הרשמה', 'geffen') ?></h2>

      <div class="container tabs">
        <div class="tabs-content">
          <div id="tab_content_2" class="tab-content active">
            <form action="" id="login_by_phone">
              <div class="contact-form-help-row">
                <div class="add-review-form-cols">
                  <span class="label-top reg user-tel">
                    <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="user-tel" aria-required="true" aria-invalid="false" value="" type="text" name="phone" pattern="\d{10}" minlength="10" maxlength="10" title="<?= __('נא להזין 10 ספרות בדיוק', 'geffen') ?>" required="">
                    <label for="user-tel"><?= __('*מספר טלפון ', 'geffen') ?></label>
                  </span>
                </div>
              </div>

              <div class="contact-submit-row">
                <p class="contact-submit">
                  <button type="submit" class="btn btn__blue"><?= __('התחברות ', 'geffen') ?></button>
                </p>
              </div>
              <!-- <div class="show_register_form">
                <p>אין לך חשבון עדיין?</p>
                <a id="show_register_form_tab" href="#">להרשמה</a>
              </div>-->
            </form>

            <form action="" id="login_by_code" style="display: none">
              <div class="contact-form-help-row">
                <div class="contact-form-resend">
                  <span><?= __('שלחנו לך קוד אימות חד פעמי למספר ', 'geffen') ?>
                    <span class="contact-form-resend-phone"></span>
                    <a href="" id="back_to_phone" class="back-to-phone"><?= __('שנה  ', 'geffen') ?></a>
                  </span>
                </div>

                <div class="add-review-form-cols">
                  <span class="label-top reg user-tel">
                    <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="phone_code"
                      aria-required="true" aria-invalid="false" value="" type="text" name="phone_code" required="">
                    <label for="phone_code"><?= __('*הקלד קוד מ-SMS ', 'geffen') ?></label>
                  </span>
                </div>

                <div class="contact-form-links">
                  <div><?= __('לא קיבלת קוד? ', 'geffen') ?> <a href="#"
                      id="resend_sms"><?= __('שלח שוב ', 'geffen') ?></a></div>

                  <?php $show = false; ?>
                  <?php if ($show) : ?>
                    <button type="button" class="contact-form-links-email">
                      <a href="#"><?= __('קוד באימייל ', 'geffen') ?></a>
                    </button>
                  <?php endif ?>
                </div>
              </div>

              <div class="contact-submit-row">
                <p class="contact-submit">
                  <button type="submit" class="btn btn__blue"><?= __('התחברות ', 'geffen') ?></button>
                </p>
              </div>
            </form>

            <form action="" id="login_by_email" style="display: none">
              <div class="contact-form-help-row">
                <div class="add-review-form-cols">
                  <span class="label-top reg user-mail">
                    <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="email_code"
                      aria-required="true" aria-invalid="false" value="" type="email" name="email_code" autocomplete
                      required="">
                    <label for="email_code"><?= __('קוד באימייל ', 'geffen') ?></label>
                  </span>
                </div>
              </div>

              <div class="contact-submit-row">
                <p class="contact-submit">
                  <button type="submit" id="login_by_email_submit"
                    class="btn btn__blue"><?= __('התחברות ', 'geffen') ?></button>
                </p>
              </div>
            </form>
          </div>

          <div id="tab_content_1" class="tab-content">
            <?php
              $args = array(
                'echo' => true,
                'redirect' => site_url($_SERVER['REQUEST_URI']),
                'form_id' => 'loginform',
                'label_username' => __('שם משתמש ', 'geffen'),
                'label_password' => __('*סיסמא', 'geffen'),
                'label_remember' => __('זכור אותי', 'geffen'),
                'label_log_in' => __('התחברות', 'geffen'),
                'id_username' => 'user_login',
                'id_password' => 'user_pass',
                'id_remember' => 'rememberme',
                'id_submit' => 'wp-submit',
                'remember' => false,
                'value_username' => NULL,
                'value_remember' => false
              );

              // wp_login_form($args);
              ?>
          </div>
        </div>
      </div>
    </div>

    <form id="popup_register_form" action="" method="POST" style="display: none;">
      <?php wp_nonce_field('registration', 'registration_nonce') ?>
      <input type="hidden" id="user-id" name="user-id">
      <input type="hidden" id="user-crm" name="user-crm">
      <div class="contact-page-form-help login-page-form">
        <h2 class="login-form-title"><?= __(' הרשמה', 'geffen') ?></h2>
        <div class="add-review-form">
          <div>
            <div class="contact-form-help-row login-form-fl">
              <div>
                <div class="add-review-form-cols">
                  <span class="label-top reg user">
                    <input class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="username" value=""
                      type="text" name="username" required>
                    <label for="username"><?= __('שם פרטי', 'geffen') ?></label>
                  </span>
                </div>
                <div class="add-review-form-cols">
                  <span class="label-top reg user">
                    <input class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="lastname" value=""
                      type="text" name="lastname" required>
                    <label for="lastname"><?= __('שם משפחה', 'geffen') ?></label>
                  </span>
                </div>
              </div>

              <div>
                <div class="add-review-form-cols">
                  <span class="label-top reg user-tel">
                    <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="user-tel" aria-required="true" aria-invalid="false" value="" type="text" name="phone" pattern="\d{10}" minlength="10" maxlength="10" title="<?= __('נא להזין 10 ספרות בדיוק', 'geffen') ?>" readonly required>
                    <label for="user-tel"><?= __('טלפון', 'geffen') ?></label>
                  </span>
                </div>
                <div class="add-review-form-cols">
                  <span class="label-top reg user-mail aft-66">
                    <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="user-mail"
                      aria-required="true" aria-invalid="false" value="" type="text" name="email" required>
                    <label for="user-mail"><?= __('כתובת מייל', 'geffen') ?></label>
                  </span>
                </div>
              </div>

            </div>
            <div class="contact-form-help-row">
              <div id="form-club-member">
              <label class="label-top team-email-checkbox hide-label"
                style="width: 95%;text-align: justify;font-size: 12px;display: flex;">
                <span class="wpcf7-form-control wpcf7-checkbox" style="margin-left: 5px;">
                  <span class="wpcf7-list-item first last">
                    <input type="checkbox" id="offers" name="offers">
                    <span class="wpcf7-list-item-label">checked</span>
                  </span>
                </span>

                <span
                  class="label-top-mr"><?= __('אני מסכימ/ה לקבל מחברת גפן מדיקל בע"מ דברי פרסומת, לרבות, הטבות, הצעות, מבצעים והנחות באמצעים טכנולוגים (לרבות, בדוא"ל ובסמס) בהתאם <a href="https://geffenmedical.co.il/privacy-policy" target="_blank" style="font-size: 12px;">למדיניות הפרטיות </a>של החברה.', 'geffen') ?></span>
              </label>
              </div>

              <label class="label-top team-email-checkbox hide-label"
                style="width: 95%;text-align: justify;font-size: 12px;display: flex;">
                <span class="wpcf7-form-control wpcf7-checkbox wpcf7-validates-as-required" style="margin-left: 5px;">
                  <span class="wpcf7-list-item first last">
                    <input type="checkbox" id="privacy" name="privacy" value="checked" required>
                    <span class="wpcf7-list-item-label">checked</span>
                  </span>
                </span>

                <span
                  class="label-top-mr"><?= __('אני מאשר שקראתי ואני מסכים  <a href="/privacy-policy/" target="_blank" style="font-size: 12px;">למדיניות הפרטיות</a>, <a href="/terms-of-use/" target="_blank" style="font-size: 12px;">תנאי השימוש והמכירה</a>  של החברה', 'geffen') ?></span>
              </label>
            </div>
          </div>
          <div class="contact-submit-row">
            <p class="contact-submit">
              <button type="submit" class="btn btn__blue wpcf7-submit"><?= __('שליחה', 'geffen') ?></button>
            </p>
          </div>
        </div>
      </div>
  </div>
  </form>
</div>
</div>
<?php else : ?>
  <?php
  $user_id = get_current_user_id();

  if ($user_id) :
    // Get user data
    $user_info = get_userdata($user_id);
    $has_email = !empty($user_info->user_email);

    // Get the 'geffen_phone' meta value for the user
    $geffen_phone = get_user_meta($user_id, 'geffen_phone', true);
    $has_privacy_policy = get_user_meta($user_id, 'geffen_privacy_policy', true) === '1';

    // Show form if user exists and (email is missing OR privacy policy is not confirmed)
    if ($user_info && (!$has_email || !$has_privacy_policy)) : ?>
      <div id="continue_registration_popup" class="popup-contactpage">
        <div class="popup-content-contactpage logip-page-formcontent registratet-popup-forms">
          <span class="close-contactpage" id="online_form_form">×</span>
          <div id="login_form_messages"></div>
          <?php
            $user_id = get_current_user_id();
            $user_crm = get_user_meta($user_id, 'user_crm_id', true);

            $first_name = '';
            $last_name = '';

            if ( is_user_logged_in() ) {
              $current_user = wp_get_current_user();
              $first_name = $current_user->user_firstname;
              $last_name = $current_user->user_lastname;
            }

            $is_name_empty = $first_name ? 'not-empty' : '';
            $is_lastname_empty = $last_name ? 'not-empty' : '';
          ?>

          <form id="popup_register_form" action="" method="POST">
            <?php wp_nonce_field('registration', 'registration_nonce') ?>
            <input type="hidden" id="user-id" name="user-id" value="<?= $user_id ?>">
            <input type="hidden" id="user-crm" name="user-crm" value="<?php echo esc_attr($user_crm); ?>">

            <div class="contact-page-form-help login-page-form">
              <h2 class="login-form-title"><?= __('הצטרפות למועדון ', 'geffen') ?></h2>
              <div class="add-review-form">
                <div class="contact-form-help-row">
                  <div class="add-review-form-cols">
                    <span class="label-top reg user">
                      <input class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required <?= $is_name_empty ?>" id="username" value="" type="text" name="username" required>
                      <label for="username"><?= __('שם פרטי', 'geffen') ?></label>
                    </span>
                  </div>
                  <div class="add-review-form-cols">
                    <span class="label-top reg user">
                      <input class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required <?= $is_lastname_empty ?>" id="lastname" value="" type="text" name="lastname" required>
                      <label for="lastname"><?= __('שם משפחה', 'geffen') ?></label>
                    </span>
                  </div>
                  <div class="add-review-form-cols">
                    <span class="label-top reg user-tel">
                      <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="user-tel" aria-required="true" aria-invalid="false" value="<?= esc_html($geffen_phone) ?>" type="text" name="phone" pattern="\d{10}" minlength="10" maxlength="10" title="<?= __('נא להזין 10 ספרות בדיוק', 'geffen') ?>" readonly required>
                      <label for="user-tel"><?= __('טלפון', 'geffen') ?></label>
                    </span>
                  </div>
                  <div class="add-review-form-cols">
                    <span class="label-top reg user-mail">
                      <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="user-mail"
                        aria-required="true" aria-invalid="false" value="" type="text" name="email" required>
                      <label for="user-mail"><?= __('כתובת מייל', 'geffen') ?></label>
                    </span>
                  </div>
                </div>
              </div>
              <?php $club_member = get_user_meta($user_id, 'geffen_subscription', true); ?>
              <?php if (!$club_member) : ?>
                <label class="label-top team-email-checkbox hide-label" style="width: 70%;">
                  <span class="wpcf7-form-control wpcf7-checkbox wpcf7-validates-as-required">
                    <span class="wpcf7-list-item first last">
                      <input type="checkbox" id="offers" name="offers">
                    </span>
                  </span>

                  <span
                    class="label-top-mr"><?= __('אני מסכים לקבל הצעות כאמור מהחברה במסרון (SMS), דוא"ל, חיוג אוטומטי ופקס. על-מנת להגן על הסביבה ולהימנע ממשלוח דברי דואר מודפסים, אנו מעוניינים לשלוח אליך הצעות אודות מוצרינו השונים באמצעים אלקטרוניים. כדי שנוכל לעשות זאת, נבקש את רשותך לשלוח אליך הצעות כאמור באמצעות מסרונים (SMS),דוא"ל (e-mail),חיוג אוטומטי ופקס.הנך רשאי להודיע לנו בכל עת על רצונך שלא להמשיך ולקבל הצעות כאמור או מסוג מסוים באחת מדרכי ההתקשרות המופיעות לעיל ואנו נפסיק את משלוחן לבקשתך.', 'geffen') ?></span>
                </label>
              <?php endif ?>

              <label class="label-top team-email-checkbox hide-label">
                <span class="wpcf7-form-control wpcf7-checkbox wpcf7-validates-as-required">
                  <span class="wpcf7-list-item first last">
                    <input type="checkbox" id="privacy" name="privacy" value="checked" required>
                    <span class="wpcf7-list-item-label">checked</span>
                  </span>
                </span>

                <span
                  class="label-top-mr"><?= __('אני מאשר שקראתי ואני מסכים  <a href="/privacy-policy/" target="_blank" style="font-size: 16px;">למדיניות הפרטיות</a>, <a href="/terms-of-use/" target="_blank" style="font-size: 16px;">תנאי השימוש והמכירה</a> של החברה', 'geffen') ?></span>
              </label>

              <div class="contact-submit-row">
                <p class="contact-submit">
                  <button type="submit" class="btn btn__blue wpcf7-submit"><?= __('שליחה', 'geffen') ?></button>
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>
    <?php endif ?>
  <?php endif ?>
<?php endif ?>

<script>
  const tel = document.getElementById('user-tel');
  if (tel) {
    tel.addEventListener('input', function (e) {
      this.value = this.value.replace(/\D/g, ''); // Removes non-numeric characters
    });
  }

  const code = document.getElementById('phone_code');
  if (code) {
    code.addEventListener('input', function (e) {
      this.value = this.value.replace(/\D/g, ''); // Removes non-numeric characters
    });
  }
</script>