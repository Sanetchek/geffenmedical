<?php

/**
 * Template Name: Connected-care
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

  <main class="libre librelink-app">

    <div class="librelink-connected-care-title">
      <div class="container reader realReader"
        style="background: url(<?= get_field('main_image') ?>) no-repeat left center / cover">
        <div class="section g-24-40">
        <div class="col-12 col-md-6">
              <?php show_image(get_field('mobile_image'), 'medium-large', ['class' => 'mobile-img-title']) ?>
            </div>
          <div class="row">
            <div class="col-12 col-md-6">
              <h1><?= get_field('title') ?></h1>
              <div><?= get_field('text') ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="librelink-connected-care-tabs">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="container tabs">
            <div class="tabs-items">
              <?php $tabs = get_field('tabs') ?>
              <?php if ($tabs): ?>
                <?php foreach ($tabs as $key => $tab): ?>
                  <?php
                    $key++;
                    $active = $key == 1 ? 'active' : '';
                  ?>
                  <div class="tab-item <?= $active ?>" data-content="<?= $key ?>" style="font-size: 14px;">
                    <?= $tab['tab_name'] ?>
                  </div>
                <?php endforeach ?>
              <?php endif ?>
            </div>

            <div class="tabs-content">
              <?php if ($tabs): ?>
                <?php foreach ($tabs as $key => $tab): ?>
                  <?php
                    $key++;
                    $active = $key == 1 ? 'active' : '';
                  ?>
                  <div id="tab_content_<?= $key ?>" class="tab-content <?= $active ?>">
                    <?php $list = $tab['list'] ?>
                    <?php if ($list): ?>
                      <?php foreach ($list as $key => $item): ?>
                        <?php
                          $key++;
                          $top = $key > 1 ? 'mt-70' : '';
                        ?>
                        <div class="row <?= $top ?>">
                          <div class="col-lg-6 col-sm-12 benefits-for-people">
                            <h2 style="margin: 0 0 8px 0!important;text-align: right;" class="benefitsforme-try-your-sensor">
                              <strong><?= $item['title'] ?></strong>
                            </h2>
                            <p class="realworldevidence-article-subtitle">
                              <strong style="font-weight: 900 !important;"><?= $item['subtitle'] ?></strong>
                            </p>

                            <?php if ($item['subtitle_2']): ?>
                              <p class="connected-care-tabs-title"><?= $item['subtitle_2'] ?></p>
                            <?php endif ?>

                            <div class="connected-care-tabs-text"><?= $item['text'] ?></div>

                            <?php if ($item['url']): ?>
                              <div class="tutorial-videos realworldevidence-button-rt">
                                <a href="<?= $item['url'] ?>" target="_self">
                                  <span><?= $item['link_label'] ?></span>
                                </a>
                              </div>
                            <?php endif ?>

                          </div>
                          <div class="col-lg-6 col-sm-12">
                            <?php show_image($item['image'], [464, 573]) ?>
                          </div>
                        </div>
                      <?php endforeach ?>
                    <?php endif ?>

                  </div>
                <?php endforeach ?>
              <?php endif ?>
            </div>
          </div>
        </div>

      </div>
    </div>


    <div class="librelink-connected-care-bg">
      <div class="container reader realReader">
        <div class="section g-24-40 connected-care-bg-mb">
          <div class="row">
            <div class="col-12">
              <h2 class="connected-care-bg-title"><?= get_field('block2_title') ?></h2>
              <div class="connected-care-bg-subtitle">
                <?= get_field('block2_text') ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="fistyre-supported">
            <?php $field = get_field('block2_list') ?>
            <?php if ($field): ?>
              <?php foreach ($field as $item): ?>
                <div class="col-12 col-md-4 col-lg-4 middle fistyre-supported-item block-wt">
                  <div class="m-card__body_img">
                    <?php show_image($item['image'], [270, 221], ['class' => 'cmp-image__image a-image__default']) ?>
                  </div>
                  <div class="m-card__body">
                    <h2 class="m-card__title h4"><?= $item['title'] ?></h2>
                    <div class="m-card__description">
                      <?= $item['text'] ?>
                    </div>

                    <?php if ($item['url']): ?>
                      <div class="librelink-connected-care-bg-video">
                        <a href="<?= $item['url'] ?>">
                          <span><?= $item['link_label'] ?></span>
                          <img style="transform: rotate(180deg);" src="/wp-content/uploads/2023/09/164412.png" alt="">
                        </a>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>

        <?php if (get_field('block2_url')): ?>
          <div class="row">
            <a class="btn-connected-care-video" href="<?= get_field('block2_url') ?>">
              <span><?= get_field('block2_link_label') ?></span>
            </a>
          </div>
        <?php endif ?>
      </div>
    </div>

    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row row-revers-mobile">
          <div class="col-lg-6 col-sm-12 connected-care-faq">
            <h2 style="margin: 0 0 8px 0!important;text-align: right; text-transform:none!important;"
              class="benefitsforme-try-your-sensor">
              <strong><?= get_field('block3_title') ?></strong>
            </h2>
            <div class="connected-care-tabs-text"><?= get_field('block3_text') ?></div>

            <?php if (get_field('block3_url')): ?>
              <div class="tutorial-videos realworldevidence-button-rt">
                <a href="<?= get_field('block3_url') ?>" target="_self">
                  <span><?= get_field('block3_link_label') ?></span>
                </a>
              </div>
            <?php endif ?>

          </div>
          <div class="col-lg-6 col-sm-12">
            <?php show_image(get_field('block3_image')) ?>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-236">
      <div class="container reader realReader">
        <div class="footer-list">
          <p><b><?= get_field('footer_title') ?></b></p>

          <?php $field = get_field('footer_list') ?>
          <?php if ($field): ?>
            <?php foreach ($field as $item): ?>
              <p>
                <span class="disclaimer-text">
                  <span class="color-text-gray">
                    <span class="font-12">
                      <em>
                        <?= $item['text'] ?>
                      </em>
                    </span>
                  </span>
                </span>
              </p>
            <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>