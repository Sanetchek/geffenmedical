<?php

/**
 * Template Name: Omnipod5-Interest-list
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
  <main class="omnipod-main-page what-is-omnipod new-mp">

    <div class="omnipod-main-page-title use-desktop-block omnipod-interest-list">
      <div class="fade-bg-img"></div>
      <div class="section g-24-40 m-120">
        <div class="row">
        <div class="col-lg-5 col-sm-12">
            <h1 class="h1"><?= get_field('title') ?></h1>
            <div class="banner-text">
              <p><?= get_field('subtitle_main') ?></p>

              <!--<p>Omnipod היא מערכת למתן אינסולין ללא צינורית, המיועדת לאנשים עם סוכרת מסוג 1.</p>

              <p>מערכות Omnipod ו-Omnipod DASH® מספקות אינסולין דרך משאבת מדבקה הניתנת לענידה על הגוף, ללא צינורית
                ועמידה במים‡ שנקראת פוֹד (Pod).
              </p>

              <p>ללא זריקות יומיות מרובות וללא צינוריות, הטיפול בפוד הוא טיפול במשאבת אינסולין – בצורה פשוטה יותר.</p>-->
            </div>
          </div>
          <div class="col-lg-7 col-sm-12">

          </div>


        </div>
      </div>
    </div>
<div>            <img class="use-desktop-block-mobile"
              src="/wp-content/uploads/2025/07/Hero_Banner_Pediatric_Landing_Page_2000x700-1-e1752657360773.png" alt=""></div>

    <div class="container  reader realReader m-t120">
      <div class="believe-block">
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <div class="block-layout-builder pod-therapy-content wb-75">
              <h2 class="omnipod-h2"><?= get_field('block1_ttitle_column2') ?></h2>
              <div class="text-body">
                <p><?= get_field('block1_text_column2') ?></p>
              </div>
              <div class="tab-schortcode forme-simple-pod-page2"  id="tab-schortcode-form" style="width: 100%;"><?= get_field('shortcode_form') ?></div>
            </div>
          </div>
        <div class="row">

          <div class="col-lg-7 col-sm-12">
            <div class="block-layout-builder pod-therapy-content">
             
              
            </div>
          </div>
          <div class="col-lg-5 col-sm-12">
            <div class="block-layout-builder pod-therapy-content">
              <h2 class="omnipod-h2"><?= get_field('block1_ttitle_column1') ?></h2>
              <h3><?= get_field('block1_subtitle_column1') ?></h3>
              <div class="text-body">
                <p><?= get_field('block1_text_column1') ?></p>
                <div class="guides-list conteiner-968">
                  <div class="text-body">
                    <p><?= get_field('block1_list_column1') ?></p>
                  </div>
           
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   <!-- <div class="container  reader realReader m-t120">
      <div class="row">
        <div class="col-lg-12 col-sm-12">
          <div class="tab-schortcode"><?= get_field('shortcode_form') ?></div>
          <div>
        </div>
      </div>
    </div>-->


  </main>
</div>
 
<?php get_footer(); ?>