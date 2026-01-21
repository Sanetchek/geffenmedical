<?php

/**
 * Template Name: Omnipod5 sensor integrations Libre-2
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

  <main class="omnipod-main-page what-is-omnipod omnipod-dash new-mp sensor-integrations-libre-2-page">

    <div class="omnipod-main-page-title paperless-title-block">
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

    
    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <p style="text-align: center!important;"> <?= get_field('block1_text') ?></p>
            <p class="field" style="text-align: center!important;"> <?= get_field('block1_text2') ?></p>
          </div>
        </div>
      </div>
    </div>


    <div class="block-1-container">
      <div class="conteiner-1200 reader realReader m-t120">
        <div class="section g-24-40">
          <h2 class="omnipod-h2" style="text-align: center!important;"><?= get_field('block2_title_main') ?></h2>
          <div class="row pd-60">
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
                <h3 class="omnipod-h3"><?= get_field('block2_title') ?></h3>
                <p><?= get_field('block2_text') ?></p> 
                <div class="button-omnipod-block" style="justify-content: flex-start;">
                    <a href=" <?= get_field('block2_button_link') ?>" class="button-omnipod" role="button" target="_blank"> <?= get_field('block2_button_text') ?> </a>
                 </div> 
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="block-1-container">
      <div class="conteiner-1200 reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row">
          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">
            <div class="text-body mobile-w-83" style="margin-bottom: 40px;">
              <h3 class="omnipod-h3"><?= get_field('block3_title') ?></h3>
              <p><?= get_field('block3_text') ?></p> 
            </div>

            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column">
              <?php 
                      $image = get_field('block3_image');
                      $size = 'full';
                      if( $image ) {
                        echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 384px; width: 100%; height: auto;' ) );                      }
                    ?>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="bg-gray-gradient m-66 layout-space-above pd-60">
      <div class="container reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2" style="text-align: center!important;"><?= get_field('block4_title') ?></h2>
            <p style="text-align: center!important;"> <?= get_field('block4_text') ?></p>
            <div class="button-omnipod-block">
                    <a href=" <?= get_field('block4_button_link') ?>" class="button-omnipod" role="button" target="_blank"> <?= get_field('block4_button_text') ?> </a>
                 </div>
          </div>
        </div>
      </div>
      </div>
    </div>

    <div class="container reader realReader layout-space-above">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2" style="text-align: center!important;"><?= get_field('block5_title') ?></h2>
            <p style="text-align: center!important;"> <?= get_field('block5_text') ?></p>
            <div class="pd-60">
            <?php 
                      $image = get_field('block5_image');
                      $size = 'full';
                      if( $image ) {
                        echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'width: 100%; height: auto;' ) );                      }
                    ?>
                     <p class="field-12"><?= get_field('block5_img_text') ?></p>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="bg-red-gradient-faq pd-60">
      <div class="conteiner-1200 reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <h2 class="omnipod-h2" style="text-align: center!important;"><?= get_field('block6_title') ?></h2>
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

    <div class="container reader realReader pd-60">
      <div class="section g-24-40">
        <h2 class="omnipod-h2" style="text-align: center!important;"><?= get_field('faq_title') ?></h2>
        <div class="container reader realReader">
          <div class="section g-24-40">
            <div class="row">
              <div class="col-lg-12 col-sm-12 f-alit-cent">
                <div
                  class="instructions-use-fl3 accordion-faq-new  omnipod-accordions-page paperless-accordion mobile-w-83">
                  <div class="accordion">
                    <?php if (get_field('faq')) : ?>
                    <?php foreach (get_field('faq') as $val) : ?>
                    <div class="accordion-item">
                      <div class="accordion-header">
                        <span class="icon">+</span>
                        <p><strong><?= $val['title'] ?></strong></p>
                      </div>
                      <div class="accordion-content" style="display: none;">
                        <?= $val['description'] ?>
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
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2" style="text-align: center;!important"><?= get_field('block7_title') ?></h2>
            <p><?= get_field('block7_text') ?></p>
            <p><?= get_field('block7_shortcode_form') ?></p>
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