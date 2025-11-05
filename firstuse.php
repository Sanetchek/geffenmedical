<?php
/**
 * Template Name: Firstuse
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
<div class="aem-Grid aem-Grid--12 aem-Grid--default--12">
  <div class="container-fl responsivegrid a-container pb-0 aem-GridColumn aem-GridColumn--default--12">
    <section id="section-container-e8d2fc1dc3" class="free-style-libre">
      <div class="a-container__row">
        <div class="a-container__content">
          <div id="container-e8d2fc1dc3" class="cmp-container">
            <div class="title a-title a-title--fg a-title--fg-primary">
              <div id="title-2f02edd894" class="librelink-app">
                <h1 style="text-align: center;">
                  <?= get_field('system_title') ?>
                </h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<?php $systems = get_field('systems') ?>
<main class="libre librelink-app">
  <div class="container reader realReader">
    <div class="section">
      <div class="container tabs">
        <div class="tabs-items firstuse-tabs-items">
          <!-- <div class="tab-item active firstuse-tab-item" data-content="1">
            <?php show_image($systems['tab_image_libre3']) ?>
            <span><?= $systems['tab_name_libre3'] ?></span>
          </div>
          <div class="tab-item  active firstuse-tab-item" data-content="2">
            <?php show_image($systems['tab_image']) ?>
            <span><?= $systems['tab_name'] ?></span>
          </div>-->
        </div>

        <div class="tabs-content">
          <!--<div id="tab_content_1" class="tab-content>
            <h2><strong><?= $systems['libre2_title_libre3'] ?></strong></h2>

            <?php $app = $systems['libre2_app_libre3'] ?>
            <div class="row">
              <div class="col-sm-6 download-libre3-app">
                <h2><strong><?= $app['title'] ?></strong></h2>
                <p style="text-align: right;"><?= $app['text'] ?></p>
                <div class="download-libre3-app-links">
                  <?php if ($app['link_1']) : ?>
                    <a class="download-libre3-app-link-google" href="<?= $app['link_1'] ?>">
                      <?php show_image($app['image_for_link_1'], [162, 48]) ?>
                    </a>
                  <?php endif ?>

                  <?php if ($app['link_2']) : ?>
                    <a class="download-libre3-app-link-store" href="<?= $app['link_2'] ?>">
                      <?php show_image($app['image_for_link_2'], [162, 48]) ?>
                    </a>
                  <?php endif ?>
                </div>
              </div>

              <div class="col-sm-6">
                <?php show_image($app['image'], [520, 365], ['class'=> 'attachment-large size-large']) ?>
              </div>
            </div>

            <?php $video = $systems['video_libre3'] ?>
            <h2 style="margin-top: 40px;">
              <strong><?= $video['title'] ?></strong>
            </h2>

            <p style="font-size: 24px;font-weight: 700;text-align: center;padding: 0 0 3em;"><?= $video['title'] ?></p>

            <div class="download-libre3-app-video">
              <?php if ($video['youtube']) : ?>
                <iframe src="<?= $video['youtube'] ?>" title="YouTube video player"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  allowfullscreen></iframe>
              <?php endif ?>
            </div>

            <?php
              $activate = $systems['activate_your_sensor_libre3'];
              $prepare = $systems['prepare_the_skin_and_apply_sensor_libre3'];
            ?>
            <div class="row more-info a-container--dark">
              <div class="container tabs">
                <div class="tabs-items">
                  <div class="tab-item" data-content="3"><?= $activate['tab_name'] ?></div>
                  <div class="tab-item active" data-content="4"><?= $prepare['tab_name'] ?></div>
                </div>

                <div class="tabs-content">
                  <div id="tab_content_3" class="tab-content">
                    <div class="row">
                      <div class="col-sm-6 middle">
                        <h2><?= $activate['title'] ?></h2>
                        <p></p>
                        <ul class="tab-list">
                          <?php
                            $list = $activate['list'];
                            $count = 0;
                          ?>

                          <?php if ($list) : ?>
                            <?php foreach ($list as $item) : ?>
                              <?php $count++; $num = $count < 10 ? '0'.$count : $count; ?>
                              <li class="list-item">
                                <span class="count"><?= $num ?></span>
                                <?= $item['text'] ?>
                              </li>
                            <?php endforeach ?>
                          <?php endif ?>
                        </ul>
                        <p></p>
                      </div>

                      <div class="col-sm-6">
                        <?php show_image($activate['image'], [440,468], ['class'=> 'attachment-large size-large']) ?>
                      </div>
                    </div>
                  </div>

                  <div id="tab_content_4" class="tab-content active">
                    <div class="row">
                      <div class="col-sm-12 middle">
                        <h2><?= $prepare['title'] ?></h2>
                        <p></p>

                        <div class="instructions-use-fl3">
                          <div class="instruction-use-fl3">
                            <button id="expandCollapseButton"><?= __('Expand All', 'geffen') ?></button>
                          </div>

                          <div class="accordion">
                            <?php
                              $list = $prepare['list'];
                              $count = 0;
                            ?>

                            <?php if ($list) : ?>
                              <?php foreach ($list as $item) : ?>
                                <?php $count++; ?>
                                <div class="accordion-item">
                                  <div class="accordion-header">
                                    <span class="icon">+</span>
                                    <p><?= $count ?>. <?= $item['title'] ?></p>
                                  </div>

                                  <div class="accordion-content">
                                    <?= $item['description'] ?>
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
          </div>-->

          <div id="tab_content_2" class="tab-content active">
            <h2><strong><?= $systems['libre2_title'] ?></strong></h2>
            <div class="row libre2-system mobile-mb-0">

              <?php $app = $systems['libre2_app'] ?>
              <div class="col-sm-6 download-libre3-app">
                <h2><strong><?= $app['title'] ?></strong></h2>
                <p style="text-align: right;font-size:18px;font-weight: bold;"><?= $app['text'] ?></p>
                <div class="download-libre3-app-links">
                  <?php if ($app['link_1']) : ?>
                  <a class="download-libre3-app-link-google" href="<?= $app['link_1'] ?>">
                    <?php show_image($app['image_for_link_1']) ?>
                  </a>
                  <?php endif ?>

                  <?php if ($app['link_2']) : ?>
                  <a class="download-libre3-app-link-store" href="<?= $app['link_2'] ?>">
                    <?php show_image($app['image_for_link_2']) ?>
                  </a>
                  <?php endif ?>
                </div>
              </div>

              <div class="col-sm-6">
                <?php show_image($app['image'], [520, 365], ['class'=> 'attachment-large size-large']) ?>
              </div>
              <div class="col-12">
                <div class="device-compatible">
                  <img src="/wp-content/uploads/2023/11/rows-fl.png" alt="">
                  <a href="<?= $systems['compatibility_link'] ?>">
                  <?= $systems['compatibility_link_title'] ?>
                </a>
                </div>
              </div>

            </div>

            <?php $sign = $systems['sign_in'] ?>
            <div class="row libre3-system-mobile-style mobile-mb-0">
              <h2 class="mobile-style-order-5" style="margin-top: 1.5em;"><strong><?= $sign['title'] ?></strong></h2>
              <p class="mobile-style-order-4" style="text-align: center;font-size:18px;font-weight: bold;"><?= $sign['text'] ?></p>
              <p class="mobile-style-order-2" style="font-size: 24px;color: rgb(0, 20, 137);font-weight: 700;text-align: right">
                <?= $sign['subtitle'] ?></p>
              <div class="col-sm-5 mobile-style-order-1">
                <?php $list = $sign['list'] ?>
                <ul class="tab-list fl2-create-account">
                  <?php if ($list) : ?>
                  <?php foreach ($list as $item) : ?>
                  <li class="list-item">
                    <span class="count"><img src="<?= assets('img/check.png') ?>" alt="check"></span>
                    <span class="font-14"><?= $item['text'] ?></span>
                  </li>
                  <?php endforeach ?>
                  <?php endif ?>
                </ul>

                <div class="tutorial-videos">
                  <?php if ($sign['link']) : ?>
                  <a href="<?= $sign['link'] ?>"><?= $sign['label_link'] ?></a>
                  <?php endif ?>
                </div>

                <h5 style="text-align: left;"><strong
                    style="font-size: 16px;font-weight: 900!important;"><?= $sign['text_below'] ?></strong></h5>
                <p></p>
              </div>

              <div class="col-sm-7 mobile-style-order-3">
                <?php show_image($sign['image'], 'medium-large', ['class'=> 'attachment-large size-large']) ?>
              </div>
            </div>

            <?php $video = $systems['video'] ?>
            <div class="row more-info a-container--dark mobile-mb-0 mobile-pb-0">
              <h2 style="margin-top: 40px;text-align: center;color: rgb(0,20,137);">
                <strong><?= $video['title'] ?></strong></h2>
              <p style="font-size: 24px;font-weight: 700;text-align: center;padding: 1.5em 0 2em;"><?= $video['text'] ?>
              </p>
              <div class="download-libre3-app-video">
                <?php if ($video['youtube']) : ?>
                <iframe src="<?= $video['youtube'] ?>" title="YouTube video player" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  allowfullscreen></iframe>
                <?php endif ?>
              </div>

              <?php
                $activate = $systems['activate_your_sensor'];
                $prepare = $systems['prepare_the_skin_and_apply_sensor'];
              ?>
              <div class="row more-info mobile-mb-0">
                <div class="container tabs">
                  <div class="tabs-items" style="flex-direction: row-reverse;">
                    <div class="tab-item" data-content="1"><?= $activate['tab_name'] ?></div>
                    <div class="tab-item active" data-content="2"><?= $prepare['tab_name'] ?></div>
                  </div>

                  <div class="tabs-content">
                    <div id="tab_content_1" class="tab-content">
                      <div class="row">
                        <div class="col-sm-5 middle">
                          <h2><?= $activate['title'] ?></h2>
                          <p></p>

                          <?php
                            $list = $activate['list'];
                            $count = 0;
                          ?>
                          <ul class="tab-list">
                            <?php if ($list) : ?>
                            <?php foreach ($list as $item) : ?>
                            <?php
                                  $count++;
                                  $num = $count < 10 ? '0'.$count : $count;
                                ?>
                            <li class="list-item">
                              <span class="count"><?= $num ?></span>
                              <p><?= $item['text'] ?></p>
                            </li>
                            <?php endforeach ?>
                            <?php endif ?>
                          </ul>
                          <p></p>
                        </div>

                        <div class="col-sm-7" style="text-align: end;">
                          <?php show_image($activate['image'], [440,468], ['class'=> 'attachment-large size-large']) ?>
                        </div>
                      </div>
                    </div>

                    <div id="tab_content_2" class="tab-content active">
                      <div class="row mobile-mb-0">
                        <div class="col-sm-12 middle">
                          <h2><?= $prepare['title'] ?></h2>
                          <p></p>

                          <div class="instructions-use-fl3">
                            <div class="instruction-use-fl3">
                              <!--<button id="expandCollapseButton"><?= __('הרחב הכל', 'geffen') ?></button>-->
                            </div>

                            <?php
                              $list = $prepare['list'];
                              $count = 0;
                            ?>
                            <div class="accordion">
                              <?php if ($list) : ?>
                              <?php foreach ($list as $item) : ?>
                              <?php $count++; ?>
                              <div class="accordion-item">
                                <div class="accordion-header">
                                  <span class="icon">+</span>
                                  <p><?= $count ?>. <?= $item['title'] ?></p>
                                </div>

                                <div class="accordion-content">
                                  <?= $item['description'] ?>
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
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--<div class="section g-24-40" style="margin-bottom: 0;padding: 0;">
      <div class="firstuse-setup-alarms">
        <?php show_image(get_field('alrm_image'), [80, 80]) ?>
        <h2 style="margin-top: 40px;"><strong><?= get_field('alarm_title') ?></strong></h2>
        <div class="tutorial-videos" style="justify-content: center;">
          <?php if (get_field('alarm_link')) : ?>
          <a href="<?= get_field('alarm_link') ?>"><?= get_field('alarm_label_link') ?></a>
          <?php endif ?>
        </div>
      </div>
    </div>-->

    <div class="section g-24-40 mobile-style-prl-25" style="padding: 0;margin: 0;">
      <h2 style="margin-top: 40px;"><strong><?= get_field('connected_title') ?></strong></h2>
      <p><?= get_field('connected_text') ?></p>

      <?php $links = get_field('connected_links') ?>
      <div class="fistyre-supported">

        <?php if ($links) : ?>
        <?php foreach ($links as $item) : ?>
        <div class="col-12 col-md-4 col-lg-4 middle fistyre-supported-item">
          <?php $link = $item['link'] ? $item['link'] : '#' ?>
          <a href="<?= $link ?>">
          <div class="fistyre-supported-item-img">
          <?php show_image($item['image'], [270, 'auto'], ['class'=> 'cmp-image__image a-image__default']) ?>
        </div>


            <div class="m-card__body">
              <h2 class="m-card__title h4"><?= $item['title'] ?></h2>
              <div class="m-card__description">
                <p><?= $item['text'] ?></p>
              </div>

              <div class="nonClickableLink nonclickablelink">
                <p class="font-weight-bold"></p>
              </div>

            </div>
          </a>
        </div>
        <?php endforeach ?>
        <?php endif ?>


      </div>
    </div>

    <div class="section g-24-40">
      <h2 style="margin-top: 40px;"><strong><?= get_field('related_title') ?></strong></h2>
      <div class="fistyre-supported">
        <?php $related = get_field('related_links') ?>
        <?php if ($related) : ?>
        <?php foreach ($related as $item) : ?>
        <div class="col-12 col-md-3 col-lg-3 fistyre-supported">
          <?php $link = $item['link'] ? $item['link'] : '#'; ?>
          <a href="<?= $link ?>" class="firstuse-related">
            <div class="fistyre-supported-item bor-yell">
              <p class="a-tile__title-text"><?= $item['title'] ?></p>
              <p class="a-tile__para" style="color: rgb(0,20,137);"><?= $item['text'] ?></p>
            </div>
          </a>
        </div>
        <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>
  </div>

  <div class="bg-236">
    <div class="container reader realReader">
      <div class="footer-list">
        <p><b><?= get_field('footer_title') ?></b></p>
        <p><span class="disclaimer-text"><span class="color-text-gray"><span
                class="font-12"><em><?= get_field('footer_text') ?></em></span></span></span></p>

        <?php $list = get_field('footer_list') ?>
        <?php if ($list) : ?>
        <?php foreach ($list as $item) : ?>
        <p><span class="disclaimer-text"><span class="font-12"><?= $item['text'] ?></span></span></p>
        <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
