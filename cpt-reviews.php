<?php

/**
 * Slug: cpt-reviews
 * Nom: Cpt Avis
 * Description: Enregistre le Custom Post Type « Reviews » pour gérer les avis clients.
 * Version: 1.0.0
 * Catégories: CPT, Témoignages
 * Type: php
 * Install: php=functions/cpt
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
        'name'                  => _x( 'Reviews', 'Post type general name', 'up-cpt' ),
        'singular_name'         => _x( 'Review', 'Post type singular name', 'up-cpt' ),
        'menu_name'             => _x( 'Reviews', 'Admin Menu text', 'up-cpt' ),
        'name_admin_bar'        => _x( 'Review', 'Add New on Toolbar', 'up-cpt' ),
        'add_new'               => __( 'Add New', 'up-cpt' ),
        'add_new_item'          => __( 'Add New Review', 'up-cpt' ),
        'edit_item'             => __( 'Edit Review', 'up-cpt' ),
        'new_item'              => __( 'New Review', 'up-cpt' ),
        'view_item'             => __( 'View Review', 'up-cpt' ),
        'view_items'            => __( 'View Reviews', 'up-cpt' ),
        'search_items'          => __( 'Search Reviews', 'up-cpt' ),
        'not_found'             => __( 'No reviews found.', 'up-cpt' ),
        'not_found_in_trash'    => __( 'No reviews found in Trash.', 'up-cpt' ),
        'all_items'             => __( 'All Reviews', 'up-cpt' ),
        'archives'              => __( 'Review Archives', 'up-cpt' ),
        'attributes'            => __( 'Review Attributes', 'up-cpt' ),
    );

    $default_slug = 'avis';
    $slug = apply_filters( 'up_cpt_reviews_slug', $default_slug );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => $slug ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_position'      => 23,
        'menu_icon'          => 'dashicons-star-filled',
    );

    $args = apply_filters( 'up_cpt_reviews_args', $args );
    $args = apply_filters( 'up_cpt_reviews_' . $args['rewrite']['slug'] . '_args', $args );
    $args = apply_filters( 'up_cpt_reviews_' . $args['rewrite']['slug'], $args );

    register_post_type( 'reviews', $args );
} );
