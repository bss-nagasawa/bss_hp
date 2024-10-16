<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<?php // force Internet Explorer to use the latest rendering engine available 
	?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title(''); ?></title>

	<?php // mobile meta (hooray!) 
	?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) 
	?>
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
	<link rel="icon" href="<?php echo theme_image_directory(); ?>/favicon.png">
	<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
	<?php // or, set /favicon.ico for IE10 win 
	?>
	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
	<meta name="theme-color" content="#121212">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php // wordpress head functions 
	?>
	<?php wp_head(); ?>
	<?php // end of wordpress head 
	?>

	<?php // drop Google Analytics Here 
	?>
	<?php // end analytics 
	?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<header id="" class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader" uk-scrollspy="cls: uk-animation-slide-top; repeat: false">

		<div id="" class="header-content">
			<div class="content-left">
				<a href="<?php echo home_url(); ?>" class="header-home-link">
					<h1><img src="<?php echo theme_image_directory(); ?>/common/logo.png" class="logo-image" alt="<?php echo get_bloginfo('name'); ?>"></h1>
				</a>
			</div>
			<div class="content-right">
				<div class="header-menu">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'global',
						'container' => false,
						'menu_class' => 'global',
						'items_wrap' => '%3$s', // <ul>タグを出力しない
						'walker' => new Walker_Nav_Menu_No_UL(), // カスタムウォーカーを使用
					));
					?>
				</div>
			</div>
		</div>

	</header>