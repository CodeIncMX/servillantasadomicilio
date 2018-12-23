<?php
/**
 * servillantasadomicilio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package servillantasadomicilio
 */

if ( ! function_exists( 'servillantasadomicilio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function servillantasadomicilio_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on servillantasadomicilio, use a find and replace
		 * to change 'servillantasadomicilio' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'servillantasadomicilio', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'servillantasadomicilio' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'servillantasadomicilio_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 40,
			'width'       => 87,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'servillantasadomicilio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function servillantasadomicilio_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'servillantasadomicilio_content_width', 640 );
}
add_action( 'after_setup_theme', 'servillantasadomicilio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function servillantasadomicilio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'servillantasadomicilio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'servillantasadomicilio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'servillantasadomicilio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function servillantasadomicilio_scripts() {
	wp_enqueue_style( 'servillantasadomicilio-style', get_stylesheet_uri() );
	
	//wp_enqueue_script( 'servillantasadomicilio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	//wp_enqueue_script( 'servillantasadomicilio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'servillantasadomicilio-common-js', get_template_directory_uri() . '/js/common.js', array('jquery'), '20151215', true );
	
	if (is_front_page()) {
		wp_enqueue_style( 'servillantasadomicilio-home-style', get_template_directory_uri() . '/css/home.css' );
		wp_enqueue_script( 'servillantasadomicilio-home-js', get_template_directory_uri() . '/js/home.js', array(), '20151215', true );
	}

	if( is_page('busqueda-por-medida') ) {
		wp_enqueue_style( 'servillantasadomicilio-messuresearching-style', get_template_directory_uri() . '/css/messuresearching.css' );
		wp_enqueue_script( 'servillantasadomicilio-messuresearching-js', get_template_directory_uri() . '/js/messuresearching.js', array(), '20151215', true );
	}

	if( is_page('comprar-llanta') ) {
		wp_enqueue_style( 'servillantasadomicilio-buyingtire-style', get_template_directory_uri() . '/css/buyingtire.css' );
		wp_enqueue_script( 'servillantasadomicilio-buyingtire-js', get_template_directory_uri() . '/js/buyingtire.js', array(), '20151215', true );
	}

	if( is_page('nosotros') ) {
		wp_enqueue_style( 'servillantasadomicilio-us-style', get_template_directory_uri() . '/css/us.css' );
		wp_enqueue_script( 'servillantasadomicilio-us-js', get_template_directory_uri() . '/js/us.js', array(), '20151215', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'servillantasadomicilio_scripts' );

/**
 * Addging Tire Stock Custom Post Type
 */
require_once get_template_directory() . '/inc/tire_custom_type.php';

/**
 * Adding contact services
 */
require_once get_template_directory() . '/inc/email/contact.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Bootstrap Navwalker file
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}