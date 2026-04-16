<?php
/**
 * ACF Field Groups — registered in PHP so they ship with the theme.
 *
 * @package tdot-immigration
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register ACF Options Page for global site settings.
 */
function tdot_acf_options_page() {
    if ( ! function_exists( 'acf_add_options_page' ) ) {
        return;
    }
    acf_add_options_page( array(
        'page_title' => 'TDOT Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'tdot-theme-options',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'icon_url'   => 'dashicons-admin-generic',
        'position'   => 59,
    ) );
}
add_action( 'acf/init', 'tdot_acf_options_page' );

/**
 * Register all field groups.
 */
function tdot_register_acf_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    // ─── Theme Options (Global) ───────────────────────────────────
    acf_add_local_field_group( array(
        'key'      => 'group_tdot_options',
        'title'    => 'TDOT Global Settings',
        'fields'   => array(
            array( 'key' => 'field_phone', 'label' => 'Phone Number', 'name' => 'tdot_phone', 'type' => 'text', 'default_value' => '416-947-6710' ),
            array( 'key' => 'field_phone_intl', 'label' => 'Phone (International)', 'name' => 'tdot_phone_intl', 'type' => 'text', 'default_value' => '+14169476710' ),
            array( 'key' => 'field_whatsapp', 'label' => 'WhatsApp Number', 'name' => 'tdot_whatsapp', 'type' => 'text', 'default_value' => '14169476710' ),
            array( 'key' => 'field_email', 'label' => 'Email', 'name' => 'tdot_email', 'type' => 'email', 'default_value' => 'info@tdotimm.com' ),
            array( 'key' => 'field_address', 'label' => 'Address', 'name' => 'tdot_address', 'type' => 'text', 'default_value' => '1060 Sheppard Ave W, Unit 4, Toronto, ON M3J 0G7' ),
            array( 'key' => 'field_hours', 'label' => 'Office Hours', 'name' => 'tdot_hours', 'type' => 'text', 'default_value' => 'Mon-Fri, 9AM-6PM EST' ),
            array( 'key' => 'field_maps_url', 'label' => 'Google Maps Embed URL', 'name' => 'tdot_maps_url', 'type' => 'url' ),
            array( 'key' => 'field_formspree_id', 'label' => 'Formspree Form ID', 'name' => 'tdot_formspree_id', 'type' => 'text', 'instructions' => 'Your Formspree endpoint ID (e.g. xpzgkwqr)' ),
            array( 'key' => 'field_social_instagram', 'label' => 'Instagram URL', 'name' => 'tdot_instagram', 'type' => 'url' ),
            array( 'key' => 'field_social_facebook', 'label' => 'Facebook URL', 'name' => 'tdot_facebook', 'type' => 'url' ),
            array( 'key' => 'field_social_linkedin', 'label' => 'LinkedIn URL', 'name' => 'tdot_linkedin', 'type' => 'url' ),
            array( 'key' => 'field_social_twitter', 'label' => 'Twitter/X URL', 'name' => 'tdot_twitter', 'type' => 'url' ),
            array( 'key' => 'field_social_tiktok', 'label' => 'TikTok URL', 'name' => 'tdot_tiktok', 'type' => 'url' ),
            array( 'key' => 'field_footer_logo', 'label' => 'Footer Logo (White)', 'name' => 'tdot_footer_logo', 'type' => 'image', 'return_format' => 'url' ),
            array( 'key' => 'field_og_image', 'label' => 'Default OG Image', 'name' => 'tdot_og_image', 'type' => 'image', 'return_format' => 'url' ),
        ),
        'location' => array( array( array( 'param' => 'options_page', 'operator' => '==', 'value' => 'tdot-theme-options' ) ) ),
    ) );

    // ─── Homepage Fields ──────────────────────────────────────────
    acf_add_local_field_group( array(
        'key'      => 'group_homepage',
        'title'    => 'Homepage Settings',
        'fields'   => array(
            // Hero.
            array( 'key' => 'field_hero_eyebrow', 'label' => 'Hero Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text', 'default_value' => 'CICC Licensed · IRB Authorized' ),
            array( 'key' => 'field_hero_title', 'label' => 'Hero Title', 'name' => 'hero_title', 'type' => 'text', 'default_value' => 'Your Path to Canada, Guided by Experts' ),
            array( 'key' => 'field_hero_text', 'label' => 'Hero Text', 'name' => 'hero_text', 'type' => 'textarea' ),
            array( 'key' => 'field_hero_image', 'label' => 'Hero Background Image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'url' ),
            // Trust badges.
            array( 'key' => 'field_trust_badges', 'label' => 'Trust Badges', 'name' => 'trust_badges', 'type' => 'repeater', 'sub_fields' => array(
                array( 'key' => 'field_badge_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
                array( 'key' => 'field_badge_desc', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'rows' => 2 ),
            ) ),
            // Leadership.
            array( 'key' => 'field_leader_name', 'label' => 'Leader Name', 'name' => 'leader_name', 'type' => 'text', 'default_value' => 'Shafoli Kapur' ),
            array( 'key' => 'field_leader_title_text', 'label' => 'Leadership Heading', 'name' => 'leader_heading', 'type' => 'text' ),
            array( 'key' => 'field_leader_bio', 'label' => 'Leadership Bio', 'name' => 'leader_bio', 'type' => 'textarea' ),
            array( 'key' => 'field_leader_photo', 'label' => 'Leader Photo', 'name' => 'leader_photo', 'type' => 'image', 'return_format' => 'array' ),
            array( 'key' => 'field_leader_creds', 'label' => 'Credentials', 'name' => 'leader_credentials', 'type' => 'repeater', 'sub_fields' => array(
                array( 'key' => 'field_cred_text', 'label' => 'Credential', 'name' => 'credential', 'type' => 'text' ),
            ) ),
            // How it Works.
            array( 'key' => 'field_steps', 'label' => 'How It Works Steps', 'name' => 'how_it_works', 'type' => 'repeater', 'sub_fields' => array(
                array( 'key' => 'field_step_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
                array( 'key' => 'field_step_desc', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'rows' => 2 ),
            ) ),
            // Testimonials.
            array( 'key' => 'field_testimonials', 'label' => 'Testimonials', 'name' => 'testimonials', 'type' => 'repeater', 'sub_fields' => array(
                array( 'key' => 'field_test_quote', 'label' => 'Quote', 'name' => 'quote', 'type' => 'textarea', 'rows' => 3 ),
                array( 'key' => 'field_test_name', 'label' => 'Attribution', 'name' => 'attribution', 'type' => 'text' ),
            ) ),
            // Stats.
            array( 'key' => 'field_stats', 'label' => 'Stats', 'name' => 'stats', 'type' => 'repeater', 'sub_fields' => array(
                array( 'key' => 'field_stat_number', 'label' => 'Number', 'name' => 'number', 'type' => 'text' ),
                array( 'key' => 'field_stat_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
            ) ),
            // Banner CTA.
            array( 'key' => 'field_banner_heading', 'label' => 'Banner CTA Heading', 'name' => 'banner_heading', 'type' => 'text' ),
            array( 'key' => 'field_banner_text', 'label' => 'Banner CTA Text', 'name' => 'banner_text', 'type' => 'text' ),
        ),
        'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php' ) ) ),
    ) );

    // ─── Service Fields ───────────────────────────────────────────
    acf_add_local_field_group( array(
        'key'      => 'group_service',
        'title'    => 'Service Details',
        'fields'   => array(
            array( 'key' => 'field_svc_eyebrow', 'label' => 'Eyebrow Label', 'name' => 'service_eyebrow', 'type' => 'text', 'default_value' => 'SERVICE' ),
            array( 'key' => 'field_svc_icon', 'label' => 'Service Icon SVG', 'name' => 'service_icon_svg', 'type' => 'textarea', 'rows' => 3, 'instructions' => 'Paste inline SVG markup for the service card icon.' ),
            array( 'key' => 'field_svc_short_desc', 'label' => 'Card Description', 'name' => 'service_card_description', 'type' => 'text', 'instructions' => 'Short description for service cards on homepage/archive.' ),
            array( 'key' => 'field_svc_fact_panel', 'label' => 'Fact Panel Items', 'name' => 'fact_panel', 'type' => 'repeater', 'sub_fields' => array(
                array( 'key' => 'field_fact_item', 'label' => 'Item', 'name' => 'item', 'type' => 'text' ),
            ) ),
            array( 'key' => 'field_svc_fact_title', 'label' => 'Fact Panel Title', 'name' => 'fact_panel_title', 'type' => 'text', 'default_value' => 'What TDOT focuses on' ),
            array( 'key' => 'field_svc_faq', 'label' => 'FAQ Items', 'name' => 'faq_items', 'type' => 'repeater', 'sub_fields' => array(
                array( 'key' => 'field_faq_q', 'label' => 'Question', 'name' => 'question', 'type' => 'text' ),
                array( 'key' => 'field_faq_a', 'label' => 'Answer', 'name' => 'answer', 'type' => 'textarea' ),
            ) ),
            array( 'key' => 'field_svc_sidebar_heading', 'label' => 'Sidebar Heading', 'name' => 'sidebar_heading', 'type' => 'text' ),
            array( 'key' => 'field_svc_sidebar_text', 'label' => 'Sidebar Text', 'name' => 'sidebar_text', 'type' => 'textarea' ),
            array( 'key' => 'field_svc_banner_heading', 'label' => 'Banner CTA Heading', 'name' => 'banner_heading', 'type' => 'text' ),
            array( 'key' => 'field_svc_banner_text', 'label' => 'Banner CTA Text', 'name' => 'banner_text', 'type' => 'text' ),
            array( 'key' => 'field_svc_banner_btn', 'label' => 'Banner CTA Button Text', 'name' => 'banner_button_text', 'type' => 'text', 'default_value' => 'Book Consultation' ),
        ),
        'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'service' ) ) ),
    ) );

    // ─── Location Fields ──────────────────────────────────────────
    acf_add_local_field_group( array(
        'key'      => 'group_location',
        'title'    => 'Location Details',
        'fields'   => array(
            array( 'key' => 'field_loc_subtitle', 'label' => 'Hero Subtitle', 'name' => 'location_subtitle', 'type' => 'textarea', 'rows' => 2 ),
            array( 'key' => 'field_loc_services', 'label' => 'Popular Services', 'name' => 'popular_services', 'type' => 'relationship', 'post_type' => array( 'service' ), 'max' => 4, 'return_format' => 'object' ),
            array( 'key' => 'field_loc_banner_heading', 'label' => 'Banner Heading', 'name' => 'banner_heading', 'type' => 'text' ),
            array( 'key' => 'field_loc_banner_text', 'label' => 'Banner Text', 'name' => 'banner_text', 'type' => 'text' ),
        ),
        'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'location' ) ) ),
    ) );

    // ─── Team Member Fields ───────────────────────────────────────
    acf_add_local_field_group( array(
        'key'      => 'group_team',
        'title'    => 'Team Member Details',
        'fields'   => array(
            array( 'key' => 'field_tm_position', 'label' => 'Position / Title', 'name' => 'position', 'type' => 'text' ),
            array( 'key' => 'field_tm_bio', 'label' => 'Bio', 'name' => 'bio', 'type' => 'textarea' ),
            array( 'key' => 'field_tm_credentials', 'label' => 'Credentials', 'name' => 'credentials', 'type' => 'text' ),
            array( 'key' => 'field_tm_is_lead', 'label' => 'Is Lead?', 'name' => 'is_lead', 'type' => 'true_false', 'default_value' => 0 ),
            array( 'key' => 'field_tm_is_placeholder', 'label' => 'Is Placeholder?', 'name' => 'is_placeholder', 'type' => 'true_false', 'default_value' => 0, 'instructions' => 'Mark future/placeholder team members.' ),
        ),
        'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'team_member' ) ) ),
    ) );
}
add_action( 'acf/init', 'tdot_register_acf_fields' );
