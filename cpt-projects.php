<?php

/**
 * Slug: cpt-projects
 * Nom: Cpt Projects
 * Description: Enregistre le Custom Post Type « Projects » pour gérer les offres spéciales.
 * Version: 1.0.1
 * Catégories: CPT, projet
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
        'name'                  => _x( 'Projects', 'Post type general name', 'up-cpt' ),
        'singular_name'         => _x( 'Project', 'Post type singular name', 'up-cpt' ),
        'menu_name'             => _x( 'Projects', 'Admin Menu text', 'up-cpt' ),
        'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'up-cpt' ),
        'add_new'               => __( 'Add New', 'up-cpt' ),
        'add_new_item'          => __( 'Add New Project', 'up-cpt' ),
        'edit_item'             => __( 'Edit Project', 'up-cpt' ),
        'new_item'              => __( 'New Project', 'up-cpt' ),
        'view_item'             => __( 'View Project', 'up-cpt' ),
        'view_items'            => __( 'View Projects', 'up-cpt' ),
        'search_items'          => __( 'Search Projects', 'up-cpt' ),
        'not_found'             => __( 'No Projects found.', 'up-cpt' ),
        'not_found_in_trash'    => __( 'No Projects found in Trash.', 'up-cpt' ),
        'all_items'             => __( 'All Projects', 'up-cpt' ),
        'archives'              => __( 'Project Archives', 'up-cpt' ),
        'attributes'            => __( 'Project Attributes', 'up-cpt' ),
    );

    $default_slug = 'projets';
    $slug = apply_filters( 'up_cpt_projects_slug', $default_slug );

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

    $args = apply_filters( 'up_cpt_projects_args', $args );
    $args = apply_filters( 'up_cpt_projects_' . $args['rewrite']['slug'] . '_args', $args );
    $args = apply_filters( 'up_cpt_projects_' . $args['rewrite']['slug'], $args );

    register_post_type( 'projects', $args );
} );
