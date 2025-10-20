<?php

/**
 * Catégorie : CPT
 * Description : Enregistre le Custom Post Type « Property » pour gérer les propriétés immobilières.
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
        'name'                  => _x( 'Properties', 'Post type general name', 'up-cpt' ),
        'singular_name'         => _x( 'Property', 'Post type singular name', 'up-cpt' ),
        'menu_name'             => _x( 'Properties', 'Admin Menu text', 'up-cpt' ),
        'name_admin_bar'        => _x( 'Property', 'Add New on Toolbar', 'up-cpt' ),
        'add_new'               => __( 'Add New', 'up-cpt' ),
        'add_new_item'          => __( 'Add New Property', 'up-cpt' ),
        'edit_item'             => __( 'Edit Property', 'up-cpt' ),
        'new_item'              => __( 'New Property', 'up-cpt' ),
        'view_item'             => __( 'View Property', 'up-cpt' ),
        'view_items'            => __( 'View Properties', 'up-cpt' ),
        'search_items'          => __( 'Search Properties', 'up-cpt' ),
        'not_found'             => __( 'No properties found.', 'up-cpt' ),
        'not_found_in_trash'    => __( 'No properties found in Trash.', 'up-cpt' ),
        'all_items'             => __( 'All Properties', 'up-cpt' ),
        'archives'              => __( 'Property Archives', 'up-cpt' ),
        'attributes'            => __( 'Property Attributes', 'up-cpt' ),
    );

    $default_slug = 'proprietes';
    $slug = apply_filters( 'up_cpt_property_slug', $default_slug );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => $slug ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_position'      => 28,
        'menu_icon'          => 'dashicons-admin-home',
    );

    $args = apply_filters( 'up_cpt_property_args', $args );
    $args = apply_filters( 'up_cpt_property_' . $args['rewrite']['slug'] . '_args', $args );
    $args = apply_filters( 'up_cpt_property_' . $args['rewrite']['slug'], $args );

    register_post_type( 'property', $args );
} );
