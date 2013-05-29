<?php get_header(); ?>

<?php
if (have_posts()) :
	while (have_posts()) : the_post(); 
?>

	<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
	<p>
		<small>
			<?php the_time(__('F jS, Y')) ?> <!-- by <?php the_author() ?> -->
		</small>
	</p>
	
	<?php the_content(); ?>
	
	<p class="post-meta">
		<small>
			<?php the_tags(__('Tags:') . ' ', ', ', '<br />'); ?> <?php printf(__('Posted in %s'), get_the_category_list(', ')); ?> | <?php edit_post_link(__('Edit'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;'), __('1 Comment &#187;'), __('% Comments &#187;'), '', __('Comments Closed') ); ?>
		</small>
	</p>

	<?php endwhile; ?>

	<ul class="next-prev-nav">
		<li class="prev"><?php next_posts_link(__('&laquo; Older Entries')); ?></li>
		<li class="next"><?php previous_posts_link(__('Newer Entries &raquo;')); ?></li>
	</ul>

<?php else : ?>

	<h1><?php _e('Not Found'); ?></h1>
	<p><?php _e('Sorry, but you are looking for something that isn&#8217;t here.'); ?></p>
	<?php get_search_form(); ?>

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>