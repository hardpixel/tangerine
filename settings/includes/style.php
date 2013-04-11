<?php function dynamic_styles(){ echo '<style type="text/css">'; ?>

body {
	background: <?php echo get_theme_mod('tangerine_wrapper_bg'); ?>;
	font-family: '<?php echo get_theme_mod('tangerine_body_font'); ?>';
	font-size: <?php echo get_theme_mod('tangerine_body_font_size'); ?>em;
}

h1, h2, h3, h4, h5, h6 {
	font-family: '<?php echo get_theme_mod('tangerine_heading_font'); ?>';
	font-weight: <?php echo get_theme_mod('tangerine_heading_font_weight'); ?>;
}

#top-area, .top-bar-section li a:not(.button), .main-bar-section li a:not(.button) {
	background: <?php echo get_theme_mod('tangerine_top_bar_bg'); ?>;
}

#header h1 {
	font-family: '<?php echo get_theme_mod('tangerine_title_font'); ?>';
	font-weight: <?php echo get_theme_mod('tangerine_title_font_weight'); ?>;
	font-size:  <?php echo get_theme_mod('tangerine_title_font_size'); ?>em;
}

#footer-area {
	background: <?php echo get_theme_mod('tangerine_footer_bg'); ?>;
}

#footer-menu {
	background: <?php echo get_theme_mod('tangerine_footer_menu_bg'); ?>;
}

#credits {
	background: <?php echo get_theme_mod('tangerine_credits_bg'); ?>;
}

<?php echo get_theme_mod('tangerine_custom_css'); ?>

<?php echo '</style>'; } ?>
