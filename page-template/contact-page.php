<?php
/**
 * Template Name: Contact 
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

<section class="cn-contact-w">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <?php
                $description = get_the_content();
                if ( !empty($description) ): ?>
                    <div class="cn-contact-form">
                        <h3>We love to chat</h3>
                        <h2>Contact Us</h2>
                        <?php the_content(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="cn-contact-info">
                    <ul>
                        <?php
                        $address = get_field('company_address', 'option');
                        if ( !empty($address) ): ?>
                            <li>
                                <span class="cn-contact-icon">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/contact-icon-1.png" 
                                    alt="location-icon" />
                                </span>
                                <h4>Our Aaddress</h4>
                                <p><?php echo $address; ?></p>
                            </li>
                        <?php endif; ?>

                        <?php
                        $phone = get_field('company_phone', 'option');
                        if ( !empty($phone) ): ?>
                            <li>
                                <span class="cn-contact-icon">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/contact-icon-2.png" 
                                    alt="phone-icon" />
                                </span>
                                <h4>Call Us</h4>
                                <a href="tel:<?php echo preg_replace("/\s+/", "", $phone); ?>">
                                    +<?php echo $phone; ?>
                                </a>

                            </li>
                        <?php endif; ?>

                        <?php
                        $email = get_field('company_email', 'option');
                        if ( !empty($email) ): ?>
                            <li>
                                <span class="cn-contact-icon">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/contact-icon-3.png" 
                                    alt="email-icon" />
                                </span>
                                <h4>Email Us</h4>
                                <a href="mailto:<?php echo $email; ?>">
                                    <?php echo $email; ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php
                        $working_hours = get_field('company_working_hours', 'option');
                        if ( !empty($working_hours) ): ?>
                            <li>
                                <span class="cn-contact-icon">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/contact-icon-4.png" 
                                    alt="time-icon" />
                                </span>
                                <h4>Working Hours</h4>
                                <div class="c-contact-time">
                                    <?php echo $working_hours; ?>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
    $google_map = get_field('contact_google_map');
    if ( !empty($google_map) ): ?>
        <div class="cp-map-w">
            <div class="container">
                <?php echo $google_map; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>