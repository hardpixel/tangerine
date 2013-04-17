<?php if( !function_exists( 'dynamic_styles' ) ) {

function dynamic_styles() {
echo '<style type="text/css">';

// Colors
$wrapperbg		= get_theme_mod('set_wrapper_bg');
$topbarbg		= get_theme_mod('set_top_bar_bg');
$footerbg		= get_theme_mod('set_footer_bg');
$fmenubg		= get_theme_mod('set_footer_menu_bg');
$creditsbg		= get_theme_mod('set_credits_bg');

// Fonts
$bfont			= get_theme_mod('set_body_font');
$bfontsize		= get_theme_mod('set_body_font_size');
$hfont 			= get_theme_mod('set_heading_font');
$hfontweight	= get_theme_mod('set_heading_font_weight');
$tfont			= get_theme_mod('set_title_font');
$tfontweight	= get_theme_mod('set_title_font_weight');
$tfontsize		= get_theme_mod('set_title_font_size');

// Visibility
$fpagetitle		= get_theme_mod( 'show_front_page_title' );

// Other
$customcss		= get_theme_mod( 'tangerine_custom_css' );

?>

body {
<?php if( $wrapperbg != '' ) { echo 'background:'. $wrapperbg .';'; } ?>
<?php if( $bfont != 'Inherit' ) { echo 'font-family:"'. $bfont .'";'; } ?>
<?php if( $bfontsize != '' ) { echo 'font-size:'. $bfontsize .'em;'; } ?>
}

h1, h2, h3, h4, h5, h6 {
<?php if( $hfont != 'Inherit' ) { echo 'font-family:"'. $hfont .'";'; } ?>
<?php if( $hfontweight != '' ) { echo 'font-weight:"'. $hfontweight .'";'; } ?>
}


#top-area, .top-bar {
<?php if( $topbarbg != '' ) { echo 'background:'. $topbarbg .';'; } ?>
}

#header h1 {
<?php if( $tfont != 'Inherit' ) { echo 'font-family:"'. $tfont .'";'; } ?>
<?php if( $tfontweight != '' ) { echo 'font-weight:"'. $tfontweight .'";'; } ?>
<?php if( $tfontsize != '' ) { echo 'font-size:'. $tfontsize .'em;'; } ?>
}

#footer-area {
<?php if( $footerbg != '' ) { echo 'background:'. $footerbg .';'; } ?>
}

#footer-menu {
<?php if( $fmenubg != '' ) { echo 'background:'. $fmenubg .';'; } ?>
}

#credits {
<?php if( $creditsbg != '' ) { echo 'background:'. $creditsbg .';'; } ?>
}

.home article.page h2 {
<?php if( $fpagetitle != '1' ) { echo 'display:none;'; } ?>
}

<?php if( $customcss != '' ) { echo $customcss; } ?>

<?php echo '</style>'; }
} ?>
