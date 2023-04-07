<?php
/**
 * The main archive template file for inner content.
 *
 * @package kadence
 */

namespace Kadence;

get_header();

/**
 * Hook for Hero Section
 */
get_template_part( 'template-parts/archive_hero' );
?>

<?php if ( have_posts() ) { ?>
    <section class="cp-hotel-w">
        <div class="container">
            <div class="row">
                <?php while ( have_posts() ) { 
                    the_post(); ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="c-hotel-box">
                            <div class="c-hotel-box-img">
                                <?php
                                if (has_post_thumbnail()): 
                                    the_post_thumbnail('medium_large');
                                else: 
                                    echo '<img src="https://via.placeholder.com/750x450.jpg" 
                                    alt="placeholder" />';
                                endif; ?>
                            </div>

                            <div class="c-hotel-box-con">
                                <?php
                                $hotel_name = get_the_title();
                                if (!empty($hotel_name)): ?>
                                    <h4>
                                        <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?> 
                                        </a>
                                    </h4>
                                <?php endif; ?>

                                <?php
                                $hotel_excerpt = get_the_excerpt();
                                if (!empty($hotel_excerpt)):
                                    echo '<p>'.wp_trim_words($hotel_excerpt, 15).'</p>';
                                endif; ?>

                                <?php
                                $tour_link = get_the_permalink();
                                if (!empty($tour_link)):
                                    echo '<a class="c-btn-1" href="'.$tour_link.'">';
                                    echo '<span>Read More</span>';
                                    echo '</a>';
                                endif; ?>
                            </div>
                        </div>
                    </div>
                <?php
                } get_template_part( 'template-parts/pagination' );
                ?>
            </div>
        </div>
    </section>
<?php 
} else{
    get_template_part( 'template-parts/error' );
}
get_footer();
