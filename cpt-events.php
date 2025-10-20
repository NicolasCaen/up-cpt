<?php

/**
 * Slug: cpt-events
 * Nom: Cpt Événements
 * Description: Enregistre le Custom Post Type « Events » pour gérer les événements d'hôtel.
 * Version: 1.0.0
 * Catégories: CPT, Événementiel
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
        'name'                  => _x( 'Events', 'Post type general name', 'up-cpt' ),
        'singular_name'         => _x( 'Event', 'Post type singular name', 'up-cpt' ),
        'menu_name'             => _x( 'Events', 'Admin Menu text', 'up-cpt' ),
        'name_admin_bar'        => _x( 'Event', 'Add New on Toolbar', 'up-cpt' ),
        'add_new'               => __( 'Add New', 'up-cpt' ),
        'add_new_item'          => __( 'Add New Event', 'up-cpt' ),
        'edit_item'             => __( 'Edit Event', 'up-cpt' ),
        'new_item'              => __( 'New Event', 'up-cpt' ),
        'view_item'             => __( 'View Event', 'up-cpt' ),
        'view_items'            => __( 'View Events', 'up-cpt' ),
        'search_items'          => __( 'Search Events', 'up-cpt' ),
        'not_found'             => __( 'No events found.', 'up-cpt' ),
        'not_found_in_trash'    => __( 'No events found in Trash.', 'up-cpt' ),
        'all_items'             => __( 'All Events', 'up-cpt' ),
        'archives'              => __( 'Event Archives', 'up-cpt' ),
        'attributes'            => __( 'Event Attributes', 'up-cpt' ),
    );

    $default_slug = 'evenements';
    $slug = apply_filters( 'up_cpt_events_slug', $default_slug );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => $slug ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-calendar-alt',
    );

    $args = apply_filters( 'up_cpt_events_args', $args );
    $args = apply_filters( 'up_cpt_events_' . $args['rewrite']['slug'] . '_args', $args );
    $args = apply_filters( 'up_cpt_events_' . $args['rewrite']['slug'], $args );

    register_post_type( 'events', $args );
} );
