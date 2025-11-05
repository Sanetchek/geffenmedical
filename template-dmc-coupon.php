<?php

/**
 * Template Name: DMC Coupon List
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
  .coupon-list th {
    width: 5%;
  }
</style>
<p>הטבה במרכז הרפואי DMC לרוכשים חיישנן פריסטייל ליברה 2</p>

<div class="coupon-list container">

    <?php
    $args = array(
      'posts_per_page' => -1,
      'post_type' => 'coupon',
    );

    $coupon_query = new WP_Query($args);

    if ($coupon_query->have_posts()):
      $count = 0;
    ?>


        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Coupon Option</th>
              <th>Date</th>
              <th>Used</th>
            </tr>
          </thead>
          <tbody>

            <?php while ($coupon_query->have_posts()) : $coupon_query->the_post();
              $coupon_option = get_post_meta(get_the_ID(), '_coupon_option', true);
              $coupon_date = get_the_date();
              $coupon_used = get_post_meta(get_the_ID(), '_coupon_used', true);
              $count++;
              ?>

              <?php if ($coupon_used == 'on') : ?>
                <tr>
                  <td><?php echo $count ?></td>
                  <td><?php the_title(); ?></td>
                  <td><?php echo esc_html($coupon_option); ?></td>
                  <td><?php echo esc_html($coupon_date); ?></td>
                  <td>Yes</td>
                </tr>
              <?php endif ?>

            <?php endwhile; ?>

          </tbody>
        </table>

      <?php wp_reset_postdata(); ?>

    <?php else :
      echo '<p>No coupons found.</p>';
    endif; ?>

</div>
<?php
get_footer(); ?>