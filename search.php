			<?php get_header(); ?>
         <div id="container">
				<div id="form_box">
					<h2><?php _e('Search Results for', 'roots'); ?> <?php echo get_search_query(); ?></h2>
						<?php if (!have_posts()) : ?>
						<p style="font-weight: bold; font-size: 16px;"><?php _e('Sorry, no results were found.', 'roots'); ?></p>
						<?php endif; ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<h3 style="font-size: 16px; padding: 10px 0px 0px">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
					<?php the_excerpt(); ?>
					<?php endwhile; ?>
            	<?php if ($wp_query->max_num_pages > 1) : ?>
					<div id="post-nav">
						<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'roots' ) ); ?></div>
						<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'roots' ) ); ?></div>
					</div>
					<?php endif; ?>
            	<?php get_sidebar(); ?>
            	<div class="clear"></div>
				</div> <!-- end #form_box -->
			</div> <!-- end #container -->
      </div> <!-- end #main -->
   </div> <!-- end #wrap -->
<?php get_footer(); ?>