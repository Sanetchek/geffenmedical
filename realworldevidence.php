<?php

/**
 * Template Name: Realworldevidence
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

  <main class="libre librelink-app librelink-benefitsforme realworldevidence">

    <div class="librelink-realworldevidence-title" style="background: url(<?= get_field('image') ?>) no-repeat center / cover">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-12 col-md-6">
              <?php show_image(get_field('image_mobile'), 'full', ['class'=> 'mobile-img-title']) ?>
            </div>
            <div class="col-12 col-md-6">
              <h1><?= get_field('title') ?></h1>
              <h3><?= get_field('text') ?></h3>
              <?php $field = get_field('list') ?>
              <?php if ($field) : ?>
              <ul>
                <?php foreach ($field as $item) : ?>
                  <li><?= $item['text'] ?></li>
                <?php endforeach ?>
              </ul>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="fistyre-supported librelink-benefitsforme-article">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-12">
              <h2 class="benefitsforme-try-your-sensor content-new-block-center">
                <strong>
                  <div class="title-new-block-center"><?= get_field('bock1_title') ?></div>
                </strong>
              </h2>

              <?php $gallery = get_field('block1_images') ?>
              <?php if ($gallery) : ?>
                <?php foreach ($gallery as $img) : ?>
                  <?php show_image($img) ?>
                <?php endforeach ?>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $field = get_field('block2_list') ?>
    <?php if ($field) : ?>
      <?php foreach ($field as $key => $item) : ?>
        <div class="container reader realReader">
          <div class="row realworldevidence-articles">
            <?php if ($key%2 == 0) : ?>
              <div class="col-lg-6 col-sm-12">
                <?php show_image($item['image'], [464,573], ['width'=> '464', 'height' => '573']) ?>
              </div>
            <?php endif ?>

            <div class="col-lg-6 col-sm-12 benefits-for-people">
              <h2 style="margin: 40px 0 8px 0!important;text-align: right;" class="benefitsforme-try-your-sensor">
                <strong>
                  <?= $item['title'] ?>
                </strong>
              </h2>
              <div class="realworldevidence-article-title">
                <?= $item['text'] ?>
              </div>
            </div>

            <?php if ($key%2 == 1) : ?>
              <div class="col-lg-6 col-sm-12">
                <?php show_image($item['image'], [464,573], ['width'=> '464', 'height' => '573']) ?>
              </div>
            <?php endif ?>
          </div>
        </div>
      <?php endforeach ?>
    <?php endif ?>

    <div class="container reader realReader">
      <div class="row benefitsforme-articles">
        <div class="col-lg-7 col-sm-12 benefits-for-people">
          <h3 style="	color: rgb(0,20,137);"><?= get_field('block3_title') ?></h3>
          <p><?= get_field('block3_text') ?></p>

          <div class="realworldevidence-article-button">
            <?php $field = get_field('block3_links') ?>
            <?php if ($field) : ?>
              <?php foreach ($field as $item) : ?>
                <?php if ($item['url']) : ?>
                  <div class="tutorial-videos realworldevidence-button-lf">
                    <a href="<?= $item['url'] ?>" target="_self">
                      <span><?= $item['link_label'] ?></span>
                    </a>
                  </div>
                <?php endif ?>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>

        <div class="col-lg-5 col-sm-12">
          <?php show_image(get_field('block3_image'), [464,573], ['width'=> '464', 'height' => '573']) ?>
        </div>
      </div>
    </div>

    <div class="bg-236">
      <div class="container reader realReader">
        <div class="footer-list">
          <p><b><?= get_field('footer_title') ?></b></p>

          <?php $field = get_field('footer_list') ?>
          <?php if ($field) : ?>
            <?php foreach ($field as $item) : ?>
              <p>
                <span class="disclaimer-text">
                  <span class="color-text-gray">
                    <span class="font-12"><?= $item['text'] ?></span>
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