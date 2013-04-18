<?php

if ( !function_exists( 'get_top_menu' ) ) {

	function get_top_menu() { ?>

		<?php if ( get_theme_mod( 'show_top_menu' ) == '1' || get_theme_mod( 'show_main_menu' ) == '1' ): ?>
			<div id="top-area" <?php if ( get_theme_mod( 'show_top_menu' ) == '' ) { echo 'class="show-for-small"'; } ?>>
				<nav id="top-menu" class="top-bar">
					<ul class="title-area">
						<!-- Title Area -->
						<li class="name">
							<?php if ( get_theme_mod( 'show_top_bar_title' ) == '1' && get_theme_mod( 'show_header_title' ) != '1' ): ?>
								<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
							<?php endif; ?>

							<?php if ( get_theme_mod( 'show_top_bar_title' ) == '1' && get_theme_mod( 'show_header_title' ) == '1' ): ?>
								<h4 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h4>
							<?php endif; ?>
						</li>
						<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
						<li class="toggle-topbar menu-icon">
							<a href="#"><span><?php _e( 'Menu', TANGERINE_TEXTDOMAIN ); ?></span></a>
						</li>
					</ul>

					<?php if ( get_theme_mod( 'show_top_menu' ) == '1' ): ?>
						<section class="top-bar-section">
							<?php tangerine_top_menu(); ?>
						</section>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'show_main_menu' ) == '1' ): ?>
						<section class="main-bar-section show-for-small">
							<?php tangerine_main_menu(); ?>
						</section>
					<?php endif; ?>

				</nav>
			</div>
		<?php endif; ?>

	<?php }

}

if ( !function_exists( 'get_main_menu' ) ) {

	function get_main_menu() { ?>

		<?php if ( get_theme_mod( 'show_main_menu' ) == '1' ): ?>
			<div id="main-menu" class="hide-for-small">
				<nav class="main-bar">
					<section class="main-bar-section">
						<?php tangerine_main_menu(); ?>
					</section>
				</nav>
			</div>
		<?php endif ?>

	<?php }

}

if ( !function_exists( 'get_footer_menu' ) ) {

	function get_footer_menu() { ?>

		<?php if ( get_theme_mod( 'show_footer_menu' ) == '1' ): ?>
			<div id="footer-menu">
				<nav class="footer-bar">
					<section class="footer-bar-section">
						<?php tangerine_footer_menu(); ?>
					</section>
				</nav>
			</div>
		<?php endif; ?>

	<?php }

} ?>
