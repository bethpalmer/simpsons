<?php
/**
 * Menus configuration.
 *
 * @package Provise
 */

add_action( 'after_setup_theme', 'provise_register_menus', 5 );
function provise_register_menus() {

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'top'    => esc_html__( 'Top', 'provise' ),
		'main'   => esc_html__( 'Main', 'provise' ),
		'footer' => esc_html__( 'Footer', 'provise' ),
		'social' => esc_html__( 'Social', 'provise' ),
	) );
}
