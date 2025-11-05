<?php
/***************************************** Events Google FB Start ************************************/

// This function fires when a user loads the product detail page and sends the item information to the data layer
function send_view_item_event() {
  $product = wc_get_product( get_the_ID() );
  $product_id = $product->get_id();
  $categories = wc_get_product_category_list($product_id);

  $data = [
    'event' => 'view_item',
    'ecommerce' => [
      'items' => [
        [
          'item_name' => strip_tags($product->get_title()), // The product title.
          'item_id' => strval($product_id), // The product ID.
          'currency' => 'ILS',
          'item_category' => strip_tags($categories), // The product category.
          'price' => $product->get_price(), // The product price.
          'quantity' => 1 // The quantity of the product in the cart.
        ]
      ]
    ]
  ];
  ?>
  <script>
    (function($) {
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push(<?php echo json_encode($data); ?>);
    })(jQuery);
  </script>
<?php
}
add_action('geffen_view_item_event', 'send_view_item_event');
add_action('woocommerce_before_single_product', 'send_view_item_event');


function set_add_to_cart_flag($cart_item_key, $product_id, $quantity, $variation_id, $variation, $cart_item_data) {
  $product = wc_get_product($variation_id ? $variation_id : $product_id);
  $product_id = $product->get_id();
  $categories = wc_get_product_category_list($product_id);

  $product_data = [
    'item_name' => strip_tags($product->get_name()),
    'item_id'   => strval($product->get_id()),
    'item_category' => strip_tags($categories), // The product category.
    'currency'  => 'ILS',
    'price'     => $product->get_price(),
    'quantity'  => $quantity,
  ];

  WC()->session->set('added_to_cart', true);
  WC()->session->set('added_to_cart_product', $product_data);
}
add_action('woocommerce_add_to_cart', 'set_add_to_cart_flag', 10, 6);

function trigger_add_to_cart_event_after_refresh() {
  if (WC()->session->get('added_to_cart')) {
    $product_data = WC()->session->get('added_to_cart_product');

    ?>
    <script>
      (function($) {
        var eventData = {
          'event': 'add_to_cart',
          'ecommerce': {
            'items': [<?php echo json_encode($product_data); ?>]
          }
        };

        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push(eventData);

        <?php WC()->session->set('added_to_cart', false); ?>
        <?php WC()->session->set('added_to_cart_product', null); ?>
      })(jQuery);
    </script>
    <?php
  }
}
add_action('wp_head', 'trigger_add_to_cart_event_after_refresh');

// Define a new function to push data to the dataLayer when the checkout form is displayed.
function begin_checkout_event() {
  if (is_checkout()) {
    // Access the global $woocommerce object
    global $woocommerce;

    // Initialize an empty array to hold items.
    $items = [];

    // Iterate through each item in the cart.
    foreach ($woocommerce->cart->get_cart() as $cart_item) {
      // Fetch the WC_Product object from the cart item.
      $product = $cart_item['data'];
      $product_id = $product->get_id();
      $categories = wc_get_product_category_list($product_id);

      // Build an array of item details.
      $items[] = [
        'item_name' => strip_tags($product->get_title()), // The product title.
        'item_id' => strval($product->get_id()), // The product ID.
        'item_category' => strip_tags($categories), // The product category.
        'price' => $product->get_price(), // The product price.
        'currency' => 'ILS',
        'quantity' => $cart_item['quantity'] // The quantity of the product in the cart.
      ];
    }

    // Generate the HTML and JavaScript for the dataLayer push.
    ?>
    <script>
      // Ensure that the dataLayer array exists.
      window.dataLayer = window.dataLayer || [];

      // Push an event and the ecommerce data to the dataLayer.
      window.dataLayer.push({
        'event': 'begin_checkout',
        'ecommerce': {
          'items': <?php echo json_encode($items) ?> // Convert the PHP array to a JSON string.
        }
      });
    </script>
    <?php
  }
}

// Hook the function to the woocommerce_before_checkout_form action.
// This action is triggered just before the checkout form is displayed.
add_action( 'wp_footer', 'begin_checkout_event' );

/*************************************** End Events Google FB Start ********************************************/