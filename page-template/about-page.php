<?php
/**
 * Template Name: About 
 *
 * @package kadence
 */

namespace Kadence;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

/**
 * Hook for Hero Section
 */
get_template_part( 'template-parts/entry_hero' );
?>

<section class="c-infrastructural-w">
    <div class="container">
        <div class="c-infrastructural-in">
            <?php
            $image = get_field('about_image');
            if( !empty( $image ) ): ?>
                <div class="c-infrastructural-img">
                    <img src="<?php echo esc_url($image['url']); ?>" 
                    alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endif; ?>

            <?php
            $description = get_the_content();
            if ( !empty($description) ): ?>
                <div class="c-infrastructural-con">
                    <h2 class="c-haeding-1">ABOUT US</h2>
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php
    $google_map = get_field('about_google_map');
    if ( !empty($google_map) ): ?>
        <div class="cp-map-w">
            <div class="container">
                <?php echo $google_map; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>