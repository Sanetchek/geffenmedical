<?php
/**
 * Template Name: Order List
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

// redirect user if not logged in
redirect_non_logged_in_user();

get_header(); ?>

<style>
  .order {
    border: 1px solid #000;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 40px;
  }

  .order-item, .order-header {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border: 1px solid #000;
    padding: 10px;
  }

  .center {
    text-align: center;
  }
</style>

<main>
  <div class="container">
    <h1>Order List</h1>

    <?php
    $user_id = get_current_user_id();
    $user_crm_id = get_user_meta($user_id, 'user_crm_id', true);
    if ($user_crm_id) :
      $json_string = get_order_specific_customer($user_crm_id);
      $data = json_decode($json_string, true);
    ?>
      <?php foreach ($data['value'] as $el) : ?>
        <div class="order">
          <h3>Order Number WP: <span><?= $el['BOOKNUM'] ? $el['BOOKNUM'] : 'NULL'; ?></span></h3>
          <h3>Order Number CRM: <span><?= $el['ORDNAME'] ? $el['ORDNAME'] : 'NULL' ?></span></h3>
          <p>Date:
            <span>
              <?php
              $date = new DateTime($el['CURDATE']);
              echo $date->format('d-m-Y');
              ?>
            </span>
          </p>
          <p>Order Status: <span><?= $el['ORDSTATUSDES'] ?></span></p>
          <p>Order SubTotal: <span><?= $el['TOTPRICE'] ?></span></p>
          <p>Order Discount: <span><?php echo ($el['TOTPRICE'] - $el['DISPRICE']) ?></span></p>
          <p>Order Total: <span><?= $el['DISPRICE'] ?></span></p>

          <div class="order-list">
            <div class="order-header">
              <div>Name:</div>
              <div class="center">Quantity:</div>
              <div class="center">PRICE:</div>
              <div class="center">VATPRICE:</div>
            </div>
            <?php foreach ($el['ORDERITEMS_SUBFORM'] as $item) : ?>
              <div class="order-item">
                <div><?= $item['PDES'] ?></div>
                <div class="center"><?= $item['TQUANT'] ?></div>
                <div class="center"><?= $item['PRICE'] ?></div>
                <div class="center"><?= $item['VATPRICE'] ?></div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      <?php endforeach ?>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>