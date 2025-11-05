<?php

/**
 * Template Name: Omnipod-new-main
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
  <main class="omnipod-main-page what-is-omnipod new-mp  new-main-omnipod">

    <div class="omnipod-main-page-title use-desktop-block">
      <div class="fade-bg-img"></div>
      <div class="section g-24-40 m-120">
        <div class="row">
        <div class="col-lg-6 col-sm-12">
            <h1 class="h1"><?= get_field('title') ?></h1>

            <div class="banner-text">
              <!--<p>Omnipod היא מערכת למתן אינסולין ללא צינורית, המיועדת לאנשים עם סוכרת מסוג 1.</p>

              <p>מערכות Omnipod ו-Omnipod DASH® מספקות אינסולין דרך משאבת מדבקה הניתנת לענידה על הגוף, ללא צינורית
                ועמידה במים‡ שנקראת פוֹד (Pod).
              </p>

              <p>ללא זריקות יומיות מרובות וללא צינוריות, הטיפול בפוד הוא טיפול במשאבת אינסולין – בצורה פשוטה יותר.</p>-->
              <div class="button-omnipod-block" style="justify-content: flex-start;">
                <a href="<?= get_field('main_link') ?>" class="button-omnipod" role="button"
                  target="_blank"><?= get_field('main_button') ?></a>

              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">

          </div>


        </div>
      </div>
    </div>
<div>
<img class="use-desktop-block-mobile"
              src="/wp-content/uploads/2024/07/Banner-omnipod-ain-mob.jpg" alt="">
</div>
    <div class="bg-aqua-gradient">
      <div class="reader realReader m-t120">
        <div class="believe-block">
          <div class="row">
            <div class="col-lg-5 col-sm-12">
              <img class="img-pod-therapy omnipod-new-main-therapy-img"
                src="/wp-content/uploads/2024/04/column_podder_group_pdm-woman-checking-food_1200x1100x96.jpg"
                alt="">
            </div>
            <div class="col-lg-7 col-sm-12 f-alit-cent" style="justify-content: center;">
              <div class="block-layout-builder pod-therapy-content omnipod-new-main-therapy-content">
                <h2 class="omnipod-h2"><?= get_field('block1_title') ?></h2>
                <div class="text-body">
                  <!--<p><strong>האם אתם משתמשים חדשים בטיפול במשאבה, או שאתם שוקלים לעבור למשאבת אינסולין אחרת? קבלו מידע נוסף על האופן שבו המחויבות שלנו למתן אפשרויות בחירה עוזרת לכם.</strong></p>
                  <p>Simplify Life™ with Omnipod DASH. Place the Pod on your body almost anywhere you would inject
                    insulin
                    for up to three days (72 hours) of continuous insulin delivery.</p>-->
                  <p><?= get_field('block1_text') ?></p>
                </div>
                <div class="violet-border white-border violet-border-auto"><a
                    href="<?= get_field('block1_link') ?>"><?= get_field('block1_text_link') ?> </a></div>
                <p class="field" style="text-align: right !important;"><?= get_field('block1_subtext') ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="omnipod-main-page-title paperless-title-block-small  m-t120"
      style="max-width: 100%;border-top-right-radius: 0;">
      <div class="section">
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <h3 class="omnipod-h3" style="text-align: center;"><?= get_field('block2_title') ?></h3>
          </div>
        </div>
      </div>
    </div>



    <div class="bg-gray-gradient">
      <div class="container reader realReader">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-lg-12 col-sm-12 f-alit-cent js-content-centr">

              <div class="text-body insulin-management">

                <p><?= get_field('block2_text') ?></p>


                <div style="display: flex;justify-content: center;margin: 0 0;">
                  <div class="omnipod-new-middle-size ">
                    <?php 
                          $image = get_field('block2_img');
                          $size = 'full';
                          if( $image ) {
                          echo wp_get_attachment_image( $image, $size );
                          }
                        ?>
                  </div>
                </div>
                <div class="violet-border violet-border-auto" style="margin-bottom: 20px;text-align: center;"><a
                    href="<?= get_field('block2_link') ?>"><?= get_field('block2_text_link') ?></a>
                </div>
                <p class="field" style="text-align: right !important;"><?= get_field('block2_subtext') ?></p>
              </div>
            </div>
            <!-- <div class="col-lg-6 col-sm-12">
            <img src="/wp-content/uploads/2024/04/OP5_INSU_POD_PDM_ADH_DEX_RIGHT.png"
              alt="">
          </div>-->
          </div>
        </div>
      </div>
    </div>

    <!--<div class="violet-block br-bottom-0 pd-0">
      <div class="container reader realReader">
        <div>
          <div class="row fl-center">
            <div class="block-violet-content">


            </div>
          </div>
        </div>
      </div>
    </div>-->


    <div class="bg-gray-gradient">
      <div class="container reader realReader m-t120">
        <div class="believe-block">
          <div class="row">
          <div class="col-lg-6 col-sm-12">
              <div class="img-believe-block main-new-img-believe-block">
                        <?php 
                      $image = get_field('block3_image');
                      $size = 'full';
                      if( $image ) {
                      echo wp_get_attachment_image( $image, $size);
                      }
                    ?>
              </div>

              <!--<img class="img-believe-block"
                src="/wp-content/uploads/2024/04/2col_tv-girl-hulahoop_family_garden.jpg"
                alt="">-->
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent" style="flex-direction: column;justify-content: center;">
            <h2 class="omnipod-h2" style="text-align: center;padding: 20px 0 40px;"><?= get_field('block3_title') ?></h2>
              <div class="block-layout-builder">
                <div class="text-body">
                  <p><?= get_field('block3_text') ?></p>

                </div>
                <div><a class="button-omnipod"
                    href="<?= get_field('block3_button_link') ?>"><?= get_field('block3_button') ?></a></div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2" style="text-align: center;"><?= get_field('block4_title') ?></h2>

            <div class="text-body">
              <p><?= get_field('block4_text') ?></p>

            </div>
            <div class="button-omnipod-block violet-border-auto">
              <a class="button-omnipod" href="<?= get_field('block4_link') ?>"><?= get_field('block4_button') ?></a>
            </div>
            <p class="field g-24-40"><?= get_field('block5_subtext') ?>
            </p>
          </div>
        </div>
      </div>
    </div>

  </main>
</div>
 
<?php get_footer(); ?>