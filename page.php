		<?php get_header(); ?>
         <div id="container">
         	<div class="info radius border">
         		<?php while ( have_posts() ) : the_post(); ?>
            		<?php the_content(); ?>
         		<?php endwhile; ?>
         	</div> <!-- end .info -->
         </div> <!-- end #container -->
      </div> <!-- end #main -->
   </div> <!-- end #wrap -->
<?php get_footer(); ?>