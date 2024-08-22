<?php
/**
 * TinyMCE EDITOR BUTTONS
 */

add_action('init', 'buttons');

function buttons() {
        if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages')){
        	return;
        }
        if ( get_user_option('rich_editing') == 'true' ) {
		global $typenow;
            if (empty($typenow) && !empty($_GET['post']) ) {
                $post = get_post($_GET['post']);
                $typenow = $post->post_type;
            }
			add_filter( 'mce_external_plugins', 'add_plugin' );
			add_filter( 'mce_buttons', 'register_button' );
       }
    }

function register_button($buttons) {  
   array_push($buttons, "pp_one_fourth", "pp_one_third", "pp_one_half", "pp_two_thirds", "pp_three_fourths",  "pp_one", "pp_clear", "pp_separator", "pp_button", "pp_icon",  "pp_flexslider",  "pp_authors",  "pp_portfolio");  
   return $buttons;  
} 

function add_plugin($plugin_array) {  
   $plugin_array['quote'] = get_template_directory_uri() . '/lib/js/tinymce.js';  
   return $plugin_array;  
} 

?>