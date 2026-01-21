<?php

/**
 * Template Name: Omnipod5 Troubleshooting
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

  <main class="omnipod-main-page what-is-omnipod omnipod-dash new-mp troubleshooting-page">

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

    <div class="container reader realReader">
      <div class="section g-24-40">
        <p><?= get_field('block1_text') ?></p>
        <div class="container reader realReader">
          <div class="section g-24-40">
            <div class="row">
              <div class="col-lg-12 col-sm-12 f-alit-cent">
                <div
                  class="instructions-use-fl3 accordion-faq-new  omnipod-accordions-page paperless-accordion mobile-w-83">
                  <div class="accordion">
                    <?php if (get_field('faq')) : ?>
                    <?php foreach (get_field('faq') as $val) : ?>
                    <div class="accordion-item">
                      <div class="accordion-header">
                        <span class="icon">+</span>
                        <p><strong><?= $val['title'] ?></strong></p>
                      </div>
                      <div class="accordion-content" style="display: none;">
                        <?= $val['description'] ?>
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
      </div>
    </div>

  </main>
</div>

<?php get_footer(); ?>