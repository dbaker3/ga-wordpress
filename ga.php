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
		?>
			<script type="text/javascript">
				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', '<?php echo $account_num ?>']);
				_gaq.push(['_trackPageview']);
			</script>
		<?php } 
}
add_action( 'wp_head', 'g_analytics' );

function g_track_downloads(){
	if(!is_user_logged_in()){ ?>
		<script type="text/javascript">
			/** Tracks clicked links with ga-download class **/
				jQuery('.ga-download').mouseup(function(){
					var category = 'Documents';
					var action = 'Downloads';
					var label = jQuery( this ).attr('title');
					_gaq.push(['_trackEvent', category , action, label]);
				});
		</script>
	<?php }
}

add_action( 'wp_footer', 'g_track_downloads' );


function ga_add_ga_js() {
		wp_enqueue_script( 'ga', plugin_dir_url( __file__ ) . 'ga.js', array( 'jquery' ), '20121219', true );
	}

add_action('wp_enqueue_scripts', 'ga_add_ga_js');

?>