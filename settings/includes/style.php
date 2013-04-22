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

		$style = array(

			// Basic Colors
			'wrapperbg'  => get_theme_mod( 'set_wrapper_bg' ),
			'primary'  => get_theme_mod( 'set_primary_color' ),
			'text'   => get_theme_mod( 'set_text_color' ),
			'headerbg'  => get_theme_mod( 'set_header_bg' ),
			'footerbg'  => get_theme_mod( 'set_footer_bg' ),
			'creditsbg'  => get_theme_mod( 'set_credits_bg' ),

			// Menu Colors
			'tbarbg'   => get_theme_mod( 'set_topbar_bg' ),
			'tbarcolor'  => get_theme_mod( 'set_topbar_color' ),
			'mmenubg'  => get_theme_mod( 'set_mmenu_bg' ),
			'mmenucolor' => get_theme_mod( 'set_mmenu_color' ),
			'fmenubg'  => get_theme_mod( 'set_fmenu_bg' ),
			'fmenucolor'  => get_theme_mod( 'set_fmenu_color' ),


			// Fonts
			'bfont'   => get_theme_mod( 'set_body_font' ),
			'bfontsize'  => get_theme_mod( 'set_body_font_size' ),
			'hfont'    => get_theme_mod( 'set_heading_font' ),
			'hfontweight' => get_theme_mod( 'set_heading_font_weight' ),
			'tfont'  => get_theme_mod( 'set_title_font' ),
			'tfontweight' => get_theme_mod( 'set_title_font_weight' ),
			'tfontsize'  => get_theme_mod( 'set_title_font_size' ),

			// Visibility
			'fpagetitle'  => get_theme_mod( 'show_front_page_title' ),
			'htagline' => get_theme_mod( 'show_header_tagline' ),

			// Other
			'customcss'  => get_theme_mod( 'tangerine_custom_css' )

		);
		
		$darkprimary = alter_brightness( $style['primary'], '-25' );

		// Dymanic Styles
		echo '<style type="text/css">';

		echo 'body{';

		if ( $style['wrapperbg'] != '' ) { echo 'background-color:'. $style['wrapperbg'] .';'; }
		if ( $style['bfont'] != 'Inherit' ) { echo 'font-family:"'. $style['bfont'] .'";'; }
		if ( $style['bfontsize'] != '' ) { echo 'font-size:'. $style['bfontsize'] .'em;'; }
		if ( $style['text'] != '' ) { echo 'color:'. $style['text'] .';'; }

		echo '}#header h1{';

		if ( $style['tfont'] != 'Inherit' ) { echo 'font-family:"'. $style['tfont'] .'";'; }
		if ( $style['tfontweight'] != '' ) { echo 'font-weight:'. $style['tfontweight'] .';'; }
		if ( $style['tfontsize'] != '' ) { echo 'font-size:'. $style['tfontsize'] .'em;'; }


		echo '}#header h1 small{';

		if ( $style['htagline'] != '1' ) { echo 'display:none;'; }


		echo '}h1,h2,h3,h4,h5,h6{';

		if ( $style['hfont'] != 'Inherit' ) { echo 'font-family:"'. $style['hfont'] .'";'; }
		if ( $style['hfontweight'] != '' ) { echo 'font-weight:'. $style['hfontweight'] .';'; }


		echo '}#top-area,.top-bar,.top-bar-section ul li.has-dropdown ul.dropdown{';

		if ( $style['tbarbg'] != '' ) { echo 'background-color:'. $style['tbarbg'] .';'; }


		echo '}.top-bar .name h1 a,.top-bar .name h4 a,.top-bar .name h4 a:hover,.top-bar .name h4 a:focus,.top-bar-section ul li > a{';

		if ( $style['tbarcolor'] != '' ) { echo 'color:'. $style['tbarcolor'] .';'; }


		echo '}#main-menu,.main-bar,.main-bar-section ul li.has-dropdown ul.dropdown{';

		if ( $style['mmenubg'] != '' ) { echo 'background-color:'. $style['mmenubg'] .';'; }


		echo '}.main-bar-section ul li > a{';

		if ( $style['mmenucolor'] != '' ) { echo 'color:'. $style['mmenucolor'] .';'; }


		echo '}#wrapper.contained-header .header-container{';

		if ( $style['headerbg'] != '' ) { echo 'background-color:'. $style['headerbg'] .';'; }


		echo '}#footer-area{';

		if ( $style['footerbg'] != '' ) { echo 'background-color:'. $style['footerbg'] .';'; }


		echo '}#footer-menu{';

		if ( $style['fmenubg'] != '' ) { echo 'background-color:'. $style['fmenubg'] .';'; }


		echo '}.footer-bar-section ul li a{';

		if ( $style['fmenucolor'] != '' ) { echo 'color:'. $style['fmenucolor'] .';'; }


		echo '}#credits{';

		if ( $style['creditsbg'] != '' ) { echo 'background-color:'. $style['creditsbg'] .';'; }


		echo '}.home article.page h2{';

		if ( $style['fpagetitle'] != '1' ) { echo 'display:none;'; }


		echo '}a,.breadcrumbs li a,.breadcrumbs li span{';

		if ( $style['primary'] != '' ) { echo 'color:'. $style['primary'] .';'; }


		echo '}button,.button,.pagination li.current a,input[type="submit"]{';

		if ( $style['primary'] != '' ) { echo 'background-color:'. $style['primary'] .';'; }


		echo '}a:hover,a:focus{';

		if ( $style['primary'] != '' ) { echo 'color:'. $darkprimary .';'; }


		echo '}.th:hover,.th:focus{';

		if ( $style['primary'] != '' ) { echo 'box-shadow: 0 0 8px -3px '. $style['primary'] .';'; }


		echo '}button:hover,button:focus,.button:hover,.button:focus,.pagination li.current a:hover,.pagination li.current a:focus,input[type="submit"]:hover,input[type="submit"]:focus{';

		if ( $style['primary'] != '' ) { echo 'background-color:'. $darkprimary .';'; }


		echo '}';


		if ( $style['customcss'] != '' ) { echo $style['customcss']; }

		echo '</style>';

	}

}

?>
