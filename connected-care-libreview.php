<?php

/**
 * Template Name: Connected-care-libreview
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
  .container-fl {
    max-width: 1110px !important;
    width: 100%;
    margin: 0 auto;
    padding-top: 40px;
  }

  .firstuse-tab-item {
    width: 256px;
    border-radius: 8px;
    box-shadow: 0 0 4px 0 #d4d4d4;
    border: 1px solid #d9d9d6;
    margin: 0 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .firstuse-tab-item img {
    width: 83px;
  }

  .tab-item.firstuse-tab-item:hover span {
    font-weight: 700;
  }

  .tab-item.firstuse-tab-item:hover {
    background-color: transparent !important;
  }

  .firstuse-tab-item.active {
    width: 256px;
    border: 1px solid #001489 !important;
    border-radius: 8px;
    height: 256px;
  }

  .firstuse-tabs-items {
    display: flex;
    justify-content: center;
    border: none;
  }

  .download-libre3-app {
    padding: 0 60px;
    justify-content: center;
    flex-direction: column;
    display: flex;
  }

  .download-libre3-app h2 {
    text-align: left;
  }

  .download-libre3-app-links {
    padding-top: 40px;
    display: flex;
    justify-content: end;
  }

  .download-libre3-app-link-google {
    margin-left: 20px;
  }

  .download-libre3-app-video {
    position: relative;
    height: 37em;
  }

  .download-libre3-app-video iframe {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
  }

  .a-container--dark {
    background-color: #ececeb;
    padding-top: 40px;
    padding-bottom: 80px;
    padding-left: 30px;
    padding-right: 30px;
  }

  .instructions-use-fl3 .accordion-item:last-child .accordion-header {
    border-bottom: 1px solid #000;
  }

  .a-container--dark .tab-item {
    font-size: 14px;
  }

  .a-container--dark h2 {
    font-size: 38px !important;
    font-weight: 700;
    color: #000;
    text-align: center !important;
  }

  .instruction-use-fl3 button {
    border: none;
    margin-right: 10px;
    margin-bottom: 14px;
  }

  .instruction-use-fl3 {
    text-align: right;
  }


  .instructions-use-fl3 .accordion-header {
    display: flex;
    font-size: 24px;
    justify-content: space-between;
    padding: 10px;
    cursor: pointer;
    border-top: 1px solid #000;
    flex-direction: row-reverse;
  }

  .instructions-use-fl3 .accordion-header .icon {
    font-size: 40px;
    width: 2em;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .instructions-use-fl3 .accordion-header p {
    width: 75%;
    text-align: start;
    color: #000;
  }

  .instructions-use-fl3 .accordion-item {
    background: transparent;
    border: none;
  }

  .instructions-use-fl3 .accordion-content {
    display: none;
    padding: 10px;
  }

  .row.libre2-system {
    background: #ececeb;
    padding: 40px 15px;
  }

  .tutorial-videos {
    display: flex;
    margin-bottom: 1.5em;
  }

  .tutorial-videos a {
    background-color: rgb(0, 20, 137);
    border-radius: 80px;
    padding: 13px 32px;
    font-size: 16px;
    text-transform: uppercase;
    color: #fff !important;
    font-weight: 700;
  }

  .fl2-create-account li {
    margin-bottom: 3em;
  }

  .firstuse-setup-alarms {
    background-color: #ffd100;
    padding: 3em 0;
  }

  .fistyre-supported-item {
    padding: 16px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 2px 4px 0px, rgba(141, 141, 148, 0.28) 0px 4px 8px -2px;
    margin: 15px;
    border-radius: 4px;
  }

  .fistyre-supported {
    display: flex;
    justify-content: center;
  }

  .fistyre-supported .m-card__title.h4 {
    font-size: 18px;
    color: #000;
    font-weight: 700;
    text-align: end;
    line-height: 24px;
    padding-top: 36px;
    margin-bottom: 10px !important;
  }

  .fistyre-supported .m-card__description p {
    font-size: 14px;
    text-align: start;
    color: rgb(99, 102, 106);
    line-height: 20px;
  }

  .bor-yell {
    border-radius: 4px;
    border-top: 8px solid #ffd100;
    width: 216px;
    margin: 0;
    height: 135px;
  }

  a.firstuse-related {
    display: block;
    width: 216px;
    position: relative;
  }

  .a-tile__title-text {
    font-size: 16px;
    color: #000;
    text-align: end;
    font-weight: 700;
  }

  .a-tile__para {
    color: rgb(0, 20, 137);
    text-align: end;
  }

  a.firstuse-related:hover .bor-yell {
    border-top: 8px solid transparent;
  }

  a.firstuse-related:hover .a-tile__title-text {
    color: #fff;
  }

  a.firstuse-related:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 0;
    background: #001489;
    border-radius: 4px;
    transition: all 1s ease;
    z-index: -1;
  }

  a.firstuse-related:hover:before {
    height: 135px;
  }

  .bg-236 {
    background: rgb(236, 236, 235);
    padding: 40px 0;
  }

  .device-compatible {
    display: flex;
    justify-content: center;
    align-items: end;
  }

  .device-compatible a {
    color: rgb(0, 61, 165) !important;
    font-size: 14px;
    font-weight: 700;
    margin-top: 40px;
    padding-right: 10px;
  }

  .device-compatible a:hover {
    color: #001489 !important;
    text-decoration: underline !important;
  }

  .librelink-connected-care-title .container.reader.realReader {
    background: url(/wp-content/uploads/2023/11/grandmother-hugging-grandchildren-sensor-banner.png);
    padding: 10rem 0 5rem;
    background-position-x: left;
    background-position-y: center;
  }

  .librelink-connected-care-title .container.reader.realReader h1 {
    text-transform: none !important;
    text-align: right;
  }

  .librelink-connected-care-title .container.reader.realReader p {
    font-size: 18px;
    text-align: right;
  }

  .connected-care-tabs-title {
    font-size: 18px;
    color: #000;
  }

  .connected-care-tabs-text {
    font-size: 14px;
    color: #000;
  }

  .librelink-connected-care-bg {
    background: radial-gradient(circle, rgb(0, 20, 137) 1%, rgb(0, 14, 94) 100%);
    margin-bottom: 20px;
  }

  h2.connected-care-bg-title {
    color: #fff !important;
    text-transform: none !important;
    margin-bottom: 16px !important;

  }

  .connected-care-bg-subtitle {
    font-size: 18px;
    color: #fff !important;
    font-weight: 700;
  }

  .mobile-img-title {
    display: none;
  }

  .block-wt {
    background: #fff;
    padding: 0;
    width: 330px;

  }

  .librelink-connected-care-bg-video a {
    display: flex;
    color: #003da5 !important;
    font-weight: 700;
    text-decoration: underline !important;
  }

  .btn-connected-care-video {
    margin: 60px 0;
    text-align: center;
  }

  .btn-connected-care-video span {
    text-transform: uppercase;
    background: #fff;
    color: #001489;
    font-weight: 700;
    font-size: 16px;
    border-radius: 80px;
    padding: 13px 32px;
  }

  .m-card__body_img img {
    width: 100%;
  }

  .block-wt .m-card__body {
    padding: 16px 16px 24px
  }

  .block-wt .m-card__title.h4 {
    padding: 0;
    text-align: right;
  }

  .block-wt .card__description p {
    text-align: right;
  }

  .connected-care-bg-mb {
    padding: 60px 0 0;
    margin-bottom: 0;
  }

  .connected-care-faq {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .connected-care-faq .connected-care-tabs-text {
    max-width: 80%;
    text-align: right;
  }

  .connected-care-libreview-account {
    justify-content: center;
  }

  .tutorial-videos a:hover {
    box-shadow: rgba(0, 0, 0, 0.66) 0px 1px 12px 0px;
  }
.fistyre-supported-libreview{
  flex-wrap: nowrap;
}
  @media (max-width: 560px) {
    .librelink-connected-care-title .container.reader.realReader {
      background: transparent;
      padding: 0;
    }
    .fistyre-supported-libreview{
  flex-wrap: wrap;
}
    .mobile-img-title {
      display: block;
    }
  }

  .bg-wt {
    background: #fff;
    border-radius: 4px;
    padding: 0 16px 24px;
  }

  .bg-wt h2,
  .connected_care_libreview_step {
    font-size: 18px !important;
    margin: 0 0 12px !important;
    line-height: 24px;
    text-transform: none !important;
  }

  .connected_care_libreview_step_text {
    font-size: 14px;
    color: #000;
  }

  .btn-connected-care-video span::before {
    content: "";
    display: inline-block;
    background: url("/wp-content/uploads/2023/11/connect.png");
    width: 30px;
    height: 28px;
    transform: translate(0px, 10px);
  }

  .btn-connected-care-video:hover span {
    background: #001489;
    color: #fff;
  }

  .btn-connected-care-video:hover span::before {
    content: "";
    display: inline-block;
    background: url("/wp-content/uploads/2023/11/connect-hover.png");
    width: 30px;
    height: 28px;
    transform: translate(0px, 10px);
  }

  .font-12 {
    font-size: 12px !important;
  }
  .care_connected_mcard_img{
    height: 185px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>
<div class="free-style-libre">
  <?php get_template_part('template-parts/breadcrumbs') ?>

  <main class="libre librelink-app">

    <div class="connected-care-libreview-title">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <h1 style="text-align: center;margin-bottom: 40px!important;">
              <?= get_field('title') ?>
            </h1>
            <h3><?= get_field('text') ?></h3>
          </div>
        </div>
      </div>
    </div>

    <?php if (get_field('youtube')) : ?>
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="download-libre3-app-video">
            <iframe src="<?= get_field('youtube') ?>" title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    <?php endif ?>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2><?= get_field('text_2') ?></h2>
            <?php if (get_field('url')) : ?>
              <div class="tutorial-videos connected-care-libreview-account">
                <a href="<?= get_field('url') ?>"><?= get_field('link_label') ?></a>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row libre2-system">
          <h2 style="margin-top: 1.5em;"><strong><?= get_field('block1_title') ?></strong></h2>
          <div class="row">
            <div class="columncontrol column-align--center">
              <div class="container">
                <div class="row fl-r-revers">

                <?php $field = get_field('block1_list') ?>
                <?php if ($field) : ?>
                  <?php foreach ($field as $item) : ?>
                    <div class="col-12 col-md-4 col-lg-4 columncontrol__column ">
                      <article class="m-card m-card--large m-card--padding m-card--fit bg-wt" style="height: 392px;">
                        <div class="m-card__media">
                          <div class="m-card__wrap">
                            <div class="m-card__image care_connected_mcard_img">
                              <div class="cmp-image cmp-image--desktop">
                                <?php show_image($item['image'], 'full', ['class'=> 'cmp-image__image a-image__default']) ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="m-card__body">
                          <h2 class="m-card__title h4"><?= $item['title'] ?></h2>
                          <div class="m-card__description">
                            <div style="text-align: center;"><?= $item['text'] ?></div>
                          </div>

                          <div class="nonClickableLink nonclickablelink">
                            <p class="font-weight-bold"></p>
                          </div>
                        </div>
                      </article>
                    </div>
                  <?php endforeach ?>
                <?php endif ?>

                </div>
              </div>
            </div>
          </div>
          <h2 style="margin-top: 1.5em;"><strong><?= get_field('block1_subtitle') ?></strong></h2>
          <div style="	text-align: center;">
            <?= get_field('block1_text') ?>
          </div>
        </div>
      </div>
    </div>


    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row tab-content" style="display: flex;">
          <div class="col-sm-5 middle">
            <h2><?= get_field('block2_title') ?></h2>
            <div><?= get_field('block2_text') ?></div>

            <ul class="tab-list">
            <?php $field = get_field('block2_list') ?>
            <?php if ($field) : ?>
              <?php foreach ($field as $key => $item) : ?>
                <?php
                  $key++;
                  $num = $key < 10 ? '0' . $key : $key;
                ?>
                <li class="list-item">
                  <span class="count"><?= $num ?></span>
                  <h4 class="connected_care_libreview_step"><?= $item['title'] ?></h4>
                  <p class="connected_care_libreview_step_text"><?= $item['text'] ?></p>
                </li>
              <?php endforeach ?>
            <?php endif ?>
            </ul>

            <?php if (get_field('block2_url')) : ?>
              <div class="tutorial-videos realworldevidence-button-rt">
                <a href="<?= get_field('block2_url') ?>" target="_self">
                  <span><?= get_field('block2_link_label') ?></span>
                </a>
              </div>
            <?php endif ?>
          </div>

          <div class="col-sm-7" style="text-align: end;">
            <?php show_image(get_field('block2_image')) ?>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row">
          <div class="librelink-connected-care-bg">
            <div class="container reader realReader">
              <div class="section g-24-40 connected-care-bg-mb">
                <div class="row">
                  <div class="col-12">
                    <h2 class="connected-care-bg-title"><?= get_field('block3_title') ?></h2>
                    <div class="connected-care-bg-subtitle">
                      <?= get_field('block3_text') ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php if (get_field('block3_url')) : ?>
                <div class="row">
                  <a class="btn-connected-care-video" href="<?= get_field('block3_url') ?>">
                    <span>
                      <?= get_field('block3_link_label') ?>
                    </span>
                  </a>
                </div>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="firstuse-setup-alarms">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <h2 style="margin-top: 40px;"><strong><?= get_field('block4_title') ?></strong></h2>

            <?php $field = get_field('block4_list') ?>
            <?php if ($field) : ?>
              <?php foreach ($field as $item) : ?>
              <div class="col-12 col-md-6">
                <p class="m-card__title h4"><strong><?= $item['title'] ?></strong></p>
                <div><?= $item['text'] ?></div>
              </div>
              <?php endforeach ?>
            <?php endif ?>

          </div>
        </div>
      </div>
      <?php if (get_field('block4_url')) : ?>
        <div class="tutorial-videos" style="justify-content: center;">
          <a href="<?= get_field('block4_url') ?>"><?= get_field('block4_link_label') ?></a>
        </div>
      <?php endif ?>

    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <h2 style="margin: 40px 0 8px 0!important;" class="benefitsforme-try-your-sensor"><strong><?= get_field('block5_title') ?></strong></h2>

        <div class="fistyre-supported fistyre-supported-libreview">

          <?php $field = get_field('block5_list') ?>
          <?php if ($field) : ?>
            <?php foreach ($field as $item) : ?>

            <div class="col-12 col-md-4 col-lg-4 middle fistyre-supported-item block-wt">
              <div class="m-card__body_img">
                <?php show_image($item['image'], [270,221], ['class'=> 'cmp-image__image a-image__default']) ?>
              </div>
              <div class="m-card__body">
                <h2 class="m-card__title h4"><?= $item['title'] ?></h2>
                <div class="m-card__description">
                  <?= $item['text'] ?>
                </div>

                <?php if ($item['url']) : ?>
                  <div class="librelink-connected-care-bg-video">
                    <a href="<?= $item['url'] ?>">
                     <span><?= $item['link_label'] ?></span>
                      <img style="transform: rotate(180deg);" src="/wp-content/uploads/2023/09/164412.png" alt="">
                    </a>
                  </div>
                <?php endif ?>
              </div>
            </div>

            <?php endforeach ?>
          <?php endif ?>

        </div>
      </div>
    </div>

    <div class="bg-236">
      <div class="container reader realReader">
        <div class="footer-list">
          <p><b><?= get_field('footer_title') ?></b></p>

          <?php $field = get_field('footer_list') ?>
          <?php if ($field) : ?>
            <?php foreach ($field as $item) : ?>
              <p>
                <span class="disclaimer-text">
                  <span class="color-text-gray">
                    <span class="font-12">
                      <em>
                      <?= $item['text'] ?>
                      </em>
                    </span>
                  </span>
                </span>
              </p>
            <?php endforeach ?>
          <?php endif ?>

        </div>
      </div>
    </div>

  </main>
</div>

<?php get_footer(); ?>