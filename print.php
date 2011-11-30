<?php
/*
Template Name: Print Template
*/
?>
<?php
global $dkk_options;
$dkk_settings = get_option( 'dkk_options', $dkk_options );
$weekStart = date('F j, Y');
$weekEnd = date('D, M j', strtotime($weekStart . '+6 day'));

function dayListing($theaterX) {
global $weekStart, $dkk_settings;
$firstDay = date('D, M j', strtotime($weekStart));
$secondDay = date('D, M j', strtotime($weekStart . '+1 day'));
$thirdDay = date('D, M j', strtotime($weekStart . '+2 day'));
$fourthDay = date('D, M j', strtotime($weekStart . '+3 day'));
$fifthDay = date('D, M j', strtotime($weekStart . '+4 day'));
$sixthDay = date('D, M j', strtotime($weekStart . '+5 day'));
$seventhDay = date('D, M j', strtotime($weekStart . '+6 day'));
?>
	<tr style="background-color: #E5E5E5;">
		<th>
		<h1><?php echo $theaterX; ?></h1>
		</th>
		<th>
			<?php echo $firstDay; ?>
		</th>
		<th>
			<?php echo $secondDay; ?>
		</th>
		<th>
			<?php echo $thirdDay; ?>
		</th>
		<th>
			<?php echo $fourthDay; ?>
		</th>
		<th>
			<?php echo $fifthDay; ?>
		</th>
		<th>
			<?php echo $sixthDay; ?>
		</th>
		<th>
			<?php echo $seventhDay; ?>
		</th>
	</tr>
<?php }

function timeListing($theaterX) {
global $weekStart, $dkk_settings, $theater, $rating, $movie_title, $first_times, $second_times, $third_times, $fourth_times, $fifth_times, $sixth_times, $seventh_times;

	if(urldecode($theater) == $theaterX) { ?>
	<tr>
		<td>
			<p>
				<span><?php echo $movie_title; ?></span> <br />
				<?php echo $rating; ?>
			</p>
		</td>
		<td>
		<?php
		$count = count($first_times);
		$count = $count - 1;
		for($i = 0; $i <= $count; $i++) {
			echo $first_times[$i] . '<br />';
		}
		?>
		</td>
		<td>
		<?php
		$count = count($second_times);
		$count = $count - 1;
		for($i = 0; $i <= $count; $i++) {
			echo $second_times[$i] . '<br />';
		}
		?>
		</td>
      <td>
		<?php
		$count = count($third_times);
		$count = $count - 1;
		for($i = 0; $i <= $count; $i++) {
			echo $third_times[$i] . '<br />';
		}
		?>
		</td>
      <td>
		<?php
		$count = count($fourth_times);
		$count = $count - 1;
		for($i = 0; $i <= $count; $i++) {
			echo $fourth_times[$i] . '<br />';
		}
		?>
		</td>
      <td>
		<?php
		$count = count($fifth_times);
		$count = $count - 1;
		for($i = 0; $i <= $count; $i++) {
			echo $fifth_times[$i] . '<br />';
		}
		?>
		</td>
      <td>
		<?php
		$count = count($sixth_times);
		$count = $count - 1;
		for($i = 0; $i <= $count; $i++) {
			echo $sixth_times[$i] . '<br />';
		}
		?>
		</td>
		<td>
		<?php
		$count = count($seventh_times);
		$count = $count - 1;
		for($i = 0; $i <= $count; $i++) {
			echo $seventh_times[$i] . '<br />';
		}
		?>
		</td>
	</tr>
<?php 
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php wp_title(''); ?></title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/print.css" media="Screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>

<body>
<table width="800">
   <tr>
      <td colspan="7" style="border: none;">
         <h1 style="text-align: center;">NOW PLAYING</h1>
      </td>
   </tr>
   <tr>
      <td colspan="7" style="border: none;">
         <p style="text-align: center; margin: 0;">Valid <?php echo $weekStart; ?> - <?php echo $weekEnd; ?></p>
      </td>
   </tr>
<?php
if($dkk_settings['theater1']) {
	dayListing($dkk_settings['theater1']);
	$args = array( 'post_type' => 'movies', 'posts_per_page' => -1 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$movie_title = get_post_meta($post->ID, '_dkk_movie_title', $single = true);
		$expiration = get_post_meta($post->ID, '_dkk_end_date', $single = true);
		$image = get_post_meta($post->ID, '_dkk_movie_poster', $single = true);
		$synopsis = get_post_meta($post->ID, '_dkk_movie_synopsis', $single = true);
		$theater = get_post_meta($post->ID, '_dkk_theater', $single = true);
		$rating = get_post_meta($post->ID, '_dkk_select', $single = true);
		$length = get_post_meta($post->ID, '_dkk_movie_length', $single = true);
		$movie_times = get_post_meta($post->ID, '_dkk_movie_times', $single = true);
		$movie_times = explode(', ', $movie_times);
		$youtube = get_post_meta($post->ID, '_dkk_movie_url', $single = true);
		$youtube = explode('=', $youtube);
		$first_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart)), $single = true);
		$first_times = explode(', ', $first_times);
		$second_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 1 day')), $single = true);
		$second_times = explode(', ', $second_times);
		$third_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 2 day')), $single = true);
		$third_times = explode(', ', $third_times);
		$fourth_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 3 day')), $single = true);
		$fourth_times = explode(', ', $fourth_times);
		$fifth_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 4 day')), $single = true);
		$fifth_times = explode(', ', $fifth_times);
		$sixth_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 5 day')), $single = true);
		$sixth_times = explode(', ', $sixth_times);
		$seventh_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 6 day')), $single = true);
		$seventh_times = explode(', ', $seventh_times);
		$secondsbetween = strtotime($expiration) - time();
		if($secondsbetween > 0) {
			timeListing($dkk_settings['theater1']);
		}
	endwhile;
}
if($dkk_settings['theater2']) {
	dayListing($dkk_settings['theater2']);
	$args = array( 'post_type' => 'movies', 'posts_per_page' => -1 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$movie_title = get_post_meta($post->ID, '_dkk_movie_title', $single = true);
		$expiration = get_post_meta($post->ID, '_dkk_end_date', $single = true);
		$image = get_post_meta($post->ID, '_dkk_movie_poster', $single = true);
		$synopsis = get_post_meta($post->ID, '_dkk_movie_synopsis', $single = true);
		$theater = get_post_meta($post->ID, '_dkk_theater', $single = true);
		$rating = get_post_meta($post->ID, '_dkk_select', $single = true);
		$length = get_post_meta($post->ID, '_dkk_movie_length', $single = true);
		$movie_times = get_post_meta($post->ID, '_dkk_movie_times', $single = true);
		$movie_times = explode(', ', $movie_times);
		$youtube = get_post_meta($post->ID, '_dkk_movie_url', $single = true);
		$youtube = explode('=', $youtube);
		$first_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart)), $single = true);
		$first_times = explode(', ', $first_times);
		$second_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 1 day')), $single = true);
		$second_times = explode(', ', $second_times);
		$third_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 2 day')), $single = true);
		$third_times = explode(', ', $third_times);
		$fourth_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 3 day')), $single = true);
		$fourth_times = explode(', ', $fourth_times);
		$fifth_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 4 day')), $single = true);
		$fifth_times = explode(', ', $fifth_times);
		$sixth_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 5 day')), $single = true);
		$sixth_times = explode(', ', $sixth_times);
		$seventh_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 6 day')), $single = true);
		$seventh_times = explode(', ', $seventh_times);
		$secondsbetween = strtotime($expiration) - time();
		if($secondsbetween > 0) {
			timeListing($dkk_settings['theater2']);
		}
	endwhile;
}
if($dkk_settings['theater3']) {
	dayListing($dkk_settings['theater3']);
	$args = array( 'post_type' => 'movies', 'posts_per_page' => -1 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$movie_title = get_post_meta($post->ID, '_dkk_movie_title', $single = true);
		$expiration = get_post_meta($post->ID, '_dkk_end_date', $single = true);
		$image = get_post_meta($post->ID, '_dkk_movie_poster', $single = true);
		$synopsis = get_post_meta($post->ID, '_dkk_movie_synopsis', $single = true);
		$theater = get_post_meta($post->ID, '_dkk_theater', $single = true);
		$rating = get_post_meta($post->ID, '_dkk_select', $single = true);
		$length = get_post_meta($post->ID, '_dkk_movie_length', $single = true);
		$movie_times = get_post_meta($post->ID, '_dkk_movie_times', $single = true);
		$movie_times = explode(', ', $movie_times);
		$youtube = get_post_meta($post->ID, '_dkk_movie_url', $single = true);
		$youtube = explode('=', $youtube);
		$first_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart)), $single = true);
		$first_times = explode(', ', $first_times);
		$second_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 1 day')), $single = true);
		$second_times = explode(', ', $second_times);
		$third_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 2 day')), $single = true);
		$third_times = explode(', ', $third_times);
		$fourth_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 3 day')), $single = true);
		$fourth_times = explode(', ', $fourth_times);
		$fifth_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 4 day')), $single = true);
		$fifth_times = explode(', ', $fifth_times);
		$sixth_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 5 day')), $single = true);
		$sixth_times = explode(', ', $sixth_times);
		$seventh_times = get_post_meta($post->ID, '_dkk_'.date('l-M-j', strtotime($weekStart . '+ 6 day')), $single = true);
		$seventh_times = explode(', ', $seventh_times);
		$secondsbetween = strtotime($expiration) - time();
		if($secondsbetween > 0) {
			timeListing($dkk_settings['theater3']);
		}
	endwhile;
}
?>
	<tr>
		<td colspan="8" style="border: none; text-align: right;">Printed on <?php echo date("m/d/y"); ?> at <?php echo date("g:i a") ?></td>
	</tr>
</table>
<!--<script type="text/javascript">
window.print();
</script>-->
</body>
</html>