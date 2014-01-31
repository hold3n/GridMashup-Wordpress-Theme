<?php
// Define options framework name for the DB
function optionsframework_option_name() {
	
    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = 'options_wpex_themes';
    update_option('optionsframework', $optionsframework_settings);
	
}

// Begin Options Function
function optionsframework_options() {

	// Begin options array
	$options = array();	
	
	//GENERAL
	$options[] = array(
		'name' => __('General', 'wpex'),
		'type' => 'heading');
		
	$options['custom_logo'] = array(
		'name' => __('Custom Logo', 'wpex'),
		'desc' => __('Upload your custom logo.', 'wpex'),
		'id' => 'custom_logo',
		'type' => 'upload');
		
	$options['blog_single_thumbnail'] = array(
		'name' => __('Toggle: Featured Images On Single Posts', 'wpex'),
		'desc' => __('Check box to enable featured images on single blog posts.', 'wpex'),
		'id' => 'blog_single_thumbnail',
		'std' => '1',
		'type' => 'checkbox');
			
	$options['blog_tags'] = array(
		'name' => __('Toggle: Tags', 'wpex'),
		'desc' => __('Check box to enable tag display on single posts.', 'wpex'),
		'id' => 'blog_tags',
		'std' => '1',
		'type' => 'checkbox');

	return $options;
}