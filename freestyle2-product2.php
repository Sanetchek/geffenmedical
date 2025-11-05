<?php

/**
 * Template Name: Freestyle2-product2
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

$custom_notice = add_to_cart_notification();

// Multiple add to cart with couple variations
get_template_part('template-parts/freestyle/libre-processing');

get_header();
?>
<div class="librelink-app">
  <div id="container-bcee7ede1e" class="container a-container a-container--secondary a-container--gradient-center">
    <div
      class="m-hero m-hero--medium m-hero--half-width m-hero--content-center m-hero--text-align-center m-hero--image-contain m-hero--text-vertical-align-top m-hero--image-position">
      <div class="row no-gutters fl-r-revers">
        <div class="m-hero__media ">
          <div class="m-hero__image d-none d-lg-block d-md-none d-sm-none d-xl-block">
            <?php show_image(get_field('image'), [450, 500], ['class' => 'cmp-image__image']) ?>
          </div>

          <div>
            <div class="m-hero__image d-none d-lg-none d-sm-none d-md-block d-xl-none">
              <?php show_image(get_field('image'), [450, 500], ['class' => 'cmp-image__image']) ?>
            </div>
          </div>

          <div>
            <div class="m-hero__image d-lg-none d-sm-block d-xl-none d-md-none">
              <?php show_image(get_field('image'), [450, 500], ['class' => 'cmp-image__image']) ?>
            </div>
          </div>
        </div>

        <div class="m-hero__content" data-animated="false">
          <h1 style="	color: rgb(0,20,137);"><?= get_field('title') ?></h1>
          <div class="m-hero__body">
            <h4><?= get_field('text') ?></h4>
          </div>
          <div class="m-hero__extras">

            <?php if (get_field('url_2')): ?>
              <div class="button link a-button a-button--secondary justify-content-center a-button--rounded">
                <a id="button-62e6a4d6ed" class="btn " href="<?= get_field('url_2') ?>" target="_self">
                  <span><?= get_field('link_label_2') ?></span>
                </a>
              </div>
            <?php endif ?>

            <?php if (get_field('url_1')): ?>
              <div class="button link a-button a-button--primary a-button--rounded">
                <a id="button-3dcdb0df57" class="btn " href="<?= get_field('url_1') ?>" target="_self">
                  <span><?= get_field('link_label_1') ?></span>
                </a>
              </div>
            <?php endif ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container reader realReader">
    <div class="section g-24-40">
      <div class="row">
        <h2 style="text-align: center;"><?= get_field('block1_title') ?></h2>

        <?php $field = get_field('block1_list') ?>
        <?php if ($field): ?>
          <?php foreach ($field as $item): ?>
            <div class="col-lg-4 col-sm-12 benefits-for-people freestyle2-product-user">
              <?php show_image($item['image'], [80, 80], ['width' => '80']) ?>
              <h3><?= $item['title'] ?></h3>
              <p><?= $item['text'] ?></p>
            </div>
          <?php endforeach ?>
        <?php endif ?>
        <div  id="product-info-fl-sensor"></div>
      </div>
    </div>
  </div>

  <?php
  $product = get_field('product');
  ?>

  <?php if ($product): ?>
    <?php $product_id = $product->ID; ?>
    <div class="container reader realReader product-info-fl-sensor" id="fl-product2">
      <div class="section g-24-40">
        <div class="row fl2-product-sensors">
          <div class="col-lg-6 col-sm-12">
            <h2 style="color:#000;"><?= $product->post_title ?></h2>
            <div class="font-18">
              <?php $desc = get_field('tab_more_info', $product_id); ?>
              <?php if ($desc): ?>
                <?php echo $desc['description']; ?>
              <?php endif ?>
            </div>

            <?php get_template_part('template-parts/freestyle/product', 'add-to-cart', ['id' => $product_id]) ?>

            <div class="product-detail__disclaimer">
              <?= get_field('product_terms') ?>
            </div>
          </div>

          <div class="col-lg-6 col-sm-12">
            <?php
            $featured_image_id = get_post_thumbnail_id($product_id);

            if ($featured_image_id) {
              $image = wp_get_attachment_image_src($featured_image_id, 'full'); // You can change 'full' to other image sizes if needed
              $image_url = $image[0];

              // Now $image_url contains the URL of the featured image for the product
              echo '<img src="' . esc_url($image_url) . '" alt="Featured Image" width=404>';
            } else {
              // If the product doesn't have a featured image
              echo 'No featured image available';
            }
            ?>
          </div>

        </div>
      </div>
    </div>
  <?php endif ?>

  <div class="librelink-benefitsforme-title">
    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row g-24-40">
          <div class="col-12 benefits-for-people">
            <h3 style="text-align: center;" class="benefitsforme-try-your-sensor">
              <strong><?= get_field('block2_title') ?></strong>
            </h3>

            <?php if (get_field('block2_url')): ?>
              <div class="a-link" style="text-align: center;">
                <a class="a-link__text" style="display: flex;justify-content: center;"
                  href="<?= get_field('block2_url') ?>" target="_self" tabindex="0">
                  <span class="a-link__inner-text"
                    style="margin-right: 10px;"><?= get_field('block2_link_label') ?></span>
                    <img style="transform: rotate(180deg);" src="/wp-content/uploads/2023/09/164412.png" alt="">
                </a>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container reader realReader">
    <div class="section g-24-40"  style="margin-bottom: 0;padding-bottom: 0;">
      <div class="row">
        <h2 class="cmp-title__text">
          <div style="text-align: center;">
            <?= get_field('block3_title') ?>
          </div>
        </h2>
      </div>
      <div class="row" style="display: flex;justify-content: center;">
        <?php $field = get_field('block3_possibilities') ?>
        <?php if ($field): ?>
          <?php foreach ($field as $item): ?>
            <div class="monitoring-system-used">
              <div>
              <?php show_image($item['image'], [40, 40]) ?>
              </div>
              <h4><?= $item['title'] ?></h4>

              <?php $list = $item['list'] ?>
              <?php if ($list): ?>
                <ul>
                  <?php foreach ($list as $val): ?>
                    <li class="monitoring-system-used-step">
                      <div class="col-1">
                        <img src="<?= assets('img/fl-check.png') ?>" alt="fl-check">
                      </div>
                      <div class="col-11">
                        <p class="m-custom-list__title"><span class="font-12"><?= $val['text'] ?></span></p>
                      </div>
                    </li>
                  <?php endforeach ?>
                </ul>
              <?php endif ?>
            </div>
          <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>
  </div>

  <!--<div class="a-container--dark">
    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row">
          <h2 style="text-align: center;color:#001489;"><?= get_field('block4_title') ?></h2>

          <?php $field = get_field('block4_list') ?>
          <?php if ($field): ?>
          <?php foreach ($field as $item): ?>
          <div class="col-lg-6 col-sm-12">
            <h2 class="m-card__title h4">
              <span style="	color: black;"><?= $item['title'] ?></span>
            </h2>

            <div class="cta1 link button a-link a-link--icon">
              <div class="a-link">
                <?php if ($item['url']): ?>
                <a id="link-c4ecc3c5a2" class="a-link__text" href="<?= $item['url'] ?>" target="_self" tabindex="0">
                  <span class="a-link__inner-text">
                    <span style="	color: rgb(0,20,137);"><?= $item['link_label'] ?></span>
                  </span>
                </a>
                <?php endif ?>
              </div>
            </div>
          </div>
          <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>-->

  <!--<div class="librelink-benefitsforme-title">
    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row g-24-40">
          <div class="col-12 benefits-for-people">
            <h3 style="text-align: center;" class="benefitsforme-try-your-sensor">
              <strong><?= get_field('block5_title') ?></strong>
            </h3>

            <?php if (get_field('block5_url')): ?>
              <div class="a-link" style="text-align: center;">
                <a class="a-link__text" style="display: flex;justify-content: center;"
                  href="<?= get_field('block5_url') ?>" target="_self" tabindex="0">
                  <img src="<?= assets('img/read-more-arrow.png') ?>" alt="read-more-arrow">
                  <span class="a-link__inner-text"
                    style="margin-right: 10px;"><?= get_field('block5_link_label') ?></span>
                </a>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>-->


  <div class="container reader realReader ">
    <div class="product__bigImg product__bigImg--reader reader-page padding-zero fl2-product-sensors">
      <div class="product__bigImg-text reader-page">
        <h2><?= get_field('block6_title') ?></h2>
        <h3><?= get_field('block6_subtitle') ?></h3>
        <div class="content" style="font-size: 18px;"><?= get_field('block6_text') ?></div>
        <p class="apps-link">
          <?php if (get_field('block6_google_link')): ?>
              <a href="<?= get_field('block6_google_link') ?>" target="_blank">
                <?php show_image(get_field('block6_google_play'), [168, 50], ['class' => 'attachment-large size-large', 'width' => '168', 'height' => '50']) ?>
              </a>
          <?php endif ?>

          <?php if (get_field('block6_ios_link')): ?>
              <a href="<?= get_field('block6_ios_link') ?>" target="_blank">
                <?php show_image(get_field('block6_ios'), [168, 50], ['class' => 'attachment-large size-large', 'width' => '168', 'height' => '50']) ?>
              </a>
          <?php endif ?>
        </p>
      </div>
      <div class="libre__header_image">
        <?php show_image(get_field('block6_image'), [450, 600], ['class' => 'attachment-large size-large', 'width' => '450', 'height' => '600']) ?>
      </div>
    </div>
  </div>

  <div class="container responsivegrid a-container a-container--light aem-GridColumn aem-GridColumn--default--12 fl2-product-sensors" >
    <section id="section-container-f5eb9a80ed">
      <div class="a-container__row">
        <div class="a-container__content">
          <div id="container-f5eb9a80ed" class="cmp-container">
            <div class="container responsivegrid a-container pb-0">
              <section id="section-container-4773f42f4d">
                <div class="a-container__row">
                  <div class="a-container__content">
                    <div id="container-4773f42f4d" class="cmp-container">

                      <div class="container responsivegrid a-container">
                        <section id="section-container-9c02237b6f">
                          <div class="a-container__row">
                            <div class="a-container__content">
                              <div id="container-9c02237b6f" class="cmp-container">

                                <div class="text">
                                  <div id="text-07ab768985" class="cmp-text">

                                    <h2 style="	text-align: center;color: rgb(0,20,137);"><?= get_field('block7_title') ?></h2>
                                    <div style="text-align: center;"><?= get_field('block7_text') ?></div>
                                  </div>
                                </div>
                                <div class="columncontrol column-align--center">
                                  <div id="columncontrol-86443c681d" class="container">
                                    <div class="row fl-r-revers">
                                      <?php $field = get_field('block7_list') ?>
                                      <?php if ($field): ?>
                                          <?php foreach ($field as $item): ?>
                                              <div class="col-12 col-md-4 col-lg-4 columncontrol__column ">
                                                <article data-js-component="card"
                                                  class="m-card m-card--large m-card--padding m-card--fit"
                                                  style="height: 392px;">

                                                  <a id="cards-b1b812c889" class="m-card-link" href="<?= $item['link'] ?>" target="_self">

                                                    <div class="m-card__media">
                                                      <div class="m-card__wrap">
                                                        <div class="m-card__image">
                                                          <div id="image-b1b812c889" class="cmp-image cmp-image--desktop">
                                                            <?php show_image($item['image'], [300, 210], ['class' => 'cmp-image__image a-image__default']) ?> <!-- tablet Image -->
                                                            <?php show_image($item['image'], [300, 210], ['class' => 'cmp-image__image a-image__default  cmp-image__image--tablet']) ?>
                                                             <!-- mobile Image -->
                                                             <?php show_image($item['image'], [300, 210], ['class' => 'cmp-image__image a-image__default  cmp-image__image--mobile']) ?>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <div class="m-card__body">
                                                      <p class="m-card__title h4"><?= $item['title'] ?></p>
                                                      <div class="m-card__description">
                                                        <p><?= $item['text'] ?></p>
                                                      </div>

                                                      <div class="nonClickableLink nonclickablelink">
                                                        <p class="font-weight-bold"></p>
                                                      </div>
                                                    </div>

                                                  </a>

                                                </article>
                                              </div>
                                          <?php endforeach ?>
                                      <?php endif ?>

                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="a-container__media">
                              <div class="a-container__image">
                              </div>
                            </div>
                            <div class="a-container__media__mobile">
                            </div>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>
                  <div class="a-container__media">
                    <div class="a-container__image">
                    </div>
                  </div>
                  <div class="a-container__media__mobile">
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
        <div class="a-container__media">
          <div class="a-container__image">
          </div>
        </div>
        <div class="a-container__media__mobile">
        </div>
      </div>
    </section>
  </div>

  <div class="container reader realReader">
    <div class="section g-24-40">
      <div class="row fl2-product-sensors">
        <div class="col-lg-6 col-sm-12 connected-care-faq">
          <h2 style="margin: 0 0 8px 0!important;text-align: right; text-transform:none!important;"
            class="benefitsforme-try-your-sensor">
            <strong><?= get_field('block8_title') ?></strong>
          </h2>
          <div class="connected-care-tabs-text"><?= get_field('block8_text') ?></div>
          <div class="tutorial-videos realworldevidence-button-rt">
            <?php if (get_field('block8_url')): ?>
                <a href="<?= get_field('block8_url') ?>" target="_self">
                  <span><?= get_field('block8_link_label') ?></span>
                </a>
            <?php endif ?>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <?php show_image(get_field('block8_image')) ?>
        </div>
      </div>
    </div>
  </div>


</div>
<div class="a-container--dark">
  <div
    class="container responsivegrid a-container a-container--dark container-full-width aem-GridColumn aem-GridColumn--default--12">
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
                <?php if ($repeater): ?>
                  <?php foreach ($repeater as $item): ?>
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



<?php get_footer() ?>