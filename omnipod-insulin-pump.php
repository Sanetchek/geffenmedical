<?php

/**
 * Template Name: Omnipod-insulin-pump
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

<div>

  <main class="omnipod-main-page what-is-omnipod omnipod-dash new-mp omnipod-insulin-pump">

    <div class="omnipod-main-page-title use-desktop-block">
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
    <div> <img class="use-desktop-block-mobile" src="/wp-content/uploads/2024/07/Hero_Medicare_mob.jpg" alt=""></div>

    <div class="conteiner-1200 reader realReader m-t120 mobile-w-83">
      <div class="section g-24-40">
        <div class="row">
        <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">
            <div class="podder-image-dash"
              style="background: url(/wp-content/uploads/2024/04/1col_podder-using-pdm_2000x1500x96.jpg);background-repeat: no-repeat;background-size: cover !important;">
            </div>
          </div>
          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">

            <div class="text-body" style="margin-bottom: 40px;">
              <h3 class="omnipod-h3"><?= get_field('block1_title') ?></h3>
              <p><?= get_field('block1_text') ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2" style="text-align: center;!important"><?= get_field('block2_title') ?></h2>
            <div class="text-body">
              <p><?= get_field('block2_text') ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="conteiner-1200 reader realReader">
      <div class="section g-24-40">
        <div class="row">
        <div class="col-lg-6 col-sm-12 profile-nav pd-50">
            <?php 
              $image = get_field('block3_image2');
              $size = 'medium';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
            <h3 class="omnipod-h3" style="font-size: 30px !important;"><?= get_field('block3_title2') ?></h3>
            <p><?= get_field('block3_text2') ?></p>
          </div>
          <div class="col-lg-6 col-sm-12  profile-nav pd-50">
            <?php 
              $image = get_field('block3_image1');
              $size = 'medium';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
            <h3 class="omnipod-h3" style="font-size: 30px !important;"><?= get_field('block3_title1') ?></h3>
            <p><?= get_field('block3_text1') ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader m-t120 mobile-w-83">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2"><?= get_field('block4_title') ?></h2>
            <div class="text-body">
              <p><?= get_field('block4_text') ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="conteiner reader realReader">
      <div class="section g-24-40">
        <div class="row">
        <div class="col-lg-6 col-sm-12 profile-nav">
            <h3 class="omnipod-h3" style="text-align: center!important;"><?= get_field('block5_title2') ?> </h3>
            <?php 
              $image = get_field('block5_image2');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
          </div>
          <div class="col-lg-6 col-sm-12  profile-nav">
            <h3 class="omnipod-h3" style="text-align: center!important;"><?= get_field('block5_title1') ?> </h3>
            <?php 
              $image = get_field('block5_image1');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size );
              }
            ?>
          </div>

        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div>
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12 mobile-w-83">
            <div class="text-body">
              <p><?= get_field('block5_text') ?> </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-12 col-sm-12 f-alit-cent">
            <div class="instructions-use-fl3 accordion-faq-new  omnipod-accordions-page paperless-accordion mobile-w-83">
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
    <div class="container reader realReader m-t120 mobile-w-83">
      <div>
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2_2"><?= get_field('block7_title') ?></h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-12 col-sm-12 f-alit-cent">
            <div class="instructions-use-fl3 accordion-faq-new  omnipod-accordions-page paperless-accordion mobile-w-83">
              <div class="accordion">
                <?php if (get_field('faq2')) : ?>
                <?php foreach (get_field('faq2') as $val2) : ?>
                <div class="accordion-item">
                  <div class="accordion-header">
                    <span class="icon">+</span>
                    <p><strong><?= $val2['title'] ?></strong></p>
                  </div>
                  <div class="accordion-content" style="display: none;">
                    <?= $val2['description'] ?>
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

<div class="container reader realReader m-t120">
  <div class="violet-block" style="padding:5px 0 20px 0 !important;">
    <div class="row fl-center">
      <div class="block-violet-content">
        <h3 class="h3" style="text-align: right !important;"><?= get_field('block8_title') ?></h3>
        <p><?= get_field('block8_text') ?></p>
        <div class="violet-border"><a style="background: #fff;border-color: #fff;"
            href="<?= get_field('block8_link_button') ?>"><?= get_field('block8_title_button') ?> </a></div>
      </div>
    </div>
  </div>
</div>

<div class="conteiner-968 reader realReader m-t120 mobile-w-83">
  <div>
    <div class="row  f-alit-cent" style="justify-content: center;">
      <div class="col-lg-12 col-sm-12">
        <p style="margin-bottom: 35px !important;"><strong><?= get_field('footer_title') ?></strong></p>
      </div>
    </div>
  </div>
</div>
<div class="conteiner-968 reader realReader mobile-w-83">
  <div>
    <div class="row  f-alit-cent" style="justify-content: center;">
      <div class="col-lg-12 col-sm-12">
        <p><strong><?= get_field('footer_title2') ?></strong></p>

        <?php if (get_field('footer_text')) : ?>
        <?php foreach (get_field('footer_text') as $footer) : ?>
        <p class="field" style="text-align: right !important;"><?= $footer['text'] ?></p>
        <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>


</main>
</div>

<?php get_footer(); ?>