<?php 
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */
load_theme_textdomain('glenon_wp', get_template_directory() . '/language');

 
/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */ 
 
 /*-----------------------------------------------------------------------------------*/
/* Set Proper Parent/Child theme paths for inclusion
/*-----------------------------------------------------------------------------------*/

@define( 'PARENT_DIR', get_template_directory() );
@define( 'CHILD_DIR', get_stylesheet_directory() );

@define( 'PARENT_URL', get_template_directory_uri()  );
@define( 'CHILD_URL', get_stylesheet_directory_uri() );


/*-----------------------------------------------------------------------------------*/
/* Initialize the Options Framework
/* http://wptheming.com/options-framework-theme/
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'optionsframework_init' ) ) {

    define('OPTIONS_FRAMEWORK_URL', PARENT_URL . '/theme-options/');
    define('OPTIONS_FRAMEWORK_DIRECTORY', PARENT_DIR . '/theme-options/');

require_once (OPTIONS_FRAMEWORK_DIRECTORY . 'options-framework.php');

}

if ( !function_exists( 'popularpost_init' ) ) {
	define( 'POPULAR_POST_WIDGET_DIRECTORY', PARENT_URL . '/includes/wp-most-popular/' );
	require_once dirname( __FILE__ ) . '/includes/wp-most-popular/wp-most-popular.php';
}

// if ( !function_exists( 'siteoriginpanels_init' ) ) {
	// define( 'SITEORIGIN_PANELS_URL', PARENT_URL . '/includes/siteorigin-panels/' );
	// define( 'SITEORIGIN_PANELS_DIR', PARENT_DIR . '/includes/siteorigin-panels/' );
	// require_once dirname( __FILE__ ) . '/includes/siteorigin-panels/siteorigin-panels.php';
// }

if ( !function_exists( 'pagebuilder_init' ) ) {
	define( 'PAGEBUILDER_URL', PARENT_URL . '/function/page-builder/' );
	define( 'PAGEBUILDER_DIR', PARENT_DIR . '/function/page-builder/' );
	require_once dirname( __FILE__ ) . '/function/page-builder/siteorigin-panels.php';
}

if ( !function_exists( 'carouselwidget_init' ) ) {
	define( 'POST_CAROUSEL_WIDGET_DIRECTORY', PARENT_URL . '/includes/' );
	require_once dirname( __FILE__ ) . '/includes/carousel-widget.php';
}

if ( !function_exists( 'allfunction_init' ) ) {
	define( 'FUNCTION_URL', PARENT_URL . '/function/' );
	define( 'FUNCTION_DIR', PARENT_DIR . '/function/' );
	require_once (FUNCTION_DIR . 'flexible-posts-widget.php');
	require_once (FUNCTION_DIR . 'recent-posts-slider.php');
}

if ( !function_exists( 'googlemap_shortcode_init' ) ) {
	define( 'GOOGLEMAP_SHORTCODE_DIRECTORY', PARENT_URL . '/includes/' );
	require_once dirname( __FILE__ ) . '/includes/simple-google-map-short-code.php';
}

// if ( !function_exists( 'add_meta_box_init' ) ) {
	// define( 'METABOX_URL', PARENT_URL . '/function/metabox/' );
	// define( 'METABOX_DIR', PARENT_DIR . '/function/metabox/' );
	// require_once (METABOX_DIR . 'add_meta_box.php');
// }

// require_once (PARENT_DIR . '/includes/twitter-widget.php');
require_once (PARENT_DIR . '/includes/comments.php');

require_once (PARENT_DIR . '/shortcodes.php');

require_once (PARENT_DIR . '/function/enqueue.php');

if ( !function_exists( 'tabber_widget_init' ) ) {
	define( 'TABBER_WIDGET_URL', PARENT_URL . '/includes/tabber-widget/' );
	define( 'TABBER_WIDGET_DIR', PARENT_DIR . '/includes/tabber-widget/' );
	require_once dirname( __FILE__ ) . '/includes/tabber-widget/tabber-tabs.php';
}

// Befor and after content function
require_once (PARENT_DIR . '/function/ba-content.php');

if ( ! isset( $content_width ) ) $content_width = 950;

require_once (PARENT_DIR . '/function/widgets.php');
require_once (PARENT_DIR . '/function/menus.php');

//This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-background' );
$defaults_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults_header );
add_theme_support( 'automatic-feed-links' );

// New Thumbnail Size
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'def-slider-image', 950, 9999, false );
	add_image_size( 'def-blog-thumb', 611, 9999, false ); 
	add_image_size( 'big-proj-thumb', 465, 320, true ); 
	add_image_size( 'wide-img', 430, 105, true );
	add_image_size( 'portf-3col-img', 303, 250, true );
	add_image_size( 'portf-4col-img', 222, 200, true );
	add_image_size( 'carou-widget-image', 90, 55, true ); 
}

add_filter( 'the_category', 'add_nofollow_cat' ); 
function add_nofollow_cat( $text ) { 
$text = str_replace('rel="category tag"', "", $text); return $text; 
}

include("function/portfolio-category.php"); // Include the portfolio functionality
include("function/post-type.php"); // Include the Testimonial Post Type
include("function/portf-layout.php"); // Portfolio Layout function
include("function/common-function.php"); // Common function
	
	// Additional div before comment form
	function arch_comment_form_before(){
	print '<div id="commentsin">';
	}
	add_action( 'comment_form_before', 'arch_comment_form_before' );
	
	function arch_comment_form_after(){
	print '</div>';
	}
	add_action( 'comment_form_after', 'arch_comment_form_after' );
	
require_once (PARENT_DIR . '/function/testi-meta.php');