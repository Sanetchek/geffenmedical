<?php

// Make sure to include this file within WordPress environment
global $wpdb;

$table_name = $wpdb->prefix . 'geffen_email_coupons';

// Manually specify the charset and collation
$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    email varchar(100) NOT NULL,
    used tinyint(1) DEFAULT 0,
    coupon_code varchar(50) NOT NULL,
    PRIMARY KEY  (id),
    UNIQUE KEY email_coupon_code (email, coupon_code)
) $charset_collate;";

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);


// Add a menu item in the admin panel
add_action('admin_menu', 'email_coupons_menu');

function email_coupons_menu() {
    add_menu_page(
        'Email Coupons',
        'Email Coupons',
        'manage_options',
        'email_coupons',
        'email_coupons_page'
    );
}

// Function to display the page content
function email_coupons_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'geffen_email_coupons';

    // Retrieve data from the database
    $coupons = $wpdb->get_results("SELECT * FROM $table_name");

    // Display the data in a table
    echo '<div class="wrap">';
    echo '<h1>Email Coupons</h1>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr><th>ID</th><th>Email</th><th>Used</th><th>Coupon Code</th></tr></thead>';
    echo '<tbody>';
    foreach ($coupons as $coupon) {
        echo '<tr>';
        echo '<td>' . $coupon->id . '</td>';
        echo '<td>' . $coupon->email . '</td>';
        echo '<td>' . ($coupon->used ? 'Yes' : 'No') . '</td>';
        echo '<td>' . $coupon->coupon_code . '</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
    echo '</div>';
}

