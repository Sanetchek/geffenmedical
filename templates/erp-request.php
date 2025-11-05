<?php
/**
 * Template Name: ERP Request
 */

// Get the current time in WordPress timezone
$current_time = new DateTime();
$last_168_hours = (clone $current_time)->modify('-168 hours'); // Time from 168 hours ago

// Query for orders placed in the last 168 hours
$args = array(
  'limit'        => -1, // Get all orders (can limit if needed)
  'orderby'      => 'date',
  'order'        => 'DESC',
  'date_created' => '>' . $last_168_hours->format('Y-m-d H:i:s'), // Orders from the last 168 hours
  'return'       => 'ids', // Get only the order IDs for efficiency
);

// Fetch orders based on the criteria
$orders = wc_get_orders($args);

// If no orders are found, display a message
if (!empty($orders)) {
  foreach ($orders as $order_id) {
    // Get the order object
    $order = wc_get_order($order_id);

    // Get the 'erp_request' meta field
    $erp_request = get_post_meta($order_id, 'erp_request', true);

    // If 'erp_request' is false, execute the task
    if ($erp_request === 'false') {
      // Execute the custom function with the order ID
      execute_cron_task($order_id);
    }
  }
}
?>
