			<?php get_header(); ?>
         <div id="container">
			<?php while ( have_posts() ) : the_post(); ?>
         	<div class="post_container">
            		<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                  	<h2><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              			<?php the_excerpt(); ?>
                     <img src="<?php echo get_template_directory_uri(); ?>/images/blog-banner.png" width="60" height="237" class="banner" alt="banner" />
            		</div> <!-- end .post -->
                  <div class="right">
                  	<div class="date">
                     	<span class="day"><?php echo get_the_date('d'); ?></span>
                        <span class="month"><?php echo get_the_date('M'); ?></span>
                        <br />
                        <span class="year"><?php echo get_the_date('Y'); ?></span>
                     </div> <!-- end .date -->
                     <div class="author">
                     	<p>Author
                        <br />
                     	<a href="#"><?php the_author(); ?></a></p>
                     </div> <!-- end .author -->
                     <div class="category">
                     	<p>Category
                        <br />
                     	<?php the_category(' '); ?></p>
                     </div> <!-- end .category -->
                  	<div class="comments">
                     	<p>Comments
                        <br />
                     	<a href="<?php the_permalink(); ?>#comments" title="Read Comments"><?php comments_number( '0', '1', '%'); ?> Comments</a></p>
                     </div>
                  </div> <!-- end .right -->
                  <div class="clear"></div>
            </div> <!-- end .post-container -->
            <?php endwhile; ?>
				<?php if ($wp_query->max_num_pages > 1) : ?>
				<div id="post-nav">
            	<div class="post-previous"><?php previous_posts_link( __( '&larr; Previous Page', 'silver-screen' ) ); ?></div>
					<div class="post-next"><?php next_posts_link( __( 'Next Page &rarr;', 'silver-screen' ) ); ?></div>
				</div>
				<?php endif; ?>
				<div class="clear"></div>
			</div> <!-- end #container -->
      </div> <!-- end #main -->
   </div> <!-- end #wrap -->
<?php get_footer(); ?>