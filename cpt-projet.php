<?php

/**
 * Slug: cpt-projet
 * Nom: Cpt Projet
 * Description: Enregistre le Custom Post Type « Projet » avec une archive et le slug de base « projets ».
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
        'name'                  => _x( 'Projets', 'Post type general name', 'up-cpt' ),
        'singular_name'         => _x( 'Projet', 'Post type singular name', 'up-cpt' ),
        'menu_name'             => _x( 'Projets', 'Admin Menu text', 'up-cpt' ),
        'name_admin_bar'        => _x( 'Projet', 'Add New on Toolbar', 'up-cpt' ),
        'add_new'               => __( 'Ajouter', 'up-cpt' ),
        'add_new_item'          => __( 'Ajouter un projet', 'up-cpt' ),
        'edit_item'             => __( 'Modifier le projet', 'up-cpt' ),
        'new_item'              => __( 'Nouveau projet', 'up-cpt' ),
        'view_item'             => __( 'Voir le projet', 'up-cpt' ),
        'view_items'            => __( 'Voir les projets', 'up-cpt' ),
        'search_items'          => __( 'Rechercher des projets', 'up-cpt' ),
        'not_found'             => __( 'Aucun projet trouvé.', 'up-cpt' ),
        'not_found_in_trash'    => __( 'Aucun projet dans la corbeille.', 'up-cpt' ),
        'all_items'             => __( 'Tous les projets', 'up-cpt' ),
        'archives'              => __( 'Archives des projets', 'up-cpt' ),
        'attributes'            => __( 'Attributs du projet', 'up-cpt' ),
    );

    $default_slug = 'projets';
    $slug = apply_filters( 'up_cpt_projet_slug', $default_slug );

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

    $args = apply_filters( 'up_cpt_projet_args', $args );
    $args = apply_filters( 'up_cpt_projet_' . $args['rewrite']['slug'] . '_args', $args );
    $args = apply_filters( 'up_cpt_projet_' . $args['rewrite']['slug'], $args );

    register_post_type( 'projet', $args );
} );
