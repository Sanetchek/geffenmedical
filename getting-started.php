
 <?php

/**
 * Template Name: Freestyle-Getting-Started
 * Template Post Type: freestyle_libre
 *
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

<main class="getting-started">
  <div class="container">
    <div class="next">
      <div class="row align-items-center">
        <div class="col-lg-8 col-12 next__header my-order-1"><?= get_field('first_title') ?></div>
        <div class="col-lg-4 col-sm-6 col-8">

          <!-- change for prod -->

          <?php if (get_field('first_url')) : ?>
            <a href="<?= get_field('first_url') ?>" class="next-link" target="_blank">
              <?= get_field('first_link_label') ?>
              <img src="<?= assets('img/btn-left-arrow.png') ?>" alt="btn-left-arrow">
            </a>
          <?php endif ?>

        </div>
      </div>
    </div>
    <div class="row justify-content-center product__cont">
      <div class="col-lg-5 product__block product__block--blue relative">
        <div class="product__text-block product__text-block--blue ">
          <div class="btns-group">
            <div id="my-inline-buttons" class="sharethis-inline-share-buttons"></div>
          </div>
          <h3><?= get_field('first_subtitle') ?></h3>
          <div><?= get_field('first_text') ?></div>
        </div>
      </div>
      <div class="col-lg-7 product__block">
        <?php show_image(get_field('firts_image'), 'large') ?>
      </div>
    </div>
    <div class="transition">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h2 class="black"><?= get_field('move_title') ?></h2>
          <p><?= get_field('move_text') ?></p>
        </div>
      </div>
    </div>
    <div class="diff">
      <div class="row justify-content-center">
        <div class="col-lg-7 col-8">
          <?php show_image(get_field('move_image'), 'large', ['style'=> 'width: auto;max-height: 370px;margin-bottom: 50px;margin-top: 25px;']) ?>
        </div>
        <div class="col-lg-4">
          <div class="diff__text" style="padding-top:0px;">
            <h3><?= get_field('test_title') ?></h3>
            <p><?= get_field('test_text') ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center product__cont">
      <div class="col-lg-5 product__block product__block--orange">
        <div class="product__text-block product__text-block--blue">
          <h3><?= get_field('calibr_title') ?></h3>
          <div><?= get_field('calibr_text') ?></div>
        </div>
      </div>
      <div class="col-lg-7 product__block">
        <?php show_image(get_field('calibr_image'), 'large') ?>
      </div>
    </div>
    <div class="libre__block libre__block--yellow" style="direction: rtl;">
      <div class="row justify-content-center">
        <div class="col-8">
          <h2><?= get_field('app_title') ?></h2>
          <p><?= get_field('app_text') ?></p>
        </div>
      </div>
      <div class="row justify-content-center getting-started__list">
        <div class="col-lg-4" style="display: flex;flex-direction: column;align-items: center;justify-content: center;">
          <?php show_image(get_field('app_image'), 'large', ['style'=> 'max-height: 400px; width: auto;']) ?>
          <p>
            <?php $group = get_field('google_app') ?>
            <?php if ($group && $group['link']) : ?>
              <a href="<?= $group['link'] ?>" target="_blank">
                <?php show_image($group['image'], [169,50]) ?>
              </a>
            <?php endif ?>

            <?php $group = get_field('ios_app') ?>
            <?php if ($group && $group['link']) : ?>
              <a href="<?= $group['link'] ?>" target="_blank">
                <?php show_image($group['image'], [169,50]) ?>
              </a>
            <?php endif ?>
          </p>
        </div>
        <div class="col-lg-6 ">
          <div class="libre__list" style="margin-top: 0;">
            <?php if (get_field('app_list')) : ?>
              <?php foreach (get_field('app_list') as $key => $item) : ?>
                <div class="libre__list-item"<?= $style = $key === 0 ? 'style="margin-top: 0;"' : ''; ?>>
                  <?php show_image($item['image'], [0,0], ['style'=> 'width: 70px;height: auto;']) ?>
                  <div>
                    <div class="libre__text"><?= $item['title'] ?></div>
                    <div><?= $item['text'] ?></div>
                  </div>
                </div>
              <?php endforeach ?>
            <?php endif ?>


          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-10">
        <?php if (get_field('footer_url')) : ?>
          <a href="<?= get_field('footer_url') ?>" class="next-link line" target="_blank">
            <?= get_field('footer_link_label') ?>
            <img src="<?= assets('img/btn-left-arrow.png') ?>" alt="btn-left-arrow">
          </a>
        <?php endif ?>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8 ">
        <ul class="list">
          <?php if (get_field('footer_list')) : ?>
            <?php foreach (get_field('footer_list') as $item) : ?>
              <li><?= $item['text'] ?></li>
            <?php endforeach ?>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </div>
</main>

<?php get_footer() ?>