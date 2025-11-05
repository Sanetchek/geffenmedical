<?php

/**
 * Template Name: Omnipod-what-is-omnipod
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
  <main class="omnipod-main-page what-is-omnipod">

    <div class="omnipod-main-page-title use-desktop-block">
      <div class="section g-24-40 m-120">
        <div class="row">
          <div class="col-lg-5 col-sm-12">
            <h1 class="h1"><?= get_field('title') ?></h1>

            <div class="banner-text">
              <p><?= get_field('main_text') ?></p>
              <div class="button-omnipod-block" style="justify-content: flex-start;">
                <a href="<?= get_field('main_link') ?>" class="button-omnipod" role="button"
                  target="_blank"><?= get_field('main_button') ?></a>

              </div>
            </div>
          </div>
          <div class="col-lg-7 col-sm-12">
          </div>
        </div>
      </div>
    </div>
    <div> <img class="use-desktop-block-mobile" src="/wp-content/uploads/2024/07/Banner-hero2.jpg" alt=""></div>

    <div class="container reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row row-1120">

          <div class="col-lg-6 col-sm-12">
            <?php 
              $image = get_field('block1_img');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size);
              }
            ?>
          </div>
          <div class="col-lg-6 col-sm-12 f-alit-cent">
            <div class="text-body">
              <p><?= get_field('block1_text') ?></p>

            </div>
          </div>

        </div>
        <div class="row row-1120">

          <div class="col-lg-6 col-sm-12">
          </div>
          <div class="col-lg-6 col-sm-12 f-alit-cent">
            <div class="text-body">
            <p class="field"><?= get_field('block1_subtext') ?></p>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container reader realReader m-t120">
      <div class="section g-24-40 violet-block row-1020">
        <div class="row fl-center">
          <div class="block-violet-content">
            <h3 class="h3"><?= get_field('block2_title') ?></h3>
            <p class="field"><?= get_field('block2_subtext') ?></p>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="container reader realReader m-t120">
      <div class="section g-24-40">
        <div class="block-violet-content">
          <h2 class="omnipod-h2"> Discover our tubeless, wearable Omnipod lineup</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 col-sm-12 f-alit-cent">
            <div class="block-layout-builder">
              <h3 class="omnipod-h3"> Introducing Omnipod 5</h3>
              <div class="text-body">
                <p><span><span><span><span lang="EN-GB">Omnipod 5 is </span><span lang="EN-GB">the first tubeless
                          automated insulin delivery system integrated with Dexcom G6 for people with type 1 diabetes.
                        </span><span lang="EN-GB">It’s waterproof†, wearable, tubeless—and so much more:
                        </span></span></span></span></p>

                <ul class="introducing-list">
                  <li>
                    <p>SmartAdjust™ technology automatically increases, decreases,
                      or pauses insulin every 5 minutes, based on your customized target—helping to protect
                      against highs and lows, day and night.* </p>
                  </li>
                  <li>
                    <p>Activity feature when enabled, <span><span>reduces insulin
                          delivery and raises the glucose target, in situations where you need less insulin, for
                          example when exercising.</p>
                  </li>
                  <li>
                    <p>SmartBolus calculator, the only AID system with a built-in
                      bolus calculator that automatically incorporates your CGM value and trend, so you don’t have
                      to. </p>
                  </li>
                </ul>

                <p>As with all hybrid closed loop systems, you still
                  need to </p>
                <p>You will still need to bolus for meals.
                  With Omnipod 5, this is done with the Omnipod 5 Controller.</p>
              </div>
              <div class="violet-border"><a href="/en-gb/what-is-omnipod/omnipod-5">Learn more about
                  Omnipod 5</a></div>

            </div>

          </div>
          <div class="col-lg-6 col-sm-12">
            <img src="/wp-content/uploads/2024/04/OP5_INSU_POD_PDM_ADH_DEX_RIGHT.png"
              alt="">
            <p class="field">*When used in automated mode with Dexcom G6 CGM, the Omnipod 5 System makes adjustments to
              insulin delivery every 5 minutes based on the user's current CGM value, glucose values predicted 60
              minutes in the future, glucose trend, and past insulin delivery to bring glucose to a user defined
              target..</p>
            <p class="field">†The Pod has a waterproof IP28 rating for up to 7.6 metres for 60 minutes. The controller
              is not waterproof</p>
          </div>
        </div>
      </div>
    </div>-->


    <div class="container reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row row-1120">
          <div class="col-lg-6 col-sm-12 f-alit-cent">
            <div class="block-layout-builder">
              <h3 class="omnipod-h3"><?= get_field('block3_title') ?></h3>
              <div class="text-body">
                <p><?= get_field('block3_text') ?></p>
              </div>
              <div class="violet-border" style="text-align: right;"><a
                  href="<?= get_field('block3_link') ?>"><?= get_field('block3_text_link') ?></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">
            <div class="mobile-what-is-omnipod-img">
              <?php 
              $image = get_field('block3_image');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size);
              }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-gray-gradient">
      <div class="container reader realReader m-t120">
        <div class="believe-block">
          <div class="row row-1120">

            <div class="col-lg-6 col-sm-12">
              <div class="img-believe-block">
                <?php 
              $image = get_field('block5_image');
              $size = 'full';
              if( $image ) {
	            echo wp_get_attachment_image( $image, $size);
              }
            ?>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 f-alit-cent">
              <div class="block-layout-builder">
                <h2 class="omnipod-h2 mobile-what-is-omnipod-h2"><?= get_field('block4_title') ?></h2>
                <div class="text-body">
                  <!--<p><strong>האם אתם משתמשים חדשים בטיפול במשאבה, או שאתם שוקלים לעבור למשאבת אינסולין אחרת? קבלו מידע נוסף על האופן שבו המחויבות שלנו למתן אפשרויות בחירה עוזרת לכם.</strong></p>
                  <p>Simplify Life™ with Omnipod DASH. Place the Pod on your body almost anywhere you would inject
                    insulin
                    for up to three days (72 hours) of continuous insulin delivery.</p>-->
                  <p><?= get_field('block4_text') ?></p>
                </div>
                <div class=""><a class="button-omnipod"
                    href="<?= get_field('block5_link') ?>"><?= get_field('block5_text_link') ?></a></div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!--<div class="bg-red-gradient">
      <div class="container reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row">
            <div class="col-lg-8 col-sm-12">
              <div class="row">

                <div class="col-lg-6 col-sm-12">
                  <div class="flex-col-always">
                    <blockquote class="pull-quote">I think that it’s incredibly important that people with diabetes can
                      choose their own healthcare devices because it helps you to stay motivated.</blockquote>
                    <div class="attribution">
                      <p class="attribution">
                        <strong>Myrthe H.</strong><br>
                        Podder™ since 2019 (Omnipod® Ambassador)<br>

                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12 f-alit-cent">
                  <img class="podder-image-small"
                    src="/wp-content/uploads/2024/04/pod-shape_podder-myrthe_barcelona_single.png"
                    alt="">
                </div>
              </div>

            </div>
            <div class="col-lg-4 col-sm-12 f-alit-cent">
              <div class="block-layout-builder">
                <h3 class="omnipod-h3"> Hear from our Podders™</h3>
                <div class="text-body">
                  <p>Learn about their experiences with Pod Therapy.</p>
                </div>
                <div class="white-border"><a href="/en-gb/diabetes-hub/testimonials">Testimonials</a></div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>-->

    <div class="container reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row  f-alit-cent" style="justify-content: center;">
          <div class="col-lg-8 col-sm-12">
            <h2 class="omnipod-h2_2 mobile-what-is-omnipod-h2" style="text-align: center;">
              <?= get_field('block6_title') ?></h2>
            <div class="text-body">
              <p><?= get_field('block6_text') ?></p>
            </div>
            <div class="button-omnipod-block">
              <a class="button-omnipod m-w-100"
                href="<?= get_field('block6_link') ?>"><?= get_field('block6_button') ?></a>
            </div>
            <p class="field" style="margin-top: 30px !important;"><?= get_field('block6_subtext') ?></p>
          </div>
        </div>
      </div>
    </div>

  </main>
</div>

<?php get_footer(); ?>