<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

	<h1><?php _e('Links'); ?></h1>
	<ul>
		<?php wp_list_bookmarks(); ?>
	</ul>
	
<?php get_footer(); ?>
