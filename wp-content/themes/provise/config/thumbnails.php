<?php
/**
 * Thumbnails configuration.
 *
 * @package Provise
 */

add_action( 'after_setup_theme', 'provise_register_image_sizes', 5 );
function provise_register_image_sizes() {
	set_post_thumbnail_size( 640, 506, true );

	// Registers a new image sizes.
	add_image_size( 'provise-thumb-s', 130, 136, true );
	add_image_size( 'provise-thumb-sm', 388, 276, true );
	add_image_size( 'provise-thumb-m', 400, 400, true );
	add_image_size( 'provise-thumb-blog-module', 536, 282, true );
	add_image_size( 'provise-thumb-blog-grid', 536, 505, true );
	add_image_size( 'provise-thumb-l', 1280, 506, true );
	add_image_size( 'provise-thumb-xl', 1920, 1080, true );
	add_image_size( 'provise-author-avatar', 512, 512, true );

	add_image_size( 'provise-thumb-240-100', 240, 100, true );
	add_image_size( 'provise-thumb-560-350', 560, 350, true );
	add_image_size( 'provise-thumb-370-200', 370, 200, true );
	add_image_size( 'provise-thumb-370-270', 370, 270, true );
}
