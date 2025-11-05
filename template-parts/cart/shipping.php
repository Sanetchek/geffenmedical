<?php if (is_user_logged_in()) : ?>
  <div class="cart__wrap">
    <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()): ?>

    <?php do_action('woocommerce_cart_totals_before_shipping'); ?>

    <?php wc_cart_totals_shipping_html(); ?>

    <?php do_action('woocommerce_cart_totals_after_shipping'); ?>

    <?php endif; ?>
  </div>

  <div class="cart__wrap">


    <div id="shipping_details_1" class="shipping__details">
      <h2 class="cart__title"><?php echo __('איסוף עצמי ממרכז רפואי DMC בתל אביב', 'geffen') ?></h2>
      <p>
      <?= __('זמן האספקה ממרכז רפואי DMC תל אביב – 6 ימי עסקים.') ?>
      </p>
      <p><?= __('כתובת המרכז: הרצל רוזנבלום 6 תל אביב, במתחם סי אנד סאן.') ?></p>
      <p>
        <?= __('מסרון יישלח למספר הטלפון הנייד המעודכן בהזמנה כאשר ההזמנה תהיה מוכנה לאיסוף.', 'geffen') ?>
      </p>
      <p><?= __('זמני איסוף: ימים א-ה בין השעות 09:00 ועד 16:30', 'geffen') ?></p>
      <p><?= __("ימי ו', ערבי חג וימי חול המועד: סגור", 'geffen') ?></p>
    </div>

    <div id="shipping_details_2" class="shipping__details">
      <h2 class="cart__title"><?php echo __('איסוף עצמי מודיעין', 'geffen') ?></h2>
      <p><?= __('זמן האספקה ממרכז הלוגיסטיקה של גפן מדיקל – 2 ימי עסקים.') ?></p>
      <p><?= __('כתובת המרכז: צלע ההר 1 מודיעין.') ?></p>
      <p><?= __('מסרון יישלח למספר הטלפון הנייד המעודכן בהזמנה כאשר ההזמנה תהיה מוכנה לאיסוף.', 'geffen') ?></p>
      <p><?= __('זמני איסוף: ימים א-ה בין השעות 08:30 ועד 15:30.', 'geffen') ?></p>
      <p><?= __("ימי ו', ערבי חג וימי חול המועד: סגור", 'geffen') ?></p>
    </div>

    <div id="shipping_details_3" class="shipping__details">
      <h2 class="cart__title"><?php echo __('שליח עד הבית', 'geffen') ?></h2>
      <div class="shipping__details_address shipping__details_billing">
        <div class="shipping__details_underline"><?= __('כתובת למשלוח: ', 'geffen') ?></div>

        <div class="shipping__details_address-wrap">
          <div class="shipping__details_address-area">
            <?php
              $shipping = geffen_get_shipping_fields();
              $first_name = isset($shipping['shipping_first_name']) ? $shipping['shipping_first_name'] : '';
              $last_name = isset($shipping['shipping_last_name']) ? $shipping['shipping_last_name'] : '';
              $city = isset($shipping['shipping_city']) ? $shipping['shipping_city'] : '';
              $address = isset($shipping['shipping_address_1']) ? $shipping['shipping_address_1'] : '';
            ?>

            <?php if ($shipping) : ?>
            <span class="billing-name"><?= $first_name . ' ' . $last_name ?></span><br /><br />
            <span class="billing-city"><?= $city ?></span><br />
            <span class="billing-address"><?= $address ?></span>
            <?php endif ?>
          </div>

          <div class="shipping__details_address-edit">
            <button type="button" id="show_shipping_edit" class="address__edit_btn">
              <span><?= __('עריכת פרטים ', 'geffen') ?></span>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M17 10V17C17 18.1046 16.1046 19 15 19H3C1.89543 19 1 18.1046 1 17V5C1 3.89543 1.89543 3 3 3H9H10"
                  stroke="#0A3B64" stroke-width="2" stroke-linecap="round" />
                <path
                  d="M14.4202 2.89427L6.94114 10.3733L6.40029 13.7147L9.76957 13.2017L17.2288 5.74247M14.4202 2.89427L14.8995 2.41496C15.6805 1.63391 16.9469 1.63391 17.7279 2.41496V2.41496C18.509 3.19601 18.509 4.46234 17.7279 5.24338L17.2288 5.74247M14.4202 2.89427L17.2288 5.74247"
                  stroke="#0A3B64" stroke-width="2" stroke-linejoin="round" />
              </svg>
              </span>
          </div>
        </div>
      </div>

      <label class="shipping__confirm_label">
        <input type="checkbox" name="shipping_confirm" id="shipping_confirm">
        <span><?= __('האם תרצו לשלוח חשבונית לכתובת אחרת? ', 'geffen') ?></span>
      </label>

      <div class="shipping__details_address shipping__details_shipping">
        <div class="shipping__details_underline"><?= __('כתובת למשלוח: ', 'geffen') ?></div>

        <div class="shipping__details_address-wrap">
          <div class="shipping__details_address-area">
            <?php
              $ship = geffen_get_shipping_fields();
              $first_name = isset($ship['shipping_first_name']) ? $ship['shipping_first_name'] : '';
              $last_name = isset($ship['shipping_last_name']) ? $ship['shipping_last_name'] : '';
              $city = isset($ship['shipping_city']) ? $ship['shipping_city'] : '';
              $address = isset($ship['shipping_address_1']) ? $ship['shipping_address_1'] : '';
            ?>

            <?php if ($ship) : ?>
            <span class="shipping-name"><?= $first_name . ' ' . $last_name ?></span><br /><br />
            <span class="shipping-city"><?= $city ?></span><br />
            <span class="shipping-address"><?= $address ?></span>
            <?php endif ?>
          </div>

          <div class="shipping__details_address-edit">
            <button type="button" id="show_shipping_edit" class="address__edit_btn">
              <span><?= __('עריכת פרטים ', 'geffen') ?></span>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M17 10V17C17 18.1046 16.1046 19 15 19H3C1.89543 19 1 18.1046 1 17V5C1 3.89543 1.89543 3 3 3H9H10"
                  stroke="#0A3B64" stroke-width="2" stroke-linecap="round" />
                <path
                  d="M14.4202 2.89427L6.94114 10.3733L6.40029 13.7147L9.76957 13.2017L17.2288 5.74247M14.4202 2.89427L14.8995 2.41496C15.6805 1.63391 16.9469 1.63391 17.7279 2.41496V2.41496C18.509 3.19601 18.509 4.46234 17.7279 5.24338L17.2288 5.74247M14.4202 2.89427L17.2288 5.74247"
                  stroke="#0A3B64" stroke-width="2" stroke-linejoin="round" />
              </svg>
              </span>
          </div>
        </div>
      </div>

      <?php
        $args = array(
          'post_type' => 'city',
          'numberposts' => -1,  // Retrieve all posts of the specified post type
        );

        $cities = get_posts($args);
      ?>

      <div id="shipping_form_popup">
        <div class="popup-content-contactpage shipping-form-popup">
          <span class="close-contactpage" id="online_form_form">×</span>
          <?php get_template_part('template-parts/cart/shipping', 'form', ['cities' => $cities]); ?>
        </div>
      </div>
    </div>

    <div id="shipping_details_4" class="shipping__details">
      <h2 class="cart__title"><?php echo __('עמדת DONE', 'geffen') ?></h2>

      <div class="shipping__details_done">
        <span><?= __('לבחירת עמדת ', 'geffen') ?></span>
        <img src="<?= assets('img/done.png') ?>" alt="done">
      </div>

      <div class="shipping__done">
        <label class="shipping__done_label">
          <select name="done_area" id="shipping_done_area" class="shipping__done_select">
            <option value=""><?= __('בחר אזור ', 'geffen') ?></option>
          </select>
        </label>

        <label class="shipping__done_label">
          <select name="done_city" id="shipping_done_city" class="shipping__done_select" disabled>
            <option value=""><?= __('בחר עיר ', 'geffen') ?></option>
          </select>
        </label>

        <label class="shipping__done_label">
          <select name="done_position" id="shipping_done_position" class="shipping__done_select" disabled>
            <option value=""><?= __('בחר עמדה ', 'geffen') ?></option>
          </select>
          <input type="hidden" id="done_station_number" name="done_station_number" value="">
        </label>
      </div>
    </div>
  </div>
<?php endif ?>