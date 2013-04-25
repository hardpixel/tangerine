<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<meta name="description" content="<?php echo get_theme_mod( 'seo_meta_desc' ); ?>" />
	<meta name="keywords" content="<?php echo get_theme_mod( 'seo_meta_key' ); ?>" />

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

	<title><?php tangerine_title(); ?></title>

	<?php wp_head(); ?>
</head>

<?php flush(); ?>

<body <?php body_class(); ?>>

	<!-- BEGIN #wrapper -->
	<div id="wrapper" class="row <?php echo get_theme_mod( 'set_page_width' ); echo get_theme_mod( 'set_header_mode' ); ?>">

		<!--[if lt IE 9]>
			<div class="chromeframe" data-alert>
				<?php _e( "You are using an <strong>outdated</strong> browser. Please <a href='http://browsehappy.com/'>upgrade your browser</a> or <a href='http://www.google.com/chromeframe/?redirect=true'>activate Google Chrome Frame</a> to improve your experience.", TANGERINE_TEXTDOMAIN ); ?>
				<a href="#" class="close">&times;</a>
			</div>
		<![endif]-->

		<!-- BEGIN #main-area -->
		<?php get_tangerine_header(); ?>

			<!-- BEGIN #main -->
			<div id="main">
