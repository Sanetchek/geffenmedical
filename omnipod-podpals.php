<?php

/**
 * Template Name: Omnipod-podpals
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

  <main class="omnipod-main-page paperless">

    <div class="omnipod-main-page-title paperless-title-block">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-7 col-sm-12">
            <h1 class="h1"><?= get_field('main_title') ?></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-gray-gradient">
      <div class="container reader realReader m-t120">
        <div class="believe-block" style="padding: 60px 0;">
          <div class="row">
          <div class="col-lg-6 col-sm-12 f-alit-cent">
              <div class="block-layout-builder">
                <div class="text-body">
                  <p></p>
                  <p><span style="font-size: 18pt;line-height: 30px;"><?= get_field('block1_text') ?></span></p>
                  <p></p>
                </div>
                <div><a class="button-omnipod"
                    href="<?= get_field('block1_button_link') ?>"><?= get_field('block1_button_text') ?></a></div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div class="img-believe-block podpals-img">
                <?php
              $image = get_field('block1_img');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader m-t120">
      <div class="believe-block" style="padding: 60px 0;">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-sm-12 f-alit-cent" style="max-width: 400px;">
            <div class="col-lg-12 col-sm-12">
              <?php if (get_field('list_icon')) : ?>
              <?php foreach (get_field('list_icon') as $list_icon) : ?>

              <div class="block-icon-podpals">
              <p><strong><?= $list_icon['block2__title_icon'] ?></strong></p>
                <?php
                  $image = $list_icon['block2_icon'];
                    $size = 'full';
                    if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                  }
                ?>

              </div>

              <?php endforeach ?>
              <?php endif ?>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">
            <?php
              $image = get_field('block2_image_pod');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
          </div>

        </div>
      </div>
    </div>

    <div class="container reader realReader m-t120">
      <div class="section">
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <h2 class="omnipod-h2" style="text-align: center;color:#fea700"><?= get_field('block3_title') ?></h2>
            <p> <?= get_field('block3_text') ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <div style="display: flex;justify-content: center;">
              <?php
                  $image = get_field('block3_image_instruction');
                  $size = 'full';
                  if( $image ) {
	               echo wp_get_attachment_image( $image, $size );
                   }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="bg-gray-gradient" style="border-radius: 0 120px 0 0;">
      <div class="container reader realReader m-t120">
        <div class="believe-block" style="padding: 60px 0;">
          <h2 style="color: #ffa700;" class="mobile-w-83"><?= get_field('block4_title') ?></h2>
          <div class="row">
            <div class="col-lg-6 col-sm-12 mobile-w-83">
              <p><?= get_field('block4_text2') ?></p>
            </div>
            <div class="col-lg-6 col-sm-12 mobile-w-83">
              <p><?= get_field('block4_text1') ?></p>
            </div>
          </div>
          <div class="row">
            <?php if (get_field('image_block4')) : ?>
            <?php foreach (get_field('image_block4') as $image_block4) : ?>
            <div class="col-lg-3 col-sm-12 mob-mt-back">
              <div class="podpals-img-block4">
                <?php
                  $image = $image_block4['image4'];
                  $size = 'full';
                  if( $image ) {
	               echo wp_get_attachment_image( $image, $size );
                   }
                ?>
              </div>
            </div>
            <?php endforeach ?>
            <?php endif ?>

          </div>
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <p><?= get_field('block4_subtext') ?> </p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
</div>

<?php get_footer(); ?>