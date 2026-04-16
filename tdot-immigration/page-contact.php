<?php
/**
 * Template Name: Contact Page
 *
 * @package tdot-immigration
 */

get_header();

tdot_breadcrumb_schema( array(
    array( 'name' => 'Home', 'url' => home_url( '/' ) ),
    array( 'name' => 'Contact', 'url' => get_permalink() ),
) );

$formspree_id = tdot_option( 'tdot_formspree_id' );
$phone        = tdot_option( 'tdot_phone', '416-947-6710' );
$phone_intl   = tdot_option( 'tdot_phone_intl', '+14169476710' );
$email        = tdot_option( 'tdot_email', 'info@tdotimm.com' );
$address      = tdot_option( 'tdot_address', '1060 Sheppard Ave W, Unit 4, Toronto, ON M3J 0G7' );
$wa           = tdot_option( 'tdot_whatsapp', '14169476710' );
$hours        = tdot_option( 'tdot_hours', 'Mon-Fri, 9AM-6PM EST' );
$maps_url     = tdot_option( 'tdot_maps_url', 'https://www.google.com/maps?q=1060+Sheppard+Ave+W+Unit+4+Toronto+ON+M3J+0G7&output=embed' );
?>

<nav class="breadcrumbs container" aria-label="Breadcrumb">
    <ol><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li><li aria-current="page">Contact</li></ol>
</nav>

<section class="page-hero page-hero-light">
    <div class="container page-hero-inner page-hero-center">
        <p class="section-label">CONTACT</p>
        <h1>Book Your Free Consultation</h1>
        <p>Tell TDOT what immigration issue you are facing and the team will respond within one business day.</p>
    </div>
</section>

<section class="section">
    <div class="container contact-layout">
        <div class="contact-form-card">
            <h2>Send your request</h2>
            <form class="contact-form" data-contact-form action="https://formspree.io/f/<?php echo esc_attr( $formspree_id ?: 'YOUR_FORMSPREE_ID' ); ?>" method="POST">
                <label>Full Name<input type="text" name="name" required /></label>
                <label>Email<input type="email" name="email" required /></label>
                <label>Phone<input type="tel" name="phone" required /></label>
                <label>Immigration Interest
                    <select name="interest" required>
                        <option value="">Select a service</option>
                        <?php
                        $services = new WP_Query( array(
                            'post_type'      => 'service',
                            'posts_per_page' => -1,
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC',
                        ) );
                        while ( $services->have_posts() ) :
                            $services->the_post();
                        ?>
                        <option><?php the_title(); ?></option>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </select>
                </label>
                <label>Message<textarea name="message" rows="6" required></textarea></label>
                <button class="button button-primary button-block" type="submit">Send My Request</button>
                <p class="form-note">We respond within 1 business day. All consultations are strictly confidential.</p>
                <p class="form-note" style="margin-top:0.5rem;">Prefer to reach us directly? Call <a href="tel:<?php echo esc_attr( $phone_intl ); ?>"><?php echo esc_html( $phone ); ?></a> or email <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
                <p class="form-feedback" data-form-feedback hidden>Thank you — your message has been sent. We will be in touch within 1 business day.</p>
            </form>
        </div>
        <aside class="contact-sidebar">
            <div class="aside-card">
                <h2>Visit or call</h2>
                <p>&#128205; <?php echo esc_html( $address ); ?></p>
                <p>&#128222; <a href="tel:<?php echo esc_attr( $phone_intl ); ?>"><?php echo esc_html( $phone ); ?></a></p>
                <p>&#128172; <a href="https://wa.me/<?php echo esc_attr( $wa ); ?>" target="_blank" rel="noopener noreferrer">WhatsApp available for international clients</a></p>
                <p>&#128231; <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
                <p><?php echo esc_html( $hours ); ?></p>
                <p>Services available in English and French | Services disponibles en anglais et en fran&ccedil;ais</p>
            </div>
            <?php if ( $maps_url ) : ?>
            <div class="map-frame">
                <iframe title="Map showing TDOT Immigration office location" src="<?php echo esc_url( $maps_url ); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <?php endif; ?>
            <div class="aside-card aside-card-muted social-stack">
                <?php
                $social_links = array(
                    'tdot_instagram' => 'Instagram',
                    'tdot_facebook'  => 'Facebook',
                    'tdot_linkedin'  => 'LinkedIn',
                    'tdot_twitter'   => 'Twitter/X',
                    'tdot_tiktok'    => 'TikTok',
                );
                foreach ( $social_links as $field => $label ) :
                    $url = tdot_option( $field );
                    if ( $url ) : ?>
                        <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
                    <?php endif;
                endforeach; ?>
            </div>
        </aside>
    </div>
</section>

<?php get_footer(); ?>
