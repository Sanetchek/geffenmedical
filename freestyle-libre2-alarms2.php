<?php

/**
 * Template Name: Freestyle-libre2-alarms2
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

  <div class="container-freestyle-libre2-alarms">
    <div class="container reader realReader">
      <div class="section g-24-40">
        <div class="row">
          <h1 style="	color: rgb(0,20,137);text-align: center;"><?= get_field('title') ?></h1>
          <h2 style="text-align: center; margin-bottom: 70px !important;"><?= get_field('main_text') ?></h2>

          <?php if (get_field('main_block')) : ?>
          <?php foreach (get_field('main_block') as $item) : ?>
          <div class="col-lg-4 col-sm-12 benefits-for-people freestyle2-product-user">
            <?php show_image($item['image'], '80-80', ['class'=> 'attachment-80x80 size-80x80 entered lazyloaded']) ?>

            <h3><?= $item['title'] ?></h3>
            <p><?= $item['text'] ?></p>
          </div>
          <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </div>
    <div class="container reader realReader">
      <?php if (get_field('how_works')) : ?>
      <?php foreach (get_field('how_works') as $item) : ?>
      <div class="row benefitsforme-articles row-revers-mobile">
        <div class="col-lg-6 col-sm-12 benefits-for-people">
          <h2 style="	color: rgb(0,20,137);margin-bottom: 30px !important;"><?= $item['title'] ?></h2>
          <ul class="tab-list fl2-create-account">
            <?php if ($item['list']) : ?>
            <?php foreach ($item['list'] as $list) : ?>
            <li class="list-item">
              <div class="benefitsforme-articles-list-title">
                <div class="benefitsforme-articles-list-img">
                  <?php show_image($list['image'], [29,'auto'], ['class'=> '']) ?>
                </div>
                <p style="color:#000;margin-right: 13px;"><strong><?= $list['title'] ?></strong>
                </p>
              </div>
              <p class="benefitsforme-articles-list"><?= $list['text'] ?></p>
            </li>
            <?php endforeach ?>
            <?php endif ?>
          </ul>
        </div>

        <div class="col-lg-6 col-sm-12 decstop-benefits-benefitsforme-articles">
          <?php show_image($item['image'], 'medium-large', ['class'=> 'attachment-large size-large']) ?> </div>
        <div class="col-lg-6 col-sm-12 mobile-benefits-benefitsforme-articles">
        </div>
      </div>
      <?php endforeach ?>
      <?php endif ?>
    </div>
    <div class="container reader realReader  mt-70">
      <div class="text">
        <div class="cmp-text">
          <h2 style="text-align: center;color: rgb(0,20,137);"><?= get_field('set_title') ?></h2>
          <p style="text-align: center;"><?= get_field('set_text') ?></p>
          <div>
            <?php show_image(get_field('set_image'), 'full') ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container reader realReader  mt-70">
      <div class="text">
        <div class="cmp-text">
          <h2 style="text-align: center;color: rgb(0,20,137);"><?= get_field('app_title') ?></h2>
          <p style="text-align: center;"><?= get_field('app_text') ?></p>
          <div>
            <?php show_image(get_field('app_image'), 'full') ?>
          </div>
        </div>
      </div>
    </div>
    <div
      class="container responsivegrid a-container a-container--secondary a-container--gradient-center aem-GridColumn aem-GridColumn--default--12  mt-70">
      <div class="section-info">
        <div class="section-title">
          <div class="section-title title a-title a-title--fg a-title--fg-primary text-center">
            <div id="title-8ed14c6dc4" class="cmp-title">
              <h2 class="cmp-title__text">
                <div style="text-align: center;"><?= get_field('activate_title') ?></div>
              </h2>
            </div>
          </div>
        </div>

        <div class="section-subtitle">
          <div id="text-d1483d4c9c" class="cmp-text">
            <p style="text-align: center;"><?= get_field('activate_text') ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="librelink-connected-care-tabs">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="container tabs">
            <div class="tabs-items">
              <div class="tab-item active" data-content="1" style="font-size: 14px;"><?= get_field('fs_fl_title') ?>
              </div>
            </div>

            <div class="tabs-content">
              <div id="tab_content_1" class="tab-content active">
                <div class="row ">
                  <?php if (get_field('app')) : ?>
                  <?php foreach (get_field('app') as $item) : ?>
                  <div class="col-lg-6 col-sm-12 benefits-for-people">
                    <h3><?= $item['title'] ?></h3>
                    <p></p>
                    <ul class="tab-list">
                      <?php if ($item['fl_app']) : ?>
                      <?php foreach ($item['fl_app'] as $fl_app) : ?>
                      <li class="list-item">
                        <span class="count"
                          style="color: #000;font-weight: 600;font-size: 16px;"><?= $fl_app['title'] ?></span>
                        <p><?= $fl_app['text'] ?></p>
                      </li>
                      <?php endforeach ?>
                      <?php endif ?>
                    </ul>
                    <p><b><?= $item['ifyou_title'] ?></b></p>
                    <p><?= $item['ifyou_text'] ?></p>
                    <p>
                      <em><?= $item['ifyou_subtext'] ?></em></p>
                  </div>
                  <?php endforeach ?>
                  <?php endif ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container reader realReader">
        <div class="text">
          <div class="cmp-text">
            <h2 style="text-align: center;color: rgb(0,20,137);"><?= get_field('dontmiss_alarms_title') ?></h2>
            <p style="text-align: center;"><?= get_field('dontmiss_alarms_text') ?></p>
            <div class="row" style="margin: 0 !important;">
              <div class="columncontrol column-align--center">
                <div class="container">
                  <div class="row fl-r-revers">
                    <?php if (get_field('dontmiss_alarms_block')) : ?>
                    <?php foreach (get_field('dontmiss_alarms_block') as $item) : ?>
                    <div class="col-12 col-md-3 col-lg-3 columncontrol__column   mt-70">
                      <article class="m-card m-card--large m-card--padding m-card--fit bg-wt" style="height: 310px">
                        <div class="">
                          <div class="m-card__wrap">
                            <div class="m-card__image care_connected_mcard_img">
                              <div class="cmp-image cmp-image--desktop" style="flex-direction: column;">
                                <?php show_image($item['image'], [80, 80], ['class'=> 'dontmiss_alarms_block_img']) ?>
                                <div class="m-card__body">
                                  <h2 class="h4"><?= $item['title'] ?></h2>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </article>
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

      <div class="container reader realReader  mt-70">
        <div class="text">
          <div class="cmp-text">
            <h2 style="text-align: center;color: rgb(0,20,137);"><?= get_field('receive_signal_title') ?></h2>
            <p style="text-align: center;"><?= get_field('receive_signal_text') ?></p>
            <div class="row benefitsforme-articles row-revers-mobile mt-70">
              <div class="col-lg-6 col-sm-12 benefits-for-people">
                <ul class="tab-list fl2-create-account">
                  <?php if (get_field('receive_signal')) : ?>
                  <?php foreach (get_field('receive_signal') as $item) : ?>
                  <li class="list-item">
                    <div class="benefitsforme-articles-list-title">
                      <div class="benefitsforme-articles-list-img">
                        <?php show_image($item['image'], [29, 29], ['class'=> '']) ?>
                      </div>
                      <p class="benefitsforme-articles-list"><?= $item['text'] ?></p>
                    </div>
                  </li>
                  <?php endforeach ?>
                  <?php endif ?>
                </ul>
              </div>

              <div class="col-lg-6 col-sm-12 decstop-benefits-benefitsforme-articles receive_signal_image" style="text-align: center;">
              <?php show_image(get_field('receive_signal_image'), '457-400') ?> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-236">
      <div class="container reader realReader">
        <div class="footer-list">
          <p class="font-16"><b><?= get_field('footer_title') ?></b></p>

          <?php if (get_field('footer_list')) : ?>
          <?php foreach (get_field('footer_list') as $item) : ?>
          <p><span class="disclaimer-text"><em><span class="font-12"><?= $item['text'] ?></span></em></span></p>
          <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </div>
    </div>
    <?php get_footer() ?>