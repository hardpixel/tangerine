<?php

class Tangerine_Customizer {
	function __construct( $customize ) {
		$this->add_sections( $customize );
		$this->add_settings( $customize );
		$this->add_controls( $customize );
	}

	function add_sections( $customize ) {
		// Layout
		$customize->add_section( 'tangerine_layout', array(
			'title'			=> __( 'Layout', TANGERINE_TEXTDOMAIN ),
			'priority'		=> 130
		) );

		// Typography
		$customize->add_section( 'tangerine_typography', array(
			'title'			=> __( 'Typography', TANGERINE_TEXTDOMAIN ),
			'priority'		=> 131
		) );

		// Colors
		$customize->add_section( 'tangerine_colors', array(
			'title'			=> __( 'Colors', TANGERINE_TEXTDOMAIN ),
			'priority'		=> 132
		) );

		// Slider
		$customize->add_section( 'tangerine_slider', array(
			'title'			=> __( 'Slider', TANGERINE_TEXTDOMAIN ),
			'priority'		=> 133
		) );

		// Various Tweaks
		$customize->add_section( 'tangerine_tweaks', array(
			'title'			=> __( 'Various Tweaks', TANGERINE_TEXTDOMAIN ),
			'priority'		=> 149
		) );

		// Advanced Settings
		$customize->add_section( 'tangerine_advanced', array(
			'title'			=> __( 'Advanced Settings', TANGERINE_TEXTDOMAIN ),
			'priority'		=> 150
		) );
	}

	function add_settings( $customize )	{
		// Site title
		$customize->add_setting( 'set_header_image' );

		$customize->add_setting( 'set_header_title' );

		$customize->add_setting( 'set_top_bar_title' );

		// Navigation
		$customize->add_setting( 'show_top_menu' );

		$customize->add_setting( 'show_main_menu' );

		$customize->add_setting( 'show_footer_menu' );

		$customize->add_setting( 'show_breadcrumbs' );

		// Typography
		$customize->add_setting( 'set_body_font' );

		$customize->add_setting( 'set_body_font_size' );

		$customize->add_setting( 'set_heading_font' );

		$customize->add_setting( 'set_heading_font_weight' );

		$customize->add_setting( 'set_title_font' );

		$customize->add_setting( 'set_title_font_weight' );

		$customize->add_setting( 'set_title_font_size' );

		// Static Front Page
		$customize->add_setting( 'show_front_page_title' );

		// Layout
		$customize->add_setting( 'set_page_width' );

		$customize->add_setting( 'set_sidebar_pos' );

		$customize->add_setting( 'set_header_mode' );

		$customize->add_setting( 'set_footer_widgets' );

		$customize->add_setting( 'set_main_menu_pos' );

		// Colors
		$customize->add_setting( 'set_wrapper_bg' );

		$customize->add_setting( 'set_top_bar_bg' );

		$customize->add_setting( 'set_footer_bg' );

		$customize->add_setting( 'set_footer_menu_bg' );

		$customize->add_setting( 'set_credits_bg' );

		// Slider
		$customize->add_setting( 'show_home_slider' );

		$customize->add_setting( 'set_slider_category' );

		$customize->add_setting( 'set_slider_slides' );

		$customize->add_setting( 'set_slider_width' );

		$customize->add_setting( 'set_slider_height' );

		$customize->add_setting( 'set_slider_timerspeed' );

		$customize->add_setting( 'set_slider_animationspeed' );

		$customize->add_setting( 'show_slider_bullets' );

		$customize->add_setting( 'show_slider_navbuttons' );

		$customize->add_setting( 'show_slider_caption' );

		$customize->add_setting( 'show_slider_timer' );

		$customize->add_setting( 'show_slider_numbers' );

		$customize->add_setting( 'set_slider_pauseonhover' );

		$customize->add_setting( 'set_slider_keynav' );

		// Advanced Settings
		$customize->add_setting( 'tangerine_custom_css' );

		// Various Tweaks
		$customize->add_setting( 'set_powered_by' );
	}

	function add_controls( $customize ) {
		// Site title
		$customize->add_control( new WP_Customize_Image_Control( $customize, 'set_header_image', array(
			'section'		=> 'title_tagline',
			'settings'		=> 'set_header_image',
			'label'			=> __( 'Site logo', TANGERINE_TEXTDOMAIN ),
			'priority'		=> 5
		) ) );

		$customize->add_control( 'set_header_title', array(
			'section'		=> 'title_tagline',
			'type'			=> 'checkbox',
			'settings'		=> 'set_header_title',
			'label'			=> __( 'Header Title', TANGERINE_TEXTDOMAIN ),
			'priority'		=> 15
		) );

		$customize->add_control( 'set_top_bar_title', array(
			'section'		=> 'title_tagline',
			'type'			=> 'checkbox',
			'settings'		=> 'set_top_bar_title',
			'label'			=> __( 'Top Bar Title', TANGERINE_TEXTDOMAIN ),
			'priority'		=> 16
		) );

		// Navigation
		$customize->add_control( 'show_top_menu', array(
			'section'		=> 'nav',
			'settings' 		=> 'show_top_menu',
			'label'    		=> __( 'Show Top Menu', TANGERINE_TEXTDOMAIN ),
			'type'     		=> 'checkbox',
			'priority' 		=> 16
		) );

		$customize->add_control( 'show_main_menu', array(
			'section'		=> 'nav',
			'settings' 		=> 'show_main_menu',
			'label'    		=> __( 'Show Main Menu', TANGERINE_TEXTDOMAIN ),
			'type'     		=> 'checkbox',
			'priority' 		=> 15
		) );

		$customize->add_control( 'show_footer_menu', array(
			'section'		=> 'nav',
			'settings' 		=> 'show_footer_menu',
			'label'    		=> __( 'Show Footer Menu', TANGERINE_TEXTDOMAIN ),
			'type'     		=> 'checkbox',
			'priority' 		=> 17
		) );

		$customize->add_control( 'show_breadcrumbs', array(
			'section'		=> 'nav',
			'settings' => 'show_breadcrumbs',
			'label'    => __( 'Show Breadcrumbs', TANGERINE_TEXTDOMAIN ),
			'type'     => 'checkbox',
			'priority' => 18
		) );

		// Static Front Page
		$customize->add_control( 'show_front_page_title', array(
			'section'		=> 'static_front_page',
			'settings' => 'show_front_page_title',
			'label'    => __( 'Show front page title', TANGERINE_TEXTDOMAIN ),
			'type'     => 'checkbox',
			'priority' => 19
		) );

		// Layout
		$customize->add_control( new WP_Customize_Select_Control( $customize, 'set_page_width', array(
				'section'		=> 'tangerine_layout',
				'settings'		=> 'set_page_width',
				'label'			=> __( 'Page', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Select page layout.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'choices'		=> array(
					'full-width'		=> __( 'Full Width', TANGERINE_TEXTDOMAIN ),
					'normal-width'		=> __( 'Normal', TANGERINE_TEXTDOMAIN ),
					'hybrid-width'		=> __( 'Hybrid', TANGERINE_TEXTDOMAIN ),
					'narrow-content'	=> __( 'Narrow Content', TANGERINE_TEXTDOMAIN ),
					'narrow-footer'		=> __( 'Narrow Footer', TANGERINE_TEXTDOMAIN )
				)
		) ) );

		$customize->add_control( new WP_Customize_Select_Control( $customize, 'set_sidebar_pos', array(
				'section'		=> 'tangerine_layout',
				'settings'		=> 'set_sidebar_pos',
				'label'			=> __( 'Sidebar', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Select sidebar position.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'choices'		=> array(
					'sidebar-left'		=> __( 'Sidebar Left', TANGERINE_TEXTDOMAIN ),
					'sidebar-right'		=> __( 'Sidebar Right', TANGERINE_TEXTDOMAIN ),
					'sidebar-left-right'		=> __( 'Sidebar Left & Right', TANGERINE_TEXTDOMAIN ),
					'sidebar-none'		=> __( 'No Sidebar', TANGERINE_TEXTDOMAIN )
				)
		) ) );

		$customize->add_control( new WP_Customize_Select_Control( $customize, 'set_header_mode', array(
				'section'				=> 'tangerine_layout',
				'settings'				=> 'set_header_mode',
				'label'					=> __( 'Header Mode', TANGERINE_TEXTDOMAIN ),
				'description'			=> __( 'Select header mode.', TANGERINE_TEXTDOMAIN ),
				'type'					=> 'select',
				'choices'				=> array(
					'contained-header'	=> __( 'Contained', TANGERINE_TEXTDOMAIN ),
					'auto-header'		=> __( 'Auto Width', TANGERINE_TEXTDOMAIN )
				)
		) ) );

		$customize->add_control( new WP_Customize_Select_Control( $customize, 'set_main_menu_pos', array(
				'section'				=> 'tangerine_layout',
				'settings'				=> 'set_main_menu_pos',
				'label'					=> __( 'Main Menu Position', TANGERINE_TEXTDOMAIN ),
				'description'			=> __( 'Select the position of main menu.', TANGERINE_TEXTDOMAIN ),
				'type'					=> 'select',
				'choices'				=> array(
					'above-slider'		=> __( 'Above Slider', TANGERINE_TEXTDOMAIN ),
					'below-slider'		=> __( 'Below Slider', TANGERINE_TEXTDOMAIN )
				)
		) ) );

		$customize->add_control( new WP_Customize_Select_Control( $customize, 'set_footer_widgets', array(
				'section'		=> 'tangerine_layout',
				'settings'		=> 'set_footer_widgets',
				'label'			=> __( 'Footer', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Number of widgets per row.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'choices'		=> array(
					'block-grid-1'		=> '1',
					'block-grid-2'		=> '2',
					'block-grid-3'		=> '3',
					'block-grid-4'		=> '4',
					'block-grid-5'		=> '5',
					'block-grid-6'		=> '6'
				)
		) ) );

		// Typography
		$customize->add_control( new WP_Customize_Select_Control( $customize, 'set_body_font', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'set_body_font',
				'label'			=> __( 'Main font', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Font for paragraphs, widgets, menus etc.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'priority'		=> 1,
				'choices'		=> array(
					'Ubuntu'		=> 'Ubuntu',
					'Open Sans'		=> 'Open Sans',
					'Autour One' 	=> 'Autour One',
					'Dosis'			=> 'Dosis'
				)
		) ) );

		$customize->add_control( new WP_Customize_Text_Control( $customize, 'set_body_font_size', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'set_body_font_size',
				'label'			=> __( 'Base font size', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Headings font size is calculated automatically. For decimals use only "."', TANGERINE_TEXTDOMAIN ),
				'extra'			=> 'em',
				'type'			=> 'text',
				'priority'		=> 2
		) ) );


		$customize->add_control( new WP_Customize_Select_Control( $customize, 'set_heading_font', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'set_heading_font',
				'label'			=> __( 'Headings', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Choose font for your headings.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'priority'		=> 3,
				'choices'		=> array(
					'Ubuntu'			=> 'Ubuntu',
					'Open Sans'			=> 'Open Sans',
					'Caesar Dressing' 	=> 'Caesar Dressing',
					'Autour One' 		=> 'Autour One',
					'Oleo Script' 		=> 'Oleo Script',
					'Codystar' 			=> 'Codystar',
					'Dosis'				=> 'Dosis'
				)
		) ) );

		$customize->add_control( new WP_Customize_Select_Control( $customize, 'set_heading_font_weight', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'set_heading_font_weight',
				'label'			=> __( 'Headings font weight', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Normal or bold headings.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'priority'		=> 4,
				'choices'		=> array(
					'400'		=> 'Normal',
					'600' 		=> 'Bold'
				)
		) ) );

		$customize->add_control( new WP_Customize_Select_Control( $customize, 'set_title_font', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'set_title_font',
				'label'			=> __( 'Blog title', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Choose font for your blog title.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'priority'		=> 6,
				'choices'		=> array(
					'Ubuntu'			=> 'Ubuntu',
					'Open Sans'			=> 'Open Sans',
					'Caesar Dressing' 	=> 'Caesar Dressing',
					'Autour One' 		=> 'Autour One',
					'Oleo Script' 		=> 'Oleo Script',
					'Codystar' 			=> 'Codystar',
					'Dosis'				=> 'Dosis'
				)
		) ) );

		$customize->add_control( new WP_Customize_Select_Control( $customize, 'set_title_font_weight', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'set_title_font_weight',
				'label'			=> __( 'Blog title font weight', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Normal or bold title.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'priority'		=> 7,
				'choices'		=> array(
					'400'		=> 'Normal',
					'600'		=> 'Bold'
				)
		) ) );

		$customize->add_control( new WP_Customize_Text_Control( $customize, 'set_title_font_size', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'set_title_font_size',
				'label'			=> __( 'Blog title font size', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'For decimals use only "."', TANGERINE_TEXTDOMAIN ),
				'extra'			=> 'em',
				'type'			=> 'text',
				'priority'		=> 8
		) ) );

		// Colors
		$customize->add_control( new WP_Customize_Color_Control( $customize, 'set_wrapper_bg', array(
				'label'      => __( 'Background Color', TANGERINE_TEXTDOMAIN ),
				'section'    => 'tangerine_colors',
				'settings'   => 'set_wrapper_bg'
		) ) );

		$customize->add_control( new WP_Customize_Color_Control(
			$customize, 'set_top_bar_bg', array(
				'label'      => __( 'Top Bar Background', TANGERINE_TEXTDOMAIN ),
				'section'    => 'tangerine_colors',
				'settings'   => 'set_top_bar_bg'
		) ) );

		$customize->add_control( new WP_Customize_Color_Control( $customize, 'set_footer_bg', array(
				'label'      => __( 'Footer Background', TANGERINE_TEXTDOMAIN ),
				'section'    => 'tangerine_colors',
				'settings'   => 'set_footer_bg'
		) ) );

		$customize->add_control( new WP_Customize_Color_Control( $customize, 'set_footer_menu_bg', array(
				'label'      => __( 'Footer Menu Background', TANGERINE_TEXTDOMAIN ),
				'section'    => 'tangerine_colors',
				'settings'   => 'set_footer_menu_bg'
		) ) );

		$customize->add_control( new WP_Customize_Color_Control( $customize, 'set_credits_bg', array(
				'label'      => __( 'Credits Background', TANGERINE_TEXTDOMAIN ),
				'section'    => 'tangerine_colors',
				'settings'   => 'set_credits_bg'
		) ) );

		// Slider
		$customize->add_control( 'show_home_slider', array(
				'label'   	 => 'Show slider on home page',
				'section' 	 => 'tangerine_slider',
				'settings'   => 'show_home_slider',
				'type'		 => 'checkbox',
				'priority'	 => 1
		) );

		$customize->add_control( new WP_Customize_Select_Control( $customize, 'set_slider_category', array(
				'label'   		=> 'Get slides from:',
				'description'	=> __( 'Post type for slides content.', TANGERINE_TEXTDOMAIN ),
				'section' 		=> 'tangerine_slider',
				'settings'   	=> 'set_slider_category',
				'type'			=> 'option',
				'choices'  		=> get_post_types(array( 'publicly_queryable' => true, 'capability_type' => 'post' )),
				'priority'		=> 2
		) ) );

		$customize->add_control(
			new WP_Customize_Text_Control(
			$customize, 'set_slider_slides', array(
				'section'		=> 'tangerine_slider',
				'settings' 		=> 'set_slider_slides',
				'label'    		=> __( 'Number of slides', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Use 0 for unlimited slides.', TANGERINE_TEXTDOMAIN ),
				'type'     		=> 'text',
				'priority'		=> 3
			)
		) );

		$customize->add_control( new WP_Customize_Text_Control( $customize, 'set_slider_width', array(
				'label'   		=> 'Slide width:',
				'description'	=> __( 'Set before creating any slides. Else you have to regenerate thumbnails.', TANGERINE_TEXTDOMAIN ),
				'extra'			=> 'px',
				'section' 		=> 'tangerine_slider',
				'settings'   	=> 'set_slider_width',
				'type'			=> 'text',
				'priority'		=> 4
		) ) );

		$customize->add_control( new WP_Customize_Text_Control( $customize, 'set_slider_height', array(
				'label'   		=> 'Slide height:',
				'description'	=> __( 'Set before creating any slides. Else you have to regenerate thumbnails.', TANGERINE_TEXTDOMAIN ),
				'extra'			=> 'px',
				'section' 		=> 'tangerine_slider',
				'settings'   	=> 'set_slider_height',
				'type'			=> 'text',
				'priority'		=> 5
		) ) );

		$customize->add_control( new WP_Customize_Text_Control(
			$customize, 'set_slider_timerspeed', array(
				'section'		=> 'tangerine_slider',
				'settings' 		=> 'set_slider_timerspeed',
				'label'    		=> __( 'Animation Speed', TANGERINE_TEXTDOMAIN ),
				'description'   => __( 'Time for slide to be shown.', TANGERINE_TEXTDOMAIN ),
				'extra'    		=> __( 'ms', TANGERINE_TEXTDOMAIN ),
				'type'     		=> 'text',
				'priority'		=> 6
		) ) );

		$customize->add_control( new WP_Customize_Text_Control( $customize, 'set_slider_animationspeed', array(
				'section'		=> 'tangerine_slider',
				'settings' 		=> 'set_slider_animationspeed',
				'label'    		=> __( 'Transition Speed', TANGERINE_TEXTDOMAIN ),
				'description'   => __( 'Time for slide effect.', TANGERINE_TEXTDOMAIN ),
				'extra'    		=> __( 'ms', TANGERINE_TEXTDOMAIN ),
				'type'     		=> 'text',
				'priority'		=> 7
		) ) );

		$customize->add_control( 'show_slider_bullets', array(
			'section'		=> 'tangerine_slider',
			'settings' 		=> 'show_slider_bullets',
			'label'    		=> __( 'Show bullets', TANGERINE_TEXTDOMAIN ),
			'type'     		=> 'checkbox',
			'priority'		=> 8
		) );

		$customize->add_control( 'show_slider_caption', array(
			'section'		=> 'tangerine_slider',
			'settings' 		=> 'show_slider_caption',
			'label'    		=> __( 'Show caption', TANGERINE_TEXTDOMAIN ),
			'type'     		=> 'checkbox',
			'priority'		=> 9
		) );

		$customize->add_control( 'show_slider_navbuttons', array(
			'section'		=> 'tangerine_slider',
			'settings' 		=> 'show_slider_navbuttons',
			'label'    		=> __( 'Show navigation buttons', TANGERINE_TEXTDOMAIN ),
			'type'     		=> 'checkbox',
			'priority'		=> 10
		) );

		$customize->add_control( 'show_slider_timer', array(
			'section'		=> 'tangerine_slider',
			'settings' 		=> 'show_slider_timer',
			'label'    		=> __( 'Show timer', TANGERINE_TEXTDOMAIN ),
			'type'     		=> 'checkbox',
			'priority'		=> 11
		) );

		$customize->add_control( 'show_slider_numbers', array(
			'section'		=> 'tangerine_slider',
			'settings' 		=> 'show_slider_numbers',
			'label'    		=> __( 'Show numbering', TANGERINE_TEXTDOMAIN ),
			'type'     		=> 'checkbox',
			'priority'		=> 12
		) );

		$customize->add_control( 'set_slider_pauseonhover', array(
			'section'		=> 'tangerine_slider',
			'settings' 		=> 'set_slider_pauseonhover',
			'label'    		=> __( 'Pause on hover', TANGERINE_TEXTDOMAIN ),
			'type'     		=> 'checkbox',
			'priority'		=> 13
		) );

		$customize->add_control( 'set_slider_keynav', array(
			'section'		=> 'tangerine_slider',
			'settings' 		=> 'set_slider_keynav',
			'label'    		=> __( 'Keyboard navigation', TANGERINE_TEXTDOMAIN ),
			'type'     		=> 'checkbox',
			'priority'		=> 14
		) );

		// Various Tweaks
		$customize->add_control( new WP_Customize_Text_Control( $customize, 'set_powered_by', array(
				'label'   		=> 'Powered by',
				'description'	=> __( 'Change default credits.', TANGERINE_TEXTDOMAIN ),
				'section' 		=> 'tangerine_tweaks',
				'settings'   	=> 'set_powered_by',
				'width'			=> '95'
		) ) );

		// Advanced Settings
		$customize->add_control( new WP_Customize_Textarea_Control(	$customize, 'tangerine_custom_css', array(
				'label'   		=> 'Custom CSS',
				'description'	=> __( 'Add custom styles to your theme.', TANGERINE_TEXTDOMAIN ),
				'section' 		=> 'tangerine_advanced',
				'settings'   	=> 'tangerine_custom_css'
		) ) );

	}
}
