<?php

function alter_brightness( $hex, $diff ) {
	$rgb = str_split( trim( $hex, '# ' ), 2 );

	foreach ( $rgb as &$hex ) {
		$dec = hexdec( $hex );
		if ( $diff >= 0 ) {
			$dec += $diff;
		}
		else {
			$dec -= abs( $diff );
		}
		$dec = max( 0, min( 255, $dec ) );
		$hex = str_pad( dechex( $dec ), 2, '0', STR_PAD_LEFT );
	}

	return '#'.implode( $rgb );
}

if ( !function_exists( 'dynamic_styles' ) ) {
	function dynamic_styles() {

		echo '<style type="text/css">';

		// Basic Colors
		$wrapperbg  = get_theme_mod( 'set_wrapper_bg' );
		$primary  = get_theme_mod( 'set_primary_color' );
		$darkprimary  = alter_brightness( $primary, '-25' );
		$text   = get_theme_mod( 'set_text_color' );
		$headerbg  = get_theme_mod( 'set_header_bg' );
		$footerbg  = get_theme_mod( 'set_footer_bg' );
		$creditsbg  = get_theme_mod( 'set_credits_bg' );

		// Menu Colors
		$tbarbg   = get_theme_mod( 'set_topbar_bg' );
		$tbarcolor  = get_theme_mod( 'set_topbar_color' );
		$mmenubg  = get_theme_mod( 'set_mmenu_bg' );
		$mmenucolor = get_theme_mod( 'set_mmenu_color' );
		$fmenubg  = get_theme_mod( 'set_fmenu_bg' );
		$fmenucolor  = get_theme_mod( 'set_fmenu_color' );


		// Fonts
		$bfont   = get_theme_mod( 'set_body_font' );
		$bfontsize  = get_theme_mod( 'set_body_font_size' );
		$hfont    = get_theme_mod( 'set_heading_font' );
		$hfontweight = get_theme_mod( 'set_heading_font_weight' );
		$tfont   = get_theme_mod( 'set_title_font' );
		$tfontweight = get_theme_mod( 'set_title_font_weight' );
		$tfontsize  = get_theme_mod( 'set_title_font_size' );

		// Visibility
		$fpagetitle  = get_theme_mod( 'show_front_page_title' );

		// Other
		$customcss  = get_theme_mod( 'tangerine_custom_css' );

		echo 'body{';

		if ( $wrapperbg != '' ) { echo 'background:'. $wrapperbg .';'; }
		if ( $bfont != 'Inherit' ) { echo 'font-family:"'. $bfont .'";'; }
		if ( $bfontsize != '' ) { echo 'font-size:'. $bfontsize .'em;'; }
		if ( $text != '' ) { echo 'color:'. $text .';'; }

		echo '}#header h1{';

		if ( $tfont != 'Inherit' ) { echo 'font-family:"'. $tfont .'";'; }
		if ( $tfontweight != '' ) { echo 'font-weight:'. $tfontweight .';'; }
		if ( $tfontsize != '' ) { echo 'font-size:'. $tfontsize .'em;'; }


		echo '}h1,h2,h3,h4,h5,h6{';

		if ( $hfont != 'Inherit' ) { echo 'font-family:"'. $hfont .'";'; }
		if ( $hfontweight != '' ) { echo 'font-weight:'. $hfontweight .';'; }


		echo '}#top-area,.top-bar,#top-area .top-bar-section li,#top-area .main-bar-section li{';

		if ( $tbarbg != '' ) { echo 'background:'. $tbarbg .';'; }


		echo '}.top-bar .name h1 a,.top-bar .name h4 a,.top-bar .name h4 a:hover,.top-bar .name h4 a:focus,.top-bar-section ul li > a{';

		if ( $tbarcolor != '' ) { echo 'color:'. $tbarcolor .';'; }


		echo '}#main-menu,.main-bar,#main-menu .main-bar-section li{';

		if ( $mmenubg != '' ) { echo 'background:'. $mmenubg .';'; }


		echo '}.main-bar-section ul li > a{';

		if ( $mmenucolor != '' ) { echo 'color:'. $mmenucolor .';'; }


		echo '}#wrapper.contained-header .header-container{';

		if ( $headerbg != '' ) { echo 'background:'. $headerbg .';'; }


		echo '}#footer-area{';

		if ( $footerbg != '' ) { echo 'background:'. $footerbg .';'; }


		echo '}#footer-menu{';

		if ( $fmenubg != '' ) { echo 'background:'. $fmenubg .';'; }


		echo '}.footer-bar-section ul li a{';

		if ( $fmenucolor != '' ) { echo 'color:'. $fmenucolor .';'; }


		echo '}#credits{';

		if ( $creditsbg != '' ) { echo 'background:'. $creditsbg .';'; }


		echo '}.home article.page h2{';

		if ( $fpagetitle != '1' ) { echo 'display:none;'; }


		echo '}a,.breadcrumbs li a,.breadcrumbs li span{';

		if ( $primary != '' ) { echo 'color:'. $primary .';'; }


		echo '}button,.button,.pagination li.current a,input[type="submit"]{';

		if ( $primary != '' ) { echo 'background:'. $primary .';'; }


		echo '}a:hover,a:focus{';

		if ( $primary != '' ) { echo 'color:'. $darkprimary .';'; }


		echo '}.th:hover,.th:focus{';

		if ( $primary != '' ) { echo 'box-shadow: 0 0 8px -3px '. $primary .';'; }


		echo '}button:hover,button:focus,.button:hover,.button:focus,.pagination li.current a:hover,.pagination li.current a:focus,input[type="submit"]:hover,input[type="submit"]:focus{';

		if ( $primary != '' ) { echo 'background:'. $darkprimary .';'; }


		echo '}';


		if ( $customcss != '' ) { echo $customcss; }

		echo '</style>';

	}

}
?>
