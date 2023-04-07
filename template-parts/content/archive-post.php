<?php
/**
 * The main archive template file for inner content.
 *
 * @package kadence
 */

namespace Kadence;

/**
 * Hook for Hero Section
 */
get_template_part( 'template-parts/archive_hero' );
?>

<section class="cp-blog-w">
    <div class="container">
        <div class="row">
            <?php if ( have_posts() ) { ?>
                <div class="col-lg-9 col-md-12">
                    <div class="cp-blog-list">
                        <div class="row">
                            <?php while ( have_posts() ) { 
                                the_post(); ?>
                                <div class="col-lg-6 col-md-12">
                                    <div class="cp-blog-box">
                                        <div class="cp-blog-list-img">
                                            <?php
                                            if (has_post_thumbnail()): 
                                                the_post_thumbnail('medium_large');
                                            else: 
                                                echo '<img src="https://via.placeholder.com/750x450.jpg" 
                                                alt="placeholder" />';
                                            endif; ?>
                                        </div>

                                        <div class="cp-blog-list-con">
                                            <?php
                                            $blog_title = get_the_title();
                                            if (!empty($blog_title)): ?>
                                                <h3>
                                                    <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?> 
                                                    </a>
                                                </h3>
                                            <?php endif; ?>
                                            <ul>
                                                <?php 
                                                $author_name = get_the_author_meta('display_name');
                                                if (!empty($author_name)): ?>
                                                    <li>
                                                        <span><i class="far fa-user"></i></span>
                                                        <?php echo $author_name; ?>
                                                    </li>
                                                <?php endif; ?>

                                                <?php
                                                $pub_date = get_the_time('m M, Y');
                                                if (!empty($pub_date)): ?>
                                                    <li>
                                                        <span><i class="far fa-clock"></i></span>
                                                        <?php echo $pub_date; ?>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                                
                                            <?php
                                            $blog_excerpt = get_the_excerpt();
                                            if (!empty($blog_excerpt)):
                                                echo '<p>'.wp_trim_words($blog_excerpt, 15).'</p>';
                                            endif; ?>

                                            <?php
                                            $blog_link = get_the_permalink();
                                            if (!empty($blog_link)):
                                                echo '<a class="c-btn-2" href="'.$blog_link.'">';
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
                </div>
            <?php 
            } else{
                get_template_part( 'template-parts/error' );
            } ?>

            <div class="col-lg-3 col-md-12">
                <div class="c-blog-enquery-w">
                    <?php
                    $enquire_form = get_field('company_enquire_form', 'option');
                    if ( !empty($enquire_form) ):
                        echo '<div class="c-hotel-enquery-in">';
                            echo do_shortcode($enquire_form);
                        echo '</div>';
                    endif;
                    ?>
                </div>
                <!-- <div class="c-search-w">
                    <h4>Search</h4>
                    <form method="GET" action="https://rossalighting.com">
                        <input type="text" name="s" placeholder="Search...">
                        <button type="submit"> <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
</section>