<?php 
	$dkk_settings = get_option( 'dkk_options', $dkk_options );
?>
<div id="footer">
      <div class="fcontainer">
         <ul>
            <li><?php echo $dkk_settings['footer_text']; ?></li>
         </ul>
         <?php wp_nav_menu(array('theme_location' => 'footer_navigation')); ?>
         <div class="social">
         	<?php if ($dkk_settings['facebook_url'] != '') { ?>
            <a href="<?php echo $dkk_settings['facebook_url']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.png" width="16" height="16" alt="Check us out on Facebook" /></a>
            <?php } ?>
            <?php if ($dkk_settings['twitter_url'] != '') { ?>
            <a href="<?php echo $dkk_settings['twitter_url']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png" width="16" height="16" alt="Check us out on Twitter" /></a>
            <?php } ?>
            <?php if ($dkk_settings['youtube_url'] != '') { ?>
            <a href="<?php echo $dkk_settings['youtube_url']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/youtube.png" width="16" height="16" alt="Check us out on YouTube" /></a>
            <?php } ?>
            <?php if ($dkk_settings['google_url'] != '') { ?>
            <a href="<?php echo $dkk_settings['google_url']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/google.png" width="16" height="16" alt="Check us out on Google+" /></a>
            <?php } ?>
            <?php if ($dkk_settings['flickr_url'] != '') { ?>
            <a href="<?php echo $dkk_settings['flickr_url']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/flickr.png" width="16" height="16" alt="Check us out on Flickr" /></a>
            <?php } ?>
         </div> <!-- end .social -->
      </div> <!-- end .fcontainer -->
   </div> <!-- end #footer -->
<?php wp_footer(); ?>
</body>
</html>