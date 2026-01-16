<?php
/**
 * Template Name: New Home
 *
 * Копия главной страницы со всеми компонентами.
 */

get_header();
?>

<div class="main-page new-home-page">
  <!-- Main -->
  <?php get_template_part('template-parts/home/main') ?>
  <!-- New Home Content -->
  <div class="new-home-content">
    <div class="home-product-info-fl-sensor">
      <h2> <?= get_field('black-block-text') ?>
      <?= get_field('black-block-text2') ?>  <span><?= get_field('black-block-text-blue') ?></span> 
        <a href="<?= get_field('black-block-link') ?>" target="_blank" rel="noopener noreferrer">
          <?= get_field('black-block-text-link') ?>
        </a>
      </h2>
    </div>
    <div class="new-home-librelink">
      <div class="container">
         <div class="row libre2-system mobile-mb-0  new-home-bg-block">
        <div class="col-sm-6 col-12 download-libre3-app">
          <div class="new-home-librelink-content">
            <h2><?= get_field('block-app-title') ?></h2>
            <p style="text-align: right;font-size:18px;font-weight: bold;"><?= get_field('block-app-text') ?></p>
            <div class="download-libre3-app-links">
              <?php $app_store_img = get_field('image-app-store'); ?>
              <a class="download-libre3-app-link-google"
                href="<?= get_field('image-app-store-link') ?>">
                <?= wp_get_attachment_image($app_store_img, 'full', false, ['class' => 'attachment-large size-large']) ?>
              </a>

              <?php $google_play_img = get_field('image-google-play'); ?>
              <a class="download-libre3-app-link-store"
                href="<?= get_field('image-google-play-link') ?>">
                <?= wp_get_attachment_image($google_play_img, 'full', false, ['class' => 'attachment-large size-large']) ?>
              </a>
            </div>
          </div>
          <p class="new-home-librelink-content-subtext">
            <?= get_field('block-app-footnote-text') ?>
          </p>

        </div>
        <div class="col-sm-6 col-12">
          <div class="new-home-fl-phone-image">
              <div class="new-home-fl-phone">
                <?php $app_phone_img = get_field('image-app-phone'); ?>
                <?php if ($app_phone_img) : ?>
                  <?= wp_get_attachment_image($app_phone_img, 'full', false, [
                    'class' => 'attachment-large size-large',
                    'alt'   => '',
                    'decoding' => 'async',
                    'sizes' => '(max-width: 243px) 100vw, 243px',
                    'width' => '243',
                    'height' => '365',
                  ]) ?>
                <?php endif; ?>
              </div>
              <div class="new-home-librelink-gl">
                <?php $fl_logo2 = get_field('image-app-fl-logo2'); ?>
                <?php if ($fl_logo2) : ?>
                  <?= wp_get_attachment_image($fl_logo2, 'full', false, ['alt' => '', 'style' => 'margin-bottom: 34px;']) ?>
                <?php endif; ?>
                <?php $fl_logo = get_field('image-app-fl-logo'); ?>
                <?php if ($fl_logo) : ?>
                  <?= wp_get_attachment_image($fl_logo, 'full', false, ['alt' => '']) ?>
                <?php endif; ?>
              </div>
            </div>
              <div class="device-compatible">
                <img style="margin-top: -5px;" width="22" height="20"
                  src="/wp-content/uploads/2026/01/ep_arrow-up-bold.svg" alt="">
                <a style="font-weight: 700;color: #fff !important;"
                  href="<?= get_field('linke-app-pdf') ?>">
                  <?= get_field('block-app-text-link-pdf') ?></a>
              </div>
          

        </div>
         </div>
      </div>
    </div>
    <div class="new-home-gluco-standard">
      <div class="row new-home-bg-block">
        <div class="col-12">
          <div class="new-home-gluco-standard-content">

            <div class="new-home-gluco-standard-content-text">
              <h2><?= get_field('glucostandard-title') ?></h2>
              <p><?= get_field('glucostandard-text') ?></p>
              <div class="new-home-gluco-standard-content-text-buttons">
                <a class="gluco-standard-content-blue-button" href="<?= get_field('linke-glucostandard-button1') ?>" target="_blank"
                  rel="noopener noreferrer"><?= get_field('text-glucostandard-button1') ?></a>
                <a class="gluco-standard-content-white-button" href="<?= get_field('linke-glucostandard-button2') ?>" target="_blank"
                  rel="noopener noreferrer"><?= get_field('text-glucostandard-button2') ?></a>
              </div>

            </div>
            <div class="new-home-gluco-standard-content-image">
              <?php $gluco_logo = get_field('glucostandard-logo'); ?>
              <?php if ($gluco_logo) : ?>
                <?= wp_get_attachment_image($gluco_logo, 'full', false, ['alt' => '']) ?>
              <?php endif; ?>
            </div>

          </div>
          <div class="new-home-gluco-standard-content-img"></div>
        </div>
      </div>

    </div>
    <div class="new-home-support" style="display: none;">
        <div class="container">
          <div class="row">
            <div class="col-md-6 new-home-support-content-left">
              <div class="new-home-support-content">
                <div class="new-home-support-content-img">
                  <img src="https://geffenmedical.co.il/wp-content/uploads/2026/01/support-image-main.png" alt=""
                    srcset="">
                </div>
                <div class="new-home-support-content-text">
                  <img src="https://geffenmedical.co.il/wp-content/uploads/2026/01/support-icon-main.svg" alt=""
                    srcset="" class="new-home-support-content-text-icon">
                  <h2>
                   <?= get_field('support-title') ?>
                  </h2>
                  <p> <?= get_field('support-text') ?>
                    <a href="<?= get_field('support-linke-button') ?>" target="_blank" rel="noopener noreferrer">
                        <?= get_field('support-text-button') ?>
                  </a>.</p>
                  <a class="new-home-support-content-text-form" href="<?= get_field('support-linke-button-form') ?>" target="_blank" rel="noopener noreferrer"><?= get_field('support-text-button-form') ?></a>
                </div>
              </div>
            </div>
            <div class="col-md-6 new-home-support-content-right">
              <div class="new-home-support-content">
                <div class="new-home-support-content-img">
                  <img src="https://geffenmedical.co.il/wp-content/uploads/2026/01/whatsapp-bg.png" alt=""
                    srcset="">
                </div>
                <a class="new-home-support-link" href="<?= get_field('whatsapp-linke-button') ?>" target="_blank"
                  rel="noopener noreferrer">
                  <?= get_field('whatsapp-text-button') ?>
                  <img src="https://geffenmedical.co.il/wp-content/uploads/2026/01/whatsapp-logo.svg" alt="" />
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

  <?php if ( ! is_user_logged_in() ) : ?>
  <!-- Benefits -->
  <?php get_template_part('template-parts/home/benefits') ?>
  <?php endif; ?>

  <!-- Companies -->


</div>

<?php
// get_sidebar();
get_footer();