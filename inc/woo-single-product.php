<?php
/**
 * Get the first variation matching the selected tab.
 *
 * @param WC_Product $product WooCommerce product object.
 * @param string $selected_tab The tab to filter variations by.
 * @return array Array of matching variations with 'id', 'name', and 'disabled' keys.
 */
function get_first_variation($product, $selected_tab) {
  $variations = [];

  // Loop through all available variations
  foreach ($product->get_available_variations() as $variation) {
    // Check if the variation has the selected tab
    if (get_post_meta($variation['variation_id'], '_selected_tab', true) === $selected_tab) {
      $var_obj = wc_get_product($variation['variation_id']);
      $stock_status = $var_obj->get_stock_status();

      // Add the variation's id, name, and stock status to the array
      $variations[] = [
        'id' => $variation['variation_id'],
        'name' => esc_html(get_attribute_name($var_obj)),
        'disabled' => $stock_status == 'outofstock'
      ];
    }
  }

  return $variations;
}

/**
 * Get the second level variations for the given product.
 *
 * @param WC_Product $product WooCommerce product object.
 * @param array $names List of variations (with 'id' and 'name') to match with attributes.
 * @return array Array of second level variations with corresponding data.
 */
function get_second_variations($product, $names) {
  $variations = [];

  // Loop through the first variation set
  foreach ($names as $item) {
    $prod_obj = wc_get_product($item['id']);
    $prod_stock_status = $prod_obj->get_stock_status() == 'outofstock';

    // Loop through available variations of the product
    foreach ($product->get_available_variations() as $variation) {
      // Skip if not singular variation
      if (get_post_meta($variation['variation_id'], '_selected_tab', true) !== 'singular') {
        $var_obj = wc_get_product($variation['variation_id']);
        $attributes = $var_obj->get_variation_attributes();
        $first_attribute = reset($attributes);

        // Match the first attribute to the current item's name
        if (urldecode($first_attribute) === $item['name']) {
          // Retrieve second attribute if available
          $second_variation_attribute = array_slice($attributes, 1, 1, true);

          if (!empty($second_variation_attribute)) {
            $attr_key = array_key_first($second_variation_attribute);
            $first_var_slug = $second_variation_attribute[$attr_key];
            $first_key = str_replace('attribute_', '', urldecode($attr_key));
            $attribute_name = get_term_by('slug', $first_var_slug, $first_key);

            // Append details to the variations array
            if ($attribute_name && is_object($attribute_name)) {
              $var_stock_status = $var_obj->get_stock_status() == 'outofstock';
              $variations[$item['name']]['id'] = $item['id'];
              $variations[$item['name']]['disabled'] = $prod_stock_status;
              $variations[$item['name']]['items'][] = [
                'id' => $variation['variation_id'],
                'name' => $attribute_name->name,
                'max_quantity' => get_post_meta($variation['variation_id'], '_max_quantity', true),
                'slug' => $attribute_name->slug,
                'disabled' => $var_stock_status
              ];
            }
          }
        }
      }
    }
  }

  return $variations;
}

/**
 * Render a variation item for display in HTML.
 *
 * @param array $item Variation data with 'id', 'disabled', and other details.
 * @param string $color Background color for the item.
 * @param int $max_qty Maximum quantity allowed for the item.
 * @param int $count_var Counter variable (for iteration purposes).
 * @return string HTML markup for the variation item.
 */
function render_variation_item($item, $color, $max_qty, $count_var) {
  $disabled = $item['disabled'] ? 'disabled' : '';
  $color = $item['disabled'] ? 'grey' : ($color ? $color : 'grey');
  $id = $item['id'];
  $var_obj = wc_get_product($id);
  $regular_price = $var_obj->get_regular_price();
  $show_price = get_priority_price($var_obj);
  $attr_name = !$item['disabled'] ? 'variation[' . $id . '][qty]' : '';
  $qty_plus = $item['disabled'] ? 'disabled':'quantity__plus';
  $qty_minus = $item['disabled'] ? 'disabled':'quantity__minus';

  ob_start();
  ?>
  <div class="case-var-number quantity calculate-item"
       data-price="<?= esc_attr($show_price) ?>"
       data-regular="<?= esc_attr($regular_price) ?>">

    <button type="button" class="case-number-calc case-number-plus <?php echo $qty_plus ?>">
    </button>

    <input type="number" name="<?= $attr_name ?>"
           class="case-package-qty qty"
           style="background: <?= esc_attr($color) ?>"
           value="0" min="0" max="<?= esc_attr($max_qty) ?>" <?= esc_attr($disabled) ?> />

    <button type="button" class="case-number-calc case-number-minus <?php echo $qty_minus ?>">
    </button>
  </div>
  <?php if  ($item['disabled']): ?>
        <p class="qty_disabled">חסר מלאי</p>
    <?php endif ?>

  <?php
  return ob_get_clean();
}

/**
 * Get the name of the first attribute of a variation.
 *
 * @param WC_Product_Variation $var_obj WooCommerce variation product object.
 * @return string Attribute name (term name).
 */
function get_attribute_name($var_obj) {
  $attributes = $var_obj->get_variation_attributes();
  $first_key = array_key_first($attributes);
  $attribute_slug = $attributes[$first_key];
  $taxonomy = str_replace('attribute_', '', urldecode($first_key));
  $term = get_term_by('slug', $attribute_slug, $taxonomy);
  return $term ? $term->name : '';
}

/**
 * Render the WooCommerce quantity input for a product.
 *
 * @param int $product_id ID of the product.
 */
function render_quantity_input($product_id) {
  $max_qty = get_post_meta($product_id, '_max_quantity_on_hands', true) ?: 100;
  $unique_id = uniqid('quantity_', true);

  woocommerce_quantity_input([
    'input_id' => $unique_id,
    'input_name' => 'variation['.$product_id.']',
    'input_value' => 0,
    'min_value' => 0,
    'max_value' => $max_qty,
    'step' => 1,
    'classes' => ['input-text', 'qty', 'text', 'qty-product'],
  ]);
}

/**
 * Render the price for a variation.
 *
 * @param WC_Product_Variation $var_obj WooCommerce variation product object.
 */
function render_variation_price($var_obj) {
  $regular_price = $var_obj->get_regular_price();
  $sale_price = $var_obj->get_sale_price();
  $club_price = get_post_meta($var_obj->get_id(), '_club_price_variation', true);

  $is_on_sale = $var_obj->is_on_sale();

  echo '<div class="var-product-price">';
  if ($is_on_sale) {
    echo '<div class="regular-price">' . wc_price($sale_price) . '</div>';
    echo '<div class="sale-price">' . wc_price($regular_price) . '</div>';
  } else {
    echo '<div class="regular-price">' . wc_price($regular_price) . '</div>';
  }

  if ($club_price) {
    echo '<div class="club-price-wrap">';
    echo '<p class="club-price">' . wc_price($club_price) . '</p>';
    echo '<p class="club-price-title">' . __('מחיר מועדון ', 'geffen') . '</p>';
    echo '</div>';
  }
  echo '</div>';
}

/**
 * Get the prioritized price for a variation.
 *
 * @param WC_Product_Variation $var_obj WooCommerce variation product object.
 * @return string Prioritized price (club > sale > regular).
 */
function get_priority_price($var_obj) {
  $regular_price = $var_obj->get_regular_price();
  $sale_price = $var_obj->get_sale_price();
  $club_price = get_post_meta($var_obj->get_id(), '_club_price_variation', true);

  if (!empty($club_price)) {
    return $club_price;
  } elseif (!empty($sale_price)) {
    return $sale_price;
  } else {
    return $regular_price;
  }
}
