<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="<?php echo get_theme_mod( 'seo_meta_desc' ); ?>" />
	<meta name="keywords" content="<?php echo get_theme_mod( 'seo_meta_key' ); ?>" />

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

	<title><?php tangerine_title(); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- BEGIN #wrapper -->
	<div id="wrapper" class="row <?php echo get_theme_mod( 'set_page_width' ); ?> <?php echo get_theme_mod( 'set_sidebar' ); ?> <?php echo get_theme_mod( 'set_header_mode' ); ?>">

		<!--[if lt IE 7]>
			<div class="chromeframe" data-alert>
				<?php _e( "You are using an <strong>outdated</strong> browser. Please <a href='http://browsehappy.com/'>upgrade your browser</a> or <a href='http://www.google.com/chromeframe/?redirect=true'>activate Google Chrome Frame</a> to improve your experience.", TANGERINE_TEXTDOMAIN ); ?>
				<a href="#" class="close">&times;</a>
			</div>
		<![endif]-->

		<!-- BEGIN #main-area -->
		<?php get_tangerine_header(); ?>

			<!-- BEGIN #main -->
			<div id="main">
