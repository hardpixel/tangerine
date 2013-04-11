<?php

class Tangerine_Customizer
{
	function __construct( $customize )
	{
		$this->add_sections( $customize );
		$this->add_settings( $customize );
		$this->add_controls( $customize );
	}

	function add_sections( $customize )
	{
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

		// Orbit Slider
		$customize->add_section( 'tangerine_orbit_slider', array(
			'title'			=> __( 'Orbit Slider', TANGERINE_TEXTDOMAIN ),
			'priority'		=> 134
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

	function add_settings( $customize )
	{
		// Site title
		$customize->add_setting( 'header_image' );

		// Navigation
		$customize->add_setting( 'show_top_menu', array(
			'default'		=> '1'
		) );

		$customize->add_setting( 'show_main_menu', array(
			'default'		=> '1'
		) );

		$customize->add_setting( 'show_footer_menu', array(
			'default'		=> '1'
		) );

		$customize->add_setting( 'show_breadcrumbs', array(
			'default'		=> '1'
		) );

		// Typography
		$customize->add_setting( 'tangerine_body_font', array(
			'default'		=> 'Ubuntu'
		) );

		$customize->add_setting( 'tangerine_body_font_size', array(
			'default'		=> '0.875'
		) );

		$customize->add_setting( 'tangerine_heading_font', array(
			'default'		=> 'Oleo Script'
		) );

		$customize->add_setting( 'tangerine_heading_font_weight', array(
			'default'		=> '400'
		) );

		$customize->add_setting( 'tangerine_title_font', array(
			'default'		=> 'Oleo Script'
		) );

		$customize->add_setting( 'tangerine_title_font_weight', array(
			'default'		=> '400'
		) );

		$customize->add_setting( 'tangerine_title_font_size', array(
			'default'		=> '2.85'
		) );

		// Layout
		$customize->add_setting( 'tangerine_page_width', array(
			'default'		=> 'hybrid-width'
		) );

		$customize->add_setting( 'tangerine_sidebar', array(
			'default'		=> 'sidebar-right'
		) );

		$customize->add_setting( 'tangerine_footer_widgets', array(
			'default'		=> 'block-grid-3'
		) );

		// Colors
		$customize->add_setting( 'tangerine_wrapper_bg', array(
			'default'		=> '#f6f6f6'
		) );

		$customize->add_setting( 'tangerine_top_bar_bg', array(
			'default'		=> '#111111'
		) );

		$customize->add_setting( 'tangerine_footer_bg', array(
			'default'		=> '#353535'
		) );

		$customize->add_setting( 'tangerine_footer_menu_bg', array(
			'default'		=> '#222222'
		) );

		$customize->add_setting( 'tangerine_credits_bg', array(
			'default'		=> '#111111'
		) );

		// Slider
		$customize->add_setting( 'tangerine_slider_category', array(
			'default'		=> 'slider'
		) );

		$customize->add_setting( 'tangerine_slider_slides', array(
			'default'		=> '3'
		) );

		$customize->add_setting( 'tangerine_slider_width', array(
			'default'		=> '1000'
		) );

		$customize->add_setting( 'tangerine_slider_height', array(
			'default'		=> '300'
		) );

		// Orbit Slider
		$customize->add_setting( 'tangerine_orbit_timerspeed', array(
			'default'		=> '4500'
		) );

		$customize->add_setting( 'tangerine_orbit_animationspeed', array(
			'default'		=> '500'
		) );

		$customize->add_setting( 'tangerine_orbit_bullets', array(
			'default'		=> '1'
		) );

		$customize->add_setting( 'tangerine_orbit_navbuttons', array(
			'default'		=> '1'
		) );

		$customize->add_setting( 'tangerine_orbit_caption', array(
			'default'		=> '1'
		) );

		$customize->add_setting( 'tangerine_orbit_timer', array(
			'default'		=> '1'
		) );

		$customize->add_setting( 'tangerine_orbit_numbers', array(
			'default'		=> '1'
		) );

		$customize->add_setting( 'tangerine_orbit_pauseonhover', array(
			'default'		=> ''
		) );

		$customize->add_setting( 'tangerine_orbit_keynav', array(
			'default'		=> ''
		) );

		// Advanced Settings
		$customize->add_setting( 'tangerine_custom_css', array(
			'default'		=> ''
		) );

		// Various Tweaks
		$customize->add_setting( 'powered_by', array(
			'default'		=> ''
		) );
	}

	function add_controls( $customize )
	{
		// Site title
		$customize->add_control( new WP_Customize_Image_Control( $customize, 'header_image', array(
			'section'		=> 'title_tagline',
			'settings'		=> 'header_image',
			'label'			=> __( 'Site logo', TANGERINE_TEXTDOMAIN ),
			'priority'		=> 5
		) ) );

		// Navigation
		$customize->add_control( 'show_top_menu', array(
			'section'		=> 'nav',
			'settings' => 'show_top_menu',
			'label'    => __( 'Show Top Menu', TANGERINE_TEXTDOMAIN ),
			'type'     => 'checkbox',
			'priority' => 16
		) );

		$customize->add_control( 'show_main_menu', array(
			'section'		=> 'nav',
			'settings' => 'show_main_menu',
			'label'    => __( 'Show Main Menu', TANGERINE_TEXTDOMAIN ),
			'type'     => 'checkbox',
			'priority' => 15
		) );

		$customize->add_control( 'show_footer_menu', array(
			'section'		=> 'nav',
			'settings' => 'show_footer_menu',
			'label'    => __( 'Show Footer Menu', TANGERINE_TEXTDOMAIN ),
			'type'     => 'checkbox',
			'priority' => 17
		) );

		$customize->add_control( 'show_breadcrumbs', array(
			'section'		=> 'nav',
			'settings' => 'show_breadcrumbs',
			'label'    => __( 'Show Breadcrumbs', TANGERINE_TEXTDOMAIN ),
			'type'     => 'checkbox',
			'priority' => 18
		) );

		// Layout
		$customize->add_control(
		new WP_Customize_Select_Control(
			$customize, 'tangerine_page_width', array(
				'section'		=> 'tangerine_layout',
				'settings'		=> 'tangerine_page_width',
				'label'			=> __( 'Page', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Select page layout.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'choices'		=> array(
					'full-width'		=> __( 'Full Width', TANGERINE_TEXTDOMAIN ),
					'normal-width'		=> __( 'Normal', TANGERINE_TEXTDOMAIN ),
					'hybrid-width'		=> __( 'Hybrid', TANGERINE_TEXTDOMAIN ),
					'narrow-content'		=> __( 'Narrow Content', TANGERINE_TEXTDOMAIN ),
					'narrow-footer'		=> __( 'Narrow Footer', TANGERINE_TEXTDOMAIN )
				)
			)
		) );

		$customize->add_control(
			new WP_Customize_Select_Control(
			$customize, 'tangerine_sidebar', array(
				'section'		=> 'tangerine_layout',
				'settings'		=> 'tangerine_sidebar',
				'label'			=> __( 'Sidebar', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Select sidebar position.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'choices'		=> array(
					'sidebar-right'		=> __( 'Sidebar Right', TANGERINE_TEXTDOMAIN ),
					'sidebar-left'		=> __( 'Sidebar Left', TANGERINE_TEXTDOMAIN ),
					'sidebar-none'		=> __( 'No Sidebar', TANGERINE_TEXTDOMAIN )
				)
			)
		) );

		$customize->add_control(
			new WP_Customize_Select_Control(
			$customize, 'tangerine_footer_widgets', array(
				'section'		=> 'tangerine_layout',
				'settings'		=> 'tangerine_footer_widgets',
				'label'			=> __( 'Footer', TANGERINE_TEXTDOMAIN ),
				'description'			=> __( 'Number of widgets per row.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'choices'		=> array(
					'block-grid-1'		=> '1',
					'block-grid-2'		=> '2',
					'block-grid-3'		=> '3',
					'block-grid-4'		=> '4',
					'block-grid-5'		=> '5',
					'block-grid-6'		=> '6'
				)
			)
		) );

		// Typography
		$customize->add_control(
			new WP_Customize_Select_Control(
			$customize, 'tangerine_body_font', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'tangerine_body_font',
				'label'			=> __( 'Main font', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Font for paragraphs, widgets, menus etc.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'priority'		=> 1,
				'choices'		=> array(
					'Ubuntu'		=> 'Ubuntu',
					'Open Sans'		=> 'Open Sans',
					'Autour One' => 'Autour One',
					'Dosis'		=> 'Dosis'
				)
			)
		) );

		$customize->add_control(
			new WP_Customize_Text_Control(
			$customize, 'tangerine_body_font_size', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'tangerine_body_font_size',
				'label'			=> __( 'Base font size', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Headings font size is calculated automatically. For decimals use only "."', TANGERINE_TEXTDOMAIN ),
				'extra'			=> 'em',
				'type'			=> 'text',
				'priority'		=> 2
			)
		) );


		$customize->add_control(
			new WP_Customize_Select_Control(
			$customize, 'tangerine_heading_font', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'tangerine_heading_font',
				'label'			=> __( 'Headings', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Choose font for your headings.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'priority'		=> 3,
				'choices'		=> array(
					'Ubuntu'		=> 'Ubuntu',
					'Open Sans'		=> 'Open Sans',
					'Caesar Dressing' => 'Caesar Dressing',
					'Autour One' => 'Autour One',
					'Oleo Script' => 'Oleo Script',
					'Codystar' => 'Codystar',
					'Dosis'		=> 'Dosis'
				)
			)
		) );

		$customize->add_control(
			new WP_Customize_Select_Control(
			$customize, 'tangerine_heading_font_weight', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'tangerine_heading_font_weight',
				'label'			=> __( 'Headings font weight', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Normal or bold headings.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'priority'		=> 4,
				'choices'		=> array(
					'400'	=> 'Normal',
					'600' 		=> 'Bold'
				)
			)
		) );

		$customize->add_control(
			new WP_Customize_Select_Control(
			$customize, 'tangerine_title_font', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'tangerine_title_font',
				'label'			=> __( 'Blog title', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Choose font for your blog title.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'priority'		=> 6,
				'choices'		=> array(
					'Ubuntu'		=> 'Ubuntu',
					'Open Sans'		=> 'Open Sans',
					'Caesar Dressing' => 'Caesar Dressing',
					'Autour One' => 'Autour One',
					'Oleo Script' => 'Oleo Script',
					'Codystar' => 'Codystar',
					'Dosis'		=> 'Dosis'
				)
			)
		) );

		$customize->add_control(
			new WP_Customize_Select_Control(
			$customize, 'tangerine_title_font_weight', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'tangerine_title_font_weight',
				'label'			=> __( 'Blog title font weight', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Normal or bold title.', TANGERINE_TEXTDOMAIN ),
				'type'			=> 'select',
				'priority'		=> 7,
				'choices'		=> array(
					'400'		=> 'Normal',
					'600'		=> 'Bold'
				)
			)
		) );

		$customize->add_control(
			new WP_Customize_Text_Control(
			$customize, 'tangerine_title_font_size', array(
				'section'		=> 'tangerine_typography',
				'settings'		=> 'tangerine_title_font_size',
				'label'			=> __( 'Blog title font size', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'For decimals use only "."', TANGERINE_TEXTDOMAIN ),
				'extra'			=> 'em',
				'type'			=> 'text',
				'priority'		=> 8
			)
		) );

		// Colors
		$customize->add_control(
			new WP_Customize_Color_Control(
			$customize, 'tangerine_wrapper_bg', array(
				'label'      => __( 'Background Color', TANGERINE_TEXTDOMAIN ),
				'section'    => 'tangerine_colors',
				'settings'   => 'tangerine_wrapper_bg'
			)
		) );

		$customize->add_control(
			new WP_Customize_Color_Control(
			$customize, 'tangerine_top_bar_bg', array(
				'label'      => __( 'Top Bar Background', TANGERINE_TEXTDOMAIN ),
				'section'    => 'tangerine_colors',
				'settings'   => 'tangerine_top_bar_bg'
			)
		) );

		$customize->add_control(
			new WP_Customize_Color_Control(
			$customize, 'tangerine_footer_bg', array(
				'label'      => __( 'Footer Background', TANGERINE_TEXTDOMAIN ),
				'section'    => 'tangerine_colors',
				'settings'   => 'tangerine_footer_bg'
			)
		) );

		$customize->add_control(
			new WP_Customize_Color_Control(
			$customize, 'tangerine_footer_menu_bg', array(
				'label'      => __( 'Footer Menu Background', TANGERINE_TEXTDOMAIN ),
				'section'    => 'tangerine_colors',
				'settings'   => 'tangerine_footer_menu_bg'
			)
		) );

		$customize->add_control(
			new WP_Customize_Color_Control(
			$customize, 'tangerine_credits_bg', array(
				'label'      => __( 'Credits Background', TANGERINE_TEXTDOMAIN ),
				'section'    => 'tangerine_colors',
				'settings'   => 'tangerine_credits_bg'
			)
		) );

		// Slider
		$customize->add_control(
			new WP_Customize_Multiselect_Control(
			$customize, 'tangerine_slider_category', array(
				'label'   => 'Get slides from:',
				'description'	=> __( 'Use Ctrl + Click for multiple selection.', TANGERINE_TEXTDOMAIN ),
				'section' => 'tangerine_slider',
				'settings'   => 'tangerine_slider_category',
				'type'	=> 'multiple-select',
				'choices'  => get_post_types(array( 'publicly_queryable' => true, 'capability_type' => 'post' )),
				'priority'	=> 1
			)
		) );

		$customize->add_control(
			new WP_Customize_Text_Control(
			$customize, 'tangerine_slider_slides', array(
				'section'		=> 'tangerine_slider',
				'settings' => 'tangerine_slider_slides',
				'label'    => __( 'Number of slides', TANGERINE_TEXTDOMAIN ),
				'description'	=> __( 'Use 0 for unlimited slides.', TANGERINE_TEXTDOMAIN ),
				'type'     => 'text',
				'priority'	=> 2
			)
		) );

		$customize->add_control(
			new WP_Customize_Text_Control(
			$customize, 'tangerine_slider_width', array(
				'label'   => 'Slide width:',
				'description'	=> __( 'Set before creating any slides. Else you have to regenerate thumbnails.', TANGERINE_TEXTDOMAIN ),
				'extra'	=> 'px',
				'section' => 'tangerine_slider',
				'settings'   => 'tangerine_slider_width',
				'type'	=> 'text',
				'priority'	=> 3
			)
		) );

		$customize->add_control(
			new WP_Customize_Text_Control(
			$customize, 'tangerine_slider_height', array(
				'label'   => 'Slide height:',
				'description'	=> __( 'Set before creating any slides. Else you have to regenerate thumbnails.', TANGERINE_TEXTDOMAIN ),
				'extra'	=> 'px',
				'section' => 'tangerine_slider',
				'settings'   => 'tangerine_slider_height',
				'type'	=> 'text',
				'priority'	=> 4
			)
		) );

		// Orbit Slider
		$customize->add_control(
			new WP_Customize_Text_Control(
			$customize, 'tangerine_orbit_timerspeed', array(
				'section'		=> 'tangerine_orbit_slider',
				'settings' => 'tangerine_orbit_timerspeed',
				'label'    => __( 'Animation Speed', TANGERINE_TEXTDOMAIN ),
				'description'    => __( 'Time for slide to be shown.', TANGERINE_TEXTDOMAIN ),
				'extra'    => __( 'ms', TANGERINE_TEXTDOMAIN ),
				'type'     => 'text',
				'priority'	=> 1
			)
		) );

		$customize->add_control(
			new WP_Customize_Text_Control(
			$customize, 'tangerine_orbit_animationspeed', array(
				'section'		=> 'tangerine_orbit_slider',
				'settings' => 'tangerine_orbit_animationspeed',
				'label'    => __( 'Transition Speed', TANGERINE_TEXTDOMAIN ),
				'description'    => __( 'Time for slide effect.', TANGERINE_TEXTDOMAIN ),
				'extra'    => __( 'ms', TANGERINE_TEXTDOMAIN ),
				'type'     => 'text',
				'priority'	=> 2
			)
		) );

		$customize->add_control( 'tangerine_orbit_bullets', array(
			'section'		=> 'tangerine_orbit_slider',
			'settings' => 'tangerine_orbit_bullets',
			'label'    => __( 'Show bullets', TANGERINE_TEXTDOMAIN ),
			'type'     => 'checkbox',
			'priority'	=> 3
		) );

		$customize->add_control( 'tangerine_orbit_caption', array(
			'section'		=> 'tangerine_orbit_slider',
			'settings' => 'tangerine_orbit_caption',
			'label'    => __( 'Show caption', TANGERINE_TEXTDOMAIN ),
			'type'     => 'checkbox',
			'priority'	=> 4
		) );

		$customize->add_control( 'tangerine_orbit_navbuttons', array(
			'section'		=> 'tangerine_orbit_slider',
			'settings' => 'tangerine_orbit_navbuttons',
			'label'    => __( 'Show navigation buttons', TANGERINE_TEXTDOMAIN ),
			'type'     => 'checkbox',
			'priority'	=> 5
		) );

		$customize->add_control( 'tangerine_orbit_timer', array(
			'section'		=> 'tangerine_orbit_slider',
			'settings' => 'tangerine_orbit_timer',
			'label'    => __( 'Show timer', TANGERINE_TEXTDOMAIN ),
			'type'     => 'checkbox',
			'priority'	=> 6
		) );

		$customize->add_control( 'tangerine_orbit_numbers', array(
			'section'		=> 'tangerine_orbit_slider',
			'settings' => 'tangerine_orbit_numbers',
			'label'    => __( 'Show numbering', TANGERINE_TEXTDOMAIN ),
			'type'     => 'checkbox',
			'priority'	=> 7
		) );

		$customize->add_control( 'tangerine_orbit_pauseonhover', array(
			'section'		=> 'tangerine_orbit_slider',
			'settings' => 'tangerine_orbit_pauseonhover',
			'label'    => __( 'Pause on hover', TANGERINE_TEXTDOMAIN ),
			'type'     => 'checkbox',
			'priority'	=> 8
		) );

		$customize->add_control( 'tangerine_orbit_keynav', array(
			'section'		=> 'tangerine_orbit_slider',
			'settings' => 'tangerine_orbit_keynav',
			'label'    => __( 'Keyboard navigation', TANGERINE_TEXTDOMAIN ),
			'type'     => 'checkbox',
			'priority'	=> 9
		) );

		// Various Tweaks
		$customize->add_control(
			new WP_Customize_Text_Control(
			$customize, 'powered_by', array(
				'label'   => 'Powered by',
				'description'	=> __( 'Change default credits.', TANGERINE_TEXTDOMAIN ),
				'section' => 'tangerine_tweaks',
				'settings'   => 'powered_by'
			)
		) );

		// Advanced Settings
		$customize->add_control(
			new WP_Customize_Textarea_Control(
			$customize, 'tangerine_custom_css', array(
				'label'   => 'Custom CSS',
				'description'	=> __( 'Add custom styles to your theme.', TANGERINE_TEXTDOMAIN ),
				'section' => 'tangerine_advanced',
				'settings'   => 'tangerine_custom_css'
			)
		) );

	}
}
