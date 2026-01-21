<?php

/**
 * Template Name: Omnipod5 Summary
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

  <main class="omnipod-main-page what-is-omnipod omnipod-dash new-mp summary-safety-clinical-performance-page">

    <div class="omnipod-main-page-title sensor-integrations-title-block" style="background-color: #ffa700;">
      <div class="section g-24-40">
        <div class="row">
          <div class="col-lg-9 col-sm-12">
            <h1 class="omnipod-h1"><?= get_field('page_title') ?></h1>
          </div>
          <div class="col-lg-3 col-sm-12">
          </div>
        </div>
      </div>
    </div>


    <div class="container reader realReader layout-space-above">
      <div class="container reader realReader m-t120">
        <div class="row f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <div class="summary-safety-clinical-performance-list mobile-w-83">
              <?php if (get_field('summary_list')) : ?>
              <?php foreach (get_field('summary_list') as $item) : ?>
              <a style="text-decoration: underline !important;" href="<?= $item['link'] ?>" target="_blank" rel="noopener noreferrer">
                <p style="text-align: right !important;color: #8d61c8 !important;"><?= $item['text'] ?></p>
              </a>
              <?php endforeach ?>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>




  </main>
</div>

<?php get_footer(); ?>