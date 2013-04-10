<!-- BEGIN sidebar -->
<?php if( get_theme_mod('tangerine_sidebar') != 'sidebar-none' ): ?>
	<aside id="sidebar" class="sidebar small-12 large-4 <?php if( get_theme_mod( 'tangerine_sidebar' ) == 'sidebar-left') { echo 'pull-8'; } ?> columns">

		<ul class="widgets small-block-grid-2 large-block-grid-1">
			<?php if ( is_home() && is_active_sidebar( 'home-sidebar' ) ) { dynamic_sidebar( 'home-sidebar' ); } else { dynamic_sidebar( 'sidebar' ); }; ?>
		</ul>

	</aside>
<?php endif; ?>
<!-- END sidebar -->
