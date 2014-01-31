<?php
/**
 * @package WordPress
 * @subpackage Pronto WordPress Theme
 * This file registers the theme's widget regions
 */


register_sidebar( array (
	'name' => __( 'Sidebar','wpex'),
	'id' => 'sidebar',
	'description' => __( 'Widgets in this area are used in the default sidebar.','wpex' ),
	'before_widget' => '<div class="sidebar-box %2$s clr">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title"><span>',
	'after_title' => '</span></h4>',
) );