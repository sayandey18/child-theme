<?php
/**
 * The main single item template file.
 *
 * @package kadence
 */

namespace Kadence;

get_header();

/**
* Hook for Hero Section
*/
get_template_part( 'template-parts/entry_hero' );

?>

<section class="c-tour-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 pe-5">
                <div class="c-tour-details-con">
                    <div class="c-featured-img">
                        <?php
                        if (has_post_thumbnail()): 
                            the_post_thumbnail();
                        else: 
                            echo '<img src="https://via.placeholder.com/750x450.jpg" 
                            alt="placeholder" />';
                        endif; ?>
                    </div>
                    <?php
                    $description = get_the_content();
                    if ( !empty($description) ): ?>
                        <div class="c-tour-con">
                            <h2>Description</h2>
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php
                    $pricing = get_field('tour_pricing');
                    if ( !empty($pricing) ): ?>
                        <div class="c-price-con">
                            <h2>Pricing</h2>
                            <?php echo $pricing; ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    $day_plan = get_field('tour_day_plan');
                    if ( !empty($day_plan) ): ?>
                        <div class="c-tour-details-list">
                            <h2>Detailed Day Plan Itinerary</h2>
                            <?php echo $day_plan; ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    $tour_video = get_field('tour_video');
                    // Use preg_match to find iframe src.
                    preg_match('/src="(.+?)"/', $tour_video, $matches);
                    $src = $matches[1];

                    // Add extra parameters to src and replace HTML.
                    $params = array(
                        'controls'  => 0,
                        'hd'        => 1,
                        'autohide'  => 1
                    );
                    $new_src = add_query_arg($params, $src);
                    $tour_video = str_replace($src, $new_src, $tour_video);

                    // Add extra attributes to iframe HTML.
                    $attributes = 'frameborder="0"';
                    $tour_video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $tour_video);
                    if ( !empty($tour_video) ): ?>  
                        <div class="cp-hotel-video">
                            <?php echo $tour_video; ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    $gallery_img = get_field('tour_gallery');
                    if( $gallery_img ): ?>
                        <div class="cp-hotel-gallery">
                            <h2>Gallery</h2>
                            <div class="row">
                                <?php foreach( $gallery_img as $image ): ?>
                                    <div class="col-md-4">
                                        <div class="cp-hotel-gallery-img">
                                            <a href="<?php echo esc_url($image['url']); ?>" class="c-gallery-list"
                                                data-lightbox="c-gallery-list">
                                                <img src="<?php echo esc_url($image['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="c-hotel-enquery-w"> 
                    <?php
                    $enquire_form = get_field('company_enquire_form', 'option');
                    if ( !empty($enquire_form) ):
                        echo '<div class="c-hotel-enquery-in">';
                            echo do_shortcode($enquire_form);
                        echo '</div>';
                    endif;
                    ?>
                    <div class="company-package-details">
                        <h3>Quick Info</h3>
                        <table class="table table-bordered">
                            <tbody>
                                <?php
                                if( have_rows('tour_quick_info') ): ?>
                                    <?php
                                    while( have_rows('tour_quick_info') ) : the_row();
                                    $heading = get_sub_field('quick_info_heading');
                                    $description = get_sub_field('quick_info_description');
                                    ?>
                                        <tr class="cp-quickinfo-tr">
                                            <td><strong><?php echo $heading; ?></strong></td>
                                            <td><?php echo $description; ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <?php 
                    $args = array( 
                        'post_type' => 'tour',
                        'post_status' => 'publish',
                        'posts_per_page' => 5,
                        'order' => 'ASC',
                    );
                    $loop = new \WP_Query( $args );
                    if ( $loop->have_posts() ): ?>
                        <div class="othr-demostic-tour">
                            <h3>Beboundless Other Tours</h3>
                            <ul>
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <li>
                                        <div class="othr-demostic-tour-img">
                                            <?php
                                            if (has_post_thumbnail()): 
                                                the_post_thumbnail('thumbnail');
                                            else: 
                                                echo '<img src="https://via.placeholder.com/150.jpg" 
                                                alt="placeholder" />';
                                            endif; ?>
                                        </div>
                                        <div class="othr-demostic-tour-con">
                                            <?php
                                            $tour_title = get_the_title();
                                            if (!empty($tour_title)): 
                                                echo '<h4>';
                                                echo $tour_title;
                                                echo '</h4>';
                                            endif; ?>

                                            <?php $tour_duration = get_field('tour_duration');
                                            if (!empty($tour_duration)):
                                                echo '<p>'.$tour_duration.'</p>';
                                            endif; ?>

                                            <h5><i class="fa fa-inr" aria-hidden="true"></i> 50000</h5>
                                        </div>
                                        <a href="#"></a>
                                    </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>

                                <!-- <li>
                                    <div class="othr-demostic-tour-img">
                                        <img src="img/hotel-gallery-2.jpg" alt="">
                                    </div>
                                    <div class="othr-demostic-tour-con">
                                        <h4>DARJEELING</h4>
                                        <p>4 Day 3 Night</p>
                                        <h5><i class="fa fa-inr" aria-hidden="true"></i> 50000</h5>
                                    </div>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <div class="othr-demostic-tour-img">
                                        <img src="img/hotel-gallery-3.jpg" alt="">
                                    </div>
                                    <div class="othr-demostic-tour-con">
                                        <h4>Goa</h4>
                                        <p>4 Day 3 Night</p>
                                        <h5><i class="fa fa-inr" aria-hidden="true"></i> 50000</h5>
                                    </div>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <div class="othr-demostic-tour-img">
                                        <img src="img/hotel-gallery-4.jpg" alt="">
                                    </div>
                                    <div class="othr-demostic-tour-con">
                                        <h4>KERALA</h4>
                                        <p>4 Day 3 Night</p>
                                        <h5><i class="fa fa-inr" aria-hidden="true"></i> 50000</h5>
                                    </div>
                                    <a href="#"></a>
                                </li> -->
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>