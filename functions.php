<?php

/**
 * Enqueue theme assets
 */
function child_enqueue_assets() {
	// CSS
	wp_enqueue_style( 'kadence-bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), 100 );
	wp_enqueue_style( 'kadence-animate', get_stylesheet_directory_uri() . '/assets/css/animate.min.css', array(), 100 );
	wp_enqueue_style( 'kadence-fontawesome', get_stylesheet_directory_uri() . '/assets/css/fontawesome.min.css', array(), 100 );
	wp_enqueue_style( 'kadence-lightbox', get_stylesheet_directory_uri() . '/assets/css/lightbox.min.css', array(), 100 );
	wp_enqueue_style( 'kadence-slick', get_stylesheet_directory_uri() . '/assets/css/slick.css', array(), 100 );
	wp_enqueue_style( 'kadence-custom', get_stylesheet_directory_uri() . '/assets/css/custom.css', array(), 100 );
	wp_enqueue_style( 'kadence-responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css', array(), 100 );
	wp_enqueue_style( 'kadence-developer', get_stylesheet_directory_uri() . '/assets/css/developer.css', array(), 100 );
	wp_enqueue_style( 'child-theme', get_stylesheet_directory_uri() . '/style.css', array(), 100 );
	
	// JS
	wp_enqueue_script( 'kadence-bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), 100, true );
	wp_enqueue_script( 'kadence-slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'), 100, true );
	wp_enqueue_script( 'kadence-lightbox', get_stylesheet_directory_uri() . '/assets/js/lightbox.min.js', array('jquery'), 100, true );
	wp_enqueue_script( 'kadence-custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array(), 100, true );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_assets' );

// Remove <p> Tag From Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

// Add ACF theme option.
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Beboundless Trip',
        'menu_title'    => 'Company',
        'menu_slug'     => 'beboundless-company',
        'icon_url'      => 'dashicons-portfolio',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}
