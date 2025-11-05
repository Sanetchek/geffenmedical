<?php

// Add custom post type function to your theme's functions.php file or a custom plugin
function create_webinars_post_type() {
  $labels = array(
    'name'               => _x( 'Webinars', 'post type general name', 'geffen' ),
    'singular_name'      => _x( 'Webinar', 'post type singular name', 'geffen' ),
    'menu_name'          => _x( 'Webinars', 'admin menu', 'geffen' ),
    'name_admin_bar'     => _x( 'Webinar', 'add new on admin bar', 'geffen' ),
    'add_new'            => _x( 'Add New', 'webinar', 'geffen' ),
    'add_new_item'       => __( 'Add New Webinar', 'geffen' ),
    'new_item'           => __( 'New Webinar', 'geffen' ),
    'edit_item'          => __( 'Edit Webinar', 'geffen' ),
    'view_item'          => __( 'View Webinar', 'geffen' ),
    'all_items'          => __( 'Webinars', 'geffen' ),
    'search_items'       => __( 'Search Webinars', 'geffen' ),
    'parent_item_colon'  => __( 'Parent Webinars:', 'geffen' ),
    'not_found'          => __( 'No webinars found.', 'geffen' ),
    'not_found_in_trash' => __( 'No webinars found in Trash.', 'geffen' )
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Description.', 'geffen' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => 'edit.php',
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'webinars' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'thumbnail' ),
    'taxonomies'         => array(  )
  );

  register_post_type( 'webinars', $args );
}

add_action( 'init', 'create_webinars_post_type' );