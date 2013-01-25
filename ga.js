
/** Creates the ga.js file needed for all ga stuff **/

(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();


/** Tracks clicked links with ga-download class **/
jQuery('.ga-download').mouseup(function(){
	var category = 'Documents';
	var action = 'Downloads';
	var label = jQuery( this ).attr('title');
	_gaq.push(['_trackEvent', category , action, label]);
});