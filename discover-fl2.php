 <?php

/**
 * Template Name: Discover-fl2
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
  <main class="discover-fl2">
    <div class="container">
      <div class="next">
        <div class="row align-items-center my-order-2">
          <div class="col-sm-6 col-12 next__header my-order-1">
            <h1><?= get_field('title') ?></h1>
          </div>
        </div>
      </div>

      <div class="contentPage parsys">
        <div class="product_text_Image parbase">
          <section class="prod-two-column container-fluid">
            <div class="row">
              <div class="col-md-12 col-xs-12 col-eq-height-wrapper padding-zero sensor-sale">

                <?php $group = get_field('discover') ?>
                <?php if ($group) : ?>
                <div class="col-md-7 col-xs-12 col-eq-height padding-zero ">
                  <?php
                    $img = $group['image'];
                    if ($img) {
                      echo get_image($img, 'large', ['class' => 'img imgSwap img-responsive wrap-image-de', 'width' => '100%']);
                    }
                  ?>
                </div>

                <div class="col-md-5 col-xs-12 col-eq-height padding-zero ">
                  <div class="pull-right text-center prod-row-desc ">
                    <h2 class="text-center"><?= $group['subtitle'] ?></h2>
                    <h4 style="text-align: center;"><?= $group['text'] ?></h4>

                    <?php if ($group['button_link']) : ?>
                      <a href="<?= $group['button_link'] ?>" class="btn btn-info btn-color buy-btn" role="button" target="_blank"><?= $group['button_label'] ?></a>
                    <?php endif ?>
                  </div>
                </div>
                <?php endif ?>

              </div>
            </div>
          </section>
        </div>

        <div class="rte ">
          <section class="section container-fluid " style="background-color:#ffd100">
            <div class="about ">
              <div class="row">
                <div class="text-center pdf-box col-md-7" id="orpRte">
                  <h3><span style="color: #001489;"><?= get_field('moving_title') ?></span></h3>
                </div>
              </div>
            </div>
          </section>
        </div>

        <?php $group = get_field('moving') ?>
        <?php if ($group) : ?>
        <div class="product_text_Image parbase">
          <section class="prod-two-column container-fluid">
            <div class="row ">
              <div class="col-md-12 col-xs-12 col-eq-height-wrapper padding-zero video-box">
                <div class="col-md-7 col-xs-12 col-eq-height padding-zero ">
                  <iframe id="playerembd" style="display: none;" width="100%" height="300"
                    onload="this.style.display='block';" class="embed-responsive-item"
                    src="<?= $group['youtube'] ?>" frameborder="0" allowfullscreen="1"
                    sandbox="allow-scripts allow-same-origin allow-popups"></iframe>
                </div>
                <div class="col-md-5 col-xs-12 col-eq-height padding-zero ">
                  <div class="pull-right text-center prod-row-desc ">
                    <h2><b><span style="color: #204780;font-weight: 600;"><?= $group['subtitle'] ?></span></b></h2>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <?php endif ?>

        <div class="image_title_des">

          <section class="section care-block container-fluid">
            <div class=" text-center">
              <div class="">
                <h3 class="fl-functionality-title"><span style="color: #E4572D;"><?= get_field('features_title') ?></span></h3>
                <p><span style="color: #E4572D;"><?= get_field('features_subtitle') ?></span></p>

                <div class="row flex-items-md fl-functionality-box">
                  <?php $list = get_field('features') ?>
                  <?php if ($list) : ?>
                    <?php foreach ($list as $item) : ?>
                      <div class="col-md-6">
                        <div>
                          <?php
                            $img = $item['image'];
                            if ($img) {
                              echo get_image($img, 'medium', ['class' => 'img', 'width' => '90']);
                            }
                          ?>
                        </div>
                        <div class="media-body">
                          <h4><span style="color: #E4572D;"><strong><?= $item['title'] ?></strong></span></h4>
                          <p><span style="color: #8E8E8E;"><?= $item['text'] ?></span></p>
                        </div>
                      </div>
                    <?php endforeach ?>
                  <?php endif ?>

                </div>
              </div>
            </div>

          </section>
        </div>

        <div class="image_text_bullet section">
          <section class="as-list container diabetes-management-section">
            <div class="row">
              <div class="col-md-12 df-rr">
                <div class="col-md-5">
                  <?php
                    $img = get_field('block3_image');
                    if ($img) {
                      echo get_image($img, 'large', ['class' => 'imgSwap img-choosing-site img-responsive']);
                    }
                  ?>
                </div>
                <div class="col-md-7 ">
                  <h3><span style="color: #e4572d;"><b><?= get_field('block3_title') ?></b></span></h3>
                  <h4><span style="color: #e4572d;"><b><?= get_field('block3_subtitle') ?></b></span></h4>
                  <p style="font-family: Gotham-Medium-Regular; color: #8e8e8e"><b><?= get_field('block3_text') ?></b></p>

                  <?php $list = get_field('block3_list') ?>
                  <?php if ($list) : ?>
                    <?php foreach ($list as $item) : ?>
                      <div class="media">
                        <div class=".d-sm-none .d-md-block pull-right">
                          <img src="<?= assets('img/Ellipse-As.png') ?>" class=" ellipse-as media-object" alt="Bullet" width="14" />
                        </div>
                        <div class="media-body">
                          <p><?= $item['text'] ?></p>
                        </div>
                      </div>
                    <?php endforeach ?>
                  <?php endif ?>

                </div>
              </div>
            </div>
          </section>

        </div>

        <div class="text_ImagePanel parbase">

          <section class="prod-two-column container-fluid">

            <div class="row">
              <div class="col-md-12 col-eq-height-wrapper padding-zero sensor-sale">
                <div class="col-md-7 col-xs-12 col-eq-height padding-zero">
                  <?php
                    $img = get_field('block4_image');
                    if ($img) {
                      echo get_image($img, 'large', ['class' => 'imgSwap img-responsive', 'width' => '100%']);
                    }
                  ?>
                </div>
                <div class="col-md-5 col-xs-12 col-eq-height" style="background:#204780;">
                  <div class="container pull-right text-center prod-row-desc">
                    <?php $list = get_field('block4_list') ?>
                    <?php if ($list) : ?>
                      <?php foreach ($list as $item) : ?>
                        <h3><span style="color: #FFFFFF;"><?= $item['title'] ?></span></h3>
                        <p><?= $item['text'] ?></p>
                      <?php endforeach ?>
                    <?php endif ?>
                  </div>
                </div>
              </div>
            </div>

          </section>
        </div>

        <div class="rte">
          <section class="container-fluid ">
            <div class="about">
              <div class="row">
                <div class="text-center banner-margin-registration col-md-8 col-md-offset-2 container">

                  <h3 style="text-align: center;"><span style="color: #0385a6;"><?= get_field('block5_title') ?></span>
                  </h3>
                  <p style="text-align: center;"><?= get_field('block5_text') ?></p>
                  <p style="text-align: center;">&nbsp;</p>
                  <p style="text-align: center;">
                    <?php if (get_field('block5_button_link')) : ?>
                      <a style="background-color: #E4572D; color: #ffffff!important; border-radius: 0px; font-family: 'Gotham-Medium-Regular'; text-transform: uppercase; letter-spacing: 2px; padding: 14px 24px; font-size: 14px; border-color: transparent !important;" href="<?= get_field('block5_button_link') ?>" target="_blank" adhocenable="false"><?= get_field('block5_button_label') ?></a>
                    <?php endif ?>
                    <br><br><br>
                  </p>

                </div>
              </div>
            </div>
          </section>

        </div>

        <div class="image_title_des">
          <section class="care-block container-fluid" style="background:#f4f2f4;">
            <div class="row text-center fl-functionality-box">
              <div class="container  col-md-offset-1 col-md-10">
                <h3><span style="color: #204780;"><?= get_field('block6_title') ?></span></h3>
                <h4 style="color: #204780;"><b><?= get_field('block6_text') ?></b></h4>

                <div class="row">
                  <?php $tools = get_field('block6_tools') ?>
                  <?php if ($tools) : ?>
                    <?php foreach ($tools as $item) : ?>
                      <div class="col-sm-6 applysensorTop">
                        <div class="media">
                          <div class="pull-right">
                            <?php
                              $img = $item['image'];
                              if ($img) {
                                echo get_image($img, 'thumbnail', ['class' => 'digital-img']);
                              }
                            ?>
                          </div>
                          <div class="media-body text-right">

                            <h4><span style="color: #204780;"><?= $item['title'] ?></span>
                            </h4>
                            <p><span style="color: #000000;"><?= $item['text'] ?></span></p>
                          </div>
                        </div>
                      </div>
                    <?php endforeach ?>
                  <?php endif ?>
                </div>

              </div>
            </div>

          </section>
        </div>

        <div class="product_text_Image parbase">
          <section class="prod-two-column container-fluid">
            <div class="row">
              <div class="col-md-12 col-xs-12 col-eq-height-wrapper sensor-sale">
                <div class="col-md-6 col-xs-12 col-eq-height" style="text-align: center; display: flex; justify-content: center;">
                  <?php
                    $img = get_field('block7_image');
                    show_image($img, 'large', ['class' => 'dekstope-img-fl imgSwap img-responsive wrap-image-de', 'width' => '100%']);
                  ?>
                </div>

                <div class="col-md-6 col-xs-12 col-eq-height" style="background:#204780;">
                  <div class="pull-right text-center prod-row-desc ">
                    <h3 class="text-center"><?= get_field('block7_title') ?></h3>
                    <p><span style="color: #204780;">.</span></p>
                    <?php if (get_field('block7_button_link')) : ?>
                      <a href="<?= get_field('block7_button_link') ?>" class="btn btn-info btn-color buy-btn" role="button" target="_blank"><?= get_field('block7_button_label') ?></a>
                    <?php endif ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>

        <div class="product__related non-transform section">
          <section class="container-fluid bg-white">
            <div class="col-md-12 ">
              <h2 class="text-center"><?= get_field('block8_title') ?></h2>
              <div class="row .justify-content-around ">

                <?php $product = get_field('block8_product') ?>
                <?php if ($product) : ?>
                  <?php foreach ($product as $item) : ?>
                    <div class="col-md-6 product__related-item">
                      <h3><?= $item['title'] ?></h3>
                      <?php show_image($item['image'], ['210', '210'], ['class' => 'img-responsive center-block']) ?>
                      <?php if ($item['button_link']) : ?>
                        <a href="<?= $item['button_link'] ?>" class="btn btn-orange" role="button"
                          width="300"  target="_blank"><span><?= $item['button_label'] ?></span>
                        </a>
                      <?php endif ?>
                    </div>
                  <?php endforeach ?>
                <?php endif ?>

              </div>
            </div>
          </section>
        </div>

        <div class="rte">
          <section class="container-fluid section" style="padding: 0;">
            <div class="about ">
              <div class="d-md-flex justify-content-center">
                <div class="container col-md-8 col-md-offset-2" id="orpRte">
                  <p style="text-align: center; font-size: 12px; "><span style="color: #0385a6;"><b><?= get_field('block8_bottom_text') ?></b></span>
                  </p>
                </div>
              </div>
            </div>
          </section>
        </div>

        <div class="text_ImagePanel parbase">
          <section class="prod-two-column container-fluid">
            <div class="row">
              <div class="col-md-12 col-eq-height-wrapper padding-zero df-rr">
                <div class="col-md-6 col-xs-12 col-eq-height" style="text-align: center;display: flex;justify-content: center;">
                  <?php show_image( get_field('block9_image'), 'large', ['calss' => 'dekstope-img-fl imgSwap img-responsive', 'width' => '100%'] ) ?>
                </div>
                <div class="col-md-6 col-xs-12 col-eq-height faqs-text-box">
                  <div class="pull-right text-center prod-row-desc">
                    <div style="text-align: right;">
                      <h2 style="padding-left:24px;color:#204780;"><span class="headingspanone"><?= get_field('block9_title') ?></span></h2>
                    </div><br><br>

                    <div class="txt_img_panel" style="text-align: right;">
                      <ul style="color: #204780; list-style: none;">

                        <?php $list = get_field('block9_list'); $count = 0; ?>
                        <?php if ($list) : ?>
                          <?php foreach ($list as $item) : ?>
                            <li style="padding-bottom: 20px; vertical-align: top;">
                              <div class="text_deco">
                                <?php
                                  $count++;
                                  echo $count;
                                ?>
                              </div>
                              <div style="display: inline-block; width: 90%;"><?= $item['text'] ?></div>
                            </li>
                          <?php endforeach ?>
                        <?php endif ?>

                      </ul>
                      <p style="text-align: right;">
                        <?php if (get_field('block9_button_link')) : ?>
                          <a style="background-color: #E4572D; color: #ffffff!important; border-radius: 0px; text-transform: uppercase; letter-spacing: 2px; padding: 14px 24px; font-size: 14px; border-color: transparent !important;" href="<?= get_field('block9_button_link') ?>" target="_blank"><?= get_field('block9_button_label') ?></a>
                        <?php endif ?>
                        <br>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>

        <div class="rte">
          <section class="container-fluid ">
            <div class="about ">
              <div class="row">
                <div class="text-center banner-margin-registration col-md-8 col-md-offset-2" id="orpRte">
                  <p><span style="color: #FFFFFF;">.</span></p>
                </div>
              </div>
            </div>
          </section>
        </div>

        <div class="row justify-content-between next__bottom">
          <?php if (get_field('block10_button_link_1')) : ?>
          <div class="col-6">
            <a href="<?= get_field('block10_button_link_1') ?>" class="next-link left" target="_blank">
              <img src="<?= assets('img/btn-right-arrow.png') ?>" alt="btn-right-arrow">
              <?= get_field('block10_button_label_1') ?>
            </a>
          </div>
          <?php endif ?>

          <?php if (get_field('block10_button_link_1')) : ?>
          <div class="col-6 text-left">
            <a href="<?= get_field('block10_button_link_2') ?>" class="next-link" target="_blank">
              <span><?= get_field('block10_button_label_2') ?></span>
              <img src="<?= assets('img/btn-left-arrow.png') ?>" alt="btn-left-arrow">
            </a>
          </div>
          <?php endif ?>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-8 ">
          <ul class="list">
            <?php $list = get_field('block10_list') ?>
            <?php if ($list) : ?>
              <?php foreach ($list as $item) : ?>
                <li>
                  <?= $item['text'] ?>
                </li>
              <?php endforeach ?>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
  </main>

  <?php get_template_part('template-parts/freestyle/footer') ?>
</div>