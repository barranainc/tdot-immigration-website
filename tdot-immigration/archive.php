<?php
/**
 * Blog Archive — lists blog posts in a grid.
 *
 * @package tdot-immigration
 */

get_header();

tdot_breadcrumb_schema( array(
    array( 'name' => 'Home', 'url' => home_url( '/' ) ),
    array( 'name' => 'Blog', 'url' => get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ),
) );
?>

<nav class="breadcrumbs container" aria-label="Breadcrumb" data-anim="fade">
    <ol><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li><li aria-current="page">Blog</li></ol>
</nav>

<section class="page-hero page-hero-light">
    <div class="container page-hero-inner split-heading">
        <div>
            <p class="section-label" data-anim="fade">BLOG</p>
            <h1 data-anim="up">Immigration insights from the TDOT team</h1>
        </div>
        <p data-anim="right" data-delay="120">Actionable guidance on study permits, Express Entry, permanent residence, and policy changes affecting applicants to Canada.</p>
    </div>
</section>

<section class="section">
    <div class="container blog-grid" data-stagger>
        <?php while ( have_posts() ) : the_post(); ?>
        <article class="blog-card" data-anim="up">
            <span class="blog-date"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></span>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 25 ) ); ?></p>
        </article>
        <?php endwhile; ?>
    </div>
    <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
</section>

<?php get_footer(); ?>
