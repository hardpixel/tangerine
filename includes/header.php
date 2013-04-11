<?php

	function tangerine_header(){
	?>
		<div id="header">

			<div class="small-12 header-inner">
				<?php if( get_theme_mod('header_image') != '' ): ?>
					<img src="<?php echo get_theme_mod('header_image'); ?>" alt="" />
				<?php endif; ?>

				<?php if( get_theme_mod('header_title') == '1' ): ?>
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="name"><?php bloginfo( 'name' ); ?></a> <small class="description"><?php bloginfo( 'description' ); ?></small></h1>
				<?php endif; ?>
			</div>

		</div>

	<?php }

?>
