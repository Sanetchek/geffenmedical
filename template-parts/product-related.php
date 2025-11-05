<?php
$id = $args['id'];
$product = $args['product'];

if (wp_is_mobile()) {
  //$title = str_word(get_the_title($id), 4, ' ...');
  $title = mb_strimwidth(get_the_title($id), 0, 40, '...');

  $subtitle = mb_strimwidth(get_field('subtitle', $id), 0, 60, ' ...');
} else {
  $title = get_the_title($id);
  $subtitle = get_field('subtitle', $id);
}
?>
<div class="main-page-promotions-content">
  <div class="main-page-promotions-item">
    <?php
      $field = get_field('sales', $id);
      $field_pack = get_field('sales_package', $id);
      $sold_out = !$product->is_in_stock(); // Проверка на отметку "Sold Out"
    ?>

    <div class="<?php echo $sold_out ? 'sold-out' : 'main-page-promotions-item-sales'; ?>">
      <?php if ($field && !$sold_out || $field_pack && !$sold_out): ?>
      <div class="single-onsale">
        <div class="single-onsale-icon">
          <?php get_template_part('template-parts/svg/sale') ?>
        </div>
      </div>
      <?php elseif ($sold_out): ?>
      <span class="sold-out">המלאי אזל</span> <!-- "Sold Out" -->
      <?php endif; ?>
    </div>

    <a href="<?php the_permalink($id) ?>" class="product-item-image">
      <?php if (has_post_thumbnail( $id )): ?>
      <?php echo get_the_post_thumbnail($id, 'thumbnail') ?>
      <?php else: ?>
      <img src="<?= wc_placeholder_img_src('woocommerce_single') ?>" alt="Default Product Image">
      <?php endif ?>
    </a>
  </div>

  <div>
    <div class="promotions-item-decore"></div>

    <div class="promotions-item-content">
      <a href="<?php the_permalink($id) ?>">
        <?php if (wp_is_mobile()): ?>
        <p class="promotions-item-title"><?= mb_strimwidth($title, 0, 38, '...'); ?></p>
        <?php else: ?>
        <p class="promotions-item-title"><?php echo $title; ?></p>
        <?php endif; ?>

        <?php if (wp_is_mobile()): ?>
        <p class="promotions-item-subtitle"><?= mb_strimwidth($subtitle, 0, 50, '...') ?></p>
        <?php else: ?>
        <p class="promotions-item-subtitle"><?php echo $subtitle; ?></p>
        <?php endif; ?>
      </a>
    </div>

    <?php
      $fav = '';
      if (is_page_template('favorite.php')) {
        $fav = 'promotions-prise-favorite';
      }
    ?>
    <div class="promotions-prise <?= $fav ?>">
      <?php
      $sale = wc_price($product->get_sale_price());
      $club_price = '';

      if ($product->is_type('variable')) {
        $variation_ids = $product->get_children(); // Get variation IDs
        $regular_prices = array(); // Array to store regular prices
        $sale_prices = array(); // Array to store sale prices
        $club_prices = [];

        foreach ($variation_ids as $variation_id) {
          $variation = wc_get_product($variation_id);
          $regular_prices[] = $variation->get_regular_price(); // Store regular price

          $var_club_price = get_post_meta($variation_id, '_club_price_variation', true);

          if ($var_club_price) {
            $club_prices[] = $var_club_price;
          }

          // Check if the variation is on sale
          if ($variation->is_on_sale()) {
            $sale_prices[] = $variation->get_sale_price(); // Store sale price
          }
        }

        // Get min and max sale prices if sale_prices array is not empty
        if (!empty($sale_prices)) {
          $min_sale_price = min($sale_prices);
          $max_sale_price = max($sale_prices);

          if ($min_sale_price == $max_sale_price) {
            // Output sale price
            $sale = wc_price($max_sale_price);
          } else {
            // Output the range of sale prices
            $sale = wc_price($min_sale_price) . ' - ' . wc_price($max_sale_price);
          }
        }

        // Get min and max sale prices if club_prices array is not empty
        if (!empty($club_prices)) {
          $min_club_price = min($club_prices);
          $max_club_price = max($club_prices);

          if ($min_club_price && $max_club_price) {
            if ($min_club_price == $max_club_price) {
              // Output sale price
              $club_price = wc_price($max_club_price);
            } else {
              // Output the range of sale prices
              $club_price = wc_price($min_club_price) . ' - ' . wc_price($max_club_price);
            }
          }
        }

        // Get min and max regular prices if regular_prices array is not empty
        if (!empty($regular_prices)) {
          $min_regular_price = min($regular_prices);
          $max_regular_price = max($regular_prices);

          if ($min_regular_price == $max_regular_price) {
            // Output the regular price
            $regular = wc_price($max_regular_price);
          } else {
            // Output the range of regular prices
            $regular = wc_price($min_regular_price) . ' - ' . wc_price($max_regular_price);
          }
        } else {
          // Handle the case where there are no regular prices
          $regular = wc_price($product->get_regular_price());
        }
      } else {
        // If it's not a variable product, get and output the regular price
        $price = $product->get_regular_price();
        $regular = wc_price($price);
        $club_price = get_post_meta($id, 'club_price', true) ? wc_price(get_post_meta($id, 'club_price', true)) : 0;
      }

      ?>
      <?php if ($product->is_on_sale()): ?>
        <p class="promotions-item-prise"><?= $sale ?></p>
        <p class="promotions-item-aktionprise"><?= $regular ?></p>
      <?php else: ?>
        <p class="promotions-item-prise"><?= $regular ?></p>
      <?php endif ?>

      <?php if ($club_price) : ?>
        <div class="club-price-wrap">
          <p class="product-club-price" dir="ltr"><?php echo $club_price ?></p>
          <p class="product-club-price-title"><?php echo __('מחיר מועדון ', 'geffen') ?></p>
        </div>
      <?php endif ?>

      <?php
        if (is_page_template('favorite.php')) {
          echo '<span class="favorite-page-icons">';
          echo simpleLikes();
          echo '</span>';
        }
      ?>
    </div>
  </div>
</div>