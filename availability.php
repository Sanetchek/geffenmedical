<?php

/**
 * Template Name: Availability
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
<div class="availability-page">
  <?php get_template_part('template-parts/breadcrumbs') ?>

  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12 contact-page-menu-title">
        <h1 class="text-al-start"><?= get_field('sub_title') ?></h1>
      </div>
    </div>
  </div>
  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12 contact-page-menu-title">
        <?php $image = get_field('image');
          if ($image) {
            echo get_image($image);
          }
        ?>
        <h4 class="availability-subtitle"><?= get_field('text') ?></h4>
      </div>
    </div>
  </div>

  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12">
        <div class="availability-accordion">

          <?php if (get_field('freestyle')) : ?>
          <div class="availability-accordion-item">
            <div class="availability-accordion-header">
              <div class="availability-accordion-header-logo">
                <?php $image = get_field('freestyle_image');
                  if ($image) {
                    echo get_image($image);
                  }
                ?>
                <h4 class="availability-subtitle"><?= get_field('freestyle_subtitle') ?></h4>
              </div>
              <div class="availability-arrow">
                <img src="<?= assets('img/chevron-down2.svg') ?>" alt="chevron-down">
              </div>
            </div>
            <div class="availability-accordion-content">
              <table class="availability-accordion-table">
                <tr>
                  <th class="availability-accordion-item-first"><?= __('פרטים ', 'geffen') ?></th>
                  <th><?= __('כללית', 'geffen') ?></th>
                  <th><?= __('מכבי', 'geffen') ?></th>
                  <th><?= __('מאוחדת ', 'geffen') ?></th>
                  <th><?= __('לאומית ', 'geffen') ?></th>
                  <th><?= __('אגף השיקום ', 'geffen') ?></th>
                  <th><?= __('צה״ל ', 'geffen') ?></th>
                </tr>

                <?php $table = get_field('freestyle_table') ?>
                <?php if ($table) : ?>
                <?php foreach ($table as $item) : ?>
                <tr class="item-row-mobile">
                  <td class="availability-accordion-item-details"><?= $item['name'] ?></td>
                  <td>
                    <?php $group = $item['general_social_security'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['maccabi_cooperative'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['united_cpf'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['national_social_security_fund'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['ministry_defence'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['idf'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                </tr>
                <?php endforeach ?>
                <?php endif ?>

              </table>
            </div>
          </div>
          <?php endif ?>

          <?php if (get_field('omnipod')) : ?>
          <div class="availability-accordion-item">
            <div class="availability-accordion-header">
              <div class="availability-accordion-header-logo omnipod-mobile-logo-availability-accordion">
                <div style="max-width: 170px;">
                  <?php $image = get_field('omnipod_image');
                  if ($image) {
                    echo get_image($image);
                  }
                ?>
                </div>
                <h4 class="availability-subtitle"><?= get_field('omnipod_subtitle') ?></h4>
              </div>
              <div class="availability-arrow">
                <img src="<?= assets('img/chevron-down2.svg') ?>" alt="chevron-down">
              </div>
            </div>
            <div class="availability-accordion-content">
              <table class="availability-accordion-table">
                <tr>
                  <th class="availability-accordion-item-first"><?= __('פרטים ', 'geffen') ?></th>
                  <th><?= __('כללית', 'geffen') ?></th>
                  <th><?= __('מכבי', 'geffen') ?></th>
                  <th><?= __('מאוחדת ', 'geffen') ?></th>
                  <th><?= __('לאומית ', 'geffen') ?></th>
                  <th><?= __('אגף השיקום ', 'geffen') ?></th>
                  <th><?= __('צה״ל ', 'geffen') ?></th>
                </tr>

                <?php $table = get_field('omnipod_table') ?>
                <?php if ($table) : ?>
                <?php foreach ($table as $item) : ?>
                <tr class="item-row-mobile">
                  <td class="availability-accordion-item-details"><?= $item['name'] ?></td>
                  <td>
                    <?php $group = $item['general_social_security'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['maccabi_cooperative'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['united_cpf'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['national_social_security_fund'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['ministry_defence'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['idf'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                </tr>
                <?php endforeach ?>
                <?php endif ?>

              </table>
            </div>
          </div>
          <?php endif ?>

          <?php if (get_field('clickfine')) : ?>
          <div class="availability-accordion-item">
            <div class="availability-accordion-header">
              <div class="availability-accordion-header-logo">
                <?php $image = get_field('clickfine_image');
                  if ($image) {
                    echo get_image($image);
                  }
                ?>
                <h4 class="availability-subtitle"><?= get_field('clickfine_subtitle') ?></h4>
              </div>
              <div class="availability-arrow">
                <img src="<?= assets('img/chevron-down2.svg') ?>" alt="chevron-down">
              </div>
            </div>
            <div class="availability-accordion-content">
              <table class="availability-accordion-table">
                <tr>
                  <th class="availability-accordion-item-first"><?= __('פרטים ', 'geffen') ?></th>
                  <th><?= __('כללית', 'geffen') ?></th>
                  <th><?= __('מכבי', 'geffen') ?></th>
                  <th><?= __('מאוחדת ', 'geffen') ?></th>
                  <th><?= __('לאומית ', 'geffen') ?></th>
                  <th><?= __('אגף השיקום ', 'geffen') ?></th>
                  <th><?= __('צה״ל ', 'geffen') ?></th>
                </tr>

                <?php $table = get_field('clickfine_table') ?>
                <?php if ($table) : ?>
                <?php foreach ($table as $item) : ?>
                <tr class="item-row-mobile">
                  <td class="availability-accordion-item-details"><?= $item['name'] ?></td>
                  <td>
                    <?php $group = $item['general_social_security'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['maccabi_cooperative'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['united_cpf'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['national_social_security_fund'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['ministry_defence'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['idf'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                </tr>
                <?php endforeach ?>
                <?php endif ?>

              </table>
            </div>
          </div>
          <?php endif ?>

          <?php if (get_field('vitrex')) : ?>
          <div class="availability-accordion-item">
            <div class="availability-accordion-header">
              <div class="availability-accordion-header-logo">
                <?php $image = get_field('vitrex_image');
                  if ($image) {
                    echo get_image($image);
                  }
                ?>
                <h4 class="availability-subtitle"><?= get_field('vitrex_subtitle') ?></h4>
              </div>
              <div class="availability-arrow">
                <img src="<?= assets('img/chevron-down2.svg') ?>" alt="chevron-down">
              </div>
            </div>
            <div class="availability-accordion-content">
              <table class="availability-accordion-table">
                <tr>
                  <th class="availability-accordion-item-first"><?= __('פרטים ', 'geffen') ?></th>
                  <th><?= __('כללית', 'geffen') ?></th>
                  <th><?= __('מכבי', 'geffen') ?></th>
                  <th><?= __('מאוחדת ', 'geffen') ?></th>
                  <th><?= __('לאומית ', 'geffen') ?></th>
                  <th><?= __('אגף השיקום ', 'geffen') ?></th>
                  <th><?= __('צה״ל ', 'geffen') ?></th>
                </tr>

                <?php $table = get_field('vitrex_table') ?>
                <?php if ($table) : ?>
                <?php foreach ($table as $item) : ?>
                <tr class="item-row-mobile">
                  <td class="availability-accordion-item-details"><?= $item['name'] ?></td>
                  <td>
                    <?php $group = $item['general_social_security'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['maccabi_cooperative'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['united_cpf'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['national_social_security_fund'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['ministry_defence'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['idf'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                </tr>
                <?php endforeach ?>
                <?php endif ?>

              </table>
            </div>
          </div>
          <?php endif ?>

          <?php if (get_field('meters_sticks')) : ?>
          <div class="availability-accordion-item">
            <div class="availability-accordion-header">
              <div class="availability-accordion-header-logo">
                <?php $image = get_field('meters_sticks_image');
                  if ($image) {
                    echo get_image($image);
                  }
                ?>
                <h4 class="availability-subtitle"><?= get_field('meters_sticks_subtitle') ?></h4>
              </div>
              <div class="availability-arrow">
                <img src="<?= assets('img/chevron-down2.svg') ?>" alt="chevron-down">
              </div>
            </div>
            <div class="availability-accordion-content">
              <table class="availability-accordion-table">
                <tr>
                  <th class="availability-accordion-item-first"><?= __('פרטים ', 'geffen') ?></th>
                  <th><?= __('כללית', 'geffen') ?></th>
                  <th><?= __('מכבי', 'geffen') ?></th>
                  <th><?= __('מאוחדת ', 'geffen') ?></th>
                  <th><?= __('לאומית ', 'geffen') ?></th>
                  <th><?= __('אגף השיקום ', 'geffen') ?></th>
                  <th><?= __('צה״ל ', 'geffen') ?></th>
                </tr>

                <?php $table = get_field('meters_sticks_table') ?>
                <?php if ($table) : ?>
                <?php foreach ($table as $item) : ?>
                <tr class="item-row-mobile">
                  <td class="availability-accordion-item-details"><?= $item['name'] ?></td>
                  <td>
                    <?php $group = $item['general_social_security'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['maccabi_cooperative'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['united_cpf'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['national_social_security_fund'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['ministry_defence'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['idf'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                </tr>
                <?php endforeach ?>
                <?php endif ?>

              </table>
            </div>
          </div>
          <?php endif ?>

          <?php if (get_field('glucose_products')) : ?>
          <div class="availability-accordion-item">
            <div class="availability-accordion-header">
              <div class="availability-accordion-header-logo">
                <?php $image = get_field('glucose_products_image');
                  if ($image) {
                    echo get_image($image);
                  }
                ?>
                <h4 class="availability-subtitle"><?= get_field('glucose_products_subtitle') ?></h4>
              </div>
              <div class="availability-arrow">
                <img src="<?= assets('img/chevron-down2.svg') ?>" alt="chevron-down">
              </div>
            </div>
            <div class="availability-accordion-content">
              <table class="availability-accordion-table">
                <tr>
                  <th class="availability-accordion-item-first"><?= __('פרטים ', 'geffen') ?></th>
                  <th><?= __('כללית', 'geffen') ?></th>
                  <th><?= __('מכבי', 'geffen') ?></th>
                  <th><?= __('מאוחדת ', 'geffen') ?></th>
                  <th><?= __('לאומית ', 'geffen') ?></th>
                  <th><?= __('אגף השיקום ', 'geffen') ?></th>
                  <th><?= __('צה״ל ', 'geffen') ?></th>
                </tr>

                <?php $table = get_field('glucose_products_table') ?>
                <?php if ($table) : ?>
                <?php foreach ($table as $item) : ?>
                <tr class="item-row-mobile">
                  <td class="availability-accordion-item-details"><?= $item['name'] ?></td>
                  <td>
                    <?php $group = $item['general_social_security'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['maccabi_cooperative'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['united_cpf'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['national_social_security_fund'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['ministry_defence'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php $group = $item['idf'] ?>
                    <?php $image = $group['icon'];
                          if ($image) {
                            echo get_image($image);
                          }
                        ?>

                    <?php if ($group['text']) : ?>
                    <p class="availability-accordion-item-details-text"><?= $group['text'] ?></p>
                    <?php endif ?>
                  </td>
                </tr>
                <?php endforeach ?>
                <?php endif ?>

              </table>
            </div>
          </div>
          <?php endif ?>

        </div>
      </div>
    </div>
  </div>

  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12">
        <div class="availability-subdetalis">
          <img src="<?= assets('img/check-blue.png') ?>" alt="check-blue">
          <h4 class="availability-subtitle"><?= get_field('availability_in_funds') ?></h4>
        </div>
      </div>
    </div>
  </div>

  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12">
        <h4 class="availability-detalssubtitle"><?= get_field('info') ?></h4>
      </div>
    </div>
  </div>

  <div class="conteiner-663" class="availability-content-pdf">
    <div class="row">
      <div class="col-md-12">
        <?php
          $pdf = get_field('pdf_files');
          $count = 0;
        ?>
        <?php if ($pdf) : ?>
        <?php foreach ($pdf as $item) : ?>

        <?php if ($count%2 == 0) : ?>
        <div class="availability-pdf">
          <?php endif ?>

          <a href="<?= $item['link'] ?>" target="_blank"><?= $item['name'] ?></a>

          <?php if ($count%2 == 1) : ?>
        </div>
        <?php endif ?>

        <?php $count++; ?>
        <?php endforeach ?>
        <?php endif ?>

      </div>
    </div>
  </div>


</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const accordionItems = document.querySelectorAll(".availability-accordion-item");

    accordionItems.forEach(item => {
      const header = item.querySelector(".availability-accordion-header");
      const content = item.querySelector(".availability-accordion-content");
      const arrow = header.querySelector(".availability-arrow");

      header.addEventListener("click", function () {
        if (content.style.display === "none" || content.style.display === "") {
          content.style.display = "block";
          arrow.style.transform = "rotate(180deg)";
        } else {
          content.style.display = "none";
          arrow.style.transform = "rotate(0deg)";
        }
      });
    });
  });
</script>
<?php
get_footer(); ?>