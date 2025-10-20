<?php

/**
 * Slug: cpt-testimonials
 * Nom: Cpt Témoignages
 * Description: Enregistre le Custom Post Type « Testimonials » pour gérer les témoignages.
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
        'name'                  => _x( 'Testimonials', 'Post type general name', 'up-cpt' ),
        'singular_name'         => _x( 'Testimonial', 'Post type singular name', 'up-cpt' ),
        'menu_name'             => _x( 'Testimonials', 'Admin Menu text', 'up-cpt' ),
        'name_admin_bar'        => _x( 'Testimonial', 'Add New on Toolbar', 'up-cpt' ),
        'add_new'               => __( 'Add New', 'up-cpt' ),
        'add_new_item'          => __( 'Add New Testimonial', 'up-cpt' ),
        'edit_item'             => __( 'Edit Testimonial', 'up-cpt' ),
        'new_item'              => __( 'New Testimonial', 'up-cpt' ),
        'view_item'             => __( 'View Testimonial', 'up-cpt' ),
        'view_items'            => __( 'View Testimonials', 'up-cpt' ),
        'search_items'          => __( 'Search Testimonials', 'up-cpt' ),
        'not_found'             => __( 'No testimonials found.', 'up-cpt' ),
        'not_found_in_trash'    => __( 'No testimonials found in Trash.', 'up-cpt' ),
        'all_items'             => __( 'All Testimonials', 'up-cpt' ),
        'archives'              => __( 'Testimonial Archives', 'up-cpt' ),
        'attributes'            => __( 'Testimonial Attributes', 'up-cpt' ),
    );

    $default_slug = 'temoignages';
    $slug = apply_filters( 'up_cpt_testimonials_slug', $default_slug );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => $slug ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_position'      => 24,
        'menu_icon'          => 'dashicons-format-quote',
    );

    $args = apply_filters( 'up_cpt_testimonials_args', $args );
    $args = apply_filters( 'up_cpt_testimonials_' . $args['rewrite']['slug'] . '_args', $args );
    $args = apply_filters( 'up_cpt_testimonials_' . $args['rewrite']['slug'], $args );

    register_post_type( 'testimonials', $args );
} );
