<?php

/**
 * Template Name: About Us
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
<div class="about-us-page">
  <?php get_template_part('template-parts/breadcrumbs') ?>

  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12 contact-page-menu-title">
        <h1 class="text-al-start">
          <?php the_title() ?>
        </h1>
      </div>
    </div>
  </div>

  <div class="our-story-row mt-70">
    <div class="conteiner-968">
      <div class="row" style="display: flex;flex-direction: row-reverse;">
        <div class="col-md-6">
          <div class="our-story-img">
            <?php $image = get_field('block_1_image_1'); ?>
            <?php if ($image): ?>
                <?= get_image($image, 'large') ?>
            <?php endif ?>

            <?php $image = get_field('block_1_image_2'); ?>
            <?php if ($image): ?>
                <?= get_image($image, 'large', ['class' => 'our-story-img-decore']) ?>
            <?php endif ?>
          </div>
        </div>

        <div class="col-md-6">
          <div class="our-story-text">
            <h1 class="text-al-start">
              <?php the_field('block_1_title') ?>
            </h1>
            <p>
              <?php the_field('block_1_text') ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="innovation-row">
  <div class="conteiner-968">
    <div class="row" style="display: flex;flex-direction: row-reverse;">
      <div class="col-md-6">
        <div class="innovation-text">
          <h1 class="text-al-start">
            <?php the_field('block_2_title') ?>
          </h1>
          <p>
            <?php the_field('block_2_text') ?>
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="our-story-img">
          <?php $image = get_field('block_2_image_1'); ?>
          <?php if ($image): ?>
              <?= get_image($image, 'large') ?>
          <?php endif ?>

          <?php $image = get_field('block_2_image_2'); ?>
          <?php if ($image): ?>
              <?= get_image($image, 'large', ['class' => 'our-story-img-decore']) ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="our-story-row">
  <div class="conteiner-968">
    <div class="row" style="display: flex;flex-direction: row-reverse;">
      <div class="col-md-6">
        <div class="our-story-img">
          <?php $image = get_field('block_3_image'); ?>
          <?php if ($image): ?>
              <?= get_image($image, 'large') ?>
          <?php endif ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="our-story-text mt-70">
          <h1 class="text-al-start">
            <?php the_field('block_3_title') ?>
          </h1>
          <p>
            <?php the_field('block_3_text') ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="conteiner-review">
  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-al-start" style="padding-top: 36px;">
          <?= __('מה חשבו עלינו? ', 'geffen') ?>
        </h1>
        <div class="add-review">
          <button id="openPopupButton">
            <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                <line x1="8.65393" y1="3.125" x2="8.65393" y2="13.875" stroke="#0A3B64" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round" />
                <line x1="3.625" y1="8.13672" x2="14.375" y2="8.13672" stroke="#0A3B64" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round" />
              </svg></span>
            להוספה של ביקורת
          </button>
          <div id="popup" class="popup">
            <div class="popup-content">
              <span id="closePopupButton" class="close-button">×</span>
                <?php
                $content = '[contact-form-7 id="c685e85" title="new-review"]';
                echo do_shortcode($content);
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="main-page-promotions">
          <div class="responsive-us">
            <?php
              $args = [
                'posts_per_page' => -1,
                'post_type' => 'think-about-us'
              ];

              $posts = get_posts($args);
            ?>

            <?php if ($posts) : ?>
              <?php foreach ($posts as $post) : ?>
                <?php $id = $post->ID ?>

                <!--1-->
                <div class="about-as-review-content">
                  <h3><?= get_the_title($id) ?></h3>
                  <div class="review-decore">
                    <img src="<?= assets('img/quotes.png') ?>" alt="quotes">
                  </div>
                  <div class="review-stars">
                    <?php $rating = get_field('rating', $id); ?>

                    <?php if ($rating) : ?>
                      <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <?php if ($i <= $rating) : ?>
                          <img src="<?= assets('img/star-gold.png') ?>" alt="star-gold">
                        <?php else : ?>
                          <img src="<?= assets('img/star.png') ?>" alt="star">
                        <?php endif ?>
                      <?php endfor ?>
                    <?php endif ?>
                  </div>
                  <div>
                  <style>
  .about-as-review-content-text {
    margin: 0;
    -webkit-line-clamp: 4;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
  </style>
                    <p class="about-as-review-content-text">
                      <?= get_the_content(null, false, $id) ?>
                    </p>
                  </div>
                  <div class="review-decore2">
                    <img src="<?= assets('img/quotes.png') ?>" alt="quotes">
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

<?php get_template_part( 'template-parts/companies' ) ?>

<?php
get_footer(); ?>