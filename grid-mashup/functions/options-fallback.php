<?php
/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
 */

if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option($name, $default = false) {
		$optionsframework_settings = get_option('optionsframework');
		$option_name = $optionsframework_settings['id'];
		if ( get_option($option_name) ) {
			$options = get_option($option_name);
		}
		if ( isset($options[$name]) ) {
			return $options[$name];
		} else {
			return $default;
		}
	}
}