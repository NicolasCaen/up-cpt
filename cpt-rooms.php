<?php

/**
 * Catégorie : CPT
 * Description : Enregistre le Custom Post Type « Rooms » pour gérer les chambres.
 * Version : 1.0.0
 */

add_action( 'plugins_loaded', function () {
    if ( defined( 'UP_CPT_TEXTDOMAIN_LOADED' ) ) {
        return;
    }

    $textdomain_path = apply_filters( 'up_cpt_textdomain_path', dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    load_plugin_textdomain( 'up-cpt', false, $textdomain_path );
    define( 'UP_CPT_TEXTDOMAIN_LOADED', true );
} );

/**
 * Enregistre le Custom Post Type « Rooms ».
 */
add_action( 'init', function () {
    $labels = array(
        'name'                  => _x( 'Rooms', 'Post type general name', 'up-cpt' ),
        'singular_name'         => _x( 'Room', 'Post type singular name', 'up-cpt' ),
        'menu_name'             => _x( 'Rooms', 'Admin Menu text', 'up-cpt' ),
        'name_admin_bar'        => _x( 'Room', 'Add New on Toolbar', 'up-cpt' ),
        'add_new'               => __( 'Add New', 'up-cpt' ),
        'add_new_item'          => __( 'Add New Room', 'up-cpt' ),
        'edit_item'             => __( 'Edit Room', 'up-cpt' ),
        'new_item'              => __( 'New Room', 'up-cpt' ),
        'view_item'             => __( 'View Room', 'up-cpt' ),
        'view_items'            => __( 'View Rooms', 'up-cpt' ),
        'search_items'          => __( 'Search Rooms', 'up-cpt' ),
        'not_found'             => __( 'No rooms found.', 'up-cpt' ),
        'not_found_in_trash'    => __( 'No rooms found in Trash.', 'up-cpt' ),
        'all_items'             => __( 'All Rooms', 'up-cpt' ),
        'archives'              => __( 'Room Archives', 'up-cpt' ),
        'attributes'            => __( 'Room Attributes', 'up-cpt' ),
    );

    $default_slug = 'chambres';
    $slug = apply_filters( 'up_cpt_rooms_slug', $default_slug );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => $slug ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-building',
    );

    $args = apply_filters( 'up_cpt_rooms_args', $args );
    $args = apply_filters( 'up_cpt_rooms_' . $args['rewrite']['slug'] . '_args', $args );
    $args = apply_filters( 'up_cpt_rooms_' . $args['rewrite']['slug'], $args );

    register_post_type( 'rooms', $args );
} );