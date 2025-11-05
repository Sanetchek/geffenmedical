<?php

/**
 * Template Name: Troubleshooting-guide
 * Template Post Type: freestyle_libre
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

<div class="free-style-libre">
  <?php get_template_part('template-parts/breadcrumbs') ?>

  <main class="libre librelink-app troubleshooting-guide">

    <div class="librelink-benefitsforme-title">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-12">
              <h1 class=""><?= get_field('title') ?></h1>
              <div class="benefitsforme-articles-list"><?= get_field('text') ?></div>
            </div>
          </div>
          <div class="row">
            <?php $field = get_field('list') ?>
            <?php if ($field) : ?>
              <?php foreach ($field as $item) : ?>
                <div class="col-12 col-md-3 col-lg-3 middle first-block-troubleshooting">
                  <?php show_image($item['image'], [80,80]) ?>
                  <h5><?= $item['title'] ?></h5>
                </div>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader mobile-mb-0">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <?php show_image(get_field('block1_image')) ?>
          </div>
          <div class="col-lg-6 col-sm-12 benefits-for-people ">
            <h2 style="margin: 0 0 8px 0!important;text-align: right;" class="benefitsforme-try-your-sensor">
              <strong><?= get_field('block1_title') ?></strong>
            </h2>
            <div class="connected-care-tabs-text"><?= get_field('block1_text') ?></div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader mobile-mb-0">
      <div class="section g-24-40">
        <div class="row">
          <h3 style="	color: rgb(0,20,137);"><?= get_field('block1_subtitle_1') ?></h3>
          <div class="row reconnect-sensor">
            <?php $field = get_field('block1_list') ?>
            <?php if ($field) : ?>
              <?php foreach ($field as $key => $item) : ?>
                <?php $key++; ?>
                <div class="col-12 col-md-3 col-lg-3 middle second-block-troubleshooting">
                  <div class="count__yellow_blue"><?= $key ?></div>
                  <h5><?= $item['title'] ?></h5>
                  <?php if ($item['text']) : ?>
                    <p><?= $item['text'] ?></p>
                  <?php endif ?>
                </div>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
        <div class="row">
          <h3 style="	color: rgb(0,20,137);margin-top: 60px;"><?= get_field('block1_subtitle_2') ?></h3>
          <div><?= get_field('block1_address') ?></div>
        </div>
      </div>
    </div>

    <div class="librelink-benefitsforme-title">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="row row-revers-mobile">
            <div class="col-lg-6 col-sm-12 benefits-for-people">
              <h2 style="margin: 55px 0 8px 0!important;text-align: right;" class="benefitsforme-try-your-sensor">
                <strong><?= get_field('block2_title') ?></strong>
              </h2>

              <div class="connected-care-tabs-text"><?= get_field('block2_text') ?></div>
              <?php if (get_field('block2_url')) : ?>
                <div class="tutorial-videos realworldevidence-button-rt">
                  <a href="<?= get_field('block2_url') ?>" target="_self">
                    <span><?= get_field('block2_link_label') ?></span>
                  </a>
                </div>
              <?php endif ?>

            </div>
            <div class="col-lg-6 col-sm-12">
              <?php show_image(get_field('block2_image')) ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row">
          <div>
            <?php show_image(get_field('block3_image'), [140,140]) ?>
          </div>
          <h3 class="sensor-wear" style=""><?= get_field('block3_title') ?></h3>
          <div><?= get_field('block3_text') ?></div>

          <div class="row">
            <?php $field = get_field('block3_list') ?>
            <?php if ($field) : ?>
              <?php foreach ($field as $item) : ?>
                <div class="col-12 col-md-4 col-lg-4 middle">
                  <h3 style="margin-bottom: 0!important;color: #001489;"><?= $item['title'] ?></h3>
                  <h5><?= $item['text'] ?></h5>
                </div>
              <?php endforeach ?>
            <?php endif ?>
          </div>

         <!-- <div class="row">
            <div class="col-12">
              <div class="tutorial-videos realworldevidence-button-rt sensor-wear-btn">
                <?php if (get_field('block3_url')) : ?>
                  <a href="<?= get_field('block3_url') ?>" target="_blank">
                    <span><?= get_field('block3_link_label') ?></span>
                  </a>
                <?php endif ?>
              </div>
            </div>
          </div>-->
        </div>
      </div>
    </div>

    <!--<div class="bg-236">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-lg-6 col-sm-12 benefits-for-people">
              <h2 style="margin: 0 0 8px 0!important;text-align: right;" class="benefitsforme-try-your-sensor">
                <strong><?= get_field('block4_title') ?></strong>
              </h2>

              <div class="connected-care-tabs-text"><?= get_field('block4_text') ?></div>

              <?php if (get_field('block4_url')) : ?>
                <div class="tutorial-videos realworldevidence-button-rt">
                  <a href="<?= get_field('block4_url') ?>" target="_self">
                    <span><?= get_field('block4_link_label') ?></span>
                  </a>
                </div>
              <?php endif ?>
            </div>
            <div class="col-lg-6 col-sm-12">
              <?php show_image(get_field('block4_image')) ?>
            </div>
          </div>
        </div>
      </div>
    </div>-->

   <!-- <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row">
          <div>
            <?php show_image(get_field('block5_image'), [80,80]) ?>
          </div>
          <h2 class="benefitsforme-try-your-sensor">
            <strong><?= get_field('block5_title') ?></strong>
          </h2>

          <div style="	text-align: center;"><?= get_field('block5_text') ?></div>
          <div class="row">
            <div class="instructions-use-fl3">
              <div class="instruction-use-fl3">
                <button id="expandCollapseButton"></button>
              </div>

              <div class="accordion">
                <?php $field = get_field('block5_faqs') ?>
                <?php if ($field) : ?>
                  <?php foreach ($field as $item) : ?>
                    <div class="accordion-item">
                      <div class="accordion-header">
                        <span class="icon">+</span>
                        <p><?= $item['question'] ?></p>
                      </div>

                      <div class="accordion-content" style="display: none;width: 93%;text-align: right;">
                        <?= $item['answer'] ?>
                      </div>
                    </div>
                  <?php endforeach ?>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>-->



    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="">
          <div class="footer-list">
            <p><b><?= get_field('footer_title') ?></b></p>
            <?php $field = get_field('footer_list') ?>
            <?php if ($field) : ?>
              <?php foreach ($field as $item) : ?>
                <p><span class="disclaimer-text">
                  <span class="color-text-gray">
                    <span class="font-12">
                      <?= $item['text'] ?>
                    </span>
                  </span>
                </p>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>