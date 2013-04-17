<?php

if( !function_exists( 'dynamic_styles' ) ) {
	function dynamic_styles() {

		echo '<style type="text/css">';

		// Basic Colors
		$wrapperbg		= get_theme_mod('set_wrapper_bg');
		$primary		= get_theme_mod('set_primary_color');
		$text			= get_theme_mod('set_text_color');

		// Top Bar Colors
		$tbarbg			= get_theme_mod('set_topbar_bg');
		$tbaractive		= get_theme_mod('set_topbar_active');
		$tbarhover		= get_theme_mod('set_topbar_hover');

		// Main Menu Colors
		$mmenubg		= get_theme_mod('set_mmenu_bg');
		$mmenuactive	= get_theme_mod('set_mmenu_active');
		$mmenuhover		= get_theme_mod('set_mmenu_hover');

		// Footer Area Colors
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

			if( $wrapperbg != '' ) 		{ echo 'background:'. $wrapperbg .';'; }
			if( $bfont != 'Inherit' ) 	{ echo 'font-family:"'. $bfont .'";'; }
			if( $bfontsize != '' ) 		{ echo 'font-size:'. $bfontsize .'em;'; }
			if( $text != '' ) 			{ echo 'color:'. $text .';'; }


		echo '}h1,h2,h3,h4,h5,h6{';

			if( $hfont != 'Inherit' ) 	{ echo 'font-family:"'. $hfont .'";'; }
			if( $hfontweight != '' ) 	{ echo 'font-weight:'. $hfontweight .';'; }


		echo '}#top-area,.top-bar,#top-area .top-bar-section li a:not(.button),#top-area .main-bar-section li a:not(.button){';

			if( $tbarbg != '' ) 		{ echo 'background:'. $tbarbg .';'; }


		echo '}#main-menu,.main-bar,#main-menu .main-bar-section li a:not(.button){';

			if( $mmenubg != '' ) 		{ echo 'background:'. $mmenubg .';'; }


		echo '}#header h1{';

			if( $tfont != 'Inherit' ) 	{ echo 'font-family:"'. $tfont .'";'; }
			if( $tfontweight != '' ) 	{ echo 'font-weight:'. $tfontweight .';'; }
			if( $tfontsize != '' ) 		{ echo 'font-size:'. $tfontsize .'em;'; }


		echo '}#footer-area{';

			if( $footerbg != '' ) 		{ echo 'background:'. $footerbg .';'; }


		echo '}#footer-menu{';

			if( $fmenubg != '' ) 		{ echo 'background:'. $fmenubg .';'; }


		echo '}#credits{';

			if( $creditsbg != '' ) 		{ echo 'background:'. $creditsbg .';'; }


		echo '}.home article.page h2{';

			if( $fpagetitle != '1' ) 	{ echo 'display:none;'; }


		echo '}a,a:hover,a:focus,.breadcrumbs li a,.breadcrumbs li span{';

			if( $primary != '' ) 		{ echo 'color:'. $primary .';'; }


		echo '}.button,button:hover,button:focus,.button:hover,.button:focus,.pagination li.current a,.pagination li.current a:hover,.pagination li.current a:focus{';

			if( $primary != '' ) 		{ echo 'background:'. $primary .';'; }


		echo '}#top-area .top-bar-section li.active a:not(.button),#top-area .main-bar-section li.active a:not(.button){';

			if( $tbaractive != '' ) 		{ echo 'background:'. $tbaractive .';'; }


		echo '}#top-area .top-bar-section li a:hover:not(.button),#top-area .main-bar-section li a:hover:not(.button){';

			if( $tbarhover != '' ) 		{ echo 'background:'. $tbarhover .';'; }


		echo '}#main-menu .main-bar-section li.active a:not(.button){';

			if( $mmenuactive != '' ) 		{ echo 'background:'. $mmenuactive .';'; }


		echo '}#main-menu .main-bar-section li a:hover:not(.button){';

			if( $mmenuhover != '' ) 		{ echo 'background:'. $mmenuhover .';'; }


		echo '}';


			if( $customcss != '' ) 		{ echo $customcss; }

		echo '</style>';

		}

	}
?>
