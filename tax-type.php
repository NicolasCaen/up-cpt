<?php

/**
 * Catégorie : Taxonomies
 * Description : Taxonomie générique « Type » attachée au CPT « Projects ».
 * Version : 1.0.0
 * Type: php
 * Install: php=functions/taxonomy
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
 * Taxonomie générique « Type » pour les projets.
 */
add_action( 'init', function () {
    $labels = array(
        'name'                       => _x( 'Types', 'taxonomy general name', 'up-cpt' ),
        'singular_name'              => _x( 'Type', 'taxonomy singular name', 'up-cpt' ),
        'search_items'               => __( 'Rechercher des types', 'up-cpt' ),
        'popular_items'              => __( 'Types populaires', 'up-cpt' ),
        'all_items'                  => __( 'Tous les types', 'up-cpt' ),
        'edit_item'                  => __( 'Modifier le type', 'up-cpt' ),
        'update_item'                => __( 'Mettre à jour le type', 'up-cpt' ),
        'add_new_item'               => __( 'Ajouter un nouveau type', 'up-cpt' ),
        'new_item_name'              => __( 'Nom du nouveau type', 'up-cpt' ),
        'separate_items_with_commas' => __( 'Séparer les types par des virgules', 'up-cpt' ),
        'add_or_remove_items'        => __( 'Ajouter ou retirer des types', 'up-cpt' ),
        'choose_from_most_used'      => __( 'Choisir parmi les plus utilisés', 'up-cpt' ),
        'menu_name'                  => __( 'Types', 'up-cpt' ),
    );

    $default_slug = 'type';
    $slug = apply_filters( 'up_tax_type_slug', $default_slug );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => $slug ),
    );

    $args = apply_filters( 'up_tax_type_args', $args );
    $args = apply_filters( 'up_tax_type_' . $slug . '_args', $args );

    register_taxonomy( 'project_type', array( 'projects' ), $args );
} );
