<?php
if ( ! class_exists( 'Provise_Theme_Setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0.0
	 */
	class Provise_Theme_Setup {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private static $instance = null;

		/**
		 * A reference to an instance of cherry framework core class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private $core = null;

		/**
		 * Holder for CSS layout scheme.
		 *
		 * @since 1.0.0
		 * @var   array
		 */
		public $layout = array();

		/**
		 * Holder for current customizer module instance.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		public $customizer = null;

		/**
		 * Holder for current dynamic_css module instance.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		public $dynamic_css = null;

		/**
		 * Sets up needed actions/filters for the theme to initialize.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			// Set the constants needed by the theme.
			add_action( 'after_setup_theme', array( $this, 'constants' ), -1 );

			// Load the installer core.
			add_action( 'after_setup_theme', require( trailingslashit( __DIR__ ) . 'cherry-framework/setup.php' ), 0 );

			// Load the core functions/classes required by the rest of the theme.
			add_action( 'after_setup_theme', array( $this, 'get_core' ), 1 );

			// Language functions and translations setup.
			add_action( 'after_setup_theme', array( $this, 'l10n' ), 2 );

			// Handle theme supported features.
			add_action( 'after_setup_theme', array( $this, 'theme_support' ), 3 );

			// Load the theme includes.
			add_action( 'after_setup_theme', array( $this, 'includes' ), 4 );

			// Initialization of modules.
			add_action( 'after_setup_theme', array( $this, 'init' ), 10 );

			// Load admin files.
			add_action( 'wp_loaded', array( $this, 'admin' ), 1 );

			// Enqueue admin assets.
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );

			// Register public assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ), 9 );

			// Enqueue public assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ), 10 );

		}

		/**
		 * Defines the constant paths for use within the core and theme.
		 *
		 * @since 1.0.0
		 */
		public function constants() {
			global $content_width;

			/**
			 * Fires before definitions the constants.
			 *
			 * @since 1.0.0
			 */
			do_action( 'provise_constants_before' );

			$template  = get_template();
			$theme_obj = wp_get_theme( $template );

			/** Sets the theme version number. */
			define( 'PROVISE_THEME_VERSION', $theme_obj->get( 'Version' ) );

			/** Sets the theme directory path. */
			define( 'PROVISE_THEME_DIR', get_template_directory() );

			/** Sets the theme directory URI. */
			define( 'PROVISE_THEME_URI', get_template_directory_uri() );

			/** Sets the path to the core framework directory. */
			defined( 'CHERRY_DIR' ) or define( 'CHERRY_DIR', trailingslashit( PROVISE_THEME_DIR ) . 'cherry-framework' );

			/** Sets the path to the core framework directory URI. */
			defined( 'CHERRY_URI' ) or define( 'CHERRY_URI', trailingslashit( PROVISE_THEME_URI ) . 'cherry-framework' );

			/** Sets the theme includes paths. */
			define( 'PROVISE_THEME_CLASSES', trailingslashit( PROVISE_THEME_DIR ) . 'inc/classes' );
			define( 'PROVISE_THEME_WIDGETS', trailingslashit( PROVISE_THEME_DIR ) . 'inc/widgets' );
			define( 'PROVISE_THEME_EXT', trailingslashit( PROVISE_THEME_DIR ) . 'inc/extensions' );

			/** Sets the theme assets URIs. */
			define( 'PROVISE_THEME_CSS', trailingslashit( PROVISE_THEME_URI ) . 'assets/css' );
			define( 'PROVISE_THEME_JS', trailingslashit( PROVISE_THEME_URI ) . 'assets/js' );

			// Sets the content width in pixels, based on the theme's design and stylesheet.
			if ( ! isset( $content_width ) ) {
				$content_width = 710;
			}
		}

		/**
		 * Loads the core functions. These files are needed before loading anything else in the
		 * theme because they have required functions for use.
		 *
		 * @since  1.0.0
		 */
		public function get_core() {
			/**
			 * Fires before loads the core theme functions.
			 *
			 * @since 1.0.0
			 */
			do_action( 'provise_core_before' );

			global $chery_core_version;

			if ( null !== $this->core ) {
				return $this->core;
			}

			if ( 0 < sizeof( $chery_core_version ) ) {
				$core_paths = array_values( $chery_core_version );

				require_once( $core_paths[0] );
			}else{
				die('Class Cherry_Core not found');
			}

			$this->core = new Cherry_Core( array(
				'modules'  => array(
					'cherry-js-core' => array(
						'priority' => 999,
						'autoload' => true,
					),
					'cherry-ui-elements' => array(
						'priority' => 999,
						'autoload' => false,
					),
					'cherry-interface-builder' => array(
						'autoload' => false,
					),
					'cherry-utility' => array(
						'priority' => 999,
						'autoload' => true,
						'args'     => array(
							'meta_key' => array(
								'term_thumb' => 'provise_thumb'
							),
						)
					),
					'cherry-widget-factory' => array(
						'priority' => 999,
						'autoload' => true,
					),
					'cherry-post-formats-api' => array(
						'priority' => 999,
						'autoload' => true,
						'args'     => array(
							'rewrite_default_gallery' => true,
							'gallery_args'            => array(
								'size'           => 'provise-thumb-l',
								'base_class'     => 'post-gallery',
								'container'      => '<div class="%2$s swiper-container" id="%4$s" %3$s><div class="swiper-wrapper">%1$s</div><div class="swiper-button-prev"><i class="material-icons">navigate_before</i></div><div class="swiper-button-next"><i class="material-icons">navigate_next</i></div></div>',
								'slide'          => '<figure class="%2$s swiper-slide">%1$s</figure>',
								'img_class'      => 'swiper-image',
								'slider_handle'  => 'jquery-swiper',
								'slider'         => 'sliderPro',
								'slider_init'    => array(
									'buttons' => false,
									'arrows'  => true,
								),
								'popup'          => 'magnificPopup',
								'popup_handle'   => 'magnific-popup',
								'popup_init'     => array(
									'type' => 'image',
								),
							),
							'image_args' => array(
								'size'         => 'provise-thumb-l',
								'popup'        => 'magnificPopup',
								'popup_handle' => 'magnific-popup',
								'popup_init'   => array(
									'type' => 'image',
								),
							),
						),
					),
					'cherry-customizer' => array(
						'priority' => 999,
						'autoload' => false,
					),
					'cherry-dynamic-css' => array(
						'priority' => 999,
						'autoload' => false,
					),
					'cherry-google-fonts-loader' => array(
						'priority' => 999,
						'autoload' => false,
					),
					'cherry-term-meta' => array(
						'priority' => 999,
						'autoload' => false,
					),
					'cherry-post-meta' => array(
						'priority' => 999,
						'autoload' => false,
					),
					'cherry-breadcrumbs' => array(
						'priority' => 999,
						'autoload' => false,
					),
				),
			) );

			return $this->core;
		}

		/**
		 * Loads the theme translation file.
		 *
		 * @since 1.0.0
		 */
		public function l10n() {
			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 */
			load_theme_textdomain( 'provise', trailingslashit( PROVISE_THEME_DIR ) . 'languages' );
		}

		/**
		 * Adds theme supported features.
		 *
		 * @since 1.0.0
		 */
		public function theme_support() {

			// Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'post-thumbnails' );

			// Enable HTML5 markup structure.
			add_theme_support( 'html5', array(
				'comment-list', 'comment-form', 'search-form', 'gallery', 'caption',
			) );

			// Enable default title tag.
			add_theme_support( 'title-tag' );

			// Enable post formats.
			add_theme_support( 'post-formats', array(
				'aside', 'gallery', 'image', 'link', 'quote', 'video', 'audio', 'status',
			) );

			// Enable custom background.
			add_theme_support( 'custom-background', array( 'default-color' => 'ffffff', ) );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );
		}

		/**
		 * Loads the theme files supported by themes and template-related functions/classes.
		 *
		 * @since 1.0.0
		 */
		public function includes() {
			/**
			 * Configurations.
			 */
			require_once trailingslashit( PROVISE_THEME_DIR ) . 'config/layout.php';
			require_once trailingslashit( PROVISE_THEME_DIR ) . 'config/menus.php';
			require_once trailingslashit( PROVISE_THEME_DIR ) . 'config/sidebars.php';
			require_if_theme_supports( 'post-thumbnails', trailingslashit( PROVISE_THEME_DIR ) . 'config/thumbnails.php' );

			/**
			 * Functions.
			 */
			if ( ! is_admin() ) {
				require_once trailingslashit( PROVISE_THEME_DIR ) . 'inc/template-tags.php';
				require_once trailingslashit( PROVISE_THEME_DIR ) . 'inc/template-menu.php';
				require_once trailingslashit( PROVISE_THEME_DIR ) . 'inc/template-meta.php';
				require_once trailingslashit( PROVISE_THEME_DIR ) . 'inc/template-comment.php';
				require_once trailingslashit( PROVISE_THEME_DIR ) . 'inc/extras.php';
			}

			require_once trailingslashit( PROVISE_THEME_DIR ) . 'inc/context.php';
			require_once trailingslashit( PROVISE_THEME_DIR ) . 'inc/customizer.php';
			require_once trailingslashit( PROVISE_THEME_DIR ) . 'inc/hooks.php';
			require_once trailingslashit( PROVISE_THEME_DIR ) . 'inc/register-plugins.php';

			/**
			 * Widgets.
			 */
			require_once trailingslashit( PROVISE_THEME_WIDGETS ) . 'about/class-about-widget.php';
			require_once trailingslashit( PROVISE_THEME_WIDGETS ) . 'custom-posts/class-custom-posts-widget.php';
			require_once trailingslashit( PROVISE_THEME_WIDGETS ) . 'subscribe-follow/class-subscribe-follow-widget.php';

			/**
			 * Classes.
			 */
			if ( ! is_admin() ) {
				require_once trailingslashit( PROVISE_THEME_CLASSES ) . 'class-wrapping.php';
			}

			require_once trailingslashit( PROVISE_THEME_CLASSES ) . 'class-widget-area.php';
			require_once trailingslashit( PROVISE_THEME_CLASSES ) . 'class-tgm-plugin-activation.php';

			/**
			 * Extensions.
			 */
			require_once trailingslashit( PROVISE_THEME_EXT ) . 'woocommerce.php';
		}

		/**
		 * Run initialization of modules.
		 *
		 * @since 1.0.0
		 */
		public function init() {
			$this->customizer = $this->get_core()->init_module( 'cherry-customizer', provise_get_customizer_options() );
			$this->dynamic_css = $this->get_core()->init_module( 'cherry-dynamic-css', provise_get_dynamic_css_options() );
			$this->get_core()->init_module( 'cherry-google-fonts-loader', provise_get_fonts_options() );
			$this->get_core()->init_module( 'cherry-term-meta', array(
				'tax'      => 'category',
				'priority' => 10,
				'fields'   => array(
					'provise_thumb' => array(
						'type'               => 'media',
						'value'              => '',
						'multi_upload'       => false,
						'library_type'       => 'image',
						'upload_button_text' => esc_html__( 'Set thumbnail', 'provise' ),
						'label'              => esc_html__( 'Category thumbnail', 'provise' ),
					),
				),
			) );
			$this->get_core()->init_module( 'cherry-term-meta', array(
				'tax'      => 'post_tag',
				'priority' => 10,
				'fields'   => array(
					'provise_thumb' => array(
						'type'               => 'media',
						'value'              => '',
						'multi_upload'       => false,
						'library_type'       => 'image',
						'upload_button_text' => esc_html__( 'Set thumbnail', 'provise' ),
						'label'              => esc_html__( 'Tag thumbnail', 'provise' ),
					),
				),
			) );
			$this->get_core()->init_module( 'cherry-post-meta', array(
				'id'            => 'post-layout',
				'title'         => esc_html__( 'Layout Options', 'provise' ),
				'page'          => array( 'post', 'page' ),
				'context'       => 'normal',
				'priority'      => 'high',
				'callback_args' => false,
				'fields'        => array(
					'provise_sidebar_position' => array(
						'type'        => 'radio',
						'title'       => esc_html__( 'Layout', 'provise' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options'       => array(
							'inherit' => array(
								'label'   => esc_html__( 'Inherit', 'provise' ),
								'img_src' => trailingslashit( PROVISE_THEME_URI ) . 'assets/images/admin/inherit.svg',
							),
							'one-left-sidebar' => array(
								'label'   => esc_html__( 'Sidebar on left side', 'provise' ),
								'img_src' => trailingslashit( PROVISE_THEME_URI ) . 'assets/images/admin/page-layout-left-sidebar.svg',
							),
							'one-right-sidebar' => array(
								'label'   => esc_html__( 'Sidebar on right side', 'provise' ),
								'img_src' => trailingslashit( PROVISE_THEME_URI ) . 'assets/images/admin/page-layout-right-sidebar.svg',
							),
							'fullwidth' => array(
								'label'   => esc_html__( 'No sidebar', 'provise' ),
								'img_src' => trailingslashit( PROVISE_THEME_URI ) . 'assets/images/admin/page-layout-fullwidth.svg',
							),
						)
					),
					'provise_header_container_type' => array(
 						'type'        => 'radio',
 						'title'       => esc_html__( 'Header layout', 'provise' ),
 						'value'         => 'inherit',
 						'display_input' => false,
 						'options'       => array(
 							'inherit' => array(
 								'label'   => esc_html__( 'Header Inherit Layout', 'provise' ),
 								'img_src' => trailingslashit( PROVISE_THEME_URI ) . 'assets/images/admin/inherit.svg',
 							),
 							'boxed' => array(
 								'label'   => esc_html__( 'Header Boxed Layout', 'provise' ),
 								'img_src' => trailingslashit( PROVISE_THEME_URI ) . 'assets/images/admin/type-boxed.svg',
 							),
 							'fullwidth' => array(
 								'label'   => esc_html__( 'Header Fullwidth Layout', 'provise' ),
 								'img_src' => trailingslashit( PROVISE_THEME_URI ) . 'assets/images/admin/type-fullwidth.svg',
 							),
 						)
 					),
 					'provise_content_container_type' => array(
 						'type'        => 'radio',
 						'title'       => esc_html__( 'Content layout', 'provise' ),
 						'value'         => 'inherit',
 						'display_input' => false,
 						'options'       => array(
 							'inherit' => array(
 								'label'   => esc_html__( 'Content Inherit Layout', 'provise' ),
 								'img_src' => trailingslashit( PROVISE_THEME_URI ) . 'assets/images/admin/inherit.svg',
 							),
 							'boxed' => array(
 								'label'   => esc_html__( 'Content Boxed Layout', 'provise' ),
 								'img_src' => trailingslashit( PROVISE_THEME_URI ) . 'assets/images/admin/type-boxed.svg',
 							),
 							'fullwidth' => array(
 								'label'   => esc_html__( 'Content Fullwidth Layout', 'provise' ),
 								'img_src' => trailingslashit( PROVISE_THEME_URI ) . 'assets/images/admin/type-fullwidth.svg',
 							),
 						)
 					),
 					'provise_footer_container_type' => array(
 						'type'        => 'radio',
 						'title'       => esc_html__( 'Footer layout', 'provise' ),
 						'value'         => 'inherit',
 						'display_input' => false,
 						'options'       => array(
 							'inherit' => array(
 								'label'   => esc_html__( 'Footer Inherit Layout', 'provise' ),
 								'img_src' => trailingslashit( PROVISE_THEME_URI ) . 'assets/images/admin/inherit.svg',
 							),
 							'boxed' => array(
 								'label'   => esc_html__( 'Footer Boxed Layout', 'provise' ),
 								'img_src' => trailingslashit( PROVISE_THEME_URI ) . 'assets/images/admin/type-boxed.svg',
 							),
 							'fullwidth' => array(
 								'label'   => esc_html__( 'Footer Fullwidth Layout', 'provise' ),
 								'img_src' => trailingslashit( PROVISE_THEME_URI ) . 'assets/images/admin/type-fullwidth.svg',
 							),
 						)
 					),
				),
			) );
		}

		/**
		 * Load admin files for the theme.
		 *
		 * @since 1.0.0
		 */
		public function admin() {

			// Check if in the WordPress admin.
			if ( ! is_admin() ) {
				return;
			}
		}

		/**
		 * Enqueue admin-specific assets.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_admin_assets() {
			wp_enqueue_script( 'provise-admin-script', PROVISE_THEME_JS . '/admin.min.js', array( 'cherry-js-core' ), PROVISE_THEME_VERSION, true );
		}

		/**
		 * Register assets.
		 *
		 * @since 1.0.0
		 */
		public function register_assets() {
			wp_register_script( 'jquery-slider-pro', PROVISE_THEME_JS . '/jquery.sliderpro.min.js', array( 'jquery' ), '1.2.4', true );
			wp_register_script( 'jquery-swiper', PROVISE_THEME_JS . '/swiper.jquery.min.js', array( 'jquery' ), '3.3.0', true );
			wp_register_script( 'magnific-popup', PROVISE_THEME_JS . '/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0.1', true );
			wp_register_script( 'jquery-stickup', PROVISE_THEME_JS . '/jquery.stickup.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'jquery-totop', PROVISE_THEME_JS . '/jquery.ui.totop.min.js', array( 'jquery' ), '1.2.0', true );
			wp_register_script( 'jquery-isotope', PROVISE_THEME_JS . '/jquery.isotope.min.js', array( 'jquery' ), '4.0.0', true );
			wp_register_script( 'super-guacamole', PROVISE_THEME_JS . '/super-guacamole.min.js', array( 'jquery' ), '1.0.0', true );

			wp_register_style( 'jquery-slider-pro', PROVISE_THEME_CSS . '/slider-pro.min.css', array(), '1.2.4' );
			wp_register_style( 'jquery-swiper', PROVISE_THEME_CSS . '/swiper.min.css', array(), '3.3.0' );
			wp_register_style( 'magnific-popup', PROVISE_THEME_CSS . '/magnific-popup.min.css', array(), '1.0.1' );
			wp_register_style( 'font-awesome', PROVISE_THEME_CSS . '/font-awesome.min.css', array(), '4.6.0' );
			wp_register_style( 'material-icons', PROVISE_THEME_CSS . '/material-icons.min.css', array(), '2.2.0' );
		}

		/**
		 * Enqueue assets.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_assets() {
			wp_enqueue_style( 'provise-theme-style', get_stylesheet_uri(), array( 'font-awesome', 'material-icons', 'magnific-popup', 'jquery-swiper' ), PROVISE_THEME_VERSION );

			wp_add_inline_style( 'provise-theme-style', provise_inline_css() );

			/**
			 * Filter the depends on main theme script.
			 *
			 * @since 1.0.0
			 * @var   array
			 */
			$depends = apply_filters( 'provise_theme_script_depends', array( 'cherry-js-core', 'hoverIntent', 'super-guacamole', 'jquery-swiper' ) );

			wp_enqueue_script( 'provise-theme-script', PROVISE_THEME_JS . '/theme-script.js', $depends, PROVISE_THEME_VERSION, true );

			/**
			 * Filter the strings that send to scripts.
			 *
			 * @since 1.0.0
			 * @var   array
			 */
			$labels = apply_filters( 'provise_theme_localize_labels', array(
				'totop_button' => esc_html__( 'Top', 'provise' ),
				'hidden_menu_items_title' => get_theme_mod( 'hidden_menu_items_title', provise_theme()->customizer->get_default( 'hidden_menu_items_title' ) ),
			) );

			wp_localize_script( 'provise-theme-script', 'provise', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'labels'  => $labels,
			) );

			// Threaded Comments.
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @return object
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}
	}
}

add_filter( 'cherry_services_post_type_args', '_my_rewrite_slug' );
            function _my_rewrite_slug( $args ) {
            $args['rewrite']['slug'] = 'our-services';
            return $args;
        }

/**
 * Returns instanse of main theme configuration class.
 *
 * @since  1.0.0
 * @return object
 */
function provise_theme() {
	return Provise_Theme_Setup::get_instance();
}

provise_theme();
