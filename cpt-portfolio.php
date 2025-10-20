<?php

/**
 * Slug: cpt-portfolio
 * Nom: Cpt Portfolio
 * Description: Enregistre le Custom Post Type « Portfolio » pour présenter les projets ou réalisations.
 * Version: 1.0.0
 * Catégories: CPT, Réalisations
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
        'name'                  => _x( 'Portfolio', 'Post type general name', 'up-cpt' ),
        'singular_name'         => _x( 'Project', 'Post type singular name', 'up-cpt' ),
        'menu_name'             => _x( 'Portfolio', 'Admin Menu text', 'up-cpt' ),
        'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'up-cpt' ),
        'add_new'               => __( 'Add New', 'up-cpt' ),
        'add_new_item'          => __( 'Add New Project', 'up-cpt' ),
        'edit_item'             => __( 'Edit Project', 'up-cpt' ),
        'new_item'              => __( 'New Project', 'up-cpt' ),
        'view_item'             => __( 'View Project', 'up-cpt' ),
        'view_items'            => __( 'View Portfolio', 'up-cpt' ),
        'search_items'          => __( 'Search Projects', 'up-cpt' ),
        'not_found'             => __( 'No projects found.', 'up-cpt' ),
        'not_found_in_trash'    => __( 'No projects found in Trash.', 'up-cpt' ),
        'all_items'             => __( 'All Projects', 'up-cpt' ),
        'archives'              => __( 'Project Archives', 'up-cpt' ),
        'attributes'            => __( 'Project Attributes', 'up-cpt' ),
    );

    $default_slug = 'portfolio';
    $slug = apply_filters( 'up_cpt_portfolio_slug', $default_slug );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => $slug ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_position'      => 25,
        'menu_icon'          => 'dashicons-portfolio',
    );

    $args = apply_filters( 'up_cpt_portfolio_args', $args );
    $args = apply_filters( 'up_cpt_portfolio_' . $args['rewrite']['slug'] . '_args', $args );
    $args = apply_filters( 'up_cpt_portfolio_' . $args['rewrite']['slug'], $args );

    register_post_type( 'portfolio', $args );
} );
