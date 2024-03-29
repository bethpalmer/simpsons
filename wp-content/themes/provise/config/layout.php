<?php
/**
 * Layout configuration.
 *
 * @package Provise
 */

add_action( 'after_setup_theme', 'provise_set_layout', 5 );
function provise_set_layout() {

	provise_theme()->layout = array(
		'one-right-sidebar' => array(
			'1/3' => array(
				'content' => array( 'col-xs-12', 'col-md-12', 'col-lg-8' ),
				'sidebar' => array( 'col-xs-12', 'col-md-12', 'col-lg-4' ),
			),
			'1/4' => array(
				'content' => array( 'col-xs-12', 'col-md-12', 'col-lg-12', 'col-xl-9' ),
				'sidebar' => array( 'col-xs-12', 'col-md-12', 'col-lg-12', 'col-xl-3' ),
			),
		),
		'one-left-sidebar' => array(
			'1/3' => array(
				'content' => array( 'col-xs-12', 'col-md-8', 'col-md-push-4' ),
				'sidebar' => array( 'col-xs-12', 'col-md-4', 'col-md-pull-8' ),
			),
			'1/4' => array(
				'content' => array( 'col-xs-12', 'col-md-9', 'col-md-push-3' ),
				'sidebar' => array( 'col-xs-12', 'col-md-3', 'col-md-pull-9' ),
			),
		),
		'fullwidth' => array(
			array(
				'content' => array( 'col-xs-12', 'col-md-12' ),
			),
		),
	);
}
