<?php 
global $dkk_options;
global $dkk_settings;
$dkk_settings = get_option( 'dkk_options', $dkk_options );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php wp_title(''); ?></title>
<?php if($dkk_settings['favicon_url']) { ?>
<link rel="shortcut icon" href="<?php echo $dkk_settings['favicon_url'] ?>" />
<?php } else { ?>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
<?php } ?>
<?php if($dkk_settings['theme_style'] == 'black') { ?>
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style-black.css" />
<?php }
elseif($dkk_settings['theme_style'] == 'gray') { ?>
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style-gray.css" />
<?php }
elseif($dkk_settings['theme_style'] == 'white') { ?>
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style-white.css" />
<?php }
else { ?>
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style-black.css" />
<?php } ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if !IE 7]>
	<style type="text/css">
		#wrap {display:table;height:100%}
	</style>
<![endif]-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready( function () {	
		// THEATER PAGE MAP - CHANGE OPACITY ON HOVER
		jQuery('.map').css({opacity: 0.7});
		
		jQuery('.map').hover(function () {
			jQuery(this).fadeTo('fast', 1);	
		},
			function () {
				jQuery(this).fadeTo('fast', 0.7);	
			}
		);
		jQuery('.hidden .close').click(function () {
			jQuery('#lean_overlay').fadeOut(200);
			jQuery(this).parent().css({'display' : 'none'});
		});
	});
</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.leanModal.min.js"></script>
<script type="text/javascript">
	jQuery(function() {
		jQuery('a[rel*=leanModal]').leanModal({ top : 50 });		
	});
</script>
<?php if( is_front_page() ) { ?>
<?php if( $dkk_settings['sort_bar']) { ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom-form-elements.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/sort.js"></script>
<?php } 
} ?>
<?php if( is_page('contact') ) { ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/contact.js"></script>
<?php } ?>
<?php wp_deregister_script('jquery'); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="wrap">
		<div id="main">
		<div id="logo">
			<?php list($width, $height, $type, $attr) = getimagesize($dkk_settings['logo_url']); ?>
			<img src="<?php echo $dkk_settings['logo_url']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="<?php bloginfo( 'name' ); ?> Logo" />
		</div> <!-- end #logo -->
<?php get_header(); ?>
      <div id="nav">
      	<?php wp_nav_menu(array('theme_location' => 'primary_navigation')); ?>
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
		</div> <!-- end #nav -->
		<?php if( is_front_page() ) {
			if($dkk_settings['sort_bar']) { ?>
		<div id="sort">
			<form action="">
				<?php if($dkk_settings['theater1']) { ?>
				<span class="label"><?php echo $dkk_settings['theater1']; ?></span><input type="checkbox" name="theater1" value="<?php echo urlencode($dkk_settings['theater1']); ?>" class="styled" />
				<?php }
				if($dkk_settings['theater2']) { ?>
				<span class="label"><?php echo $dkk_settings['theater2']; ?></span><input type="checkbox" name="theater2" value="<?php echo urlencode($dkk_settings['theater2']); ?>" class="styled" />
				<?php }
				if($dkk_settings['theater3']) { ?>
				<span class="label"><?php echo $dkk_settings['theater3']; ?></span><input type="checkbox" name="theater3" value="<?php echo urlencode($dkk_settings['theater3']); ?>" class="styled" />
				<?php } ?>
				<span class="label">G</span><input type="checkbox" name="g" value="g" class="styled" />
				<span class="label">PG</span><input type="checkbox" name="pg" value="pg" class="styled" />
				<span class="label">PG-13</span><input type="checkbox" name="pg13" value="pg13" class="styled" />
				<select class="styled" id="time" name="time">
					<option value="all_time">Any Showtime</option>
					<option value="matinee">Matinee</option>
					<option value="evening">Evening</option>
					<option value="late">Late Night</option>
				</select>
				<select class="styled" id="day" name="day">
					<option value="all_days">Any Day</option>
					<?php $today = date('l, M j'); ?>
					<option value="<?php echo urlencode(date('l, M j', strtotime('now'))); ?>"><?php echo $today; ?></option>
					<option value="<?php echo urlencode(date('l, M j', strtotime('+1 days'))); ?>"><?php echo date('l, M j', strtotime('+1 days')) ?></option>
					<option value="<?php echo urlencode(date('l, M j', strtotime('+2 days'))); ?>"><?php echo date('l, M j', strtotime('+2 days')) ?></option>
					<option value="<?php echo urlencode(date('l, M j', strtotime('+3 days'))); ?>"><?php echo date('l, M j', strtotime('+3 days')) ?></option>
					<option value="<?php echo urlencode(date('l, M j', strtotime('+4 days'))); ?>"><?php echo date('l, M j', strtotime('+4 days')) ?></option>
					<option value="<?php echo urlencode(date('l, M j', strtotime('+5 days'))); ?>"><?php echo date('l, M j', strtotime('+5 days')) ?></option>
				</select>
				<a href="#" class="submit"><span>Sort</span></a>
				<a href="#schedule" rel="leanModal" class="schedule"><span>Print Schedule</span></a>
			</form>
		</div> <!-- end #sort -->
		<?php } 
		} ?>