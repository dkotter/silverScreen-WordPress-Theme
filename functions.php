<?php

// get active theme directory name
$theme_name = next(explode('/themes/', get_template_directory()));

include_once('lib/metabox/custom-post-types.php');
include_once('includes/dkk-activation.php');
include_once('includes/dkk-admin.php');
require_once ('includes/theme-options.php');
include_once('includes/dkk-cleanup.php');
include_once('includes/dkk-htaccess.php');

if ( ! isset( $content_width ) )
	$content_width = 890;

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'blog-thumb', 620, 300, true );
}

add_editor_style('editor-style.css');

load_theme_textdomain( 'paramount', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

add_theme_support( 'automatic-feed-links' );

add_theme_support('menus');
register_nav_menus(
	array(
		'primary_navigation' => 'Primary Navigation',
		'footer_navigation' => 'Footer Navigation'
	)
);

// remove container from menus
function dkk_nav_menu_args($args = ''){
	$args['container'] = false;
	return $args;
}

add_filter('wp_nav_menu_args', 'dkk_nav_menu_args');

// Register Widgetized Sidebar Areas
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Search',
		'before_widget' => '<div class="search-box">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'contact',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

function dkk_analytics() {
	global $dkk_options;
	$settings = get_option( 'dkk_options', $dkk_options );
	if( $settings['analytics_id'] ) : ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $settings['analytics_id'] ?>']);
  _gaq.push(['_trackPageview']);
  _gaq.push(['_trackPageLoadTime']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
	<?php endif;
}

add_action( 'wp_head', 'dkk_analytics' );

// add to robots.txt
// http://codex.wordpress.org/Search_Engine_Optimization_for_WordPress#Robots.txt_Optimization
add_action('do_robots', 'roots_robots');

function roots_robots() {
	echo "Disallow: /cgi-bin\n";
	echo "Disallow: /wp-admin\n";
	echo "Disallow: /wp-includes\n";
	echo "Disallow: /wp-content/plugins\n";
	echo "Disallow: /plugins\n";
	echo "Disallow: /wp-content/cache\n";
	echo "Disallow: /wp-content/themes\n";
	echo "Disallow: /trackback\n";
	echo "Disallow: /feed\n";
	echo "Disallow: /comments\n";
	echo "Disallow: /category/*/*\n";
	echo "Disallow: */trackback\n";
	echo "Disallow: */feed\n";
	echo "Disallow: */comments\n";
	echo "Disallow: /*?*\n";
	echo "Disallow: /*?\n";
	echo "Allow: /wp-content/uploads\n";
	echo "Allow: /assets";
}

/**
 * Force 'Insert into Post' button
 */
add_filter( 'get_media_item_args', 'force_send_to_post' );
function force_send_to_post( $args ) {
    global $post;
    $post_type = get_post_type( $post->post_parent );
    if ( $post_type == 'movies' || $post_type == 'coming-soon' ){
        $args['send'] = true;   
    }
    return $args;
}

?>