<?php

if( !function_exists( 'tangerine_header' ) ) {

	function tangerine_header() { ?>

		<?php if( get_theme_mod( 'header_image' ) != '' || get_theme_mod('header_title') == '1' ): ?>
			<div id="header">

				<div class="header-inner">
					<?php if( get_theme_mod('header_image') != '' ): ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo get_theme_mod('header_image'); ?>" alt="" /></a>
					<?php endif; ?>

					<?php if( get_theme_mod('header_title') == '1' ): ?>
						<h1 class="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="name"><?php bloginfo( 'name' ); ?></a> <small class="description"><?php bloginfo( 'description' ); ?></small></h1>
					<?php endif; ?>
				</div>

			</div>
		<?php endif; ?>

	<?php }

}

if( !function_exists( 'get_tangerine_header' ) ) {

	function get_tangerine_header() {
		get_top_menu();
		tangerine_header();
		if( get_theme_mod( 'tangerine_slider_mode' ) == 'auto-slider' ) { echo '<div id="main-area">'; }
		if( is_front_page() ) { tangerine_home_slider(); }
		if( get_theme_mod( 'tangerine_slider_mode' ) == 'full-slider' ) { echo '<div id="main-area">'; }
		get_main_menu();
	}

}

?>
