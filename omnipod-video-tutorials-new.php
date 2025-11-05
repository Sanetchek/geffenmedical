<?php

/**
 * Template Name: Omnipod-video-tutorials-new
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

    <div class="omnipod-main-page-title use-desktop-block">
      <div class="fade-bg-img"></div>
      <div class="section g-24-40 m-120">
        <div class="row">
          <div class="col-lg-5 col-sm-12">
            <h1 class="h1"><?= get_field('title') ?></h1>
          </div>
          <div class="col-lg-7 col-sm-12">

          </div>

        </div>
      </div>
    </div>
    <div> <img class="use-desktop-block-mobile" src="/wp-content/uploads/2024/07/hero_podder-marcus-home_mob.jpg"
        alt=""></div>
    <div class="bg-gray-gradient">
      <div class="container reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row  f-alit-cent" style="justify-content: center;">
            <div class="col-lg-8 col-sm-12">
              <h2 class="omnipod-h2"><?= get_field('title_block1') ?></h2>
              <div class="text-body">
                <p><?= get_field('block1_text') ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="omnipod-main-page-title paperless-title-block-small  m-t120" style="max-width: 100%;">
      <div class="section">
        <div class="row">
          <div class="col-lg-10 col-sm-12">
            <h2 class="omnipod-h2" style="text-align: center;"><?= get_field('title_block2') ?></h2>
          </div>
          <div class="col-lg-2 col-sm-12">

          </div>

        </div>
      </div>
    </div>



    <div class="conteiner-1200 reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row">
        <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">

<div class="text-body" style="margin-bottom: 40px;">
  <p><?= get_field('video_text') ?></p>
  <!-- <p>
    לא משנה אם מדובר באחות בית הספר, במחנכים או באנשים אחרים בצוות התמיכה בבית הספר, המדריך למטפל שלנו מכסה
    את כל הנושאים הבסיסיים כדי לסייע להם להפוך למקצוענים בשימוש ב-Omnipod. </p>

  <a class="podder-school"
    href="https://www.omnipod.com/sites/default/files/Omnipod-DASH_Podder-Resources-Guide_en-en_mm_v005_04-21.pdf"
    targe="_blank">מקורות בנושא Omnipod DASH ל-Podders™</a>-->
</div>
</div>
          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">
            <div class="main-customer-club-conteiner">
              <a href="<?= get_field('youtube_link_videoblock1') ?>" class="card__link tube">
                <img src="<?= get_field('img_video_block1') ?>" />

              </a>
              <p class="youtube_title_videoblock"><?= get_field('youtube_title_videoblock1') ?></p>
            </div>
          </div>


        </div>
      </div>
    </div>






    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row align-items-start">
          <?php $field = get_field('video_list') ?>
          <?php if ($field): ?>
          <?php foreach ($field as $item): ?>
          <div class="col-lg-3 col-sm-12 f-alit-cent block-m-top-bt ">
            <div class="text-body">
              <a href="<?= $item['youtube_video'] ?>" class="card__link tube">
                <img src="<?= $item['img_link'] ?>" />
              </a>
              <p class="youtube_title_videoblock"><?= $item['youtube_video_title'] ?></p>
            </div>
          </div>
          <?php endforeach ?>
          <?php endif ?>

        </div>
      </div>
    </div>

    <div class="conteiner-1200 reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row align-items-start">
          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">
            <div class="main-customer-club-conteiner">
              <a href="<?= get_field('youtube_link_videoblock3') ?>" class="card__link tube">
                <img src="<?= get_field('img_video_block3') ?>" />
              </a>
              <p class="youtube_title_videoblock"><?= get_field('youtube_title_videoblock3') ?></p>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">
            <div class="main-customer-club-conteiner">
              <a href="<?= get_field('youtube_link_videoblock4') ?>" class="card__link tube">
                <img src="<?= get_field('img_video_block4') ?>" />
              </a>
              <p class="youtube_title_videoblock"><?= get_field('youtube_title_videoblock4') ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>




  </main>
</div>

<?php get_footer(); ?>