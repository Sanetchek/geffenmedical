<?php

/**
 * Template Name: Omnipod5 Sensors Dexcom
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

<div>

  <main class="omnipod-main-page what-is-omnipod omnipod-dash new-mp sensors-dexcom-page">

    <div class="omnipod-main-page-title use-desktop-block" style="background-image: url(/wp-content/uploads/2026/01/hero_omnipod-pod_dexcom-g7-1-rotated.jpg);">
      <div class="fade-bg-img"></div>
      <div class="section g-24-40 m-120">
        <div class="row">
          <div class="col-lg-7 col-sm-12">
            <h1 class="h1"><?= get_field('system_title') ?> </h1>
            <div class="banner-text">
              <p><?= get_field('system_text') ?></p>
            </div>
          </div>
          <div class="col-lg-5 col-sm-12">
          </div>

        </div>
      </div>
    </div>
    <div> <img class="use-desktop-block-mobile" src="/wp-content/uploads/2026/01/hero_omnipod-pod_dexcom-g7-1-rotated.jpg" alt=""></div>

    <div class="container reader realReader pd-60">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h3 class="omnipod-h3" style="text-align: center;!important"><?= get_field('block1_title') ?></h3>
            <div class="text-body">
              <p class="field" style="margin-top:20px!important;text-align: center!important;"> <?= get_field('block1_text') ?></p>
            </div>
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
                      $image = get_field('block2_image');
                      $size = 'full';
                      if( $image ) {
                        echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 384px; width: 100%; height: auto;' ) );                      }
                    ?>
              <p class="field-12"><?= get_field('block2_img_text') ?></p>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">

              <div class="text-body mobile-w-83" style="margin-bottom: 40px;">
                <h2 class="omnipod-h2"><?= get_field('block2_title') ?></h2>
                <p><?= get_field('block2_text') ?></p>  
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader pd-60">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2" style="text-align: center;!important"><?= get_field('block3_title') ?></h3>
            <div class="text-body">
              <p class="field" style="margin-top:20px!important;text-align: center!important;"> <?= get_field('block3_text') ?></p>
              <div class="button-omnipod-block" style="justify-content: center;">
                <a href=" <?= get_field('block3_button_link') ?>" class="button-omnipod" role="button" target="_blank"> <?= get_field('block3_button_text') ?> </a>
              </div>
            </div>
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
                      $image = get_field('block4_image');
                      $size = 'full';
                      if( $image ) {
                      echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 384px; width: 100%; height: auto;' ) );
                      }
                    ?>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">

              <div class="text-body mobile-w-83" style="margin-bottom: 40px;">
                <h2 class="omnipod-h2"><?= get_field('block4_title1') ?></h2>
                <p><?= get_field('block4_text1') ?></p> 
                <h2 class="omnipod-h2"><?= get_field('block4_title2') ?></h2>
                <p><?= get_field('block4_text2') ?></p> 
                <p class="field-12"><?= get_field('block4_subtext') ?></p> 
                <div class="button-omnipod-block" style="justify-content: flex-start;">
                <a href=" <?= get_field('block4_button_link') ?>" class="button-omnipod" role="button" target="_blank"> <?= get_field('block4_button_text') ?> </a>
              </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader pd-60">
      <div class="violet-block" style="background-color: #ffa700;">
        <div class="row fl-center">
          <div class="block-violet-content sensors-dexcom-page-text-block5">
            <h2 class="h2" style="text-align: right !important;"><?= get_field('block5_title') ?></h2>
            <p class="sensors-dexcom-page-text-block5" style="text-align: right;"><?= get_field('block5_text') ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2" style="text-align: center;!important"><?= get_field('block6_title') ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-red-gradient-faq pd-60">
      <div class="conteiner-1200 reader realReader">
        <div class="section g-24-40">
          <div class="row">
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
            
                </blockquote>
              </div>
          </div>
          
        </div>
      </div>
    </div>

    <div class="container reader realReader layout-space-above">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h3 class="omnipod-h3" style="text-align: center;!important"><?= get_field('block7_text') ?> <a class="link-block7" href="<?= get_field('block7_link') ?>"><?= get_field('block7_text_link') ?></a></h3>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2" style="text-align: center;!important"><?= get_field('block8_title') ?></h2>
            <p><?= get_field('block8_text') ?></p>
            <p><?= get_field('block8_shortcode_form') ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container reader realReader pd-60">
      <div class="violet-block" style="background-color: #f75e4c;">
        <div class="row fl-center">
          <div class="block-violet-content sensors-dexcom-page-text-block5">
            <h3 class="omnipod-h3" style="color: #fff !important;"><?= get_field('block9_title') ?></h3>
          </div>
        </div>
      </div>
    </div>

    <div class="block-1-container layout-space-above">
      <div class="conteiner-1200 reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row">

            <div class="col-lg-6 col-sm-12 ">
              <h2 class="omnipod-h2_2 mobile-what-is-omnipod-h2" style="line-height: 62px">
                <?= get_field('block10_title') ?></h2>
                <p><?= get_field('block10_text') ?></p>
              <div class="text-body sensor-integrations-more-information">
                <ul>
                  <?php if (get_field('more_information')) : ?>
                  <?php foreach (get_field('more_information') as $item) : ?>
                  <li class="sensor-integrations-more-informationres">
                    <a style="text-decoration: underline !important;color: #8d61c8 !important;" href="<?= $item['link'] ?>" target="_blank" rel="noopener noreferrer"><?= $item['text_link'] ?></a>
                  </li>
                  <?php endforeach ?>
                  <?php endif ?>
                </ul>
              </div>
            </div>

            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column">
              <?php 
                      $image = get_field('block10_image');
                      $size = 'full';
                      if( $image ) {
                        echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 384px; width: 100%; height: auto;' ) );                      }
                    ?>
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