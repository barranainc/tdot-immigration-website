<?php
/**
 * Single Service template.
 *
 * @package tdot-immigration
 */

get_header();

tdot_service_schema();
tdot_faq_schema();
tdot_breadcrumb_schema( array(
    array( 'name' => 'Home', 'url' => home_url( '/' ) ),
    array( 'name' => 'Services', 'url' => get_post_type_archive_link( 'service' ) ),
    array( 'name' => get_the_title(), 'url' => get_permalink() ),
) );

$eyebrow       = get_field( 'service_eyebrow' ) ?: 'SERVICE';
$fact_title    = get_field( 'fact_panel_title' ) ?: 'What TDOT focuses on';
$fact_items    = get_field( 'fact_panel' );
$faqs          = get_field( 'faq_items' );
$sidebar_head  = get_field( 'sidebar_heading' );
$sidebar_text  = get_field( 'sidebar_text' );
$banner_head   = get_field( 'banner_heading' );
$banner_text   = get_field( 'banner_text' );
$banner_btn    = get_field( 'banner_button_text' ) ?: 'Book Consultation';
$phone         = tdot_option( 'tdot_phone', '416-947-6710' );
$phone_intl    = tdot_option( 'tdot_phone_intl', '+14169476710' );
$email         = tdot_option( 'tdot_email', 'info@tdotimm.com' );
$address       = tdot_option( 'tdot_address', '1060 Sheppard Ave W, Unit 4, Toronto, ON M3J 0G7' );
?>

<nav class="breadcrumbs container" aria-label="Breadcrumb" data-anim="fade">
    <ol><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li><li><a href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ); ?>">Services</a></li><li aria-current="page"><?php the_title(); ?></li></ol>
</nav>

<section class="page-hero page-hero-light">
    <div class="container page-hero-inner split-heading">
        <div>
            <p class="section-label" data-anim="fade"><?php echo esc_html( $eyebrow ); ?></p>
            <h1 data-anim="up"><?php the_title(); ?></h1>
            <?php if ( has_excerpt() ) : ?>
                <p data-anim="up" data-delay="100"><?php echo esc_html( get_the_excerpt() ); ?></p>
            <?php endif; ?>
        </div>
        <?php if ( $fact_items ) : ?>
        <div class="fact-panel" data-anim="right" data-delay="150">
            <h2><?php echo esc_html( $fact_title ); ?></h2>
            <ul>
                <?php foreach ( $fact_items as $item ) : ?>
                    <li><?php echo esc_html( $item['item'] ); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</section>

<section class="section">
    <div class="container content-layout">
        <article class="content-article" data-anim="up">
            <?php the_content(); ?>
        </article>
        <aside class="sticky-aside">
            <div class="aside-card" data-anim="right">
                <?php if ( $sidebar_head ) : ?>
                    <h2><?php echo esc_html( $sidebar_head ); ?></h2>
                <?php endif; ?>
                <?php if ( $sidebar_text ) : ?>
                    <p><?php echo esc_html( $sidebar_text ); ?></p>
                <?php endif; ?>
                <a class="button button-primary button-block btn-magnetic" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Book Consultation</a>
            </div>
            <div class="aside-card aside-card-muted" data-anim="right" data-delay="100">
                <h2>Contact TDOT</h2>
                <p><a href="tel:<?php echo esc_attr( $phone_intl ); ?>"><?php echo esc_html( $phone ); ?></a><br /><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
                <p><?php echo esc_html( $address ); ?></p>
            </div>
        </aside>
    </div>
</section>

<?php if ( $faqs ) : ?>
<section class="section section-muted">
    <div class="container">
        <p class="section-label" data-anim="fade">FAQ</p>
        <div class="section-heading" data-anim="up"><h2>Questions clients often ask</h2></div>
        <div class="faq-list" data-stagger>
            <?php foreach ( $faqs as $faq ) : ?>
            <details class="faq-item" data-anim="up">
                <summary><?php echo esc_html( $faq['question'] ); ?></summary>
                <div class="faq-answer"><p><?php echo esc_html( $faq['answer'] ); ?></p></div>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ( $banner_head ) : ?>
<section class="section section-accent-soft banner-shimmer">
    <div class="container banner-cta">
        <div data-anim="left">
            <h2><?php echo esc_html( $banner_head ); ?></h2>
            <?php if ( $banner_text ) : ?>
                <p><?php echo esc_html( $banner_text ); ?></p>
            <?php endif; ?>
        </div>
        <a class="button button-primary btn-magnetic" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" data-anim="right" data-delay="150"><?php echo esc_html( $banner_btn ); ?></a>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
