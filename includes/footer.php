<?php

if ( !function_exists( 'tangerine_footer_widgets' ) ) {

	function tangerine_footer_widgets() {
	if ( is_active_sidebar( 'footer-area' ) ) { ?>
		<div id="footer-widgets">
			<ul class="widgets small-block-grid-2 large-<?php echo get_theme_mod('tangerine_footer_widgets'); ?>">
				<?php dynamic_sidebar( 'footer-area' ); ?>
			</ul>
		</div>
	<?php }
	}

}

if ( !function_exists( 'tangerine_footer_credits' ) ) {

	function tangerine_footer_credits() { ?>
		<div id="credits">
			<div class="credits-inner">
				<span id="copyright" class="left">&copy; <?php the_date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php _e( 'All rights reserved.', TANGERINE_TEXTDOMAIN ); ?></span>

				<?php if( get_theme_mod( 'powered_by' ) == '' ): ?>
					<span id="powered-by" class="right"><?php _e( 'Proudly powered by', TANGERINE_TEXTDOMAIN ); ?> <a href="https://github.com/hardpixel/tangerine-framework" target="_blank">Tangerine Framework</a></span>
				<?php else: ?>
					<span id="powered-by" class="right"><?php echo get_theme_mod( 'powered_by' ); ?></span>
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
