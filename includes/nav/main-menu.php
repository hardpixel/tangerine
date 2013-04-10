<?php if( get_theme_mod( 'show_main_menu' ) == '1' ): ?>
	<div id="main-menu" class="hide-for-small">
		<nav class="main-bar" data-hide="<?php if( get_theme_mod('show_main_menu') == '1' ) { echo 'false'; } else { echo 'true'; } ?>">
			<section class="main-bar-section">
				<?php tangerine_main_menu_bar(); ?>
			</section>
		</nav>
	</div>
<?php endif ?>
