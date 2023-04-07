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
    <section class="cp-tours-w">
        <div class="container">
            <div class="row">
                <?php while ( have_posts() ) { 
                    the_post();
                ?> 
                    <div class="col-lg-3 col-md-4">
                        <div class="c-tour-list-box">
                            <div class="c-tour-list-box-img">
                                <?php
                                if (has_post_thumbnail()): 
                                    the_post_thumbnail('medium_large');
                                else: 
                                    echo '<img src="https://via.placeholder.com/750x450.jpg" 
                                    alt="placeholder" />';
                                endif; ?>

                                <?php $tour_price = get_field('tour_cost_perhead');
                                if (!empty($tour_price)):
                                    echo '<span>';
                                    echo '<i class="fas fa-rupee-sign"></i> ';
                                    echo $tour_price;
                                    echo '</span>';
                                endif; ?>

                                <a href="<?php the_permalink(); ?>"></a>
                            </div>
                            <div class="c-tour-list-box-con">
                                <?php
                                $tour_title = get_the_title();
                                if (!empty($tour_title)): ?>
                                    <h4>
                                        <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?> 
                                        </a>
                                    </h4>
                                <?php endif; ?>
                                
                                <?php $tour_duration = get_field('tour_duration');
                                if (!empty($tour_duration)):
                                    echo '<h5>'.$tour_duration.'</h5>';
                                endif; ?>

                                <?php
                                $tour_excerpt = get_the_excerpt();
                                if (!empty($tour_excerpt)):
                                    echo '<p>'.wp_trim_words($tour_excerpt, 12).'</p>';
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