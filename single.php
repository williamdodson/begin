<?php get_header(); ?>

	<?php
	if (have_posts()) : 
		while (have_posts()) : the_post(); 
	?>

	<ul class="next-prev-nav">
		<li class="prev"><?php next_posts_link(__('&laquo; Older Entries')); ?></li>
		<li class="next"><?php previous_posts_link(__('Newer Entries &raquo;')); ?></li>
	</ul>
	
	<h1><?php the_title(); ?></h1>
	
	<?php the_content(); ?>
	
	<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	<?php the_tags( '<p>' . __('Tags:') . ' ', ', ', '</p>'); ?>
	
	<p class="post-meta">
		<small>
			<?php /* This is commented, because it requires a little adjusting sometimes.
				You'll need to download this plugin, and follow the instructions:
				http://binarybonsai.com/wordpress/time-since/ */
				/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); $time_since = sprintf(__('%s ago'), time_since($entry_datetime)); */ ?>
			<?php printf(__('This entry was posted on %1$s at %2$s and is filed under %3$s.'), get_the_time(__('l, F jS, Y')), get_the_time(), get_the_category_list(', ')); ?>
			<?php printf(__("You can follow any responses to this entry through the <a href='%s'>RSS 2.0</a> feed.", "kubrick"), get_post_comments_feed_link()); ?>
			
			<?php if ( comments_open() && pings_open() ) {
				// Both Comments and Pings are open ?>
				<?php printf(__('You can <a href="#respond">leave a response</a>, or <a href="%s" rel="trackback">trackback</a> from your own site.'), get_trackback_url()); ?>
				
			<?php } elseif ( !comments_open() && pings_open() ) {
				// Only Pings are Open ?>
				<?php printf(__('Responses are currently closed, but you can <a href="%s" rel="trackback">trackback</a> from your own site.'), get_trackback_url()); ?>
				
			<?php } elseif ( comments_open() && !pings_open() ) {
				// Comments are open, Pings are not ?>
				<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.'); ?>
			
			<?php } elseif ( !comments_open() && !pings_open() ) {
				// Neither Comments, nor Pings are open ?>
				<?php _e('Both comments and pings are currently closed.'); ?>
			
			<?php } edit_post_link(__('Edit this entry'),'','.'); ?>
			
		</small>
	</p>
	
	<?php comments_template(); ?>

	<?php endwhile; else: ?>
	
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	
	<?php endif; ?>

<?php get_footer(); ?>