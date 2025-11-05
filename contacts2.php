<?php

/**
 * Template Name: Freestyle-Libre-Contact2
 * Template Post Type: freestyle_libre
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
  @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@200;300&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap');

  body {
    margin: 0;
  }

  .success-payment {
    font-family: 'Assistant';
  }

  .conteiner-968 {
    max-width: 600px;
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
    font-size: 20px;
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
    font-size: 20px;
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
    font-size: 20px;
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
    font-size: 20px;
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
    font-size: 20px;
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
    padding: 0 18px;
  }

  .product-name {
    max-width: 150px;
    text-align: end;
  }

  .product-thumbnail,
  .product-name,
  .product-price-wrap {
    padding: 0 18px;
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
    text-align: right !important;
  }

  .success-payment {
    background: #fff;
    margin: 0 auto;
    max-width: 600px;
    width: 100%;
  }
</style>
<table border="0" cellpadding="0" cellspacing="0" width="600px" id="m_-5279496056512706610template_container"
  bgcolor="#fff" style="margin: 0 auto;">
  <tbody>
    <tr>
      <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_-5279496056512706610template_header"
          bgcolor="#2b98d7"
          style="background-color:#fff;color:rgb(255,255,255);border-bottom-width:0px;border-bottom-style:none;border-bottom-color:currentcolor;font-weight:bold;line-height:12px;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0px 0px">
          <tbody>
            <tr>
              <td style="font-size:24px;padding:10px;background-color:#fff;vertical-align: middle;" width="60%">
                <table border="0" cellpadding="0" cellspacing="0" width="100%"
                  id="m_-5279496056512706610template_header" bgcolor="#fff"
                  style="background-color:#fff;color:rgb(255,255,255);border-bottom-width:0px;border-bottom-style:none;border-bottom-color:currentcolor;font-weight:bold;line-height:12px;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0px 0px">
                  <tbody>
                    <tr>
                      <td style="font-size:24px;padding:0;width: 30%;">
                        <p class="title" dir="rtl" style="color: #458db4;"><?=  __('תאריך  - ', 'geffen') ?></p>
                      </td>
                      <td style="font-size:24px;padding:10px;background-color: black;">

                      </td>
                    </tr>
                  </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" width="100%"
                  id="m_-5279496056512706610template_header" bgcolor="#fff"
                  style="background-color:#fff;color:rgb(255,255,255);border-bottom-width:0px;border-bottom-style:none;border-bottom-color:currentcolor;font-weight:bold;line-height:12px;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0px 0px">
                  <tbody>
                    <tr>
                      <td style="font-size:24px;padding:0;width: 50%;">
                        <p class="title" dir="rtl" style="color: #458db4;"><?= __('מספר הזמנה  - ', 'geffen') ?></p>
                      </td>
                      <td style="font-size:24px;padding:10px;background-color: black;">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td style="font-size:24px;padding:10px;">
                <img src="/wp-content/uploads/2023/12/LOGO-1.png" alt="">
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_-5279496056512706610template_body">
          <tbody>
            <tr>
              <td valign="top" id="m_-5279496056512706610body_content" bgcolor="#fff"
                style="background-color:rgb(255,255,255)">
                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                  <tbody>
                    <tr>
                      <td valign="top" style="padding:48px 48px 32px">
                        <div class="success-payment-thanks" align="center">
                          <p dir="rtl"
                            style="color: #000;text-align: center;font-family: Assistant;font-size: 26px;font-style: normal;font-weight: 400;line-height: 42px; margin-top: 50px;margin-bottom: 33px;">
                            היי ,<span>NAME</span><br>
                            קיבלנו את הזמנתך ואנחנו מכניסים אותה לעבודה.<br> תודה שקנית אצלנו!
                          </p>
                          <p style="text-align: center;">
                            <a href="/" dir="rtl"
                              style="font-size:26px;font-style:normal;font-weight:400;line-height:33.8px;border-radius:60px;background:#0a3b64;padding:16px 32px;display:inline-block;text-decoration:none;margin-bottom:40px;color:#fff!important;border:2px solid #0a3b64"
                              bgcolor="#0a3b64" target="_blank"
                              data-saferedirecturl="https://www.google.com/url?q=<?= home_url() ?>&amp;source=gmail&amp;ust=1703850338617000&amp;usg=AOvVaw12x_3Sm0MA2ZtsPSe3DpBP">ביקור
                              באתר שלנו </a><br>
                            <span
                              style="color: #0A3B64;text-align: center;font-size: 24px;font-style: normal;font-weight: 700;line-height: normal;">ביקור
                              באתר שלנו</span>
                          </p>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div style="margin-bottom:40px">
                          <table cellspacing="0" cellpadding="6" border="1" width="100%"
                            style="color:rgb(99,99,99);border:none;vertical-align:middle;width:533px;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
                            <h2
                              style="color: #0A3B64;text-align: right;font-size: 30px;font-style: normal;font-weight: 700;line-height: normal;">
                              פרטי ההזמנה</h2>
                            <tbody>
                              <tr style="margin-bottom: 32px;">
                                <td style="width: 15%;">
                                  <div class="product-thumbnail">
                                    <a href="<?= $product_link ?>">
                                      <img src="/wp-content/uploads/2023/10/1.svg"
                                        alt="">
                                    </a>
                                  </div>
                                </td>
                                <td>
                                  <div class="product-name">
                                    <a href="<?= $product_link ?>" dir="rtl"><?= $product_name ?>מקלונים לבדיקת בטא-קטון
                                      בדם פריסטייל אופטיום ניאו</a>
                                  </div>
                                </td>
                                <td align="right"
                                  style="padding:12px;color:rgb(99,99,99);border-top: 1px solid #fff;border-bottom: 1px solid #fff;border-right: 1px solid rgb(229,229,229);text-align:right;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
                                  3 יח’</td>
                                <td align="right"
                                  style="padding:12px;color:rgb(99,99,99);border-top: 1px solid #fff;border-bottom: 1px solid #fff;border-right: 1px solid rgb(229,229,229);text-align:right;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
                                  <span>435.00<span>₪</span></span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <table id="m_-5279496056512706610addresses" cellspacing="0" cellpadding="0" border="0"
                          width="100%" style="vertical-align:top;margin-bottom:40px;padding:0px">
                          <tbody>
                            <tr>
                              <td style="text-align: center">
                              <p>test</p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style="margin:0px 0px 16px">תודה שהתמשת ב-<a href="/"
                            target="_blank"
                            data-saferedirecturl="https://www.google.com/url?q=<?= home_url() ?>&amp;source=gmail&amp;ust=1703844532663000&amp;usg=AOvVaw2wNhcH4bjq-_4R33IPFWqc">geffenmedical.co.il</a>!
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

<?php get_footer() ?>