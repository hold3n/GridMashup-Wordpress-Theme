<?php
/**
 * Pronto functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
 */



/*--------------------------------------*/
/* Define Constants
/*--------------------------------------*/
define( 'ATT_JS_DIR', get_template_directory_uri().'/js' );
define( 'ATT_CSS_DIR', get_template_directory_uri().'/css' );


/*--------------------------------------*/
/* Globals
/*--------------------------------------*/
if ( ! isset( $content_width ) )
	$content_width = 650;


/*--------------------------------------*/
/* Include helper functions
/*--------------------------------------*/
require_once( get_template_directory() .'/functions/options-fallback.php' );
require_once( get_template_directory() .'/functions/scripts.php' );
require_once( get_template_directory() .'/functions/social.php' );
require_once( get_template_directory() .'/functions/widgets/widget-areas.php' );
require_once( get_template_directory() .'/functions/font-awesome.php');
require_once( get_template_directory() .'/functions/custom-excerpt.php');

if( is_admin() ) {
	
	require_once ( get_template_directory() .'/functions/recommend-plugins.php' );
	require_once( get_template_directory() .'/functions/meta/meta-slides.php');
	require_once( get_template_directory() .'/functions/meta/meta-services.php' );
	
} else {
	
	require_once( get_template_directory() .'/functions/external-plugins-support.php' );
	require_once( get_template_directory() .'/functions/comments-callback.php');
	require_once( get_template_directory() .'/functions/image-default-sizes.php');
	require_once( get_template_directory() .'/functions/pagination.php');
	require_once( get_template_directory() .'/functions/aqua-resizer.php');
	require_once( get_template_directory() .'/functions/aqua-resizer-ratio-check.php');
	
}



/*--------------------------------------*/
/* Theme Setup
/*--------------------------------------*/
add_action( 'after_setup_theme', 'grid_setup' );
function grid_setup() {
	
	// Localization support
	load_theme_textdomain( 'wpex', get_template_directory() .'/languages' );
	
	// Editor CSS
	// add_editor_style( 'css/editor-style.css' );

	// Register navigation menus
	register_nav_menus (
		array(
			'main_menu' => __('Main','wpex')
		)
	);
		
	// Add theme support
	add_theme_support('automatic-feed-links');
	add_theme_support('custom-background');
	add_theme_support('post-thumbnails');
	
	/* Infinite scroll via Jetpack
	add_theme_support( 'infinite-scroll', array(
    	'container' => 'infinite-wrap'
	) ); */

}