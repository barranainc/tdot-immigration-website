<?php
/**
 * JSON-LD Schema Markup Helpers.
 *
 * @package tdot-immigration
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Output LocalBusiness schema.
 */
function tdot_local_business_schema() {
    $phone   = tdot_option( 'tdot_phone_intl', '+14169476710' );
    $email   = tdot_option( 'tdot_email', 'info@tdotimm.com' );
    $address = tdot_option( 'tdot_address', '1060 Sheppard Ave W, Unit 4, Toronto, ON M3J 0G7' );

    $schema = array(
        '@context' => 'https://schema.org',
        '@type'    => array( 'LocalBusiness', 'ProfessionalService' ),
        'name'     => 'TDOT Immigration',
        'image'    => TDOT_URI . '/screenshot.png',
        'url'      => home_url( '/' ),
        'telephone'=> $phone,
        'email'    => $email,
        'address'  => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => '1060 Sheppard Ave W, Unit 4',
            'addressLocality' => 'Toronto',
            'addressRegion'   => 'ON',
            'postalCode'      => 'M3J 0G7',
            'addressCountry'  => 'CA',
        ),
        'geo' => array(
            '@type'     => 'GeoCoordinates',
            'latitude'  => 43.7532,
            'longitude' => -79.4824,
        ),
        'openingHoursSpecification' => array( array(
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
            'opens'     => '09:00',
            'closes'    => '18:00',
        ) ),
        'sameAs'     => array_filter( array(
            tdot_option( 'tdot_instagram' ),
            tdot_option( 'tdot_facebook' ),
            tdot_option( 'tdot_linkedin' ),
            tdot_option( 'tdot_twitter' ),
            tdot_option( 'tdot_tiktok' ),
        ) ),
        'priceRange' => '$$',
        'areaServed' => array( 'Toronto', 'North York', 'Mississauga', 'Brampton', 'Vaughan', 'Greater Toronto Area' ),
    );

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}

/**
 * Output BreadcrumbList schema.
 */
function tdot_breadcrumb_schema( $items ) {
    $list = array();
    foreach ( $items as $i => $item ) {
        $list[] = array(
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $item['name'],
            'item'     => $item['url'],
        );
    }

    $schema = array(
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => $list,
    );

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}

/**
 * Output Service schema for single service pages.
 */
function tdot_service_schema() {
    if ( ! is_singular( 'service' ) ) {
        return;
    }

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Service',
        'name'        => get_the_title(),
        'description' => get_the_excerpt(),
        'provider'    => array(
            '@type'     => 'ProfessionalService',
            'name'      => 'TDOT Immigration',
            'telephone' => tdot_option( 'tdot_phone_intl', '+14169476710' ),
            'email'     => tdot_option( 'tdot_email', 'info@tdotimm.com' ),
            'url'       => home_url( '/' ),
            'address'   => array(
                '@type'           => 'PostalAddress',
                'streetAddress'   => '1060 Sheppard Ave W, Unit 4',
                'addressLocality' => 'Toronto',
                'addressRegion'   => 'ON',
                'postalCode'      => 'M3J 0G7',
                'addressCountry'  => 'CA',
            ),
        ),
        'areaServed' => 'Canada',
        'url'        => get_permalink(),
    );

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}

/**
 * Output FAQPage schema from ACF repeater.
 */
function tdot_faq_schema() {
    if ( ! function_exists( 'get_field' ) ) {
        return;
    }

    $faqs = get_field( 'faq_items' );
    if ( empty( $faqs ) ) {
        return;
    }

    $entities = array();
    foreach ( $faqs as $faq ) {
        $entities[] = array(
            '@type'          => 'Question',
            'name'           => $faq['question'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text'  => $faq['answer'],
            ),
        );
    }

    $schema = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $entities,
    );

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}

/**
 * Output Article schema for blog posts.
 */
function tdot_article_schema() {
    if ( ! is_singular( 'post' ) ) {
        return;
    }

    $schema = array(
        '@context'         => 'https://schema.org',
        '@type'            => 'Article',
        'headline'         => get_the_title(),
        'description'      => get_the_excerpt(),
        'image'            => get_the_post_thumbnail_url( null, 'full' ) ?: tdot_option( 'tdot_og_image' ),
        'author'           => array( '@type' => 'Organization', 'name' => 'TDOT Immigration' ),
        'publisher'        => array(
            '@type' => 'Organization',
            'name'  => 'TDOT Immigration',
            'logo'  => array( '@type' => 'ImageObject', 'url' => TDOT_URI . '/screenshot.png' ),
        ),
        'datePublished'    => get_the_date( 'c' ),
        'dateModified'     => get_the_modified_date( 'c' ),
        'mainEntityOfPage' => get_permalink(),
        'url'              => get_permalink(),
    );

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
