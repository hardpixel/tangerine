<?php if( !function_exists( 'dynamic_styles' ) ) { function dynamic_styles() { echo '<style type="text/css">'; ?>

body {
	background: <?php echo get_theme_mod('set_wrapper_bg'); ?>;
	font-family: '<?php echo get_theme_mod('set_body_font'); ?>';
	font-size: <?php echo get_theme_mod('set_body_font_size'); ?>em;
}

h1, h2, h3, h4, h5, h6 {
	font-family: '<?php echo get_theme_mod('set_heading_font'); ?>';
	font-weight: <?php echo get_theme_mod('set_heading_font_weight'); ?>;
}

#top-area, .top-bar-section li a:not(.button), .main-bar-section li a:not(.button) {
	background: <?php echo get_theme_mod('set_top_bar_bg'); ?>;
}

#header h1 {
	font-family: '<?php echo get_theme_mod('set_title_font'); ?>';
	font-weight: <?php echo get_theme_mod('set_title_font_weight'); ?>;
	font-size:  <?php echo get_theme_mod('set_title_font_size'); ?>em;
}

#footer-area {
	background: <?php echo get_theme_mod('set_footer_bg'); ?>;
}

#footer-menu {
	background: <?php echo get_theme_mod('set_footer_menu_bg'); ?>;
}

#credits {
	background: <?php echo get_theme_mod('set_credits_bg'); ?>;
}

<?php if( get_theme_mod( 'show_front_page_title' ) == '' ) {
?>
.home article.page h2 {
	display: none;
}

<?php
} ?>

<?php echo get_theme_mod('tangerine_custom_css'); ?><?php echo '</style>'; } } ?>
