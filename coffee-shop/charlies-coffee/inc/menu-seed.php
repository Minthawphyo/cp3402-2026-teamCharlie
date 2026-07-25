<?php
/**
 * One-time seed of menu categories + items (from the old static menu).
 * Runs on theme activate if no menu_item posts exist yet.
 *
 * @package Charlies_Coffee
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function charlies_coffee_seed_menu_defaults() {
	if ( get_option( 'charlies_coffee_menu_seeded' ) ) {
		return;
	}

	$existing = get_posts(
		array(
			'post_type'      => 'menu_item',
			'posts_per_page' => 1,
			'post_status'    => 'any',
			'fields'         => 'ids',
		)
	);
	if ( ! empty( $existing ) ) {
		update_option( 'charlies_coffee_menu_seeded', 1 );
		return;
	}

	$seed = array(
		array(
			'slug'    => 'espresso',
			'title'   => 'Espresso',
			'tagline' => 'Small cups, loud opinions.',
			'image'   => 'https://images.pexels.com/photos/18604200/pexels-photo-18604200.jpeg',
			'sort'    => 1,
			'items'   => array(
				array( 'Short Black', 'Single origin, ristretto pull', '4.00' ),
				array( 'Long Black', 'Double shot over hot water', '4.80' ),
				array( 'Macchiato', 'Espresso, dollop of textured milk', '4.60' ),
				array( 'Piccolo Latte', 'Ristretto in a 90ml glass', '4.80' ),
				array( 'Flat White', 'The classic — velvet microfoam', '5.20' ),
				array( 'Cappuccino', 'Chocolate dusting, gentle foam', '5.20' ),
				array( 'Cortado', '1:1 espresso to steamed milk', '5.00' ),
				array( 'Mocha', 'House ganache, single origin', '5.80' ),
			),
		),
		array(
			'slug'    => 'brewed',
			'title'   => 'Brewed',
			'tagline' => 'Slow methods, honest cups.',
			'image'   => 'https://images.pexels.com/photos/16541078/pexels-photo-16541078.jpeg',
			'sort'    => 2,
			'items'   => array(
				array( 'Batch Filter', 'Rotating single origin, brewed daily', '5.00' ),
				array( 'V60 Pour Over', 'Bright, clean, made to order', '6.50', true ),
				array( 'AeroPress', 'Full-bodied, brewed in front of you', '6.00' ),
				array( 'French Press', 'For sharing — 500ml carafe', '9.00' ),
				array( 'Chemex', 'Silky, tea-like, 400ml', '7.50' ),
				array( 'Syphon', 'Weekend feature only', '8.50' ),
				array( 'House Blend', 'Chocolate, hazelnut, brown sugar', '5.00' ),
				array( 'Decaf Filter', 'Swiss water processed', '5.00' ),
			),
		),
		array(
			'slug'    => 'cold',
			'title'   => 'Cold Drinks',
			'tagline' => 'For the walk back to campus.',
			'image'   => 'https://images.pexels.com/photos/4869290/pexels-photo-4869290.jpeg',
			'sort'    => 3,
			'items'   => array(
				array( 'Iced Long Black', 'Double shot, filtered water, ice', '5.20' ),
				array( 'Iced Latte', 'Cold milk, double shot', '5.80' ),
				array( 'Cold Brew', '24-hour steeped, tap poured', '6.20' ),
				array( 'Nitro Cold Brew', 'Creamy cascade, on tap', '7.20', true ),
				array( 'Espresso Tonic', 'Tonic, double shot, orange peel', '7.00' ),
				array( 'Iced Mocha', 'House ganache, cold milk', '6.40' ),
				array( 'Iced Matcha Latte', 'Ceremonial grade, cold milk', '6.80' ),
				array( 'Sparkling Cascara', 'Coffee cherry soda', '6.00' ),
			),
		),
		array(
			'slug'    => 'signature',
			'title'   => 'Signature',
			'tagline' => 'House-only. Try once, order forever.',
			'image'   => 'https://images.pexels.com/photos/5373256/pexels-photo-5373256.jpeg',
			'sort'    => 4,
			'items'   => array(
				array( 'The Lantern', 'Espresso, oat milk, burnt honey and a whisper of sea salt.', '6.80', true ),
				array( 'Campus Fuel', 'Triple shot flat white, 12oz', '6.20' ),
				array( 'Winter Miel', 'Cinnamon, wildflower honey, milk', '6.60' ),
				array( "Charlie's Affogato", 'Vanilla bean gelato, ristretto', '7.50' ),
				array( 'Maple Bourbon Latte', 'N/A bourbon syrup, maple, milk', '7.20' ),
				array( 'Peach Espresso Fizz', 'Peach shrub, espresso, soda', '7.40' ),
				array( 'Dirty Chai', 'Masala chai, ristretto shot', '6.60' ),
				array( 'Golden Turmeric', 'Turmeric, ginger, pepper, oat', '6.20' ),
			),
		),
		array(
			'slug'    => 'pastries',
			'title'   => 'Kitchen & Pastries',
			'tagline' => 'Baked at 5am, gone by 2pm.',
			'image'   => 'https://images.unsplash.com/photo-1515823662972-da6a2e4d3002',
			'sort'    => 5,
			'items'   => array(
				array( 'Butter Croissant', '72-hour cold ferment', '5.50' ),
				array( 'Almond Croissant', 'Frangipane, toasted almonds', '6.80' ),
				array( 'Sourdough Toast', 'Cultured butter, sea salt', '6.50' ),
				array( 'Avocado Sourdough', 'Chilli, lemon, dukkah', '13.50' ),
				array( 'Egg & Bacon Roll', 'Milk bun, tomato relish', '12.00' ),
				array( 'Bircher Muesli', 'Overnight oats, seasonal fruit', '10.50' ),
				array( 'Banana Bread', 'Toasted, cultured butter', '7.00' ),
				array( 'Chocolate Cookie', 'Big. Chewy. Yes.', '4.50' ),
			),
		),
	);

	$order = 0;
	foreach ( $seed as $cat ) {
		$term = term_exists( $cat['slug'], 'menu_category' );
		if ( ! $term ) {
			$term = wp_insert_term(
				$cat['title'],
				'menu_category',
				array( 'slug' => $cat['slug'] )
			);
		}
		if ( is_wp_error( $term ) ) {
			continue;
		}
		$term_id = (int) ( is_array( $term ) ? $term['term_id'] : $term );
		update_term_meta( $term_id, 'tagline', $cat['tagline'] );
		update_term_meta( $term_id, 'image', $cat['image'] );
		update_term_meta( $term_id, 'sort_order', $cat['sort'] );

		foreach ( $cat['items'] as $item ) {
			$order++;
			$post_id = wp_insert_post(
				array(
					'post_type'    => 'menu_item',
					'post_title'   => $item[0],
					'post_content' => $item[1],
					'post_status'  => 'publish',
					'menu_order'   => $order,
				),
				true
			);
			if ( is_wp_error( $post_id ) ) {
				continue;
			}
			update_post_meta( $post_id, '_menu_price', $item[2] );
			if ( ! empty( $item[3] ) ) {
				update_post_meta( $post_id, '_menu_featured', 1 );
			}
			wp_set_object_terms( $post_id, array( $term_id ), 'menu_category' );
		}
	}

	update_option( 'charlies_coffee_menu_seeded', 1 );
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'charlies_coffee_seed_menu_defaults' );

/**
 * Also seed once for sites that already have the theme active.
 */
function charlies_coffee_maybe_seed_menu() {
	if ( ! get_option( 'charlies_coffee_menu_seeded' ) && is_admin() ) {
		charlies_coffee_seed_menu_defaults();
	}
}
add_action( 'admin_init', 'charlies_coffee_maybe_seed_menu' );
