			<?php get_header(); ?>
         <div id="container">
         <?php 
			   $args = array( 'post_type' => 'coming-soon', 'posts_per_page' => -1 );
				$comingSoon = new WP_Query( $args );
				while ( $comingSoon->have_posts() ) : $comingSoon->the_post();

				$expiration = get_post_meta($post->ID, '_dkk_end_date', $single = true);
				$image = get_post_meta($post->ID, '_dkk_movie_poster', $single = true);
				$synopsis = get_post_meta($post->ID, '_dkk_movie_synopsis', $single = true);
				$theater = get_post_meta($post->ID, '_dkk_theater', $single = true);
				$threeD = get_post_meta($post->ID, '_dkk_3D', $single = true);
				$rating = get_post_meta($post->ID, '_dkk_select', $single = true);
				$length = get_post_meta($post->ID, '_dkk_movie_length', $single = true);
				$youtube = get_post_meta($post->ID, '_dkk_movie_url', $single = true);
				$youtube = explode('=', $youtube);
				$first_day = get_post_meta($post->ID, '_dkk_first_date', $single = true);
				$first_times = get_post_meta($post->ID, '_dkk_first_date_times', $single = true);
				$first_times = explode(', ', $first_times);
				$second_day = get_post_meta($post->ID, '_dkk_second_date', $single = true);
				$second_times = get_post_meta($post->ID, '_dkk_second_date_times', $single = true);
				$second_times = explode(', ', $second_times);
				$third_day = get_post_meta($post->ID, '_dkk_third_date', $single = true);
				$third_times = get_post_meta($post->ID, '_dkk_third_date_times', $single = true);
				$third_times = explode(', ', $third_times);
				$fourth_day = get_post_meta($post->ID, '_dkk_fourth_date', $single = true);
				$fourth_times = get_post_meta($post->ID, '_dkk_fourth_date_times', $single = true);
				$fourth_times = explode(', ', $fourth_times);
				$fifth_day = get_post_meta($post->ID, '_dkk_fifth_date', $single = true);
				$fifth_times = get_post_meta($post->ID, '_dkk_fifth_date_times', $single = true);
				$fifth_times = explode(', ', $fifth_times);
				$sixth_day = get_post_meta($post->ID, '_dkk_sixth_date', $single = true);
				$sixth_times = get_post_meta($post->ID, '_dkk_sixth_date_times', $single = true);
				$sixth_times = explode(', ', $sixth_times);
				$seventh_day = get_post_meta($post->ID, '_dkk_seventh_date', $single = true);
				$seventh_times = get_post_meta($post->ID, '_dkk_seventh_date_times', $single = true);
				$seventh_times = explode(', ', $seventh_times);
				$comments = get_post_meta($post->ID, '_dkk_comments', $single = true);

				if ($expiration != '') {
					$secondsbetween = strtotime($expiration) - time();
				}
				else {
					$secondsbetween = 1;
				}
		 		if($secondsbetween > 0) {
		 	?>
         <div class="movie_image">
         	<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" width="134" height="193" class="movie_poster" />
         	<img src="<?php echo get_template_directory_uri(); ?>/images/coming-soon.png" width="109" height="82" alt="Coming Soon!" class="coming-soon" />
         </div> <!-- end .movie_image -->
         <div class="expanded">
            <a class="close"></a>
            <div class="clear"></div>
            <?php if(!$youtube) { ?>
            <p>
            	<iframe width="640" height="390" src="http://www.youtube.com/embed/<?php echo $youtube[1]; ?>?rel=0" frameborder="0"></iframe>
            </p>
            <?php } ?>
            <div class="clear"></div>
            <div class="col_lft">
               <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" width="134" height="193" />
               <p>Rated: <?php echo $rating; ?> <br />
               Length: <?php echo $length; ?></p>
            </div> <!-- end .col_lft -->
            <div class="col_rt">
               <p>
                  <strong>Synopis</strong><br />
                  <?php echo $synopsis; ?><br />
               </p>
               <h1>
						<?php echo urldecode($theater); ?> (Coming Soon)
					</h1>
               <table>
               	<tr>
                  	<?php if (!empty($first_day)) { echo '<td>'; echo date('D, M j', $first_day); echo '</td>'; } ?>
                  	<?php if (!empty($second_day)) { echo '<td>'; echo date('D, M j', $second_day); echo '</td>'; } ?>
                     <?php if (!empty($third_day)) { echo '<td>'; echo date('D, M j', $third_day); echo '</td>'; } ?>
                     <?php if (!empty($fourth_day)) { echo '<td>'; echo date('D, M j', $fourth_day); echo '</td>'; } ?>
                     <?php if (!empty($fifth_day)) { echo '<td>'; echo date('D, M j', $fifth_day); echo '</td>'; } ?>
                     <?php if (!empty($sixth_day)) { echo '<td>'; echo date('D, M j', $sixth_day); echo '</td>'; } ?>
                     <?php if (!empty($seventh_day)) { echo '<td>'; echo date('D, M j', $seventh_day); echo '</td>'; } ?>
                  </tr>
                  <tr>
                  	<?php if (!empty($first_day)) { ?>
                     <td>
							<?php 
								$count = count($first_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $first_times[$i] . '</p>';
			     				}
							?>
                  	</td>
                     <?php }
							if (!empty($second_day)) { ?>
                  	<td>
                     <?php 
								$count = count($second_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $second_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <?php }
                     if (!empty($third_day)) { ?>
                     <td>
                     <?php 
								$count = count($third_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $third_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <?php }
                     if (!empty($fourth_day)) { ?>
                     <td>
                     <?php 
								$count = count($fourth_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $fourth_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <?php }
                     if (!empty($fifth_day)) { ?>
                     <td>
                     <?php 
								$count = count($fifth_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $fifth_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <?php }
                     if (!empty($sixth_day)) { ?>
                     <td>
                     <?php 
								$count = count($sixth_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $sixth_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <?php }
                     if (!empty($seventh_day)) { ?>
                     <td>
                     <?php 
								$count = count($seventh_times);
			     				$count = $count - 1;
			     				for($i = 0; $i <= $count; $i++) {
			     					echo '<p>' . $seventh_times[$i] . '</p>';
			     				}
							?>
                     </td>
                     <?php } ?>
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
			endwhile; ?>
			<?php
				$settings = get_option( 'dkk_options', $dkk_options );
				$weekStart = date('F j, Y');
				
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
		 	?>
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
            <a class="close"></a>
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
                  <?php echo $synopsis; ?><br />
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
			endwhile; ?>
         
         </div> <!-- end #container -->
      </div> <!-- end #main -->
   </div> <!-- end #wrap -->
   <div id="schedule">
   	<p>What Schedule Do You Want:</p>
      <a href="print/paramount-5/" title="Print Paramount 5 Schedule">Paramount 5</a>
      <a href="print/teton-vu/" title="Print Teton Vu Schedule">Teton Vu</a>
      <a href="print/roxy/" title="Print Roxy Schedule">Roxy</a>
      <a href="print/" title="Print All Three Schedules">All Three</a>
   </div><!--end #schedule-->
<?php get_footer(); ?>