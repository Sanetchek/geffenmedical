<?php

/**
 * Template Name: Omnipod5 line of sight
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

  <main class="omnipod-main-page what-is-omnipod omnipod-dash new-mp line-of-sight-page">

    <div class="omnipod-main-page-title use-desktop-block" style="background-image: url(/wp-content/uploads/2026/01/hero_line-of-sight.png);">
      <div class="fade-bg-img"></div>
      <div class="section g-24-40 m-120">
        <div class="row">
          <div class="col-lg-7 col-sm-12">
            <h1 class="h1"><?= get_field('system_title') ?> </h1>
          </div>
          <div class="col-lg-5 col-sm-12">
          </div>

        </div>
      </div>
    </div>
    <div> <img class="use-desktop-block-mobile" src="/wp-content/uploads/2026/01/hero_line-of-sight.png" alt=""></div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <p style="text-align: center!important;"> <?= get_field('block1_text') ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2"><?= get_field('block2_title') ?></h2>
            <p> <?= get_field('block2_text') ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2"><?= get_field('block3_title') ?></h2>
            <p> <?= get_field('block3_texts') ?></p>
            <div class="row pd-60">
              <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column">
                <?php 
                        $image = get_field('block3_image_left');
                        $size = 'full';
                        if( $image ) {
                          echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'width: 100%; height: auto;' ) );                      }
                      ?>
                      <h4 class="omnipod-h4"><?= get_field('block3_title_img_left') ?></h4>
                      <p><?= get_field('block3_img_text_left') ?></p>
              </div>
              <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column">
                <?php 
                        $image = get_field('block3_image_right');
                        $size = 'full';
                        if( $image ) {
                          echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'width: 100%; height: auto;' ) );                      }
                      ?>
                        <h4 class="omnipod-h4"><?= get_field('block3_title_img_right') ?></h4>
                        <p><?= get_field('block3_img_text_right') ?></p>
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>


    <div class="bg-gray-gradient m-66 layout-space-above pd-60">
      <div class="container reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row">
            <h3 class="omnipod-h3"><?= get_field('block4_title1') ?></h3>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column  pd-60">
                <?php 
                        $image = get_field('block4_image_left_block1');
                        $size = 'full';
                        if( $image ) {
                          echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 480px; width: 100%; height: auto;' ) );                      }
                      ?>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column  pd-60">
                <?php 
                        $image = get_field('block4_image_right_block1');
                        $size = 'full';
                        if( $image ) {
                          echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 480px; width: 100%; height: auto;' ) );                      }
                      ?>
            </div>
          </div>
          <div class="row">
            <h3 class="omnipod-h3"><?= get_field('block4_title2') ?></h3>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column  pd-60">
                <?php 
                        $image = get_field('block4_image_left_block2');
                        $size = 'full';
                        if( $image ) {
                          echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 480px; width: 100%; height: auto;' ) );                      }
                      ?>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column  pd-60">
                <?php 
                        $image = get_field('block4_image_right_block2');
                        $size = 'full';
                        if( $image ) {
                          echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 480px; width: 100%; height: auto;' ) );                      }
                      ?>
            </div>
          </div>
          <div class="row">
            <h3 class="omnipod-h3"><?= get_field('block4_title3') ?></h3>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column  pd-60">
                <?php 
                        $image = get_field('block4_image_left_block3');
                        $size = 'full';
                        if( $image ) {
                          echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 480px; width: 100%; height: auto;' ) );                      }
                      ?>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column  pd-60">
                <?php 
                        $image = get_field('block4_image_right_block3');
                        $size = 'full';
                        if( $image ) {
                          echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 480px; width: 100%; height: auto;' ) );                      }
                      ?>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container reader realReader  layout-space-above">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2_2 mobile-what-is-omnipod-h2" style="text-align: center;line-height: 62px">
              <?= get_field('block5_title_main') ?></h2>
            <div class="text-body">
            <div class="row">
              <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column  pd-60">
                <h3 class="omnipod-h3"><?= get_field('block5_title_left_block1') ?></h3>
                <p><?= get_field('block5_text_left_block1') ?></p>
              </div>
              <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column  pd-60">
                  <?php 
                          $image = get_field('block5_image_right_block1');
                          $size = 'full';
                          if( $image ) {
                            echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'width: 100%; height: auto;' ) );                      }
                        ?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column  pd-60">
                <h3 class="omnipod-h3"><?= get_field('block5_title_left_block2') ?></h3>
                <p><?= get_field('block5_text_left_block2') ?></p>
              </div>
              <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column  pd-60">
                  <?php 
                          $image = get_field('block5_image_right_block2');
                          $size = 'full';
                          if( $image ) {
                            echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'width: 100%; height: auto;' ) );                      }
                        ?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column  pd-60">
                <h3 class="omnipod-h3"><?= get_field('block5_title_left_block3') ?></h3>
                <p><?= get_field('block5_text_left_block3') ?></p>
              </div>
              <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column  pd-60">
                  <?php 
                          $image = get_field('block5_image_right_block3');
                          $size = 'full';
                          if( $image ) {
                            echo wp_get_attachment_image( $image, $size, false, array( 'style' => ' width: 100%; height: auto;' ) );                      }
                        ?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-sm-12  flex-column  pd-60">
                <h3 class="omnipod-h3"><?= get_field('block5_title_block4') ?></h3>
                <p><?= get_field('block5_text_block4') ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-sm-12 f-alit-cent js-content-centr flex-column  pd-60">
                <h3 class="omnipod-h3"><?= get_field('block5_title_block5') ?></h3>
                <p><?= get_field('block5_text_block5') ?></p>
              </div>

            </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container reader realReader">
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