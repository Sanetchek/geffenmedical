<?php

// Add custom role and assign WooCommerce customer role capabilities
function add_club_member_role() {
  // Retrieve WooCommerce customer role capabilities
  $customer_role = get_role('customer'); // Assuming 'customer' is the slug for WooCommerce customer role

  // Define capabilities from WooCommerce customer role
  $customer_capabilities = $customer_role->capabilities;

  // Add custom role 'club_member' and assign WooCommerce customer role capabilities
  add_role('club_member', 'Club Member', $customer_capabilities);
}

add_action('init', 'add_club_member_role');