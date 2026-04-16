    </main>

<?php
$phone      = tdot_option( 'tdot_phone', '416-947-6710' );
$phone_intl = tdot_option( 'tdot_phone_intl', '+14169476710' );
$phone_svg  = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.42 2 2 0 0 1 3.6 1.25h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.97-.97a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>';
?>

<!-- Pre-footer CTA Strip -->
<section class="pre-footer" aria-label="Call to action">
    <div class="container pre-footer-inner">
        <div class="pre-footer-copy">
            <h2>Ready to start your Canadian journey?</h2>
            <p>Our CICC-licensed consultants are available for a free, no-obligation assessment of your case.</p>
        </div>
        <div class="pre-footer-actions">
            <a class="button button-light btn-magnetic" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Book Free Consultation</a>
            <a class="pre-footer-phone" href="tel:<?php echo esc_attr( $phone_intl ); ?>">
                <?php echo $phone_svg; ?>
                <?php echo esc_html( $phone ); ?>
            </a>
        </div>
    </div>
</section>

<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <div class="footer-brand">
                <?php
                $footer_logo = tdot_option( 'tdot_footer_logo' );
                if ( $footer_logo ) : ?>
                    <img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php bloginfo( 'name' ); ?> logo" width="220" height="81" loading="lazy" />
                <?php else : ?>
                    <img src="https://d2xsxph8kpxj0f.cloudfront.net/310519663445981057/PSTjQftXscFTwvxzvYYugT/tdot-logo-footer-white-trimmed_3ffe498c.png" alt="<?php bloginfo( 'name' ); ?> logo" width="220" height="81" loading="lazy" />
                <?php endif; ?>
                <p>Canada's trusted immigration consultants. CICC licensed. IRB authorized.</p>
            </div>
            <div class="footer-badges">
                <span class="footer-badge">CICC Licensed</span>
                <span class="footer-badge">IRB Authorized</span>
                <span class="footer-badge">10,000+ Applications</span>
            </div>
        </div>
        <div>
            <h3>Services</h3>
            <?php
            if ( has_nav_menu( 'footer-services' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'footer-services',
                    'container'      => false,
                    'depth'          => 1,
                ) );
            }
            ?>
        </div>
        <div>
            <h3>Company</h3>
            <?php
            if ( has_nav_menu( 'footer-company' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'footer-company',
                    'container'      => false,
                    'depth'          => 1,
                ) );
            }
            ?>
        </div>
        <div>
            <h3>Get in Touch</h3>
            <ul class="footer-contact-list">
                <?php $address = tdot_option( 'tdot_address', '1060 Sheppard Ave W, Unit 4, Toronto, ON M3J 0G7' ); ?>
                <li>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <a href="https://maps.google.com/?q=<?php echo esc_attr( urlencode( $address ) ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $address ); ?></a>
                </li>
                <li>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.42 2 2 0 0 1 3.6 1.25h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.97-.97a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <a href="tel:<?php echo esc_attr( $phone_intl ); ?>"><?php echo esc_html( $phone ); ?></a>
                </li>
                <?php $email = tdot_option( 'tdot_email', 'info@tdotimm.com' ); ?>
                <li>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                </li>
                <li>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span><?php echo esc_html( tdot_option( 'tdot_hours', 'Mon–Fri, 9AM–6PM EST' ) ); ?></span>
                </li>
            </ul>
            <div class="social-row social-row-footer" aria-label="<?php bloginfo( 'name' ); ?> on social media">
                <?php
                $socials = array(
                    'instagram' => array( 'field' => 'tdot_instagram', 'label' => 'Instagram', 'svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>' ),
                    'facebook'  => array( 'field' => 'tdot_facebook', 'label' => 'Facebook', 'svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>' ),
                    'linkedin'  => array( 'field' => 'tdot_linkedin', 'label' => 'LinkedIn', 'svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>' ),
                    'twitter'   => array( 'field' => 'tdot_twitter', 'label' => 'Twitter/X', 'svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.736-8.845L1.254 2.25H8.08l4.259 5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>' ),
                    'tiktok'    => array( 'field' => 'tdot_tiktok', 'label' => 'TikTok', 'svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V9.05a8.16 8.16 0 0 0 4.77 1.52V7.12a4.85 4.85 0 0 1-1-.43z"/></svg>' ),
                );
                foreach ( $socials as $key => $social ) :
                    $url = tdot_option( $social['field'] );
                    if ( $url ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php bloginfo( 'name' ); ?> on <?php echo esc_attr( $social['label'] ); ?>">
                        <?php echo $social['svg']; // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    </a>
                    <?php endif;
                endforeach; ?>
            </div>
        </div>
    </div>
    <div class="footer-bar">
        <div class="container footer-bar-inner">
            <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> TDOT Immigration Services. All rights reserved. CICC Licensed Member. | Services en fran&ccedil;ais disponibles</p>
        </div>
    </div>
</footer>

<?php $wa = tdot_option( 'tdot_whatsapp', '14169476710' ); ?>
<a class="whatsapp-float" href="https://wa.me/<?php echo esc_attr( $wa ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Chat with TDOT Immigration on WhatsApp">
    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.553 4.122 1.524 5.855L0 24l6.29-1.501A11.934 11.934 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.006-1.371l-.36-.214-3.732.891.924-3.62-.235-.372A9.778 9.778 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182 17.43 2.182 21.818 6.57 21.818 12c0 5.43-4.388 9.818-9.818 9.818z"/>
    </svg>
</a>

<?php wp_footer(); ?>
</body>
</html>
