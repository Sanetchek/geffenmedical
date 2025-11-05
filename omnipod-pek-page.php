<?php

/**
 * Template Name: Omnipod-PEK
 * Template Post Type: omnipod
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
  .pod-experience-banner {
    display: flex;
    background-image: url("/wp-content/uploads/2024/06/image-6.jpg");
  }

  .pod-experience-banner-title {
    width: 65%;
    padding: 70px 170px 85px 0;
    background: linear-gradient(270deg, #FFF 41.50%, rgba(217, 217, 217, 0.00) 100%);
  }

  .pod-experience-banner-title h1 {
    color: #000;
    text-align: right;
    font-size: 96px !important;
    font-style: normal;
    font-weight: 700;
    line-height: 120px !important;
    margin-bottom: 50px;
  }

  .pod-experience-banner-title p {
    color: #000;
    text-align: right;
    font-size: 28px !important;
    font-style: normal;
    font-weight: 400;
    line-height: 42px !important;
    direction: rtl;
  }

  /*TAB*/
  .tablink,
  .tablink-tried {
    background-color: white;
    color: #000;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 45px 24px 34px;
    border-radius: 28px 28px 0px 0px;
    font-size: 18px !important;
    font-style: normal;
    font-weight: 700;
    line-height: 22px !important;
    border-bottom: 1px solid #A6A6A6;
    text-align: center;
  }

  .tab-block .tablink {
    width: 20%;
  }

  .tried-pod .tablink-tried {
    width: 50%;
  }

  .tablink:hover,
  .tablink-tried:hover {
    background-color: #777;
  }

  .tabcontent,
  .tabcontent-tried {
    color: white;
    display: none;
    padding: 100px 20px;
    height: 100%;
  }

  .tabcontent h3,
  .sample-pod h3,
  .tried-pod h3 {
    margin-top: 50px;
    color: #000;
    text-align: center;
    font-size: 36px !important;
    font-style: normal;
    font-weight: 600;
    line-height: 50.4px!important;
  }

  .tried-pod h3 {
    margin-top: 0;
    line-height: 55px !important;
  }

  .tabcontent-row,
  .reason-pod-row {
    display: flex;
    flex-direction: row-reverse;
  }

  .tabcontent-text-img {
    display: flex;
    width: 50%;
    justify-content: center;
    position: relative;
  }

  .tabcontent-text {
    width: 50%;
  }

  .tabcontent-text p,
  .sample-pod p,
  .reason-pod-text p {
    color: #000;
    text-align: right;
    font-size: 18px !important;
    font-style: normal;
    font-weight: 400;
    line-height: 32px !important;
    margin: 0 0 36px;
  }

  /*END-TAB*/
  .pod-experience-container {
    max-width: 1645px;
    margin: 0 auto;
    width: 90%;
  }

  .get-to-know {
    padding-top: 70px;
    background: #F8F7F4;
  }

  .get-to-know .pod-experience-container {
    display: flex;
  }

  .get-to-know-col1 {
    width: 36%;
    margin-left: 102px;
  }

  .get-to-know-col2 {
    width: 33.4%;
    margin-left: 58px;
  }

  .get-to-know-col3 {
    width: 30%;
  }

  .get-to-know-col1 h2 {
    color: #000;
    text-align: right;
    font-size: 48px !important;
    font-style: normal;
    font-weight: 700;
    line-height: 90px !important;
    margin-top: 0;
  }

  .get-to-know-col1 p {
    color: #000;
    text-align: right;
    font-size: 18px !important;
    font-style: normal;
    font-weight: 400;
    line-height: 36px !important;
  }

  .get-to-know-col2 li {
    color: #000;
    text-align: right;
    font-size: 18px !important;
    font-style: normal;
    font-weight: 500;
    line-height: 125% !important;
    margin-bottom: 48px;
  }

  .get-to-know-col3 p {
    text-align: center;
    color: #000;
    font-size: 20px !important;
    font-style: normal;
    font-weight: 400;
    line-height: 32px !important;
  }

  .sample-pod .pod-experience-container,
  .mobile-companion .pod-experience-container {
    max-width: 1157px;
    width: 70%;
  }

  .take-word .pod-experience-container {
    max-width: 1620px;
    width: 90%;
  }

  .mobile-companion .pod-experience-container,
  .take-word .pod-experience-container {
    padding: 128px 0 90px;
  }

  .sample-pod-row {
    display: flex;
    justify-content: space-between;
  }

  .sample-pod-row>div {
    width: 23%;
  }

  .sample-pod-button,
  .sample-pod-img {
    display: flex;
    justify-content: center;
    margin: 44px 0 65px;
  }

  .sample-pod-button a {
    color: #00A2AC;
    text-align: right;
    font-size: 26px;
    font-style: normal;
    font-weight: 700;
    line-height: 36px;
    border-radius: 100px;
    border: 4px solid #00A2AC;
    padding: 11px 24px;
    width: 379px;
    display: block;
    text-align: center;
  }

  .mobile-companion,
  .take-word {
    position: relative;
    background: #8250C3;
  }

  .take-word {
    background: #F75E4C;
  }

  .mobile-companion svg,
  .take-word svg {
    position: absolute;
    top: 0;
    right: 0;
  }

  .mobile-companion h2,
  .take-word h2 {
    color: #FFF;
    font-size: 48px !important;
    font-style: normal;
    font-weight: 700;
    line-height: 88px !important;
    margin-bottom: 95px;
  }

  .mobile-companion p,
  .take-word p {
    color: #FFF;
    text-align: right;
    font-size: 18px !important;
    font-style: normal;
    font-weight: 400;
    line-height: 32px !important;
    margin: 0 0 36px;
  }

  .mobile-companion h4 {
    color: #FFF;
    font-size: 24px !important;
    font-style: normal;
    font-weight: 700;
    line-height: 50px !important;
    text-align: center;
    margin-top: 84px;
  }

  .mobile-companion-img {
    display: flex;
    justify-content: center;
    margin-bottom: 45px;
  }

  .mobile-companion-pdf {
    display: flex;
    justify-content: center;
  }

  .mobile-companion-pdf>p>a {
    color: #fff;
    font-weight: 400;
    text-decoration: underline;
    cursor: pointer;
  }

  .mobile-companion-button {
    display: flex;
    justify-content: center;
    margin-top: 45px;
  }

  .mobile-companion-button a,
  .take-word-button a {
    border-radius: 100px;
    background: #FFF;
    padding: 24px;
    width: 434px;
    color: #8250C3;
    text-align: center;
    font-size: 18px;
    font-style: normal;
    font-weight: 700;
    line-height: 22px;
  }

  .take-word-button a {
    color: #FFF;
    border: 4px solid #FFF;
    background: transparent;
    padding: 11px 50px;
  }

  .take-word-button {
    text-align: center;
    margin-top: 95px;

  }

  .tried-pod-subtitle {
    margin: 88px 60px 78px;
  }

  .tabcontent-text-img img {
    height: 548px;
  }

  .tabcontent-tried .tabcontent-row {
    margin-top: 48px;
  }

  .tried-button a {
    border-radius: 100px;
    background: #8D61C8;
    display: inline-flex;
    padding: 15px 35px;
    justify-content: center;
    align-items: center;
    color: #FFF !important;
    text-align: center;
    font-size: 18px !important;
    font-style: normal;
    font-weight: 700;
    line-height: 22px !important;
    margin-bottom: 24px;
  }

  .tried-button a:hover,
  .mobile-companion-button a:hover,
  .take-word-button a:hover,
  .sample-pod-button a:hover {
    text-decoration: none;
  }

  #advice span {
    display: block;
  }

  #advice p {
    margin-bottom: 65px;
    font-size: 24px !important;
    line-height: 32px !important;
    color:#000;
  }

  #advice .tabcontent-tried-span {
    color: #8250C3;
    font-weight: 700;
  }

  .content-container.reason-pod {
    background: #F1EFE9;
    padding: 30px 0 27px;
  }

  .reason-pod-text h3 {
    color: #000;
    text-align: right;
    font-size: 36px !important;
    font-style: normal;
    font-weight: 700;
    line-height: 80px !important;
  }

  .take-word h2,
  .take-word p {
    text-align: center;
    margin-bottom: 45px;
  }

  .take-word-row {
    display: flex;
    justify-content: space-between;
    margin-top: 95px;
  }

  .take-word-col1 {
    width: 28%;
    text-align: center;
  }

  .take-word-col1 p {
    text-align: right;
  }

  .more-information {
    background: #E6DCF3;
    padding: 63px 0;
    text-align: center;
  }

  .more-information h3 {
    color: #000;
    font-size: 48px !important;
    font-style: normal;
    font-weight: 700;
    line-height: 90px !important;
    margin-bottom: 32px;
  }

  .more-information a {
    text-decoration: underline !important;
  }

  .more-information p {
    font-size: 28px !important;
    line-height: 32px !important;
  }

  #team .tabcontent-text-img img {
    height: auto;
    margin-top: 50px;
  }
  .pod-experience-footer{
    margin-bottom: 70px;
  }
  .pod-experience-footer p {
        text-align: right;
        font-size: 18px !important;
        line-height: 24px !important;
        margin-bottom: 0 !important;
    }
  @media screen and (min-width: 1200px) and (max-width: 1920px) {
    #team .tabcontent-text-img img {
      height: auto;
      margin-top: 50px;
    }

    .pod-experience-banner-title p {
      font-size: 22px !important;
    }

    .tablink,
    .tablink-tried {
      padding: 24px 18px 24px;
    }

    .tabcontent-text p,
    .sample-pod p,
    .reason-pod-text p {
      font-size: 18px !important;
      line-height: 28px !important;
      margin: 0 0 12px;
    }

    .get-to-know-col2 li,
    .get-to-know-col3 p {
      font-size: 18px !important;
    }

    #advice p {
      margin-bottom: 29px;
      font-size: 18px !important;
      line-height: 25px !important;
    }



    .tab-block .tablink {
      height: 95px;
    }

    .tabcontent-text-img img {
      height: 410px;
      width: auto;
    }

    .tabcontent-text-img p {
      bottom: 20px;
    }

    .get-to-know-col1 h2 {
      font-size: 36px !important;
      line-height: 55px !important;

    }

    .get-to-know-col1 p,
    .mobile-companion p,
    .take-word p {
      font-size: 18px !important;
      line-height: 36px !important;
    }

    .get-to-know-col1 {
      margin-left: 20px;
    }

    .reason-pod-text h3 {
      font-size: 36px !important;
      line-height: 55px !important;
    }
  }

  @media screen and (min-width: 768px) and (max-width: 1199px) {
    .pod-experience-banner-title {
      width: 50%;
      padding: 70px 58px 85px 60px;
    }

    .pod-experience-banner-title h1 {
      font-size: 76px !important;
      line-height: 93px !important;
    }

    .pod-experience-banner-title p {
      font-size: 25px !important;
      line-height: 35px !important;
    }

    .tabcontent-row,
    .reason-pod-row {
      flex-direction: column-reverse;
    }

    .tabcontent-text {
      width: 100%;
      margin-bottom: 50px;
      margin-top: 50px;
    }

    .tabcontent,
    .tabcontent-tried {
      padding: 20px 20px;
    }

    .tabcontent-text-img {
      width: 100%;
    }

    .tab-block .tablink,
    .tried-pod .tablink-tried {
      height: 90px;
    }

    .get-to-know .pod-experience-container,
    .take-word-row {
      flex-direction: column;
    }
    .tablink, .tablink-tried{
      padding:24px 24px;
    }
    .get-to-know-col1,
    .get-to-know-col2,
    .get-to-know-col3 {
      width: 100%;
      text-align: center;
    }

    .tabcontent-text-img img {
      height: 450px;
    }

    .tabcontent h3,
    .sample-pod h3,
    .tried-pod h3 {
      line-height: 65px !important;
    }

    .sample-pod-row {
      flex-direction: column;
    }

    .sample-pod p {
      text-align: center;
    }

    .sample-pod-row>div {
      width: 100%;
      text-align: center;
    }

    .mobile-companion h2,
    .take-word h2 {
      line-height: 64px !important;
      margin-top: 75px;
    }

    .mobile-companion p,
    .take-word p {
      font-size: 18px !important;
    }

    #advice p:first-child,
    .tabcontent h3 {
      margin-top: 50px;
    }

    #advice p {
      margin-bottom: 35px;
    }

    .reason-pod-row>div:first-child {
      display: flex;
      justify-content: center;
    }

    .take-word-col1 {
      width: 100%;
    }

    #team .tabcontent-text-img img {
      height: auto;
      margin-top: 50px;
    }
  }


  @media screen and (min-width: 480px) and (max-width: 767px) {
    
    .tried-pod .tablink-tried {
      height: 110px;
    }

    .pod-experience-banner-title h1 {
      font-size: 75px !important;
      line-height: 70px !important;
      margin-bottom: 50px;
    }

    .pod-experience-banner-title {
      width: 100%;
      padding: 40px 68px 85px 0;
    }

    .pod-experience-banner-title p {
      font-size: 24px !important;
      line-height: 35px !important;
    }

    .tab-block .pod-experience-container>div:first-child {
      display: flex;
      flex-direction: row-reverse;
    }

    .tablink,
    .tablink-tried {
      font-size: 18px !important;
      padding: 25px 14px;
    }

    .tabcontent,
    .tabcontent-tried {
      padding: 0px 20px;
    }

    .tabcontent h3,
    .sample-pod h3,
    .tried-pod h3 {
      margin-top: 19px;
      font-size: 28px !important;

    }

    .tabcontent-row,
    .reason-pod-row {
      flex-direction: column-reverse;
    }

    .tabcontent-text,
    .tabcontent-text-img {
      width: 100%;
    }

    .tabcontent-text-img img {
      height: 350px;
      margin-top: 50px;
    }

    .get-to-know .pod-experience-container,
    .take-word-row {
      flex-direction: column;
    }

    .get-to-know-col1,
    .get-to-know-col2,
    .get-to-know-col3 {
      width: 100%;
      text-align: center;
    }

    .get-to-know-col1 {
      display: flex;
      flex-direction: column;
    }

    .get-to-know-col1 h2 {
      font-size: 50px !important;
      line-height: 70px !important;
    }

    .tabcontent h3,
    .sample-pod h3,
    .tried-pod h3 {
      line-height: 65px !important;
    }

    .sample-pod-row {
      flex-direction: column;
    }

    .sample-pod p {
      text-align: center;
    }

    .sample-pod-row>div {
      width: 100%;
      text-align: center;
    }

    .mobile-companion h2,
    .take-word h2 {
      line-height: 64px !important;
      margin-top: 160px;
    }

    .mobile-companion p,
    .take-word p {
      font-size: 18px !important;
    }

    #advice p:first-child,
    .tabcontent h3 {
      margin-top: 64px;
    }

    .tabcontent,
    .tabcontent-tried {
      padding: 100px 20px;
    }

    #advice p {
      margin-bottom: 35px;
    }

    .reason-pod-row>div:first-child {
      display: flex;
      justify-content: center;
    }

    .take-word-col1 {
      width: 100%;
    }

    .reason-pod-text h3 {
      font-size: 36px !important;
      font-weight: 700;
      line-height: 64px !important;
    }

    .reason-pod-text h3 br {
      display: none;
    }

    .tabcontent-text p,
    .sample-pod p,
    .reason-pod-text p {
      font-size: 18px !important;
    }

    .pod-experience-footer p {
      text-align: center;
      font-size: 18px !important;
      line-height: 30px !important;
    }

    #team .tabcontent-text-img img {
      height: auto;
      margin-top: 50px;
    }
  }


  @media screen and (max-width: 680px) {
    .tab-block .tablink {
    width: 25%;
}
    .pod-experience-banner-title h1 {
      font-size: 32px !important;
      line-height: 60px !important;
      margin-bottom: 50px;
    }

    .pod-experience-banner-title {
      width: 100%;
      padding: 40px 25px 85px 0;
    }

    .pod-experience-banner-title p {
      font-size: 16px !important;
      line-height: 1.666666667 !important
    }

    .tab-block .pod-experience-container>div:first-child {
      display: flex;
      flex-direction: row-reverse;
    }

    .tablink,
    .tablink-tried {
      font-size: 15px !important;
      padding: 25px 14px;
    }

    .tabcontent,
    .tabcontent-tried {
      padding: 0px 20px;
    }

    .tabcontent h3,
    .sample-pod h3,
    .tried-pod h3 {
      margin-top: 19px;
      font-size: 28px !important;
    }

    .tabcontent-row,
    .reason-pod-row {
      flex-direction: column-reverse;
    }

    .tabcontent-text,
    .tabcontent-text-img {
      width: 100%;
    }

    #team .tabcontent-text-img img {
      height: auto;
      margin-top: 50px;
    }

    .get-to-know .pod-experience-container,
    .take-word-row {
      flex-direction: column;
    }

    .get-to-know-col1,
    .get-to-know-col2,
    .get-to-know-col3 {
      width: 100%;
      text-align: center;
    }

    .get-to-know-col1 {
      display: flex;
      flex-direction: column;
    }

    .get-to-know-col1 h2 {
      font-size: 36px !important;
      line-height: 50px !important;
    }

    .get-to-know-col1 p {
      font-size: 18px !important;
      line-height: 30px !important;
    }

    .get-to-know-col2 li {
      font-size: 18px !important;
    }

    .tabcontent h3,
    .sample-pod h3,
    .tried-pod h3 {
      line-height: 50px !important;
    }


    .sample-pod-row {
      flex-direction: column;
    }

    .sample-pod p {
      text-align: center;
    }

    .sample-pod-row>div {
      width: 100%;
      text-align: center;
    }

    .mobile-companion h2,
    .take-word h2 {
      line-height: 49px !important;
      margin-top: 160px;
      font-size: 40px !important;
      margin-bottom: 50px;
    }

    .mobile-companion h4 {
      font-size: 24px !important;
      line-height: 45px !important;
    }

    .mobile-companion-button a,
    .take-word-button a {
      font-size: 24px;
    }

    .mobile-companion p,
    .take-word p {
      font-size: 18px !important;
    }

    #advice p:first-child,
    .tabcontent h3 {
      margin-top: 64px;
    }

    #advice p {
      margin-bottom: 35px;
    }

    .reason-pod-row>div:first-child {
      display: flex;
      justify-content: center;
    }

    .take-word-col1 {
      width: 100%;
    }

    .reason-pod-text h3 {
      font-size: 32px !important;
      font-weight: 700;
      line-height: 40px !important;
    }

    .more-information h3 {
      font-size: 38px !important;
      line-height: 56px !important;
    }

    .reason-pod-text h3 br,
      {
      display: none;
    }

    .tabcontent-text p,
    .sample-pod p,
    .reason-pod-text p {
      font-size: 18px !important;
    }

    .pod-experience-footer p {
      text-align: center;
      font-size: 16px !important;
      line-height: 30px !important;
    }

    .pod-experience-footer p br {
      height: 12px;
    }

    .tried-pod-subtitle {
      margin: 0 0 40px;
    }

    #use-pod .tabcontent-text-img img {
      height: 250px;
      margin-top: 50px;
    }

    .tablink-tried {
      height: 120px;
    }

    #advice p {
      font-size: 20px !important;
    }

    #team .tabcontent-text-img img {
      height: auto;
      margin-top: 50px;
    }
  }
</style>


<section class="pod-experience-banner">
  <div class="pod-experience-banner-title">
    <h1><?= get_field('title') ?></h1>
    <p><?= get_field('subtitle_main') ?></p>
  </div>

</section>
<main class="main-content pod-experience m-t120">
  <section class="content-container tab-block">
    <div class="pod-experience-container">

      <div style="display: flex;flex-direction: row-reverse;justify-content: flex-end;">
       <!-- <a class="tablink" href><?= get_field('title_tab5') ?></a>-->
        <a class="tablink" href="#reason-pod" style="color: #000 !important;font-size: medium;display: flex;align-items: center;    justify-content: center;"><?= get_field('title_tab4') ?></a>
        <a class="tablink" href="#tried-pod" style="color: #000 !important;font-size: medium;display: flex;align-items: center;    justify-content: center;"><?= get_field('title_tab3') ?></a>
        <a class="tablink" href="#virtual-controller" style="color: #000 !important;font-size: medium;display: flex;align-items: center;    justify-content: center;"><?= get_field('title_tab2') ?></a>
        <button class="tablink" onclick="openPage('use-pod', this, '#FFA700')"
          id="defaultOpen"><?= get_field('title_tab1') ?></button>
      </div>
      <!--<div id="pod-users" class="tabcontent">
        <h3> <?= get_field('tab5_content_title') ?></h3>
      </div>-->

      <!--<div id="why-omnipod" class="tabcontent">
        <h3> <?= get_field('tab4_content_title') ?></h3>
      </div>-->

      <!--<div id="next" class="tabcontent">
        <h3> <?= get_field('tab3_content_title') ?></h3>
      </div>-->

      <!--<div id="virtual-controller" class="tabcontent">
        <h3> <?= get_field('tab2_content_title') ?></h3>
      </div>-->

      <div id="use-pod" class="tabcontent" style="padding: 0px 20px;">
        <h3><?= get_field('tab1_content_title') ?></h3>

        <div class="tabcontent-row">
          <div class="tabcontent-text-img pek-image-gif">
            <?php 
              $image = get_field('tab1_image');
              $size = '425x410'; // (thumbnail, medium, large, full или ваш размер)
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
            <p class="pek-text-gif"><?= get_field('tab1_image_text') ?></p>
          </div>


          <div class="tabcontent-text">
            <?= get_field('tab1_text') ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="content-container get-to-know">
    <div class="pod-experience-container">
      <div class="get-to-know-col1">
        <h2><?= get_field('block2_title') ?></h2>
        <p><?= get_field('block2_subtitle') ?>

        </p>
      </div>
      <div class="get-to-know-col2">
        <?= get_field('block2_text') ?>
      </div>
      <div class="get-to-know-col3">
        <a href="<?= get_field('youtube_link_videoblock2') ?>" class="card__link tube">
          <img src="<?= get_field('img_video_block2') ?>" height="" width="560" />

        </a>
        <p>
          <?= get_field('block2_text_video') ?>
        </p>
      </div>
    </div>
  </section>
  <section class="content-container sample-pod">
    <div class="pod-experience-container">
      <h3><?= get_field('block3_title') ?></h3>
      <p><?= get_field('block3_text') ?> </p>
      <div class="sample-pod-row">
        <div>
          <?php 
              $image = get_field('block3_image1');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
          <p style="padding-left: 65px;"><?= get_field('block3_img1_text') ?> </p>

        </div>
        <div>
          <?php 
              $image = get_field('block3_image2');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
          <p><?= get_field('block3_img2_text') ?> </p>

        </div>
        <div>
          <?php 
              $image = get_field('block3_image3');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
          <p style="padding-left: 36px;"><?= get_field('block3_img3_text') ?> </p>

        </div>
        <div>
          <?php 
              $image = get_field('block3_image4');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
          <p style="padding-left: 50px;"><?= get_field('block3_img4_text') ?> </p>

        </div>
      </div>
     <!-- <div class="sample-pod-button">
        <a href="<?= get_field('block3_button_url') ?>"><?= get_field('block3_button_text') ?></a>

      </div>-->
      <p><?= get_field('block4_text') ?></p>
      <div class="sample-pod-img">
        <?php 
              $image = get_field('block4_image');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
      </div>

    </div>
  </section>
  <section class=" content-container mobile-companion"  id="virtual-controller">
    <div class="pod-experience-container">
      <svg xmlns="http://www.w3.org/2000/svg" width="444" height="436" viewBox="0 0 444 436" fill="none">
        <path d="M444 0H0C332.8 35.2 434.667 305.333 444 436V0Z" fill="#C1A8E1" />
      </svg>
      <h2><?= get_field('block5_title') ?></h2>
      <p><?= get_field('block5_text1') ?></p>
      <h4><?= get_field('block5_subtitle') ?></h4>
      <div class="mobile-companion-img">
        <?php 
              $image = get_field('block5_image');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
      </div>
      <div class="mobile-companion-pdf">
        <p><?= get_field('block5_text2') ?><p>
      </div>
      <div class="mobile-companion-button">
        <a href="<?= get_field('block5_button_url') ?>"><?= get_field('block5_button_text') ?></a>
        <div id="tried-pod"></div>
      </div>
    </div>
  </section>
  <section class="content-container tried-pod">
    <div class="pod-experience-container">
      <h3 style="margin-top: 80px!important;"><?= get_field('block6_title1') ?></h3>
      <h3><?= get_field('block6_title2') ?></h3>
      <p class="tried-pod-subtitle" style="margin-bottom: 80px!important;"><?= get_field('block6_text') ?> </p>
      <div>
        <button class="tablink-tried" onclick="openPage2('advice', this, '#FFA700')"><?= get_field('block6_tab2_title') ?></button>

        <button class="tablink-tried" onclick="openPage2('team', this, '#FFA700')" id="defaultOpen2"><?= get_field('block6_tab1_title') ?></button> 


        <div id="advice" class="tabcontent-tried">
          <?php if (get_field('block6_list')) : ?>
          <?php foreach (get_field('block6_list') as $list) : ?>
            <p>
            <span class="tabcontent-tried-span"><?= $list['title'] ?></span></p>
           <p><?= $list['text'] ?></p>
          <?php endforeach ?>
          <?php endif ?>       
        </div>

        <div id="team" class="tabcontent-tried">
          <div class="tabcontent-row">
            <div class="tabcontent-text-img">
            <?php 
              $image = get_field('block6_tab1_image');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
            </div>

            <div class="tabcontent-text">
              <p><?= get_field('block6_tab1_text') ?> </p>
              <div class="tried-button">
              <a href="<?= get_field('block6_tab1_button_url') ?>"><?= get_field('block6_tab1_button_text') ?></a>
               
              </div>
              <p style="margin: 0;"><?= get_field('block6_tab1_text2') ?></p>
            </div>
          </div>
          <div id="reason-pod"></div>
        </div>
      </div>
    </div>
  </section>
  <section class="content-container reason-pod">
    <div class="pod-experience-container">
      <div class="reason-pod-row">
        <div>
        <?php 
              $image = get_field('block7_image');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
        </div>
        <div class="reason-pod-text">
          <h3><?= get_field('block7_title') ?></h3>
          <p><?= get_field('block7_text') ?></p>
          <!--<div class="tried-button">
          <a href="<?= get_field('block7_button_url') ?>"><?= get_field('block7_button_text') ?></a>        
          </div>-->
        </div>
      </div>
    </div>
  </section>
  <section class=" content-container more-information">
    <div class="pod-experience-container">
      <h3 style="text-align: center!important;"><?= get_field('block9_title') ?></h3>     
      <p style="text-align: center!important;"><?= get_field('block9_text') ?></p>
    </div>
  </section>

  <section class="content-container pod-experience-footer">
    <div class="pod-experience-container">
    <?php if (get_field('footer_list')) : ?>
          <?php foreach (get_field('footer_list') as $item) : ?>
          <p><span class="disclaimer-text"><span class="font-12"><?= $item['text'] ?></span></span></p>
          <?php endforeach ?>
          <?php endif ?>
    </div>
  </section>
</main>


<script>
  function openPage(pageName, elmnt, color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

  }
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();


  function openPage2(pageName, elmnt, color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent-tried");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink-tried");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

  }
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen2").click();
</script>
<?php get_template_part('footer-omnipod')?>
<?php get_footer(); ?>