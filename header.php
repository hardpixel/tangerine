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
	<?php get_template_part( 'settings/includes/style' ); ?>
</head>

<body <?php body_class(); ?>>

	<!-- BEGIN #wrapper -->
	<div id="wrapper" class="row <?php echo get_theme_mod('tangerine_page_width'); ?> <?php echo get_theme_mod('tangerine_sidebar'); ?>">

		<?php get_template_part( 'includes/nav/top', 'menu' ); ?>

		<!-- BEGIN #main-area -->
		<div id="main-area">

			<div id="header">

				<div class="small-12">
					<?php if( get_theme_mod('header_image') != '' ): ?>
						<img src="<?php echo get_theme_mod('header_image'); ?>" alt="" />
					<?php endif; ?>
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="name"><?php bloginfo( 'name' ); ?></a> <small class="description"><?php bloginfo( 'description' ); ?></small></h1>
				</div>

			</div>

			<?php get_template_part( 'includes/nav/main', 'menu' ); ?>

			<?php if( is_home() ) get_template_part( 'includes/slider' ); ?>

			<!-- BEGIN #main -->
			<div id="main">
