<?php

/**
 * Template Name: Omnipod-system-faq
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
  <main class="omnipod-main-page paperless  what-is-omnipod omnipod-dash new-mp omnipod-system-faq">

    <div class="omnipod-main-page-title use-desktop-block">
      <div class="fade-bg-img"></div>
      <div class="section g-24-40 m-120">
        <div class="row">
        <div class="col-lg-5 col-sm-12">
            <h1 class="h1"><?= get_field('system_title') ?></h1>
          </div>
          <div class="col-lg-7 col-sm-12">
          </div>
        </div>
      </div>
    </div>
<div>            <img class="use-desktop-block-mobile"
              src="/wp-content/uploads/2024/07/hero_podder-bernard_us_home_mob.jpg"
              alt=""></div>


    <div class="bg-gray-gradient">
      <div class="container reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row  f-alit-cent" style="justify-content: center;">
            <div class="col-lg-8 col-sm-12">
              <h2 class="omnipod-h2"><?= get_field('block2_title') ?> </h2>
              <div class="text-body">
                <p> <?= get_field('block2_text') ?></p>
                <p class="field" style="text-align: right !important;"><?= get_field('block2_subtext') ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $field = get_field('list') ?>
    <?php if ($field): ?>
    <?php foreach ($field as $item): ?>
    <div>
      <div class="bg-red-gradient-faq">
        <div class="container reader realReader m-t120">
          <div class="section g-24-40">
            <div class="row  f-alit-cent" style="justify-content: center;">
              <div class="col-lg-8 col-sm-12">
                <h2 class="omnipod-h2"> <?= $item['block_faq_title'] ?></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="conteiner-1200 reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <div class="instructions-use-fl3 accordion-faq-new  omnipod-accordions-page paperless-accordion">
                <div class="accordion">
                  <?php $faq = $item['faq'] ?>
                  <?php if ($faq): ?>
                  <?php foreach ($faq as $val): ?>
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
    <?php endforeach ?>
    <?php endif ?>
    <div class="conteiner-968 reader realReader">
      <div class="section g-24-40">
        <div class="row  f-alit-cent">
          <div class="col-lg-8 col-sm-12">
            <div class="text-body">
            <?php $field = get_field('footer_text') ?>
    <?php if ($field): ?>
    <?php foreach ($field as $footertext): ?>
              <p class="field" style="text-align: right !important;    margin: 0 !important;"><?= $footertext['text'] ?></p>
                <?php endforeach ?>
    <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>


</div>

</main>
</div>
 
<?php get_footer(); ?>