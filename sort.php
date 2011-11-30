<?php
/*
Template Name: Sort Template
*/
$dkk_settings = get_option( 'dkk_options', $dkk_options );

/*switch ($dkk_settings['weekday']) {
	case 'monday':
		$wday = 1;
		break;
	case 'tuesday':
		$wday = 2;
		break;
	case 'wednesday':
		$wday = 3;
		break;
	case 'thursday':
		$wday = 4;
		break;
	case 'friday':
		$wday = 5;
		break;
	case 'saturday':
		$wday = 6;
		break;
	case 'sunday':
		$wday = 0;
		break;
}
$today = getdate();
$todayDate = $today['mday'];
$weekStartDate = $today['mday'] - $today['wday'] + $wday;
$weekEndDate = $weekStartDate + 6;
$diff = $todayDate - $weekStartDate;
if($diff >= 0) {
	$weekStart = date('F j, Y', strtotime('-' . $diff . ' day'));
	$endDiff = $weekEndDate - $todayDate;
	$weekEnd = date('F j, Y', strtotime('+' . $endDiff . ' day'));
}
else {
	$diff = $diff - 1;
	$weekStart = date('F j, Y', strtotime('+' . $diff .' day'));
	$weekEnd = date('F j, Y');
}*/
$weekStart = date('F j, Y');

$theater1 = $_GET['theater1'];
$theater2 = $_GET['theater2'];
$theater3 = $_GET['theater3'];
$rated_g = $_GET['g'];
$rated_pg = $_GET['pg'];
$rated_pg13 = $_GET['pg13'];
$time = $_GET['time'];
$day = $_GET['day'];

if($theater1 != 'undefined') {
	$theaters = array( $dkk_settings['theater1'] );
}
if($theater2 != 'undefined') {
	$theaters[] = $dkk_settings['theater2'];
}
if($theater3 != 'undefined') {
	$theaters[] = $dkk_settings['theater3'];
}
if($theater1 == 'undefined' && $theater2 == 'undefined' && $theater3 == 'undefined') {
	$theaters = array($dkk_settings['theater1'], $dkk_settings['theater2'], $dkk_settings['theater3']);
}
if($rated_g != 'undefined') {
	$ratings = array('G');
}
if($rated_pg != 'undefined') {
	$ratings[] = 'PG';
}
if($rated_pg13 != 'undefined') {
	$ratings[] = 'PG-13';
}
if($rated_g == 'undefined' && $rated_pg == 'undefined' && $rated_pg13 == 'undefined') {
	$ratings = array('G', 'PG', 'PG-13');
}

if($time != 'all_time' && $day != 'all_days') {
$args = array( 'post_type' => 'movies', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	$expiration = get_post_meta($post->ID, '_dkk_end_date', $single = true);
	$threeD = get_post_meta($post->ID, '_dkk_3D', $single = true);
	$image = get_post_meta($post->ID, '_dkk_movie_poster', $single = true);
	$synopsis = get_post_meta($post->ID, '_dkk_movie_synopsis', $single = true);
	$theater = get_post_meta($post->ID, '_dkk_theater', $single = true);
	$showTheater = get_post_meta($post->ID, '_dkk_show_name', $single = true);
	$soon = get_post_meta($post->ID, '_dkk_coming_soon', $single = true);
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
	$comments = get_post_meta($post->ID, '_dkk_comments', $single = true);
	if ($expiration != '') {
		$secondsbetween = strtotime($expiration) - time();
	}
	else {
		$secondsbetween = 1;
	}
	if($secondsbetween > 0) {

	switch ($day) {
		case date('l, M j', strtotime($weekStart)):
			timeSelect_dateSelect($first_times);
			break;
		case date('l, M j', strtotime($weekStart . '+ 1 day')):
			timeSelect_dateSelect($second_times);
			break;
		case date('l, M j', strtotime($weekStart . '+ 2 day')):
			timeSelect_dateSelect($third_times);
			break;
		case date('l, M j', strtotime($weekStart . '+ 3 day')):
			timeSelect_dateSelect($fourth_times);
			break;
		case date('l, M j', strtotime($weekStart . '+ 4 day')):
			timeSelect_dateSelect($fifth_times);
			break;
		case date('l, M j', strtotime($weekStart . '+ 5 day')):
			timeSelect_dateSelect($sixth_times);
			break;
		case date('l, M j', strtotime($weekStart . '+ 6 day')):
			timeSelect_dateSelect($seventh_times);
			break;
	}
	}
endwhile;
}

if($time == 'all_time' && $day != 'all_days'){
$args = array( 'post_type' => 'movies', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	$expiration = get_post_meta($post->ID, '_dkk_end_date', $single = true);
	$threeD = get_post_meta($post->ID, '_dkk_3D', $single = true);
	$image = get_post_meta($post->ID, '_dkk_movie_poster', $single = true);
	$synopsis = get_post_meta($post->ID, '_dkk_movie_synopsis', $single = true);
	$theater = get_post_meta($post->ID, '_dkk_theater', $single = true);
	$showTheater = get_post_meta($post->ID, '_dkk_show_name', $single = true);
	$soon = get_post_meta($post->ID, '_dkk_coming_soon', $single = true);
	$rating = get_post_meta($post->ID, '_dkk_select', $single = true);
	$length = get_post_meta($post->ID, '_dkk_movie_length', $single = true);
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
	$comments = get_post_meta($post->ID, '_dkk_comments', $single = true);
	if ($expiration != '') {
		$secondsbetween = strtotime($expiration) - time();
	}
	else {
		$secondsbetween = 1;
	}
	if($secondsbetween > 0) {
	switch ($day) {
		case date('l, M j', strtotime($weekStart)):
			timeAll_dateSelect($first_times);
			break;
		case date('l, M j', strtotime($weekStart . '+ 1 day')):
			timeAll_dateSelect($second_times);
			break;
		case date('l, M j', strtotime($weekStart . '+ 2 day')):
			timeAll_dateSelect($third_times);
			break;
		case date('l, M j', strtotime($weekStart . '+ 3 day')):
			timeAll_dateSelect($fourth_times);
			break;
		case date('l, M j', strtotime($weekStart . '+ 4 day')):
			timeAll_dateSelect($fifth_times);
			break;
		case date('l, M j', strtotime($weekStart . '+ 5 day')):
			timeAll_dateSelect($sixth_times);
			break;
		case date('l, M j', strtotime($weekStart . '+ 6 day')):
			timeAll_dateSelect($seventh_times);
			break;
	}
	}
endwhile;
}

if($time != 'all_time' && $day == 'all_days'){
$args = array( 'post_type' => 'movies', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	$expiration = get_post_meta($post->ID, '_dkk_end_date', $single = true);
	$threeD = get_post_meta($post->ID, '_dkk_3D', $single = true);
	$image = get_post_meta($post->ID, '_dkk_movie_poster', $single = true);
	$synopsis = get_post_meta($post->ID, '_dkk_movie_synopsis', $single = true);
	$theater = get_post_meta($post->ID, '_dkk_theater', $single = true);
	$showTheater = get_post_meta($post->ID, '_dkk_show_name', $single = true);
	$soon = get_post_meta($post->ID, '_dkk_coming_soon', $single = true);
	$rating = get_post_meta($post->ID, '_dkk_select', $single = true);
	$length = get_post_meta($post->ID, '_dkk_movie_length', $single = true);
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
	$comments = get_post_meta($post->ID, '_dkk_comments', $single = true);
	$movie_times = array();
	$movie_times = array_merge($first_times, $second_times, $third_times, $fourth_times, $fifth_times, $sixth_times, $seventh_times);
	if ($expiration != '') {
		$secondsbetween = strtotime($expiration) - time();
	}
	else {
		$secondsbetween = 1;
	}
	if($secondsbetween > 0) {
	
$time_count = count($movie_times);
$time_count = $time_count - 1;
for($i = 0; $i <= $time_count; $i++) {
	$select[] = strtotime($movie_times[$i]);
}
$time_count = count($select);
$time_count = $time_count - 1;
for($i = 0; $i <= $time_count; $i++) {
	if($select[$i] >= strtotime('11:00 AM') && $select[$i] < strtotime('5:00 PM')) {
		$movie_time[] = 'matinee';
	}
	if($select[$i] >= strtotime('5:00 PM') && $select[$i] < strtotime('10:00 PM')) {
		$movie_time[] = 'evening';
	}
	if($select[$i] >= strtotime('10:00 PM')) {
		$movie_time[] = 'late';
	}
}
	if(in_array(urldecode($theater), $theaters) && in_array($rating, $ratings) && in_array($time, $movie_time)) { ?>
			<div class="movie_image">
         	<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" width="134" height="193" class="movie_poster" />
            <?php if ($threeD == '3D') : ?>
         	<img src="<?php echo get_template_directory_uri(); ?>/images/3d.png" width="109" height="82" alt="Movie in 3D" class="coming-soon" />
            <?php endif; 
				if ($threeD == '2D') : ?>
         	<img src="<?php echo get_template_directory_uri(); ?>/images/2d.png" width="109" height="82" alt="Movie in 2D" class="coming-soon" />
            <?php endif;
				if ($soon) : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/coming-soon.png" width="109" height="82" alt="Coming Soon!" class="coming-soon" />
            <?php endif;
            if ($showTheater) echo '<p>' . urldecode($theater) . '</p>'; ?>
         </div>
			<div class="expanded">
				<a class="close"><img src="<?php echo get_template_directory_uri(); ?>/images/close.png" alt="Close" width="32" height="30" /></a>
				<div class="clear"></div>
				<p>
					<iframe width="640" height="390" src="http://www.youtube.com/embed/<?php echo $youtube[1]; ?>?rel=0" frameborder="0"></iframe>
				</p>
				<div class="clear"></div>
				<div class="col_lft">
					<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" width="134" height="193" />
               <p>Rated: <?php echo $rating; ?> <br />
               Length: <?php echo $length; ?></p>
				</div> <!-- end .col_lft -->
				<div class="col_rt">
					<p>
						<strong>Synopis</strong><br />
						<?php echo $synopsis; ?>
					</p>
					<h1>
						<?php echo urldecode($theater); ?>
					</h1>
					<table>
               	<tr>
                  	<td><?php echo date('D, M j', strtotime($weekStart)); ?></td>
                  	<td><?php echo date('D, M j', strtotime($weekStart . '+ 1 day')); ?></td>
                     <td><?php echo date('D, M j', strtotime($weekStart . '+ 2 day')); ?></td>
                     <td><?php echo date('D, M j', strtotime($weekStart . '+ 3 day')); ?></td>
                     <td><?php echo date('D, M j', strtotime($weekStart . '+ 4 day')); ?></td>
                     <td><?php echo date('D, M j', strtotime($weekStart . '+ 5 day')); ?></td>
                     <td><?php echo date('D, M j', strtotime($weekStart . '+ 6 day')); ?></td>
                  </tr>
                  <tr>
                  	<td>
							<?php 
								$count = count($first_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $first_times[$i] . '</p>';
			     				}
							?>
                  	</td>
                  	<td>
                     <?php 
								$count = count($second_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $second_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <td>
                     <?php 
								$count = count($third_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $third_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <td>
                     <?php 
								$count = count($fourth_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $fourth_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <td>
                     <?php 
								$count = count($fifth_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $fifth_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <td>
                     <?php 
								$count = count($sixth_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $sixth_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <td>
                     <?php 
								$count = count($seventh_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $seventh_times[$i] . '</p>';
			     				}
							?>
                     </td>
                  </tr>
               </table>
					<div class="clear"></div>
					<h1>Pricing</h1>
               <?php if ($comments) { ?>
               <p><?php echo $comments; ?></p>
               <?php } ?>
					<p class="pricing">
               <?php if ($threeD == '3D') { ?>
               Adults: $5.00 <br />
               Children: $4.00 <br />
               Seniors: $4.00 <br />
               Matinees (Before 6:00 PM): $4.00 for all ages <br />
               Tuesdays: $4.00 for all ages <br />
               3D Prices are based on regular admission plus $2.00. Coupons are only valid for the regular admission portion unless specified otherwise.
					<?php } ?>
               <?php if($dkk_settings['theater1'] == urldecode($theater) && !$comments && $threeD != '3D') {
						echo $dkk_settings['pricing1']; 
					}
					elseif($dkk_settings['theater2'] == urldecode($theater) && !$comments && $threeD != '3D') {
						echo $dkk_settings['pricing2']; 
					}
					elseif($dkk_settings['theater3'] == urldecode($theater) && !$comments && $threeD != '3D') {
						echo $dkk_settings['pricing3']; 
					}
					else { echo ''; }
					?>	      
					</p>
				</div> <!-- end .col_rt -->
				<div class="clear"></div>
				</div> <!-- end .expanded -->
		<?php }
	}
endwhile;
}

if($time == 'all_time' && $day == 'all_days') {
$args = array( 'post_type' => 'movies', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	$expiration = get_post_meta($post->ID, '_dkk_end_date', $single = true);
	$threeD = get_post_meta($post->ID, '_dkk_3D', $single = true);
	$image = get_post_meta($post->ID, '_dkk_movie_poster', $single = true);
	$synopsis = get_post_meta($post->ID, '_dkk_movie_synopsis', $single = true);
	$theater = get_post_meta($post->ID, '_dkk_theater', $single = true);
	$showTheater = get_post_meta($post->ID, '_dkk_show_name', $single = true);
	$soon = get_post_meta($post->ID, '_dkk_coming_soon', $single = true);
	$rating = get_post_meta($post->ID, '_dkk_select', $single = true);
	$length = get_post_meta($post->ID, '_dkk_movie_length', $single = true);
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
	$comments = get_post_meta($post->ID, '_dkk_comments', $single = true);
	$movie_times = array();
	$movie_times = array_merge($first_times, $second_times, $third_times, $fourth_times, $fifth_times, $sixth_times, $seventh_times);
	if ($expiration != '') {
		$secondsbetween = strtotime($expiration) - time();
	}
	else {
		$secondsbetween = 1;
	}
	if($secondsbetween > 0) {

		if(in_array(urldecode($theater), $theaters) && in_array($rating, $ratings)) { ?>
			<div class="movie_image">
         	<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" width="134" height="193" class="movie_poster" />
            <?php if ($threeD == '3D') : ?>
         	<img src="<?php echo get_template_directory_uri(); ?>/images/3d.png" width="109" height="82" alt="Movie in 3D" class="coming-soon" />
            <?php endif; 
				if ($threeD == '2D') : ?>
         	<img src="<?php echo get_template_directory_uri(); ?>/images/2d.png" width="109" height="82" alt="Movie in 2D" class="coming-soon" />
            <?php endif;
				if ($soon) : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/coming-soon.png" width="109" height="82" alt="Coming Soon!" class="coming-soon" />
            <?php endif;
            if ($showTheater) echo '<p>' . urldecode($theater) . '</p>'; ?>
         </div>
			<div class="expanded">
				<a class="close"><img src="<?php echo get_template_directory_uri(); ?>/images/close.png" alt="Close" width="32" height="30" /></a>
				<div class="clear"></div>
				<p>
					<iframe width="640" height="390" src="http://www.youtube.com/embed/<?php echo $youtube[1]; ?>?rel=0" frameborder="0"></iframe>
				</p>
				<div class="clear"></div>
				<div class="col_lft">
					<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" width="134" height="193" />
               <p>Rated: <?php echo $rating; ?> <br />
               Length: <?php echo $length; ?></p>
				</div> <!-- end .col_lft -->
				<div class="col_rt">
					<p>
						<strong>Synopis</strong><br />
						<?php echo $synopsis; ?>
					</p>
					<h1>
						<?php echo urldecode($theater); ?>
					</h1>
					<table>
               	<tr>
                  	<td><?php echo date('D, M j', strtotime($weekStart)); ?></td>
                  	<td><?php echo date('D, M j', strtotime($weekStart . '+ 1 day')); ?></td>
                     <td><?php echo date('D, M j', strtotime($weekStart . '+ 2 day')); ?></td>
                     <td><?php echo date('D, M j', strtotime($weekStart . '+ 3 day')); ?></td>
                     <td><?php echo date('D, M j', strtotime($weekStart . '+ 4 day')); ?></td>
                     <td><?php echo date('D, M j', strtotime($weekStart . '+ 5 day')); ?></td>
                     <td><?php echo date('D, M j', strtotime($weekStart . '+ 6 day')); ?></td>
                  </tr>
                  <tr>
                  	<td>
							<?php 
								$count = count($first_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $first_times[$i] . '</p>';
			     				}
							?>
                  	</td>
                  	<td>
                     <?php 
								$count = count($second_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $second_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <td>
                     <?php 
								$count = count($third_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $third_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <td>
                     <?php 
								$count = count($fourth_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $fourth_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <td>
                     <?php 
								$count = count($fifth_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $fifth_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <td>
                     <?php 
								$count = count($sixth_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $sixth_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <td>
                     <?php 
								$count = count($seventh_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $seventh_times[$i] . '</p>';
			     				}
							?>
                     </td>
                  </tr>
               </table>
					<div class="clear"></div>
					<h1>Pricing</h1>
               <?php if ($comments) { ?>
               <p><?php echo $comments; ?></p>
               <?php } ?>
					<p class="pricing">
               <?php if ($threeD == '3D') { ?>
               Adults: $5.00 <br />
               Children: $4.00 <br />
               Seniors: $4.00 <br />
               Matinees (Before 6:00 PM): $4.00 for all ages <br />
               Tuesdays: $4.00 for all ages <br />
               3D Prices are based on regular admission plus $2.00. Coupons are only valid for the regular admission portion unless specified otherwise.
					<?php } ?>
               <?php if($dkk_settings['theater1'] == urldecode($theater) && !$comments && $threeD != '3D') {
						echo $dkk_settings['pricing1']; 
					}
					elseif($dkk_settings['theater2'] == urldecode($theater) && !$comments && $threeD != '3D') {
						echo $dkk_settings['pricing2']; 
					}
					elseif($dkk_settings['theater3'] == urldecode($theater) && !$comments && $threeD != '3D') {
						echo $dkk_settings['pricing3']; 
					}
					else { echo ''; }
					?>		      
					</p>
				</div> <!-- end .col_rt -->
				<div class="clear"></div>
				</div> <!-- end .expanded -->
		<?php }
	}
endwhile; 
} ?>
			<div class="nothing"><p>No matches for your search criteria. Try a different search.</p></div>
			<script type="text/javascript">
			jQuery('#container .movie_image img.movie_poster').hover(function () {
			jQuery(this).css('background', '#f7931e');
		}, function () {
			jQuery(this).css('background', '#000000');
		});
	   
		jQuery('#container .movie_image img.movie_poster').click(function (e) {
	   	e.preventDefault();
		   jQuery(this).parent().next('div.expanded').show();
		   jQuery('div.expanded iframe').fadeIn();
		   jQuery('#container > img').hide();
			jQuery('#container .movie_image').hide();
		   jQuery('#sort').hide();
	   });
	   jQuery('.expanded .close').click(function () {
		   jQuery('.expanded iframe').fadeOut();
		   jQuery('.expanded').hide();
		   jQuery('#container > img').show();
			jQuery('#container .movie_image').show();
		   jQuery('#sort').show();
	   });
			if( !jQuery('#container .expanded').length ) {
				jQuery('#container .nothing').show();
			}
			</script>
			
<?php function timeSelect_dateSelect($timeX) {
global $image,	$synopsis, $theater, $rating,	$youtube, $youtube, $first_times, $second_times, $third_times,	$fourth_times,	$fifth_times,	$sixth_times, $seventh_times, $ratings, $theaters, $dkk_settings, $time, $length, $expiration, $threeD, $showTheater, $soon, $comments;

$time_count = count($timeX);
$time_count = $time_count - 1;
for($i = 0; $i <= $time_count; $i++) {
	$select[] = strtotime($timeX[$i]);
}

$time_count = count($select);
$time_count = $time_count - 1;
for($i = 0; $i <= $time_count; $i++) {
	if($select[$i] >= strtotime('11:00 AM') && $select[$i] < strtotime('5:00 PM')) {
		$movie_times[] = 'matinee';
	}
	if($select[$i] >= strtotime('5:00 PM') && $select[$i] < strtotime('10:00 PM')) {
		$movie_times[] = 'evening';
	}
	if($select[$i] >= strtotime('10:00 PM')) {
		$movie_times[] = 'late';
	}
}
	if(in_array(urldecode($theater), $theaters) && in_array($rating, $ratings) && in_array($time, $movie_times)) { ?>
		<div class="movie_image">
         <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" width="134" height="193" class="movie_poster" />
         <?php if ($threeD == '3D') : ?>
         <img src="<?php echo get_template_directory_uri(); ?>/images/3d.png" width="109" height="82" alt="Movie in 3D" class="coming-soon" />
         <?php endif; 
         if ($threeD == '2D') : ?>
         <img src="<?php echo get_template_directory_uri(); ?>/images/2d.png" width="109" height="82" alt="Movie in 2D" class="coming-soon" />
         <?php endif; ?>
		</div>
		<div class="expanded">
			<a class="close"><img src="<?php echo get_template_directory_uri(); ?>/images/close.png" alt="Close" width="32" height="30" /></a>
			<div class="clear"></div>
			<p>
				<iframe width="640" height="390" src="http://www.youtube.com/embed/<?php echo $youtube[1]; ?>?rel=0" frameborder="0"></iframe>
			</p>
			<div class="clear"></div>
			<div class="col_lft">
				<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" width="134" height="193" />
            <p>Rated: <?php echo $rating; ?> <br />
               Length: <?php echo $length; ?></p>
			</div> <!-- end .col_lft -->
			<div class="col_rt">
				<p>
					<strong>Synopis</strong><br />
					<?php echo $synopsis; ?>
				</p>
				<h1>
					<?php echo urldecode($theater); ?>
				</h1>
				<ul>
				<?php
					$count = count($timeX);
					$count = $count - 1;
					for($i = 0; $i <= $count; $i++) {
						echo '<li>' . $timeX[$i] . '</li>';
					}
				?>
				</ul>
				<div class="clear"></div>
				<h1>Pricing</h1>
            <?php if ($comments) { ?>
               <p><?php echo $comments; ?></p>
               <?php } ?>
				<p class="pricing">
               <?php if ($threeD == '3D') { ?>
               Adults: $5.00 <br />
               Children: $4.00 <br />
               Seniors: $4.00 <br />
               Matinees (Before 6:00 PM): $4.00 for all ages <br />
               Tuesdays: $4.00 for all ages <br />
               3D Prices are based on regular admission plus $2.00. Coupons are only valid for the regular admission portion unless specified otherwise.
					<?php } ?>
               <?php if($dkk_settings['theater1'] == urldecode($theater) && !$comments && $threeD != '3D') {
						echo $dkk_settings['pricing1']; 
					}
					elseif($dkk_settings['theater2'] == urldecode($theater) && !$comments && $threeD != '3D') {
						echo $dkk_settings['pricing2']; 
					}
					elseif($dkk_settings['theater3'] == urldecode($theater) && !$comments && $threeD != '3D') {
						echo $dkk_settings['pricing3']; 
					}
					else { echo ''; }
					?>	      
				</p>
			</div> <!-- end .col_rt -->
			<div class="clear"></div>
		</div> <!-- end .expanded -->
	<?php }
} ?>

<?php function timeAll_dateSelect($timeX) {
global $image, $synopsis, $theater, $rating,	$youtube, $youtube, $first_times, $second_times, $third_times,	$fourth_times,	$fifth_times,	$sixth_times, $seventh_times, $ratings, $theaters, $dkk_settings, $length, $expiration, $threeD, $showTheater, $soon, $comments;
	if($timeX[0] != '') {
	if(in_array(urldecode($theater), $theaters) && in_array($rating, $ratings)) { ?>
		<div class="movie_image">
         <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" width="134" height="193" class="movie_poster" />
         <?php if ($threeD == '3D') : ?>
         <img src="<?php echo get_template_directory_uri(); ?>/images/3d.png" width="109" height="82" alt="Movie in 3D" class="coming-soon" />
         <?php endif; 
         if ($threeD == '2D') : ?>
         <img src="<?php echo get_template_directory_uri(); ?>/images/2d.png" width="109" height="82" alt="Movie in 2D" class="coming-soon" />
         <?php endif; ?>
		</div>
		<div class="expanded">
			<a class="close"><img src="<?php echo get_template_directory_uri(); ?>/images/close.png" alt="Close" width="32" height="30" /></a>
			<div class="clear"></div>
			<p>
				<iframe width="640" height="390" src="http://www.youtube.com/embed/<?php echo $youtube[1]; ?>?rel=0" frameborder="0"></iframe>
			</p>
			<div class="clear"></div>
			<div class="col_lft">
				<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" width="134" height="193" />
            <p>Rated: <?php echo $rating; ?> <br />
               Length: <?php echo $length; ?></p>
			</div> <!-- end .col_lft -->
			<div class="col_rt">
				<p>
					<strong>Synopis</strong><br />
					<?php echo $synopsis; ?>
				</p>
				<h1>
					<?php echo urldecode($theater); ?>
				</h1>
				<ul>
				<?php
					$count = count($timeX);
					$count = $count - 1;
					for($i = 0; $i <= $count; $i++) {
						echo '<li>' . $timeX[$i] . '</li>';
					}
				?>
				</ul>
				<div class="clear"></div>
				<h1>Pricing</h1>
            <?php if ($comments) { ?>
               <p><?php echo $comments; ?></p>
               <?php } ?>
				<p class="pricing">
               <?php if ($threeD == '3D') { ?>
               Adults: $5.00 <br />
               Children: $4.00 <br />
               Seniors: $4.00 <br />
               Matinees (Before 6:00 PM): $4.00 for all ages <br />
               Tuesdays: $4.00 for all ages <br />
               3D Prices are based on regular admission plus $2.00. Coupons are only valid for the regular admission portion unless specified otherwise.
					<?php } ?>
               <?php if($dkk_settings['theater1'] == urldecode($theater) && !$comments && $threeD != '3D') {
						echo $dkk_settings['pricing1']; 
					}
					elseif($dkk_settings['theater2'] == urldecode($theater) && !$comments && $threeD != '3D') {
						echo $dkk_settings['pricing2']; 
					}
					elseif($dkk_settings['theater3'] == urldecode($theater) && !$comments && $threeD != '3D') {
						echo $dkk_settings['pricing3']; 
					}
					else { echo ''; }
					?>	      
				</p>
			</div> <!-- end .col_rt -->
			<div class="clear"></div>
		</div> <!-- end .expanded -->
	<?php }
	}
} ?>