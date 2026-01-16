<?php

/**
 * Template Name: Omnipod5-new-main
 * Template Post Type: omnipod5
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

<div class="omnipod-style-page">
  <style>
    .what-is-omnipod.omnipod-dash.back-to-school.omnipod-5 .use-desktop-block {
      background-image: url(/wp-content/uploads/2026/01/hero_podder_meg_photoshoot_mango-background_2000x700.png);
    }

    .bg-color-mango {
      background-color: #ffa700;
      margin-top: -10px;
      margin-bottom: 0px;
    }

    .m-66 {
      padding: 66px 0 !important;
    }

    .mb-66 {
      margin-bottom: 66px;
    }

    .flex-column {
      flex-direction: column;
    }
  </style>

  <main class="omnipod-main-page what-is-omnipod omnipod-dash back-to-school omnipod-5">

    <div class="omnipod-main-page-title use-desktop-block">
      <div class="fade-bg-img"></div>
      <div class="section g-24-40 m-120">
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <h1 class="h1"><?= get_field('title') ?></h1>
            <p><?= get_field('subtitle') ?></p>
            <div class="button-omnipod-block" style="justify-content: flex-start;">
              <a href="<?= get_field('block1_column_main_link') ?>" class="button-omnipod" role="button"
                target="_blank"><?= get_field('block1_column_main') ?></a>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">

          </div>

        </div>
      </div>
    </div>
    <div>
      <img class="use-desktop-block-mobile"
        src="/wp-content/uploads/2025/07/hero_omnipod_pod_women-in-pool_2000x400-e1752481491386-1-e1752652192177.png"
        alt="">
    </div>
    <div class="block-1-container layout-space-above">
      <div class="conteiner-1200 reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column">
              <?php 
                      $image = get_field('block1_image');
                      $size = 'full';
                      if( $image ) {
                      echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 384px; width: 100%; height: auto;' ) );
                      }
                    ?>
              <p class="field"><?= get_field('block1_img_text') ?></p>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">

              <div class="text-body mobile-w-83" style="margin-bottom: 40px;">
                <h2 class="omnipod-h2"><?= get_field('block1_title') ?></h2>
                <p><?= get_field('block1_text') ?></p>
                <div class="violet-border" style="display: flex;justify-content: flex-start;">
                  <a href="<?= get_field('block1_column1_link') ?>" role="button"
                    target="_blank"><?= get_field('block1_column1_button') ?></a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="omnipod5-violet-block  layout-space-above">
      <div class="container reader realReader m-t120">
        <div class="section g-24-40">
          <p style="text-align: center;"><?= get_field('block2_title') ?></p>
          <div class="violet-border">
            <a style="background: #fff;border-color: #fff;"
              href="<?= get_field('block2_button_link') ?>"><?= get_field('block2_button_text') ?></a>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-aqua-gradient layout-space-above">
      <div class="container reader realReader m-t120">
        <div class="believe-block">
          <div class="row row-1120">

            <div class="col-lg-6 col-sm-12">
              <div class="img-believe-block omnipod5-img-believe-block">
                <?php 
                  $image = get_field('block3_image');
                  $size = 'full';
                  if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                  }
                ?>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent">
              <div class="block-layout-builder">
                <h2 class="omnipod-h2 mobile-what-is-omnipod-h2"><?= get_field('block3_title') ?></h2>
                <div class="text-body">
                  <p><?= get_field('block3_text') ?></p>
                </div>
                <div class="violet-border" style="text-align: right;">
                  <a style="background: #fff;border-color: #fff;"
                    href="<?= get_field('block3_button_link') ?>"><?= get_field('block3_button_text') ?></a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-gray-gradient m-66 layout-space-above">
      <div class="container reader realReader m-t120">
        <div class="section g-24-40">
          <h2 class="omnipod-h2" style="text-align: center;width: 50%;
              margin: 0 auto 75px !important;"><?= get_field('block4_title') ?></h2>
          <div class="row">
            <div class="col-lg-6 col-sm-12 profile-nav pd-50">
              <div style="display: flex;justify-content: center;">
                <?php 
                      $image = get_field('block4_image_right');
                      $size = 'full';
                      if( $image ) {
                      echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 384px; width: 100%; height: auto;' ) );
                      }
                    ?>
              </div>

              <p class="field"><?= get_field('block4_img_text_right') ?></p>
              <h3 class="omnipod-h3" style="font-size: 30px !important;"><?= get_field('block4_title_right') ?></h3>
              <p><?= get_field('block4_text_right') ?></p>
              <div class="button-omnipod-block" style="justify-content: flex-start;">
                <a href="<?= get_field('block4_button_link_right') ?>" class="button-omnipod" role="button"
                  target="_blank"><?= get_field('block4_button_text_right') ?></a>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 profile-nav pd-50">
              <div style="display: flex;justify-content: flex-start;">
                <?php 
                      $image = get_field('block4_image_left');
                      $size = 'full';
                      if( $image ) {
                      echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 384px; width: 100%; height: auto;' ) );
                      }
                    ?>
              </div>

              <p class="field"><?= get_field('block4_img_text_left') ?></p>
              <h3 class="omnipod-h3" style="font-size: 30px !important;"><?= get_field('block4_title_left') ?></h3>
              <p><?= get_field('block4_text_left') ?></p>
              <div class="violet-border" style="display: flex;justify-content: flex-start;">
                <a href="<?= get_field('block4_button_link_left') ?>" role="button"
                  target="_blank"><?= get_field('block4_button_text_left') ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="bg-gray-gradient m-66 ">
      <div class="container reader realReader m-t120">
        <div class="believe-block">
          <div class="row row-1120">
            <h2 class="omnipod-h2 mobile-what-is-omnipod-h2" style="text-align: center;">
              <?= get_field('block5_title') ?></h2>
            <div class="col-lg-6 col-sm-12">
              <div class="img-believe-block omnipod5-img-believe-block">
                <?php 
                  $image = get_field('block5_image');
                  $size = 'full';
                  if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                  }
                ?>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent">
              <div class="block-layout-builder omnipod5-block-layout-builder">
                <div class="text-body">
                  <p><?= get_field('block5_text') ?></p>
                </div>

                <div class="button-omnipod-block" style="justify-content: flex-start;">
                  <a href="<?= get_field('block5_button_link') ?>" class="button-omnipod" role="button"
                    target="_blank"><?= get_field('block5_button_text') ?></a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-red-gradient-faq layout-space-above">
      <div class="conteiner-1200 reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="mt-50">
            <h2 class="omnipod-h2 mobile-what-is-omnipod-h2" style="text-align: right!important;">
            <?= get_field('block6_title') ?>
          </h2>
            </div>

            <div class="col-lg-4 col-sm-12 profile-nav">
              <div class="omnipod5-img-say-about podder-image-dash omnipod-dashnew-img"
                style="background-image: url(<?php 
                  $image = get_field('block6_image3');
                  if( $image ) {
                    $image_url = is_array($image) ? $image['url'] : wp_get_attachment_image_url($image, 'full');
                    echo esc_url($image_url);
                  }
                ?>); background-size: cover !important;">
              </div>

              <blockquote class="pull-quote">
              <?= get_field('block6_review3') ?>
              </blockquote>
              <p class="omnipod5-img-say-about-review-autor"> <?= get_field('block6_review3_autor') ?></p>
              <p class="omnipod5-img-say-about-review-attribution"> <?= get_field('block6_review3_attribution') ?></p>

            </div>

            <div class="col-lg-4 col-sm-12 profile-nav">
              <div class="omnipod5-img-say-about podder-image-dash omnipod-dashnew-img"
                style="background-image: url(<?php 
                  $image = get_field('block6_image2');
                  if( $image ) {
                    $image_url = is_array($image) ? $image['url'] : wp_get_attachment_image_url($image, 'full');
                    echo esc_url($image_url);
                  }
                ?>); background-size: cover !important;">
              </div>


              <blockquote class="pull-quote">
                <?= get_field('block6_review2') ?>
              </blockquote>
              <p class="omnipod5-img-say-about-review-autor"> <?= get_field('block6_review2_autor') ?></p>
              <p class="omnipod5-img-say-about-review-attribution"> <?= get_field('block6_review2_attribution') ?></p>

            </div>
            <div class="col-lg-4 col-sm-12  profile-nav">
              <div class="omnipod5-img-say-about podder-image-dash omnipod-dashnew-img"
                  style="background-image: url(<?php 
                    $image = get_field('block6_image1');
                    if( $image ) {
                      $image_url = is_array($image) ? $image['url'] : wp_get_attachment_image_url($image, 'full');
                      echo esc_url($image_url);
                    }
                  ?>); background-size: cover !important;">
                </div>
                <blockquote class="pull-quote">
                    <?= get_field('block6_review1') ?> 
                </blockquote>
                <p class="omnipod5-img-say-about-review-autor"> <?= get_field('block6_review1_autor') ?></p>
                <p class="omnipod5-img-say-about-review-attribution"> <?= get_field('block6_review1_attribution') ?></p>
                </blockquote>
              </div>
          </div>
          <div class="violet-border mt-50 white-border" style="display: flex;justify-content: center;">
                <a href="<?= get_field('block6_button_link') ?>" role="button" target="_blank"><?= get_field('block6_button_text') ?></a>
              </div>
        </div>
      </div>
    </div>



    <div class="block-1-container layout-space-above">
      <div class="conteiner-1200 reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row">
          <h2 class="omnipod-h2" style="text-align: center!important;"><?= get_field('block7_title') ?></h2>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column">
              <?php 
                      $image = get_field('block7_image');
                      $size = 'full';
                      if( $image ) {
                      echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 480px; width: 100%; height: auto;' ) );
                      }
                    ?>
             
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">

              <div class="text-body mobile-w-83" style="margin-bottom: 40px;">

                <p><?= get_field('block7_text') ?></p>
                <div class="violet-border" style="display: flex;justify-content: flex-start;margin-bottom:18px!important;">
                  <a href="<?= get_field('block7_button_link') ?>" role="button"
                    target="_blank"><?= get_field('block7_button_text') ?></a>
                </div>
                <p class="subtext-block7"><?= get_field('block7_subtext') ?></p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="layout-space-above">
      <div class="conteiner-1200 reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="mt-50">
            <h2 class="omnipod-h2 mobile-what-is-omnipod-h2" style="text-align: center!important;">
            <?= get_field('block8_title') ?>
          </h2>
            </div>

            <div class="col-lg-4 col-sm-12 profile-nav">
              <div class="omnipod5-img-say-about podder-image-dash omnipod-dashnew-img"
                style="background-image: url(<?php 
                  $image = get_field('block8_image1');
                  if( $image ) {
                    $image_url = is_array($image) ? $image['url'] : wp_get_attachment_image_url($image, 'full');
                    echo esc_url($image_url);
                  }
                ?>); background-size: cover !important;">
              </div>

              <p><?= get_field('block8_text1') ?></p>
              <div class="violet-border" style="display: flex;justify-content: center;margin-bottom:18px!important;">
                  <a href="<?= get_field('block8_button_link1') ?>" role="button"
                    target="_blank"><?= get_field('block8_button_text1') ?></a>
              </div>

            </div>

            <div class="col-lg-4 col-sm-12 profile-nav">
              <div class="omnipod5-img-say-about podder-image-dash omnipod-dashnew-img"
                style="background-image: url(<?php 
                  $image = get_field('block8_image2');
                  if( $image ) {
                    $image_url = is_array($image) ? $image['url'] : wp_get_attachment_image_url($image, 'full');
                    echo esc_url($image_url);
                  }
                ?>); background-size: cover !important;">
              </div>

              <p><?= get_field('block8_text2') ?></p>
              <div class="violet-border" style="display: flex;justify-content: center;margin-bottom:18px!important;">
                  <a href="<?= get_field('block8_button_link2') ?>" role="button"
                    target="_blank"><?= get_field('block8_button_text2') ?></a>
              </div>

            </div>
            <div class="col-lg-4 col-sm-12 profile-nav">
              <div class="omnipod5-img-say-about podder-image-dash omnipod-dashnew-img"
                style="background-image: url(<?php 
                  $image = get_field('block8_image3');
                  if( $image ) {
                    $image_url = is_array($image) ? $image['url'] : wp_get_attachment_image_url($image, 'full');
                    echo esc_url($image_url);
                  }
                ?>); background-size: cover !important;">
              </div>

                <p><?= get_field('block8_text3') ?></p>
              <div class="violet-border" style="display: flex;justify-content: center;margin-bottom:18px!important;">
                  <a href="<?= get_field('block8_button_link3-1') ?>" role="button"
                    target="_blank"><?= get_field('block8_button_text3-1') ?></a>
              </div>
              <div class="violet-border" style="display: flex;justify-content: center;margin-bottom:18px!important;">
                  <a href="<?= get_field('block8_button_link3-2') ?>" role="button"
                    target="_blank"><?= get_field('block8_button_text3-2') ?></a>
              </div>

            </div>
        </div>
      </div>
    </div>


    <div class="container reader realReader layout-space-above">
      <div class="container reader realReader m-t120">
        <div class="footer-list mobile-w-83">
          <?php if (get_field('footer_list')) : ?>
          <?php foreach (get_field('footer_list') as $item) : ?>
          <p class="field" style="text-align: right !important;"><?= $item['text'] ?></p>
          <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>