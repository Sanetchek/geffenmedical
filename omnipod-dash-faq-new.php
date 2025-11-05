<?php

/**
 * Template Name: Omnipod-dash-faq-new
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
<style>
@media print {
    .fl-libre-main-menu.ds-header-menu2,
    header {
        display: none !important; /* Скрываем элементы при печати */
    }
}
</style>
<div class="omnipod-style-page">
  <main class="omnipod-main-page paperless  what-is-omnipod omnipod-dash new-mp omnipod-dash-faq-new">

    <div class="omnipod-main-page-title use-desktop-block">
      <div class="fade-bg-img"></div>
      <div class="section g-24-40 m-120">
        <div class="row">
          <div class="col-lg-7 col-sm-12">
            <h1 class="h1"><?= get_field('system_title') ?></h1>
          </div>
          <div class="col-lg-5 col-sm-12">
          </div>

        </div>
      </div>
    </div>

    <div>
      <img class="use-desktop-block-mobile" src="/wp-content/uploads/2024/07/Hero-Banne_dash_faq-mob.jpg" alt="">
    </div>

    <div class="bg-gray-gradient">
      <div class="container reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row  f-alit-cent" style="justify-content: center;">
            <div class="col-lg-8 col-sm-12">
              <h2 class="omnipod-h2"><?= get_field('block2_title') ?></h2>
              <div class="text-body">
                <p><?= get_field('block2_text') ?></p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-red-gradient-faq">
      <div class="container reader realReader m-t120">
        <div class="section g-24-40">
          <div class="row  f-alit-cent" style="justify-content: center;">
            <div class="col-lg-8 col-sm-12">
              <h2 class="omnipod-h2"><?= get_field('block_faq_title') ?></h2>

            </div>
          </div>
        </div>
      </div>
    </div>




    <div class="container reader realReader m-t120">
      <div class="section g-24-40">
        <div class="row">
          <?php $field = get_field('list') ?>
          <?php if ($field): ?>
          <?php foreach ($field as $item): ?>
          <div class="col-lg-12 col-sm-12">
            <div class="instructions-use-fl3 accordion-faq-new  omnipod-accordions-page paperless-accordion">
              <div class="accordion">
                <?php $faq = $item['faq'] ?>
                <?php if ($faq): ?>
                <?php foreach ($faq as $val): ?>
                <div class="accordion-item">
                  <div class="accordion-header">
                    <span class="icon">+</span>
                    <p><strong><?= $val['title'] ?></strong></p>
                  </div>
                  <div class="accordion-content" style="display: none;">
                    <?= $val['description'] ?>
                  </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
              </div>

            </div>

          </div>
          <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </div>

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
<script>
document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll('.accordion-content'); // Все табы

    function showAllTabs() {
        tabs.forEach(tab => {
            tab.style.display = 'block'; // Показываем все табы
        });
    }

    function restoreTabs() {
        tabs.forEach(tab => {
            tab.style.display = ''; // Возвращаем к исходному состоянию
        });
    }

    window.addEventListener('beforeprint', showAllTabs);
    window.addEventListener('afterprint', restoreTabs);
});
</script>
<?php get_footer(); ?>