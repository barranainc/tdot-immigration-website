<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#1A1A2E" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <?php tdot_local_business_schema(); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <a class="skip-link" href="#main-content">Skip to content</a>

<?php
$phone      = tdot_option( 'tdot_phone', '416-947-6710' );
$phone_intl = tdot_option( 'tdot_phone_intl', '+14169476710' );
$phone_svg  = '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.42 2 2 0 0 1 3.6 1.25h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.97-.97a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>';
$chevron_sm = '<svg class="nav-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>';
$chevron_mob= '<svg class="mob-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>';
?>

<header class="site-header" data-site-header>
    <div class="container header-shell">

        <a class="brandmark" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?> home">
            <?php if ( has_custom_logo() ) :
                $logo_id  = get_theme_mod( 'custom_logo' );
                $logo_url = wp_get_attachment_image_url( $logo_id, 'full' ); ?>
                <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?> logo" width="540" height="198" />
            <?php else : ?>
                <img src="https://d2xsxph8kpxj0f.cloudfront.net/310519663445981057/PSTjQftXscFTwvxzvYYugT/tdot-logo-header-wordmark-trimmed_344778fe.png" alt="<?php bloginfo( 'name' ); ?> logo" width="540" height="198" />
            <?php endif; ?>
        </a>

        <nav class="site-nav" id="site-menu" aria-label="Primary navigation">
            <ul>
                <!-- Services mega menu -->
                <li class="nav-group nav-group-mega">
                    <button class="nav-trigger" type="button" aria-expanded="false" aria-haspopup="true">
                        Services <?php echo $chevron_sm; ?>
                    </button>
                    <div class="nav-panel nav-panel-mega" role="region" aria-label="Services menu">
                        <div class="mega-col">
                            <p class="nav-col-label">Permanent Residency</p>
                            <ul>
                                <li><a href="<?php echo esc_url( home_url( '/service/express-entry/' ) ); ?>">Express Entry</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/service/provincial-nominee/' ) ); ?>">Provincial Nominee Program</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/service/citizenship/' ) ); ?>">Canadian Citizenship</a></li>
                            </ul>
                            <p class="nav-col-label" style="margin-top:1.25rem;">Business &amp; Investment</p>
                            <ul>
                                <li><a href="<?php echo esc_url( home_url( '/service/business-visa/' ) ); ?>">Business Visa</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/service/investor-visa/' ) ); ?>">Investor Visa</a></li>
                            </ul>
                        </div>
                        <div class="mega-col">
                            <p class="nav-col-label">Temporary Status</p>
                            <ul>
                                <li><a href="<?php echo esc_url( home_url( '/service/study-permit/' ) ); ?>">Study Permit</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/service/work-permit/' ) ); ?>">Work Permit</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/service/visitor-visa/' ) ); ?>">Visitor Visa</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/service/temporary-resident-permit/' ) ); ?>">Temporary Resident Permit</a></li>
                            </ul>
                            <p class="nav-col-label" style="margin-top:1.25rem;">Family &amp; Legal</p>
                            <ul>
                                <li><a href="<?php echo esc_url( home_url( '/service/family-sponsorship/' ) ); ?>">Family Sponsorship</a></li>
                                <li><a href="<?php echo esc_url( home_url( '/service/inadmissibility/' ) ); ?>">Inadmissibility &amp; Refusals</a></li>
                            </ul>
                        </div>
                        <div class="mega-cta-col">
                            <div class="mega-cta-card">
                                <p class="mega-cta-label">Not sure where to start?</p>
                                <p>Our consultants assess your eligibility and recommend the right pathway &mdash; free of charge.</p>
                                <a class="button button-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Free Consultation</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li>
                <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a></li>
                <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
            </ul>
        </nav>

        <div class="header-cta">
            <a class="header-phone" href="tel:<?php echo esc_attr( $phone_intl ); ?>" aria-label="Call TDOT Immigration">
                <?php echo $phone_svg; ?>
                <?php echo esc_html( $phone ); ?>
            </a>
            <a class="button button-primary btn-magnetic" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Book Consultation</a>
        </div>

        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-overlay" aria-label="Open navigation menu" data-menu-toggle>
            <span></span><span></span><span></span>
        </button>

    </div>
</header>

<!-- Full-screen mobile overlay -->
<div class="mobile-overlay" id="mobile-overlay" data-mobile-overlay aria-hidden="true" role="dialog" aria-modal="true" aria-label="Navigation menu">
    <div class="mobile-overlay-header">
        <a class="brandmark" href="<?php echo esc_url( home_url( '/' ) ); ?>" tabindex="-1" aria-hidden="true">
            <?php
            $footer_logo = tdot_option( 'tdot_footer_logo' );
            if ( $footer_logo ) : ?>
                <img src="<?php echo esc_url( $footer_logo ); ?>" alt="" width="180" height="66" />
            <?php else : ?>
                <img src="https://d2xsxph8kpxj0f.cloudfront.net/310519663445981057/PSTjQftXscFTwvxzvYYugT/tdot-logo-footer-white-trimmed_3ffe498c.png" alt="" width="180" height="66" />
            <?php endif; ?>
        </a>
        <button class="mobile-close" type="button" aria-label="Close navigation menu" data-mobile-close>
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
    </div>
    <nav class="mobile-nav" aria-label="Mobile navigation">
        <ul>
            <li>
                <button class="mobile-accordion-btn" type="button" aria-expanded="false" data-mobile-toggle="mob-services">
                    Services <?php echo $chevron_mob; ?>
                </button>
                <ul class="mobile-sub" id="mob-services">
                    <li class="mob-sub-label">Permanent Residency</li>
                    <li><a href="<?php echo esc_url( home_url( '/service/express-entry/' ) ); ?>">Express Entry</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/service/provincial-nominee/' ) ); ?>">Provincial Nominee Program</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/service/citizenship/' ) ); ?>">Canadian Citizenship</a></li>
                    <li class="mob-sub-label">Temporary Status</li>
                    <li><a href="<?php echo esc_url( home_url( '/service/study-permit/' ) ); ?>">Study Permit</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/service/work-permit/' ) ); ?>">Work Permit</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/service/visitor-visa/' ) ); ?>">Visitor Visa</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/service/temporary-resident-permit/' ) ); ?>">Temporary Resident Permit</a></li>
                    <li class="mob-sub-label">Business &amp; Investment</li>
                    <li><a href="<?php echo esc_url( home_url( '/service/business-visa/' ) ); ?>">Business Visa</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/service/investor-visa/' ) ); ?>">Investor Visa</a></li>
                    <li class="mob-sub-label">Family &amp; Legal</li>
                    <li><a href="<?php echo esc_url( home_url( '/service/family-sponsorship/' ) ); ?>">Family Sponsorship</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/service/inadmissibility/' ) ); ?>">Inadmissibility &amp; Refusals</a></li>
                </ul>
            </li>
            <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li>
            <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a></li>
            <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
        </ul>
    </nav>
    <div class="mobile-overlay-footer">
        <a class="button button-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Book Free Consultation</a>
        <a class="mobile-phone-link" href="tel:<?php echo esc_attr( $phone_intl ); ?>">
            <?php echo $phone_svg; ?>
            <?php echo esc_html( $phone ); ?>
        </a>
    </div>
</div>

    <main id="main-content">
