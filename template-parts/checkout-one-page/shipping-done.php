<div id="shipping_details_flat_rate5" class="shipping__details">
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