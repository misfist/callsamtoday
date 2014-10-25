<?php
/**
 * SAM Services (_s) functions and definitions
 *
 * @package SAM Services (_s)
 */

/**
 * Enables checking if plugin is active
 */

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 960; /* pixels */
}

if ( ! function_exists( 'sam_services_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sam_services_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on SAM Services (_s), use a find and replace
	 * to change 'sam-services' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sam-services', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// add_theme_support( 'custom-header' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sam-services' ),
		'footer' => __( 'Footer Menu', 'sam-services' ),
		'social' => __( 'Social Menu', 'sam-services' ),
		'legal' => __( 'Legal Menu', 'sam-services' ),
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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside', 'image', 'video', 'quote', 'link',
	// ) );

	// Setup the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'sam_services_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );
}
endif; // sam_services_setup
add_action( 'after_setup_theme', 'sam_services_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function sam_services_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sam-services' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Widget 1', 'sam-services' ),
		'description'   => __( '4th widget on homepage', 'sam-services' ),
		'id'            => 'home-widget-1',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		'before_widget' => '<div id="%1$s" class="bullet-content widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	));
	register_sidebar( array(
		'name'          => __( 'Home Widget 2', 'sam-services' ),
		'description'   => __( '4th widget on homepage', 'sam-services' ),
		'id'            => 'home-widget-2',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		'before_widget' => '<div id="%1$s" class="bullet-content widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	));
	register_sidebar( array(
		'name'          => __( 'Home Widget 3', 'sam-services' ),
		'description'   => __( '4th widget on homepage', 'sam-services' ),
		'id'            => 'home-widget-3',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		'before_widget' => '<div id="%1$s" class="bullet-content widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	));
	register_sidebar( array(
		'name'          => __( 'Home Widget 4', 'sam-services' ),
		'description'   => __( '4th widget on homepage', 'sam-services' ),
		'id'            => 'home-widget-4',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		'before_widget' => '<div id="%1$s" class="bullet-content widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	));
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'sam-services' ),
		'description'   => __( 'First footer widget (intended for nav links)', 'sam-services' ),
		'id'            => 'footer-widget-1',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'before_widget' => '<div id="%1$s" class="footer-link-section widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	));
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'sam-services' ),
		'description'   => __( 'First footer widget (intended for nav links)', 'sam-services' ),
		'id'            => 'footer-widget-2',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'before_widget' => '<div id="%1$s" class="footer-link-section widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	));
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'sam-services' ),
		'description'   => __( 'First footer widget (intended for nav links)', 'sam-services' ),
		'id'            => 'footer-widget-3',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'before_widget' => '<div id="%1$s" class="footer-link-section widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	));

	register_sidebar( array(
		'name'          => __( 'Copyleft', 'sam-services' ),
		'description'   => __( 'Copyleft info for footer (or whereever)', 'sam-services' ),
		'id'            => 'copyleft-widget',
		'before_title'  => '',
		'after_title'   => '',
		'before_widget' => '<div class="copyleft">',
		'after_widget'  => '</div>'
	));

	register_sidebar( array(
		'name'          => __( 'Header', 'sam-services' ),
		'description'   => __( 'Header widget', 'sam-services' ),
		'id'            => 'header-widget',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
		'before_widget' => '<div class="search-bar">',
		'after_widget'  => '</div>'
	));

}
add_action( 'widgets_init', 'sam_services_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sam_services_scripts() {
	wp_enqueue_style( 'sam-services-style', get_stylesheet_uri() );

	wp_enqueue_style( 'sam-services-icon-fonts', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');

	wp_enqueue_style( 'sam-services-web-fonts', 'http://fonts.googleapis.com/css?family=Oswald:400,300,700|Open+Sans+Condensed:300,300italic,700|Open+Sans:400,700,700italic,400italic|Lato:400,400italic,700italic,700,300,300italic|family=Quattrocento:400,700');

	wp_enqueue_script( 'sam-services-responsive-slider', get_template_directory_uri() . '/js/slippry/slippry.js', array(), '20141002', true );

	wp_enqueue_style( 'sam-services-responsive-slider-styles', get_template_directory_uri() . '/js/slippry/slippry.css');

	// wp_enqueue_script( 'sam-services-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	// wp_enqueue_script( 'sam-services-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sam_services_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * If plugin is active load custom fields function
 */
if(is_plugin_active('advanced-custom-fields/acf.php')) {
	// require get_template_directory() . '/inc/custom-fields.php';
}

?>