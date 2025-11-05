<?php
/**
 * Single Management Page
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

?>

<!--<div class="hcp">
  <?php
    // Load logo, avatar, and info components
    get_template_part('template-parts/hcp/logo');
    get_template_part('template-parts/hcp/avatar');
    get_template_part('template-parts/hcp/info');
  ?>

  <div class="light-bg">
    <?php
      // Retrieve fields from options
      $args = [
        'customer_service' => get_field('man_customer_service', 'option'),
        'cs_link' => get_field('man_cs_link', 'option'),
        'availability_products' => get_field('man_availability_products', 'option'),
        'ap_link' => get_field('man_ap_link', 'option')
      ];

      // Load buttons template part with arguments
      get_template_part('template-parts/hcp/buttons', '', $args);

      // Retrieve menu fields from options
      $menus = get_field('man_menus', 'option');

      // Load menus template part with menu data
      get_template_part('template-parts/hcp/menus', '', ['menus' => $menus]);
    ?>
  </div>

  <?php
    // Load footer component
    get_template_part('template-parts/hcp/footer');
  ?>
</div>-->