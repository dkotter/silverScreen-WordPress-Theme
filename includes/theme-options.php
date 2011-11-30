<?php

// Default options values
$dkk_options = array(
	'logo_url' => '',
	'favicon_url' => '',
	'footer_text' => '&copy; ' . date('Y') . ' ' . get_bloginfo('name'),
	'theater1' => '',
	'theater2' => '',
	'theater3' => '',
	'facebook_url' => 'http://www.facebook.com/',
	'twitter_url' => 'http://www.twitter.com/',
	'youtube_url' => '',
	'google_url' => '',
	'flickr_url' => '',
	'pricing1' => 'Ages 12 and Up: $6.50<br />
                  Kids Ages 5-11: $1.00<br />
                  Kids 4 and Under: FREE<br />
                  Seniors: $5.00',
   'pricing2' => '',
   'pricing3' => '',
   'location1' => '',
   'location2' => '',
   'location3' => '',
   'map_url1' => '',
   'map_url2' => '',
   'map_url3' => '',
	'weekday' => '',
	'theme_style' => 'black',
	'sort_bar' => true,
	'contact_email' => '',
	'anayltics_id' => ''
);

if ( is_admin() ) : // Load only if we are viewing an admin page

function dkk_register_settings() {
	// Register settings and call dkknitation functions
	register_setting( 'dkk_theme_options', 'dkk_options', 'dkk_validate_options' );
}

add_action( 'admin_init', 'dkk_register_settings' );

// Store layouts views in array
$dkk_layouts = array(
	'black' => array(
		'value' => 'black',
		'label' => 'Black Design'
	),
	'gray' => array(
		'value' => 'gray',
		'label' => 'Gray Design'
	),
	'white' => array(
		'value' => 'white',
		'label' => 'White Design'
	)
);

// Store Week Days in array
$dkk_week_start = array(
	'monday' => array(
		'value' => 'monday',
		'label' => 'Monday'
	),
	'tuesday' => array(
		'value' => 'tuesday',
		'label' => 'Tuesday'
	),
	'wednesday' => array(
		'value' => 'wednesday',
		'label' => 'Wednesday'
	),
	'thursday' => array(
		'value' => 'thursday',
		'label' => 'Thursday'
	),
	'friday' => array(
		'value' => 'friday',
		'label' => 'Friday'
	),
	'saturday' => array(
		'value' => 'saturday',
		'label' => 'Saturday'
	),
	'sunday' => array(
		'value' => 'sunday',
		'label' => 'Sunday'
	),
);

function dkk_theme_options() {
$home_url = home_url();
	// Add theme options page to the admin menu
	add_theme_page( 'Paramount Options', 'Paramount Options', 'edit_theme_options', 'theme_options', 'dkk_theme_options_page' );
}

add_action( 'admin_menu', 'dkk_theme_options' );

// Function to generate options page
function dkk_theme_options_page() {
	global $dkk_options, $dkk_layouts, $dkk_week_start;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false; // This checks whether the form has just been submitted. ?>

	<div class="wrap">

	<?php screen_icon(); echo "<h2>" . get_current_theme() . ' Theme Options' . "</h2>";
	// This shows the page's name and an icon if one has been provided ?>
	
	<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
	<div class="updated fade"><p><strong><?php _e( 'Options Saved', 'paramount' ); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>

	<form method="post" action="options.php">

	<?php $settings = get_option( 'dkk_options', $dkk_options ); ?>
	
	<?php settings_fields( 'dkk_theme_options' );
	/* This function outputs some hidden fields required by the form,
	including a nonce, a unique number used to ensure the form has been submitted from the admin page
	and not somewhere else, very important for security */ ?>

	<table class="form-table">
	<tr>
		<th style="font-size: 15px; font-weight: bold;">Design</th>
	</tr>
	<tr valign="top"><th scope="row"><label for="footer_text">Logo URL</label></th>
		<td>
			<input id="logo_url" name="dkk_options[logo_url]" type="text" value="<?php esc_attr_e($settings['logo_url']); ?>" />
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="favicon_url">Favicon URL</label></th>
		<td>
			<input id="favicon_url" name="dkk_options[favicon_url]" type="text" value="<?php esc_attr_e($settings['favicon_url']); ?>" />
		</td>
	</tr>
	
	<tr valign="top"><th scope="row">Color Scheme</th>
		<td>
	<?php foreach( $dkk_layouts as $layout ) : ?>
			<input type="radio" id="<?php echo $layout['value']; ?>" name="dkk_options[theme_style]" value="<?php esc_attr_e( $layout['value'] ); ?>" <?php checked( $settings['theme_style'], $layout['value'] ); ?> />
			<label for="<?php echo $layout['value']; ?>"><?php echo $layout['label']; ?></label><br />
	<?php endforeach; ?>
		</td>
	</tr>

	<tr valign="top"><th scope="row">Sort Bar</th>
		<td>
			<input type="checkbox" id="sort_bar" name="dkk_options[sort_bar]" value="1" <?php checked( true, $settings['sort_bar'] ); ?> />
			<label for="sort_bar">Show Sort Bar</label>
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="footer_text">Footer Text</label></th>
		<td>
			<input id="footer_text" name="dkk_options[footer_text]" type="text" value="<?php  esc_attr_e($settings['footer_text']); ?>" />
		</td>
	</tr>
	
	<tr>
		<th style="font-size: 15px; font-weight: bold;">General Settings</th>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="analytics_id">Google Analytics ID</label></th>
		<td>
			<input id="analytics_id" name="dkk_options[analytics_id]" type="text" value="<?php  esc_attr_e($settings['analytics_id']); ?>" />
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="contact_email">Email Contact Form Sends To</label></th>
		<td>
			<input id="contact_email" name="dkk_options[contact_email]" type="text" value="<?php  esc_attr_e($settings['contact_email']); ?>" />
		</td>
	</tr>
	<tr>
		<th style="font-size: 15px; font-weight: bold;">Theater Settings</th>
	</tr>
	<tr valign="top">
		<th scope="row">Day Movie Week Starts On</th>
		<td>
			<select id="weekday" name="dkk_options[weekday]">
				<option value="">Select One...</option>
				<?php foreach($dkk_week_start as $week_start) :
				$label = $week_start['label'];
				$selected = '';
				if ( $week_start['value'] == $settings['weekday'] )
				$selected = 'selected="selected"';
				echo '<option value="' . esc_attr( $week_start['value'] ) . '" ' . $selected . '>' . $label . '</option>';
				endforeach; ?>
			</select>
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="theater1">Theater 1</label></th>
		<td>
			<input id="theater1" name="dkk_options[theater1]" type="text" value="<?php esc_attr_e($settings['theater1']); ?>" />
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="pricing1">Pricing for <?php if($settings['theater1'] != '') { echo $settings['theater1']; } else { echo 'theater 1'; } ?></label></th>
		<td>
			<textarea id="pricing1" name="dkk_options[pricing1]" rows="5" cols="30"><?php echo stripslashes($settings['pricing1']); ?>
			</textarea>
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="location1">Location for <?php if($settings['theater1'] != '') { echo $settings['theater1']; } else { echo 'theater 1'; } ?></label></th>
		<td>
			<textarea id="location1" name="dkk_options[location1]" rows="5" cols="30"><?php echo stripslashes($settings['location1']); ?>
			</textarea>
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="map_url1">Map URL for <?php if($settings['theater1'] != '') { echo $settings['theater1']; } else { echo 'theater 1'; } ?></label></th>
		<td>
			<input id="map_url1" name="dkk_options[map_url1]" type="text" value="<?php esc_attr_e($settings['map_url1']); ?>" />
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="theater2">Theater 2</label></th>
		<td>
			<input id="theater2" name="dkk_options[theater2]" type="text" value="<?php  esc_attr_e($settings['theater2']); ?>" />
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="pricing2">Pricing for <?php if($settings['theater2'] != '') { echo $settings['theater2']; } else { echo 'theater 2'; } ?></label></th>
		<td>
			<textarea id="pricing2" name="dkk_options[pricing2]" rows="5" cols="30"><?php echo stripslashes($settings['pricing2']); ?>
			</textarea>
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="location2">Location for <?php if($settings['theater2'] != '') { echo $settings['theater2']; } else { echo 'theater 2'; } ?></label></th>
		<td>
			<textarea id="location2" name="dkk_options[location2]" rows="5" cols="30"><?php echo stripslashes($settings['location2']); ?>
			</textarea>
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="map_url2">Map URL for <?php if($settings['theater2'] != '') { echo $settings['theater2']; } else { echo 'theater 2'; } ?></label></th>
		<td>
			<input id="map_url2" name="dkk_options[map_url2]" type="text" value="<?php esc_attr_e($settings['map_url2']); ?>" />
		</td>
	</tr>

	<tr valign="top"><th scope="row"><label for="theater3">Theater 3</label></th>
		<td>
			<input id="theater3" name="dkk_options[theater3]" type="text" value="<?php  esc_attr_e($settings['theater3']); ?>" />
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="pricing3">Pricing for <?php if($settings['theater3'] != '') { echo $settings['theater3']; } else { echo 'theater 3'; } ?></label></th>
		<td>
			<textarea id="pricing3" name="dkk_options[pricing3]" rows="5" cols="30"><?php echo stripslashes($settings['pricing3']); ?>
			</textarea>
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="location3">Location for <?php if($settings['theater3'] != '') { echo $settings['theater3']; } else { echo 'theater 3'; } ?></label></th>
		<td>
			<textarea id="location3" name="dkk_options[location3]" rows="5" cols="30"><?php echo stripslashes($settings['location3']); ?>
			</textarea>
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="map_url3">Map URL for <?php if($settings['theater3'] != '') { echo $settings['theater3']; } else { echo 'theater 3'; } ?></label></th>
		<td>
			<input id="map_url3" name="dkk_options[map_url3]" type="text" value="<?php esc_attr_e($settings['map_url3']); ?>" />
		</td>
	</tr>
	
	<tr>
		<th style="font-size: 15px; font-weight: bold;">Social Options</th>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="facebook_url">Facebook URL</label></th>
		<td>
			<input id="facebook_url" name="dkk_options[facebook_url]" type="text" value="<?php  esc_attr_e($settings['facebook_url']); ?>" />
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="twitter_url">Twitter URL</label></th>
		<td>
			<input id="twitter_url" name="dkk_options[twitter_url]" type="text" value="<?php  esc_attr_e($settings['twitter_url']); ?>" />
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="youtube_url">YouTube URL</label></th>
		<td>
			<input id="youtube_url" name="dkk_options[youtube_url]" type="text" value="<?php  esc_attr_e($settings['youtube_url']); ?>" />
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="google_url">Google+ URL</label></th>
		<td>
			<input id="google_url" name="dkk_options[google_url]" type="text" value="<?php  esc_attr_e($settings['google_url']); ?>" />
		</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="flickr_url">Flickr URL</label></th>
		<td>
			<input id="flickr_url" name="dkk_options[flickr_url]" type="text" value="<?php  esc_attr_e($settings['flickr_url']); ?>" />
		</td>
	</tr>

	</table>

	<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>

	</form>

	</div>

	<?php
}

function dkk_validate_options( $input ) {
	global $dkk_options, $dkk_layouts, $dkk_week_start;

	$settings = get_option( 'dkk_options', $dkk_options );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['logo_url'] = wp_filter_nohtml_kses( $input['logo_url'] );
	$input['favicon_url'] = wp_filter_nohtml_kses( $input['favicon_url'] );
	$input['footer_text'] = wp_filter_nohtml_kses( $input['footer_text'] );
	$input['analytics_id'] = wp_filter_nohtml_kses( $input['analytics_id'] );
	$input['contact_email'] = wp_filter_nohtml_kses( $input['contact_email'] );
	$input['theater1'] = wp_filter_nohtml_kses( $input['theater1'] );
	$input['theater2'] = wp_filter_nohtml_kses( $input['theater2'] );
	$input['theater3'] = wp_filter_nohtml_kses( $input['theater3'] );
	$input['facebook_url'] = wp_filter_nohtml_kses( $input['facebook_url'] );
	$input['twitter_url'] = wp_filter_nohtml_kses( $input['twitter_url'] );
	$input['google_url'] = wp_filter_nohtml_kses( $input['google_url'] );
	$input['flickr_url'] = wp_filter_nohtml_kses( $input['flickr_url'] );
	$input['map_url1'] = wp_filter_nohtml_kses( $input['map_url1'] );
	$input['map_url2'] = wp_filter_nohtml_kses( $input['map_url2'] );
	$input['map_url3'] = wp_filter_nohtml_kses( $input['map_url3'] );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['pricing1'] = wp_filter_post_kses( $input['pricing1'] );
	$input['pricing2'] = wp_filter_post_kses( $input['pricing2'] );
	$input['pricing3'] = wp_filter_post_kses( $input['pricing3'] );
	$input['location1'] = wp_filter_post_kses( $input['location1'] );
	$input['location2'] = wp_filter_post_kses( $input['location2'] );
	$input['location3'] = wp_filter_post_kses( $input['location3'] );
		
	// We select the previous value of the field, to restore it in case an invalid entry has been given
	$prev = $settings['theme_style'];
	// We verify if the given value exists in the layouts array
	if ( !array_key_exists( $input['theme_style'], $dkk_layouts ) )
		$input['theme_style'] = $prev;
	
	$prev_day = $settings['weekday'];
	if ( !array_key_exists( $input['weekday'], $dkk_week_start ) )
		$input['weekday'] = $prev_day;
	
	// If the checkbox has not been checked, we void it
	if ( ! isset( $input['sort_bar'] ) )
		$input['sort_bar'] = null;
	// We verify if the input is a boolean value
	$input['sort_bar'] = ( $input['sort_bar'] == 1 ? 1 : 0 );
	
	return $input;
}

endif;  // EndIf is_admin()