<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

	<title><?php tangerine_title(); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- BEGIN #wrapper -->
	<div id="wrapper" class="row <?php echo get_theme_mod('tangerine_page_width'); ?> <?php echo get_theme_mod('tangerine_sidebar'); ?>">

		<?php top_menu(); ?>

		<!-- BEGIN #main-area -->
		<div id="main-area">

			<div id="header">

				<div class="small-12">
					<?php if( get_theme_mod('header_image') != '' ): ?>
						<img src="<?php echo get_theme_mod('header_image'); ?>" alt="" />
					<?php endif; ?>

					<?php if( get_theme_mod('header_title') == '1' ): ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="name"><?php bloginfo( 'name' ); ?></a> <small class="description"><?php bloginfo( 'description' ); ?></small></h1>
					<?php endif; ?>
				</div>

			</div>

			<?php main_menu(); ?>

			<?php if( is_home() ) home_slider(); ?>

			<!-- BEGIN #main -->
			<div id="main">
