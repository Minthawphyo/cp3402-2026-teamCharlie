<?php
/**
 * Charlie's Coffee theme functions.
 *
 * @package Charlies_Coffee
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CHARLIES_COFFEE_VERSION', '1.5.0' );

require get_template_directory() . '/inc/menu-cpt.php';
require get_template_directory() . '/inc/menu-seed.php';
require get_template_directory() . '/inc/nav-seed.php';
require get_template_directory() . '/inc/customizer.php';

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

/**
 * Fallback nav output if no menu is assigned to the 'primary' location
 * (shouldn't normally happen - charlies_coffee_seed_primary_menu() creates
 * one on activation - but this keeps the header from going blank if the
 * assigned menu is ever deleted).
 */
function charlies_coffee_nav_fallback() {
	$links = array(
		'home'    => array( 'label' => __( 'Home', 'charlies-coffee' ), 'fallback' => '/' ),
		'menu'    => array( 'label' => __( 'Menu', 'charlies-coffee' ), 'fallback' => '/menu/' ),
		'about'   => array( 'label' => __( 'About', 'charlies-coffee' ), 'fallback' => '/about/' ),
		'contact' => array( 'label' => __( 'Find Us', 'charlies-coffee' ), 'fallback' => '/contact/' ),
	);

	foreach ( $links as $slug => $link ) {
		$url    = 'home' === $slug ? home_url( '/' ) : charlies_coffee_page_url( $slug, $link['fallback'] );
		$active = charlies_coffee_is_page( $slug ) ? ' current-menu-item' : '';
		printf(
			'<li class="menu-item%s"><a href="%s">%s</a></li>',
			esc_attr( $active ),
			esc_url( $url ),
			esc_html( $link['label'] )
		);
	}
}

/**
 * Homepage hero content - pulled from the static front page in wp-admin
 * if one is set (Settings -> Reading), so it's editable without code.
 * Falls back to the original copy if no front page is configured.
 */
function charlies_coffee_get_hero_content() {
	$defaults = array(
		'heading' => 'Coffee worth <br><span class="em">walking</span> for.',
		'lead'    => 'Charlie’s is a small-batch cafe for students, locals and everyone in between. Slow-brewed drinks, honest pastries, and a corner booth with your name on it.',
	);

	$front_id = (int) get_option( 'page_on_front' );
	if ( ! $front_id ) {
		return $defaults;
	}

	$front = get_post( $front_id );
	if ( ! $front || 'publish' !== $front->post_status ) {
		return $defaults;
	}

	$title   = trim( get_the_title( $front ) );
	$content = trim( wp_strip_all_tags( $front->post_content ) );

	return array(
		'heading' => $title ? esc_html( $title ) : $defaults['heading'],
		'lead'    => $content ? $content : $defaults['lead'],
	);
}
