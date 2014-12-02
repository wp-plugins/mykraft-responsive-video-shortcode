<?php
/*
Plugin Name: Mykraft Theme Responsive Video Shortcode
Plugin URI: http://megakrafts.com/mykraft-responsive-video-shortcode-plugin
Description: Mykraft Responsive Video Shortcode plugin is a simple way to add responsive video to your WordPress pages using editor button that inserts responsive video short-code.
Version: 1.0
Author: Vitomir Gojak
Author Email: mykraftmail@gmail.com
License: GPL2
*/

//  Register Styles
    function rv_register_styles() {
        wp_register_style('style.rv', plugins_url('/mykraft-responsive-video-shortcode/css/shortcodes.css'));
        wp_enqueue_style('style.rv');
	}
	add_action('wp_print_styles', 'rv_register_styles');

//  Responsive Video Short Code
    function responsive_video_shortcode( $atts, $content = null ) {
    return '<span class="featured-video">' . $content . '</span>';
    }
    add_shortcode('responsivevideo', 'responsive_video_shortcode');

//  Responsive Video Shortcode TinyMCE Button  
    add_action('init', 'add_button2');  
    function add_button2() {  
       if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
       {  
         add_filter('mce_external_plugins', 'add_plugin2');  
         add_filter('mce_buttons', 'register_button2');  
       }  
    }

//  Register Button	
	function register_button2($buttons) {  
       array_push($buttons, "videoframe");  
       return $buttons;  
    }  
	
//  Add Button Script
	function add_plugin2($plugin_array) {  
       $plugin_array['videoframe'] = plugins_url('/mykraft-responsive-video-shortcode/js/shortcodes.js');
       return $plugin_array;  
    }  

?>