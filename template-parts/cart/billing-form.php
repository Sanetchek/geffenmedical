<?php $cities = $args['cities']; ?>

<form id="billing_form" action="">
  <div class="billing-wrap address-wrap">
    <h2><?= __(' פרטי כתובת למשלוח   ', 'geffen') ?></h2>

    <?php
      $bil = geffen_get_billing_fields();

      $first_name = $bil['billing_first_name'] ? $bil['billing_first_name'] : $bil['first_name'];
    ?>

    <section class="personal-info address-section">
      <h3><?= __('פרטים אישיים ', 'geffen') ?></h3>

      <div class="address-section-fields">
        <span class="label-top reg user">
          <input class="" id="billing_first_name" value="<?= $first_name ?>" type="text" name="billing_first_name" required>
          <label for="billing_first_name">
            <span class="required-field-star">*</span>
            <?= __('שם פרטי', 'geffen') ?>
          </label>
        </span>

        <span class="label-top reg user">
          <input class="" id="billing_last_name" value="<?= $bil['billing_last_name'] ?>" type="text" name="billing_last_name" required>
          <label for="billing_last_name">
            <span class="required-field-star">*</span>
            <?= __('שם משפחה', 'geffen') ?>
          </label>
        </span>
      </div>

      <div class="address-section-fields">
        <span class="label-top reg user-tel">
          <input class="" id="billing_phone" value="<?= $bil['billing_phone'] ?>" type="text" name="billing_phone" required>
          <label for="billing_phone">
            <span class="required-field-star">*</span>
            <?= __('מספר טלפון', 'geffen') ?>
          </label>
        </span>

        <span class="label-top reg user-mail">
          <input class="" id="billing_email" value="<?= $bil['billing_email'] ?>" type="text" name="billing_email" required>
          <label for="billing_email">
            <span class="required-field-star">*</span>
            <?= __('דוא״ל', 'geffen') ?>
          </label>
        </span>
      </div>

      <div class="address-section-fields">
        <span class="label-top reg user-buildings">
          <input class="" id="billing_company" value="<?= $bil['billing_company'] ?>" type="text" name="billing_company">
          <label for="billing_company">
            <?= __('שם חברה/ארגון (אופציונאלי)', 'geffen') ?>
          </label>
        </span>
      </div>
    </section>

    <section class="address-info address-section">
      <h3><?= __('כתובת', 'geffen') ?></h3>

      <div class="address-section-fields">
        <span class="label-top reg user-property">
          <select class="" id="billing_address_type" value="<?= $bil['billing_address_type'] ?>" type="text" name="billing_address_type">
            <option value=""><?= __('סוג כתובת', 'geffen') ?></option>
            <?php
              $user_type = $bil['billing_address_type'];
              $type = [__('דירה', 'geffen'), __('משרד', 'geffen')];
            ?>

            <?php foreach ($type as $item) : ?>
              <?php if ($item == $user_type) : ?>
                <option value="<?= $item ?>" selected><?= $item ?></option>
              <?php else : ?>
                <option value="<?= $item ?>"><?= $item ?></option>
              <?php endif ?>
            <?php endforeach ?>
          </select>
        </span>

        <span class="label-top reg user-mail-box">
          <input class="" id="billing_postal" value="<?= $bil['billing_postcode'] ?>" type="text" name="billing_postal" >
          <label for="billing_postal">
            <?= __('מיקוד', 'geffen') ?>
          </label>
        </span>
      </div>

      <div class="address-section-fields">
        <span class="label-top reg user-pointer">
          <span id="billing_cities" class="billing-cities">
            <span class="billing-cities-name"><?= $bil['billing_city'] ?></span>

            <span class="billing-cities-list">
              <input type="text" class="billing-cities-search">
              <?php foreach ($cities as $city) : ?>
                <?php
                  // Retrieve 'delivery_prohibited' meta field value for the current city
                  $delivery_prohibited_value = get_post_meta($city->ID, '_delivery_prohibited', true);
                  $prohibited = $delivery_prohibited_value == 'on' ? 'prohibited' : '';
                  $message = $delivery_prohibited_value == 'on' ?
                    '<span class="prohibited-message">' . __('לצערנו, היישוב שנבחר אינו באזור אליו מבוצעים משלוחים עד הבית. אנו ממליצים לבחור בעמדת DONE קרובה לבחירתך', 'geffen') . '</span>' :
                    '';
                  $icon = $delivery_prohibited_value == 'on' ?
                    '<svg class="icon icon-info" version="1.1" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 32 32">
                      <title>info</title>
                      <path d="M14 9.5c0-0.825 0.675-1.5 1.5-1.5h1c0.825 0 1.5 0.675 1.5 1.5v1c0 0.825-0.675 1.5-1.5 1.5h-1c-0.825 0-1.5-0.675-1.5-1.5v-1z"></path>
                      <path d="M20 24h-8v-2h2v-6h-2v-2h6v8h2z"></path>
                      <path d="M16 0c-8.837 0-16 7.163-16 16s7.163 16 16 16 16-7.163 16-16-7.163-16-16-16zM16 29c-7.18 0-13-5.82-13-13s5.82-13 13-13 13 5.82 13 13-5.82 13-13 13z"></path>
                    </svg>' :
                    '';
                ?>
                <span class="billing-cities-item <?= $prohibited ?>" data-city="<?= $city->post_title ?>"><?= $city->post_title ?> <?= $message ?> <?= $icon ?></span>
              <?php endforeach ?>
            </span>
          </span>

          <input class="city" id="billing_city" value="<?= $bil['billing_city'] ?>" type="hidden" name="billing_city" required>
          <label for="billing_city">
            <span class="required-field-star">*</span>
            <?= __('עיר', 'geffen') ?>
          </label>
        </span>

        <span class="label-top reg user-sign">
          <input class="" id="billing_street" value="<?= $bil['billing_address_1'] ?>" type="text" name="billing_street" required>
          <label for="billing_street">
            <span class="required-field-star">*</span>
            <?= __('רחוב', 'geffen') ?>
          </label>
        </span>
      </div>

      <div class="address-section-fields">
        <span class="label-top reg user-house">
          <input class="" id="billing_house_number" value="<?= $bil['billing_house_number'] ?>" type="text" name="billing_house_number" required>
          <label for="billing_house_number">
            <span class="required-field-star">*</span>
            <?= __('מספר בית', 'geffen') ?>
          </label>
        </span>

        <span class="label-top reg user-apartment">
          <input class="" id="billing_apartment" value="<?= $bil['billing_apartment_number'] ?>" type="text" name="billing_apartment" required>
          <label for="billing_apartment">
            <span class="required-field-star">*</span>
            <?= __('מספר דירה', 'geffen') ?>
          </label>
        </span>
      </div>
    </section>
  </div>

  <button id="billing_form_submit" class="billing__btn" >
    <?= __('שמירה ', 'geffen') ?>
    <div class="checkout-ring">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </button>
</form>
