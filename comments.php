<?php
// Do not delete these lines
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.'); ?></p> 
<?php
	return;
}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h2><?php comments_number(__('No Responses'), __('One Response'), __('% Responses'));?> <?php printf(__('to &#8220;%s&#8221;'), the_title('', '', false)); ?></h2>

	<ul class="next-prev-nav">
		<li class="prev"><?php previous_comments_link() ?></li>
		<li class="next"><?php next_comments_link() ?></li>
	</ul>

	<ol class="commentlist">
		<?php wp_list_comments();?>
	</ol>

	<ul class="next-prev-nav">
		<li class="prev"><?php previous_comments_link() ?></li>
		<li class="next"><?php next_comments_link() ?></li>
	</ul>
	
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) : ?>
	<!-- If comments are open, but there are no comments. -->
	
	<?php else : // comments are closed ?>
	<!-- If comments are closed. -->
	<p><?php _e('Comments are closed.'); ?></p>
	
	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

	<h2><?php comment_form_title( __('Leave a Reply'), __('Leave a Reply for %s' ) ); ?></h2>
	
	<p id="cancel-comment-reply"> 
		<small><?php cancel_comment_reply_link() ?></small>
	</p> 
	
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() )); ?></p>
	<?php else : ?>
	
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		
		<?php if ( is_user_logged_in() ) : ?>
		
		<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account'); ?>"><?php _e('Log out &raquo;'); ?></a></p>
		
		<?php else : ?>
		
		<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
		<label for="author"><small><?php _e('Name'); ?> <?php if ($req) _e("(required)", "kubrick"); ?></small></label></p>
		
		<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
		<label for="email"><small><?php _e('Mail (will not be published)'); ?> <?php if ($req) _e("(required)", "kubrick"); ?></small></label></p>
		
		<p><input type="text" name="url" id="url" value="<?php echo  esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
		<label for="url"><small><?php _e('Website'); ?></small></label></p>
		
		<?php endif; ?>
		
		<!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>'), allowed_tags()); ?></small></p>-->
		
		<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>
		
		<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment'); ?>" />
		<?php comment_id_fields(); ?> 
		</p>
		<?php do_action('comment_form', $post->ID); ?>
	
	</form>
	
<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
