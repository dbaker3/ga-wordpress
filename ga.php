<?php
/*
Plugin Name: Google Analytics
Description: An simple solution for adding google analytics to pages (with event tracking)
Version: 20130124
Plugin URI: http://library.milliagn.edu/
Author: Jack Weinbender
Author URI: http://library.milligan.edu/
*/

function g_analytics() {
	if(!is_user_logged_in()){
		$account_num = 'TEST'; // UA-4045275-3

		$script  = '<script type="text/javascript">';
		$script .= "var _gaq = _gaq || [];";
		$script .= "_gaq.push(['_setAccount', '$account_num']);";
		$script .= "_gaq.push(['_trackPageview']);";
		$script .= "</script>";

		echo $script;
	} 
}
add_action( 'wp_head', 'g_analytics' );


function ga_add_ga_js() {
		wp_enqueue_script( 'ga', plugin_dir_url( __file__ ) . 'ga.js', array( 'jquery' ), '20121219', true );
	}

add_action('wp_enqueue_scripts', 'ga_add_ga_js');

?>