<?php

if( !function_exists( 'dynamic_styles' ) ) {
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

		echo 'body{';

			if( $wrapperbg != '' ) 		{ echo 'background:'. 	$wrapperbg .';'; }
			if( $bfont != 'Inherit' ) 	{ echo 'font-family:"'. $bfont .'";'; }
			if( $bfontsize != '' ) 		{ echo 'font-size:'. 	$bfontsize .'em;'; }


		echo '}h1,h2,h3,h4,h5,h6{';

			if( $hfont != 'Inherit' ) 	{ echo 'font-family:"'. $hfont .'";'; }
			if( $hfontweight != '' ) 	{ echo 'font-weight:'. 	$hfontweight .';'; }


		echo '}#top-area,.top-bar{';

			if( $topbarbg != '' ) 		{ echo 'background:'. 	$topbarbg .';'; }


		echo '}#header h1{';

			if( $tfont != 'Inherit' ) 	{ echo 'font-family:"'. $tfont .'";'; }
			if( $tfontweight != '' ) 	{ echo 'font-weight:'. 	$tfontweight .';'; }
			if( $tfontsize != '' ) 		{ echo 'font-size:'. 	$tfontsize .'em;'; }


		echo '}#footer-area{';

			if( $footerbg != '' ) 		{ echo 'background:'. 	$footerbg .';'; }


		echo '}#footer-menu{';

			if( $fmenubg != '' ) 		{ echo 'background:'. 	$fmenubg .';'; }


		echo '}#credits{';

			if( $creditsbg != '' ) 		{ echo 'background:'. 	$creditsbg .';'; }


		echo '}.home article.page h2{';

			if( $fpagetitle != '1' ) 	{ echo 'display:none;'; }


		echo '}';


			if( $customcss != '' ) 		{ echo $customcss; }

		echo '</style>';

		}

	}
?>
