<?php

/**
 * Template Name: Omnipod-right-for-me
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

  <main class="omnipod-main-page what-is-omnipod omnipod-dash right-for-me new-mp">

    <div class="omnipod-main-page-title use-desktop-block">
      <div class="fade-bg-img"></div>
      <div class="section g-24-40 m-120">
        <div class="row">
        <div class="col-lg-6 col-sm-12">
            <h1 class="h1"><?= get_field('system_title') ?></h1>
            <div class="banner-text">
              <p><?= get_field('system_text') ?></p>
            </div>
            <div class="button-omnipod-block" style="justify-content: flex-start;">
              <a href="<?= get_field('system_link_button') ?>" class="button-omnipod" role="button"
                target="_blank"><?= get_field('system_title_button') ?></a>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">
          </div>

        </div>
      </div>
    </div>
<div>            <img class="use-desktop-block-mobile"
              src="/wp-content/uploads/2024/07/hero_mob.jpg" alt=""></div>
    <div class="container reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-9 col-sm-12">
            <h2 class="omnipod-h2"><?= get_field('block1_title') ?></h2>
            <div class="text-body">
              <p><?= get_field('block1_text') ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="conteiner-1200 reader realReader">
      <div class="section g-24-40">
        <div class="row">
        <div class="col-lg-5 col-sm-12 profile-nav">
             <div class="right-image-block">
            <?php
              $image = get_field('block3_image2');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
            </div>
            <div class="instructions-use-fl3 accordion-faq-new  omnipod-accordions-page paperless-accordion">
              <div class="accordion">
                <?php if (get_field('faq_block2')) : ?>
                <?php foreach (get_field('faq_block2') as $faq_block2) : ?>
                <div class="accordion-item">
                  <div class="accordion-header">
                    <span class="icon">+</span>
                    <p><strong><?= $faq_block2['title'] ?></strong></p>
                  </div>
                  <div class="accordion-content" style="display: none;">
                    <?= $faq_block2['description'] ?>
                  </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-sm-12  profile-nav">
            <div class="right-image-block">
              <?php
              $image = get_field('block3_image1');
              $size = '100%';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
              ?>
            </div>
            <div class="instructions-use-fl3 accordion-faq-new  omnipod-accordions-page paperless-accordion">
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

<div class="container reader realReader m-t120">
  <div class="section g-24-40">
    <div class="row  f-alit-cent" style="justify-content: center;">
      <div class="col-lg-8 col-sm-12">
        <h2 class="omnipod-h2"><?= get_field('block2_title') ?></h2>
        <div class="text-body guides-list">
          <p><?= get_field('block2_text') ?></p>
          <p class="field" style="text-align: right !important;"><?= get_field('block2_subtitle') ?></p>
          <p><?= get_field('block2_subtext') ?></p>          
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container reader realReader m-t120">
  <div class="section g-24-40 violet-block">
    <div class="row fl-center">
      <div class="block-violet-content">
        <h3 class="h3"><?= get_field('block4_title') ?></h3>
        <p class="field" style="text-align: right !important;"><?= get_field('block4_text') ?></p>
      </div>
    </div>
  </div>
</div>


<div class="bg-gray-gradient">
  <div class="container reader realReader m-t120">
    <div class="section g-24-40">
      <div class="row">
        <div class="col-lg-12 col-sm-12 f-alit-cent js-content-centr">

          <div class="text-body insulin-management">
            <h3 class="omnipod-h3"><?= get_field('block5_title') ?></h3>
            <p><?= get_field('block5_text') ?></p>

            <?php
              $image = get_field('block5_image');
              $size = 'medium';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
           <div class="violet-border" style="margin: 30px 0 10px 0;text-align: center !important;"><a href="<?= get_field('block5_link_button') ?>"><?= get_field('block5_title_button') ?></a>
            </div>
            <p class="field" style="text-align: center !important;"><?= get_field('block5_subtext') ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="violet-block br-bottom-0 pd-0" style="background:#1ad1db;">
  <div class="container reader realReader">
    <div>
      <div class="row fl-center">
        <div class="block-violet-content">
          <h2 class="omnipod-h2" style="color:#fff;"><?= get_field('block6_title_block') ?></h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="bg-gray-gradient">
  <div class="conteiner-792 reader realReader">
    <div class="section g-24-40">
      <div class="row">
      <div class="col-lg-6 col-sm-12">
          <div class="text-body right-me-end-text">
            <h3 class="omnipod-h3"><?= get_field('block6_title2') ?></h3>
            <div class="reed-more-omnipod">
            <p><?= get_field('block6_text2') ?></p>
            <p class="field" style="text-align: right !important;"></p>
            </div>
            <div class="violet-border" style="text-align: right;">
              <a href="<?= get_field('block6_link_button2') ?>"  role="button"
                target="_blank"><?= get_field('block6_title_button2') ?></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="text-body"style="height: 468px;" >
            <h3 class="omnipod-h3"><?= get_field('block6_title') ?></h3>
            <div class="reed-more-omnipod">
            <p><?= get_field('block6_text') ?></p>
            </div>

            <div class="button-omnipod-block" style="justify-content: flex-start;">
              <a href="<?= get_field('block6_link_button') ?>" class="button-omnipod" role="button"
                target="_blank"><?= get_field('block6_title_button') ?></a>
            </div>
          </div>
          <p class="field g-24-40" style="text-align: right !important;"><?= get_field('block6_subtext') ?></p>
        </div>

      </div>
    </div>
  </div>
</div>

</main>
</div>

<?php get_footer(); ?>