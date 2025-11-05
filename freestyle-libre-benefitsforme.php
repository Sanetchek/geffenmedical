<?php

/**
 * Template Name: Freestyle-libre-benefitsforme
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

  <main class="libre librelink-app librelink-benefitsforme">

    <div class="librelink-benefitsforme-title">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-12">
              <h1><?= get_field('title') ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="fistyre-supported librelink-benefitsforme-article">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <?php if (get_field('posts')) : ?>
            <?php foreach (get_field('posts') as $item) : ?>
            <div class="col-12 col-md-4 col-lg-4 middle">
              <div class="fistyre-supported-item benefitsforme-article-item">
                <div class="benefitsforme-article-imageblock">
                  <?php show_image($item['image'], '338-200', ['class'=> 'cmp-image__image a-image__default']) ?>
                </div>
                <div class="m-card__body">
                  <h2 class="m-card__title h4"><?= $item['title'] ?></h2>
                  <div class="m-card__description">
                    <?php if ($item['url']) : ?>
                    <a href="<?= $item['url'] ?>" class="benefitsforme-article-readmore">
                      <img src="<?= assets('img/read-more-arrow.png') ?>" alt="read-more-arrow">
                      <span><?= $item['link_label'] ?></span>
                    </a>
                    <?php endif ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>

    <!--<div class="librelink-benefitsforme-title">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-12">
              <h2 class="benefitsforme-try-your-sensor"><?= get_field('free_title') ?></h2>
              <div class="tutorial-videos" style="justify-content: center;">
                <?php if (get_field('free_url')) : ?>
                  <a href="<?= get_field('free_url') ?>"><?= get_field('free_link_label') ?></a>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>-->
    <div id="type-1-diabetes"></div>
    <div class="benefits">
      <!-- Benefits -->

      <?php if (get_field('benefits')) : ?>
      <?php foreach (get_field('benefits') as $item) : ?>
      <div id="<?= $item['benefit_id'] ?>" class="container reader realReader">
        <div class="row benefitsforme-articles row-revers-mobile">
          <div class="col-lg-6 col-sm-12 benefits-for-people" id="benefits-for-people">
            <h3 style="	color: rgb(0,20,137);"><?= $item['title'] ?></h3>
            <ul class="tab-list fl2-create-account">
              <?php if ($item['list']) : ?>
              <?php foreach ($item['list'] as $list) : ?>
              <li class="list-item">
                <div class="benefitsforme-articles-list-title">
                  <div class="benefitsforme-articles-list-img">
                    <?php show_image($list['image'], [41,'auto'], ['class'=> '']) ?>
                  </div>
                  <p class="font-18"><strong><?= $list['title'] ?></strong>
                  </p>
                </div>
                <p class="benefitsforme-articles-list"><?= $list['text'] ?></p>
              </li>
              <?php endforeach ?>
              <?php endif ?>
            </ul>
            <div class="tutorial-videos">
              <?php if ($item['url']) : ?>
              <a href="<?= $item['url'] ?>"><?= $item['link_label'] ?></a>
              <?php endif ?>
            </div>
          </div>

          <div class="col-lg-6 col-sm-12 decstop-benefits-benefitsforme-articles">
            <?php show_image($item['image'], 'medium-large', ['class'=> 'attachment-large size-large']) ?>
          </div>
          <div class="col-lg-6 col-sm-12 mobile-benefits-benefitsforme-articles">
            <?php show_image($item['image_mobile'], 'medium', ['class'=> 'attachment-medium size-medium']) ?>
          </div>
        </div>
      </div>
      <?php endforeach ?>
      <?php endif ?>
    </div>
    <!--<div class="librelink-benefitsforme-title which-product">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-lg-6 col-sm-12 which-product-content">
              <h2 class="benefitsforme-try-your-sensor" style="text-align: right;font-weight: 700;"><?= get_field('right_title') ?></h2>
              <div class="tutorial-videos" style="justify-content: center;">
                <?php if (get_field('right_url')) : ?>
                  <a href="<?= get_field('right_url') ?>"><?= get_field('right_link_label') ?></a>
                <?php endif ?>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <?php show_image(get_field('right_image'), 'medium') ?>
            </div>
          </div>
        </div>
      </div>
    </div>-->

    <div class="fistyre-supported librelink-benefitsforme-article">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <h2 style="margin: 40px 0 8px 0!important;" class="benefitsforme-try-your-sensor">
            <strong><?= get_field('experiences_title') ?></strong></h2>
          <p style="color: #000;text-align: right;"><?= get_field('experiences_text') ?></p>
          <div class="row" style="padding-top: 20px;">

            <?php if (get_field('experiences')) : ?>
            <?php foreach (get_field('experiences') as $item) : ?>
            <div class="col-12 col-md-4 col-lg-4 middle">
              <div class="fistyre-supported-item benefitsforme-article-item benefitsforme-experiences">
                <div class="benefitsforme-article-imageblock">
                  <?php show_image($item['image'], '338-200', ['class'=> 'cmp-image__image a-image__default']) ?>
                </div>
                <div class="m-card__body">
                  <h2 class="m-card__title h4"><?= $item['title'] ?></h2>
                  <p style="text-align: right;"><?= $item['text'] ?></p>
                  <div class="m-card__description">
                    <?php if ($item['url']) : ?>
                    <a href="<?= $item['url'] ?>" class="benefitsforme-article-readmore">
                      <span><?= $item['link_label'] ?></span>
                    </a>
                    <?php endif ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach ?>
            <?php endif ?>

          </div>
        </div>
      </div>
    </div>

    <div class="bg-236">
      <div class="container reader realReader">
        <div class="footer-list">
          <p class="font-16"><b><?= get_field('footer_title') ?></b></p>

          <?php if (get_field('footer_list')) : ?>
          <?php foreach (get_field('footer_list') as $item) : ?>
          <p><span class="disclaimer-text"><em><span class="font-12"><?= $item['text'] ?></span></em></span></p>
          <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </div>


  </main>
</div>

<?php get_footer(); ?>