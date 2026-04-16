<?php
/**
 * 404 Page template.
 *
 * @package tdot-immigration
 */

get_header();
?>

<section class="page-hero page-hero-accent">
    <div class="container page-hero-inner page-hero-center">
        <h1>Page Not Found</h1>
        <p>The page you're looking for doesn't exist or has been moved.</p>
        <div class="button-row" style="justify-content: center;">
            <a class="button button-light" href="<?php echo esc_url( home_url( '/' ) ); ?>">Return Home</a>
            <a class="button button-secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
