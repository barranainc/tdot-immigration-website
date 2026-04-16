<?php
/**
 * Template Name: Homepage
 * Homepage template — hero, trust ticker, editorial service list, leadership,
 * process timeline, testimonials, stats, banner CTA.
 *
 * @package tdot-immigration
 */

get_header();

// ACF fields (with fallbacks).
$eyebrow    = get_field( 'hero_eyebrow' ) ?: 'CICC Licensed &middot; IRB Authorized';
$hero_title = get_field( 'hero_title' )   ?: 'Your Path to Canada, Guided by Experts';
$hero_text  = get_field( 'hero_text' )    ?: 'Toronto\'s trusted CICC-licensed immigration consultants. From Express Entry to family sponsorship — we handle every step so you don\'t have to.';
$hero_img   = get_field( 'hero_image' )   ?: 'https://d2xsxph8kpxj0f.cloudfront.net/310519663445981057/PSTjQftXscFTwvxzvYYugT/tdot-hero-toronto-editorial-SxffoHyWTGHjbZmEL3xVvY.webp';
$phone      = tdot_option( 'tdot_phone', '416-947-6710' );
$phone_intl = tdot_option( 'tdot_phone_intl', '+14169476710' );
?>

<!-- ══ HERO ══════════════════════════════════════════════════════ -->
<section class="hero">
    <div class="hero-media">
        <img src="<?php echo esc_url( is_array( $hero_img ) ? $hero_img['url'] : $hero_img ); ?>"
             alt="Toronto skyline representing TDOT Immigration" width="1600" height="900" />
    </div>
    <div class="hero-animated-overlay" aria-hidden="true"></div>
    <div class="container hero-content">
        <div class="hero-copy">
            <span class="eyebrow-pill"><?php echo wp_kses_post( $eyebrow ); ?></span>
            <h1><?php echo esc_html( $hero_title ); ?></h1>
            <?php if ( $hero_text ) : ?>
                <p class="hero-lead"><?php echo esc_html( $hero_text ); ?></p>
            <?php endif; ?>
            <div class="button-row">
                <a class="button button-primary btn-magnetic" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Book Free Consultation</a>
                <a class="button button-secondary" href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ?: home_url( '/services/' ) ); ?>">Our Services</a>
            </div>
            <div class="hero-trust-strip">
                <span>&#9733;&#9733;&#9733;&#9733;&#9733; 500+ Cases</span>
                <span>CICC Licensed</span>
                <span>IRB Authorized</span>
                <span>10,000+ Applications</span>
            </div>
        </div>
    </div>
    <div class="hero-badge hero-badge--top" aria-hidden="true">
        <strong>95%</strong>
        <span>Approval Rate</span>
    </div>
    <div class="hero-badge hero-badge--bottom" aria-hidden="true">
        <strong>40+</strong>
        <span>Countries Served</span>
    </div>
</section>

<!-- ══ TRUST TICKER ══════════════════════════════════════════════ -->
<div class="ticker-wrap" aria-hidden="true">
    <div class="ticker-track">
        <?php
        $ticker_items = array(
            'CICC Licensed Consultants',
            'IRB Authorized Representatives',
            '10,000+ Applications Processed',
            '500+ Five-Star Client Reviews',
            'Toronto-Based, Canada-Wide Service',
            '40+ Countries Represented',
            '95% Approval Rate',
            'English &amp; French Services Available',
        );
        $check_svg = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>';
        // Output two full sets for seamless loop.
        for ( $pass = 0; $pass < 2; $pass++ ) :
            foreach ( $ticker_items as $item ) :
        ?>
        <span class="ticker-item"><?php echo $check_svg; ?><?php echo wp_kses_post( $item ); ?></span>
        <span class="ticker-sep"></span>
        <?php endforeach; endfor; ?>
    </div>
</div>

<!-- ══ SERVICES ══════════════════════════════════════════════════ -->
<section class="section">
    <div class="container">
        <p class="section-label" data-anim="fade">OUR SERVICES</p>
        <div class="split-heading" style="margin-bottom:2.5rem;">
            <div data-anim="left"><h2>Every Immigration Pathway. One Trusted Team.</h2></div>
            <p data-anim="right" data-delay="100">Whether it's a study visa, work permit, investor pathway, or family reunification — we handle every case with precision.</p>
        </div>

        <div class="service-list" data-stagger>
        <?php
        $services = new WP_Query( array(
            'post_type'      => 'service',
            'posts_per_page' => 8,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ) );
        $svc_num = 1;
        $arrow_svg = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';

        while ( $services->have_posts() ) :
            $services->the_post();
            $card_desc = get_field( 'service_card_description' ) ?: wp_trim_words( get_the_excerpt(), 12 );
        ?>
        <a class="service-list-row" href="<?php the_permalink(); ?>" data-anim="up">
            <span class="svc-num"><?php echo str_pad( $svc_num++, 2, '0', STR_PAD_LEFT ); ?></span>
            <div class="svc-body">
                <h3><?php the_title(); ?></h3>
                <?php if ( $card_desc ) : ?><p><?php echo esc_html( $card_desc ); ?></p><?php endif; ?>
            </div>
            <div class="svc-arrow" aria-hidden="true"><?php echo $arrow_svg; ?></div>
        </a>
        <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <div class="section-cta-center" style="margin-top:2.5rem;" data-anim="up" data-delay="200">
            <a class="button button-primary btn-magnetic" href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ?: home_url( '/services/' ) ); ?>">View All Services</a>
        </div>
    </div>
</section>

<!-- ══ LEADERSHIP ════════════════════════════════════════════════ -->
<?php
$leader_heading = get_field( 'leader_heading' ) ?: 'Led by Shafoli Kapur, Your Advocate in the Canadian Immigration System';
$leader_bio     = get_field( 'leader_bio' )     ?: 'With years of experience navigating Canada\'s complex immigration landscape, Shafoli Kapur and the TDOT team have represented clients from over 40 countries. Licensed by the CICC and authorized before the IRB, she brings both credential and compassion to every case.';
$leader_photo   = get_field( 'leader_photo' );
$leader_creds   = get_field( 'leader_credentials' );
?>
<section class="section section-muted">
    <div class="container split-panel split-panel-portrait">
        <div class="portrait-frame" data-anim="left">
            <div class="portrait-offset"></div>
            <?php if ( $leader_photo ) : ?>
                <img src="<?php echo esc_url( $leader_photo['url'] ); ?>" alt="<?php echo esc_attr( $leader_photo['alt'] ); ?>" width="768" height="768" loading="lazy" />
            <?php else : ?>
                <img src="https://d2xsxph8kpxj0f.cloudfront.net/310519663445981057/PSTjQftXscFTwvxzvYYugT/shafoli-kapur-portrait_fbc4fb42.webp" alt="Shafoli Kapur, Lead Immigration Consultant" width="768" height="768" loading="lazy" />
            <?php endif; ?>
        </div>
        <div class="panel-copy">
            <p class="section-label" data-anim="fade">LEADERSHIP</p>
            <h2 data-anim="up"><?php echo esc_html( $leader_heading ); ?></h2>
            <p data-anim="up" data-delay="100"><?php echo esc_html( $leader_bio ); ?></p>
            <?php if ( $leader_creds ) : ?>
            <div class="credential-row" data-anim="up" data-delay="200">
                <?php foreach ( $leader_creds as $cred ) : ?>
                    <span><?php echo esc_html( $cred['credential'] ); ?></span>
                <?php endforeach; ?>
            </div>
            <?php else : ?>
            <div class="credential-row" data-anim="up" data-delay="200">
                <span>CICC Member</span><span>IRB Authorized</span><span>10+ Years Experience</span>
            </div>
            <?php endif; ?>
            <a class="text-link" href="<?php echo esc_url( home_url( '/about/' ) ); ?>" data-anim="fade" data-delay="300">Meet Our Team <span aria-hidden="true">&rarr;</span></a>
        </div>
    </div>
</section>

<!-- ══ HOW IT WORKS ══════════════════════════════════════════════ -->
<?php $steps = get_field( 'how_it_works' ); ?>
<section class="section">
    <div class="container">
        <p class="section-label" data-anim="fade">HOW IT WORKS</p>
        <div class="section-heading" data-anim="up"><h2>From First Call to Canadian Soil</h2></div>

        <div class="process-track">
            <div class="process-fill-line" aria-hidden="true"></div>
            <?php if ( $steps ) : ?>
                <?php foreach ( $steps as $i => $step ) : ?>
                <div class="process-step">
                    <div class="process-node" aria-hidden="true"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></div>
                    <h3><?php echo esc_html( $step['title'] ); ?></h3>
                    <p><?php echo esc_html( $step['description'] ); ?></p>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="process-step">
                    <div class="process-node" aria-hidden="true">01</div>
                    <h3>Free Consultation</h3>
                    <p>Tell us your situation. We assess your eligibility and recommend the best pathway — at no charge.</p>
                </div>
                <div class="process-step">
                    <div class="process-node" aria-hidden="true">02</div>
                    <h3>We Build Your Case</h3>
                    <p>Our consultants prepare every document, letter, and submission to present your strongest application.</p>
                </div>
                <div class="process-step">
                    <div class="process-node" aria-hidden="true">03</div>
                    <h3>You Get Results</h3>
                    <p>We track your file, respond to IRCC, and keep you informed at every stage until you reach your goal.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="section-cta-center" style="margin-top:3rem;" data-anim="up" data-delay="400">
            <a class="button button-primary btn-magnetic" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Book Your Free Consultation</a>
        </div>
    </div>
</section>

<!-- ══ TESTIMONIALS ══════════════════════════════════════════════ -->
<?php $testimonials = get_field( 'testimonials' ); ?>
<section class="section section-muted">
    <div class="container">
        <p class="section-label" style="text-align:center;border-left:0;padding-left:0;" data-anim="fade">CLIENT STORIES</p>
        <h2 style="text-align:center;margin-bottom:2.5rem;" data-anim="up">Real People. Real Results.</h2>

        <?php
        // Build JS testimonial data from ACF or use defaults.
        if ( $testimonials ) :
            $t_first = $testimonials[0];
            $t_text  = esc_html( $t_first['quote'] );
            $t_attr  = esc_html( '&mdash; ' . $t_first['attribution'] );
        else :
            $t_text = 'Shafoli Kapur and her team guided us through our PR application from start to finish. They were always available and never left us confused. We got our approval in 8 months.';
            $t_attr = '&mdash; Priya R., Express Entry Client';
        endif;
        $dot_count = $testimonials ? count( $testimonials ) : 4;
        ?>

        <div class="testimonial-stage" data-t-stage data-anim="scale" data-delay="100">
            <span class="t-quote-mark" aria-hidden="true">&ldquo;</span>
            <p class="t-text" data-t-text><?php echo esc_html( $t_text ); ?></p>
            <p class="t-attr" data-t-attr><?php echo wp_kses_post( $t_attr ); ?></p>
            <div class="t-dots" role="tablist" aria-label="Testimonial navigation">
                <?php for ( $i = 0; $i < min( $dot_count, 4 ); $i++ ) : ?>
                <button class="t-dot<?php echo $i === 0 ? ' active' : ''; ?>" aria-label="Testimonial <?php echo $i + 1; ?>"></button>
                <?php endfor; ?>
            </div>
        </div>

        <?php
        // Output testimonials as JSON for the JS rotator if ACF data exists.
        if ( $testimonials ) : ?>
        <script>
        window.TDOT_TESTIMONIALS = <?php echo json_encode( array_map( function( $t ) {
            return array(
                'text' => '\u201c' . $t['quote'] . '\u201d',
                'attr' => '\u2014 ' . $t['attribution'],
            );
        }, $testimonials ) ); ?>;
        </script>
        <?php endif; ?>
    </div>
</section>

<!-- ══ STATS ══════════════════════════════════════════════════════ -->
<?php $stats = get_field( 'stats' ); ?>
<section class="section section-dark" style="padding:0;">
    <div class="container">
        <div class="stats-row" data-stagger>
            <?php if ( $stats ) : ?>
                <?php foreach ( $stats as $stat ) :
                    // Parse number and suffix from e.g. "10,000+" or "95%"
                    preg_match( '/^[\d,]+/', $stat['number'], $num_match );
                    preg_match( '/[^\d,]+$/', $stat['number'], $suf_match );
                    $raw_num = isset( $num_match[0] ) ? str_replace( ',', '', $num_match[0] ) : '0';
                    $suffix  = isset( $suf_match[0] ) ? $suf_match[0] : '';
                ?>
                <div class="stat-block" data-anim="up">
                    <strong class="stat-big"><span data-counter="<?php echo esc_attr( $raw_num ); ?>" data-suffix="<?php echo esc_attr( $suffix ); ?>"><?php echo esc_html( $stat['number'] ); ?></span></strong>
                    <p class="stat-desc"><?php echo esc_html( $stat['label'] ); ?></p>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="stat-block" data-anim="up"><strong class="stat-big"><span data-counter="10000" data-suffix="+">10,000+</span></strong><p class="stat-desc">Applications Processed</p></div>
                <div class="stat-block" data-anim="up"><strong class="stat-big"><span data-counter="40" data-suffix="+">40+</span></strong><p class="stat-desc">Countries Represented</p></div>
                <div class="stat-block" data-anim="up"><strong class="stat-big"><span data-counter="95" data-suffix="%">95%</span></strong><p class="stat-desc">Approval Rate</p></div>
                <div class="stat-block" data-anim="up"><strong class="stat-big"><span data-counter="500" data-suffix="+">500+</span></strong><p class="stat-desc">5-Star Reviews</p></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ══ BANNER CTA ════════════════════════════════════════════════ -->
<?php
$banner_heading = get_field( 'banner_heading' ) ?: 'Your Canadian Dream Starts With One Call.';
$banner_text    = get_field( 'banner_text' )    ?: 'Book a free 30-minute consultation with a licensed TDOT immigration consultant today.';
?>
<section class="section section-accent banner-shimmer">
    <div class="container banner-cta">
        <div data-anim="left">
            <h2><?php echo esc_html( $banner_heading ); ?></h2>
            <p><?php echo esc_html( $banner_text ); ?></p>
        </div>
        <div class="banner-actions" data-anim="right" data-delay="150">
            <a class="button button-light btn-magnetic" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Book Free Consultation</a>
            <a class="banner-phone" href="tel:<?php echo esc_attr( $phone_intl ); ?>"><?php echo esc_html( $phone ); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
