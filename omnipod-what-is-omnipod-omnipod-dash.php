<?php

/**
 * Template Name: Omnipod-dash-new
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

<div class="omnipod-style-page">

  <main class="omnipod-main-page what-is-omnipod omnipod-dash new-mp">

    <div class="omnipod-main-page-title use-desktop-block">
      <div class="fade-bg-img"></div>
      <div class="section g-24-40 m-120">
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <h1 class="h1"><?= get_field('title') ?></h1>
            <div class="banner-text">
              <p><?= get_field('subtitle') ?></p>
              <div class="button-omnipod-block" style="justify-content: flex-start;">
                <a href="<?= get_field('main_button_link') ?>" class="button-omnipod" role="button"
                  target="_blank"><?= get_field('main_button') ?></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">
          </div>
        </div>
      </div>
    </div>
    <div> <img class="use-desktop-block-mobile" src="/wp-content/uploads/2024/07/Hero-Banner_Podder-mob.jpg" alt="">
    </div>
    <div class="conteiner reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-12 col-sm-12 f-alit-cent js-content-centr fl-der-col">

            <div class="text-body insulin-management" style="margin-bottom: 40px;">
              <h3 class="omnipod-h3"><?= get_field('block1_title') ?></h3>
              <p><?= get_field('block1_text') ?></p>
              <p class="field" style="text-align: right !important;"><?= get_field('block1_subtitle') ?></p>
            </div>
            <div class="podder-image-dash"
              style="background:url(/wp-content/uploads/2024/04/1col_podder-using-pdm_2000x1500x96.jpg);background-size: cover !important;background-repeat: no-repeat;">
            </div>
            <div class="text-body insulin-management" style="margin-top: 40px;">
              <p><?= get_field('block1_text_second') ?></p>
              <?php if (get_field('block1_subtitle__second')) : ?>
              <?php foreach (get_field('block1_subtitle__second') as $item) : ?>
              <p class="field" style="text-align: right !important;margin-bottom: 0 !important"><?= $item['text'] ?></p>
              <?php endforeach ?>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-gray-gradient">
      <div class="conteiner-792 reader realReader">
        <div class="section g-24-40">
          <div class="row">
          <div class="col-lg-6 col-sm-12">
              <div class="podder-image-dash"
                style="background: url(/wp-content/uploads/2024/04/pod-shape_podder-lucy_uk_single_indoors_guitar_330x422x96.png);">
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent">
              <div class="text-body">
                <h2 class="omnipod-h2"><?= get_field('block2_title') ?></h2>
                <div class="violet-border"><a
                    href="<?= get_field('block2_link') ?>"><?= get_field('block2_text_link') ?>
                  </a></div>
                <p class="field" style="text-align: right !important;margin-top:15px!important;"><?= get_field('block2_subtitle') ?>
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="omnipod-main-page-title paperless-title-block-small" style="border-top-left-radius: 150px; border-top-right-radius: 0;">
        <div class="section">
          <div class="row">
            <div class="col-lg-10 col-sm-12">
              <h2 class="omnipod-h2" style="text-align: center;"><?= get_field('block3_title') ?></h2>
            </div>
            <div class="col-lg-2 col-sm-12">

            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="bg-gray-gradient">
      <div class="conteiner-792 reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-lg-7 col-sm-12 f-alit-cent">
              <div class="instructions-use-fl3 omnipod-accordions-page paperless-accordion">
                <div class="accordion">
                  <div class="accordion-item">
                    <div class="accordion-header">
                      <span class="icon">+</span>
                      <p><strong><?= get_field('block3_title_tab') ?></strong></p>
                    </div>
                    <div class="accordion-content" style="display: none;">
                      <div class="guides-list conteiner-968">
                        <div class="text-body">
                          <p><?= get_field('block3_text') ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>
            <div class="col-lg-5 col-sm-12">
              <?php
              $image = get_field('block3_image');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size);
              }
            ?>
            </div>

          </div>
        </div>
      </div>
    </div>


    <div class="m-t120">
      <div class="omnipod-main-page-title paperless-title-block-small-b">
        <div class="section">
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <h2 class="omnipod-h2" style="text-align: center;"><?= get_field('block4_title') ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-gray-gradient">
      <div class="conteiner-792 reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-lg-7 col-sm-12 f-alit-cent">
              <div>

                <?php if (get_field('block4_tab')) : ?>
                <?php foreach (get_field('block4_tab') as $tab) : ?>
                <div class="instructions-use-fl3 omnipod-accordions-page paperless-accordion">
                  <div class="accordion">
                    <div class="accordion-item">
                      <div class="accordion-header">
                        <span class="icon">+</span>
                        <p><strong><?= $tab['title'] ?></strong></p>
                      </div>
                      <div class="accordion-content" style="display: none;">
                        <div class="guides-list conteiner-968">
                          <div class="text-body">
                            <p><?= $tab['text'] ?></p>
                            <p class="field" style="text-align: right !important;"><?= $tab['subtitle'] ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
              </div>

            </div>
            <div class="col-lg-5 col-sm-12 f-alit-cent">
              <?php
              $image = get_field('block4_image');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size);
              }
            ?>
            </div>

          </div>
        </div>
      </div>
    </div>


    <div class="bg-gray-gradient m-t120">
      <div class="conteiner-792 reader realReader">
        <div class="section g-24-40">
          <div class="row">
          <div class="col-lg-6 col-sm-12 f-alit-cent">
              <div class="text-body">
                <h2 class="omnipod-h2"><?= get_field('block5_title') ?></h2>
                <div><a class="button-omnipod"
                    href="<?= get_field('block5_button_link') ?>"><?= get_field('block5_button') ?> </a></div>

                <p class="field" style="text-align: right !important;margin-top: 15px!important;"><?= get_field('block5_subtext') ?></p>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div class="podder-image-dash"
                style="background: url(/wp-content/uploads/2024/04/pod-shape_podder-myrthe_barcelona_single_outdoors-camera_330x422x96.png);">
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


    <div class="conteiner reader realReader m-t120">
      <div class="section">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2" style="text-align: center;"><?= get_field('block6_title') ?></h2>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-gray-gradient">
      <div class="conteiner-1200 reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-lg-4 col-sm-12 profile-nav">
              <?php
              $background_image1 = get_field('block6_step1_background_image');
              ?>
              <div class="podder-image-dash omnipod-dashnew-img"
                style="background-image: url(<?php echo wp_get_attachment_image_url($background_image1, '300-422') ?>); background-size: cover !important;">
              </div>
              <!-- <div class="podder-image-dash"
                style="background: url(/wp-content/uploads/2024/04/3col_how-to-use-step-1_omnipod-dash_680x510x96.jpg);background-repeat: no-repeat;    background-size: cover !important; ">
              </div>-->
              <p class="dach-step-insulin"><?= get_field('block6_step1_title') ?></p>
              <p><?= get_field('block6_step1_text') ?></p>
            </div>

            <div class="col-lg-4 col-sm-12 profile-nav">
              <?php
              $background_image2 = get_field('block6_step2_background_image');
              ?>
              <div class="podder-image-dash omnipod-dashnew-img"
                style="background-image: url(<?php echo wp_get_attachment_image_url($background_image2, '300-422') ?>); background-size: cover !important;">
              </div>
              <!-- <div class="podder-image-dash"
                style="background: url(/wp-content/uploads/2024/04/3col_how-to-use-step-2_omnipod-dash_680x510x96.jpg);background-repeat: no-repeat;    background-size: cover !important;">
              </div>-->
              <p class="dach-step-insulin"><?= get_field('block6_step2_title') ?></p>
              <p><?= get_field('block6_step2_text') ?></p>
            </div>
            <div class="col-lg-4 col-sm-12  profile-nav">
              <?php
              $background_image3 = get_field('block6_step3_background_image');
              ?>
              <div class="podder-image-dash omnipod-dashnew-img"
                style="background-image: url(<?php echo wp_get_attachment_image_url($background_image3, '300-422') ?>); background-size: cover !important;">
              </div>
              <!--<div class="podder-image-dash"
                style="background:url(/wp-content/uploads/2024/04/3col_how-to-use-step-3_omnipod-dash_680x510x96.jpg);background-repeat: no-repeat;    background-size: cover !important;">
              </div>-->
              <p class="dach-step-insulin"><?= get_field('block6_step3_title') ?></p>
              <p><?= get_field('block6_step3_text') ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-10 col-sm-12">
            <h2 class="omnipod-h2"><?= get_field('block7_title') ?></h2>
            <div class="text-body">
              <?= get_field('block7_text') ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-gray-gradient">
      <div class="conteiner-792 reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-lg-6 col-sm-12">
              <div class="text-body">
                <h3 class="omnipod-h3"><?= get_field('block8_title1') ?></h3>
                <p><?= get_field('block8_text1') ?></p>
                <p class="field" style="text-align: right !important;"><?= get_field('block8_subtext1') ?></p>
                <div class="button-omnipod-block" style="justify-content: flex-start;margin-top: 50px;">
                  <a href="<?= get_field('block8_button_link1') ?>" class="button-omnipod" role="button"
                    target="_blank"><?= get_field('block8_button1') ?></a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent">
              <div class="text-body">
                <h3 class="omnipod-h3"><?= get_field('block8_title2') ?></h3>
                <p><?= get_field('block8_text2') ?></p>
                <p class="field" style="text-align: right !important;"></p>

                <div class="button-omnipod-block" style="justify-content: flex-start;margin-top: 50px;">
                  <a href="<?= get_field('block8_button_link2') ?>" class="button-omnipod" role="button"
                    target="_blank"><?= get_field('block8_button2') ?></a>

                </div>
                <p class="field g-24-40" style="text-align: right !important;margin-top:15px!important;"><?= get_field('block8_subtext2') ?> </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="conteiner reader realReader">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <div class="text-body">
              <p class="field g-24-40" style="text-align: right !important;"><?= get_field('footer_subtext') ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
</div>

<?php get_footer(); ?>