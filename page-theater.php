<?php
/*
Template Name: Theater1 Page Template
*/
?>
<?php 
	$dkk_settings = get_option( 'dkk_options', $dkk_options );
?>
			<?php get_header(); ?>
         <div id="container">
         	<div class="info radius border">
            	<?php
					$settings = get_option( 'dkk_options', $dkk_options );
					$weekStart = date('F j, Y');
					$n = 1;
					$args = array( 'post_type' => 'movies', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
					$theater = get_post_meta($post->ID, '_dkk_theater', $single = true);
					if ($dkk_settings['theater1'] == urldecode($theater)) {
					$movie_title = get_post_meta($post->ID, '_dkk_movie_title', $single = true);
					$expiration = get_post_meta($post->ID, '_dkk_end_date', $single = true);
					$threeD = get_post_meta($post->ID, '_dkk_3D', $single = true);
					$image = get_post_meta($post->ID, '_dkk_movie_poster', $single = true);
					$synopsis = get_post_meta($post->ID, '_dkk_movie_synopsis', $single = true);
					$youtube = get_post_meta($post->ID, '_dkk_movie_url', $single = true);
					$youtube = explode('=', $youtube);
					$rating = get_post_meta($post->ID, '_dkk_select', $single = true);
					$length = get_post_meta($post->ID, '_dkk_movie_length', $single = true);
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
					$secondsbetween = strtotime($expiration) - time();
					if($secondsbetween > 0) {
		 			?>
               	<div class="col_lft">
                     <a href="#expanded<?php echo $n; ?>" rel="leanModal"><img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" width="134" height="193" /></a>
                     <?php if ($threeD == '3D') : ?>
                     <img src="<?php echo get_template_directory_uri(); ?>/images/3d.png" width="109" height="82" alt="Movie in 3D" class="coming-soon" />
                     <?php endif; 
                     if ($threeD == '2D') : ?>
                     <img src="<?php echo get_template_directory_uri(); ?>/images/2d.png" width="109" height="82" alt="Movie in 2D" class="coming-soon" />
                     <?php endif; ?>
                     <p>Rated: <?php echo $rating; ?> <br />
                     Length: <?php echo $length; ?></p>
                  </div> <!-- end .col_lft -->
                  <div class="col_rt">
                  	<h1><?php echo $movie_title; ?></h1>
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
                     <h2>Pricing</h2>
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
					?>	      
					</p>
                  </div> <!-- end .col_rt -->
                  <div class="clear"></div>
                  <div id="expanded<?php echo $n; ?>" class="hidden">
               	<a class="close"></a>
                  <p>
            			<iframe width="640" height="390" src="http://www.youtube.com/embed/<?php echo $youtube[1]; ?>?rel=0" frameborder="0"></iframe>
            		</p>
                  <p style="text-align: left; padding: 15px; font-size: 14px;">
                  	<strong>Synopis</strong><br />
                  	<?php echo $synopsis; ?><br />
               	</p>
               </div> <!-- end #expanded<?php echo $n; ?> -->
               <?php }
					} $n++; ?>
               <?php endwhile; ?>
            </div>
         	<div class="info radius border">
            	<h1>LOCATION</h1>
               <?php if($dkk_settings['map_url1']) { ?>
               <div class="lft_col">
                  <img src="<?php echo $dkk_settings['map_url1']; ?>" class="map" alt="Map to the <?php echo $dkk_settings['theater1'] ?>" />
               </div> <!-- end .map -->
               <?php } ?>
               <?php if($dkk_settings['location1']) { ?>
               <div class="rt_col location">
                  <p>
                  	<?php echo $dkk_settings['location1']; ?>
                  </p>
               </div>
               <?php } ?>
               <div class="clear"></div>
            </div> <!-- end .info -->
            <div class="info radius border">
         		<?php while ( have_posts() ) : the_post(); ?>
            		<?php the_content(); ?>
         		<?php endwhile; ?>
               <div class="clear"></div>
            </div> <!-- end .info -->
         </div> <!-- end #container -->
      </div> <!-- end #main -->
   </div> <!-- end #wrap -->
<?php get_footer(); ?>