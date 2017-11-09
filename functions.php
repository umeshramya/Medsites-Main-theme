<?php
/**
 * Medsites functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Medsites
 */

if ( ! function_exists( 'medsites_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function medsites_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Medsites, use a find and replace
		 * to change 'medsites' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'medsites', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'Primary', 'medsites' ),
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
		add_theme_support( 'custom-background', apply_filters( 'medsites_custom_background_args', array(
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'medsites_setup' );


function medsites_add_editor_style(){
	add_editor_style( 'dist/css/editor-style.css' );
}

add_action( "admin_init", "medsites_add_editor_style" );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function medsites_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'medsites_content_width', 1140 );
}
add_action( 'after_setup_theme', 'medsites_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function medsites_scripts() {
	wp_enqueue_style( 'medsites-bo-css', get_template_directory_uri() . "/dist/css/bootstrap.min.css" );
	wp_enqueue_style( 'medsites-fontawesome', get_template_directory_uri() . "/fonts/font-awesome/css/font-awesome.min.css" );

	
	wp_enqueue_style( 'medsites-style', get_stylesheet_uri() );

	wp_register_script( 'medsites-popper', get_template_directory() . '/src/js/popper.js', '', true );
	wp_enqueue_script( 'medsites-popper');


	wp_enqueue_script( "medsites-tether-js", get_template_directory_uri() . "/src/js/tether.min.js", array(), 20171109, true );
	wp_enqueue_script( "medsites-bo-js", get_template_directory_uri() . "/src/js/bootstrap.min.js", array('jquery'), 20171109, true );
	wp_enqueue_script( "medsites-bo-hover-js", get_template_directory_uri() . "/src/js/bootstrap-hover.js",array('jquery'), 20171109, true );
	wp_enqueue_script( "medsites-nav-scroll-js", get_template_directory_uri() . "/src/js/nav-scroll.js", array('jquery'), 20171109, true );


	wp_enqueue_script( 'medsites-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'medsites_scripts' );

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * widgets.
 */
 require get_template_directory() . '/inc/widgets.php';
/**
 * bootstrap nav walker.
 */
 require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


