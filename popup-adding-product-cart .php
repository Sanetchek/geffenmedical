<?php

/**
 * Template Name: Popup-adding-product-cart
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geffen
 */

get_header();
?>
<style>
  .popup-adding-product-cart .popup-content-contactpage {
    background: transparent;
    padding: 0;
    border-radius: 15px;
  }

  .popup-adding-product-cart .cart_item {
    grid-template-columns: 125px repeat(3, 1fr);
  }

  .popup-adding-product-cart .product-thumbnail img {
    border-radius: 5px;
    width: 79px;
    height: 79px;
  }

  .popup-adding-product-cart .popup-content-product {
    background: rgba(231, 240, 247, 0.60);
    padding: 4.5rem 0.5rem 3rem;
    border-radius: 15px;
  }

  .popup-adding-product-cart .product-name {
    padding-left: 0;
  }

  .popup-adding-product-cart .product-name a {
    padding-left: 0;
    color: #0A3B64 !important;
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
  }

  .popup-adding-product-cart .product-price-wrap::after,
  .popup-adding-product-cart .product-price-wrap::before {
    display: none;
  }

  .popup-adding-product-cart .product-quantity .change-quantity .qty {
    background: transparent;
  }

  .adding_product_cart_popup_total_paymentblock {
    background: #0A3B64;
    border-radius: 15px;
    margin-top: 8px;
    display: flex;
    padding: 11px 38px;
  }

  .adding_product_cart_popup_total_payment_text,
  .adding_product_cart_popup_total {
    color: #FFF;
    text-align: right;
    font-family: Assistant;
    font-size: 23px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
  }

  .adding_product_cart_popup_total_payment_text {
    display: flex;
    align-items: center;
    width: 55%;

  }

  .adding_product_cart_popup_total_payment_text p,
  .adding_product_cart_popup_total p {
    margin: 0 10px 0 !important;
  }

  .popup-adding-product-cart .close-contactpage {
    left: 40px;
    right: auto;
  }

  .removed-product-cart-content {
    display: flex;
  }

  .removed-product-cart-title {
    color: #0A3B64;
    text-align: center;
    font-family: Assistant;
    font-size: 18px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
  }

  .removed-product-cart-subtitle {
    color: #0A3B64;
    text-align: center;
    font-family: Assistant;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
  }

  a.removed-product-cart-cancellation {
    border-radius: 8px;
    border: 1px solid #0A3B64;
    background: #0A3B64;
    color: #fff !important;
    text-align: center;
    font-family: Assistant;
    font-size: 14px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    padding: 11px 45px;
  }

  a.removed-product-cart-delet {
    border-radius: 8px;
    border: 1px solid #0A3B64;
    background: #FFF;
    padding: 11px 45px;
    color: #0a3b64 !important;
    text-align: center;
    font-family: Assistant;
    font-size: 14px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
  }

  .removed-product-cart-button {
    display: flex;
    justify-content: space-around;
    margin-top: 35px;
  }

  .product-in-cart-content .product-title {
    color: #0A3B64;
    text-align: right;
    font-family: Assistant;
    font-size: 20px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
  }
</style>
<div id="adding_product_cart_popup" class="popup-contactpage popup-adding-product-cart">
  <div class="popup-content-contactpage" style="display: block;">
    <div class="popup-content-product">
      <span class="close-contactpage" id="">×</span>

      <form id="popup_adding_product_cart" action="" method="POST" style="">
        <input type="hidden" id="registration_nonce" name="registration_nonce" value="81bd08c351"><input type="hidden"
          name="_wp_http_referer" value="/contact/">
        <form class="woocommerce-cart-form" action="/cart/" method="post">

          <section class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
            <div>

              <div class="woocommerce-cart-form__cart-item cart_item">

                <div class="product-thumbnail">
                  <a href="/product/book-carbs/">
                    <img src="/wp-content/uploads/2023/09/1-4.svg"
                      class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""></a> </div>

                <div class="product-name" data-title="מוצר">
                  <a href="/product/book-carbs/">מקלונים לבדיקת בטא-קטו...</a>
                  <p>פריט נוסף לעגלה</p>
                </div>

                <div class="product-price-wrap">
                  <div class="product-subtotal" data-title="מחיר ">
                    <span class="woocommerce-Price-amount amount"><bdi>60.00&nbsp;<span
                          class="woocommerce-Price-currencySymbol">₪</span></bdi></span> </div>

                  <div class="product-price" data-title="מחיר">
                    <span class="woocommerce-Price-amount amount"><bdi>30.00&nbsp;<span
                          class="woocommerce-Price-currencySymbol">₪</span></bdi></span> <span> ליחידה </span>
                  </div>
                </div>

                <div class="product-quantity" data-title="כמות">
                  <div class="change-quantity"><button type="button" class="quantity__plus">+</button>
                    <div class="quantity">
                      <label class="screen-reader-text" for="quantity_657e0f26db7a8">כמות של &nbsp;"סופרים פחמימות
                        בישראל
                        - חופש בדרך לאיזון הסוכרת"</label>
                      <input type="number" id="quantity_657e0f26db7a8" class="input-text qty text"
                        name="cart[7504adad8bb96320eb3afdd4df6e1f60][qty]" value="2" aria-label="כמות המוצר" size="4"
                        min="0" max="" step="1" placeholder="" inputmode="numeric" autocomplete="off">
                    </div>
                    <button type="button" class="quantity__minus">-</button>
                  </div>
                </div>
                <div>
                  <div class="actions">

                    <button type="submit" class="button hidden" name="update_cart" value="לעדכן סל קניות"
                      disabled="">לעדכן
                      סל קניות</button>


                    <input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce"
                      value="a1b56c2dd9"><input type="hidden" name="_wp_http_referer" value="/cart/"> </div>
                </div>

              </div>
          </section>
        </form>
    </div>
    <div class="adding_product_cart_popup_total_paymentblock">
      <div class="adding_product_cart_popup_total_payment_text">
        <p>לתשלום</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="12" viewBox="0 0 17 12" fill="none">
          <path d="M5.65495 11L1.2442 6.58926C0.918767 6.26382 0.918767 5.73618 1.2442 5.41074L5.65495 1M1 6H16"
            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
      <div class="adding_product_cart_popup_total">
        <p>290 ₪ </p>
      </div>
    </div>
  </div>
</div>

<!--удаление продукта из корзины-->
<div class="popup-content-contactpage removed-product-cart" style="display: block;">
  <span class="close-contactpage" id="">×</span>
  <div class="removed-product-cart-content">
    <div class="product-thumbnail">
      <a href="/product/book-carbs/">
        <img src="/wp-content/uploads/2023/09/1-4.svg"
          class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""></a>
    </div>

    <div class="removed-product-cart-text">
      <p class="removed-product-cart-title">מד סוכר פריסטייל אופטיום ניאו הוסר מסל הקניות</p>
      <p class="removed-product-cart-subtitle">האם את/ה בטוח/ה שברצונך להסיר את המוצר?</p>
      <div class="removed-product-cart-button">
        <a class="removed-product-cart-delet" href="">ביטול</a>
        <a class="removed-product-cart-cancellation" href="">הסרה</a>
      </div>
    </div>
  </div>
</div>

<!--добавление продукта из корзины-->
<div class="popup-content-contactpage popup-product-in-cart" style="display: block;">
  <span class="close-contactpage" id="">×</span>
  <div class="product-in-cart-content">
    <div class="row">
      <div class="col-md-6">

        <div class="product-info">
          <h1 class="product-title">סופרים פחמימות בישראל – חופש בדרך לאיזון הסוכרת</h1>
          <p class="product-info-subtitle">ספר ספירת פחמימות</p>
        </div>
        <div class="product-info-related">
          <p class="product-info-subtitle">לרכישת מקלונים תואמים לבדיקת סוכר בדם
            פריסטייל אופטיום
            <a href="">לחץ כאן</a>
          </p>
          <p class="product-info-subtitle">לרכישת מקלונים תואמים לבדיקת סוכר בדם
            פריסטייל אופטיום
            <a href="">לחץ כאן</a>
          </p>
          <p class="product-info-subtitle">לרכישת ספר הדיאטה הקטוגנית
            <a href="">לחץ כאן</a>
          </p>
        </div>

        <div class="product-info--row">
          <div class="tastes-content">
            <div class="product-special-price">
              <div class="product-special-price-sale">
                <p class="product-special-price-new"><span class="woocommerce-Price-amount amount"><bdi>30.00&nbsp;<span
                        class="woocommerce-Price-currencySymbol">₪</span></bdi></span></p>
                <p class="product-special-price-title">מחיר מיוחד </p>
              </div>

              <div class="product-special-price-regular">
                <p class="product-special-price-old"><span class="woocommerce-Price-amount amount"><bdi>70.00&nbsp;<span
                        class="woocommerce-Price-currencySymbol">₪</span></bdi></span></p>
                <p class="product-special-price-old-title">מחיר רגיל </p>
              </div>
            </div>
            <div class="product-info-package-tastes-sum">
              <form class="cart" action="/product/book-carbs/" method="post"
                enctype="multipart/form-data">
                <div class="rightpress_clear_both"></div>
                <dl class="rightpress_product_price_live_update" style="display: none; opacity: 1;">
                  <dt><span class="rightpress_product_price_live_update_label"></span></dt>
                  <dd><span class="price rightpress_product_price_live_update_price"></span></dd>
                </dl>
                <div class="change-quantity"><button type="button" class="quantity__plus">+</button>
                  <div class="quantity">
                    <label class="screen-reader-text" for="quantity_657e26ea56750">כמות של &nbsp;"סופרים פחמימות בישראל
                      - חופש בדרך לאיזון הסוכרת"</label>
                    <input type="number" id="quantity_657e26ea56750" class="input-text qty text" name="quantity"
                      value="1" aria-label="כמות המוצר" size="4" min="1" max="" step="1" placeholder=""
                      inputmode="numeric" autocomplete="off">
                  </div>
                  <button type="button" class="quantity__minus">-</button>
                </div>
                <button type="submit" name="add-to-cart" value="881" class="product-add-cart-button">
                  הוסף לסל <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="5.5" cy="16.25" r="2.25" stroke="white" stroke-width="2"></circle>
                    <circle cx="16.75" cy="16.25" r="2.25" stroke="white" stroke-width="2"></circle>
                    <path
                      d="M11.3636 2.77273H15.1818V2.77273C17.2905 2.77273 19 4.48219 19 6.59091V7.5C19 9.70914 17.2091 11.5 15 11.5H7.72727C5.51813 11.5 3.72727 9.70914 3.72727 7.5V4.94347C3.72727 3.58957 3.0424 2.32756 1.90723 1.5897L1 1"
                      stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </button>

              </form>


            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="product-info-img">

          <section class="single-product-image">
            <div class="gallery-images slick-initialized slick-slider slick-vertical">
              <div class="slick-list draggable" style="height: 340px;">
                <div class="slick-track" style="opacity: 1; height: 2380px; transform: translate3d(0px, -340px, 0px);">
                  <div class="gallery-item slick-slide slick-cloned" data-slick-index="-1" id="" aria-hidden="true"
                    style="width: 300px;" tabindex="-1"><img
                      src="/wp-content/uploads/2023/09/3-4.svg" alt=""></div>
                  <div class="gallery-item slick-slide slick-current slick-active" data-slick-index="0"
                    aria-hidden="false" style="width: 300px;" tabindex="0"><img
                      src="/wp-content/uploads/2023/09/1-4.svg" alt=""></div>
                  <div class="gallery-item slick-slide" data-slick-index="1" aria-hidden="true" style="width: 300px;"
                    tabindex="-1"><img src="/wp-content/uploads/2023/09/2-4.svg" alt="">
                  </div>
                  <div class="gallery-item slick-slide" data-slick-index="2" aria-hidden="true" style="width: 300px;"
                    tabindex="-1"><img src="/wp-content/uploads/2023/09/3-4.svg" alt="">
                  </div>
                  <div class="gallery-item slick-slide slick-cloned" data-slick-index="3" id="" aria-hidden="true"
                    style="width: 300px;" tabindex="-1"><img
                      src="/wp-content/uploads/2023/09/1-4.svg" alt=""></div>
                  <div class="gallery-item slick-slide slick-cloned" data-slick-index="4" id="" aria-hidden="true"
                    style="width: 300px;" tabindex="-1"><img
                      src="/wp-content/uploads/2023/09/2-4.svg" alt=""></div>
                  <div class="gallery-item slick-slide slick-cloned" data-slick-index="5" id="" aria-hidden="true"
                    style="width: 300px;" tabindex="-1"><img
                      src="/wp-content/uploads/2023/09/3-4.svg" alt=""></div>
                </div>
              </div>
            </div>
          </section>
          <div class="product-info-socials">
            <div class="product-info-socials-item share">
              <span class="post-review__like">
                <span class="post-review__like-icon">
                  <svg width="45" height="45" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M26 4L44 22L26 39V28C12 28 6 43 6 43C6 26 11 15 26 15V4Z" fill="none" stroke="#0A3B64"
                      stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg> </span>
                <div class="social_share">
                  <div class="article-social">
                    <a class="social_share_link social_share_whatsapp"
                      href="https://api.whatsapp.com/send?text=&nbsp;“סופרים פחמימות בישראל – חופש בדרך לאיזון הסוכרת”&amp;url=/product/book-carbs/"
                      title="Whatsapp" rel="nofollow noopener" target="_blank">
                      <span class="social_share_svg"><img
                          src="/wp-content/themes/geffenmedical/assets/img/icons/s-whatsapp.svg"></span>
                    </a>
                    <a class="social_share_link social_share_facebook"
                      href="https://www.facebook.com/sharer/sharer.php?u=/product/book-carbs/"
                      title="Facebook" rel="nofollow noopener" target="_blank">
                      <span class="social_share_svg"><img
                          src="/wp-content/themes/geffenmedical/assets/img/icons/s-facebook.svg"></span>
                    </a>
                    <a class="social_share_link social_share_gmail"
                      href="mailto:/product/book-carbs/?subject=&nbsp;“סופרים פחמימות בישראל – חופש בדרך לאיזון הסוכרת”"
                      title="Mail" rel="nofollow noopener" target="_blank">
                      <span class="social_share_svg"><img
                          src="/wp-content/themes/geffenmedical/assets/img/icons/s-mail.svg"></span>
                    </a>
                  </div>
                </div>
              </span>
            </div>
            <div class="product-info-socials-item likes">
              <span class="post-review__like" data-post-id="881" data-nonce="34277afcb9">
                <span class="post-review__like-icon"><svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M4.53553 0.5C2.30677 0.5 0.5 2.30677 0.5 4.53553C0.5 5.60582 0.92517 6.63228 1.68198 7.38909L7.64645 13.3536C7.84171 13.5488 8.15829 13.5488 8.35355 13.3536L14.318 7.38909C15.0748 6.63228 15.5 5.60582 15.5 4.53553C15.5 2.30677 13.6932 0.5 11.4645 0.5C10.3942 0.5 9.36772 0.925171 8.61091 1.68198L8 2.29289L7.38909 1.68198C6.63228 0.925171 5.60582 0.5 4.53553 0.5Z"
                      fill="#FF784F"></path>
                  </svg></span>
              </span> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>