<?php
/**
 * Single Blog Post template.
 *
 * @package tdot-immigration
 */

get_header();

tdot_article_schema();
tdot_breadcrumb_schema( array(
    array( 'name' => 'Home', 'url' => home_url( '/' ) ),
    array( 'name' => 'Blog', 'url' => get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ),
    array( 'name' => get_the_title(), 'url' => get_permalink() ),
) );

$categories = get_the_category();
$cat_name   = ! empty( $categories ) ? $categories[0]->name : '';
?>

<nav class="breadcrumbs container" aria-label="Breadcrumb" data-anim="fade">
    <ol>
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>">Blog</a></li>
        <li aria-current="page"><?php the_title(); ?></li>
    </ol>
</nav>

<article class="article-shell">
    <header class="article-hero">
        <div class="container article-hero-inner">
            <p class="article-meta" data-anim="fade">TDOT Immigration<?php if ( $cat_name ) echo ' &middot; ' . esc_html( $cat_name ); ?> &middot; <?php echo esc_html( get_the_date( 'Y-m-d' ) ); ?></p>
            <h1 data-anim="up"><?php the_title(); ?></h1>
            <?php if ( has_excerpt() ) : ?>
                <p class="article-dek" data-anim="up" data-delay="120"><?php echo esc_html( get_the_excerpt() ); ?></p>
            <?php endif; ?>
        </div>
    </header>
    <div class="container article-layout">
        <div class="article-content" data-anim="up">
            <?php the_content(); ?>
        </div>
        <aside class="sticky-aside">
            <div class="aside-card" data-anim="right">
                <h2>Need advice on your own case?</h2>
                <p>TDOT helps applicants translate policy updates into a concrete filing strategy.</p>
                <a class="button button-primary button-block btn-magnetic" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Book Consultation</a>
            </div>
        </aside>
    </div>
</article>

<?php get_footer(); ?>
