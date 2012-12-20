jQuery('.ga-download').mouseup(function(){
	var category = 'Documents';
	var action = 'Downloads';
	var label = jQuery( this ).attr('title');
	_gaq.push(['_trackEvent', category , action, label]);
});