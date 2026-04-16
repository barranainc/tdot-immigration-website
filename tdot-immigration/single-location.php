<?php
/**
 * Single Location template.
 *
 * @package tdot-immigration
 */

get_header();

tdot_breadcrumb_schema( array(
    array( 'name' => 'Home', 'url' => home_url( '/' ) ),
    array( 'name' => 'Locations', 'url' => get_post_type_archive_link( 'location' ) ),
    array( 'name' => get_the_title(), 'url' => get_permalink() ),
) );

$subtitle     = get_field( 'location_subtitle' );
$services     = get_field( 'popular_services' );
$banner_head  = get_field( 'banner_heading' ) ?: 'Need immigration guidance near ' . get_the_title() . '?';
$banner_text  = get_field( 'banner_text' ) ?: 'Speak with TDOT about permits, sponsorships, permanent residence, or inadmissibility support.';
?>

<nav class="breadcrumbs container" aria-label="Breadcrumb" data-anim="fade">
    <ol><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li><li><a href="<?php echo esc_url( get_post_type_archive_link( 'location' ) ); ?>">Locations</a></li><li aria-current="page"><?php the_title(); ?></li></ol>
</nav>

<section class="page-hero page-hero-light">
    <div class="container page-hero-inner split-heading">
        <div>
            <p class="section-label" data-anim="fade">LOCATION</p>
            <h1 data-anim="up"><?php the_title(); ?> Immigration Consultant — TDOT Immigration</h1>
        </div>
        <?php if ( $subtitle ) : ?>
            <p data-anim="right" data-delay="120"><?php echo esc_html( $subtitle ); ?></p>
        <?php endif; ?>
    </div>
</section>

<section class="section">
    <div class="container content-layout single-column-layout">
        <article class="content-article" data-anim="up">
            <?php the_content(); ?>
        </article>
    </div>
</section>

<?php if ( $services ) : ?>
<section class="section section-muted">
    <div class="container">
        <p class="section-label" data-anim="fade">POPULAR SERVICES</p>
        <div class="mini-service-grid" data-stagger>
            <?php foreach ( $services as $svc ) : ?>
            <article class="mini-service-card" data-anim="up">
                <h2><?php echo esc_html( $svc->post_title ); ?></h2>
                <p><?php echo esc_html( get_field( 'service_card_description', $svc->ID ) ?: wp_trim_words( $svc->post_excerpt, 15 ) ); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="section section-accent-soft banner-shimmer">
    <div class="container banner-cta">
        <div data-anim="left">
            <h2><?php echo esc_html( $banner_head ); ?></h2>
            <p><?php echo esc_html( $banner_text ); ?></p>
        </div>
        <a class="button button-primary btn-magnetic" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" data-anim="right" data-delay="150">Book Consultation</a>
    </div>
</section>

<?php get_footer(); ?>
