<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

	<title><?php tangerine_title(); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- BEGIN #wrapper -->
	<div id="wrapper" class="row <?php echo get_theme_mod('set_page_width'); ?> <?php echo get_theme_mod('set_sidebar'); ?> <?php echo get_theme_mod( 'set_header_mode' ); ?>">

		<!-- BEGIN #main-area -->
		<?php get_tangerine_header(); ?>

			<!-- BEGIN #main -->
			<div id="main">
