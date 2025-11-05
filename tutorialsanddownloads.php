<?php
/**
 * Template Name: Tutorials and downloads
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

<main class="libre librelink-app tutorialsanddownloads">

  <div class="aem-Grid aem-Grid--12 aem-Grid--default--12">
    <div class="container-fl responsivegrid a-container pb-0 aem-GridColumn aem-GridColumn--default--12">
      <section id="section-container-e8d2fc1dc3">
        <div class="a-container__row">
          <div class="a-container__content">
            <div id="container-e8d2fc1dc3" class="cmp-container">
              <div class="title a-title a-title--fg a-title--fg-primary">
                <div id="title-2f02edd894" class="cmp-title">
                  <h1 class="cmp-title__text">
                    <?= get_field('title') ?>
                  </h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <div class="container reader realReader">
    <div class="row more-info a-container--dark">
      <div class="container tabs">
        <div class="tabs-items">
          <!--<div class="tab-item" data-content="1"><?= get_field('manuals_tab_name') ?></div>-->
          <div class="tab-item active" data-content="2"><?= get_field('tutorials_tab_name') ?></div>
        </div>

        <div class="tabs-content">
          <div id="tab_content_1" class="tab-content">
            <div class="container tabs">

              <?php $categories = get_field('manuals_categories') ?>
              <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3">
                  <div class="tabs-items tutorialsanddownloads-subtabs-items">
                    <?php $tab = 2 ?>
                    <?php if ($categories) : ?>
                    <?php foreach ($categories as $category) : ?>
                    <?php $tab++ ?>
                    <div class="tab-item" data-content="<?= $tab ?>"><?= $category['category_name'] ?></div>
                    <?php endforeach ?>
                    <?php endif ?>
                    <?php $tab2 = $tab ?>
                  </div>
                </div>
                <div class="col-sm-12 col-md-9  col-lg-9 middle">

                  <?php $tab = 2 ?>
                  <?php if ($categories) : ?>
                  <?php foreach ($categories as $category) : ?>
                  <?php $tab++ ?>

                  <div id="tab_content_<?= $tab ?>" class="tab-content" style="display: block!important">
                    <div class="row">
                      <div class="middle">
                        <h2 class="tutorialsanddownloads-carts-title"><?= $category['title'] ?></h2>
                        <h3 class="tutorialsanddownloads-carts-subtitle"><?= $category['subtitle'] ?></h3>
                        <div class="row">

                          <?php $list = $category['list'] ?>
                          <?php if ($list) : ?>
                          <?php foreach ($list as $item) : ?>
                          <div class="col-sm-12 col-md-6  col-lg-6">
                            <div
                              class="fistyre-supported-item benefitsforme-article-item benefitsforme-experiences p-lr-24 h-365">
                              <div class="tutorialsanddownloads-imageblock">
                                <?php show_image($item['image'], 'medium', ['class'=> 'cmp-image__image a-image__default']) ?>
                              </div>
                              <div class="m-card__body">
                                <h3 class="tutorialsanddownloads-carts-subtitle" style="text-align: right">
                                  <?= $item['title'] ?></h3>
                                <div class="m-card__description">
                                  <?php $links = $item['links'] ?>
                                  <?php if ($links) : ?>
                                  <?php foreach ($links as $link) : ?>
                                  <?php if ($link['url']) : ?>
                                  <a href="<?= $link['url'] ?>" class="benefitsforme-article-readmore">
                                    <span class="f-w400"><?= $link['link_label'] ?></span>
                                  </a>
                                  <?php endif ?>
                                  <?php endforeach ?>
                                  <?php endif ?>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php endforeach ?>
                          <?php endif ?>


                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach ?>
                  <?php endif ?>
                </div>
                <!--end div content  1main tab--->
                <!--div category 1main tab--->

                <!--end div category 1main tab--->
              </div>
            </div>
          </div>

          <div id="tab_content_2" class="tab-content active" style="padding-top: 0!important;">
            <div class="container tabs conteiner-tab-2">

              <?php $categories = get_field('tutorials_categories') ?>
              <div class="row">
               <!-- <div class="col-sm-3 col-md-3 col-lg-3">
                  -desktop--->
                <!--  <div class="tabs-items tutorialsanddownloads-subtabs-items tutorialsanddownloads-subtabs-desktop">
                    <?php if ($categories) : ?>
                    <?php foreach ($categories as $category) : ?>
                    <?php $tab2++ ?>
                    <div class="tab-item active" data-content="<?= $tab2 ?>"><?= $category['category_name'] ?></div>
                    <?php endforeach ?>
                    <?php endif ?>
                  </div>--->
                  <!---desktop--->
                  <!---mob--->
                  <!--<div class="tutorialsanddownloads-subtabs-mob">
                    <select id="tabSelector" class="form-control">
                      <option value="3">הצמדת והסרת החיישן</option>
                      <option value="4" selected>אופן השימוש בחיישן</option>
                      <option value="5">הבנת נתוני רמות הסוכר והדוחות</option>
                    </select>
                  </div>--->

                  <!---mob-
                </div>-->
                <div class="col-sm-12 col-md-12  col-lg-12 middle">
                  <?php if ($categories) : ?>
                  <?php foreach ($categories as $category) : ?>
                  <?php $tab++ ?>
                  <div id="tab_content_<?= $tab ?>" class="tab-content conten2" style="display: block!important;padding-top: 0!important;">
                    <div class="row">
                      <div class="middle">
                        <h2 style="margin-bottom: 0px !important;" class="tutorialsanddownloads-carts-title"><?= $category['title'] ?></h2>
                        <h3 class="tutorialsanddownloads-carts-subtitle"><?= $category['subtitle'] ?></h3>

                        <div class="row tutorialsanddownloads-video-block">
                          <?php $list = $category['list'] ?>
                          <?php if ($list) : ?>
                          <?php foreach ($list as $item) : ?>
                          <div class="col-sm-12 col-md-4  col-lg-4">
                            <div class="tutorialsanddownloads-video" style="display: flex;flex-direction: column;align-items: center;">
                              <?php if ($item['youtube']) : ?>
                              <iframe width="220" height="130" src="<?= $item['youtube'] ?>"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                              <?php endif ?>

                              <p><?= $item['title'] ?></p>
                            </div>
                          </div>
                          <?php endforeach ?>
                          <?php endif ?>
                        </div>

                        <?php $support = $category['need_more_support'] ?>
                        <?php if ($category['show_block_need_more_support'] && $support) : ?>
                        <div class="row">
                          <div class="tutorialsanddownloads-support">
                            <div class="col-6 col-md-2">
                              <?php show_image($support['image'], [80,80]) ?>
                            </div>
                            <div class="col-6 col-md-10">
                              <h2><?= $support['title'] ?></h2>
                              <?php if ($support['url']) : ?>
                              <a href="<?= $support['url'] ?>"><?= $support['link_label'] ?></a>
                              <?php endif ?>
                            </div>
                          </div>
                        </div>
                        <?php endif ?>
                      </div>
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

  <div class="container reader realReader tutorialsanddownloads-touch-mt80">
    <div class="section g-24-40">
      <div class="row">
        <div class="col-sm-12 text-center">
          <h2><strong><?= get_field('get_in_touch_title') ?></strong></h2>
          <div class="row tutorialsanddownloads-touch">

            <?php $call = get_field('get_in_touch_call_us') ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
              <div>
                <?php show_image($call['image'], [80,80]) ?>
                <p class="tutorialsanddownloads-touch-title"><?= $call['title'] ?></p>
                <p class="tutorialsanddownloads-touch-tel"><?= $call['phone_number'] ?></p>
                <p class="tutorialsanddownloads-touch-info"><?= $call['more_info'] ?></p>

              </div>
            </div>

            <?php $email = get_field('get_in_touch_email') ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
              <div>
                <?php show_image($email['image'], [80,80]) ?>
                <p class="tutorialsanddownloads-touch-title"><?= $email['title'] ?></p>
                <div class="tutorial-videos" style="justify-content: center;">
                  <?php if ($email['url']) : ?>
                  <a href="<?= $email['url'] ?>"><?= $email['link_label'] ?></a>
                  <?php endif ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




</main>
<script>
  var firstTabContent = document.querySelector('#tab_content_4');
  if (firstTabContent) {
    firstTabContent.classList.add('active');
  }
</script>
<script>
  document.getElementById('tabSelector').onchange = function () {
    var value = this.value;
    var tabs = document.querySelectorAll('.tab-content.conten2');
    tabs.forEach(function (tab) {
      tab.classList.remove('active');
    });
    document.getElementById('tab_content_' + value).classList.add('active');
  };
</script>

<?php get_footer(); ?>