<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h1><?php printf(__('Archive for the &#8216;%s&#8217; Category'), single_cat_title('', false)); ?></h1>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h1><?php printf(__('Posts Tagged &#8216;%s&#8217;'), single_tag_title('', false) ); ?></h1>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h1><?php printf(_c('Archive for %s|Daily archive page'), get_the_time(__('F jS, Y'))); ?></h1>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h1><?php printf(_c('Archive for %s|Monthly archive page'), get_the_time(__('F, Y'))); ?></h1>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h1><?php printf(_c('Archive for %s|Yearly archive page'), get_the_time(__('Y'))); ?></h1>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h1><?php _e('Author Archive'); ?></h1>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h1><?php _e('Blog Archives'); ?></h1>
	<?php } ?>
	
	<ul class="next-prev-nav">
		<li class="prev"><?php next_posts_link(__('&laquo; Older Entries')); ?></li>
		<li class="next"><?php previous_posts_link(__('Newer Entries &raquo;')); ?></li>
	</ul>
	
	<?php while (have_posts()) : the_post(); ?>
	
		<h2 id="post-<?php the_ID(); ?>">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
		</h2>
		<p>
			<small>
				<?php the_time(__('l, F jS, Y')) ?>
			</small>
		</p>
		
		<?php the_content() ?>

		<p class="post-meta">
			<small>
				<?php the_tags(__('Tags:'), ', ', '<br />'); ?> <?php printf(__('Posted in %s'), get_the_category_list(', ')); ?> | <?php edit_post_link(__('Edit'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;'), __('1 Comment &#187;'), __('% Comments &#187;'), '', __('Comments Closed') ); ?>
			</small>
		</p>
		
	<?php endwhile; ?>
	
	<ul class="next-prev-nav">
		<li class="prev"><?php next_posts_link(__('&laquo; Older Entries')); ?></li>
		<li class="next"><?php previous_posts_link(__('Newer Entries &raquo;')); ?></li>
	</ul>
	
<?php else :
	
	if ( is_category() ) { // If this is a category archive
		printf("<h1>".__("Sorry, but there aren't any posts in the %s category yet.").'</h1>', single_cat_title('',false));
	} else if ( is_date() ) { // If this is a date archive
		echo('<h1>'.__("Sorry, but there aren't any posts with this date.").'</h1>');
	} else if ( is_author() ) { // If this is a category archive
		$userdata = get_userdatabylogin(get_query_var('author_name'));
		printf("<h1>".__("Sorry, but there aren't any posts by %s yet.")."</h1>", $userdata->display_name);
	} else {
		echo("<h1>".__('No posts found.').'</h1>');
	}
	get_search_form();
	
endif;
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>