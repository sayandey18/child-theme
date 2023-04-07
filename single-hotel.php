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

<section class="c-hotel-ditales">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 pe-5">
                <div class="c-hotel-ditales-con">

                <?php
                    $hotel_video = get_field('hotel_video');
                    // Use preg_match to find iframe src.
                    preg_match('/src="(.+?)"/', $hotel_video, $matches);
                    $src = $matches[1];

                    // Add extra parameters to src and replace HTML.
                    $params = array(
                        'controls'  => 0,
                        'hd'        => 1,
                        'autohide'  => 1
                    );
                    $new_src = add_query_arg($params, $src);
                    $hotel_video = str_replace($src, $new_src, $hotel_video);

                    // Add extra attributes to iframe HTML.
                    $attributes = 'frameborder="0"';
                    $hotel_video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $hotel_video);
                    if ( !empty($hotel_video) ): ?>  
                        <div class="cp-hotel-video">
                            <?php echo $hotel_video; ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    $features = get_field('hotel_highlights');
                    if( $features ): ?>
                        <div class="cp-hotel-feature">
                            <h2>Features</h2>
                            <ul>
                                <?php foreach( $features as $feature ): ?>
                                    <li>
                                        <span>
                                            <img src="<?php echo $feature['value']; ?>" />
                                        </span>
                                        <p><?php echo $feature['label']; ?></p>
                                    </li>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php
                    $description = get_the_content();
                    if ( !empty($description) ): ?>
                        <div class="cp-hotel-con">
                            <h2>DETAILS</h2>
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    $gallery_img = get_field('hotel_gallery');
                    if( $gallery_img ): ?>
                        <div class="cp-hotel-gallery">
                            <h2>Hotel Gallery</h2>
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
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>