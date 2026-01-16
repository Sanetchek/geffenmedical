<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package geffen
 */

 if (get_post_type() == 'medical_profile' || get_post_type() == 'customer' || get_post_type() == 'managements' || is_page_template('templates/phone-check-page.php')) {
  return;
 }

?>

<footer id="colophon" class="site-footer">
  <img src="<?= assets('img/footer.png') ?>" alt="">
  <div id="footer-widgets">

    <div class="footer-side side-1">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-5') ) : ?>
      <?php endif; ?>
    </div>

    <div class="footer-side side-2">
      <div class="footer-menu">
        <?php if (!wp_is_mobile()): ?>
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?>
        <?php endif; ?>

        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?>
        <?php endif; ?>

        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3') ) : ?>
        <?php endif; ?>

        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-4') ) : ?>
        <?php endif; ?>
        <?php else: ?>
        <?php
                if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-mobile-1') ) :
                endif;

                if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-mobile-2') ) :
                endif;
              ?>
        <?php endif; ?>
      </div>

      <div class="footer-social">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-6') ) : ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="footer-side side-3">
      <div class="footer-block-fl">
        <img src="/wp-content/uploads/2025/08/fsl-icon-white.svg" alt="">
        <p><?= get_field('main_footer_fl', 'options') ?></p>
      </div>
      <div class="footer-block-omnipod">
        <img src="/wp-content/uploads/2024/08/OMNIPOD-PNG.png" alt="">
        <p><?= get_field('main_footer_omnipod', 'options') ?></p>
      </div>
    </div>
    <div class="footer-side side-4">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-7') ) : ?>
      <?php endif; ?>
    </div>
  </div>



  <div style="clear-both"></div>
</footer>
</div><!-- #page -->

<?php //get_template_part('template-parts/site', 'rating') ?>
<?php get_template_part('template-parts/adv', 'popup') ?>
<?php wp_footer(); ?>

</body>

</html>