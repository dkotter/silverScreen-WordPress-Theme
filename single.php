			<?php get_header(); ?>
         <div id="container">
					<?php while ( have_posts() ) : the_post(); ?>
               <div class="post_container">
            		<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                  	<h2><?php the_title(); ?></h2>
              			<?php the_content(); ?>
                     <p class="tags"><?php the_tags(); ?></p>
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
               </div> <!-- end .post_container -->
               <?php endwhile; ?>
               <?php comments_template(); ?>
            	<div class="clear"></div>
			</div> <!-- end #container -->
      </div> <!-- end #main -->
   </div> <!-- end #wrap -->
<?php get_footer(); ?>