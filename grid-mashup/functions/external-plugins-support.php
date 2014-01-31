<?php
/**
 * Adds support for various external plugins
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
 */

// Change post types for the gallery-metabox plugin to support portfolio/services/standard
if ( !function_exists( 'custom_be_gallery_metabox_post_types' ) ) :
	function custom_be_gallery_metabox_post_types( $classes ) {			
			$post_types = array('portfolio', 'services');
			$classes = array_merge( $classes, $post_types );		
			return $classes;
	}
	add_filter( 'be_gallery_metabox_post_types', 'custom_be_gallery_metabox_post_types' );
endif;