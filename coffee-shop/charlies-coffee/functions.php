<?php
/**
 * Charlie's Coffee theme functions.
 *
 * @package Charlies_Coffee
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CHARLIES_COFFEE_VERSION', '1.0.1' );

require get_template_directory() . '/inc/menu-data.php';

function charlies_coffee_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'charlies-coffee' ),
			'footer'  => __( 'Footer Menu', 'charlies-coffee' ),
		)
	);
}
add_action( 'after_setup_theme', 'charlies_coffee_setup' );

function charlies_coffee_scripts() {
	wp_enqueue_style(
		'charlies-fonts',
		'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=DM+Sans:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'charlies-coffee-style',
		get_stylesheet_uri(),
		array( 'charlies-fonts' ),
		CHARLIES_COFFEE_VERSION
	);

	wp_enqueue_script(
		'charlies-coffee-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		CHARLIES_COFFEE_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'charlies_coffee_scripts' );

/**
 * Helper: URL for a page by slug, with fallback path.
 */
function charlies_coffee_page_url( $slug, $fallback = '#' ) {
	$page = get_page_by_path( $slug );
	if ( $page ) {
		return get_permalink( $page );
	}
	return home_url( '/' . ltrim( $fallback, '/' ) );
}

/**
 * Whether current request matches a page slug / front page.
 */
function charlies_coffee_is_page( $slug ) {
	if ( 'home' === $slug ) {
		return is_front_page();
	}
	return is_page( $slug );
}
