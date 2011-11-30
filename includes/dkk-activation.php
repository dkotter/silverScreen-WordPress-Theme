<?php
// Based off of the Roots Theme Framework
// View it online at http://www.rootstheme.com/

// Inspiration also from: http://foolswisdom.com/wp-activate-theme-actio/

global $pagenow;
if (is_admin() && 'themes.php' === $pagenow && isset( $_GET['activated'])) {

	// on theme activation make sure there's a Home page
	// create it if there isn't and set the Home page menu order to -1
	// set WordPress to have the front page display the Home page as a static page
	$default_pages = array('Home', 'Contact', 'Process', 'Print', 'Sort');
	$existing_pages = get_pages();

	foreach ($existing_pages as $page) {
		$temp[] = $page->post_title;
	}

	$pages_to_create = array_diff($default_pages, $temp);

	foreach ($pages_to_create as $new_page_title) {

		// create post object
		$add_default_pages = array();
		$add_default_pages['post_title'] = $new_page_title;
		$add_default_pages['post_content'] = '';
		$add_default_pages['post_status'] = 'publish';
		$add_default_pages['post_type'] = 'page';

		// insert the post into the database
		$result = wp_insert_post($add_default_pages);	
	}
	
	$home = get_page_by_title('Home');
	$contact = get_page_by_title('Contact');
	update_option('show_on_front', 'page');
	update_option('page_on_front', $home->ID);
	
	// Set Pages to the Correct Templates
	$contact = get_page_by_title('Contact');
	update_post_meta($contact->ID, '_wp_page_template', 'page-contact.php');
	
	$process = get_page_by_title('Process');
	update_post_meta($process->ID, '_wp_page_template', 'process.php');
	
	$print = get_page_by_title('Print');
	update_post_meta($print->ID, '_wp_page_template', 'print.php');
	
	$sort = get_page_by_title('Sort');
	update_post_meta($sort->ID, '_wp_page_template', 'sort.php');
	
	$home_menu_order = array();
	$home_menu_order['ID'] = $home->ID;
	$home_menu_order['menu_order'] = -1;
	wp_update_post($home_menu_order);
	
	// set the permalink structure
	if (get_option('permalink_structure') != '/%year%/%postname%/') { 
		update_option('permalink_structure', '/%year%/%postname%/');
  }

	$wp_rewrite->init();
	$wp_rewrite->flush_rules();	
	
	// don't organize uploads by year and month
	update_option('uploads_use_yearmonth_folders', 0);
	update_option('upload_path', 'assets');

	// automatically create menus and set their locations
	// add all pages to the Primary Navigation
	$roots_nav_theme_mod = false;
	if (!has_nav_menu('primary_navigation')) {
		$primary_nav_id = wp_create_nav_menu('Primary Navigation', array('slug' => 'primary_navigation'));
		$roots_nav_theme_mod['primary_navigation'] = $primary_nav_id;
	}
	if (!has_nav_menu('footer_navigation')) {
		$footer_nav_id = wp_create_nav_menu('Footer Navigation', array('slug' => 'footer_navigation'));
		$roots_nav_theme_mod['footer_navigation'] = $footer_nav_id;
	}
	if ($roots_nav_theme_mod) { set_theme_mod('nav_menu_locations', $roots_nav_theme_mod ); }
	
	$primary_nav = wp_get_nav_menu_object('Primary Navigation');
	$primary_nav_term_id = (int) $primary_nav->term_id;	
	$item = array(
		'menu-item-object-id' => $home->ID,
		'menu-item-object' => 'page',
		'menu-item-type' => 'post_type',
		'menu-item-status' => 'publish'
	);
	wp_update_nav_menu_item($primary_nav_term_id, 0, $item);
	
	$item = array(
		'menu-item-object-id' => $contact->ID,
		'menu-item-object' => 'page',
		'menu-item-type' => 'post_type',
		'menu-item-status' => 'publish'
	);
	wp_update_nav_menu_item($primary_nav_term_id, 0, $item);

}

?>