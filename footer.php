<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kadence
 */

namespace Kadence;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<footer class="c-footer-w">
	<?php
	// Hook before footer
	get_template_part( 'template-parts/before_footer' ); 
	?>
    <div class="c-footer-midel">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="c-footer-form">
                    <?php
                    if ( is_active_sidebar( 'footer1' ) ) :
                        dynamic_sidebar( 'footer1' );
                    endif;
                    ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="c-footer-nav">
                        <div class="c-footer-nav-in">
                            <h4>Navigation</h4>
                            <?php
                            wp_nav_menu(
                                array(
                                'container' => false,
                                'menu' => 'Footer menu',
                                'theme_location' => 'footer'
                                )
                            );                       
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="c-footer-contact">
                        <h4>Contact us</h4>
                        <ul>
							<?php
							$address = get_field('company_address', 'option');
							if ( !empty($address) ): ?>
								<li>
									<i class="fas fa-map-marker-alt"></i>
									<p><?php echo $address; ?></p>
								</li>
							<?php endif; ?>

							<?php
							$phone = get_field('company_phone', 'option');
							if ( !empty($phone) ): ?>
								<li>
									<i class="fas fa-phone-alt"></i>
									<p>
										<a href="tel:<?php echo preg_replace("/\s+/", "", $phone); ?>">
											+<?php echo $phone; ?>
										</a>
									</p>
								</li>
							<?php endif; ?>

							<?php
							$email = get_field('company_email', 'option');
							if ( !empty($email) ): ?>
								<li>
									<i class="fas fa-envelope"></i>
									<p>
										<a href="maito:<?php echo $email; ?>">
											<?php echo $email; ?>
										</a>
									</p>
								</li>
							<?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="c-footer-social">
						<?php
						if( have_rows('company_social_media', 'option') ):
							echo '<ul>';
								while ( have_rows('company_social_media', 'option') ) : the_row();
									$profile_icon = get_sub_field('social_media_icon', 'option');
									$profile_link = get_sub_field('social_media_url', 'option');
									echo '<li>';
									echo '<a href="' . $profile_link . '" target="_blank">';
									echo $profile_icon;
									echo '</a>';
									echo '</li>';
								endwhile;
							echo '</ul>';
						endif;
						?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="c-footer-text">
						<?php do_action( 'kadence_footer_html' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>