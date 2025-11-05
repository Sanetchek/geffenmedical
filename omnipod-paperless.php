<?php

/**
 * Template Name: Omnipod-paperless
 * Template Post Type: omnipod
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
  <main class="omnipod-main-page paperless">

    <div class="omnipod-main-page-title paperless-title-block">
      <div class="section g-24-40">
        <div class="row">
        <div class="col-lg-5 col-sm-12">
            <h1 class="h1"><?= get_field('main_title') ?></h1>
          </div>
          <div class="col-lg-7 col-sm-12">
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <?= get_field('main_description') ?>
    </div>

    <div class="bg-gray-gradient">
      <div class="container reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-lg-6 col-sm-12">
              <h3 class="omnipod-h3" style="text-align: center;"><?= get_field('block1_title') ?>  </h3>
                </h3>
              <div class="guides-img">
              <?php
              $image = get_field('block1_img');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size);
              }
               ?>
              </div>
              <div class="guides-list">
                <div class="text-body">
                  <ul>

                  <?php if (get_field('list')) : ?>
                    <?php foreach (get_field('list') as $item) : ?>
                      <li><a
                        href="<?= $item['link_url'] ?>"
                        target="_blank" class="external-processed" style="color: #8d61c8;!important"><?= $item['text_link'] ?></a> <?= $item['title'] ?>
                      </li>
                    <?php endforeach ?>
                   <?php endif ?>
                  </ul>
                  <p style="margin-top: 25px!important;"><strong><?= get_field('guide_title') ?></strong></p>
                  <ul>
                  <?php if (get_field('guide')) : ?>
                    <?php foreach (get_field('guide') as $guide) : ?>
                      <li><a
                        href="<?= $guide['link_url'] ?>"
                        target="_blank" class="external-processed" style="color: #8d61c8;!important"><?= $guide['text_link'] ?></a> <?= $guide['title'] ?>
                      </li>
                    <?php endforeach ?>
                   <?php endif ?>
                  </ul>
                </div>
              <!--  <div class="instructions-use-fl3 omnipod-accordions-page paperless-accordion">
                  <div class="accordion">
                    <div class="accordion-item">
                      <div class="accordion-header">
                        <span class="icon">+</span>
                        <p><strong><?=get_field('guide_title') ?></strong></p>
                      </div>
                      <div class="accordion-content" style="display: none;">
                        <div class="guides-list conteiner-968">
                          <div class="text-body">
                            <ul>
                            <?php if (get_field('guide_tab')) : ?>
                              <?php foreach (get_field('guide_tab') as $guide_tab) : ?>
                                 <li> <?= $guide_tab['title'] ?>
                                   <a href="<?= $guide_tab['link_url'] ?>" target="_blank" class="external-processed"><?= $guide_tab['text_link'] ?></a></li>
                              <?php endforeach ?>
                           <?php endif ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>-->

              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
            <h3 class="omnipod-h3" style="text-align: center;"><?= get_field('block2_title') ?></h3>
            <div class="guides-img">
            <?php
              $image = get_field('block2_img');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size);
              }
               ?>
            </div>
            <div class="guides-list">
              <div class="text-body">
                <ul>
                <?php if (get_field('block2_list')) : ?>
                    <?php foreach (get_field('block2_list') as $item2) : ?>
                      <li><a
                        href="<?= $item2['link_url'] ?>"
                        target="_blank" class="external-processed" style="color: #8d61c8;!important"><?= $item2['text_link'] ?></a> <?= $item2['title'] ?>
                      </li>
                    <?php endforeach ?>
                   <?php endif ?>
                </ul>
                <!-------
               <p style="margin-top: 25px!important;"><strong>Previous versions of the user Guide: </strong></p>
                <ul>
                  <li><a href="/sites/default/files/2021-10/17845-5C-AW_Rev%20002-03-20.pdf" target="_blank"
                      class="external-processed">Omnipod® System User Guide</a>&nbsp;(Version 03/20)</li>
                  <li><a href="/sites/default/files/2021-10/17845-5C-AW_001_Rev%20001%2007-19.pdf" target="_blank"
                      class="external-processed">Omnipod® System User Guide</a> (Version 07/19)</li>
                </ul>
              </div>
              <div class="instructions-use-fl3 omnipod-accordions-page paperless-accordion">
                <div class="accordion">
                  <div class="accordion-item">
                    <div class="accordion-header">
                      <span class="icon">+</span>
                      <p><strong>Other Support Materials:</strong></p>
                    </div>
                    <div class="accordion-content" style="display: none;">
                      <div class="guides-list conteiner-968">
                        <div class="text-body">
                          <ul>
                            <li>Omnipod® System Resource Guide: <a
                                href="/sites/default/files/2021-03/Resource-Guide_UK_EN-GB_mmol_Omnipod-Eros.pdf"
                                target="_blank" class="external-processed">View guide</a></li>
                            <li>Omnipod® System&nbsp; Quick Start Guide: <a
                                href="/sites/default/files/2021-03/Quick-Glance-Guide_UK_EN-GB_mmol_Omnipod-Eros.pdf"
                                target="_blank" class="external-processed">View guide</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>--->

            </div>
          </div>
          </div>
        </div>
      </div>
    </div>


  </main>
</div>

<?php get_footer(); ?>