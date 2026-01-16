<?php

/**
 * Template Name: Omnipod5-sensor-integrations
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

  <main class="omnipod-main-page what-is-omnipod omnipod-dash sensor-integrations new-mp">

    <div class="omnipod-main-page-title sensor-integrations-title-block">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-7 col-sm-12">
            <h1 class="h1"><?= get_field('page_title') ?></h1>
          </div>
          <div class="col-lg-7 col-sm-12">
          </div>
        </div>
      </div>
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
                      echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 480px; width: 100%; height: auto;' ) );
                      }
                    ?>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">

              <div class="text-body mobile-w-83" style="margin-bottom: 40px;">
                <h2 class="omnipod-h2"><?= get_field('block1_title') ?></h2>
                <p><?= get_field('block1_text') ?></p>

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
              margin: 50px auto!important;"><?= get_field('block2_title') ?></h2>
          <p style="text-align: center;"><?= get_field('block2_text') ?></p>
          <div class="row">
            <div class="col-lg-6 col-sm-12 profile-nav pd-50">
              <div class="sensor-integrations-block-2-container">
                <div style="display: flex;justify-content: center;">
                  <?php 
                        $image = get_field('block2_image_right');
                        $size = 'full';
                        if( $image ) {
                        echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 384px; width: 100%; height: auto;' ) );
                        }
                      ?>
                </div>

                <div class="button-omnipod-block" style="justify-content: flex-start;">
                  <a href="<?= get_field('block2_button_link_right') ?>" class="button-omnipod" role="button"
                    target="_blank"><?= get_field('block2_button_text_right') ?></a>
                </div>
              </div>

            </div>
            <div class="col-lg-6 col-sm-12 profile-nav pd-50">
              <div class="sensor-integrations-block-2-container">
                <div style="display: flex;justify-content: flex-start;">
                  <?php 
                        $image = get_field('block2_image_left');
                        $size = 'full';
                        if( $image ) {
                        echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 384px; width: 100%; height: auto;' ) );
                        }
                      ?>
                </div>
                <div class="button-omnipod-block" style="justify-content: flex-start;">
                  <a href="<?= get_field('block2_button_link_left') ?>" class="button-omnipod" role="button"
                    target="_blank"><?= get_field('block2_button_text_left') ?></a>
                </div>
              </div>
            </div>
            <p class="field mt-50" style="text-align: center!important;margin-top: 55px!important">
              <?= get_field('block2_subtext') ?></p>
          </div>

        </div>
      </div>
    </div>

    <div class="container reader realReader  layout-space-above">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2_2 mobile-what-is-omnipod-h2" style="text-align: center;line-height: 62px">
              <?= get_field('block3_title') ?></h2>
            <div class="text-body">
              <div>
                <?php if (get_field('features')) : ?>
                <?php foreach (get_field('features') as $item) : ?>
                <div class="sensor-integrations-block-3-container-features">
                  <div class="sensor-integrations-block-3-container-features-image">
                    <?php 
                      $image = $item['image'];
                      $size = 'full';
                      if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                      }
                    ?>
                  </div>
                  <div class="sensor-integrations-block-3-container-features-text">
                    <h3 class="sensor-integrations-features-h3"><?= $item['title'] ?></h3>
                    <p><?= $item['text'] ?></p>
                  </div>
                </div>

                <?php endforeach ?>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="omnipod5-violet-block  layout-space-above">
      <div class="container reader realReader m-t120">
        <div class="believe-block">
          <div class="row row-1120">
            <div class="col-lg-6 col-sm-12">
              <div class="img-believe-block omnipod5-img-believe-block">
                <?php 
                  $image = get_field('block4_image');
                  $size = 'full';
                  if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                  }
                ?>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent">
              <div class="block-layout-builder">
                <h2 class="omnipod-h2 mobile-what-is-omnipod-h2 color-fff"><?= get_field('block4_title') ?></h2>
                <div class="violet-border m-18" style="text-align: right;">
                  <a style="background: #fff;border-color: #fff;"
                    href="<?= get_field('block4_button_link') ?>"><?= get_field('block4_button_text') ?></a>
                </div>
                <p class="subtext-block7 m-50"><?= get_field('block4_subtext') ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container reader realReader  layout-space-above">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2_2 mobile-what-is-omnipod-h2" style="line-height: 62px">
              <?= get_field('block5_title') ?></h2>
            <div class="text-body sensor-integrations-more-information">
              <ul>
                <?php if (get_field('more_information')) : ?>
                <?php foreach (get_field('more_information') as $item) : ?>
                <li class="sensor-integrations-more-informationres">
                  <a href="<?= $item['link'] ?>" target="_blank" rel="noopener noreferrer"><?= $item['text_link'] ?></a>
                </li>
                <?php endforeach ?>
                <?php endif ?>
              </ul>
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