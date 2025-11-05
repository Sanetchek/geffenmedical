<?php

/**
 * Template Name: Omnipod-pod-therapy
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

  <main class="omnipod-main-page what-is-omnipod  new-mp pod-therapy-block">
    <div class="omnipod-main-page-title paperless-title-block use-desktop-block">
      <div class="g-24-40 m-120">

        <div class="row">
          <div class="col-lg-10 col-sm-12">
            <div class="fade-bg-img" style="z-index:0;"></div>
            <h1 class="h1" style="z-index: 2;position: relative;"><?= get_field('title') ?></h1>
          </div>
          <div class="col-lg-2 col-sm-12">
          </div>
        </div>
      </div>
    </div>
    <div> <img class="use-desktop-block-mobile" src="/wp-content/uploads/2024/07/banner22.jpg" alt=""></div>

    <div class="container reader realReader">
      <div>
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12 mobile-w-83">
            <div class="text-body">
              <p><?= get_field('blockmain_text') ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="conteiner-1200 reader realReader">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr mobile-w-83">
            <div class="text-body" style="margin-bottom: 40px;">
              <h2 class="omnipod-h2"><?= get_field('title_block1') ?></h2>
              <p><?= get_field('block1_text') ?></p>
              <p class="field" style="text-align: right !important;margin-top:20px!important;">
                <?= get_field('block1_subtext') ?></p>
            </div>
          </div>

          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">
            <?php
            $background_image = get_field('background_image1');
            ?>
            <div class="podder-image-dash"
              style="background-image: url(<?php echo wp_get_attachment_image_url($background_image, '300-422') ?>); background-size: cover !important;">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12 mobile-w-83">
            <h2 class="omnipod-h2"><?= get_field('title_block2') ?></h2>
            <div class="text-body">
              <p><?= get_field('block2_text') ?></p>
              <p class="field" style="text-align: right !important;margin-top:20px!important;">
                <?= get_field('block2_subtext') ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <?php
              $image = get_field('block2_img');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
            <p><?= get_field('block2_text2') ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="df-end">
      <div class="omnipod-main-page-title paperless-title-block-small" style="max-width: 78%;">
        <div class="section">
          <div class="row">
          <div class="col-lg-2 col-sm-12">

</div>
            <div class="col-lg-10 col-sm-12">
              <h2 class="omnipod-h2"><?= get_field('block3_title') ?></h2>
            </div>


          </div>
        </div>
      </div>
    </div>


    <div class="conteiner-1200 reader realReader">
      <div class="section g-24-40">
        <div class="row">

          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr mobile-w-83">
            <div>
              <?php if (get_field('block3_tab')) : ?>
              <?php foreach (get_field('block3_tab') as $tab) : ?>
              <div class="instructions-use-fl3 omnipod-accordions-page paperless-accordion">
                <div class="accordion">
                  <div class="accordion-item">
                    <div class="accordion-header">
                      <span class="icon">+</span>
                      <p style="font-size: 18px!important;"><strong><?= $tab['title'] ?></strong></p>
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
          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">
            <?php
              $image = get_field('block3_img');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="conteiner reader realReader m-t120">
      <div class="section">
        <div class="row  f-alit-cent mobile-w-83" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2" style="text-align: center;"><?= get_field('block4_title') ?></h2>
            <p style="text-align: center;"><?= get_field('block4_text') ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="conteiner-1200 reader realReader omnipod-style-page">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-4 col-sm-12  profile-nav">
            <?php
              $background_image3 = get_field('block5_step3_background_image');
              ?>
            <div class="podder-image-dash"
              style="background-image: url(<?php echo wp_get_attachment_image_url($background_image3, '300-422') ?>); background-size: cover !important;">
            </div>
            <!--<div class="podder-image-dash"
          style="background:url();background-repeat: no-repeat;    background-size: cover !important;">
        </div>-->
            <p class="dach-step-insulin"><?= get_field('block5_step3_title') ?></p>
            <p><?= get_field('block5_step3_text') ?></p>
          </div>
          <div class="col-lg-4 col-sm-12 profile-nav">
            <?php
              $background_image2 = get_field('block5_step2_background_image');
              ?>
            <div class="podder-image-dash"
              style="background-image: url(<?php echo wp_get_attachment_image_url($background_image2, '300-422') ?>); background-size: cover !important;">
            </div>
            <!--<div class="podder-image-dash"
          style="background: url(/wp-content/uploads/2024/04/3col_how-to-use-step-2_omnipod-dash_680x510x96.jpg);background-repeat: no-repeat;    background-size: cover !important;">
        </div>-->
            <p class="dach-step-insulin"><?= get_field('block5_step2_title') ?></p>
            <p><?= get_field('block5_step2_text') ?></p>
          </div>
          <div class="col-lg-4 col-sm-12 profile-nav">
            <?php
              $background_image1 = get_field('block5_step1_background_image');
              ?>
            <div class="podder-image-dash"
              style="background-image: url(<?php echo wp_get_attachment_image_url($background_image1, '300-422') ?>); background-size: cover !important;">
            </div>
            <!--<div class="podder-image-dash"
          style="background: url(/wp-content/uploads/2024/04/3col_how-to-use-step-1_omnipod-dash_680x510x96.jpg);background-repeat: no-repeat;    background-size: cover !important; ">
        </div>-->
            <p class="dach-step-insulin"><?= get_field('block5_step1_title') ?></p>
            <p><?= get_field('block5_step1_text') ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="m-t120">
      <div class="omnipod-main-page-title paperless-title-block-small-b">
        <div class="section">
          <div class="row">
            <div class="col-lg-3 col-sm-12">
            </div>
            <div class="col-lg-9 col-sm-12">
              <h2 class="omnipod-h2" style=" text-align: right;"><?= get_field('block6_title') ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="conteiner-1200 reader realReader omnipod-style-page">
      <div class="section g-24-40">
        <div class="row">
        <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr mobile-w-83">
            <div class="guides-list">
              <p class="dach-step-insulin"><?= get_field('block6_subtitle') ?></p>
              <p><?= get_field('block6_text') ?></p>
            </div>

          </div>
          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">
            <?php
              $image = get_field('block6_img');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
          </div>


        </div>
      </div>
    </div>

    <div class="violet-block" style="border-radius: 0;background-color: #ffa700;">
      <div class="container reader realReader">
        <div>
          <div class="row fl-center">
            <div class="block-violet-content">
              <h3 class="h3" style="color:#000!important;font-size: 48px !important;"><?= get_field('block7_title') ?>
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="conteiner reader realReader m-t120">
      <div class="section g-24-40" style="margin-bottom: 5%;">
        <div class="row">

          <?php if (get_field('key_benefits')) : ?>
          <?php foreach (get_field('key_benefits') as $key) : ?>
          <div class="col-lg-4 col-sm-12 f-alit-cent js-content-centr">
            <div class="key-block">
              <?php
              $image = $key['img'] ;
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>

              <div style="height: 121px">
                <p><strong><?= $key['title'] ?></strong></p>
                <p><?= $key['text'] ?></p>
              </div>
            </div>
          </div>
          <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40 violet-block" style="padding: 0 0 15px;margin-bottom: 8%;">
        <div class="row fl-center">
          <div class="block-violet-content">
            <h3 class="h3" style="text-align: right !important;font-size: 48px !important;">
              <?= get_field('block8_title') ?>
            </h3>
            <p><?= get_field('block8_text') ?></p>
            <div class="violet-border"><a style="background-color: #fff;"
                href="<?= get_field('block8_button_link') ?>"><?= get_field('block8_button_text') ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="footer-list mobile-w-83">
        <p style="font-size:20px;"><b><?= get_field('footer_title') ?></b></p>
        <?php if (get_field('footer_list')) : ?>
        <?php foreach (get_field('footer_list') as $item) : ?>
        <p class="field" style="text-align: right !important;"><?= $item['text'] ?></p>
        <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>

  </main>
</div>
<?php get_footer(); ?>
