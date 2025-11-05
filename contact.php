<?php
/**
 * Template Name: Contact
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

get_header(); ?>

<div class="contact-page">
  <?php get_template_part('template-parts/breadcrumbs') ?>

  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12 contact-page-menu-title">
        <h1 class="text-al-start"><?php the_title() ?></h1>
      </div>
    </div>
  </div>
  <div class="contact-page-menu-row contact-page-menu-bg" style="padding-bottom: 2rem;">
    <div class="conteiner-968">
      <div class="row">
        <div class="col-md-12">
          <div class="row contact-page-menu-content contact-mobile-block">

          <?php $group=get_field('sensor_support_form') ?>
            <?php if ($group) : ?>
            <div class="contact-icon">
              <a href="https://forms.geffenmedical.co.il/new-support-request-form/" target="_blank">
                <div class="contact-block-icon">
                  <?php if ($group['image']) {
                    echo get_image($group['image'], array('32', '32'));
                  } ?>
                  </div>
                <h3><?=$group['title'] ?></h3>
                <div class="contact-item-decore"></div>
                <p><?=$group['text'] ?></p>
                </a>
            </div>
            <?php endif ?>

            <?php $group=get_field('online_form') ?>
            <?php if ($group) : ?>
            <div class="contact-icon" id="show_online_form">
              <div class="show-contact-form contact-icon-wrap">
                <div class="contact-block-icon">
                  <?php if ($group['image']) {
                    echo get_image($group['image'], array('32', '32'));
                  } ?>
                </div>
                <h3><?=$group['title'] ?></h3>
                <div class="contact-item-decore"></div>
                <p><?=$group['text'] ?></p>
              </div>
              <!--Popup-->
              <div id="online_form_popup" class="popup-contactpage">
                <div class="popup-content-contactpage">
                  <span class="close-contactpage" id="online_form_form">&times;</span>
                  <div><?= do_shortcode($group['shortcode_to_contact_form']) ?></div>
                </div>
              </div>
            </div>
            <?php endif ?>

            <?php $group=get_field('telephone_answer') ?>
            <?php if ($group) : ?>
            <div class="contact-icon">
              <a href="tel:+97236900300">
                <div class="contact-block-icon">
                  <?php if ($group['image']) {
                    echo get_image($group['image'], array('32', '32'));
                  } ?>
                </div>
                <h3><?=$group['title'] ?></h3>
                <div class="contact-item-decore"></div>
                <p><?=$group['text'] ?></p>
              </a>
            </div>
            <?php endif ?>

            <?php $group=get_field('messenger') ?>
            <?php if ($group) : ?>
            <div class="contact-icon">
              <a href="https://www.messenger.com/t/geffenmedical" target="_blank">
                <div class="contact-block-icon">
                  <?php if ($group['image']) {
                    echo get_image($group['image'], array('32', '32'));
                  } ?>
                </div>
                <h3><?=$group['title'] ?></h3>
                <div class="contact-item-decore"></div>
                <p><?=$group['text'] ?></p>
              </a>
            </div>
            <?php endif ?>

            <?php $group=get_field('whatsapp') ?>
            <?php if ($group) : ?>
            <div class="contact-icon" id="contact-phone">
              <a href="https://api.whatsapp.com/send?phone=97236900300" target="_blank">
                <div class="contact-block-icon">
                  <?php if ($group['image']) {
                    echo get_image($group['image'], array('32', '32'));
                  } ?>
                </div>
                <h3><?=$group['title'] ?></h3>
                <div class="contact-item-decore"></div>
                <p><?=$group['text'] ?></p>
              </a>
            </div>
            <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="conteiner-968 contact-response-time">
    <div class="row">
      <div class="col-md-7">
        <h3 class="contact-response-time-title decst-block3-content-title" style="padding-right: 31px;"><?=the_field('additional_title') ?></h3>
        <div class="contact-response-time-content contact-info-block3-content">
          <h3 class="contact-response-time-title mobile-block3-content-title" style="padding-right: 9px;"><?=the_field('additional_title') ?></h3>
          <div class="contact-response-time-item">
            <div class="contact-response-time-channels">
              <?php $image=get_field('icon_email');
                if ($image) {
                  echo get_image($image, array('24', '24'));
                }
              ?>
            </div>
            <p class="contact-response-time-content-subtitle"><strong><?php the_field('email_label') ?></strong></p>
            <p class="contact-response-time-content-subtext"><a href="mailto:<?php the_field('email') ?>"><span
                  dir="ltr"><?php the_field('email') ?></span></a></p>
          </div>
          <div class="contact-response-time-item">
            <div class="contact-response-time-channels adress-response-time-channels">
              <?php $image=get_field('icon_email_address_for_letters');
                if ($image) {
                  echo get_image($image, array('24', '24'));
                }
              ?>
            </div>
            <p class="contact-response-time-content-subtitle">
              <strong><?php the_field('address_for_letters_label') ?></strong><span class="contact-response-time-content-subtext-mobile"><?php the_field('address_for_letters') ?></span> </p>
          <p class="contact-response-time-content-subtext adress-contact-block"><?php the_field('address_for_letters') ?></p>
          </div>
          <div class="contact-response-time-item">
            <div class="contact-response-time-channels">
              <?php $image=get_field('icon_fax');
                if ($image) {
                  echo get_image($image, array('24', '24'));
                }
              ?>
            </div>
            <p class="contact-response-time-content-subtitle"><strong><?php the_field('fax_label') ?></strong></p>
            <p class="contact-response-time-content-subtext"><?php the_field('fax') ?></p>
          </div>
        </div>
      </div>
      <?php $group=get_field('telephone_response_times') ?><?php if ($group) : ?><div
        class="col-md-5">
        <h3 class="contact-response-time-title"  style="padding-right: 48px;"><?=$group['title'] ?></h3>
        <div class="contact-response-time-content" style="min-height: 230px;">
          <div class="contact-response-time-item">
            <p class="contact-response-time-content-subtitle"><?=$group['days'] ?></p>
            <p class="contact-response-time-content-subtext"><?=$group['time'] ?></p>
          </div>
          <div class="contact-response-time-item">
            <p class="contact-response-time-content-subtitle"><?=$group['days_friday_holidays'] ?></p>
            <p class="contact-response-time-content-subtext"><?=$group['time_fridays_holidays'] ?></p>
          </div>
          <div class="contact-response-time-item">
            <p class="contact-response-time-content-subtitle"><?=$group['holidays'] ?></p>
            <p class="contact-response-time-content-subtext"><?=$group['time_holidays'] ?></p>
          </div>
        </div>
      </div><?php endif ?>
    </div>

    <div class="row">
      <?php $group=get_field('self_collection_from_dmc') ?><?php if ($group) : ?><div
        class="col-md-7">
        <h3 class="contact-response-time-title decst-block3-content-title" style="padding-right: 31px;"><?=$group['title'] ?></h3>
        <div class="contact-response-time-content" style="min-height: 230px;">
          <h3 class="contact-response-time-title mobile-block3-content-title" style="padding-right: 9px;"><?=$group['title'] ?></h3>
          <?php foreach ($group['info_list'] as $info) : ?>
            <div class="contact-response-time-item">
              <p class="contact-response-time-content-subtitle"><?=$info['label'] ?></p>
              <p class="contact-response-time-content-subtext"><?=$info['info'] ?></p>
            </div>
          <?php endforeach ?>
        </div>
      </div><?php endif ?>

      <?php $group=get_field('self-gathering_of_intelligence') ?><?php if ($group) : ?><div
        class="col-md-5">
        <h3 class="contact-response-time-title"  style="padding-right: 48px;"><?=$group['title'] ?></h3>
        <div class="contact-response-time-content" style="min-height: 230px;">
          <?php foreach ($group['info_list'] as $info) : ?>
            <div class="contact-response-time-item">
              <p class="contact-response-time-content-subtitle"><?=$info['label'] ?></p>
              <p class="contact-response-time-content-subtext"><?=$info['info'] ?></p>
            </div>
          <?php endforeach ?>
        </div>
      </div><?php endif ?>
    </div>

  </div>
</div>

<?php get_footer(); ?>