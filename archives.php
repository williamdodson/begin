<?php
/*
Template Name: Archives
*/

get_header();
?>

	<h1>Archives</h1>
	
	<?php get_search_form(); ?>
	
	<h2><?php _e('Monthly'); ?></h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
	
	<h2><?php _e('Categories'); ?></h2>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>
<?php get_footer(); ?>