<?php
/*
Plugin Name: Google Analytics
Description: A Hard-coded solution to quickly engage and disengage Google Analytics.
Version: 20121220
Plugin URI: http://library.milliagn.edu/
Author: Jack Weinbender
Author URI: http://library.milligan.edu/
*/

function g_analytics() {
	?>
	<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-4045275-3']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
	</script> <?php
	}
add_action( 'wp_head', 'g_analytics' );

function g_track_downloads() {
	if(!is_user_logged_in()){
		global $post;
		wp_enqueue_script( 'ga_downloads', plugin_dir_url( __file__ ) . 'ga_downloads.js', array( 'jquery' ), '20121219', true );
		}
	}

add_action('wp_enqueue_scripts', 'g_track_downloads');

?>