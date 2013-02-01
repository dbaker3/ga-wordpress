<?php
/*
Plugin Name: Google Analytics
Description: An simple solution for adding google analytics to pages (with event tracking)
Version: 20130130
Plugin URI: https://github.com/jackweinbender/ga-wordpress
Author: Jack Weinbender
Author URI: https://github.com/jackweinbender
*/

function g_analytics() {
	if(!is_user_logged_in()){
		$account_num = 'UA-4045275-3';
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

add_action( 'wp_head', 'g_track_downloads' );


function ga_add_ga_js() {?>
<script type="text/javascript">
	(function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script><?php
	}

add_action('admin_footer', 'ga_add_ga_js');
add_action('wp_footer', 'ga_add_ga_js');

?>