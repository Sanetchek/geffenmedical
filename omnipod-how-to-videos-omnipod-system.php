<?php

/**
 * Template Name: Omnipod-videos-omnipod-system
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

  <main class="omnipod-main-page what-is-omnipod omnipod-dash video-tutorials-new">
    <div class="omnipod-main-page-title paperless-title-block">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-10 col-sm-12">
            <h1 class="h1"><?= get_field('title') ?></h1>
          </div>
          <div class="col-lg-2 col-sm-12">
          </div>


        </div>
      </div>
    </div>
    <div class="conteiner-1200 reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr mob-mt-back">

            <div class="text-body" style="margin-bottom: 40px;">
              <p><?= get_field('block1_text') ?></p>
              <div class="button-omnipod-block" style="justify-content: flex-start;">
                <a href="<?= get_field('block1_link_button') ?>" class="button-omnipod" role="button" target="_blank">
                  <?= get_field('block1_text_button') ?></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">
            <div class="main-customer-club-conteiner">
              <a href="<?= get_field('youtube_link_videoblock1') ?>" class="card__link tube">
                <img src="<?= get_field('img_video_block1') ?>" />
              </a>
            </div>
          </div>


        </div>
      </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>