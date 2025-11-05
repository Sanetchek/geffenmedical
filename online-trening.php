<?php

/**
 * Template Name: Online Trening
 * Template Post Type: freestyle_libre, page
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

  <!-- <div class="blog-page-menu-row">
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
  </div>-->


<div class="conteiner-968 webinar">
  <div class="webinar-wrap">
    <h1 class="webinar-title"><?= get_field('title') ?></h1>
  </div>

  <div class="webinar-content"><?= get_field('content') ?></div>
      <div class="webinar-wrap">
        <div class="webinar-subtitle"><?= get_field('subtitle') ?></div>
        <div class="webinar-list">
          <?php $web = get_field('webinar_time') ?>
          <?php if ($web) : ?>
          <table>
            <tbody>
              <tr>
                <th class="seminar-date webinar-label"><?= get_field('label_for_date') ?></th>
                <th class="seminar-time webinar-label"><?= get_field('label_for_time') ?></th>
                <th class="seminar-registration webinar-label"><?= get_field('label_for_links') ?></th>
              </tr>
              <?php foreach ($web as $item) : ?>
              <?php if ($item['url']) : ?>
              <tr>
                <td class="webinar-item">
                  <p><?= $item['date'] ?></p>
                </td>
                <td class="webinar-item">
                  <p style="direction:ltr !important;"><?= $item['time'] ?></p>
                </td>
                <td class="webinar-item"><a href="<?= $item['url'] ?>" target="_blank"
                    class="webinar-item-link"><?= $item['link_label'] ?></a></td>
              </tr>
              <?php endif ?>
              <?php endforeach ?>
            </tbody>
          </table>
          <?php endif ?>
        </div>
      </div>
    </div>

  </div>
  <?php
get_footer(); ?>