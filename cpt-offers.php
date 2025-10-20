<?php

/**
 * Catégorie : CPT
 * Description : Enregistre le Custom Post Type « Offers » pour gérer les offres spéciales.
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
        'name'                  => _x( 'Offers', 'Post type general name', 'up-cpt' ),
        'singular_name'         => _x( 'Offer', 'Post type singular name', 'up-cpt' ),
        'menu_name'             => _x( 'Offers', 'Admin Menu text', 'up-cpt' ),
        'name_admin_bar'        => _x( 'Offer', 'Add New on Toolbar', 'up-cpt' ),
        'add_new'               => __( 'Add New', 'up-cpt' ),
        'add_new_item'          => __( 'Add New Offer', 'up-cpt' ),
        'edit_item'             => __( 'Edit Offer', 'up-cpt' ),
        'new_item'              => __( 'New Offer', 'up-cpt' ),
        'view_item'             => __( 'View Offer', 'up-cpt' ),
        'view_items'            => __( 'View Offers', 'up-cpt' ),
        'search_items'          => __( 'Search Offers', 'up-cpt' ),
        'not_found'             => __( 'No offers found.', 'up-cpt' ),
        'not_found_in_trash'    => __( 'No offers found in Trash.', 'up-cpt' ),
        'all_items'             => __( 'All Offers', 'up-cpt' ),
        'archives'              => __( 'Offer Archives', 'up-cpt' ),
        'attributes'            => __( 'Offer Attributes', 'up-cpt' ),
    );

    $default_slug = 'offres';
    $slug = apply_filters( 'up_cpt_offers_slug', $default_slug );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => $slug ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_position'      => 22,
        'menu_icon'          => 'dashicons-megaphone',
    );

    $args = apply_filters( 'up_cpt_offers_args', $args );
    $args = apply_filters( 'up_cpt_offers_' . $args['rewrite']['slug'] . '_args', $args );
    $args = apply_filters( 'up_cpt_offers_' . $args['rewrite']['slug'], $args );

    register_post_type( 'offers', $args );
} );
