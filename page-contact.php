<?php
/*
Template Name: Contact Template
*/
?>
			<?php get_header(); ?>
         <div id="container">
            <div class="info radius border">
               <div class="done">
						<strong>Thank you!</strong> We have received your message. You should be receiving a reply from us shortly.
					</div>
					<form id="frm_contact" action="process.php" name="frm_contact">
						<p>First Name:</p>
						<input name="fname" type="text" class="field" id="fname" />
						<p>Last Name:</p>
						<input name="lname" type="text" class="field" id="lname" />
						<p>Email:</p>
						<input name="email" type="text" class="field" id="email" />
						<p>Message:</p>
						<textarea name="message" cols="40" rows="5" class="field" id="message"></textarea>
						<input name="submit" type="submit" id="submit_contact" value="Submit" />
						<div class="loading"></div>
					</form>
					<?php get_sidebar('contact') ?>
					<div class="clear"></div>
            </div> <!-- end .info -->
         </div> <!-- end #container -->
      </div> <!-- end #main -->
   </div> <!-- end #wrap -->
<?php get_footer(); ?>