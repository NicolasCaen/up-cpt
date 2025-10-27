<?php

/**
 * Catégorie : Taxonomies
 * Description : Taxonomies liées au Custom Post Type « Rooms ».
 * Version : 1.0.0
 * Type: php
 * Install: php=functions/taxonomy
 * 
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
 * Taxonomies pour les chambres : catégories et équipements.
 */
add_action( 'init', function () {
    // Catégories de chambres (hiérarchique)
    $category_labels = array(
        'name'              => _x( 'Room Categories', 'taxonomy general name', 'up-cpt' ),
        'singular_name'     => _x( 'Room Category', 'taxonomy singular name', 'up-cpt' ),
        'search_items'      => __( 'Search Room Categories', 'up-cpt' ),
        'all_items'         => __( 'All Room Categories', 'up-cpt' ),
        'parent_item'       => __( 'Parent Room Category', 'up-cpt' ),
        'parent_item_colon' => __( 'Parent Room Category:', 'up-cpt' ),
        'edit_item'         => __( 'Edit Room Category', 'up-cpt' ),
        'update_item'       => __( 'Update Room Category', 'up-cpt' ),
        'add_new_item'      => __( 'Add New Room Category', 'up-cpt' ),
        'new_item_name'     => __( 'New Room Category Name', 'up-cpt' ),
        'menu_name'         => __( 'Room Categories', 'up-cpt' ),
    );

    $category_default_slug = 'categories-chambres';
    $category_slug = apply_filters( 'up_tax_rooms_category_slug', $category_default_slug );

    $category_args = array(
        'hierarchical'      => true,
        'labels'            => $category_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => array( 'slug' => $category_slug ),
    );

    $category_args = apply_filters( 'up_tax_rooms_category_args', $category_args );
    $category_args = apply_filters( 'up_tax_rooms_category_' . $category_slug . '_args', $category_args );

    register_taxonomy( 'room_category', array( 'rooms' ), $category_args );

    // Équipements / services (non hiérarchique)
    $feature_labels = array(
        'name'                       => _x( 'Room Features', 'taxonomy general name', 'up-cpt' ),
        'singular_name'              => _x( 'Room Feature', 'taxonomy singular name', 'up-cpt' ),
        'search_items'               => __( 'Search Room Features', 'up-cpt' ),
        'popular_items'              => __( 'Popular Room Features', 'up-cpt' ),
        'all_items'                  => __( 'All Room Features', 'up-cpt' ),
        'edit_item'                  => __( 'Edit Room Feature', 'up-cpt' ),
        'update_item'                => __( 'Update Room Feature', 'up-cpt' ),
        'add_new_item'               => __( 'Add New Room Feature', 'up-cpt' ),
        'new_item_name'              => __( 'New Room Feature Name', 'up-cpt' ),
        'separate_items_with_commas' => __( 'Separate room features with commas', 'up-cpt' ),
        'add_or_remove_items'        => __( 'Add or remove room features', 'up-cpt' ),
        'choose_from_most_used'      => __( 'Choose from the most used room features', 'up-cpt' ),
        'menu_name'                  => __( 'Room Features', 'up-cpt' ),
    );

    $feature_default_slug = 'services-chambres';
    $feature_slug = apply_filters( 'up_tax_rooms_feature_slug', $feature_default_slug );

    $feature_args = array(
        'hierarchical'          => false,
        'labels'                => $feature_labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => $feature_slug ),
    );

    $feature_args = apply_filters( 'up_tax_rooms_feature_args', $feature_args );
    $feature_args = apply_filters( 'up_tax_rooms_feature_' . $feature_slug . '_args', $feature_args );

    register_taxonomy( 'room_feature', array( 'rooms' ), $feature_args );
} );
