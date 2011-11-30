<?php
// Based off of the Roots Theme Framework
// View it online at http://www.rootstheme.com/

// admin CSS and JS
add_action('admin_init', 'roots_admin_init');

function roots_admin_init() {
	$home_url = home_url();
	
	wp_register_style('roots_admin_css', "$home_url/wp-content/themes/silverScreen/includes/css/admin.css");
	wp_enqueue_style('roots_admin_css');
	
}

// check to see if the tagline is set to default
// show an admin notice to update if it hasn't been changed
// you want to change this or remove it because it's used as the description in the RSS feed
if (get_option('blogdescription') === 'Just another WordPress site') { 
	add_action('admin_notices', create_function('', "echo '<div class=\"error\"><p>" . sprintf(__('Please update your <a href="%s">site tagline</a>', 'paramount'), admin_url('options-general.php')) . "</p></div>';"));
};

// set the post revisions to 5 unless the constant
// was set in wp-config.php to avoid DB bloat
if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', 5);

// allow more tags in TinyMCE including iframes
function roots_change_mce_options($options) {
	$ext = 'pre[id|name|class|style],iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src]';	
	if (isset($initArray['extended_valid_elements'])) {
		$options['extended_valid_elements'] .= ',' . $ext;
	} else {
		$options['extended_valid_elements'] = $ext;
	}
	return $options;
}

add_filter('tiny_mce_before_init', 'roots_change_mce_options');

function new_contactmethods( $contactmethods ) {
    $contactmethods['twitter'] = 'Twitter'; // Add Twitter
    $contactmethods['facebook'] = 'Facebook'; // Add Facebook
    $contactmethods['google'] ='Google+';
    unset($contactmethods['yim']); // Remove YIM
    unset($contactmethods['aim']); // Remove AIM
    unset($contactmethods['jabber']); // Remove Jabber

    return $contactmethods;
}
    add_filter('user_contactmethods','new_contactmethods',10,1);

?>