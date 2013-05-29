<?php get_header(); ?>

	<?php if (have_posts()) : ?>
	<h1><?php _e('Search Results'); ?></h1>

	<ul class="next-prev-nav">
		<li class="prev"><?php next_posts_link(__('&laquo; Older Entries')); ?></li>
		<li class="next"><?php previous_posts_link(__('Newer Entries &raquo;')); ?></li>
	</ul>


	<?php while (have_posts()) : the_post(); ?>

		<div <?php post_class(); ?>>
			<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
			<p>
				<small><?php the_time('l, F jS, Y') ?></small>
			</p>

			<p class="post-meta"><?php the_tags(__('Tags:') . ' ', ', ', '<br />'); ?> <?php printf(__('Posted in %s'), get_the_category_list(', ')); ?> | <?php edit_post_link(__('Edit'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;'), __('1 Comment &#187;'), __('% Comments &#187;'), '', __('Comments Closed') ); ?></p>
		</div>

	<?php endwhile; ?>

	<ul class="next-prev-nav">
		<li class="prev"><?php next_posts_link(__('&laquo; Older Entries')); ?></li>
		<li class="next"><?php previous_posts_link(__('Newer Entries &raquo;')); ?></li>
	</ul>
	
	<?php else : ?>
	
	<h1><?php _e('No posts found. Try a different search?'); ?></h1>
	<?php get_search_form(); ?>
	
	<?php endif; ?>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>