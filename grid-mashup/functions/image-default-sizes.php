<?php
/**
 * Creates a function for your featured image sizes which can be altered via your child theme
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
*/
 
if ( ! function_exists( 'wpex_img' ) ) :

	function wpex_img($args){

		//blog entries
		if( $args == 'blog_entry_width' ) return '1000';
		if( $args == 'blog_entry_height' ) return '1000';
		if( $args == 'blog_entry_crop' ) return true;

		//blog post
		if( $args == 'blog_post_width' ) return '1120';
		if( $args == 'blog_post_height' ) return '600';
		if( $args == 'blog_post_crop' ) return true;

	}

endif;