<?php
/*
Plugin Name: Google Analytics
Description: An simple solution for adding google analytics to pages (with event tracking)
Version: 20130130
Plugin URI: https://github.com/jackweinbender/ga-wordpress
Author: Jack Weinbender
Author URI: https://github.com/jackweinbender
*/

/*
	Modified to use analytics.js - David Baker 2016
*/

function g_analytics() {
	if(!is_user_logged_in()){
		$tracking_id = '';	   	/***** Make sure to enter your Tracking ID! *****/
		?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
			ga('create', '<?php echo $tracking_id ?>', 'auto');
			ga('send', 'pageview');
		</script>
		<?php } 
}
add_action( 'wp_head', 'g_analytics' );

function g_track_downloads(){
	if(!is_user_logged_in()){ ?>
		<script>
			/** Tracks clicked links with ga-download class **/
			jQuery('.ga-download').mouseup(function(){
				var category = 'Documents';
				var action = 'Downloads';
				var label = jQuery( this ).attr('title');
				ga('send', 'event', category , action, label);
			});
		</script>
	<?php }
}
add_action( 'wp_footer', 'g_track_downloads' );
