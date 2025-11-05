<?php
/**
 * Template Name: Phone check page
 */

get_header(); ?>

<style>
  .phone-check-container {
    display: flex;
    height: 100vh;
    align-items: center;
    justify-content: center;
  }

  .form-wrap {
    background-image: url('/wp-content/uploads/2023/12/Geffen-Medical-Branding_02ENG-dragged-2-3.png');
    background-repeat: no-repeat;
    background-position-y: 80%;
    background-size: contain;
    padding-right: 34px;
    max-width: 800px;
    width: 100%;
    min-height: 465px;
    padding: 4.5rem 5rem 3rem;
    border-radius: 30px;
    box-shadow: 15.44286px 7.72143px 61.77143px 0px rgba(136, 165, 191, 0.38), -15.44286px -7.72143px 61.77143px 0px rgba(255, 255, 255, 0.70);
    max-height: 90vh;
  }
  .check-input {
    margin: 40px 0 88px 0;
  }

  .message {
    font-size: 20px;
    color: green;
    font-weight: 700;
  }
</style>

<div class="phone-check-container">

  <div class="form-wrap">
    <form id="check_phone">
      <span class="label-top reg user-tel check-input">
        <input size="40" id="user-tel" aria-required="true" aria-invalid="false" value="" type="text" name="phone" pattern="\d{10}" minlength="10" maxlength="10" title="<?= __('נא להזין 10 ספרות בדיוק', 'geffen') ?>" required>
        <label for="user-tel"><?= __('*מספר טלפון ', 'geffen') ?></label>
      </span>
      <p class="message"></p>
      <button type="submit" id="phone_check_submit" class="btn btn__blue">
        <span><?= __('התחברות ', 'geffen') ?></span>
        <div class="checkout-ring">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </button>
    </form>

    <form id="confirm_code" style="display: none;">
      <span class="label-top reg user-tel check-input">
        <input size="40" id="user-code" aria-required="true" aria-invalid="false" value="" type="text" name="code" required>
        <label for="user-tel"><?= __('*הקלד קוד מ-SMS ', 'geffen') ?></label>
      </span>
      <input type="hidden" name="phone" id="confirm_code_phone">
      <p class="message"></p>
      <button type="submit" id="confirm_code_submit" class="btn btn__blue">
        <span><?= __('התחברות ', 'geffen') ?></span>
        <div class="checkout-ring">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </button>
    </form>
  </div>

</div>

<script>
  jQuery('#check_phone').on('submit', function(e) {
    e.preventDefault();
    const form = jQuery(this);
    const btn = jQuery('#phone_check_submit');
    const message = jQuery(form).find('.message');
    const ring = jQuery(form).find('.checkout-ring');
    let data = {
      action: 'geffen_check_phone'
    }

    // Serialize form data and concatenate it with the existing data object
    const formData = form.serialize();
    data.formData = formData;

    jQuery.ajax({
      type: 'POST',
      url: "<?php echo admin_url('admin-ajax.php'); ?>",
      data,
      beforeSend: function () {
        // Show Preloader
        jQuery(ring).fadeIn()
        jQuery(btn).prop('disabled', true)
      },
      success: function (response) {
        const data = JSON.parse(response)
        if (data.success) {
          jQuery('#confirm_code_phone').val(data.phone)
          jQuery(form).hide();
          jQuery("#confirm_code").show();
        } else {
          jQuery(message).css('color', 'red').text(data.message);
          jQuery(btn).prop('disabled', false)
        }

        setTimeout(() => {
          jQuery(message).text(' ')
        }, 5000);

        // // Hide Preloader
        jQuery(ring).fadeOut()
      },
    })
  })


  jQuery('#confirm_code').on('submit', function(e) {
    e.preventDefault();
    const form = jQuery(this);
    const btn = jQuery('#confirm_code_submit');
    const message = jQuery(form).find('.message');
    const ring = jQuery(form).find('.checkout-ring');
    let data = {
      action: 'geffen_confirm_phone_code'
    }

    // Serialize form data and concatenate it with the existing data object
    const formData = form.serialize();
    data.formData = formData;

    jQuery.ajax({
      type: 'POST',
      url: "<?php echo admin_url('admin-ajax.php'); ?>",
      data,
      beforeSend: function () {
        // Show Preloader
        jQuery(ring).fadeIn()
        jQuery(btn).prop('disabled', true)
      },
      success: function (response) {
        const data = JSON.parse(response)
        if (data.success) {
          // Redirect to the desired URL after a brief delay (optional)
          window.location.href = "https://www.surveymonkey.com/r/BKF22Z9";
        } else {
          jQuery(message).css('color', 'red').text(data.message);
          jQuery(btn).prop('disabled', false)
        }

        setTimeout(() => {
          jQuery(message).text(' ')
        }, 5000);

        // // Hide Preloader
        jQuery(ring).fadeOut()
      },
    })
  })
</script>

<?php get_footer(); ?>