<?php
/**
 * Template Name: Home 
 *
 * @package kadence
 */

namespace Kadence;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>

<?php if( have_rows('home_carousel') ): ?>
    <section class="c-banner-w"> 
        <?php while( have_rows('home_carousel') ) : the_row();
            $carousel_image = get_sub_field('carousel_image');
            $carousel_heading = get_sub_field('carousel_heading');
            $carousel_desc = get_sub_field('carousel_description');
            $carousel_book = get_sub_field('carousel_booknow'); ?>
            <div class="c-banner-in">
                <img src="<?php echo esc_url($carousel_image['url']); ?>" 
                alt="<?php echo esc_attr($carousel_image['alt']); ?>" />
                <div class="c-banner-con">
                    <div class="container">
                        <h2><?php echo $carousel_heading; ?></h2>
                        <?php echo $carousel_desc; ?>
                        <a href="<?php echo $carousel_book; ?>" class="c-btn-1">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </section>
<?php endif; ?>

<?php if( have_rows('home_discount_banner') ): ?>
    <section class="c-offer-w">
        <div class="container">
            <div class="row">
                <?php while( have_rows('home_discount_banner') ) : the_row();
                    $banner_image = get_sub_field('banner_photo');
                    $banner_link = get_sub_field('banner_link'); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="c-offer-w">
                            <img src="<?php echo esc_url($banner_image['url']); ?>" 
                            alt="<?php echo esc_attr($banner_image['alt']); ?>">
                            <a href="<?php echo $banner_link; ?>"></a>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php 
$args = array( 
    'post_type' => 'tour',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy'  => 'tourcat',
            'terms'     =>  'domestic-tours',
            'field'     => 'slug'
        )
    )
);
$loop = new \WP_Query( $args );
if ( $loop->have_posts() ): ?>
    <section class="c-tour-w">
        <div class="container">
            <h2>Domestic Tours</h2>
            <div class="row">
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
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

                                <?php $tour_excerpt =  get_field('tour_short_description');
                                if (!empty($tour_excerpt)):
                                    echo $tour_excerpt;
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
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php 
$args = array( 
    'post_type' => 'tour',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy'  => 'tourcat',
            'terms'     =>  'international-tours',
            'field'     => 'slug'
        )
    )
);
$loop = new \WP_Query( $args );
if ( $loop->have_posts() ): ?>
    <section class="c-tour-w c-internayinal-w">
        <div class="container">
            <h2> International Tours</h2>
            <div class="row">
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
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

                                <?php $tour_excerpt =  get_field('tour_short_description');
                                if (!empty($tour_excerpt)):
                                    echo $tour_excerpt;
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
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="c-infrastructural-w">
    <div class="container">
        <div class="c-infrastructural-in">
            <?php
            $about_img = get_field('home_about_image');
            if (!empty($about_img)): ?>
                <div class="c-infrastructural-img ">
                    <img src="<?php echo esc_url($about_img['url']); ?>" 
                    alt="<?php echo esc_attr($about_img['alt']); ?>" />
                </div>
            <?php endif; ?>

            <?php
            $about_desc = get_field('home_about_description');
            if (!empty($about_desc)): ?>
                <div class="c-infrastructural-con ">
                    <h2 class="c-haeding-1">ABOUT US</h2>
                    <?php echo $about_desc; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php 
$args = array( 
    'post_type' => 'hotel',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'order' => 'ASC',
);
$loop = new \WP_Query( $args );
if ( $loop->have_posts() ): ?>
    <section class="c-other-hotel">
        <div class="container">
            <h2>OUR HOTES</h2>
            <div class="row">
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
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
                                    echo '<p>'.wp_trim_words($hotel_excerpt, 10).'</p>';
                                endif; ?>

                                <?php
                                $hotel_link = get_the_permalink();
                                if (!empty($hotel_link)):
                                    echo '<a class="c-btn-1" href="'.$hotel_link.'">';
                                    echo '<span>View Hotel</span>';
                                    echo '</a>';
                                endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php 
$args = array( 
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'order' => 'ASC',
);
$loop = new \WP_Query( $args );
if ( $loop->have_posts() ): ?>
    <section class="c-blog-w">
        <div class="particles-js" id="prtcl4"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 ">
                    <div class="c-blog-heading">
                        <h2 class="c-haeding-1">Our Blog</h2>
                        <?php
                        $blog_shortdesc = get_field('home_blog_description');
                        if (!empty($blog_shortdesc)):
                            echo $blog_shortdesc;
                        endif; ?>
                    </div>
                </div>
                <div class="col-md-8 ">
                    <div class="c-blog-list ">
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <div class="c-blog-box">
                                <div class="c-blog-box-in">
                                    <div class="c-blog-box-img">
                                        <?php
                                        if (has_post_thumbnail()): 
                                            the_post_thumbnail('medium_large');
                                        else: 
                                            echo '<img src="https://via.placeholder.com/750x450.jpg" 
                                            alt="placeholder" />';
                                        endif; ?>
                                    </div>
                                    <div class="c-blog-box-con">
                                        <?php
                                        $blog_title = get_the_title();
                                        if (!empty($blog_title)): 
                                            echo '<h4>'.$blog_title.'</h4>';
                                        endif; ?>
                                        
                                        <?php
                                        $blog_excerpt = get_the_excerpt();
                                        if (!empty($blog_excerpt)):
                                            echo '<p>'.wp_trim_words($blog_excerpt, 18).'</p>';
                                        endif; ?>

                                        <?php
                                        $blog_link = get_the_permalink();
                                        if (!empty($blog_link)):
                                            echo '<a href="'.$blog_link.'">';
                                            echo 'Read More';
                                            echo '</a>';
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>