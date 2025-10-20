<?php

/**
 * Catégorie : CPT
 * Description : Enregistre le Custom Post Type « Land » pour gérer les parcelles ou terrains.
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

add_action( 'init', function () {
    $labels = array(
        'name'                  => _x( 'Land', 'Post type general name', 'up-cpt' ),
        'singular_name'         => _x( 'Plot', 'Post type singular name', 'up-cpt' ),
        'menu_name'             => _x( 'Land', 'Admin Menu text', 'up-cpt' ),
        'name_admin_bar'        => _x( 'Plot', 'Add New on Toolbar', 'up-cpt' ),
        'add_new'               => __( 'Add New', 'up-cpt' ),
        'add_new_item'          => __( 'Add New Plot', 'up-cpt' ),
        'edit_item'             => __( 'Edit Plot', 'up-cpt' ),
        'new_item'              => __( 'New Plot', 'up-cpt' ),
        'view_item'             => __( 'View Plot', 'up-cpt' ),
        'view_items'            => __( 'View Land', 'up-cpt' ),
        'search_items'          => __( 'Search Plots', 'up-cpt' ),
        'not_found'             => __( 'No plots found.', 'up-cpt' ),
        'not_found_in_trash'    => __( 'No plots found in Trash.', 'up-cpt' ),
        'all_items'             => __( 'All Plots', 'up-cpt' ),
        'archives'              => __( 'Plot Archives', 'up-cpt' ),
        'attributes'            => __( 'Plot Attributes', 'up-cpt' ),
    );

    $default_slug = 'terrains';
    $slug = apply_filters( 'up_cpt_land_slug', $default_slug );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => $slug ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_position'      => 27,
        'menu_icon'          => 'dashicons-location',
    );

    $args = apply_filters( 'up_cpt_land_args', $args );
    $args = apply_filters( 'up_cpt_land_' . $args['rewrite']['slug'] . '_args', $args );
    $args = apply_filters( 'up_cpt_land_' . $args['rewrite']['slug'], $args );

    register_post_type( 'land', $args );
} );
