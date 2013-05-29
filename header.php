<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen"> 
		
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
		<!-- header -->
		<header role="banner">
			<h1>
				<a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
			</h1>
			<p><?php bloginfo('description'); ?></p>
		</header>
		<!-- header -->