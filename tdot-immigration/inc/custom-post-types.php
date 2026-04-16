<?php
/**
 * Register Custom Post Types: Service, Location, Team Member.
 *
 * @package tdot-immigration
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function tdot_register_post_types() {

    // Service CPT.
    register_post_type( 'service', array(
        'labels'       => array(
            'name'               => __( 'Services', 'tdot-immigration' ),
            'singular_name'      => __( 'Service', 'tdot-immigration' ),
            'add_new_item'       => __( 'Add New Service', 'tdot-immigration' ),
            'edit_item'          => __( 'Edit Service', 'tdot-immigration' ),
            'all_items'          => __( 'All Services', 'tdot-immigration' ),
            'search_items'       => __( 'Search Services', 'tdot-immigration' ),
            'not_found'          => __( 'No services found.', 'tdot-immigration' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array( 'slug' => 'services' ),
        'menu_icon'    => 'dashicons-clipboard',
        'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
    ) );

    // Location CPT.
    register_post_type( 'location', array(
        'labels'       => array(
            'name'               => __( 'Locations', 'tdot-immigration' ),
            'singular_name'      => __( 'Location', 'tdot-immigration' ),
            'add_new_item'       => __( 'Add New Location', 'tdot-immigration' ),
            'edit_item'          => __( 'Edit Location', 'tdot-immigration' ),
            'all_items'          => __( 'All Locations', 'tdot-immigration' ),
            'search_items'       => __( 'Search Locations', 'tdot-immigration' ),
            'not_found'          => __( 'No locations found.', 'tdot-immigration' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array( 'slug' => 'locations' ),
        'menu_icon'    => 'dashicons-location',
        'supports'     => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest' => true,
    ) );

    // Team Member CPT.
    register_post_type( 'team_member', array(
        'labels'       => array(
            'name'               => __( 'Team Members', 'tdot-immigration' ),
            'singular_name'      => __( 'Team Member', 'tdot-immigration' ),
            'add_new_item'       => __( 'Add New Team Member', 'tdot-immigration' ),
            'edit_item'          => __( 'Edit Team Member', 'tdot-immigration' ),
            'all_items'          => __( 'All Team Members', 'tdot-immigration' ),
            'search_items'       => __( 'Search Team Members', 'tdot-immigration' ),
            'not_found'          => __( 'No team members found.', 'tdot-immigration' ),
        ),
        'public'       => true,
        'has_archive'  => false,
        'rewrite'      => array( 'slug' => 'team' ),
        'menu_icon'    => 'dashicons-groups',
        'supports'     => array( 'title', 'thumbnail' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'tdot_register_post_types' );

/**
 * Flush rewrite rules on theme activation.
 */
function tdot_rewrite_flush() {
    tdot_register_post_types();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'tdot_rewrite_flush' );
