<div id="site_rating" class="site-rating">
  <div class="rating-open">
    <span class="rating-open-arrow">&#x2039;</span>
    <div class="rating-open-text"><?= __('חוות דעת', 'geffen') ?></div>
  </div>

  <div class="rating-content">
    <h3><?= __('מהי חוויתך באתר החדש שלנו? ', 'geffen') ?></h3>
    <form id="site_rating_form" class="site-rating-form" active="/">
      <div class="rating-star">
        <div class="rating-star-item">
          <input type="radio" id="five-star" name="rating" class="rating-radio" value="5" required>
          <label for="five-star">😁</label>
        </div>

        <div class="rating-star-item">
          <input type="radio" id="four-star" name="rating" class="rating-radio" value="4">
          <label for="four-star">😀</label>
        </div>

        <div class="rating-star-item">
          <input type="radio" id="three-star" name="rating" class="rating-radio" value="3">
          <label for="three-star">😐</label>
        </div>

        <div class="rating-star-item">
          <input type="radio" id="two-star" name="rating" class="rating-radio" value="2">
          <label for="two-star">😕</label>
        </div>

        <div class="rating-star-item">
          <input type="radio" id="one-star" name="rating" class="rating-radio" value="1">
          <label for="one-star">😞</label>
        </div>
      </div>

      <input type="text" name="user_name" id="rating_user_name" placeholder="שם:" required>

      <input type="tel" name="user_phone" id="rating_user_phone" placeholder="טלפון:" required pattern="05[0-9]{8}" title="אנא הזן מספר תקין">

      <label>
        <input type="checkbox" name="service" id="rating_service">
        <span>האם מעוניין ביצירת קשר של נציג שירות?</span>
      </label>

      <textarea name="message" id="rating_message" cols="30" rows="6"></textarea>

      <button type="submit" id="site_rating_submit" class="site-rating-submit btn btn__blue"><?= __('שליחה ', 'geffen') ?></button>
    </form>
  </div>
</div>