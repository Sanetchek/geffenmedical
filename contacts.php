
 <?php

/**
 * Template Name: Freestyle-Libre-Contact
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

  <div class="contact-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1><?= get_field('title') ?></h1>
        </div>
      </div>
    </div>
    <div class="container">
      <!----->
      <div class="row">
        <div class="columns-wrapper">
          <div class="col-xs-12 col-md-4">
            <div class="column libre">
              <div class="wrapper">
                <?php $image = get_field('image_1') ?>
                <?php
                  if ($image) {
                    echo get_image($image, 'full', ['class' => 'logo-libre']);
                  }
                ?>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-4">
            <div class="column libre">
              <div class="wrapper">
                <?php $image = get_field('image_2') ?>
                <?php
                  if ($image) {
                    echo get_image($image, 'full', ['class' => 'logo-libre']);
                  }
                ?>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-4">
            <div class="column">
              <div class="column_row-contact"></div>
              <div class="column_white">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12 bottom">
                    <div class="cont cont8">

                      <div class="cont_left cont_left1">
                        <?php $com = get_field('communication_channels_with_us') ?>
                        <div class="cont_header" dir="rtl"><?= $com['title'] ?></div>
                        <div class="cont_content">

                          <?php if ($com['phone_1'] || $com['phone_2']) : ?>
                          <div class="contact-wrap">
                            <?php
                              $sep = '';
                              if ($com['phone_2']) {
                                $sep = '|';
                              }
                            ?>
                            <?php if ($com['phone_1']) : ?>
                              <div class="icons icon-wapp-tell"></div>
                              <?php $phone = preg_replace('/[^\p{L}\p{N}\s]/u', '', $com['phone_1']); ?>
                              <a href="tel:<?= $phone ?>" dir="ltr" target="blank" style="color: #00305b;"> <?= $sep ?> <?= $com['phone_1'] ?> </a>
                            <?php endif ?>

                            <?php if ($com['phone_2']) : ?>
                              <?php $phone = preg_replace('/[^\p{L}\p{N}\s]/u', '', $com['phone_2']); ?>
                              <a href="tel:<?= $phone ?>" dir="ltr" target="blank" style="padding-right: 5px;color: #00305b;"> <?= $com['phone_2'] ?> </a><br>
                            <?php endif ?>
                          </div>
                          <?php endif ?>

                          <?php if ($com['email']) : ?>
                            <div class="contact-wrap">
                              <div class="icons icon-wapp-email"></div><a href="mailto:<?= $com['email'] ?>" dir="ltr" target="blank" style="color: #00305b;"><?= $com['email'] ?></a><br>
                            </div>
                          <?php endif ?>

                          <?php if ($com['whatsapp']) : ?>
                            <div class="contact-wrap">
                              <?php $phone = preg_replace('/[^\p{L}\p{N}\s]/u', '', $com['whatsapp']); ?>
                              <div class="icons icon-wapp"></div><a href="https://wa.me/972<?= $phone ?>" dir="ltr" target="blank" style="color: #00305b;"><?= $com['whatsapp'] ?></a><br>
                            </div>
                          <?php endif ?>

                          <?php if ($com['fax']) : ?>
                            <div class="contact-wrap">
                              <?php $phone = preg_replace('/[^\p{L}\p{N}\s]/u', '', $com['fax']); ?>
                              <div class="icons icon-wapp-fax"></div><a href="tel:<?= $phone ?>" dir="ltr" target="blank" style="color: #00305b;"> <?= $com['fax'] ?> </a><br>
                            </div>
                          <?php endif ?>

                          <?php if ($com['mail_info']) : ?>
                            <div class="contact-wrap" style="font-size:16px;align-items: flex-start;">
                              <div class="icons icon-wapp-letter"></div>
                              <div>
                                <b><?= $com['mail_label'] ?></b><br>
                                <?= $com['mail_info'] ?>
                                <br>
                              </div>
                            </div>
                          <?php endif ?>
                        </div>
                      </div>
                      <div class="cont_right_img">
                        <div class="cont_radius">
                        </div>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>

      <!------->
      <div class="row">
        <div class="col-md-4">
          <?php $group = get_field('more_info_1') ?>
          <div class="cont cont1">

            <div class="cont_left" style="padding-top: 30px; border-top: 1px solid;height: 222px;">
              <div class="cont_header" dir="rtl">
                <?= $group['title'] ?>
              </div>
              <div class="cont_content" style="font-size:18px;">
                <ul>
                  <li>
                    <img src="/wp-content/uploads/2023/01/pa_2_status_done.png" alt="" srcset="">
                    <?= $group['item_1'] ?>
                  </li>
                  <li>
                    <img src="/wp-content/uploads/2023/01/pa_2_status_done.png" alt="" srcset="">
                    <?= $group['item_2'] ?>
                  </li>
                </ul>
              </div>
              <div class="cont_footer"></div>
            </div>
            <div class="cont_right_img" style="padding-top: 30px;">
              <div class="cont_radius">
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </div>

        <div class="col-md-4">
          <?php $group = get_field('more_info_2') ?>
          <div class="cont cont2">
            <div class="cont_left" style="padding-top: 30px; border-top: 1px solid;">
              <div class="cont_header" dir="rtl"><?= $group['title'] ?></div>
              <div class="cont_content" style="font-size:18px;">
                <?= $group['title'] ?>
              </div>
              <div class="cont_footer"></div>
            </div>
            <div class="cont_right_img" style="padding-top: 30px;">
              <div class="cont_radius">
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </div>

        <div class="col-md-4">
          <?php $group = get_field('more_info_3') ?>
          <div class="cont cont3">
            <div class="cont_left" style="padding-top: 30px; border-top: 1px solid;height: 223px;">
              <div class="cont_header" dir="rtl"><?= $group['title'] ?></div>
              <div class="cont_content" style="font-size:18px;">
                <div style="display: flex;justify-content: space-between;">
                  <p style="display: flex;justify-content: space-between;"><?= $group['label_1'] ?></p>
                  <p><?= $group['time_1'] ?></p>
                </div>
                <div style="display: flex;justify-content: space-between;">
                  <p style="display: flex;justify-content: space-between;"><?= $group['label_2'] ?></p>
                  <p><?= $group['time_2'] ?></p>
                </div>
                <div style="display: flex;justify-content: space-between;">
                  <p style="display: flex;justify-content: space-between;"><?= $group['label_3'] ?><p>
                  <p><?= $group['time_3'] ?></p>
                </div>
              </div>
              <div class="cont_footer"></div>
            </div>
            <div class="cont_right_img" style="padding-top: 30px;">
              <div class="cont_radius">
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </div>

      </div>

      <!---->
      <div class="row">
        <div class="col-md-4">
          <?php $group = get_field('more_info_5') ?>
          <div class="cont cont4">

            <div class="cont_left" style="padding-top: 30px; border-top: 1px solid;">
              <div class="cont_header" dir="rtl"><?= $group['title'] ?></div>
              <div class="cont_content" style="font-size:18px;">
                <p><?= $group['text_1'] ?></p>
                <p><?= $group['text_2'] ?></p>
              </div>
              <div class="cont_footer"></div>
            </div>
            <div class="cont_right_img" style="padding-top: 30px;">
              <div class="cont_radius">
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="cont cont5">
            <?php $group = get_field('more_info_5') ?>
            <div class="cont_left" style="padding-top: 30px; border-top: 1px solid;">
              <div class="cont_header" dir="rtl"><?= $group['title'] ?></div>
              <div class="cont_content" style="font-size:18px;"></div>
            </div>
            <div class="cont_right_img" style="padding-top: 30px;">
              <div class="cont_radius">
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <p style="direction: rtl;"><?= $group['text'] ?></p>
        </div>

        <div class="col-md-4">
          <div class="cont cont6">
            <?php $group = get_field('more_info_6') ?>
            <div class="cont_left" style="padding-top: 30px; border-top: 1px solid;">
              <div class="cont_header" dir="rtl"><?= $group['title'] ?></div>
              <div class="cont_content" style="font-size:18px;">
                <p><?= $group['text_1'] ?></p>
                <p><?= $group['text_2'] ?></p>
              </div>
              <div class="cont_footer"></div>
            </div>
            <div class="cont_right_img" style="padding-top: 30px;">
              <div class="cont_radius">
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>

    </div>
  </div>

<?php get_footer() ?>