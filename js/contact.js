jQuery(document).ready(function() {
	
	//if submit button is clicked
	jQuery('#submit_contact').click(function () {		
		
		//Get the data from all the fields
		var fname = jQuery('input[name=fname]');
		var lname = jQuery('input[name=lname]');
		var email = jQuery('input[name=email]');
		var message = jQuery('textarea[name=message]');

		//Simple validation to make sure user entered something
		//If error found, add hightlight class to the text field
		if (fname.val()=='') {
			fname.addClass('highlight');
			return false;
		} else fname.removeClass('highlight');
		
		if (lname.val()=='') {
			lname.addClass('highlight');
			return false;
		} else lname.removeClass('highlight');
		
		if (email.val()=='') {
			email.addClass('highlight');
			return false;
		} else email.removeClass('highlight');
		
		if (message.val()=='') {
			message.addClass('highlight');
			return false;
		} else message.removeClass('highlight');
		
		//organize the data properly
		var data = 'fname=' + fname.val() + '&lname=' + lname.val() + '&email=' + email.val() + '&message='  + encodeURIComponent(message.val());
		
		//disabled all the text fields
		jQuery('.field').attr('disabled','true');
		
		//show the loading sign
		jQuery('.loading').show();
		
		//start the ajax
		jQuery.ajax({
			//this is the php file that processes the data and send mail
			url: "../process",	
			
			//GET method is used
			type: "GET",

			//pass the data			
			data: data,		
			
			//Do not cache the page
			cache: false,
			
			//success
			success: function (html) {				
				//if process.php returned 1/true (send mail success)
				if (html==1) {					
					//hide the form
					jQuery('#frm_contact').fadeOut('slow');					
					
					//show the success message
					jQuery('.done').fadeIn('slow');
					
				//if process.php returned 0/false (send mail failed)
				} else alert('Sorry, unexpected error. Please try again later.');				
			}		
		});
		
		//cancel the submit button default behaviours
		return false;
	});	
});