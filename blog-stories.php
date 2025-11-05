<?php

/**
 * Template Name: Blog-stories
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
                <?php
                  $cur = '';
                  if (get_the_title() === $item['title']) {
                    $cur = ' current';
                  }
                ?>
                <div class="main-page-menu-content">
                  <a href="<?= $item['link'] ?>" tabindex="0">
                    <div class="main-page-menu-item<?= $cur ?>">
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

  <?php
    // Get all categories
    $categories = get_categories(['taxonomy' => 'personal_stories_category', 'hide_empty' => true]);
  ?>
  <?php if ($categories) : ?>
  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12">
        <div class="blog-article-subcategory">
          <?php foreach ($categories as $category) : ?>
          <a href="<?= get_category_link($category->term_id) ?>"><?= $category->name ?></a>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
  <?php endif ?>


  <?php
    $posts = get_posts(array(
      'post_type'      => 'personal_stories',
      'post_status'    => 'publish',
      'posts_per_page' => -1,
    ));
    $count = 0;
  ?>

  <div class="conteiner-968 contact-response-time">
    <div class="row blog-row">
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