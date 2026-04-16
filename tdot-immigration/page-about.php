<?php
/**
 * Template Name: About Page
 *
 * @package tdot-immigration
 */

get_header();

tdot_breadcrumb_schema( array(
    array( 'name' => 'Home', 'url' => home_url( '/' ) ),
    array( 'name' => 'About', 'url' => get_permalink() ),
) );
?>

<nav class="breadcrumbs container" aria-label="Breadcrumb" data-anim="fade">
    <ol><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li><li aria-current="page">About</li></ol>
</nav>

<section class="page-hero page-hero-accent">
    <div class="container page-hero-inner page-hero-center">
        <p class="section-label" data-anim="fade">ABOUT TDOT</p>
        <h1 data-anim="up">Built on Trust. Driven by Results.</h1>
        <p data-anim="up" data-delay="120">Since our founding, TDOT Immigration has helped thousands of families, students, and professionals build their lives in Canada.</p>
    </div>
</section>

<section class="section">
    <div class="container split-panel">
        <div class="panel-copy" data-anim="left">
            <p class="section-label">OUR STORY</p>
            <?php the_content(); ?>
        </div>
        <div class="image-stack" data-anim="right" data-delay="150">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php // Team Grid. ?>
<section class="section section-muted">
    <div class="container">
        <p class="section-label" data-anim="fade">OUR TEAM</p>
        <div class="team-grid" data-stagger>
            <?php
            $team = new WP_Query( array(
                'post_type'      => 'team_member',
                'posts_per_page' => 12,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ) );
            while ( $team->have_posts() ) :
                $team->the_post();
                $is_lead        = get_field( 'is_lead' );
                $is_placeholder = get_field( 'is_placeholder' );
                $bio            = get_field( 'bio' );
                $position       = get_field( 'position' );
                $classes        = 'team-card';
                if ( $is_lead ) $classes .= ' team-card-lead';
                if ( $is_placeholder ) $classes .= ' team-card-muted';
            ?>
            <article class="<?php echo esc_attr( $classes ); ?>" data-anim="up">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'team-portrait', array( 'loading' => 'lazy' ) ); ?>
                <?php endif; ?>
                <h3><?php the_title(); ?><?php echo $position ? ' &mdash; ' . esc_html( $position ) : ''; ?></h3>
                <?php if ( $bio ) : ?>
                    <p><?php echo esc_html( $bio ); ?></p>
                <?php endif; ?>
            </article>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container credential-panel">
        <div data-anim="up">
            <p class="section-label">CREDENTIALS</p>
            <h2>Professional standing clients can verify.</h2>
        </div>
        <div class="credential-grid" data-stagger>
            <article data-anim="up"><h3>CICC Member</h3><p>College of Immigration and Citizenship Consultants oversight supports professional accountability and regulated practice standards.</p></article>
            <article data-anim="up"><h3>IRB Authorized Representative</h3><p>TDOT can assist in matters that require a deeper understanding of immigration proceedings and admissibility strategy.</p></article>
            <article data-anim="up"><h3>Toronto Office</h3><p><?php echo esc_html( tdot_option( 'tdot_address', '1060 Sheppard Ave W, Unit 4, Toronto, ON M3J 0G7' ) ); ?></p></article>
        </div>
    </div>
</section>

<section class="section section-accent-soft banner-shimmer">
    <div class="container banner-cta">
        <div data-anim="left">
            <h2>Need a team that explains every step clearly?</h2>
            <p>Speak with TDOT about your study, work, sponsorship, PR, or inadmissibility matter.</p>
        </div>
        <a class="button button-primary btn-magnetic" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" data-anim="right" data-delay="150">Book Consultation</a>
    </div>
</section>

<?php get_footer(); ?>
