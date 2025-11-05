<?php

/**
 * Template Name: Omnipod-5
 * Template Post Type: omnipod
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

<div class="omnipod-style-page">
  <style>
    .what-is-omnipod.omnipod-dash.back-to-school.omnipod-5 .use-desktop-block {
      background-image: url(/wp-content/uploads/2025/07/hero_omnipod_pod_women-in-pool_2000x400-e1752481491386.png);
    }

    .bg-color-mango {
      background-color: #ffa700;
      margin-top: -10px;
      margin-bottom: 0px;
    }

    .m-66 {
      padding: 66px 0 !important;
    }

    .mb-66 {
      margin-bottom: 66px;
    }

    .flex-column {
      flex-direction: column;
    }
  </style>

  <main class="omnipod-main-page what-is-omnipod omnipod-dash back-to-school omnipod-5">

    <div class="omnipod-main-page-title use-desktop-block">
      <div class="fade-bg-img"></div>
      <div class="section g-24-40 m-120">
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <h1 class="h1"><?= get_field('title') ?></h1>
            <p><?= get_field('subtitle') ?></p>
          </div>
          <div class="col-lg-6 col-sm-12">

          </div>

        </div>
      </div>
    </div>
    <div>
      <img class="use-desktop-block-mobile" src="/wp-content/uploads/2025/07/hero_omnipod_pod_women-in-pool_2000x400-e1752481491386-1-e1752652192177.png"
        alt="">
    </div>
    <div class="bg-color-mango">
      <div class="conteiner-1200 reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column">
              <!--<div class="podder-image-dash school-image-dash"></div>-->

              <?php 
                      $image = get_field('block1_image');
                      $size = 'full';
                      if( $image ) {
                      echo wp_get_attachment_image( $image, $size );
                      }
                    ?>
              <p class="field"><?= get_field('block1_img_text') ?></p>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">

              <div class="text-body mobile-w-83" style="margin-bottom: 40px;">
                <p><?= get_field('block1_text') ?></p>
                <div class="button-omnipod-block" style="justify-content: flex-start;">
                  <a href="<?= get_field('block1_column1_link') ?>" class="button-omnipod" role="button"
                    target="_blank"><?= get_field('block1_column1_button') ?></a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!--
      <div class="violet-block" style="border-radius: 0;">
        <div class="container reader realReader">
          <div>
            <div class="row fl-center">
              <div class="block-violet-content">
                <h3 class="h3"></h3>
              </div>
            </div>
          </div>
        </div>
      </div>-->

    <div class="bg-gray-gradient m-66">
      <div class="container reader realReader m-t120">
        <div class="section g-24-40">
          <h2 class="omnipod-h2" style="text-align: center;"><?= get_field('block2_title') ?></h2>
          <div class="row">
       <!-- <?php //if (get_field('block3_column_conten')) : ?>
            <?php// foreach (get_field('block3_column_conten') as $video) : ?>
            <div class="col-lg-6 col-sm-12">
              <div>
                <h3 class="omnipod-h3 video-block-school"><?= $video['title'] ?></h3>
                <a href="<?= $video['video_link'] ?>" class="card__link tube">
                  <img src="<?= $video['video_img_link'] ?>" alt="">
                </a>
              </div>
            </div>
            <?php// endforeach ?>
            <?php// endif ?>-->
            <div class="col-lg-6 col-sm-12 f-alit-cent">
              <div class="block-layout-builder">
                <div class="text-body guides-list">
                  <p><?= get_field('block3_text') ?></p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


    <div class="container reader realReader m-t120">
      <div class="section g-24-40">
        <h2 class="omnipod-h2" style="text-align: center;"><?= get_field('block4_title') ?></h2>


        <?php if (get_field('block4_column_content')) : ?>
  <?php foreach (get_field('block4_column_content') as $content) : ?>
    <div class="row mb-66">
      <?php 
        $image = $content['block4_image']; 
        $size = 'full';
        if ($image) :
      ?>
        <div class="col-lg-4 col-sm-12">
          <div>
            <?= wp_get_attachment_image($image, $size); ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="<?= $image ? 'col-lg-8' : 'col-lg-12' ?> col-sm-12 f-alit-cent">
        <div class="block-layout-builder">
          <h3 class="omnipod-h3 video-block-school"><?= $content['block4_title'] ?></h3>
          <div class="text-body">
            <p><?= $content['block4_text'] ?></p>

            <?php 
              $link = $content['block4_column_link'] ?? '';
              $button_text = $content['block4_column_button'] ?? '';
              if ($link !== '' && $button_text !== '') :
            ?>
              <div class="button-omnipod-block" style="justify-content: flex-start; margin: 2% 0;">
                <a href="<?= esc_url($link) ?>" class="button-omnipod" role="button" target="_blank">
                  <?= esc_html($button_text) ?>
                </a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>


      </div>
    </div>

    <div class="bg-color-mango">
      <div class="conteiner-1200 reader realReader m-t120 m-66">
        <div class="section g-24-40">
          <div class="row">

          <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr flex-column">
            <div class="podder-image-dash omnipod-5-image-dash" style="background-image: url(https://geffenmedical.co.il/wp-content/uploads/2025/07/pod-shape_man-in-office_330x422.png);"  ></div>
            </div>




            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">

              <div class="text-body mobile-w-83" style="margin-bottom: 40px;">
              <h3 class="omnipod-h3 video-block-school"><?= get_field('block5_title') ?></h3>
              <div class="button-omnipod-block" style="justify-content: flex-start;">
                  <a href="<?= get_field('block1_column1_link') ?>" class="button-omnipod" role="button"
                    target="_blank"><?= get_field('block5_column1_button') ?></a>
                </div>
              </div>

            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent js-content-centr">
              <div class="text-body mobile-w-83" style="margin-bottom: 40px;">
                
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader">
    <div class="container reader realReader m-t120">
      <div class="footer-list mobile-w-83">
        <?php if (get_field('footer_list')) : ?>
        <?php foreach (get_field('footer_list') as $item) : ?>
        <p class="field" style="text-align: right !important;"><?= $item['text'] ?></p>
        <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>