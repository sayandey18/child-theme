<?php
/**
 * Template part for displaying a post's Hero header
 *
 * @package kadence
 */

namespace Kadence;

$classes   = array();
$classes[] = 'c-entry-header';
if ( is_singular( get_post_type() ) ) {
	$classes[] = get_post_type() . '-title';
	$classes[] = 'title-align-' . ( kadence()->sub_option( get_post_type() . '_title_align', 'desktop' ) ? kadence()->sub_option( get_post_type() . '_title_align', 'desktop' ) : 'inherit' );
	$classes[] = 'title-tablet-align-' . ( kadence()->sub_option( get_post_type() . '_title_align', 'tablet' ) ? kadence()->sub_option( get_post_type() . '_title_align', 'tablet' ) : 'inherit' );
	$classes[] = 'title-mobile-align-' . ( kadence()->sub_option( get_post_type() . '_title_align', 'mobile' ) ? kadence()->sub_option( get_post_type() . '_title_align', 'mobile' ) : 'inherit' );
}
?>

<section class="c-inner-banner-w <?php echo esc_attr( get_post_type() ) . '-hero-section'; ?> <?php echo esc_attr( 'entry-hero-layout-' . kadence()->option( get_post_type() . '_title_inner_layout' ) ); ?>">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/inner-banner-1.jpg" alt="hero-banner" />
	<div class="c-inner-banner-con">
		<div class="container">
            <div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
                <?php
                /**
                 * Kadence Entry Hero
                 *
                 * Hooked kadence_entry_header 10
                 */
                do_action( 'kadence_entry_hero', get_post_type(), 'above' );
                ?>
            </div>
		</div>
	</div>
</section>