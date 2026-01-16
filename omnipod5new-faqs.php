<?php

/**
 * Template Name: Omnipod5-FAQs
 * Template Post Type: omnipod5
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

<div class="omnipod-style-page">

  <main class="omnipod-main-page what-is-omnipod omnipod-dash sensor-integrations new-mp">

    <div class="omnipod-main-page-title sensor-integrations-title-block">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-7 col-sm-12">
            <h1 class="h1"><?= get_field('page_title') ?></h1>
          </div>
          <div class="col-lg-7 col-sm-12">
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader  layout-space-above">
      <div class="section g-24-40">
        <p><?= get_field('block1_text') ?></p>
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-12 col-sm-12">
            <div class="text-body">
              <div>
                <?php if (get_field('faqs')) : ?>
                <?php foreach (get_field('faqs') as $item) : ?>
                <div class="sensor-integrations-block-3-container-features">
                  <div class="sensor-integrations-block-3-container-features-image">
                    <?php 
                      $image = $item['image'];
                      $size = 'full';
                      if( $image ) {
                        echo wp_get_attachment_image( $image, $size, false, array( 'style' => 'max-width: 90px; width: 75px; height: auto;max-height: 75px;' ) );
                        }
                    ?>
                  </div>
                  <div class="sensor-integrations-block-3-container-features-text">
                    <h3 class="sensor-integrations-features-h3"><?= $item['title'] ?></h3>
                    <div class="sensor-integrations-block-3-container-faqs-text-link">
                      <p><?= $item['text'] ?> <a class="td-underline" href="<?= $item['link'] ?>"><strong><?= $item['text_link'] ?></strong></a></p>
                    </div>

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

  </main>
</div>

<?php get_footer(); ?>