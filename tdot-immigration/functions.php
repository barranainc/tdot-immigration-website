<?php
/**
 * TDOT Immigration Theme Functions
 *
 * @package tdot-immigration
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'TDOT_VERSION', '1.0.0' );
define( 'TDOT_DIR', get_template_directory() );
define( 'TDOT_URI', get_template_directory_uri() );

// Include theme modules.
require_once TDOT_DIR . '/inc/theme-setup.php';
require_once TDOT_DIR . '/inc/custom-post-types.php';
require_once TDOT_DIR . '/inc/acf-fields.php';
require_once TDOT_DIR . '/inc/schema-markup.php';

/**
 * Enqueue styles and scripts.
 */
function tdot_enqueue_assets() {
    // Google Fonts.
    wp_enqueue_style(
        'tdot-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@400;500;700&family=Lora:ital@0;1&display=swap',
        array(),
        null
    );

    // Theme stylesheet.
    wp_enqueue_style( 'tdot-style', get_stylesheet_uri(), array( 'tdot-google-fonts' ), TDOT_VERSION );

    // Theme JavaScript.
    wp_enqueue_script( 'tdot-main', TDOT_URI . '/js/main.js', array(), TDOT_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'tdot_enqueue_assets' );

/**
 * Custom Nav Walker for dropdown menus.
 */
class TDOT_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<div class="nav-panel"><ul>';
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul></div>';
    }

    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item    = $data_object;
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        // Check if this item has children.
        $has_children = in_array( 'menu-item-has-children', $classes, true );

        if ( $depth === 0 && $has_children ) {
            $output .= '<li class="nav-group">';
            $output .= '<button class="nav-trigger" type="button" aria-expanded="false">';
            $output .= esc_html( $item->title );
            $output .= '</button>';
        } else {
            $output .= '<li>';
            $atts = array(
                'href'  => ! empty( $item->url ) ? $item->url : '',
                'title' => ! empty( $item->attr_title ) ? $item->attr_title : '',
            );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
                }
            }

            $output .= '<a' . $attributes . '>' . esc_html( $item->title ) . '</a>';
        }
    }

    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

/**
 * Get ACF option field with fallback.
 */
function tdot_option( $field, $default = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $value = get_field( $field, 'option' );
        return $value ? $value : $default;
    }
    return $default;
}
