<?php
/**
 * Static menu content for the brochure Menu page.
 * Edit here, or later replace with WordPress custom fields / CPT.
 *
 * @package Charlies_Coffee
 */

function charlies_coffee_get_menu_categories() {
	return array(
		array(
			'id'      => 'espresso',
			'title'   => 'Espresso',
			'tagline' => 'Small cups, loud opinions.',
			'image'   => 'https://images.pexels.com/photos/18604200/pexels-photo-18604200.jpeg',
			'items'   => array(
				array( 'name' => 'Short Black', 'desc' => 'Single origin, ristretto pull', 'price' => '4.00' ),
				array( 'name' => 'Long Black', 'desc' => 'Double shot over hot water', 'price' => '4.80' ),
				array( 'name' => 'Macchiato', 'desc' => 'Espresso, dollop of textured milk', 'price' => '4.60' ),
				array( 'name' => 'Piccolo Latte', 'desc' => 'Ristretto in a 90ml glass', 'price' => '4.80' ),
				array( 'name' => 'Flat White', 'desc' => 'The classic — velvet microfoam', 'price' => '5.20' ),
				array( 'name' => 'Cappuccino', 'desc' => 'Chocolate dusting, gentle foam', 'price' => '5.20' ),
				array( 'name' => 'Cortado', 'desc' => '1:1 espresso to steamed milk', 'price' => '5.00' ),
				array( 'name' => 'Mocha', 'desc' => 'House ganache, single origin', 'price' => '5.80' ),
			),
		),
		array(
			'id'      => 'brewed',
			'title'   => 'Brewed',
			'tagline' => 'Slow methods, honest cups.',
			'image'   => 'https://images.pexels.com/photos/16541078/pexels-photo-16541078.jpeg',
			'items'   => array(
				array( 'name' => 'Batch Filter', 'desc' => 'Rotating single origin, brewed daily', 'price' => '5.00' ),
				array( 'name' => 'V60 Pour Over', 'desc' => 'Bright, clean, made to order', 'price' => '6.50' ),
				array( 'name' => 'AeroPress', 'desc' => 'Full-bodied, brewed in front of you', 'price' => '6.00' ),
				array( 'name' => 'French Press', 'desc' => 'For sharing — 500ml carafe', 'price' => '9.00' ),
				array( 'name' => 'Chemex', 'desc' => 'Silky, tea-like, 400ml', 'price' => '7.50' ),
				array( 'name' => 'Syphon', 'desc' => 'Weekend feature only', 'price' => '8.50' ),
				array( 'name' => 'House Blend', 'desc' => 'Chocolate, hazelnut, brown sugar', 'price' => '5.00' ),
				array( 'name' => 'Decaf Filter', 'desc' => 'Swiss water processed', 'price' => '5.00' ),
			),
		),
		array(
			'id'      => 'cold',
			'title'   => 'Cold Drinks',
			'tagline' => 'For the walk back to campus.',
			'image'   => 'https://images.pexels.com/photos/4869290/pexels-photo-4869290.jpeg',
			'items'   => array(
				array( 'name' => 'Iced Long Black', 'desc' => 'Double shot, filtered water, ice', 'price' => '5.20' ),
				array( 'name' => 'Iced Latte', 'desc' => 'Cold milk, double shot', 'price' => '5.80' ),
				array( 'name' => 'Cold Brew', 'desc' => '24-hour steeped, tap poured', 'price' => '6.20' ),
				array( 'name' => 'Nitro Cold Brew', 'desc' => 'Creamy cascade, on tap', 'price' => '7.20' ),
				array( 'name' => 'Espresso Tonic', 'desc' => 'Tonic, double shot, orange peel', 'price' => '7.00' ),
				array( 'name' => 'Iced Mocha', 'desc' => 'House ganache, cold milk', 'price' => '6.40' ),
				array( 'name' => 'Iced Matcha Latte', 'desc' => 'Ceremonial grade, cold milk', 'price' => '6.80' ),
				array( 'name' => 'Sparkling Cascara', 'desc' => 'Coffee cherry soda', 'price' => '6.00' ),
			),
		),
		array(
			'id'      => 'signature',
			'title'   => 'Signature',
			'tagline' => 'House-only. Try once, order forever.',
			'image'   => 'https://images.pexels.com/photos/5373256/pexels-photo-5373256.jpeg',
			'items'   => array(
				array( 'name' => 'The Lantern', 'desc' => 'Espresso, oat, burnt honey, sea salt', 'price' => '6.80' ),
				array( 'name' => 'Campus Fuel', 'desc' => 'Triple shot flat white, 12oz', 'price' => '6.20' ),
				array( 'name' => 'Winter Miel', 'desc' => 'Cinnamon, wildflower honey, milk', 'price' => '6.60' ),
				array( 'name' => "Charlie's Affogato", 'desc' => 'Vanilla bean gelato, ristretto', 'price' => '7.50' ),
				array( 'name' => 'Maple Bourbon Latte', 'desc' => 'N/A bourbon syrup, maple, milk', 'price' => '7.20' ),
				array( 'name' => 'Peach Espresso Fizz', 'desc' => 'Peach shrub, espresso, soda', 'price' => '7.40' ),
				array( 'name' => 'Dirty Chai', 'desc' => 'Masala chai, ristretto shot', 'price' => '6.60' ),
				array( 'name' => 'Golden Turmeric', 'desc' => 'Turmeric, ginger, pepper, oat', 'price' => '6.20' ),
			),
		),
		array(
			'id'      => 'pastries',
			'title'   => 'Kitchen & Pastries',
			'tagline' => 'Baked at 5am, gone by 2pm.',
			'image'   => 'https://images.unsplash.com/photo-1515823662972-da6a2e4d3002',
			'items'   => array(
				array( 'name' => 'Butter Croissant', 'desc' => '72-hour cold ferment', 'price' => '5.50' ),
				array( 'name' => 'Almond Croissant', 'desc' => 'Frangipane, toasted almonds', 'price' => '6.80' ),
				array( 'name' => 'Sourdough Toast', 'desc' => 'Cultured butter, sea salt', 'price' => '6.50' ),
				array( 'name' => 'Avocado Sourdough', 'desc' => 'Chilli, lemon, dukkah', 'price' => '13.50' ),
				array( 'name' => 'Egg & Bacon Roll', 'desc' => 'Milk bun, tomato relish', 'price' => '12.00' ),
				array( 'name' => 'Bircher Muesli', 'desc' => 'Overnight oats, seasonal fruit', 'price' => '10.50' ),
				array( 'name' => 'Banana Bread', 'desc' => 'Toasted, cultured butter', 'price' => '7.00' ),
				array( 'name' => 'Chocolate Cookie', 'desc' => 'Big. Chewy. Yes.', 'price' => '4.50' ),
			),
		),
	);
}
