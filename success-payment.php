<?php

/**
 * Template Name: Success-payment
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
?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@200;300&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap');

  body {
    margin: 0;
  }

  .success-payment {
    font-family: 'Assistant';
  }

  .conteiner-968 {
    max-width: 968px;
    margin: 0 auto;
    width: 100%;
  }

  .page-title-wrap {
    display: flex;
    justify-content: end;
    flex-wrap: wrap;
    align-items: baseline;
  }

  .page-menu-title {
    color: #0A3B64;
    font-size: 30px;
    font-style: normal;
    font-weight: 800;
    line-height: normal;
    margin-bottom: 50px;
    text-align: end;
  }

  .success-payment-thanks p {
    color: #000;
    text-align: center;
    font-family: Assistant;
    font-size: 26px;
    font-style: normal;
    font-weight: 400;
    line-height: 42px;
    margin-top: 50px !important;
    margin-bottom: 33px !important;
  }

  .success-payment-thanks,
  .success-payment-order-info .product-quantity p,
  .success-payment-order-additionalinfo p {
    text-align: center !important;
  }

  .success-payment-order-additionalinfo p {
    color: #0A3B64;
    font-family: Assistant;
    font-size: 23.045px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
  }

  .success-payment-order-additionalinfo p>span {
    color: #000;
  }

  .success-payment-thanks p>span {
    color: #458DB4;
    font-weight: 600;
  }

  .success-payment-order-info .page-title-wrap {
    border-top: 1px solid #d3d3d3;
    padding-top: 45px;
  }

  .success-payment-thanks a,
  .success-payment-thanks a:hover,
  .success-payment-thanks a.btn:active {
    color: #FFF !important;
    font-size: 26px;
    font-style: normal;
    font-weight: 400;
    line-height: 33.8px;
    border-radius: 60px;
    background: #0A3B64;
    padding: 16px 32px;
    border: 2px solid #0A3B64 !important;
    display: inline-block;
    text-decoration: none;
  }

  .success-payment-thanks .link-oursite {
    color: #0A3B64;
    font-family: Assistant;
    font-size: 24px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
  }

  .success-payment-order-info .cart_item {
    align-items: center;
    display: flex;
    flex-direction: row-reverse;
  }

  .success-payment-order-info .product-price-wrap::before {
    display: none;
  }

  .success-payment-order-info .product-name a {
    color: #458DB4 !important;
    text-align: right;
    font-family: Assistant;
    font-size: 23.045px;
    font-style: normal;
    font-weight: 600;
    line-height: 40px;
    text-decoration: none;
  }

  .success-payment-order-info .product-quantity p,
  .product-price-wrap {
    color: #000;
    text-align: right;
    font-family: Assistant;
    font-size: 23.045px;
    font-style: normal;
    font-weight: 600;
    line-height: 40px;
    direction: rtl;
  }

  .product-price-wrap bdi {
    direction: rtl;
  }

  .success-payment-order-additionalinfo {
    margin: 70px 0;
  }

  .success-payment-order-footer {
    padding: 40px 75px;
    background: #F2F6FA;
  }

  .success-payment-order-footer-info {
    display: flex;
    justify-content: space-between;
  }

  .success-payment-order-footer-info>div {
    display: flex;
    align-items: center;
    flex-direction: row-reverse;
  }

  .success-payment-order-footer-info img {
    border-radius: 50%;
    background: #C4E7FB;
    padding: 10px;
    margin-left: 10px;
  }

  .success-payment-order-footer-info a {
    color: #0A3B64 !important;
    font-size: 18px;
    font-style: normal;
    font-weight: 400;
    line-height: 25.38px;
  }

  .success-payment-thanks .verification-code {
    color: #0A3B64;
    font-family: Assistant;
    font-size: 33px;
    font-style: normal;
    font-weight: 700;
    line-height: 53.308px;
  }

  .success-payment-header {
    display: flex;
    justify-content: space-between;
    margin: 37px 28px;
  }

  .success-payment-header-infopayment {
    display: flex;
    flex-direction: column;
  }

  .infopayment-date-order,
  .infopayment-order-number {
    display: flex;
    flex-direction: row-reverse;
  }

  .infopayment-date-order p,
  .infopayment-order-number p {
    color: #000;
    text-align: right;
    font-family: Assistant;
    font-size: 23.045px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    margin-right: 5px;
    margin-bottom: 0 !important;

  }

  .infopayment-date-order p.title,
  .infopayment-order-number p.title {
    color: #458DB4;
    text-align: right;
    font-family: Assistant;
    font-size: 23.045px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
  }

  .woocommerce img,
  .woocommerce-page img {
    height: auto;
    max-width: 100%;
  }

  .product-thumbnail a {
    display: flex;
    width: 140px;
    align-items: center;
    justify-content: center;
  }

  .product-quantity {
    border-right: 1px solid #D3D3D3;
    border-left: 1px solid #D3D3D3;
    padding: 0 40px;
  }

  .product-name {
    width: 300px;
    text-align: end;
  }

  .product-thumbnail,
  .product-name,
  .product-price-wrap {
    padding: 0 40px;
  }

  .product-price {
    color: #828282;
    text-align: center;
    font-size: 18px;
    font-weight: 600;
    line-height: normal;
  }

  .page-menu-title {
    color: #0A3B64;
    font-size: 30px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    margin-bottom: 50px;
  }
</style>
<!--<div class="success-payment">
  <div class="success-payment-header">
    <div class="success-payment-header-logo">
      <img src="/wp-content/uploads/2023/12/LOGO-1.png" alt="">
    </div>
    <div class="success-payment-header-infopayment">
      <div class="infopayment-date-order">
        <p class="title"> - תאריך</p>
        <p>10.12.23</p>
      </div>
      <div class="infopayment-order-number">
        <p class="title"> - מספר הזמנה</p>
        <p>43992</p>
      </div>
    </div>
  </div>
  <div class="success-payment-thanks">
    <p>היי <span>שם פרטי</span>,<br>
      קיבלנו את הזמנתך ואנחנו מכניסים אותה לעבודה.<br>
      תודה שקנית אצלנו!</p>
    <a href="#" target="_self">
      <span>צפייה בהזמנה</span>
    </a>
    <p class="link-oursite">ביקור באתר שלנו</p>
  </div>
  <div class="success-payment-order-info">
    <article class="page type-page status-publish hentry">
      <div class="conteiner-968">
        <div class="page-title-wrap">
          <div class="page-menu-title">פרטי ההזמנה</div>
        </div>
        <div class="blog-page-menu-row">
          <div class="conteiner-968">

            <div class="entry-content">
              <div class="woocommerce">
                <div class="woocommerce-notices-wrapper"></div>
                <form class="woocommerce-cart-form" action="/cart/" method="post">

                  <section class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                    <div>

                      <div class="woocommerce-cart-form__cart-item cart_item">

                        <div class="product-thumbnail">
                          <a href="/product/the-freestyle-libre-2-sensor/"><img
                              fetchpriority="high" decoding="async" width="300" height="300"
                              src="/wp-content/uploads/2023/12/fsl2-sensor-alarm-300x300.jpeg"
                              class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                              srcset="/wp-content/uploads/2023/12/fsl2-sensor-alarm-300x300.jpeg 300w, /wp-content/uploads/2023/12/fsl2-sensor-alarm-246x246.jpeg 246w, /wp-content/uploads/2023/12/fsl2-sensor-alarm-150x150.jpeg 150w, /wp-content/uploads/2023/12/fsl2-sensor-alarm-100x100.jpeg 100w"
                              sizes="(max-width: 300px) 100vw, 300px"></a>
                        </div>

                        <div class="product-name" data-title="מוצר">
                          <a href="/product/the-freestyle-libre-2-sensor/">ערכת 6 חיישנים
                            פריסטייל ליברה 2</a>
                        </div>

                        <div class="product-quantity">
                          <p>3 יח’</p>
                        </div>

                        <div class="product-price-wrap">
                          <div class="product-subtotal" data-title="מחיר ">
                            <span class="woocommerce-Price-amount amount"><bdi>400.00&nbsp;<span
                                  class="woocommerce-Price-currencySymbol">₪</span></bdi></span>
                          </div>
                          <div class="product-price" data-title="מחיר">
                            <span class="woocommerce-Price-amount amount"><bdi>400.00&nbsp;<span
                                  class="woocommerce-Price-currencySymbol">₪</span></bdi></span> <span> ליחידה </span>
                          </div>
                        </div>
                      </div>

                      <div class="woocommerce-cart-form__cart-item cart_item">
                        <div class="product-thumbnail">
                          <a href="/product/book-carbs/"><img decoding="async"
                              width="300" height="300"
                              src="/wp-content/uploads/2023/09/1-4.svg"
                              class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""></a>
                        </div>

                        <div class="product-name" data-title="מוצר">
                          <a href="/product/book-carbs/">&nbsp;"סופרים פחמימות בישראל -
                            חופש בדרך לאיזון הסוכרת"</a>
                        </div>
                        <div class="product-quantity">
                          <p>3 יח’</p>
                        </div>
                        <div class="product-price-wrap">
                          <div class="product-subtotal" data-title="מחיר ">
                            <span class="woocommerce-Price-amount amount"><bdi>400.00&nbsp;<span
                                  class="woocommerce-Price-currencySymbol">₪</span></bdi></span>
                          </div>
                          <div class="product-price" data-title="מחיר">
                            <span class="woocommerce-Price-amount amount"><bdi>400.00&nbsp;<span
                                  class="woocommerce-Price-currencySymbol">₪</span></bdi></span> <span> ליחידה </span>
                          </div>
                        </div>
                      </div>

                      <div class="woocommerce-cart-form__cart-item cart_item">

                        <div class="product-thumbnail">
                          <a
                            href="/product/freestyle-optium-neo/?attribute_pa_%25d7%2590%25d7%2595%25d7%25a4%25d7%2598%25d7%2599%25d7%2595%25d7%259d-%25d7%25a0%25d7%2599%25d7%2590%25d7%2595=3-%25d7%259e%25d7%2590%25d7%25a8%25d7%2596%25d7%2599%25d7%259d-%25d7%259e%25d7%259b%25d7%25a9%25d7%2599%25d7%25a8"><img
                              decoding="async" width="300" height="300"
                              src="/wp-content/uploads/2023/09/500-X-500-2-1.svg"
                              class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""></a>
                        </div>

                        <div class="product-name" data-title="מוצר">
                          <a
                            href="/product/freestyle-optium-neo/?attribute_pa_%25d7%2590%25d7%2595%25d7%25a4%25d7%2598%25d7%2599%25d7%2595%25d7%259d-%25d7%25a0%25d7%2599%25d7%2590%25d7%2595=3-%25d7%259e%25d7%2590%25d7%25a8%25d7%2596%25d7%2599%25d7%259d-%25d7%259e%25d7%259b%25d7%25a9%25d7%2599%25d7%25a8">מד
                            סוכר פריסטייל אופטיום ניאו - 3-מארזים-מכשיר</a>
                        </div>

                        <div class="product-quantity" data-title="כמות">
                          <p>3 יח’</p>
                        </div>

                        <div class="product-price-wrap">
                          <div class="product-subtotal" data-title="מחיר ">
                            <span class="woocommerce-Price-amount amount"><bdi>400.00&nbsp;<span
                                  class="woocommerce-Price-currencySymbol">₪</span></bdi></span>
                          </div>
                          <div class="product-price" data-title="מחיר">
                            <span class="woocommerce-Price-amount amount"><bdi>400.00&nbsp;<span
                                  class="woocommerce-Price-currencySymbol">₪</span></bdi></span> <span> ליחידה </span>
                          </div>
                        </div>
                      </div>
                  </section>
                </form>
              </div>
            </div><!-- .entry-content -->
<!-- </div>
    </article>
  </div>

  <div class="success-payment-order-additionalinfo">
    <p class="order-additionalinfo-subtotal">סכום ביניים - <span>15 ₪</span></p>
    <p class="order-additionalinfo-delivery">משלוח - <span>איסוף עצמי מהמרכז הרפואי DMC בת”א</span></p>
    <p class="order-additionalinfo-commit">הערות - <span>גגגככה</span></p>
    <p class="order-additionalinfo-total">סך הכל - <span> 15 ₪</span></p>
  </div>

  <div class="success-payment-order-footer">
    <div class="page-menu-title">אנחנו כאן בשבילך!</div>
    <div class="success-payment-order-footer-info">
    <div>
      <img src="/wp-content/uploads/2023/12/email-2.svg" alt="">
      <a href="https://api.whatsapp.com/send?phone=972526390910" target="_blank">052-6390910</a>
    </div>
    <div>
      <img src="/wp-content/uploads/2023/12/email-2-1.svg" alt="">
      <a href="" target="_blank">6364*</a>
    </div>
    <div>
      <img src="/wp-content/uploads/2023/12/email-2-2.svg" alt="">
      <a href="mailto:cs@geffenmedical.com"  target="_blank">cs@geffenmedical.com</a>
    </div>
    <div>
      <img src="/wp-content/uploads/2023/12/email-2-3.svg" alt="">
      <a href="https://www.messenger.com/t/geffenmedical" target="_blank">Geffen Medical</a>
    </div>
    </div>


  </div>

</div>-->
<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#fff" style="background-color:rgb(255,255,255);border:1px solid rgb(222,222,222);border-radius:3px">
  <tbody>
    <tr>
      <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#2b98d7" style="background-color:rgb(43,152,215);color:rgb(255,255,255);border-bottom-width:0px;border-bottom-style:none;border-bottom-color:currentcolor;font-weight:bold;line-height:12px;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0px 0px">
          <tbody>
            <tr>
              <td id="m_-7752728251348583132header_wrapper" style="font-size:24px;padding:36px 48px;display:block">
                <h1 bgcolor="inherit"
                  style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:45px;margin:0px;text-align:right;color:rgb(255,255,255);background-color:inherit">
                  תודה על הזמנתך</h1>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_-7752728251348583132template_body">
          <tbody>
            <tr>
              <td valign="top" id="m_-7752728251348583132body_content" bgcolor="#fff"
                style="background-color:rgb(255,255,255)">
                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                  <tbody>
                    <tr>
                      <td valign="top" style="padding:48px 48px 32px">
                        <div id="m_-7752728251348583132body_content_inner" align="right"
                          style="font-size:14px;color:rgb(99,99,99);font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;line-height:15px;text-align:right">
                          <p style="margin:0px 0px 16px">שלום רומן,</p>
                          <p style="margin:0px 0px 16px">לידיעתך - קיבלנו את ההזמנה שביצעת, מס' 4199, אנחנו כעת מטפלים
                            בה:</p>
                          <h2
                            style="color:rgb(43,152,215);display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:23.4px;margin:0px 0px 18px;text-align:right">
                            [הזמנה #4199] (דצמבר 24, 2023)</h2>
                          <div style="margin-bottom:40px">
                            <table cellspacing="0" cellpadding="6" border="1" width="100%"
                              style="color:rgb(99,99,99);border:1px solid rgb(229,229,229);vertical-align:middle;width:533px;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
                              <thead>
                                <tr>
                                  <th scope="col" align="right"
                                    style="color:rgb(99,99,99);border:1px solid rgb(229,229,229);vertical-align:middle;padding:12px;text-align:right">
                                    מוצר</th>
                                  <th scope="col" align="right"
                                    style="color:rgb(99,99,99);border:1px solid rgb(229,229,229);vertical-align:middle;padding:12px;text-align:right">
                                    כמות</th>
                                  <th scope="col" align="right"
                                    style="color:rgb(99,99,99);border:1px solid rgb(229,229,229);vertical-align:middle;padding:12px;text-align:right">
                                    מחיר</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td align="right"
                                    style="padding:12px;color:rgb(99,99,99);border:1px solid rgb(229,229,229);text-align:right;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
                                    סוללות - aa<ul
                                      style="font-size:small;margin:1em 0px 0px;padding:0px;list-style:none">
                                      <li style="margin:0.5em 0px 0px;padding:0px"><strong
                                          style="float:right;margin-left:0.25em;clear:both">גודל סוללות:</strong>
                                        <div style="margin:0px">AA</div>
                                      </li>
                                    </ul>
                                  </td>
                                  <td align="right"
                                    style="padding:12px;color:rgb(99,99,99);border:1px solid rgb(229,229,229);text-align:right;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
                                    1</td>
                                  <td align="right"
                                    style="padding:12px;color:rgb(99,99,99);border:1px solid rgb(229,229,229);text-align:right;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
                                    <span>6.00&nbsp;<span>₪</span></span></td>
                                </tr>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th scope="row" colspan="2" align="right"
                                    style="color:rgb(99,99,99);border-width:4px 1px 1px;border-style:solid;border-color:rgb(229,229,229);vertical-align:middle;padding:12px;text-align:right">
                                    סכום ביניים:</th>
                                  <td align="right"
                                    style="color:rgb(99,99,99);border-width:4px 1px 1px;border-style:solid;border-color:rgb(229,229,229);vertical-align:middle;padding:12px;text-align:right">
                                    <span>6.00&nbsp;<span>₪</span></span></td>
                                </tr>
                                <tr>
                                  <th scope="row" colspan="2" align="right"
                                    style="color:rgb(99,99,99);border:1px solid rgb(229,229,229);vertical-align:middle;padding:12px;text-align:right">
                                    משלוח:</th>
                                  <td align="right"
                                    style="color:rgb(99,99,99);border:1px solid rgb(229,229,229);vertical-align:middle;padding:12px;text-align:right">
                                    איסוף עצמי מהמרכז הרפואי DMC בת״א</td>
                                </tr>
                                <tr>
                                  <th scope="row" colspan="2" align="right"
                                    style="color:rgb(99,99,99);border:1px solid rgb(229,229,229);vertical-align:middle;padding:12px;text-align:right">
                                    אמצעי תשלום:</th>
                                  <td align="right"
                                    style="color:rgb(99,99,99);border:1px solid rgb(229,229,229);vertical-align:middle;padding:12px;text-align:right">
                                    טרנזילה</td>
                                </tr>
                                <tr>
                                  <th scope="row" colspan="2" align="right"
                                    style="color:rgb(99,99,99);border:1px solid rgb(229,229,229);vertical-align:middle;padding:12px;text-align:right">
                                    סך הכל:</th>
                                  <td align="right"
                                    style="color:rgb(99,99,99);border:1px solid rgb(229,229,229);vertical-align:middle;padding:12px;text-align:right">
                                    <span>6.00&nbsp;<span>₪</span></span></td>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                          <table id="m_-7752728251348583132addresses" cellspacing="0" cellpadding="0" border="0"
                            width="100%" style="width:533px;vertical-align:top;margin-bottom:40px;padding:0px">
                            <tbody>
                              <tr>
                                <td valign="top" width="50%" align="right"
                                  style="padding:0px;text-align:right;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border:0px">
                                  <h2
                                    style="color:rgb(43,152,215);display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:23.4px;margin:0px 0px 18px;text-align:right">
                                    כתובת לחיוב</h2>
                                  <address style="padding:12px;color:rgb(99,99,99);border:1px solid rgb(229,229,229)">
                                    רומן חיפץ<br>אגס 16<br>אשדוד<br>12900<br><a href="tel:0527732339"
                                      style="color:rgb(43,152,215);font-weight:normal;text-decoration:underline"
                                      target="_blank">0527732339</a><br><a href="mailto:roman@bsx.co.il"
                                      target="_blank">roman@bsx.co.il</a></address>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <p style="margin:0px 0px 16px">תודה שהתמשת ב-<a href="/"
                              target="_blank"
                              data-saferedirecturl="https://www.google.com/url?q=<?= home_url() ?>&amp;source=gmail&amp;ust=1703511686791000&amp;usg=AOvVaw2JDhA9OqO79Iq8k5iDKDFg">geffenmedical.co.il</a>!
                          </p>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>