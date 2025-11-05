<?php

/**
 * Template Name: Omnipod-get-started-new
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
  <main class="omnipod-main-page what-is-omnipod new-mp get-started-new">

    <div class="omnipod-main-page-title use-desktop-block">
      <div class="fade-bg-img"></div>
      <div class="section m-120">
        <div class="row">
        <div class="col-lg-5 col-sm-12">
            <h1 class="h1"><?= get_field('title') ?></h1>
            <div class="banner-text">
              <h3><?= get_field('subtitle_main') ?></h3>
            </div>
          </div>
          <div class="col-lg-7 col-sm-12">

          </div>


        </div>
      </div>
    </div>
<div>
<img class="use-desktop-block-mobile" src="/wp-content/uploads/2024/07/Banner-omnipod-ain-mob.jpg" alt="">
</div>
    <div class="container  reader realReader m-t120">
      <div class="believe-block">
        <div class="row mob-fl-rew">

          <!-- <div class="col-lg-4 col-sm-12 mob-jc-centr">
            <div class="podder-image-dash">
              <?php
              $image = get_field('block1_image1');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
            </div>
          </div>-->
          <div class="col-lg-6 col-sm-12">
            <div class="block-layout-builder pod-therapy-content">

              <div class="text-body">
                <p><?= get_field('block1_text') ?></p>
                <p class="field" style="text-align: right !important;"><?= get_field('block1_subtext') ?></p>

                <div class="pod-therapy-container">
                  <?php if (get_field('block1_link')) : ?>
                    <a href="<?= get_field('block1_link') ?>" class="btn btn__violet"><?= get_field('block1_label_link') ?></a>
                  <?php endif ?>

                  <p class="field" ><?= get_field('block1_link_text') ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12 mob-jc-centr">
            <div class="podder-image-dash">
              <?php
              $image = get_field('block1_image2');
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

    <div class="container reader realReader">
      <div class="section">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2"><?= get_field('block2_title') ?></h2>

            <div class="text-body">
              <p><?= get_field('block2_text1') ?></p>
              <p class="field" style="text-align: right !important;"><?= get_field('block2_subtext') ?></p>
              <p><?= get_field('block2_text2') ?> </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="row more-info a-container--dark">
        <div class="container tabs">
          <div class="tabs-items">
          <div class="tab-item  active get-started-tab-item" data-content="1">
              <div class="availability-subdetalis getstarted-tabs-img">
                <?php
              $image = get_field('block3_tab2_image');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
              ?>
                <p><strong><?= get_field('block3_title_tab2') ?></strong></p>
              </div>
            </div>
            <div class="tab-item get-started-tab-item" data-content="2">
              <div class="availability-subdetalis getstarted-tabs-img">
                <?php
              $image = get_field('block3_tab1_image');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
                 ?>
                <p><strong><?= get_field('block3_title_tab1') ?></strong></p>

              </div>
            </div>

          </div>

          <div class="tabs-content">
            <div id="tab_content_1" class="tab-content active">
              <div class="container tabs conteiner-tab-2">
                <div class="row">
                  <?php if (get_field('block3_tab2_content')) : ?>
                  <?php foreach (get_field('block3_tab2_content') as $content2) : ?>
                  <div class="col-lg-6 col-sm-12">
                    <h2 class="omnipod-h2" style="text-align: right !important;"><?= $content2['title'] ?></h2>
                    <p><?= $content2['text'] ?></p>
                   </div>
                  <?php endforeach ?>
                  <?php endif ?>

                  <?php if (get_field('block3_image_left_2')) : ?>
                    <div class="col-lg-6 col-sm-12">
                      <?php show_image(get_field('block3_image_left_2'), 'large'); ?>
                    </div>
                  <?php endif ?>
                </div>
                <div class="row">
                  <?php if (get_field('block3_tab2_content')) : ?>
                  <?php foreach (get_field('block3_tab2_content') as $content2) : ?>
                  <div class="col-lg-10 col-sm-12">
                    <div class="tab-schortcode"><?= $content2['shortcode_form'] ?></div>
                  </div>
                  <?php endforeach ?>
                  <?php endif ?>
                </div>

              </div>
            </div>
            <div id="tab_content_2" class="tab-content">
              <div class="container tabs">
                <div class="row">

                  <?php if (get_field('block3_tab1_content')) : ?>
                    <?php foreach (get_field('block3_tab1_content') as $content) : ?>
                    <div class="col-lg-6 col-sm-12">
                      <h2 class="omnipod-h2" style="text-align: right !important;"><?= $content['title'] ?></h2>
                      <p><?= $content['text'] ?></p>
                    </div>
                    <?php endforeach ?>
                  <?php endif ?>

                  <?php if (get_field('block3_image_left_1')) : ?>
                    <div class="col-lg-6 col-sm-12">
                      <?php show_image(get_field('block3_image_left_1'), 'medium', ['style' => 'margin: 0 auto;']); ?>
                    </div>
                  <?php endif ?>
                </div>
                <div class="row">
                <?php if (get_field('block3_tab1_content')) : ?>
                    <?php foreach (get_field('block3_tab1_content') as $content) : ?>
                    <div class="col-lg-10 col-sm-12">
                      <div class="tab-schortcode"><?= $content['shortcode_form'] ?></div>
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




    <!-- <div class="violet-block br-bottom-0 pd-0">
      <div class="container reader realReader">
        <div>
          <div class="row fl-center">
            <div class="block-violet-content">
              <h2 class="omnipod-h2" style="color:#fff;">אנחנו מאמינים בחופש הבחירה!</h2>
            </div>
          </div>
        </div>
      </div>
    </div>-->
  </main>
</div>

<script>
  document.getElementById('edit-address').addEventListener('click', function (event) {
    event.preventDefault();
    var addressWrapper = document.getElementById('address-address-wrapper');
    var editAddressLink = document.getElementById('edit-address');

    if (addressWrapper.classList.contains('hidden')) {
      addressWrapper.classList.remove('hidden');
      editAddressLink.classList.add('hidden');
    }
  });
</script>
<?php get_footer(); ?>