<?php
/**
 * Template part for displaying a post's Hero header
 *
 * @package kadence
 */

namespace Kadence;

$slug = ( is_search() && ! is_post_type_archive( 'product' ) ? 'search' : get_post_type() );
if ( empty( $slug ) ) {
	$queried_object = get_queried_object();
	if ( is_object( $queried_object ) && property_exists( $queried_object, 'taxonomy' ) ) {
		$current_tax = get_taxonomy( $queried_object->taxonomy );
		if ( property_exists( $current_tax, 'object_type' ) ) {
			$post_types = $current_tax->object_type;
			$slug = $post_types[0];
		}
	}
}
?>

<section class="c-inner-banner-w">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/inner-banner-1.jpg" alt="hero-banner" />
    <div class="c-inner-banner-con">
        <div class="container">
            <?php
            /**
             * Kadence Entry Hero
             *
             * Hooked kadence_entry_archive_header 10
             */
            do_action( 'kadence_entry_archive_hero', $slug . '_archive', 'above' );
            ?>
        </div>
    </div>
</section>