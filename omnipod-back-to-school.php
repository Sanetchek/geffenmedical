<?php

/**
 * Template Name: Omnipod-back-to-school
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

  <main class="omnipod-main-page what-is-omnipod omnipod-dash back-to-school">

    <div class="omnipod-main-page-title use-desktop-block">
      <div class="fade-bg-img"></div>
      <div class="section g-24-40 m-120">
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <h1 class="h1"><?= get_field('title') ?></h1>
          </div>
          <div class="col-lg-6 col-sm-12">

          </div>

        </div>
      </div>
    </div>
    <div> <img class="use-desktop-block-mobile"
        src="/wp-content/uploads/2024/07/Hero-Banner_On-Bed-with-Daughter_mob1.jpg" alt=""></div>

    <div class="conteiner-1200 reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">
            <div class="podder-image-dash school-image-dash"></div>
          </div>
          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">

            <div class="text-body mobile-w-83" style="margin-bottom: 40px;">
              <h3 class="omnipod-h3"><?= get_field('block1_title') ?></h3>
              <p><?= get_field('block1_text') ?></p>
              <a class="podder-school" href="<?= get_field('block1_link') ?>"
                targe="_blank"><?= get_field('block1_text_link') ?></a>
            </div>
          </div>

        </div>
      </div>
    </div>


    <div class="violet-block" style="border-radius: 0;">
      <div class="container reader realReader">
        <div>
          <div class="row fl-center">
            <div class="block-violet-content">
              <h3 class="h3"><?= get_field('block2_title') ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-gray-gradient">
      <div class="container reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row">
          <div class="col-lg-6 col-sm-12">
              <div>
                <h3 class="omnipod-h3"><?= get_field('block3_title') ?></h3>
                <div class="back-to-school-img">
                          <?php 
                      $image = get_field('block3_image');
                      $size = 'full';
                      if( $image ) {
                      echo wp_get_attachment_image( $image, $size );
                      }
                    ?>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent">
              <div class="block-layout-builder">
                <div class="text-body"  style="text-align: center!important;">
                  <p><?= get_field('block3_text') ?></p>
                  <div class="button-omnipod-block" style="justify-content: center;margin:40px 0;">
                    <a href="<?= get_field('block3_button_link1') ?>" class="button-omnipod" role="button"
                      target="_blank"><?= get_field('block3_button1') ?> </a>
                  </div>
                  <div class="button-omnipod-block" style="justify-content: center;">
                    <a href="<?= get_field('block3_button_link2') ?>" class="button-omnipod" role="button"
                      target="_blank"><?= get_field('block3_button2') ?></a>
                  </div>
                  <p class="field" style="text-align: right !important;margin-top:20px!important;">
                    <?= get_field('block3_subtext') ?></p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="violet-block" style="border-radius: 0;background-color: #ffa700;">
      <div class="container reader realReader">
        <div>
          <div class="row fl-center">
            <div class="block-violet-content">
              <h3 class="h3" style="color:#000!important;"><?= get_field('block4_title') ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="bg-gray-gradient">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="row">


            <?php if (get_field('block5_column_content')) : ?>
            <?php foreach (get_field('block5_column_content') as $video) : ?>
            <div class="col-lg-3 col-sm-12 mob-mt-back">
              <div>
                <h3 class="omnipod-h3 video-block-school"><?= $video['title'] ?></h3>
                <a href="<?= $video['video_link'] ?>" class="card__link tube">
                  <img src="<?= $video['video_img_link'] ?>" alt="">
                </a>
              </div>
            </div>
            <?php endforeach ?>
            <?php endif ?>
            <div class="col-lg-3 col-sm-12 f-alit-cent mob-mt-back">
              <div class="block-layout-builder">
                <h3 class="omnipod-h3 video-block-school"><?= get_field('block5_title_column1') ?></h3>
                <div class="text-body">
                  <p><?= get_field('block5_column1_text') ?></p>

                  <div class="button-omnipod-block" style="justify-content: flex-start;  margin: 2% 0 40% 0;">
                    <a href="<?= get_field('block5_column1_link') ?>" class="button-omnipod" role="button"
                      target="_blank"><?= get_field('block5_column1_button') ?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>