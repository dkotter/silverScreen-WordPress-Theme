jQuery.noConflict();
   jQuery(document).ready(function() {
		jQuery('#container .movie_image img.movie_poster').hover(function () {
			jQuery(this).css('background', '#f7931e');
		}, function () {
			jQuery(this).css('background', '#000000');
		});
		jQuery('#container .movie_image img.movie_poster').click(function (e) {
	   	e.preventDefault();
		   jQuery(this).parent().next('div.expanded').show();
		   jQuery('div.expanded iframe').fadeIn();
		   jQuery('#container > img').hide();
			jQuery('#container .movie_image').hide();
		   jQuery('#sort').hide();
	   });
	   jQuery('.expanded .close').click(function () {
		   jQuery('.expanded iframe').fadeOut();
		   jQuery('.expanded').hide();
		   jQuery('#container > img').show();
			jQuery('#container .movie_image').show();
		   jQuery('#sort').show();
	   });
	   jQuery.ajaxSetup({cache:false});
	   // When sort button is clicked
	   jQuery('#sort a.submit').click(function(e) {
	   	e.preventDefault();
		   // Get data from fields
		   var theater1 = jQuery('input:checked[name=theater1]');
		   var theater2 = jQuery('input:checked[name=theater2]');
		   var theater3 = jQuery('input:checked[name=theater3]');
		   var g = jQuery('input:checked[name=g]');
		   var pg = jQuery('input:checked[name=pg]');
		   var pg13 = jQuery('input:checked[name=pg13]');
		   var time = jQuery('select#time');
		   var day = jQuery('select#day');
		   
		   // Organize Data
		   var data = '?theater1=' + theater1.val() + '&theater2=' + theater2.val() + '&theater3=' + theater3.val() + '&g=' + g.val() + '&pg=' + pg.val() + '&pg13=' + pg13.val() + '&time=' + time.val() + '&day=' + day.val();
		   jQuery('#container').html('<img src="assets/ajax-loader.gif" alt="Loading..." />');
		   jQuery('#container').fadeOut('slow', function() {
		       jQuery(this).load('sort/' + data, function() {
				   jQuery(this).fadeIn('slow');
			   });
		       return false;
		   });
	   });
   });