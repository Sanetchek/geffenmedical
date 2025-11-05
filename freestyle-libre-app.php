<?php

/**
 * Template Name: Freestyle-libre-app
 * Template Post Type: freestyle_libre
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
<div class="free-style-libre">
  <?php get_template_part('template-parts/breadcrumbs') ?>

  <main class="libre librelink-app">
    <div class="container reader realReader">

      <div class="libre__header product__bigImg product__bigImg--reader reader-page padding-zero g-24-40">
        <div class="product__bigImg-text reader-page">
          <h1><?= get_field('title') ?></h1>
          <h3><?= get_field('subtitle') ?></h3>
          <p class="content"><?= get_field('text') ?></p>
          <p class="apps-link">
            <?php $group = get_field('google_app') ?>
            <?php if ( $group['link'] ) : ?>
            <a href="<?= $group['link'] ?>" target="_blank">
              <?php show_image($group['image']) ?>
            </a>
            <?php endif ?>

            <?php $group = get_field('ios_app') ?>
            <?php if ( $group['link'] ) : ?>
            <a href="<?= $group['link'] ?>" target="_blank">
              <?php show_image($group['image']) ?>
            </a>
            <?php endif ?>
          </p>
        </div>
        <div class="libre__header_image">
          <?php show_image(get_field('background_image')) ?>
        </div>
      </div>

      <div class="section g-24-40">
        <div class=" row">
          <div class="col-md-12 ">
            <h2><?= get_field('block1_title') ?></h2>
            <h3><?= get_field('block1_subtitle') ?></h3>
          </div>
          <div class="col-md-12 ">
            <?php show_image( get_field('block1_image') ) ?>
          </div>
        </div>
      </div>

      <div class="section g-24-40">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2><?= get_field('block2_title') ?></h2>
            <h3><?= get_field('block2_subtitle') ?></h3>
          </div>
        </div>

        <?php
          $list = get_field('how_to_connect');
          $content = 0;
          $active = '';
        ?>
        <?php if ($list) : ?>
        <div class="container tabs">
          <div class="tabs-items">
            <?php foreach ($list as $item) : ?>
            <?php
                $content++;
                $active = $content == 1 ? ' active' : '';
              ?>
            <div class="tab-item<?= $active ?>" data-content="<?= $content ?>"><?= $item['tab_name'] ?></div>
            <?php endforeach ?>
          </div>

          <?php $content = 0; ?>
          <div class="tabs-content">
            <?php foreach ($list as $item) : ?>
            <?php
                $content++;
                $active = $content == 1 ? ' active' : '';
              ?>
            <div id="tab_content_<?= $content ?>" class="tab-content<?= $active ?>">
              <h2><?= $item['title'] ?></h2>
              <h4><?= $item['subtitle'] ?></h4>

              <div class="row">
                <div class="col-sm-6">
                  <p><?= $item['text_before_list'] ?></p>

                  <?php $count = 1; ?>
                  <?php if ($item['list']) : ?>
                  <ul class="tab-list">
                    <?php foreach ($item['list'] as $li) : ?>
                    <?php $counter = $count < 10 ? '0'.$count : $count ?>
                    <li class="list-item">
                      <span class="count"><?= $counter ?></span>
                      <span><?= $li['text'] ?></span>
                    </li>
                    <?php $count++; ?>
                    <?php endforeach ?>
                  </ul>
                  <?php endif ?>

                  <p><?= $item['text_after_list'] ?></p>
                </div>

                <div class="col-sm-6 img-block-tabs-app">
                  <?php show_image($item['image']) ?>
                </div>
              </div>

              <div class="row more-info">
                <?= $item['more_info'] ?>
              </div>
            </div>
            <?php endforeach ?>
          </div>
        </div>
        <?php endif ?>
      </div>

      <div class="section g-24-40">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2><?= get_field('block3_title') ?></h2>
          </div>
        </div>

        <?php
          $list = get_field('benefits');
          $content = 0;
          $active = '';
        ?>
        <?php if ($list) : ?>
        <div class="container tabs">
          <div class="tabs-items">
            <?php foreach ($list as $item) : ?>
            <?php
                $content++;
                $active = $content == 1 ? ' active' : '';
              ?>
            <div class="tab-item<?= $active ?>" data-content="<?= $content ?>"><?= $item['tab_name'] ?></div>
            <?php endforeach ?>
          </div>

          <?php $content = 0; ?>
          <div class="tabs-content">
            <?php foreach ($list as $item) : ?>
            <?php
                $content++;
                $active = $content == 1 ? ' active' : '';
              ?>
            <div id="tab_content_<?= $content ?>" class="tab-content<?= $active ?>">
              <div class="row">
                <div class="col-sm-6 middle">
                  <h2><?= $item['title'] ?></h2>
                  <p><?= $item['description'] ?></p>
                </div>

                <div class="col-sm-6">
                  <?php show_image($item['image']) ?>
                </div>
              </div>
            </div>
            <?php endforeach ?>
          </div>
        </div>
        <?php endif ?>
      </div>

      <!-- <div class="section g-24-40">
        <div class="promo">
          <h3><?= get_field('block4_title') ?></h3>

          <?php if (get_field('block4_button_link')) : ?>
            <a href="<?= get_field('block4_button_link') ?>" class="promo-btn">
              <img src="<?= assets('img/sensor.svg') ?>" alt="sensor" class="promo-image">
              <?= get_field('block4_button_label') ?>
            </a>
          <?php endif ?>
        </div>
      </div>-->



      <!--<div class="container reader realReader">
        <div class="section g-24-40">
          <h2 style="margin: 40px 0 8px 0!important;" class="benefitsforme-try-your-sensor"><strong>Related
              Reading</strong></h2>
          <div class="fistyre-supported">
            <div class="col-12 col-md-4 col-lg-4 middle fistyre-supported-item block-wt">
              <a href="#">
                <div class="m-card__body_img">
                  <img width="270" height="221"
                    src="/wp-content/uploads/2023/11/image-faq.png"
                    class="cmp-image__image a-image__default" alt="">
                </div>
              </a>
              <div class="m-card__body"><a href="#">
                  <h2 class="m-card__title h4">FAQs</h2>
                  <div class="m-card__description">
                    <p>Find answers to some of the most common questions about LibreView and the rest of the FreeStyle
                      Portfolio.</p>
                  </div>
                </a>
                <div class="librelink-connected-care-bg-video"><a href="#">
                  </a><a href="https://www.freestyle.abbott/uk-en/support/faq.html">
                    <img src="/wp-content/uploads/2023/09/164412.png" alt="">
                    <span>Read FAQs</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 middle fistyre-supported-item block-wt">
              <a href="#">
                <div class="m-card__body_img">
                  <img src="/wp-content/uploads/2023/12/libreview-app-symbol-2x-2.png"
                    class="cmp-image__image a-image__default" alt="">
                </div>
              </a>
              <div class="m-card__body"><a href="#">
                  <h2 class="m-card__title h4">Connect to healthcare professionals</h2>
                  <div class="m-card__description">
                    <p>Use our cloud-based management solution LibreView<sup>₼</sup> as an option to stay connected to
                      your healthcare team.</p>
                  </div>
                </a>
                <div class="librelink-connected-care-bg-video"><a href="#">
                  </a><a href="https://www.freestyle.abbott/uk-en/products/connected-care/libreview.html">
                    <img src="/wp-content/uploads/2023/09/164412.png" alt="">
                    <span>Discover LibreView</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 middle fistyre-supported-item block-wt">
              <a href="#">
                <div class="m-card__body_img">
                  <img width="270" height="188"
                    src="/wp-content/uploads/2023/11/image-connected-care.png"
                    class="cmp-image__image a-image__default" alt="">
                </div>

              </a>
              <div class="m-card__body"><a href="#">
                  <h2 class="m-card__title h4">Connected Care </h2>
                  <div class="m-card__description">
                    <p>Discover how the FreeStyle Libre Ecosystem of products and apps connect together to help you
                      manage
                      your diabetes better.</p>
                  </div>
                </a>
                <div class="librelink-connected-care-bg-video"><a href="#">
                  </a><a href="https://www.freestyle.abbott/uk-en/products/connected-care.html">
                    <img src="/wp-content/uploads/2023/09/164412.png" alt="">
                    <span>Find out more</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>-->


      <div class="section g-24-40">
        <div class="">
          <div class="footer-list">
            <p><b><?= get_field('footer_title') ?></b></p>
            <p><?= get_field('footer_subtitle') ?></p>
            <?php $list = get_field('footer_list') ?>
            <?php if ($list) : ?>
            <?php foreach ($list as $item) : ?>
            <p>
              <?= $item['text'] ?>
            </p>
            <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
      </div>





    </div>
  </main>
</div>

<?php get_footer(); ?>