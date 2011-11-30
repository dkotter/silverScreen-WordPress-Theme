<?php

// Add Custom Post Type Movies
add_action('init', 'dkk_custom_init');
function dkk_custom_init() {
	$labels = array(
		'name' => 'Movies',
		'singular_name' => 'Movie',
		'menu_name' => 'Movies',
		'add_new' => 'Add Movie',
		'add_new_item' => 'Add New Movie',
		'edit' => 'Edit',
		'edit_item' => 'Edit Movie',
		'new_item' => 'New Movie',
		'view' => 'View Movie',
		'view_item' => 'View Movie',
		'search_items' => 'Search Movies',
		'not_found' => 'No Movies Found',
		'not_found_in_trash' => 'No Movies Found in Trash',
		'parent' => 'Parent Movie'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title'),
		'taxonomies' => array('category', 'post_tag')
	);
	register_post_type('movies', $args);
}

// Add Custom Post Type Coming Soon
add_action('init', 'coming_soon_custom_init');
function coming_soon_custom_init() {
	$labels = array(
		'name' => 'Coming Soon',
		'singular_name' => 'Coming Soon',
		'menu_name' => 'Coming Soon',
		'add_new' => 'Add Coming Soon',
		'add_new_item' => 'Add New Coming Soon',
		'edit' => 'Edit',
		'edit_item' => 'Edit Coming Soon',
		'new_item' => 'New Coming Soon',
		'view' => 'View Coming Soon',
		'view_item' => 'View Coming Soon',
		'search_items' => 'Search Coming Soon',
		'not_found' => 'No Coming Soon Found',
		'not_found_in_trash' => 'No Coming Soon Found in Trash',
		'parent' => 'Parent Coming Soon'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title'),
		'taxonomies' => array('category', 'post_tag')
	);
	register_post_type('coming-soon', $args);
}

add_action('admin_head', 'cpt_icons');
function cpt_icons() { ?>
	<style type="text/css" media="screen">
	#menu-posts-movies .wp-menu-image {
		background: url(<?php bloginfo('template_url') ?>/images/film.png) no-repeat 6px -17px !important;
	}
	#menu-posts-movies:hover .wp-menu-image, #menu-posts-movies.wp-has-current-submenu .wp-menu-image {
		background-position: 6px 7px!important;
	}
	#menu-posts-coming-soon .wp-menu-image {
		background: url(<?php bloginfo('template_url') ?>/images/films.png) no-repeat 6px -17px !important;
	}
	#menu-posts-coming-soon:hover .wp-menu-image, #menu-posts-coming-soon.wp-has-current-submenu .wp-menu-image {
		background-position: 6px 7px!important;
	}
	</style>
<?php }

// Creating custom metaboxes for Movies
add_filter( 'cmb_meta_boxes', 'dkk_create_metaboxes_movies' );
function dkk_create_metaboxes_movies( $meta_boxes ) {
$prefix = '_dkk_';
global $dkk_options;
$settings = get_option( 'dkk_options', $dkk_options );
$weekStart = date('F j, Y');

	$meta_boxes = array();
	$meta_boxes[] = array(
		'id' => 'paramount-options',
		'title' => 'Paramount Options',
		'pages' => array('movies'), // post type
		'context' => 'normal',
		'priority' => 'low',
		'show_names' => true, // Show field names left of input
		'fields' => array(
			array(
				'name' => 'Instructions',
				'desc' => 'Fill out the form below with the movie information.',
				'type' => 'title',
				'id' => $prefix.'rotator_title',
			),
			array(
				'name' => 'Movie Title',
				'id' => $prefix.'movie_title',
				'type' => 'text'
			),
			array(
				'name' => 'Theater',
				'id' => $prefix . 'theater',
				'type' => 'select',
				'options' => array(
					array('name' => 'Select One...', 'value' => ''),
					array('name' => $settings['theater1'], 'value' => urlencode($settings['theater1']) ),
					array('name' => $settings['theater2'], 'value' => urlencode($settings['theater2']) ),
					array('name' => $settings['theater3'], 'value' => urlencode($settings['theater3']) ),
				)
			),
			array(
				'name' => 'Show Theater Name',
				'id' => $prefix . 'show_name',
				'type' => 'checkbox',
				'options' => array(
					array('name' => 'Yes', 'value' => 'yes'),
				)
			),
			array(
				'name' => 'Coming Soon',
				'id' => $prefix . 'coming_soon',
				'type' => 'checkbox',
				'options' => array(
					array('name' => 'Yes', 'value' => 'yes'),
				)
			),
			array(
				'name' => 'Screen',
				'desc' => 'If you have multiple screens and you want to display those, enter it here',
				'id' => $prefix.'screen',
				'type' => 'text'
			),
			array(
				'name' => 'Length',
				'id' => $prefix.'movie_length',
				'type' => 'text'
			),
			array(
				'name' => 'Rating',
				'id' => $prefix . 'select',
				'type' => 'select',
				'options' => array(
					array('name' => 'Select One...', 'value' => ''),
					array('name' => 'G', 'value' => 'G'),
					array('name' => 'PG', 'value' => 'PG'),
					array('name' => 'PG-13', 'value' => 'PG-13'),
				)
			),
			array(
				'name' => '3D',
				'id' => $prefix . '3D',
				'type' => 'select',
				'options' => array(
					array('name' => 'Select One...', 'value' => ''),
					array('name' => '3D', 'value' => '3D'),
					array('name' => '2D', 'value' => '2D'),
					array('name' => 'None', 'value' => 'none'),
				)
			),
			array(
	      	'name' => 'Synopsis',
	      	'id' => $prefix . 'movie_synopsis',
	      	'type' => 'textarea'
	    	),
			array(
	      	'name' => 'Movie Poster',
	      	'id' => $prefix . 'movie_poster',
	      	'type' => 'file'
	      ),
	      array(
				'name' => 'YouTube URL',
				'desc' => 'Enter the URL of the YouTube trailer',
				'id' => $prefix.'movie_url',
				'type' => 'text'
			),
			array(
				'name' => 'End Date',
				'desc' => 'Enter the date the movie ends',
				'id' => $prefix . 'end_date',
				'type' => 'text_date'
	    ),
	    	array(
				'name' => date('l, M j', strtotime($weekStart)),
				'desc' => 'Enter the movie times by day. Make sure each one is separated by a comma',
				'id' => $prefix . date('l-M-j', strtotime($weekStart)),
				'type' => 'text'
			),
			array(
				'name' => date('l, M j', strtotime($weekStart . '+ 1 day')),
				'id' => $prefix . date('l-M-j', strtotime($weekStart . '+ 1 day')),
				'type' => 'text'
			),
			array(
				'name' => date('l, M j', strtotime($weekStart . '+ 2 day')),
				'id' => $prefix . date('l-M-j', strtotime($weekStart . '+ 2 day')),
				'type' => 'text'
			),
			array(
				'name' => date('l, M j', strtotime($weekStart . '+ 3 day')),
				'id' => $prefix . date('l-M-j', strtotime($weekStart . '+ 3 day')),
				'type' => 'text'
			),
			array(
				'name' => date('l, M j', strtotime($weekStart . '+ 4 day')),
				'id' => $prefix . date('l-M-j', strtotime($weekStart . '+ 4 day')),
				'type' => 'text'
			),
			array(
				'name' => date('l, M j', strtotime($weekStart . '+ 5 day')),
				'id' => $prefix . date('l-M-j', strtotime($weekStart . '+ 5 day')),
				'type' => 'text'
			),
			array(
				'name' => date('l, M j', strtotime($weekStart . '+ 6 day')),
				'id' => $prefix . date('l-M-j', strtotime($weekStart . '+ 6 day')),
				'type' => 'text'
			),
			array(
				'name' => date('l, M j', strtotime($weekStart . '+ 7 day')),
				'id' => $prefix . date('l-M-j', strtotime($weekStart . '+ 7 day')),
				'type' => 'text'
			),
			array(
				'name' => date('l, M j', strtotime($weekStart . '+ 8 day')),
				'id' => $prefix . date('l-M-j', strtotime($weekStart . '+ 8 day')),
				'type' => 'text'
			),
			array(
				'name' => date('l, M j', strtotime($weekStart . '+ 9 day')),
				'id' => $prefix . date('l-M-j', strtotime($weekStart . '+ 9 day')),
				'type' => 'text'
			),
			array(
				'name' => date('l, M j', strtotime($weekStart . '+ 10 day')),
				'id' => $prefix . date('l-M-j', strtotime($weekStart . '+ 10 day')),
				'type' => 'text'
			),
			array(
				'name' => date('l, M j', strtotime($weekStart . '+ 11 day')),
				'id' => $prefix . date('l-M-j', strtotime($weekStart . '+ 11 day')),
				'type' => 'text'
			),
			array(
				'name' => date('l, M j', strtotime($weekStart . '+ 12 day')),
				'id' => $prefix . date('l-M-j', strtotime($weekStart . '+ 12 day')),
				'type' => 'text'
			),
			array(
				'name' => date('l, M j', strtotime($weekStart . '+ 13 day')),
				'id' => $prefix . date('l-M-j', strtotime($weekStart . '+ 13 day')),
				'type' => 'text'
			),
			array(
	      	'name' => 'Comments',
	      	'id' => $prefix . 'comments',
	      	'type' => 'textarea'
	    	),
		),
	);
	$meta_boxes[] = array(
		'id' => 'coming-soon-options',
		'title' => 'Coming Soon Options',
		'pages' => array('coming-soon'), // post type
		'context' => 'normal',
		'priority' => 'low',
		'show_names' => true, // Show field names left of input
		'fields' => array(
			array(
				'name' => 'Instructions',
				'desc' => 'Fill out the form below with the movie information.',
				'type' => 'title',
				'id' => $prefix.'rotator_title',
			),
			array(
				'name' => 'Movie Title',
				'id' => $prefix.'movie_title',
				'type' => 'text'
			),
			array(
				'name' => 'Theater',
				'id' => $prefix . 'theater',
				'type' => 'select',
				'options' => array(
					array('name' => 'Select One...', 'value' => ''),
					array('name' => $settings['theater1'], 'value' => urlencode($settings['theater1']) ),
					array('name' => $settings['theater2'], 'value' => urlencode($settings['theater2']) ),
					array('name' => $settings['theater3'], 'value' => urlencode($settings['theater3']) ),
				)
			),
			array(
				'name' => 'Screen',
				'desc' => 'If you have multiple screens and you want to display those, enter it here',
				'id' => $prefix.'screen',
				'type' => 'text'
			),
			array(
				'name' => 'Length',
				'id' => $prefix.'movie_length',
				'type' => 'text'
			),
			array(
				'name' => 'Rating',
				'id' => $prefix . 'select',
				'type' => 'select',
				'options' => array(
					array('name' => 'Select One...', 'value' => ''),
					array('name' => 'G', 'value' => 'G'),
					array('name' => 'PG', 'value' => 'PG'),
					array('name' => 'PG-13', 'value' => 'PG-13'),
				)
			),
			array(
				'name' => '3D',
				'id' => $prefix . '3D',
				'type' => 'select',
				'options' => array(
					array('name' => 'Select One...', 'value' => ''),
					array('name' => '3D', 'value' => '3D'),
					array('name' => '2D', 'value' => '2D'),
					array('name' => 'None', 'value' => 'none'),
				)
			),
			array(
	      	'name' => 'Synopsis',
	      	'id' => $prefix . 'movie_synopsis',
	      	'type' => 'textarea'
	    	),
			array(
	      	'name' => 'Movie Poster',
	      	'id' => $prefix . 'movie_poster',
	      	'type' => 'file'
	      ),
	      array(
				'name' => 'YouTube URL',
				'desc' => 'Enter the URL of the YouTube trailer',
				'id' => $prefix.'movie_url',
				'type' => 'text'
			),
			array(
				'name' => 'End Date',
				'desc' => 'Enter the date the movie ends',
				'id' => $prefix . 'end_date',
				'type' => 'text_date'
	    ),
			array(
				'name' => 'First Date',
				'desc' => 'Enter the first date the movie plays',
				'id' => $prefix . 'first_date',
				'type' => 'text_date_timestamp'
			),
			array(
				'name' => 'First Date Times',
				'desc' => 'Enter the times for the first date. Seperate with commas',
				'id' => $prefix.'first_date_times',
				'type' => 'text'
			),
			array(
				'name' => 'Second Date',
				'desc' => 'Enter the second date the movie plays',
				'id' => $prefix . 'second_date',
				'type' => 'text_date_timestamp'
			),
			array(
				'name' => 'Second Date Times',
				'desc' => 'Enter the times for the second date. Seperate with commas',
				'id' => $prefix.'second_date_times',
				'type' => 'text'
			),
			array(
				'name' => 'Third Date',
				'desc' => 'Enter the third date the movie plays',
				'id' => $prefix . 'third_date',
				'type' => 'text_date_timestamp'
			),
			array(
				'name' => 'Third Date Times',
				'desc' => 'Enter the times for the third date. Seperate with commas',
				'id' => $prefix.'third_date_times',
				'type' => 'text'
			),
			array(
				'name' => 'Fourth Date',
				'desc' => 'Enter the fourth date the movie plays',
				'id' => $prefix . 'fourth_date',
				'type' => 'text_date_timestamp'
			),
			array(
				'name' => 'Fourth Date Times',
				'desc' => 'Enter the times for the fourth date. Seperate with commas',
				'id' => $prefix.'fourth_date_times',
				'type' => 'text'
			),
			array(
				'name' => 'Fifth Date',
				'desc' => 'Enter the fifth date the movie plays',
				'id' => $prefix . 'fifth_date',
				'type' => 'text_date_timestamp'
			),
			array(
				'name' => 'Fifth Date Times',
				'desc' => 'Enter the times for the fifth date. Seperate with commas',
				'id' => $prefix.'fifth_date_times',
				'type' => 'text'
			),
			array(
				'name' => 'Sixth Date',
				'desc' => 'Enter the sixth date the movie plays',
				'id' => $prefix . 'sixth_date',
				'type' => 'text_date_timestamp'
			),
			array(
				'name' => 'Sixth Date Times',
				'desc' => 'Enter the times for the sixth date. Seperate with commas',
				'id' => $prefix.'sixth_date_times',
				'type' => 'text'
			),
			array(
				'name' => 'Seventh Date',
				'desc' => 'Enter the seventh date the movie plays',
				'id' => $prefix . 'seventh_date',
				'type' => 'text_date_timestamp'
			),
			array(
				'name' => 'Seventh Date Times',
				'desc' => 'Enter the times for the seventh date. Seperate with commas',
				'id' => $prefix.'seventh_date_times',
				'type' => 'text'
			),
			array(
	      	'name' => 'Comments',
	      	'id' => $prefix . 'comments',
	      	'type' => 'textarea'
	    	),
		),
	);
	return $meta_boxes;
}

add_action('init','be_initialize_cmb_meta_boxes',9999);
function be_initialize_cmb_meta_boxes() {
    if (!class_exists('cmb_Meta_Box')) {
        require_once('init.php');
    }
}

?>