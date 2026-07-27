<?php
/**
 * Auto-create the Primary Menu nav_menu and assign it to the 'primary'
 * theme location, so the header actually uses wp_nav_menu() output
 * instead of hard-coded links, on first activation.
 *
 * @package Charlies_Coffee
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function charlies_coffee_seed_primary_menu() {
	$locations = get_theme_mod( 'nav_menu_locations', array() );
	if ( ! is_array( $locations ) ) {
		$locations = array();
	}

	if ( ! empty( $locations['primary'] ) && wp_get_nav_menu_object( $locations['primary'] ) ) {
		return;
	}

	$menu = wp_get_nav_menu_object( 'Primary Menu' );
	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( 'Primary Menu' );
		if ( is_wp_error( $menu_id ) ) {
			return;
		}
	} else {
		$menu_id = $menu->term_id;
	}

	$existing_items = wp_get_nav_menu_items( $menu_id );
	if ( empty( $existing_items ) ) {
		$links = array(
			array(
				'title' => __( 'Home', 'charlies-coffee' ),
				'slug'  => '',
			),
			array(
				'title'    => __( 'Menu', 'charlies-coffee' ),
				'slug'     => 'menu',
				'fallback' => '/menu/',
			),
			array(
				'title'    => __( 'About', 'charlies-coffee' ),
				'slug'     => 'about',
				'fallback' => '/about/',
			),
			array(
				'title'    => __( 'Find Us', 'charlies-coffee' ),
				'slug'     => 'contact',
				'fallback' => '/contact/',
			),
		);

		$position = 1;
		foreach ( $links as $link ) {
			$page = $link['slug'] ? get_page_by_path( $link['slug'] ) : null;

			if ( $page ) {
				wp_update_nav_menu_item(
					$menu_id,
					0,
					array(
						'menu-item-title'     => $link['title'],
						'menu-item-object'    => 'page',
						'menu-item-object-id' => $page->ID,
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
						'menu-item-position'  => $position,
					)
				);
			} else {
				$url = $link['slug'] ? home_url( $link['fallback'] ) : home_url( '/' );
				wp_update_nav_menu_item(
					$menu_id,
					0,
					array(
						'menu-item-title'    => $link['title'],
						'menu-item-url'      => $url,
						'menu-item-type'     => 'custom',
						'menu-item-status'   => 'publish',
						'menu-item-position' => $position,
					)
				);
			}
			$position++;
		}
	}

	$locations['primary'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}
add_action( 'after_switch_theme', 'charlies_coffee_seed_primary_menu' );
add_action( 'admin_init', 'charlies_coffee_seed_primary_menu' );
