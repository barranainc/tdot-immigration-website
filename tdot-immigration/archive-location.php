<?php
/**
 * Locations Archive — lists all locations.
 *
 * @package tdot-immigration
 */

get_header();
?>

<section class="page-hero page-hero-light">
    <div class="container page-hero-inner page-hero-center">
        <p class="section-label">LOCATIONS</p>
        <h1>Areas We Serve</h1>
        <p>TDOT Immigration serves clients across the Greater Toronto Area and beyond.</p>
    </div>
</section>

<section class="section">
    <div class="container overview-grid">
        <?php while ( have_posts() ) : the_post(); ?>
        <article class="overview-card">
            <h2><?php the_title(); ?></h2>
            <p><?php echo esc_html( get_field( 'location_subtitle' ) ?: wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
            <a href="<?php the_permalink(); ?>">Learn More <span aria-hidden="true">&rarr;</span></a>
        </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
