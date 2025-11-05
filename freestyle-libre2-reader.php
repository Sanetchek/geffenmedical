<?php

/**
 * Template Name: Freestyle-libre2-reader
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
<div class="librelink-app freestyle-libre2-reader">
  <?php
  $product = get_field('product');
  ?>

  <?php if ($product): ?>
    <?php $product_id = $product->ID; ?>

    <div class="fixed-block" style="display: block;">
      <div class="fixed-block-wrap">
        <div class="productTitle" style="color:#fff">
          <?= $product->post_title ?>
        </div>

        <?php get_template_part('template-parts/freestyle/product', 'add-to-cart3', ['id' => $product_id]) ?>
      </div>
    </div>

    <div class="container reader realReader product__details">
      <div class="section g-24-40">
        <div class="row">
          <div class="row justify-content-center">
            <div class="col-8">
              <h1 class="d-none d-md-block"><?= $product->post_title ?></h1>
              <h1 class="d-md-none"><?= $product->post_title ?></h1>
              <div class="freestyle-libre2-reader-content-product">
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
                <div class=" col-md-8">
                  <div class="font-18">
                    <?php $desc = get_field('tab_more_info', $product_id); ?>
                    <?php if ($desc): ?>
                      <?php echo $desc['description']; ?>
                    <?php endif ?>
                  </div>
                  <p></p>

                  <?php get_template_part('template-parts/freestyle/product', 'add-to-cart2', ['id' => $product_id]) ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!--    <div id="show_product_popup"></div>
  <?php endif ?>

  <div class="reader realReader freestyle-libre2-reader">
    <div>
      <div class="row">
        <div class="col-12">
          <div class="tabs">
            <div class="tabs-items  tabs-block-gr-bg">
              <?php $how = get_field('how_it_works') ?>
              <?php if ($how): ?>
                <div class="tab-item" data-content="1" style="font-size: 18px;"><?= $how['tab_name'] ?></div>
              <?php endif ?>

              <?php $spec = get_field('specifications') ?>
              <?php if ($spec): ?>
                <div class="tab-item" data-content="2" style="font-size: 18px;"><?= $spec['tab_name'] ?></div>
              <?php endif ?>

              <?php $soft = get_field('software') ?>
              <?php if ($soft): ?>
                <div class="tab-item" data-content="3" style="font-size: 18px;"><?= $soft['tab_name'] ?></div>
              <?php endif ?>
            </div>

            <div class="tabs-content">

              <?php if ($how): ?>
                <div id="tab_content_1" class="tab-content">
                  <div class="row  justify-content-center">
                    <div class="col-md-10">
                      <div class="description__full howItWorks">

                        <?php $field = $how['list'] ?>
                        <?php if ($field): ?>
                          <?php foreach ($field as $key => $item): ?>
                            <?php $key++ ?>
                            <div class=" howItWorks__item">
                              <div class="howItWorks__number"><?= $key ?></div>
                              <div class="description__header"><?= $item['title'] ?></div>
                              <div class="howItWorks__text"><?= $item['text'] ?></div>
                            </div>
                          <?php endforeach ?>
                        <?php endif ?>

                        <?php if ($how['url']): ?>
                          <a href="<?= $how['url'] ?>">
                            <button class="btn btn-transp btn-transp--orange btn-close-collapse"><?= $how['link_label'] ?></button>
                          </a>
                        <?php endif ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif ?>

              <?php if ($spec): ?>
                <div id="tab_content_2" class="tab-content">
                  <div class="row  justify-content-center">
                    <div class="col-md-10">
                      <div class="description__full specifications">
                        <h4><?= $spec['title'] ?></h4>
                        <table class="table table-bordered">
                          <tbody>

                            <?php $field = $spec['table'] ?>
                            <?php if ($field): ?>
                              <?php foreach ($field as $item): ?>
                                <tr>
                                  <td><span class="prod-spec"><?= $item['title'] ?></span></td>
                                  <td><span class="prod-spec-desc"><?= $item['text'] ?></td>
                                </tr>
                              <?php endforeach ?>
                            <?php endif ?>

                          </tbody>
                        </table>

                        <?php if ($spec['url']): ?>
                          <a href="<?= $spec['url'] ?>">
                            <button class="btn btn-transp btn-transp--orange btn-close-collapse"><?= $spec['link_label'] ?></button>
                          </a>
                        <?php endif ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif ?>

              <?php if ($soft): ?>
                <div id="tab_content_3" class="tab-content">
                  <div class="row justify-content-center">
                    <div class="col-md-10">
                      <div class="description__full software">
                        <div class="description__header"><?= $soft['title'] ?></div>
                        <div><?= $soft['text'] ?></div>

                        <?php $field = $soft['features'] ?>
                        <?php if ($field): ?>
                          <?php foreach ($field as $item): ?>
                          <div class="software__icon">
                            <?php show_image($item['image']) ?>
                            <span><?= $item['title'] ?></span>
                          </div>
                          <?php endforeach ?>
                        <?php endif ?>

                        <div><?= $soft['description'] ?></div>

                        <?php $field = $soft['buttons'] ?>
                        <?php if ($field): ?>
                          <?php foreach ($field as $btn): ?>
                            <?php if ($btn['url']): ?>
                                <a href="<?= $btn['url'] ?>">
                                  <button class="btn btn-orange tabs-link-button tabs-link-button-40"><?= $btn['link_label'] ?></button>
                                </a>
                            <?php endif ?>
                          <?php endforeach ?>
                        <?php endif ?>

                        <?php if ($soft['url']): ?>
                          <a href="<?= $soft['url'] ?>">
                            <button class="btn btn-transp btn-transp--orange btn-close-collapse tabs-link-button"><?= $soft['link_label'] ?></button>
                          </a>
                        <?php endif ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="product__content product__content--blue freestyle-libre2-reader">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h2><?= get_field('block1_title') ?></h2>
        <div><?= get_field('block1_text') ?></div>
      </div>
    </div>
  </div>

  <div class="freestyle-libre2-reader freedom-dream h-799">
    <div class="row justify-content-center product__cont h-799">
      <div class="col-lg-5 product__block product__block--blue h-799">
        <div class="product__text-block product__text-block--blue reader-page">
          <h3><?= get_field('block2_title') ?></h3>
          <div><?= get_field('block2_text') ?></div>
        </div>
      </div>
      <div class="col-lg-7 product__block h-799">
        <?php show_image(get_field('block2_image'), 'full', ['class' => 'h-799']) ?>
      </div>
    </div>
  </div>

  <div class="freestyle-libre2-reader">
    <div class="product__bigImg product__bigImg--reader reader-page"
      style="background: url('<?= get_field('block3_image') ?>') center center no-repeat;">
      <div class="product__bigImg-text reader-page">
        <h3><?= get_field('block3_title') ?></h3>
        <div><?= get_field('block3_text') ?></div>
      </div>
    </div>
  </div>

  <div class="freestyle-libre2-reader freedom-dream h-799">
    <div class="row justify-content-center product__cont">
      <div class="col-lg-5 product__block product__block--blue">
        <div class="product__text-block product__text-block--blue reader-page">
          <h3><?= get_field('blocl4_title') ?></h3>
          <div><?= get_field('block4_text') ?></div>

          <?php $field = get_field('block4_list') ?>
          <?php if ($field): ?>
            <?php foreach ($field as $item): ?>
              <b><?= $item['title'] ?></b>
              <p><?= $item['text'] ?></p>
            <?php endforeach ?>
          <?php endif ?>

          <p class="notice"><?= get_field('block4_notice') ?></p>
        </div>
      </div>
      <div class="col-lg-7 product__block">
        <?php show_image(get_field('block4_image')) ?>
      </div>
    </div>
  </div>

  <div class="freestyle-libre2-reader">
    <div class="product__related non-transform">
      <h2><?= get_field('block5_title') ?></h2>
      <div class="row justify-content-center ">

        <?php $field = get_field('') ?>
        <?php if ($field): ?>
          <?php foreach ($field as $item): ?>
        <div class="col-md-5 product__related-item">
          <h3 style="font-size: 28px;"><?= $item['title'] ?></h3>
          <?php show_image($item['image']) ?>-->
      <!-- change it for prod -->
      <!--<?php if ($item['url']): ?>
            <a href="<?= $item['url'] ?>" class="btn btn-orange"><?= $item['link_label'] ?></a>
          <?php endif ?>
        </div>

          <?php endforeach ?>
        <?php endif ?>

      </div>
    </div>
  </div>-->

  <div class="freestyle-libre2-reader">
    <div style="font-size:12px; padding: 0 4%;"><?= get_field('footer_text') ?></div>
    <!-- <ul class="list">
      <?php $field = get_field('footer_list') ?>
      <?php if ($field): ?>
        <?php foreach ($field as $item): ?>
          <li><?= $item['text'] ?></li>
        <?php endforeach ?>
      <?php endif ?>
    </ul>-->
  </div>
</div>

</div>
<script src="https://unpkg.com/@babel/preset-env"></script>
<?php get_footer() ?>