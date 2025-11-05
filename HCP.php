<?php
/**
 * Template Name: HCP
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

 // Get the ID from the URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (!$id) {
  // If ID is not present, redirect to 404 page
  global $wp_query;
  $wp_query->set_404();
  status_header(404);
  get_template_part('404'); // Load your 404 template if you have one
  exit();
}

?>

<div class="hcp">
  <?php get_template_part('template-parts/hcp/logo') ?>

  <div class="blue-bg">
    <div class="conteiner-hcp">
      <div class="row">
        <div class="col-md-12">

          <div class="doctor-foto">
            <?php
              $image = get_field('image', $id);
              $size = '135-148';
              if( $image ) {
                echo wp_get_attachment_image( $image, $size );
              }
            ?>
          </div>

          <div class="doctor-info">
            <h2><?= get_the_title($id) ?></h2>
            <h3><?= get_field('subtitle', $id) ?></h3>
          </div>

        </div>
      </div>
    </div>
  </div>
<div class="bl-bg-buttom">
<div class="conteiner-hcp">
    <div class="row">
      <div class="col-md-12">
        <div class="doctor-info-contact">
          <a href="<?= get_field('site', $id) ?>" target="_blank">
            <div class="contact-block-icon hcp-icon">
              <img style="width: 30px;" src="/wp-content/uploads/2024/07/language.svg" alt="">
            </div>
          </a>

          <a href="mailto:<?= get_field('e-mail', $id) ?>">
            <div class="icon-position">
              <div class="contact-block-icon hcp-icon">
                <img src="/wp-content/uploads/2024/07/email-2.svg" alt="" srcset="">
              </div>
            </div>
          </a>

          <a href="https://wa.me/<?= get_field('phone', $id) ?>">
            <div class="icon-position icon-position2">
              <div class="contact-block-icon hcp-icon">
                <img src="/wp-content/uploads/2024/07/Whatsapp.svg" alt="">
              </div>
            </div>
          </a>

          <a href="tel:+<?= get_field('phone', $id) ?>">
            <div class="contact-block-icon hcp-icon">
              <img src="/wp-content/uploads/2024/07/Subtract.svg" alt="">
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


  <div class="link-block">
    <div class="light-bg2">
    </div>
  </div>

  <div class="light-bg">
    <div class="conteiner-hcp">
      <div class="row">
        <div class="col-md-12">
          <div class="hcp-button-block">
          <a href="<?= get_field('dat_link') ?>"><?= get_field('database_join') ?></a>
            <a href="<?= get_field('cs_link') ?>"><?= get_field('customer_service') ?></a>
            <a href="<?= get_field('ap_link') ?>"><?= get_field('availability_products') ?></a>

          </div>
        </div>
      </div>
    </div>

    <?php $menus = get_field('menus') ?>
    <?php if ($menus) : ?>
      <?php foreach ($menus as $menu) : ?>
        <div class="conteiner-hcp menu-conteiner-hcp">
          <div class="row">
            <div class="col-md-12">
              <div class="hcp-fl-block">
                <div class="hcp-fl-block-title">
                  <h2><?= $menu['title'] ?></h2>

                  <?php show_image($menu['image'], [44, 60]) ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php if ($menu['menu_name']) : ?>
          <div class="conteiner-hcp ">
            <div class="row">
              <div class="col-md-12">
                <div class="hcp-fl-block" style="margin: 10px 0 60px;">
                  <div class="hcp-fl-block-menu">
                    <?php wp_nav_menu('menu=' . $menu['menu_name']); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endif ?>
      <?php endforeach ?>
    <?php endif ?>

  </div>

 <!-- <div class="hcp-footer">
    <div class="hcp-footer-bg">
      <div class="hcp-footer-row1">

        <div class="hcp-footer-logo">
          <img style="width: 94px;" src="/wp-content/uploads/2024/08/Geffen-Medical-Logo-2-1.svg" alt="" srcset="">
        </div>

        <div class="hcp-footer-buttons">
          <a href="#">
            <img style="width: 96px;" src="/wp-content/uploads/2024/07/Add_to_Google_Wallet_badge.svg.png" alt="" srcset="">
          </a>
          <a class="hcp-footer-button" href="#">
            <img style="width: 96px;" src="/wp-content/uploads/2024/08/Add_to_Apple_Wallet_badge_1.svg" alt="" srcset="">
          </a>
          <a class="hcp-footer-button" href="#">
            <span>שמירה בדף הבית</span>
            <img src="/wp-content/uploads/2024/07/Vector.svg" alt="" srcset="">
          </a>
        </div>
      </div>

      <div class="hcp-footer-partner">
        <img src="/wp-content/uploads/2024/08/VITREXmed_ProcBlue-3.svg" alt="">
        <img src="/wp-content/uploads/2024/08/Frame-19246.svg" alt="">
        <img src="/wp-content/uploads/2024/08/Insulet-Corporation-logo-1-1.svg" alt="">
        <img src="/wp-content/uploads/2024/08/Frame-19245.svg" alt="">
      </div>
    </div>
  </div>-->
  <?php get_template_part('template-parts/hcp/footer'); ?>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var menuItems = document.querySelectorAll('.menu-item-has-children');

    menuItems.forEach(function (item) {
      item.addEventListener('click', function (e) {
        // Check if the clicked element is a submenu link
        if (e.target.tagName === 'A' && e.target.closest('.sub-menu')) {
          // Allow the link to be clicked without closing the submenu
          return;
        }

        e.preventDefault(); // Prevent default action if clicking on the parent menu item

        // Close all other open submenus
        menuItems.forEach(function (innerItem) {
          if (innerItem !== item) {
            innerItem.classList.remove('menu-item-open');
          }
        });

        // Toggle the current submenu
        item.classList.toggle('menu-item-open');
      });
    });

    // Close submenu if clicking outside
    document.addEventListener('click', function (e) {
      if (!e.target.closest('.menu-item-has-children')) {
        menuItems.forEach(function (item) {
          item.classList.remove('menu-item-open');
        });
      }
    });
  });
</script>