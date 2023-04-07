<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
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
<!doctype html>
<html <?php language_attributes(); ?> class="no-js" <?php kadence()->print_microdata( 'html' ); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="c-haeder-w">
    <div class="c-haeder-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="c-logo-w">
						<?php do_action( 'kadence_site_branding' ); ?>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="c-header-btn-list">
                        <ul>
						<?php
							$email = get_field('company_email', 'option');
							if ( !empty($email) ): ?>
								<li>
									<a href="mailto:<?php echo $email; ?>" class="c-border-btn">
										<span><i class="fas fa-envelope"></i></span>
										<?php echo $email; ?>
									</a>
								</li>
							<?php endif; ?>

							<?php
							$phone = get_field('company_phone', 'option');
							if ( !empty($phone) ): ?>
								<li>
									<a href="tel:<?php echo preg_replace("/\s+/", "", $phone); ?>" class="c-yellow-btn">
                                    	<span><i class="fas fa-phone-alt"></i></span>
                                    	+<?php echo $phone; ?>
									</a>
                                </a>
								</li>
							<?php endif; ?>

							<?php
							$enquire = get_field('company_enquire_link', 'option');
							if ( !empty($enquire) ): ?>
								<li>
									<a href="<?php echo $enquire; ?>" class="c-green-btn">
										Enquire Now
									</a>
								</li>
							<?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-haeder-bottom">
        <div class="container">
            <div class="c-haeder-bottom-in">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php
                        wp_nav_menu(
                            array(
                            'container' => false,
                            'menu_id' => 'menu-header-menu',
                            'menu_class' => 'navbar-nav ml-auto',
                            'menu' => 'Header menu',
                            'theme_location' => 'primary'
                            )
                        );                       
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>