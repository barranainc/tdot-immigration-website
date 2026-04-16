<?php
/**
 * Theme Setup: supports, menus, image sizes, widget areas.
 *
 * @package tdot-immigration
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function tdot_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'height'      => 198,
        'width'       => 540,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Register navigation menus.
    register_nav_menus( array(
        'primary'           => __( 'Primary Navigation', 'tdot-immigration' ),
        'footer-services'   => __( 'Footer Services', 'tdot-immigration' ),
        'footer-company'    => __( 'Footer Company', 'tdot-immigration' ),
        'footer-locations'  => __( 'Footer Locations', 'tdot-immigration' ),
    ) );

    // Custom image sizes.
    add_image_size( 'service-card', 400, 300, true );
    add_image_size( 'team-portrait', 280, 280, true );
    add_image_size( 'blog-card', 600, 400, true );
    add_image_size( 'hero', 1920, 800, true );
}
add_action( 'after_setup_theme', 'tdot_theme_setup' );

/**
 * Register widget areas.
 */
function tdot_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'tdot-immigration' ),
        'id'            => 'blog-sidebar',
        'before_widget' => '<div class="aside-card">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'tdot_widgets_init' );
