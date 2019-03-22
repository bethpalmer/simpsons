<?php
/**
 * Theme Customizer.
 *
 * @package Provise
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function provise_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'provise_get_customizer_options' , array(
		'prefix'     => 'provise',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(

			/** `Site Indentity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline after logo', 'provise' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'   => esc_html__( 'Show ToTop button', 'provise' ),
				'section' => 'title_tagline',
				'priority' => 61,
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'provise' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'general_settings' => array(
				'title'       => esc_html__( 'General Site settings', 'provise' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Logo & Favicon` section */
			'logo_favicon' => array(
				'title'       => esc_html__( 'Logo &amp; Favicon', 'provise' ),
				'priority'    => 25,
				'panel'       => 'general_settings',
				'type'        => 'section',
			),
			'header_logo_type' => array(
				'title'   => esc_html__( 'Logo Type', 'provise' ),
				'section' => 'logo_favicon',
				'default' => 'image',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'provise' ),
					'text'  => esc_html__( 'Text', 'provise' ),
				),
				'type' => 'control',
			),
			'header_logo_url' => array(
				'title'           => esc_html__( 'Logo Upload', 'provise' ),
				'description'     => esc_html__( 'Upload logo image', 'provise' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'provise_is_header_logo_image',
			),
			'retina_header_logo_url' => array(
				'title'           => esc_html__( 'Retina Logo Upload', 'provise' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'provise' ),
				'section'         => 'logo_favicon',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'provise_is_header_logo_image',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'provise' ),
				'section'         => 'logo_favicon',
				'default'         => 'Arial, Helvetica, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
				'active_callback' => 'provise_is_header_logo_text',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'provise' ),
				'section'         => 'logo_favicon',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => provise_get_font_styles(),
				'type'            => 'control',
				'active_callback' => 'provise_is_header_logo_text',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'provise' ),
				'section'         => 'logo_favicon',
				'default'         => '700',
				'field'           => 'select',
				'choices'         => provise_get_font_weight(),
				'type'            => 'control',
				'active_callback' => 'provise_is_header_logo_text',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'provise' ),
				'section'         => 'logo_favicon',
				'default'         => '70',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'provise_is_header_logo_text',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'provise' ),
				'section'         => 'logo_favicon',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => provise_get_character_sets(),
				'type'            => 'control',
				'active_callback' => 'provise_is_header_logo_text',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'provise' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'provise' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'provise' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_page_title' => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'provise' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'provise' ),
				'section' => 'breadcrumbs',
				'default' => 'minified',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'provise' ),
					'minified' => esc_html__( 'Minified', 'provise' ),
				),
				'type'    => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'provise' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'provise' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'provise' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to blog posts', 'provise' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to single blog post', 'provise' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'provise' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_container_type' => array(
			 	'title'   => esc_html__( 'Header type', 'provise' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'provise' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'provise' ),
				),
				'type' => 'control',
			),
			'content_container_type' => array(
				'title'   => esc_html__( 'Content type', 'provise' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'provise' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'provise' ),
				),
				'type' => 'control',
			),
			'footer_container_type' => array(
				'title'   => esc_html__( 'Footer type', 'provise' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'provise' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'provise' ),
				),
				'type' => 'control',
			),
			'container_width' => array(
				'title'       => esc_html__( 'Container width (px)', 'provise' ),
				'section'     => 'page_layout',
				'default'     => 1200,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'provise' ),
				'section' => 'page_layout',
				'default' => '1/4',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'provise' ),
				'description' => esc_html__( 'Configure Color Scheme', 'provise' ),
				'priority'    => 40,
				'type'        => 'panel',
			),


			/** `Gradient` section */
			'gradient_scheme' => array(
				'title'    => esc_html__( 'Gradient scheme', 'provise' ),
				'priority' => 1,
				'panel'    => 'color_scheme',
				'type'     => 'section',
			),
			'gradient_color_1' => array(
				'title'   => esc_html__( 'Color (1)', 'provise' ),
				'section' => 'gradient_scheme',
				'default' => '#4b91ae',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'gradient_color_2' => array(
				'title'   => esc_html__( 'Color (2)', 'provise' ),
				'section' => 'gradient_scheme',
				'default' => '#3d759a',
				'field'   => 'hex_color',
				'type'    => 'control',
			),


			/** `Regular scheme` section */
			'regular_scheme' => array(
				'title'       => esc_html__( 'Regular scheme', 'provise' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'regular_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'provise' ),
				'section' => 'regular_scheme',
				'default' => '#50a4c9',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'provise' ),
				'section' => 'regular_scheme',
				'default' => '#373d43',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'provise' ),
				'section' => 'regular_scheme',
				'default' => '#1f3450',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			'regular_text_color' => array(
				'title'   => esc_html__( 'Text color', 'provise' ),
				'section' => 'regular_scheme',
				'default' => '#8d8d8d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_color' => array(
				'title'   => esc_html__( 'Link color', 'provise' ),
				'section' => 'regular_scheme',
				'default' => '#50a4c9',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'provise' ),
				'section' => 'regular_scheme',
				'default' => '#373d43',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'provise' ),
				'section' => 'regular_scheme',
				'default' => '#2b2b2b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'provise' ),
				'section' => 'regular_scheme',
				'default' => '#414141',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'provise' ),
				'section' => 'regular_scheme',
				'default' => '#414141',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'provise' ),
				'section' => 'regular_scheme',
				'default' => '#414141',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'provise' ),
				'section' => 'regular_scheme',
				'default' => '#414141',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'provise' ),
				'section' => 'regular_scheme',
				'default' => '#414141',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Invert scheme` section */
			'invert_scheme' => array(
				'title'       => esc_html__( 'Invert scheme', 'provise' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'invert_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'provise' ),
				'section' => 'invert_scheme',
				'default' => '#bec1c5',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'provise' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			'invert_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'provise' ),
				'section' => 'invert_scheme',
				'default' => '#8bd9ff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			'invert_text_color' => array(
				'title'   => esc_html__( 'Text color', 'provise' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_color' => array(
				'title'   => esc_html__( 'Link color', 'provise' ),
				'section' => 'invert_scheme',
				'default' => '#50a4c9',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'provise' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'provise' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'provise' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'provise' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'provise' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'provise' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'provise' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'provise' ),
				'description' => esc_html__( 'Configure typography settings', 'provise' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'provise' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'provise' ),
				'section' => 'body_typography',
				'default' => 'Trebuchet MS, Helvetica, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'provise' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => provise_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'provise' ),
				'section' => 'body_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => provise_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'provise' ),
				'section'     => 'body_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'provise' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'provise' ),
				'section'     => 'body_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'provise' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'provise' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => provise_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'provise' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => provise_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'       => esc_html__( 'H1 Heading', 'provise' ),
				'priority'    => 10,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'provise' ),
				'section' => 'h1_typography',
				'default' => 'Trebuchet MS, Helvetica, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'provise' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => provise_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'provise' ),
				'section' => 'h1_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => provise_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'provise' ),
				'section'     => 'h1_typography',
				'default'     => '48',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'provise' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'provise' ),
				'section'     => 'h1_typography',
				'default'     => '1.139',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'provise' ),
				'section'     => 'h1_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'provise' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => provise_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'provise' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => provise_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'       => esc_html__( 'H2 Heading', 'provise' ),
				'priority'    => 15,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'provise' ),
				'section' => 'h2_typography',
				'default' => 'Trebuchet MS, Helvetica, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'provise' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => provise_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'provise' ),
				'section' => 'h2_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => provise_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'provise' ),
				'section'     => 'h2_typography',
				'default'     => '48',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'provise' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'provise' ),
				'section'     => 'h2_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'provise' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'provise' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => provise_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'provise' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => provise_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'       => esc_html__( 'H3 Heading', 'provise' ),
				'priority'    => 20,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'provise' ),
				'section' => 'h3_typography',
				'default' => 'Trebuchet MS, Helvetica, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'provise' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => provise_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'provise' ),
				'section' => 'h3_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => provise_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'provise' ),
				'section'     => 'h3_typography',
				'default'     => '36',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'provise' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'provise' ),
				'section'     => 'h3_typography',
				'default'     => '1.22',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'provise' ),
				'section'     => 'h3_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'provise' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => provise_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'provise' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => provise_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'       => esc_html__( 'H4 Heading', 'provise' ),
				'priority'    => 25,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'provise' ),
				'section' => 'h4_typography',
				'default' => 'Trebuchet MS, Helvetica, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'provise' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => provise_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'provise' ),
				'section' => 'h4_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => provise_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'provise' ),
				'section'     => 'h4_typography',
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'provise' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'provise' ),
				'section'     => 'h4_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'provise' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'provise' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => provise_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'provise' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => provise_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'       => esc_html__( 'H5 Heading', 'provise' ),
				'priority'    => 30,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'provise' ),
				'section' => 'h5_typography',
				'default' => 'Trebuchet MS, Helvetica, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'provise' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => provise_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'provise' ),
				'section' => 'h5_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => provise_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'provise' ),
				'section'     => 'h5_typography',
				'default'     => '24',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'provise' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'provise' ),
				'section'     => 'h5_typography',
				'default'     => '1.33',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'provise' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'provise' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => provise_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'provise' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => provise_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'       => esc_html__( 'H6 Heading', 'provise' ),
				'priority'    => 35,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'provise' ),
				'section' => 'h6_typography',
				'default' => 'Trebuchet MS, Helvetica, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'provise' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => provise_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'provise' ),
				'section' => 'h6_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => provise_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'provise' ),
				'section'     => 'h6_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'provise' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'provise' ),
				'section'     => 'h6_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'provise' ),
				'section'     => 'h6_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'provise' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => provise_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'provise' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => provise_get_text_aligns(),
				'type'    => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography' => array(
				'title'       => esc_html__( 'Breadcrumbs', 'provise' ),
				'priority'    => 45,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'provise' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Trebuchet MS, Helvetica, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'provise' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => provise_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'provise' ),
				'section' => 'breadcrumbs_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => provise_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'provise' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'provise' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'provise' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'provise' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'provise' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => provise_get_character_sets(),
				'type'    => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'       => esc_html__( 'Header', 'provise' ),
				'priority'    => 60,
				'type'        => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'       => esc_html__( 'Styles', 'provise' ),
				'priority'    => 5,
				'panel'       => 'header_options',
				'type'        => 'section',
			),

			'header_transparent_layout' => array(
				'title'   => esc_html__( 'Home page header transparent', 'provise' ),
				'section' => 'header_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			'header_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'provise' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#373e43',
				'type'    => 'control',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'provise' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'default' => '%s/assets/images/header_bg_image.jpg',
				'type'    => 'control',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'provise' ),
				'section' => 'header_styles',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat'  => esc_html__( 'No Repeat', 'provise' ),
					'repeat'     => esc_html__( 'Tile', 'provise' ),
					'repeat-x'   => esc_html__( 'Tile Horizontally', 'provise' ),
					'repeat-y'   => esc_html__( 'Tile Vertically', 'provise' ),
				),
				'type' => 'control',
			),
			'header_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'provise' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'provise' ),
					'center' => esc_html__( 'Center', 'provise' ),
					'right'  => esc_html__( 'Right', 'provise' ),
				),
				'type' => 'control',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'provise' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'provise' ),
					'fixed'  => esc_html__( 'Fixed', 'provise' ),
				),
				'type' => 'control',
			),
			'header_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'provise' ),
				'section' => 'header_styles',
				'default' => 'minimal',
				'field'   => 'select',
				'choices' => array(
					'minimal'  => esc_html__( 'Style 1', 'provise' ),
					'centered' => esc_html__( 'Style 2', 'provise' ),
					'default'  => esc_html__( 'Style 3', 'provise' ),
				),
				'type' => 'control',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'       => esc_html__( 'Top Panel', 'provise' ),
				'priority'    => 10,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'top_panel_search' => array(
				'title'   => esc_html__( 'Enable search', 'provise' ),
				'section' => 'header_top_panel',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_bg' => array(
				'title'   => esc_html__( 'Background color', 'provise' ),
				'section' => 'header_top_panel',
				'default' => '#373d43',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Header contact block` section */
			'header_contact_block' => array(
				'title'    => esc_html__( 'Header Contact Block', 'provise' ),
				'priority' => 15,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Header Contact Block', 'provise' ),
				'section' => 'header_contact_block',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_contact_icon_1' => array(
				'title'       => esc_html__( 'Contact item 1', 'provise' ),
				'description' => esc_html__( 'Choose icon', 'provise' ),
				'section'     => 'header_contact_block',
				'field'       => 'iconpicker',
				'default'     => 'fa-map-marker',
				'icon_data'   => array(
					'icon_set'    => 'FontAwesome',
					'icon_css'    => PROVISE_THEME_URI . '/assets/css/font-awesome.min.css',
					'icon_base'   => 'fa',
					'icon_prefix' => 'fa-',
					'icons'       => provise_get_icons_set(),
				),
				'type'        => 'control',
			),
			'header_contact_label_1' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'provise' ),
				'section'     => 'header_contact_block',
				'default'     => false,
				'field'       => 'text',
				'type'        => 'control',
			),
			'header_contact_text_1' => array(
				'title'       => '',
				'description' => esc_html__( 'Description', 'provise' ),
				'section'     => 'header_contact_block',
				'default'     => provise_get_default_contact_information( 'address' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),

			'header_contact_icon_2' => array(
				'title'       => esc_html__( 'Contact item 2', 'provise' ),
				'description' => esc_html__( 'Choose icon', 'provise' ),
				'section'     => 'header_contact_block',
				'field'       => 'iconpicker',
				'default'     => 'fa-envelope',
				'icon_data'   => array(
					'icon_set'    => 'FontAwesome',
					'icon_css'    => PROVISE_THEME_URI . '/assets/css/font-awesome.min.css',
					'icon_base'   => 'fa',
					'icon_prefix' => 'fa-',
					'icons'       => provise_get_icons_set(),
				),
				'type'        => 'control',
			),
			'header_contact_label_2' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'provise' ),
				'section'     => 'header_contact_block',
				'default'     => false,
				'field'       => 'text',
				'type'        => 'control',
			),
			'header_contact_text_2' => array(
				'title'       => '',
				'description' => esc_html__( 'Description', 'provise' ),
				'section'     => 'header_contact_block',
				'default'     => provise_get_default_contact_information( 'email' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),

			'header_contact_icon_3' => array(
				'title'       => esc_html__( 'Contact item 3', 'provise' ),
				'description' => esc_html__( 'Choose icon', 'provise' ),
				'section'     => 'header_contact_block',
				'field'       => 'iconpicker',
				'default'     => 'fa-phone',
				'icon_data'   => array(
					'icon_set'    => 'FontAwesome',
					'icon_css'    => PROVISE_THEME_URI . '/assets/css/font-awesome.min.css',
					'icon_base'   => 'fa',
					'icon_prefix' => 'fa-',
					'icons'       => provise_get_icons_set(),
				),
				'type'        => 'control',
			),
			'header_contact_label_3' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'provise' ),
				'section'     => 'header_contact_block',
				'default'     => false,
				'field'       => 'text',
				'type'        => 'control',
			),
			'header_contact_text_3' => array(
				'title'       => '',
				'description' => esc_html__( 'Description', 'provise' ),
				'section'     => 'header_contact_block',
				'default'     => provise_get_default_contact_information( 'phones' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),

				/** `Main Menu` section */
			'header_main_menu' => array(
				'title'       => esc_html__( 'Main Menu', 'provise' ),
				'priority'    => 20,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_menu_sticky' => array(
				'title'   => esc_html__( 'Enable sticky menu', 'provise' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes' => array(
				'title'   => esc_html__( 'Enable item description', 'provise' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'hidden_menu_items_title' => array(
				'title'    => esc_html__( 'Hidden menu items title', 'provise' ),
				'section'  => 'header_main_menu',
				'default'  => esc_html__( 'More', 'provise' ),
				'field'    => 'input',
				'type'     => 'control',
			),

			/** `Main Menu` section */
			'header_main_menu' => array(
				'title'       => esc_html__( 'Main Menu', 'provise' ),
				'priority'    => 15,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_menu_sticky' => array(
				'title'   => esc_html__( 'Enable sticky menu', 'provise' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes' => array(
				'title'   => esc_html__( 'Enable title attributes', 'provise' ),
				'section' => 'header_main_menu',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'hidden_menu_items_title' => array(
				'title'    => esc_html__( 'Hidden menu items title', 'provise' ),
				'section'  => 'header_main_menu',
				'default'  => esc_html__( 'More', 'provise' ),
				'field'    => 'input',
				'type'     => 'control'
			),

			/** `Sidebar` section */
			'sidebar_settings' => array(
				'title'    => esc_html__( 'Sidebar', 'provise' ),
				'priority' => 105,
				'type'     => 'section',
			),
			'sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar Position', 'provise' ),
				'section' => 'sidebar_settings',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'provise' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'provise' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'provise' ),
				),
				'type' => 'control',
			),

			/** `MailChimp` section */
			'mailchimp' => array(
				'title'       => esc_html__( 'MailChimp', 'provise' ),
				'description' => esc_html__( 'Setup MailChimp settings for subscribe widget', 'provise' ),
				'priority'    => 109,
				'type'        => 'section',
			),
			'mailchimp_api_key' => array(
				'title'   => esc_html__( 'MailChimp API key', 'provise' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),
			'mailchimp_list_id' => array(
				'title'   => esc_html__( 'MailChimp list ID', 'provise' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),

			/** `Ads Management` panel */
			'ads_management' => array(
				'title'    => esc_html__( 'Ads Management', 'provise' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'ads_header' => array(
				'title'             => esc_html__( 'Header', 'provise' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_home_before_loop' => array(
				'title'             => esc_html__( 'Front Page Before Loop', 'provise' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_content' => array(
				'title'             => esc_html__( 'Post Before Content', 'provise' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_comments' => array(
				'title'             => esc_html__( 'Post Before Comments', 'provise' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'provise' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'footer_logo_url' => array(
				'title'   => esc_html__( 'Logo upload', 'provise' ),
				'section' => 'footer_options',
				'field'   => 'image',
				'default' => '%s/assets/images/logo.png',
				'type'    => 'control',
			),
			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'provise' ),
				'section' => 'footer_options',
				'default' => provise_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),
			'footer_widget_columns' => array(
				'title'   => esc_html__( 'Widget Area Columns', 'provise' ),
				'section' => 'footer_options',
				'default' => '4',
				'field'   => 'select',
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type' => 'control'
			),
			'footer_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'provise' ),
				'section' => 'footer_options',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'  => esc_html__( 'Style 1', 'provise' ),
					'centered' => esc_html__( 'Style 2', 'provise' ),
					'minimal'  => esc_html__( 'Style 3', 'provise' ),
				),
				'type' => 'control'
			),
			'footer_widgets_bg' => array(
				'title'   => esc_html__( 'Footer Widgets Area color', 'provise' ),
				'section' => 'footer_options',
				'default' => '#373d43',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_bg' => array(
				'title'   => esc_html__( 'Footer Background color', 'provise' ),
				'section' => 'footer_options',
				'default' => '#30363a',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'       => esc_html__( 'Blog Settings', 'provise' ),
				'priority'    => 115,
				'type'        => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'provise' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				'active_callback' => 'is_home',
			),
			'blog_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'provise' ),
				'section' => 'blog',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'          => esc_html__( 'Listing', 'provise' ),
					'grid-2-cols'      => esc_html__( 'Grid (2 Columns)', 'provise' ),
					'grid-3-cols'      => esc_html__( 'Grid (3 Columns)', 'provise' ),
					'masonry-2-cols'   => esc_html__( 'Masonry (2 Columns)', 'provise' ),
					'masonry-3-cols'   => esc_html__( 'Masonry (3 Columns)', 'provise' ),
				),
				'type' => 'control',
			),
			'blog_sticky_label' => array(
				'title'       => esc_html__( 'Featured Post Label', 'provise' ),
				'description' => esc_html__( 'Label for sticky post', 'provise' ),
				'section'     => 'blog',
				'default'     => 'icon:material:star_border',
				'field'       => 'text',
				'type'        => 'control',
			),
			'blog_posts_content' => array(
				'title'   => esc_html__( 'Post content', 'provise' ),
				'section' => 'blog',
				'default' => 'excerpt',
				'field'   => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Only excerpt', 'provise' ),
					'full'    => esc_html__( 'Full content', 'provise' ),
				),
				'type' => 'control',
			),
			'blog_featured_image' => array(
				'title'   => esc_html__( 'Featured image', 'provise' ),
				'section' => 'blog',
				'default' => 'small',
				'field'   => 'select',
				'choices' => array(
					'small'     => esc_html__( 'Small', 'provise' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'provise' ),
				),
				'type' => 'control',
			),
			'blog_read_more_text' => array(
				'title'   => esc_html__( 'Read More button text', 'provise' ),
				'section' => 'blog',
				'default' => esc_html__( 'Read More', 'provise' ),
				'field'   => 'text',
				'type'    => 'control',
			),
			'blog_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'provise' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'provise' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'provise' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'provise' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'provise' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'provise' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'provise' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'provise' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'provise' ),
				'section' => 'blog_post',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'provise' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'provise' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'provise' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** Blockquote */
			'blockquote_typography' => array(
				'title'       => esc_html__( 'Blockquote', 'provise' ),
				'priority'    => 45,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'blockquote_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'provise' ),
				'section' => 'blockquote_typography',
				'default' => 'Trebuchet MS, Helvetica, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'blockquote_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'provise' ),
				'section' => 'blockquote_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => provise_get_font_styles(),
				'type'    => 'control',
			),
			'blockquote_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'provise' ),
				'section' => 'blockquote_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => provise_get_font_weight(),
				'type'    => 'control',
			),
			'blockquote_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'provise' ),
				'section'     => 'blockquote_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'blockquote_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'provise' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'provise' ),
				'section'     => 'blockquote_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'blockquote_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'provise' ),
				'section'     => 'blockquote_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'blockquote_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'provise' ),
				'section' => 'blockquote_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => provise_get_character_sets(),
				'type'    => 'control',
			),
			'blockquote_color' => array(
				'title'   => esc_html__( 'Blockquote color', 'provise' ),
				'section' => 'blockquote_typography',
				'default' => '#414141',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** Metadata */
			'metadata_typography' => array(
				'title'       => esc_html__( 'Metadata typography', 'provise' ),
				'priority'    => 45,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'metadata_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'provise' ),
				'section' => 'metadata_typography',
				'default' => 'Trebuchet MS, Helvetica, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'metadata_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'provise' ),
				'section' => 'metadata_typography',
				'default' => 'italic',
				'field'   => 'select',
				'choices' => provise_get_font_styles(),
				'type'    => 'control',
			),
			'metadata_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'provise' ),
				'section' => 'metadata_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => provise_get_font_weight(),
				'type'    => 'control',
			),
			'metadata_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'provise' ),
				'section'     => 'metadata_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'metadata_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'provise' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'provise' ),
				'section'     => 'metadata_typography',
				'default'     => '2.15385',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'metadata_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'provise' ),
				'section'     => 'metadata_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'metadata_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'provise' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => provise_get_character_sets(),
				'type'    => 'control',
			),
	) ) );
}

/**
 * Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control
 * @return bool
 */
function provise_is_header_logo_image( $control ) {

	if ( $control->manager->get_setting( 'header_logo_type' )->value() == 'image' ) {
		return true;
	}

	return false;
}

/**
 * Return true if logo in header has text type. Otherwise - return false.
 *
 * @param  object $control
 * @return bool
 */
function provise_is_header_logo_text( $control ) {

	if ( $control->manager->get_setting( 'header_logo_type' )->value() == 'text' ) {
		return true;
	}

	return false;
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'provise_customizer_change_core_controls', 20 );
function provise_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section      = 'provise_logo_favicon';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'provise' );
}

////////////////////////////////////
// Typography utility function    //
////////////////////////////////////
function provise_get_font_styles() {
	return apply_filters( 'provise_get_font_styles', array(
		'normal'  => esc_html__( 'Normal', 'provise' ),
		'italic'  => esc_html__( 'Italic', 'provise' ),
		'oblique' => esc_html__( 'Oblique', 'provise' ),
		'inherit' => esc_html__( 'Inherit', 'provise' ),
	) );
}

function provise_get_character_sets() {
	return apply_filters( 'provise_get_character_sets', array(
		'latin'        => esc_html__( 'Latin', 'provise' ),
		'greek'        => esc_html__( 'Greek', 'provise' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'provise' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'provise' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'provise' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'provise' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'provise' ),
	) );
}

function provise_get_text_aligns() {
	return apply_filters( 'provise_get_text_aligns', array(
		'inherit' => esc_html__( 'Inherit', 'provise' ),
		'center'  => esc_html__( 'Center', 'provise' ),
		'justify' => esc_html__( 'Justify', 'provise' ),
		'left'    => esc_html__( 'Left', 'provise' ),
		'right'   => esc_html__( 'Right', 'provise' ),
	) );
}

function provise_get_font_weight() {
	return apply_filters( 'provise_get_font_weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}



/**
 * Get text transform
 */
function provise_get_text_transform() {
	return apply_filters( 'provise_get_text_transform', array(
		'none'       => esc_html__( 'None ', 'provise' ),
		'uppercase'  => esc_html__( 'Uppercase ', 'provise' ),
		'lowercase'  => esc_html__( 'Lowercase', 'provise' ),
		'capitalize' => esc_html__( 'Capitalize', 'provise' ),
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function provise_get_dynamic_css_options() {
	return apply_filters( 'provise_get_dynamic_css_options', array(
		'prefix'    => 'provise',
		'type'      => 'theme_mod',
		'single'    => true,
		'css_files' => array(
			PROVISE_THEME_DIR . '/assets/css/dynamic.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/site/elements.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/site/header.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/site/forms.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/site/social.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/site/menus.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/site/post.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/site/navigation.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/site/footer.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/site/misc.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/site/buttons.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/widgets/widget-default.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/widgets/taxonomy-tiles.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/widgets/image-grid.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/widgets/carousel.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/widgets/smart-slider.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/widgets/instagram.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/widgets/subscribe.css',
			PROVISE_THEME_DIR . '/assets/css/builder.css',
			PROVISE_THEME_DIR . '/assets/css/dynamic/plugins/cherry-services/cherry-services.css',
		),
		'options' => array(
			'header_logo_font_style',
			'header_logo_font_weight',
			'header_logo_font_size',
			'header_logo_font_family',

			'body_font_style',
			'body_font_weight',
			'body_font_size',
			'body_line_height',
			'body_font_family',
			'body_letter_spacing',
			'body_text_align',

			'h1_font_style',
			'h1_font_weight',
			'h1_font_size',
			'h1_line_height',
			'h1_font_family',
			'h1_letter_spacing',
			'h1_text_align',

			'h2_font_style',
			'h2_font_weight',
			'h2_font_size',
			'h2_line_height',
			'h2_font_family',
			'h2_letter_spacing',
			'h2_text_align',

			'h3_font_style',
			'h3_font_weight',
			'h3_font_size',
			'h3_line_height',
			'h3_font_family',
			'h3_letter_spacing',
			'h3_text_align',

			'h4_font_style',
			'h4_font_weight',
			'h4_font_size',
			'h4_line_height',
			'h4_font_family',
			'h4_letter_spacing',
			'h4_text_align',

			'h5_font_style',
			'h5_font_weight',
			'h5_font_size',
			'h5_line_height',
			'h5_font_family',
			'h5_letter_spacing',
			'h5_text_align',

			'h6_font_style',
			'h6_font_weight',
			'h6_font_size',
			'h6_line_height',
			'h6_font_family',
			'h6_letter_spacing',
			'h6_text_align',

			'breadcrumbs_font_style',
			'breadcrumbs_font_weight',
			'breadcrumbs_font_size',
			'breadcrumbs_line_height',
			'breadcrumbs_font_family',
			'breadcrumbs_letter_spacing',
			'breadcrumbs_text_align',

			'blockquote_font_style',
			'blockquote_font_weight',
			'blockquote_font_size',
			'blockquote_line_height',
			'blockquote_font_family',
			'blockquote_letter_spacing',
			'blockquote_text_align',
			'blockquote_color',

			'metadata_font_style',
			'metadata_font_weight',
			'metadata_font_size',
			'metadata_line_height',
			'metadata_font_family',
			'metadata_letter_spacing',
			'metadata_text_align',

			'regular_accent_color_1',
			'regular_accent_color_2',
			'regular_accent_color_3',
			'regular_text_color',
			'regular_link_color',
			'regular_link_hover_color',
			'regular_h1_color',
			'regular_h2_color',
			'regular_h3_color',
			'regular_h4_color',
			'regular_h5_color',
			'regular_h6_color',

			'invert_accent_color_1',
			'invert_accent_color_2',
			'invert_accent_color_3',
			'invert_text_color',
			'invert_link_color',
			'invert_link_hover_color',
			'invert_h1_color',
			'invert_h2_color',
			'invert_h3_color',
			'invert_h4_color',
			'invert_h5_color',
			'invert_h6_color',

			'gradient_color_1',
			'gradient_color_2',

			'header_bg_color',
			'header_bg_image',
			'header_bg_repeat',
			'header_bg_position_x',
			'header_bg_attachment',

			'top_panel_bg',

			'container_width',

			'footer_widgets_bg',
			'footer_bg',
		),
	) );
}

/**
 * Return array of arguments for Google Font loader module.
 *
 * @since  1.0.0
 * @return array
 */
function provise_get_fonts_options() {
	return apply_filters( 'provise_get_fonts_options', array(
		'prefix'  => 'provise',
		'type'    => 'theme_mod',
		'single'  => true,
		'options' => array(
			'body' => array(
				'family'  => 'body_font_family',
				'style'   => 'body_font_style',
				'weight'  => 'body_font_weight',
				'charset' => 'body_character_set',
			),
			'h1' => array(
				'family'  => 'h1_font_family',
				'style'   => 'h1_font_style',
				'weight'  => 'h1_font_weight',
				'charset' => 'h1_character_set',
			),
			'h2' => array(
				'family'  => 'h2_font_family',
				'style'   => 'h2_font_style',
				'weight'  => 'h2_font_weight',
				'charset' => 'h2_character_set',
			),
			'h3' => array(
				'family'  => 'h3_font_family',
				'style'   => 'h3_font_style',
				'weight'  => 'h3_font_weight',
				'charset' => 'h3_character_set',
			),
			'h4' => array(
				'family'  => 'h4_font_family',
				'style'   => 'h4_font_style',
				'weight'  => 'h4_font_weight',
				'charset' => 'h4_character_set',
			),
			'h5' => array(
				'family'  => 'h5_font_family',
				'style'   => 'h5_font_style',
				'weight'  => 'h5_font_weight',
				'charset' => 'h5_character_set',
			),
			'h6' => array(
				'family'  => 'h6_font_family',
				'style'   => 'h6_font_style',
				'weight'  => 'h6_font_weight',
				'charset' => 'h6_character_set',
			),
			'header_logo' => array(
				'family'  => 'header_logo_font_family',
				'style'   => 'header_logo_font_style',
				'weight'  => 'header_logo_font_weight',
				'charset' => 'header_logo_character_set',
			),
			'breadcrumbs' => array(
				'family'  => 'breadcrumbs_font_family',
				'style'   => 'breadcrumbs_font_style',
				'weight'  => 'breadcrumbs_font_weight',
				'charset' => 'breadcrumbs_character_set',
			),
			'blockquote' => array(
				'family'  => 'blockquote_font_family',
				'style'   => 'blockquote_font_style',
				'weight'  => 'blockquote_font_weight',
				'charset' => 'blockquote_character_set',
			),
			'metadata' => array(
				'family'  => 'metadata_font_family',
				'style'   => 'metadata_font_style',
				'weight'  => 'metadata_font_weight',
				'charset' => 'metadata_character_set',
			),
		)
	) );
}

/**
 * Get default contact information.
 *
 * @since  1.0.0
 * @return string
 */
function provise_get_default_contact_information( $value ) {
	$contact_information = array(
		'address' => esc_html__( '9870 St Vincent Place, Glasgow, DC 45 Fr 45.', 'provise' ),
		'email'   => sprintf( '<a href="mailto:%1$s">%1$s</a>', esc_html__( 'contact@demolink.org', 'provise' ) ),
		'phones'  => sprintf( '<a href="tel:%1$s">%1$s</a>', esc_html__( '+18005596580', 'provise' ) ),

	);

	return $contact_information[ $value ];
}


/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function provise_get_default_footer_copyright() {
	return sprintf(
					'%%year%% &#169; %1$s | <a href=\"%%privacy-policy%%\">%2$s</a>',
					esc_html__( 'Provise. All Rights Reserved.', 'provise' ),
					esc_html__( 'Privacy Policy', 'provise' )
		);
}

/**
 * Get FontAwesome icons set
 *
 * @return array
 */
function provise_get_icons_set() {

	ob_start();

	include PROVISE_THEME_DIR . '/assets/js/icons.json';
	$json = ob_get_clean();

	$result = array();
	$icons = json_decode( $json, true );

	foreach ( $icons['icons'] as $icon ) {
		$result[] = $icon['id'];
	}

	return $result;
}

