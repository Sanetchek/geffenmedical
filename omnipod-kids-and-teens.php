<?php

/**
 * Template Name: Omnipod-kids-and-teens
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

  <main class="omnipod-main-page what-is-omnipod omnipod-dash kids-and-teens new-mp">

    <div class="omnipod-main-page-title use-desktop-block" style="padding: 28px 120px;">
      <div class="fade-bg-img"></div>
      <div class="section g-24-40 m-120">
        <div class="row">
        <div class="col-lg-5 col-sm-12">
            <h1 class="h1" style="line-height: 62px;"><?= get_field('title') ?></h1>
          </div>
          <div class="col-lg-7 col-sm-12">

          </div>


        </div>
      </div>
    </div>
<div>            <img class="use-desktop-block-mobile"
              src="/wp-content/uploads/2024/07/Hero-Banner_On-Bed-with-Daughter_mob.jpg" alt=""></div>

    <div class="container reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <div class="text-body">
              <p><?= get_field('block1_text') ?></p>
            </div>
            <div class="violet-border" style="text-align: center!important;"><a href="<?= get_field('block1_link') ?>"><?= get_field('block1_text_link') ?></a>
            </div>
            <p class="field" style="text-align: right !important;margin-top:20px!important;"><?= get_field('block1_subtitle') ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="container reader realReader m-t120">
      <div class="section g-24-40 violet-block">
        <div class="row fl-center">
          <div class="block-violet-content">
            <h3 class="h3"><?= get_field('block2_title') ?></h3>
            <p class="field" style="text-align: right !important;"><?= get_field('block2_text') ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="conteiner-1200 reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row">
        <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">
            <div>
              <h3 class="omnipod-h3"><?= get_field('block3_title') ?></h3>
              <div class="podder-image-dash kids-image-dash"></div>
            </div>

          </div>
          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">

            <div class="text-body" style="margin-bottom: 40px;">
              <p><?= get_field('block3_text') ?></p>
              <?= get_field('block3_text_sub') ?>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="bg-gray-gradient">
      <div class="container reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row  f-alit-cent" style="justify-content: center;">
            <div class="col-lg-8 col-sm-12">
              <h2 class="omnipod-h2"><?= get_field('block4_title') ?></h2>
              <div class="text-body">
              <?= get_field('block4_text') ?>
              </div>
              <div class="button-omnipod-block" style="justify-content: center;">
                <a href="<?= get_field('block4_link') ?>" class="button-omnipod"
                  role="button" target="_blank"> <?= get_field('block4_text_link') ?></a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-12 col-sm-12 f-alit-cent js-content-centr">

            <div class="text-body insulin-management">
              <h2 class="omnipod-h2"><?= get_field('block5_title') ?></h2>
              <h3 class="omnipod-h3" style="font-size: 26px !important;font-weight: 400;"><?= get_field('block5_title2') ?></h3>
              <?php
              $image = get_field('block5_img');
              $size = 'medium';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
                <h3 class="omnipod-h3"><?= get_field('block6_title') ?></h3>
                <p><?= get_field('block6_text') ?></p>
                <div class="violet-border" style="text-align: center!important;"><a href="<?= get_field('block6_link_button') ?>"><?= get_field('block6_tetx_button') ?></a>


                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

      <div class="container reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row  f-alit-cent" style="justify-content: center;">
            <div class="col-lg-8 col-sm-12">
              <h2 class="omnipod-h2"><?= get_field('block7_title') ?></h2>
              <div class="text-body">
                <p><?= get_field('block7_text') ?></p>
              </div>
              <div class="button-omnipod-block">
                <a href="<?= get_field('block7_link_button') ?>" class="button-omnipod"
                  role="button" target="_blank"><?= get_field('block7_tetx_button') ?>    </a>
              </div>

              <p style="text-align: center; margin-top: 20px !important;"><?= get_field('block7_description') ?></p>
            </div>
          </div>
        </div>
      </div>

  </main>
</div>

<?php get_footer(); ?>