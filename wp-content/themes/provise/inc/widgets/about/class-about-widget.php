<?php
/**
 * About Provise widget.
 *
 * @package Provise
 */

if ( ! class_exists( 'Provise_About_Widget' ) ) {

	class Provise_About_Widget extends Cherry_Abstract_Widget {

		/**
		 * Constructor.
		 */
		public function __construct() {
			$this->widget_cssclass    = 'widget-about';
			$this->widget_description = esc_html__( 'Display an information about your site.', 'provise' );
			$this->widget_id          = 'provise_widget_about';
			$this->widget_name        = esc_html__( 'About Provise', 'provise' );
			$this->settings           = array(
				'title'  => array(
					'type'  => 'text',
					'value' => '',
					'label' => esc_html__( 'Title:', 'provise' ),
				),
				'media_id' => array(
					'type'               => 'media',
					'multi_upload'       => false,
					'library_type'       => 'image',
					'upload_button_text' => esc_html__( 'Upload', 'provise' ),
					'value'              => '',
					'label'              => esc_html__( 'Logo:', 'provise' ),
				),
				'enable_social' => array(
					'type'  => 'checkbox',
					'value' => array(
						'enable_social' => 'true',
					),
					'options' => array(
						'enable_social' => esc_html__( 'Enable Social Buttons', 'provise' ),
					),
				),
				'enable_tagline' => array(
					'type'  => 'checkbox',
					'value' => array(
						'enable_tagline' => 'true',
					),
					'options' => array(
						'enable_tagline' => esc_html__( 'Enable Tagline', 'provise' ),
					),
				),
				'content'  => array(
					'type'              => 'textarea',
					'placeholder'       => esc_html__( 'Text or HTML', 'provise' ),
					'value'             => '',
					'label'             => esc_html__( 'Content:', 'provise' ),
					'sanitize_callback' => 'wp_filter_post_kses',
				),
			);

			parent::__construct();
		}

		/**
		 * Get social navigation menu
		 *
		 * @param  string $wrapper Formated wrapper string.
		 * @return string
		 */
		public function get_social_nav( $wrapper ) {

			$content = '';
			$social_enabled = ( ! empty( $this->instance['enable_social'] ) ) ? $this->instance['enable_social'] : false;

			if ( is_array( $social_enabled ) && 'true' === $social_enabled['enable_social'] ) {
				$content = sprintf( $wrapper, provise_get_social_list( 'widget' ) );
			}


			return $content;
		}

		/**
		 * Widget function.
		 *
		 * @see   WP_Widget
		 * @since 1.0.1
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {

			if ( empty( $instance['media_id'] ) ) {
				return;
			}

			if ( $this->get_cached_widget( $args ) ) {
				return;
			}

			$template = locate_template( 'inc/widgets/about/views/about.php', false, false );

			if ( empty( $template ) ) {
				return;
			}

			ob_start();

			$this->setup_widget_data( $args, $instance );
			$this->widget_start( $args, $instance );

			$title     = ! empty( $instance['title'] ) ? $instance['title'] : $this->settings['title']['value'];
			$media_id  = absint( $instance['media_id'] );
			$src       = wp_get_attachment_image_src( $media_id, 'medium' );
			$site_name = esc_attr( get_bloginfo( 'name' ) );
			$home_url  = esc_url( home_url( '/' ) );
			$logo_url  = $logo_width = $logo_height = '';

			if ( false !== $src ) {
				$logo_url = esc_url( $src[0] );
			}

			$content = $this->use_wpml_translate( 'content' );
			$content = ! empty( $instance['content'] ) ? $instance['content'] : $this->settings['content']['value'];

			/** This filter is documented in wp-includes/post-template.php */
			$content = apply_filters( 'widget_text', $content );
			$content = wp_unslash( $content );
			$tagline = '';

			$tagline_enabled = ( ! empty( $instance['enable_tagline'] ) ) ? $instance['enable_tagline'] : false;

			if ( is_array( $tagline_enabled ) && 'true' === $tagline_enabled['enable_tagline'] ) {
				$tagline_enabled = true;
			} else {
				$tagline_enabled = false;
			}

			if ( $tagline_enabled ) {
				$format   = apply_filters( 'provise_about_widget_tagline_format', '<p>%s</p>', $this->settings, $this->args );
				$_tagline = get_bloginfo( 'description', 'display' );
				$tagline  = ( ! empty( $_tagline ) ) ? sprintf( $format, $_tagline ) : '';
			}

			include $template;

			$this->widget_end( $args );
			$this->reset_widget_data();

			echo $this->cache_widget( $args, ob_get_clean() );
		}
	}
}

add_action( 'widgets_init', 'provise_register_about_widget' );
function provise_register_about_widget() {
	register_widget( 'Provise_About_Widget' );
}
