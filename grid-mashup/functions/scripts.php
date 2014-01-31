<?php
/**
 * This file loads custom css and js for our theme
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
*/

add_action('wp_enqueue_scripts','wpex_load_scripts');
function wpex_load_scripts() {
	
	
	/*******
	*** CSS
	*******************/
	
	wp_enqueue_style( 'grid-style', get_stylesheet_uri() );
	
	// Google Fonts
	wp_enqueue_style('raleway-google-font', 'http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700', 'style');
	wp_enqueue_style( 'font-awesome', ATT_CSS_DIR . '/font-awesome.min.css', true );
	

	/*******
	*** jQuery
	*******************/
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script('comment-reply');
	}
	
	wp_enqueue_script( 'jquery-masonry', '', array('jquery'), true );	
	wp_enqueue_script('ATT-global', ATT_JS_DIR .'/global.js', false, '1.0', true);
	
}



/**
* Browser Specific CSS
* @Since 1.0
*/
if ( !function_exists('wpex_ie_scripts') ) {
	add_action('wp_head', 'wpex_ie_scripts');
	function wpex_ie_scripts() {
		echo '<!--[if IE]><link rel="stylesheet" type="text/css" href="'. get_template_directory_uri() .'/css/ie.css" media="screen" /><![endif]-->';
		echo '<!--[if IE 8]><link rel="stylesheet" type="text/css" href="'. get_template_directory_uri() .'/css/ancient-ie.css" media="screen" /><![endif]-->';
		echo '<!--[if IE 7]><link rel="stylesheet" type="text/css" href="'. get_template_directory_uri() .'/css/font-awesome-ie7.min.css" media="screen" /><link rel="stylesheet" type="text/css" href="'. get_template_directory_uri() .'/css/antient-ie.css" media="screen" /><![endif]-->';
		echo '<!--[if lt IE 9]>';
		echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
		echo '<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>';
		echo '<![endif]-->';
	}
}