<?php

if ( !function_exists( 'tangerine_footer_widgets' ) ) {

	function tangerine_footer_widgets() {
	if ( is_active_sidebar( 'footer-area' ) ) { ?>
		<ul id="footer-widgets" class="widgets small-block-grid-2 large-<?php echo get_theme_mod('set_footer_widgets'); ?>">
			<?php dynamic_sidebar( 'footer-area' ); ?>
		</ul>
	<?php }
	}

}

if ( !function_exists( 'tangerine_footer_credits' ) ) {

	function tangerine_footer_credits() { ?>
		<div id="credits">
			<div class="credits-bar">
				<span id="copyright">&copy; <?php the_date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php _e( 'All rights reserved.', TANGERINE_TEXTDOMAIN ); ?></span>

				<?php if( get_theme_mod( 'set_powered_by' ) == '' ): ?>
					<span id="powered-by"><?php _e( 'Proudly powered by', TANGERINE_TEXTDOMAIN ); ?> <a href="https://github.com/hardpixel/tangerine-framework" target="_blank">Tangerine Framework</a></span>
				<?php else: ?>
					<span id="powered-by"><?php echo get_theme_mod( 'set_powered_by' ); ?></span>
				<?php endif; ?>
			</div>
		</div>
	<?php }

}

if( !function_exists( 'get_tangerine_footer' ) ) {

	function get_tangerine_footer() {
		tangerine_footer_widgets();
		get_footer_menu();
		tangerine_footer_credits();
	}

}

?>
