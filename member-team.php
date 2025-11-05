<?php

/**
 * Template Name: Member Team
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
<div class="member-team-page">
  <?php get_template_part('template-parts/breadcrumbs') ?>

  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12 contact-page-menu-title">
        <h1 class="text-al-start">
          <?= get_the_title() ?>
        </h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 contact-page-menu-title member-page-menu-title" style="margin-bottom: 35px;">
        <div class="member-team-subtitle">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
            <g clip-path="url(#clip0_901_34400)">
              <path d="M25 6.26493C25 4.94692 23.9314 3.8783 22.6134 3.8783H2.38663C1.06863 3.8783 0 4.94692 0 6.26493V18.7351C0 20.0531 1.06863 21.1217 2.38663 21.1217H22.6134C23.9314 21.1217 25 20.0531 25 18.7351V6.26493ZM17.6163 11.2226L23.6862 5.8482C23.7291 5.97662 23.7498 6.11134 23.747 6.24652V18.6938C23.7498 18.7771 23.744 18.8605 23.7295 18.9425L17.6163 11.2226ZM22.5716 5.07161C22.6385 5.06905 22.7057 5.07208 22.7721 5.0807L13.2477 13.4966C12.7951 13.8949 12.1168 13.8935 11.6658 13.4934L2.16685 5.0821C2.23374 5.07278 2.30133 5.06928 2.36869 5.07161H22.5716ZM1.22105 18.9817C1.20008 18.8873 1.19075 18.7906 1.19332 18.6938V6.24652C1.19052 6.11157 1.21103 5.97709 1.25392 5.8489L7.26245 11.1748L1.22105 18.9817ZM2.36869 19.8687C2.26287 19.8713 2.15683 19.8599 2.05404 19.8345L8.14859 11.9635L10.8743 14.3818C11.7768 15.1817 13.1339 15.1833 14.0383 14.3855L16.7211 12.0138L22.9226 19.8249C22.8084 19.8571 22.69 19.8718 22.5716 19.8687H2.36869Z"
                fill="#0A3B64"></path>
            </g>
            <defs>
              <clipPath id="clip0_901_34400">
                <rect width="25" height="25" fill="white"></rect>
              </clipPath>
            </defs>
          </svg>
          <p><?php the_field('email_label') ?></p>
        </div>
        <?php if (get_field('email')) : ?>
        <a class="member-team-subtitle-link ltr" href="mailto:<?= get_field('email') ?>"><?= get_field('email') ?></a>
        <?php endif ?>
      </div>
    </div>
  </div>

  <div class="conteiner-968">
    <div class="row">

      <?php
        $args = [
          'post_type' => 'vacancies',
          'posts_per_page' => -1
        ];

        $query = new WP_Query($args);
      ?>

      <?php if ($query->have_posts()) : ?>
        <?php while ($query->have_posts()) : $query->the_post() ?>
          <div class="col-md-12 contact-response-time-content cv-content">
            <div class="col-md-11">
              <div class="row contact-response-cv-content">
                <div class="col-md-3">
                  <div class="customer-club-button">
                    <a href="javascript:void(0)" data-name="<?= get_the_title() ?>"
                      data-id="<?= get_the_ID() ?>"><?= __('הגש/י קורות חיים ', 'geffen') ?></a>
                  </div>
                </div>

                <div class="col-md-9">
                  <h3 class="contact-response-time-title"><?= get_the_title() ?></h3>
                  <h5 class="member-team-cv"><?= get_field('description') ?></h5>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="tab-member-team">
                        <div class="tab-content-member-team">

                          <div class="tab-info-member-team">
                            <h5 class="member-team-cv vacans-detals" style="text-align: right!important;">
                              <?= __('דרישות התפקיד ', 'geffen') ?></h5>
                            <p><?= get_field('employee_requirements') ?></p>
                          </div>

                          <div class="tab-info-member-team">
                            <h5 class="member-team-cv vacans-detals" style="text-align: right!important;">
                              <?= __('התפקיד כולל ', 'geffen') ?></h5>
                            <p><?= get_field('the_role_consists_of') ?></p>
                          </div>


                        </div>
                        <div class="tab-header-member-team">
                          <span class="tab-toggle-member-team">+</span>
                          <span class="tab-text-member-team"><?= __('לצפייה בפרטי המשרה ', 'geffen') ?></span>
                          <span class="tab-text-member-team-hidden"
                            style="display: none;"><?= __('לסגור פרטי המשרה', 'geffen') ?></span>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        <?php endwhile ?>
      <?php endif ?>

    </div>

  </div>
</div>

<div class="member-popup">
  <div class="member-popup-close">&#128473;</div>
  <div class="member-popup-content">
    <?php // echo do_shortcode('[contact-form-7 id="93766c7" title="Job needed"]') // stage site ?>
    <?php echo do_shortcode('[contact-form-7 id="12fbbd7" title="Job needed"]') // original site ?>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const fileInput = document.querySelector('input[type="file"]');
  const fileLabel = document.querySelector('.job-need-subtitle>span>span');
  fileInput.addEventListener('change', function() {
    if (this.value) {
      const fileName = this.files[0].name;
      fileLabel.innerHTML = fileName + '<span class ="job-need-spanfile">צפייה בקובץ</span>';
    }
  });
});
</script>

<?php get_footer(); ?>