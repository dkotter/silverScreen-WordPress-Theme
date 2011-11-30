<?php function roots_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<div id="comment-<?php comment_ID(); ?>" class="comment-container">
			<div class="comment-head">
				<div class="avatar">
					<?php echo get_avatar($comment,$size='40'); ?>
				</div><!--end .avatar-->
				<?php printf(__('<span class="name">%s</span>', 'silver-screen'), get_comment_author_link()) ?>
				<span class="date"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" title="Direct link to this comment"><?php printf(__('%1$s', 'silver-screen'), get_comment_date(),  get_comment_time()) ?></a></span>
				<?php edit_comment_link(__('(Edit)', 'silver-screen'), '', '') ?>
			</div><!--end .comment-head-->

			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="notice">
					<p class="bottom"><?php _e('Your comment is awaiting moderation.', 'silver-screen') ?></p>
          		</div>
          		
			<?php endif; ?>
			
			<div class="comment-entry">
				<?php comment_text() ?>
			</div><!--end .comment-entry-->
			
			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div><!--end .reply-->
			
		</div><!--end .comment-container-->
<?php } ?>

<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!', 'silver-screen'));

	if ( post_password_required() ) { ?>
	<div id="comments">
		<div class="notice">
			<p class="bottom"><?php _e('This post is password protected. Enter the password to view comments.', 'silver-screen'); ?></p>
		</div>
	</div>
	<?php
		return;
	}
?>
<?php // You can start editing here. ?>
<?php if ( have_comments() ) : ?>
	<div id="comments">
		<h3><?php comments_number(__('No Responses to', 'silver-screen'), __('One Response to', 'silver-screen'), __('% Responses to', 'silver-screen') ); ?> &#8220;<?php the_title(); ?>&#8221;</h3>
		<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=roots_comments'); ?>
		<?php // wp_list_comments(); ?>
		</ol>
		<div>
			<div id="comments-nav">
				<div class="comments-previous"><?php previous_comments_link( __( '&larr; Older comments', 'silver-screen' ) ); ?></div>
				<div class="comments-next"><?php next_comments_link( __( 'Newer comments &rarr;', 'silver-screen' ) ); ?></div>
			</div>
		</div>
	</div>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) : ?>
	<?php else : // comments are closed ?>
	<div id="comments">
		<div class="notice">
			<p class="bottom"><?php _e('Comments are closed.', 'silver-screen') ?></p>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<div id="respond">
	<h3><?php comment_form_title( __('Leave a Reply', 'silver-screen'), __('Leave a Reply to %s', 'silver-screen') ); ?></h3>
	<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p><?php printf( __('You must be <a href="%s">logged in</a> to post a comment.', 'silver-screen'), wp_login_url( get_permalink() ) ); ?></p>
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( is_user_logged_in() ) : ?>
		<p><?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'silver-screen'), get_option('siteurl'), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'silver-screen'); ?>"><?php _e('Log out &raquo;', 'silver-screen'); ?></a></p>
		<?php else : ?>
		<div class="left">
		<p>
			<label for="author"><?php _e('Name', 'roots'); if ($req) _e(' (required)', 'silver-screen'); ?></label>
			<input type="text" class="comment" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" />
		</p>
		<p>
			<label for="email"><?php if ($req) _e('Email (required)', 'silver-screen'); ?></label>
			<input type="text" class="comment" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" />
		</p>
		<p>
			<label for="url"><?php _e('Website', 'silver-screen'); ?></label>
			<input type="text" class="comment" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
		</p>
		</div><!--end .left-->
		<?php endif; ?>
		<div class="right">
			<textarea name="comment" id="comment" tabindex="4" cols="50" rows="10"></textarea>
			<input name="submit" class="CommentButton" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'silver-screen'); ?>" />
		</div><!--end .right-->
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>
	</form>
	<?php endif; // If registration required and not logged in ?>
	<div class="clear"></div>
</div><!--end #blog-respond-->
<?php endif; // if you delete this the sky will fall on your head ?>
