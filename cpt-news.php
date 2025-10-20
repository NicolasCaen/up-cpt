<?php

/**
 * Slug: cpt-news
 * Nom: Cpt Actualités
 * Description: Enregistre le Custom Post Type « News » pour publier les actualités de l'hôtel.
 * Version: 1.0.0
 * Catégories: CPT, Communication
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
        'name'                  => _x( 'News', 'Post type general name', 'up-cpt' ),
        'singular_name'         => _x( 'News item', 'Post type singular name', 'up-cpt' ),
        'menu_name'             => _x( 'News', 'Admin Menu text', 'up-cpt' ),
        'name_admin_bar'        => _x( 'News item', 'Add New on Toolbar', 'up-cpt' ),
        'add_new'               => __( 'Add New', 'up-cpt' ),
        'add_new_item'          => __( 'Add New Article', 'up-cpt' ),
        'edit_item'             => __( 'Edit Article', 'up-cpt' ),
        'new_item'              => __( 'New Article', 'up-cpt' ),
        'view_item'             => __( 'View Article', 'up-cpt' ),
        'view_items'            => __( 'View News', 'up-cpt' ),
        'search_items'          => __( 'Search News', 'up-cpt' ),
        'not_found'             => __( 'No news found.', 'up-cpt' ),
        'not_found_in_trash'    => __( 'No news found in Trash.', 'up-cpt' ),
        'all_items'             => __( 'All News', 'up-cpt' ),
        'archives'              => __( 'News Archives', 'up-cpt' ),
        'attributes'            => __( 'News Attributes', 'up-cpt' ),
    );

    $default_slug = 'actualites';
    $slug = apply_filters( 'up_cpt_news_slug', $default_slug );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => $slug ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_position'      => 26,
        'menu_icon'          => 'dashicons-rss',
    );

    $args = apply_filters( 'up_cpt_news_args', $args );
    $args = apply_filters( 'up_cpt_news_' . $args['rewrite']['slug'] . '_args', $args );
    $args = apply_filters( 'up_cpt_news_' . $args['rewrite']['slug'], $args );

    register_post_type( 'news', $args );
} );
