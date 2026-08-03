<?php
/**
 * Site-wide contact/hours settings, editable in Appearance -> Customize.
 * Single source of truth for footer.php and template-contact.php, instead
 * of the same info being hardcoded separately in both places.
 *
 * @package Charlies_Coffee
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Defaults match the copy that used to be hardcoded directly in the
 * footer and contact templates.
 */
function charlies_coffee_contact_defaults() {
	return array(
		'address'        => "42 Lantern Lane\nTownsville QLD 4810",
		'phone'          => '(07) 4772 0000',
		'hours'          => 'Every day · 9:00a – 8:00p',
		'email'          => 'hello@charliescoffee.com.au',
		'footer_tagline' => "A student-friendly cafe on the corner — good beans, honest pastries, and a table that&rsquo;s always yours.",
	);
}

/**
 * Get one contact/hours setting, falling back to the default if unset.
 *
 * @param string $key One of: address, phone, hours, email, footer_tagline.
 * @return string
 */
function charlies_coffee_get_contact( $key ) {
	$defaults = charlies_coffee_contact_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return get_theme_mod( 'charlies_coffee_' . $key, $default );
}

function charlies_coffee_customize_register( $wp_customize ) {
	$defaults = charlies_coffee_contact_defaults();

	$wp_customize->add_section(
		'charlies_coffee_contact',
		array(
			'title'    => __( 'Shop Details', 'charlies-coffee' ),
			'priority' => 30,
		)
	);

	$fields = array(
		'address'        => array( 'label' => __( 'Address', 'charlies-coffee' ), 'type' => 'textarea' ),
		'phone'          => array( 'label' => __( 'Phone', 'charlies-coffee' ), 'type' => 'text' ),
		'hours'          => array( 'label' => __( 'Opening hours', 'charlies-coffee' ), 'type' => 'text' ),
		'email'          => array( 'label' => __( 'Contact email', 'charlies-coffee' ), 'type' => 'email' ),
		'footer_tagline' => array( 'label' => __( 'Footer tagline', 'charlies-coffee' ), 'type' => 'textarea' ),
	);

	foreach ( $fields as $key => $field ) {
		$setting_id = 'charlies_coffee_' . $key;

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => 'email' === $field['type'] ? 'sanitize_email' : 'sanitize_textarea_field',
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $field['label'],
				'section' => 'charlies_coffee_contact',
				'type'    => $field['type'],
			)
		);
	}
}
add_action( 'customize_register', 'charlies_coffee_customize_register' );
