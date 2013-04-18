<!-- BEGIN sidebar -->
<?php if ( get_theme_mod( 'set_sidebar_pos' ) != 'sidebar-none' && get_theme_mod( 'set_sidebar_pos' ) != 'sidebar-right' ): ?>
	<aside id="sidebar-left" class="sidebar small-12 <?php dynamic_sidebar_styles(); ?> columns">

		<ul class="widgets small-block-grid-2 large-block-grid-1">
			<?php if ( is_home() && is_active_sidebar( 'home-sidebar' ) ) { dynamic_sidebar( 'home-sidebar' ); } else { dynamic_sidebar( 'sidebar' ); }; ?>
		</ul>

	</aside>
<?php endif; ?>
<!-- END sidebar -->
