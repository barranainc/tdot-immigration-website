<?php
/**
 * Services Archive — lists all services in a grid.
 *
 * @package tdot-immigration
 */

get_header();

tdot_breadcrumb_schema( array(
    array( 'name' => 'Home', 'url' => home_url( '/' ) ),
    array( 'name' => 'Services', 'url' => get_post_type_archive_link( 'service' ) ),
) );
?>

<nav class="breadcrumbs container" aria-label="Breadcrumb" data-anim="fade">
    <ol><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li><li aria-current="page">Services</li></ol>
</nav>

<section class="page-hero page-hero-light">
    <div class="container page-hero-inner split-heading">
        <div>
            <p class="section-label" data-anim="fade">SERVICES</p>
            <h1 data-anim="up">All Your Canadian Immigration Needs, Handled.</h1>
        </div>
        <p data-anim="right" data-delay="120">Whether you want to apply for a study visa, business visa, worker visa, investor visa, or want to sponsor your family members — TDOT Immigration serves them all.</p>
    </div>
</section>

<section class="section">
    <div class="container overview-grid" data-stagger>
        <?php while ( have_posts() ) : the_post(); ?>
        <article class="overview-card" data-anim="up">
            <h2><?php the_title(); ?></h2>
            <p><?php echo esc_html( get_field( 'service_card_description' ) ?: get_the_excerpt() ); ?></p>
            <a href="<?php the_permalink(); ?>">Learn More <span aria-hidden="true">&rarr;</span></a>
        </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
