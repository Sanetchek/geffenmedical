<?php

/**
 * Template Name: Favorite
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

<div class="favorite">
  <style>
    .promotions-prise-favorite {
      justify-content: space-between;
      width: 100% !important;
      align-items: center;
    }

    .favorite-page-icons {
      width: 35px !important;
      height: 35px;
      cursor: pointer;
      background: #d2dde7;
      border-radius: 50%;
    }
  </style>
  <?php get_template_part('template-parts/breadcrumbs') ?>

  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12 contact-page-menu-title">
        <h1 class="text-al-start">
          המועדפים שלי
        </h1>

      </div>
    </div>
  </div>
</div>

<div class="conteiner-968">
  <div class="row">
    <div class="col-md-12">
      <?php
        $current_user = wp_get_current_user();
        $user_ip = $_SERVER['REMOTE_ADDR'];

        $args = array(
          'post_type' => 'product', // Adjust post type as needed
          'posts_per_page' => -1, // Retrieve all posts
          'has_password' => false,
        );

        if (is_user_logged_in()) {
          $args['meta_query'] = array(
            array(
              'key' => '_user_liked',
              'value' => $current_user->user_nicename,
              'compare' => 'LIKE',
            ),
          );
        } else {
          $args['meta_query'] = array(
            array(
              'key' => '_user_ip',
              'value' => $user_ip,
              'compare' => 'LIKE',
            ),
          );
        }

        $query = new WP_Query($args);

        if ($query->have_posts()) :
      ?>
        <div class="allproduct-page-promotions">
          <?php
            while ($query->have_posts()) {
              $query->the_post();
              // Your loop content here
              $id = get_the_ID();
              $product = wc_get_product($id);
              $args = ['id' => $id, 'product' => $product];

              get_template_part('template-parts/product', 'related', $args);
              // ... other post data you want to display
            }
            wp_reset_postdata(); // Reset post data to the main loop
          ?>
        </div>

      <?php else : ?>

        <div class="btn-wrap favoritr-block-img">
          <img src="/wp-content/uploads/2023/11/favorite.png" alt="">
          <h2 style="font-size:25px; color:#0A3B64;">
          הוסיפו פריט ראשון לרשימת המועדפים !</h2>
          <div class="customer-club-button" style="justify-content: center;">
            <a href="/all-products/"  style="justify-content: center;">לכל המוצרים</a>
          </div>
        </div>

      <?php endif; ?>
    </div>
  </div>
</div>


<div class="block-mr-100"></div>

</div>
<?php
get_footer(); ?>