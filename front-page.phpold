<?php
/**
 * The front-page template file
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

<div class="main-page">
  <!-- Main -->
  <?php get_template_part('template-parts/home/main') ?>

  <!-- Products Category -->
  <?php get_template_part('template-parts/home/product-category') ?>

  <!-- Promotion -->
  <?php get_template_part('template-parts/home/promotion') ?>

  <?php if ( ! is_user_logged_in() ) : ?>
    <!-- Banner -->
   <?php get_template_part('template-parts/home/banner') ?>

    <!-- Benefits -->
    <?php get_template_part('template-parts/home/benefits') ?>
  <?php endif; ?>

  <!-- Companies -->
 

</div>
<div class="a-container--dark" style="margin-top: 5%;background: #fff;">
  <div
    class="container responsivegrid a-container container-full-width aem-GridColumn aem-GridColumn--default--12">
    <section id="section-container-1765383853">
      <div class="a-container__row">
        <div class="a-container__content">
          <div id="container-1765383853" class="cmp-container">
            <div class="text">
              <div id="text-e184d9b093" class="cmp-text">
                <p><span class="disclaimer-text"><span class="color-text-gray"><span
                        class="font-12"><strong><?= get_field('footer_title') ?></strong></span></span></span></p>
                <p><span class="disclaimer-text"><span class="color-text-gray"><span
                        class="font-12"><em><?= get_field('footer_subttile') ?></em></span></span></span></p>

                <?php $repeater = get_field('footer_list') ?>
                <?php if ($repeater) : ?>
                <?php foreach ($repeater as $item) : ?>
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
        </div>
      </div>
    </section>
  </div>
</div>
<?php
// get_sidebar();
get_footer();
