<?php
/**
 * Todd Productions Inc. functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Todd Productions Inc.
 */

if ( ! function_exists( 'tp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Todd Productions Inc., use a find and replace
	 * to change 'tp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tp', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'tp' ),
		'footer-menu-1' => __( 'Footer 1', 'tp' ),
		'footer-menu-2' => __( 'Footer 2', 'tp'),
		'footer-menu-3' => __('Footer 3', 'tp')
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
	add_theme_support( 'custom-background', apply_filters( 'tp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'tp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tp_content_width', 640 );
}
add_action( 'after_setup_theme', 'tp_content_width', 0 );


/*
 *
 * Add Page Categories
 * Page Excerpts
 *
 */
function tp_pagesetup() {
	add_post_type_support( 'page', 'excerpt' );
	// Add category metabox to page
	register_taxonomy_for_object_type('category', 'page');
	}
add_action( 'init', 'tp_pagesetup' );

/**
 * Enqueue scripts and styles.
 */
function tp_scripts() {

	wp_enqueue_style('tp-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:400,700');

	wp_enqueue_style('tp-bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');

	wp_enqueue_style('tp-bs-overwrite', get_template_directory_uri() . '/css/bs-overwrite.css');

	wp_enqueue_style('tp-style-main', get_template_directory_uri() . '/css/main.css');

	wp_enqueue_style( 'tp-style', get_stylesheet_uri() );

	/*
	 * Libraries
	 */

	wp_enqueue_script( 'tp-bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.4', true );

	wp_enqueue_script( 'tp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script('tp-js-functions', get_template_directory_uri() . '/js/function.js', array('jquery'), '1.0', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tp_scripts' );

/**
 * Admin Add Scripts
 */
function msf_admin_scripts(){

	wp_enqueue_script( 'tp-admin-js', get_template_directory_uri() . '/js/admin.js', array('jquery'), '3.3.4', true );
	wp_enqueue_style('tp-admin-css', get_template_directory_uri() . '/css/admin.css');

}
add_action( 'admin_enqueue_scripts', 'msf_admin_scripts' );


/**
 * Remove Options from toolbar
 */
 function webriti_remove_admin_bar_links() {
 global $wp_admin_bar;

 //Remove WordPress Logo Menu Items
 $wp_admin_bar->remove_menu('wp-logo'); // Removes WP Logo and submenus completely, to remove individual items, use the below mentioned codes
 $wp_admin_bar->remove_menu('about'); // 'About WordPress'
 $wp_admin_bar->remove_menu('wporg'); // 'WordPress.org'
 $wp_admin_bar->remove_menu('documentation'); // 'Documentation'
 $wp_admin_bar->remove_menu('support-forums'); // 'Support Forums'
 $wp_admin_bar->remove_menu('feedback'); // 'Feedback'


 $wp_admin_bar->remove_menu('themes'); // 'Themes'
 $wp_admin_bar->remove_menu('widgets'); // 'Widgets'
 $wp_admin_bar->remove_menu('menus'); // 'Menus'

 // Remove Comments Bubble
 $wp_admin_bar->remove_menu('comments');

 //Remove Update Link if theme/plugin/core updates are available
 $wp_admin_bar->remove_menu('updates');

 //Remove '+ New' Menu Items
 $wp_admin_bar->remove_menu('new-content'); // Removes '+ New' and submenus completely, to remove individual items, use the below mentioned codes
 $wp_admin_bar->remove_menu('new-post'); // 'Post' Link
 $wp_admin_bar->remove_menu('new-media'); // 'Media' Link
 $wp_admin_bar->remove_menu('new-link'); // 'Link' Link
 $wp_admin_bar->remove_menu('new-page'); // 'Page' Link
 $wp_admin_bar->remove_menu('new-user'); // 'User' Link

 }
 add_action( 'wp_before_admin_bar_render', 'webriti_remove_admin_bar_links' );


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
