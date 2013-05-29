<?php get_header(); ?>

	<?php
	if (have_posts()) : 
		while (have_posts()) : the_post(); 
	?>
	
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
	
	<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	<?php 
		endwhile;
	endif; 
	?>
	<?php edit_post_link(__('Edit this entry.'), '<p>', '</p>'); ?>
	
	<?php comments_template(); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>