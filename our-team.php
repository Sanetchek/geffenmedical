<?php

/**
 * Template Name: Our Team
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
 <style>
  .conteiner3-our-teams .all-teams-block-icon{
    display: none;
  }
  </style>
<div class="contact-page">
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
  <div class="contact-page-menu-row our-team-row">
    <div class="conteiner-968">
      <div class="row direction-row">
        <div class="col-12 col-md-9">
          <h2 class="all-teams-title">
            <?= __( 'הנהלה', 'geffen') ?>
          </h2>
          <div class="row contact-page-menu-content direction">

            <?php
            $args = array(
              'post_type' => 'our-team',
              'tax_query' => array(
                array(
                  'taxonomy' => 'team_roles',
                  'field'    => 'slug',
                  'terms'    => 'management',
                ),
              ),
            );

            $custom_query = new WP_Query($args);

            if ($custom_query->have_posts()) {
              while ($custom_query->have_posts()) {
                $custom_query->the_post();
                // Output post content or do whatever you want with the posts ?>
                <div class="contact-icon teams-first-row">
                  <div class="all-teams-block-icon">
                    <div class="all-teams-icon">
                      <?php the_post_thumbnail('thumbnail') ?>
                    </div>
                  </div>
                  <h3><?php the_title() ?></h3>
                  <div class="contact-item-decore"></div>
                  <p><?= get_field('position') ?></p>
                </div>
              <?php }
              wp_reset_postdata(); // Restore original post data
            } else {
              // No posts found
              echo __('לא נמצאו חברי צוות ', 'geffen');
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <div class="conteiner-968 contact-response-time regional-team-block">
  <div class="row">
    <div class="col-md-12">

      <div class="contact-response-time-content all-team-row" style="margin-top: 5%;">
        <h2 class="all-teams-title">
          <?= __('נציגי שטח איזוריים', 'geffen') ?>
        </h2>
        <div class="row contact-page-menu-content teams-page-menu-content regional-team">

          <?php
            $args = array(
              'post_type' => 'our-team',
              'tax_query' => array(
                array(
                  'taxonomy' => 'team_roles',
                  'field'    => 'slug',
                  'terms'    => 'medical',
                ),
              ),
            );

            $custom_query = new WP_Query($args);

            if ($custom_query->have_posts()) {
              while ($custom_query->have_posts()) {
                $custom_query->the_post();
                // Output post content or do whatever you want with the posts ?>
                <div class="contact-icon">
                  <h3><?= __('', 'geffen') . get_field('area_of_activity') ?></h3>
                  <div class="all-teams-block-icon">
                    <div class="all-teams-icon">
                      <?php the_post_thumbnail('thumbnail') ?>
                    </div>
                  </div>
                  <h4 class="all-teams-icon-title"><?php the_title() ?></h4>
                  <div class="contact-item-decore"></div>
                  <div class="all-teams-socials">
                    <?php if (get_field('phone_number')) : ?>
                      <?php $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', get_field('phone_number')); ?>
                      <a href="tel:<?= $string ?>">
                        <?php get_template_part('template-parts/svg/phone'); ?>
                      </a>
                    <?php endif ?>

                    <?php if (get_field('email')) : ?>
                      <a href="mailto:<?= get_field('email') ?>">
                        <?php get_template_part('template-parts/svg/email'); ?>
                      </a>
                    <?php endif ?>

                    <?php if (get_field('whatsapp')) : ?>
                      <a href="https://wa.me/<?= get_field('whatsapp') ?>" target="_blank">
                        <?php get_template_part('template-parts/svg/whatsapp'); ?>
                      </a>
                    <?php endif ?>
                  </div>
                </div>

              <?php }
              wp_reset_postdata(); // Restore original post data
            } else {
              // No posts found
              echo __('לא נמצאו חברי צוות ', 'geffen');
            }
          ?>

        </div>
        <div class="block-mr-100"></div>
      </div>
    </div>
  </div>
</div> -->

<div class="conteiner-968 contact-response-time">
  <div class="row">
    <div class="col-md-12">

      <div class="contact-response-time-content all-team-row conteiner3-our-teams">
        <h2 class="all-teams-title">
          <?= __('מחלקות', 'geffen') ?>
        </h2>
        <div class="row contact-page-menu-content teams-page-menu-content governing">

          <?php
            $args = array(
              'post_type' => 'our-team',
              'tax_query' => array(
                array(
                  'taxonomy' => 'team_roles',
                  'field'    => 'slug',
                  'terms'    => 'departments',
                ),
              ),
            );

            $custom_query = new WP_Query($args);

            if ($custom_query->have_posts()) {
              while ($custom_query->have_posts()) {
                $custom_query->the_post();
                // Output post content or do whatever you want with the posts ?>
                <div class="contact-icon">
                  <h3><?= get_field('department') ?></h3>
                  <div class="all-teams-block-icon">
                    <div class="all-teams-icon">
                      <?php the_post_thumbnail('thumbnail') ?>
                    </div>
                  </div>
                  <h4 class="all-teams-icon-title"><?= __(' ', 'geffen') . ' ' . the_title() ?></h4>
                  <div class="contact-item-decore"></div>
                  <div class="all-teams-socials">
                    <?php if (get_field('phone_number')) : ?>
                      <?php $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', get_field('phone_number')); ?>
                      <a href="tel:<?= $string ?>">
                        <?php get_template_part('template-parts/svg/phone'); ?>
                      </a>
                    <?php endif ?>

                    <?php if (get_field('email')) : ?>
                      <a href="mailto:<?= get_field('email') ?>">
                        <?php get_template_part('template-parts/svg/email'); ?>
                      </a>
                    <?php endif ?>

                    <?php if (get_field('whatsapp')) : ?>
                      <a href="https://wa.me/message/<?= get_field('whatsapp') ?>">
                        <?php get_template_part('template-parts/svg/whatsapp'); ?>
                      </a>
                    <?php endif ?>
                  </div>
                </div>

              <?php }
              wp_reset_postdata(); // Restore original post data
            } else {
              // No posts found
              echo __('לא נמצאו חברי צוות ', 'geffen');
            }
          ?>

        </div>
        <div class="block-mr-100"></div>
      </div>
    </div>
  </div>
</div>

<div class="block-mr-100"></div>

</div>
<?php
get_footer(); ?>