 <?php

 /**
  * Template Name: Discover-Now-You-Know
  *
  *
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
   <main class="discover-fl2">

     <div class="container">
       <div class="contentPage parsys">

        <div class="product_text_Image parbase">

          <section class="prod-two-column container-fluid discover-now-you-know">
            <div class="row">
              <div class="col-md-12 col-xs-12 col-eq-height-wrapper padding-zero sensor-sale discover-now-sale">

                <div class="col-md-12 col-xs-12 col-eq-height padding-zero">
                  <?php show_image(get_field('image'), 'full', ['c%lass' => 'img imgSwap img-responsive wrap-image-de discover-now-decstop', 'width' => '']) ?>
                </div>

                <div class="pull-right text-center prod-row-desc discover-now-text">
                  <h2 class="text-center" style="color: #e95526;letter-spacing: 5px;"><?= get_field('title') ?></h2>
                  <p style="text-align: center;color: #000000;"><?= get_field('text') ?></p>
                </div>
              </div>
            </div>
          </section>

        </div>

        <div class="image_text_bullet section">
          <section class="as-list container diabetes-management-section">
            <div class="row">
              <div class="col-md-12 diabetes-management-content">
                <div class="col-md-5">
                  <?php show_image(get_field('block1_image'), 'large', ['class'=> 'imgSwap img-choosing-site img-responsive']) ?>
                </div>
                <div class="col-md-7 ">
                  <h2 style="text-align:right;margin-bottom: 8px!important;">
                    <span style="color: #e4572d;">
                      <b><?= get_field('block1_title') ?></b>
                    </span>
                  </h2>

                  <p style="text-align: right;">
                    <span style="color: #000;text-align: right;">
                      <b><?= get_field('block1_subtitle') ?></b>
                    </span>
                  </p>

                  <?php $list = get_field('block1_list') ?>
                  <?php if ($list) : ?>
                    <?php foreach ($list as $item) : ?>
                      <div class="media">
                        <div class=".d-sm-none .d-md-block pull-right">
                          <img src="<?= assets('img/Ellipse-As.png') ?>" class="ellipse-as media-object" alt="Bullet" width="14" />
                        </div>
                        <div class="media-body">
                          <p><?= $item['text'] ?></p>
                        </div>
                      </div>
                    <?php endforeach ?>
                  <?php endif ?>
                </div>
              </div>
            </div>
          </section>
        </div>

         <div class="text_ImagePanel parbase">
           <section class="prod-two-column container-fluid">
            <div class="row">
              <div class="col-md-12 col-eq-height-wrapper padding-zero sensor-sale" style="background:#0385a5;padding-left: 0;">
                <div class="col-md-7 col-xs-12 col-eq-height padding-zero">
                  <?php show_image(get_field('block2_image'), 'large', ['class'=> 'imgSwap img-responsive', 'width'=>'100%']) ?>
                </div>

                <div class="col-md-5 col-xs-12 col-eq-height" style="background:#0385a5;">
                  <?php if (get_field('block2_url_1')) : ?>
                    <div class="container pull-right text-center prod-row-desc">
                      <a href="<?= get_field('block2_url_1') ?>" class="btn btn-orange" role="button" width="300" data-uw-styling-context="true" style="border: 2px solid #e4572d;font-weight: bold;margin: 15px;"  target="_blank">
                        <?= get_field('block2_label_link_1') ?>
                      </a>
                    </div>
                  <?php endif ?>

                  <?php if (get_field('block2_url_1')) : ?>
                    <div class="container pull-right text-center prod-row-desc">
                      <a href="<?= get_field('block2_url_1') ?>" class="btn btn-orange" role="button" width="300" data-uw-styling-context="true" style="border: 2px solid #e4572d;font-weight: bold;margin: 15px"  target="_blank">
                        <?= get_field('block2_label_link_1') ?>
                      </a>
                    </div>
                  <?php endif ?>
                </div>
              </div>
             </div>
           </section>
         </div>

         <div class="image_title_des">
           <section class="section care-block container-fluid">
             <div class=" text-center">
               <div class="">
                 <h2 class="fl-functionality-title">
                    <span style="color: #0385a5;font-weight: 600;"><?= get_field('block3_title') ?></span>
                  </h2>

                 <div class="row flex-items-md fl-functionality-box" style="margin-top:80px;">
                  <?php $list = get_field('block3_list') ?>
                  <?php if ($list) : ?>
                    <?php foreach ($list as $key => $item) : ?>
                      <?php $key++ ?>
                      <div class="col-md-4">
                        <div>
                          <?php show_image($item['image'], [132,132], ['class'=> 'img']) ?>
                        </div>
                        <div class="media-body">
                          <h4><span style="color: #0385a5;"><strong><?= $key ?>. <?= $item['title'] ?></strong></span></h4>
                          <p><span style="color: #0385a5;"><?= $item['text'] ?></span></p>
                        </div>
                      </div>
                    <?php endforeach ?>
                  <?php endif ?>
                 </div>
               </div>
             </div>

           </section>
         </div>

         <div class="product_text_Image parbase">
           <section class="prod-two-column container-fluid">
             <div class="row ">
              <?php $video = get_field('video') ?>
              <?php if ($video) : ?>
                <?php foreach ($video as $item) : ?>
                  <?php if ($item['youtube']) : ?>
                    <div class="col-md-6 col-xs-12 col-eq-height-wrapper padding-zero video-box">
                      <div class="col-md-12 col-xs-12 col-eq-height padding-zero "
                        style="text-align: center;margin-bottom:5%">
                        <iframe width="90%" height="100%" src="<?= $item['youtube'] ?>"
                          title="YouTube video player" frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>
                      </div>
                    </div>
                  <?php endif ?>

                <?php endforeach ?>
              <?php endif ?>
             </div>
           </section>
         </div>

         <div class="product_text_Image parbase">
           <section class="prod-two-column container-fluid discover-now-you-know">
             <div class="row">
               <div class="col-md-12 col-xs-12 col-eq-height-wrapper padding-zero sensor-sale discover-now-sale">

                 <div class="col-md-12 col-xs-12 col-eq-height padding-zero ">
                    <?php show_image(get_field('block4_image'), 'full', ['class'=> 'img imgSwap img-responsive wrap-image-de discover-now-decstop', 'width'=>'100%']) ?>
                 </div>

                 <div class="pull-right text-center prod-row-desc discover-now-text">
                   <h2 class="text-center" style="color: #e95526;letter-spacing: 5px;"><?= get_field('block4_title') ?></h2>

                   <p style="text-align: center;color: #000000;font-size: 20px;font-weight: bold;"><?= get_field('block4_subtitle') ?></p>

                   <p style="text-align: center;color: #000000;"><?= get_field('block4_text') ?></p>

                   <p data-uw-styling-context="true">
                    <?php $group = get_field('google') ?>
                    <?php if ($group) : ?>
                      <?php if ($group['url']) : ?>
                        <a href="<?= $group['url'] ?>">
                          <?php show_image($group['image'], [160,50]) ?>
                        </a>
                      <?php endif ?>
                    <?php endif ?>

                    <?php $group = get_field('ios') ?>
                    <?php if ($group) : ?>
                      <?php if ($group['url']) : ?>
                        <a href="<?= $group['url'] ?>">
                          <?php show_image($group['image'], [160,50]) ?>
                        </a>
                      <?php endif ?>
                    <?php endif ?>
                   </p>
                 </div>
               </div>
             </div>
           </section>

         </div>
         <div class="row justify-content-center">
           <div class="col-md-8 ">
             <ul class="list">
                <?php $list = get_field('footer_list') ?>
                <?php if ($list): ?>
                    <?php foreach ($list as $item): ?>
                        <li><?= $item['text'] ?></li>
                    <?php endforeach ?>
                <?php endif ?>
             </ul>
           </div>
         </div>
   </main>
 </div>

 <?php get_footer() ?>