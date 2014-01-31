<?php
/**
 * Create meta options for the slides post type
 * @package Pronto WordPress Theme
 * @since 1.0
 * @author WPExplorer : http://www.wpexplorer.com
 * @copyright Copyright (c) 2013, WPExplorer
 * @link http://www.wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
$prefix = 'wpex_';

$wpex_meta_box_slides_settings = array(
	'id' => 'att-slides-meta-box-slider',
	'title' =>  __('Post Options', 'ATT'),
	'page' => 'slides',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
            'name' => __('Video URL','wpex'),
            'desc' =>  __('Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'wpex') .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __('Learn More', 'wpex'),
            'id' => $prefix . 'slides_video',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => __('Link URL','wpex'),
            'desc' =>  __('Enter a URL to link this slide to. Example: http://wpexplorer.com', 'wpex') .'</a>',
            'id' => $prefix . 'slides_url',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => __('Link Target','wpex'),
            'desc' =>  __('Select a target for the URL.', 'wpex') .'</a>',
            'id' => $prefix . 'slides_url_target',
            'type' => 'select',
            'std' => 'self',
			'options' => array(
				'self' => 'self',
				'blank' => 'blank'
			)
		)
	),
);

/*-----------------------------------------------------------------------------------*/
// Display meta box in edit slides page
/*-----------------------------------------------------------------------------------*/

add_action('admin_menu', 'wpex_add_box_slides_settings');

function wpex_add_box_slides_settings() {
	global $wpex_meta_box_slides_settings;
	
	add_meta_box($wpex_meta_box_slides_settings['id'], $wpex_meta_box_slides_settings['title'], 'wpex_show_box_slides_settings', $wpex_meta_box_slides_settings['page'], $wpex_meta_box_slides_settings['context'], $wpex_meta_box_slides_settings['priority']);

}

/*-----------------------------------------------------------------------------------*/
//	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function wpex_show_box_slides_settings() {
	global $wpex_meta_box_slides_settings, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="wpex_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($wpex_meta_box_slides_settings['fields'] as $field) {
		
		// get current post meta data & set default value if empty
		$meta = get_post_meta($post->ID, $field['id'], true);
		
		if (empty ($meta)) {
			$meta = $field['std']; 
		}
		
		switch ($field['type']) {
 
			
			//If Select	
			case 'select':
			
				echo '<tr>',
				'<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:50%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#777; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;
				
			//If upload		
			case 'upload':
				
				echo '<tr>',
					'<th style="width:50%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#777; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:65%; margin-right: 20px; float:left;" />';
				echo '<input style="float: left;" type="button" class="wpex_meta_upload button-secondary" button" id="', $field['id'],'_button" value="Upload Image" />';
				
				echo '</td>';
				
				break;
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#777; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			
			
			//If Textarea		
			case 'textarea':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#777; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
			
			break;
			

		}

	}
 
	echo '</table>';
}
 
add_action('save_post', 'wpex_save_data_slides');

/*-----------------------------------------------------------------------------------*/
//	Save data when slides is edited
/*-----------------------------------------------------------------------------------*/
 
function wpex_save_data_slides($post_id) {
	global $wpex_meta_box_slides_settings;
	
	if(!isset($_POST['wpex_meta_box_nonce'])) $_POST['wpex_meta_box_nonce'] = "undefine";
 
	// verify nonce
	if (!wp_verify_nonce($_POST['wpex_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
	//Save fields
	foreach ($wpex_meta_box_slides_settings['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

}

/*-----------------------------------------------------------------------------------*/
/*	Queue Scripts
/*-----------------------------------------------------------------------------------*/
function symple_slides_meta_scripts($hook) {
	if ($hook == 'post.php' || $hook == 'post-new.php') {
		wp_enqueue_script('att-meta-upload', get_template_directory_uri() . '/functions/meta/js/upload_meta.js', array('jquery','media-upload','thickbox'));
	}
}
 
add_action('admin_enqueue_scripts','symple_slides_meta_scripts',10,1);