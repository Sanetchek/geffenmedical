<?php

/**
 * Template Name: Blog
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
<div class="contact-page">
  <?php
    $posts_per_page = 3;
    if (wp_is_mobile()) $posts_per_page =  -1; //2;
  ?>
  <?php get_template_part('template-parts/breadcrumbs') ?>

  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12 contact-page-menu-title">
        <h1 class="text-al-start text-center">
          <?php the_title() ?>
        </h1>
      </div>
    </div>
  </div>

  <div class="blog-page-menu-row">
    <div class="conteiner-968">
      <div class="row">
        <div class="col-md-12">
          <div class="row blog-page-menu-content">
            <?php $links = get_field('blog_links', 'option') ?>
            <?php if ($links) : ?>
              <?php foreach ($links as $item) : ?>
                <div class="main-page-menu-content">
                  <a href="<?= $item['link'] ?>" tabindex="0">
                    <div class="main-page-menu-item">
                      <?php show_image($item['image'], ['45', '45']) ?>
                    </div>
                    <span class="caption"><?= $item['title'] ?></span>
                  </a>
                </div>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<!--Post-->
  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12 blog-page-menu-title">
        <h1 class="text-al-start"><?= get_field('label_for_articles') ?></h1>
        <div class="blog-category-detals">
          <?php $group = get_field('articles_link') ?>
          <?php //if ($group['link']) : ?>
            <?php if (wp_is_mobile()):  ?>
              <a href="<?= $group['link'] ?>">
                <p class="blog-category-subtitle mobile"><?= $group['label'] ?></p>
              </a>
            <?php else: ?>
            <a href="<?= $group['link'] ?>">
              <p class="blog-category-subtitle"><?= $group['label'] ?></p>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 14" fill="none">
                <path d="M6.58594 13L1.29304 7.70711C0.90252 7.31658 0.90252 6.68342 1.29304 6.29289L6.58594 1M1 7H19" stroke="#0A3B64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
            <?php endif; ?>
          <?php //endif ?>
        </div>

      </div>
    </div>
  </div>


  <div class="conteiner-968 contact-response-time">
    <?php if (wp_is_mobile()): ?>
      <div class="row blog-row slick-slider-mobile">
    <?php else: ?>
      <div class="row blog-row">
    <?php endif; ?>

      <?php
        $posts = get_posts(array(
          'post_type'      => 'post',
          'post_status'    => 'publish',
          'posts_per_page' => $posts_per_page,
        ));
      ?>

      <?php if ($posts) : ?>
        <?php foreach ($posts as $post) : ?>
          <?php setup_postdata($post); ?>

          <?php get_template_part('template-parts/content', 'articles') ?>

        <?php endforeach ?>
        <?php wp_reset_postdata(); ?>
      <?php endif ?>

    </div>
  </div>

<!--Recipes-->
  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12 blog-page-menu-title">
        <h1 class="text-al-start"><?= get_field('label_for_recipes') ?></h1>
        <div class="blog-category-detals">
          <?php $group = get_field('recipes_link') ?>
          <?php if ($group['link']) : ?>
            <?php if (wp_is_mobile()):  ?>
              <a href="<?= $group['link'] ?>">
                <p class="blog-category-subtitle mobile"><?= $group['label'] ?></p>
              </a>
            <?php else: ?>
            <a href="<?= $group['link'] ?>">
              <p class="blog-category-subtitle"><?= __('לכל המתכונים ','geffen') ?></p>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 14" fill="none">
                <path d="M6.58594 13L1.29304 7.70711C0.90252 7.31658 0.90252 6.68342 1.29304 6.29289L6.58594 1M1 7H19" stroke="#0A3B64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
            <?php endif; ?>
          <?php endif ?>
        </div>

      </div>
    </div>
  </div>

  <div class="conteiner-968 contact-response-time">
    <?php if (wp_is_mobile()): ?>
      <div class="row blog-row slick-slider-mobile">
    <?php else: ?>
      <div class="row blog-row">
    <?php endif; ?>
      <?php
        $posts = get_posts(array(
          'post_type'      => 'recipes',
          'post_status'    => 'publish',
          'posts_per_page' => $posts_per_page,
        ));
      ?>

      <?php if ($posts) : ?>
        <?php foreach ($posts as $post) : ?>
          <?php setup_postdata($post); ?>

          <?php get_template_part('template-parts/content', 'recipes') ?>

        <?php endforeach ?>
        <?php wp_reset_postdata(); ?>
      <?php endif ?>

    </div>
  </div>

<!--Personal Stories-->
  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12 blog-page-menu-title">
        <h1 class="text-al-start"><?= get_field('label_for_personal_stories') ?></h1>
        <div class="blog-category-detals">
          <?php $group = get_field('personal_stories_link') ?>
          <?php if ($group['link']) : ?>
            <?php if (wp_is_mobile()):  ?>
              <a href="<?= $group['link'] ?>">
                <p class="blog-category-subtitle mobile"><?= $group['label'] ?></p>
              </a>
            <?php else: ?>
            <a href="<?= $group['link'] ?>">
              <p class="blog-category-subtitle"><?= __('לכל הסיפורים','geffen') ?></p>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 14" fill="none">
                <path d="M6.58594 13L1.29304 7.70711C0.90252 7.31658 0.90252 6.68342 1.29304 6.29289L6.58594 1M1 7H19" stroke="#0A3B64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
            <?php endif; ?>
          <?php endif ?>
        </div>

      </div>
    </div>
  </div>

  <div class="conteiner-968 contact-response-time">
    <?php if (wp_is_mobile()): ?>
      <div class="row blog-row slick-slider-mobile">
    <?php else: ?>
      <div class="row blog-row">
    <?php endif; ?>
      <?php
        $posts = get_posts(array(
          'post_type'      => 'personal_stories',
          'post_status'    => 'publish',
          'posts_per_page' => $posts_per_page,
        ));
      ?>

      <?php if ($posts) : ?>
        <?php foreach ($posts as $post) : ?>
          <?php setup_postdata($post); ?>

          <?php get_template_part('template-parts/content', 'articles') ?>

        <?php endforeach ?>
        <?php wp_reset_postdata(); ?>
      <?php endif ?>

    </div>
  </div>




</div>
<?php
get_footer(); ?>