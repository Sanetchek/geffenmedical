<?php

/**
 * Template Name: Omnipod5 Omnipod-5 Resources
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

  <main class="omnipod-main-page what-is-omnipod omnipod-dash new-mp omnipod-5-resources-page">

    <div class="omnipod-main-page-title sensor-integrations-title-block" style="background-color: #ffa700;">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-9 col-sm-12">
            <h1 class="omnipod-h1"><?= get_field('page_title') ?></h1>
          </div>
          <div class="col-lg-3 col-sm-12">
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader layout-space-above">
      <div class="section g-24-40">
        <div class="row f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12 sensors-dexcom-page-text-block5">
            <p><?= get_field('block1_text') ?></p>
            <div class="row layout-space-above">
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column">
                <?php 
                      $image = get_field('block1_image');
                      $size = 'full';
                      if( $image ) {
                        echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 384px; width: 100%; height: auto;' ) );                      }
                    ?>
                <p class="field"><?= get_field('block1_img_text') ?></p>
              </div>
              <div class="col-lg-6 col-sm-12">
                <h3 class="omnipod-h3"><?= get_field('block1_title3') ?></h3>
                <p><?= get_field('block1_text3') ?></p>
                <div class="button-omnipod-block" style="justify-content: flex-start;">
                  <a href=" <?= get_field('block1_button_link') ?>" class="button-omnipod" role="button"
                    target="_blank"> <?= get_field('block1_button_text') ?> </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader layout-space-above">
      <div class="section g-24-40">
        <div class="row f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12 sensors-dexcom-page-text-block5">
          <h2 class="omnipod-h2" style="text-align: center!important;"><?= get_field('block2_title') ?></h2>
            <div class="row layout-space-above">
            <div class="col-lg-6 col-sm-12">
                <h3 class="omnipod-h3"><?= get_field('block2_title_right') ?></h3>
                <p><?= get_field('block2_text_right') ?></p>
              </div>

              <div class="col-lg-6 col-sm-12">
                <h3 class="omnipod-h3"><?= get_field('block2_title_left') ?></h3>
                <p><?= get_field('block2_text_left') ?></p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container reader realReader layout-space-above">
      <div class="section g-24-40">
        <div class="row f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12 sensors-dexcom-page-text-block5">
            <div class="row">
            <div class="col-lg-6 col-sm-12">
                <h3 class="omnipod-h3"><?= get_field('block3_title_right') ?></h3>
                <p><?= get_field('block3_text_right') ?></p>
              </div>
              
              <div class="col-lg-6 col-sm-12">
                <h3 class="omnipod-h3"><?= get_field('block3_title_left') ?></h3>
                <p><?= get_field('block3_text_left') ?></p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12 sensors-dexcom-page-text-block5">
            <div class="row">
            <div class="col-lg-6 col-sm-12">
                <h3 class="omnipod-h3"><?= get_field('block4_title_right') ?></h3>
                <p><?= get_field('block4_text_right') ?></p>
              </div>
              
              <div class="col-lg-6 col-sm-12">
                <h3 class="omnipod-h3"><?= get_field('block4_title_left') ?></h3>
                <p><?= get_field('block4_text_left') ?></p>
                <div class="button-omnipod-block" style="justify-content: flex-start;">
                  <a href="<?= get_field('block4_button_link') ?>" class="button-omnipod" role="button" target="_blank"> <?= get_field('block4_button_text') ?> </a>
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