 <?php

/**
 * Template Name: Applying Your Sensor
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
<style>

  </style>
 <div class="free-style-libre">
   <main class="apply-sensor">
     <div class="container">
       <div class="next">
         <div class="row align-items-center  my-order-2">
           <div class="col-sm-6 col-12 next__header my-order-1">
             <h1><?= get_field('title') ?></h1>
           </div>
         </div>
       </div>
       <div class="row justify-content-center product__cont">
         <div class="col-lg-5 product__block product__block--blue relative">
           <div class="product__text-block product__text-block--blue ">
             <div class="btns-group">
               <div id="my-inline-buttons" class="sharethis-inline-share-buttons"></div>
             </div>
             <h2 style="color: #fff;"><?= get_field('sub_title') ?></h2>
             <?= get_field('text') ?>
           </div>
         </div>
         <div class="col-lg-7 product__block my-order-1">
            <?php
              $image = get_field('image');

              if ($image) {
                echo get_image($image);
              }
            ?>
         </div>
       </div>
       <div class="choose">
         <div class="row justify-content-center">
           <div class="col-md-6">
             <h2><?= get_field('block2_title') ?></h2>
             <p class="sub"><?= get_field('block2_text') ?></p>
             <div class="choose-list">
               <div class="choose-list__item">
                  <img src="<?= assets('img/Ellipse-As.png') ?>" alt="">
                  <p><?= get_field('block2_item_1') ?></p>
               </div>
               <div class="choose-list__item">
                <img src="<?= assets('img/Ellipse-As.png') ?>" alt="">
                <p><?= get_field('block2_item_2') ?></p>
               </div>
               <div class="choose-list__item">
                <img src="<?= assets('img/Ellipse-As.png') ?>" alt="">
                <p><?= get_field('block2_item_3') ?></p>
               </div>
               <div class="choose-list__item">
                <img src="<?= assets('img/Ellipse-As.png') ?>" alt="">
                <p><?= get_field('block2_item_4') ?></p>
               </div>
             </div>
           </div>
           <div class="col-md-4 my-order-1">
            <?php
              $image = get_field('block2_image');

              if ($image) {
                echo get_image($image);
              }
            ?>
           </div>
         </div>
       </div>

       <div class="choose">
         <div class="row justify-content-center">
           <div class="col-md-6">
             <h2><?= get_field('block3_title') ?></h2>
             <p class="sub"><?= get_field('block3_text') ?></p>
             <div class="choose-list">
               <div class="choose-list__item">
                <img src="<?= assets('img/Ellipse-As.png') ?>" alt="">
                 <p><?= get_field('block3_item_1') ?></p>
               </div>
               <div class="choose-list__item">
                <img src="<?= assets('img/Ellipse-As.png') ?>" alt="">
                 <p><?= get_field('block3_item_2') ?></p>
               </div>
               <div class="choose-list__item">
                <img src="<?= assets('img/Ellipse-As.png') ?>" alt="">
                 <p><?= get_field('block3_item_3') ?></p>
               </div>
               <div class="choose-list__item">
                <img src="<?= assets('img/Ellipse-As.png') ?>" alt="">
                 <p><?= get_field('block3_item_4') ?></p>
               </div>
               <div class="choose-list__item">
                <img src="<?= assets('img/Ellipse-As.png') ?>" alt="">
                 <p><?= get_field('block3_item_5') ?></p>
               </div>
             </div>
           </div>
           <div class="col-md-4 my-order-1">
            <?php
              $image = get_field('block3_image');

              if ($image) {
                echo get_image($image);
              }
            ?>
           </div>
         </div>
       </div>
       <div class="libre__block libre__block--yellow" style="direction: rtl">
         <div class="row justify-content-center">
           <div class="col-xl-8">
             <h2 class="next__header"><?= get_field('block4_title') ?></h2>
           </div>
         </div>
         <div class="row justify-content-center twoColumns-list align-items-center">
           <div class="row">
             <div class="col-xl-6">
               <?php $group = get_field('keep_the_sensor_in_place_1') ?>
               <div class="twoColumns-list__item">
                 <div class="twoColumns-list__item-img">
                  <?php
                    $image = $group['image'];

                    if ($image) {
                      echo get_image($image);
                    }
                  ?>
                 </div>
                 <div class="twoColumns-list__item-text">
                   <div class="twoColumns__header">
                     <h3 style="all: unset;">
                       <?= $group['title'] ?>
                     </h3>
                   </div>
                   <p><?= $group['text'] ?></p>
                 </div>
               </div>
             </div>

             <div class="col-xl-6">
              <?php $group = get_field('keep_the_sensor_in_place_2') ?>
               <div class="twoColumns-list__item">
                 <div class="twoColumns-list__item-img">
                  <?php
                    $image = $group['image'];

                    if ($image) {
                      echo get_image($image);
                    }
                  ?>
                 </div>
                 <div class="twoColumns-list__item-text">
                   <div class="twoColumns__header">
                     <h3 style="all: unset;">
                     <?= $group['title'] ?>
                     </h3>
                   </div>
                   <p><?= $group['text'] ?></p>
                 </div>
               </div>
             </div>
           </div>

           <div class="row">

             <div class="col-xl-6">
              <?php $group = get_field('keep_the_sensor_in_place_3') ?>
               <div class="twoColumns-list__item">
                 <div class="twoColumns-list__item-img">
                  <?php
                    $image = $group['image'];

                    if ($image) {
                      echo get_image($image);
                    }
                  ?>
                 </div>
                 <div class="twoColumns-list__item-text">
                   <div class="twoColumns__header">
                     <h3 style="all: unset;">
                     <?= $group['title'] ?>
                     </h3>
                   </div>
                   <p><?= $group['text'] ?></p>
                 </div>
               </div>
             </div>

             <div class="col-xl-6">
              <?php $group = get_field('keep_the_sensor_in_place_4') ?>
               <div class="twoColumns-list__item">
                 <div class="twoColumns-list__item-img">
                  <?php
                    $image = $group['image'];

                    if ($image) {
                      echo get_image($image);
                    }
                  ?>
                 </div>
                 <div class="twoColumns-list__item-text">
                   <div class="twoColumns__header">
                     <h3 style="all: unset;">
                     <?= $group['title'] ?>
                     </h3>
                   </div>
                   <p><?= $group['text'] ?></p>
                 </div>
               </div>
             </div>
           </div>

           <div class="row">
             <div class="col-xl-6">
              <?php $group = get_field('keep_the_sensor_in_place_5') ?>
               <div class="twoColumns-list__item">
                 <div class="twoColumns-list__item-img">
                  <?php
                    $image = $group['image'];

                    if ($image) {
                      echo get_image($image);
                    }
                  ?>
                 </div>
                 <div class="twoColumns-list__item-text">
                   <div class="twoColumns__header">
                    <h3 style="all: unset;">
                     <?= $group['title'] ?>
                    </h3>
                   </div>
                   <p><?= $group['text'] ?></p>
                 </div>
               </div>
             </div>

             <div class="col-xl-6">
              <?php $group = get_field('keep_the_sensor_in_place_6') ?>
               <div class="twoColumns-list__item">
                 <div class="twoColumns-list__item-img">
                  <?php
                    $image = $group['image'];

                    if ($image) {
                      echo get_image($image);
                    }
                  ?>
                 </div>
                 <div class="twoColumns-list__item-text">
                   <div class="twoColumns__header">
                     <h3 style="all: unset;">
                     <?= $group['title'] ?>
                     </h3>
                   </div>
                   <p><?= $group['text'] ?></p>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="video relative">
         <div class="row">
           <div class="col-md-8">
             <?php if (get_field('youtube')) : ?>
              <?php showYoutubeVideo( get_field('youtube') ) ?>
             <?php endif ?>
           </div>
           <div class="col-md-4 my-order-1">
             <h4><?= get_field('block5_title') ?></h4>
             <p><?= get_field('block5_text') ?></p>
             <div class="btns-group">
               <div id="my-inline-buttons" class="sharethis-inline-share-buttons"></div>
             </div>
           </div>
         </div>
       </div>
       <div class="row justify-content-between next__bottom">
      <div class="col-6">
        <?php if (get_field('link_1')) : ?>
        <a href="<?= get_field('link_1') ?>" class="next-link left" target="_blank">
          <img src="<?= assets('img/btn-right-arrow.png') ?>" alt="">
          <?= get_field('link_text_1') ?>
        </a>
        <?php endif ?>

      </div>
      <div class="col-6 text-left">
        <?php if (get_field('link_2')) : ?>
        <a href="<?= get_field('link_2') ?>" class="next-link left" target="_blank">
          <?= get_field('link_text_2') ?>
          <img src="<?= assets('img/btn-left-arrow.png') ?>" alt="">
        </a>
        <?php endif ?>
      </div>
    </div>
       </div>
     </div>
   </main>

   <?php get_template_part('template-parts/freestyle/footer') ?>
 </div>