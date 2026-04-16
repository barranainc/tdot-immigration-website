<?php
/**
 * Default template fallback.
 *
 * @package tdot-immigration
 */

get_header();
?>

<section class="section">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile; ?>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p><?php esc_html_e( 'No content found.', 'tdot-immigration' ); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
