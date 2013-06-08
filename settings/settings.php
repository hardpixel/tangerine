<?php

/*==================================================*/
/* Includes, defines, start
/*==================================================*/

ob_start();

define( 'ACTIVATE_TANGERINE', true );

if ( ACTIVATE_TANGERINE ) {
	include 'includes/customizer.php';
	require_once ABSPATH . WPINC . '/class-wp-customize-control.php';

	$tangerine = new Tangerine();
}


/*==================================================*/
/* Tangerine
/*==================================================*/

class Tangerine {
	function __construct() {
		add_action( 'after_switch_theme', array( &$this, 'after_theme_setup' ) );

		add_action( 'admin_menu', array( &$this, 'admin_menu' ) );
		add_action( 'customize_register', array( &$this, 'customize_register' ) );
	}

	function after_theme_setup() {
		$the_theme_status = get_option( 'theme_setup_status' );

		if ( $the_theme_status !== '1' ) {
			// Apply default theme settings
			tangerine_default_theme_settings();

			update_option( 'theme_setup_status', '1' );
			add_action( 'admin_notices', 'tangerine_switch_theme_notice_default' );
		}

		elseif ( $the_theme_status === '1' and isset( $_GET['activated'] ) ) {
			// Show theme re-enabled notice
		    add_action( 'admin_notices', 'tangerine_switch_theme_notice_custom' );
		}
	}

	function admin_menu() {
		add_theme_page( __( 'Customize' ), __( 'Customize' ), 'edit_theme_options', 'customize.php' );
	}

	function customize_register( $customize ) {
		$customizer = new Tangerine_Customizer( $customize );
	}
}


/*==================================================*/
/* Default theme settings
/*==================================================*/

function tangerine_default_theme_settings() {

	ob_start ();

	// Site title
	set_theme_mod( 'set_header_image', get_stylesheet_directory_uri() .'/images/logo.png' );
	set_theme_mod( 'show_header', '1' );
	set_theme_mod( 'show_header_image', '1' );
	set_theme_mod( 'show_header_title', '1' );
	set_theme_mod( 'show_header_tagline', '1' );
	set_theme_mod( 'show_top_bar_title', '1' );

	// Navigation Options
	set_theme_mod( 'show_top_menu', '1' );
	set_theme_mod( 'set_fixed_top_menu', '' );
	set_theme_mod( 'show_main_menu', '1' );
	set_theme_mod( 'set_sticky_main_menu', '' );
	set_theme_mod( 'show_footer_menu', '1' );
	set_theme_mod( 'show_breadcrumbs', '1' );

	// Typography
	set_theme_mod( 'set_body_font', 'Ubuntu' );
	set_theme_mod( 'set_body_font_size', '0.875' );
	set_theme_mod( 'set_heading_font', 'Open Sans' );
	set_theme_mod( 'set_heading_font_weight', 'normal' );
	set_theme_mod( 'set_title_font', 'Open Sans' );
	set_theme_mod( 'set_title_font_weight', 'normal' );
	set_theme_mod( 'set_title_font_size', '3.775' );

	// Static Front Page
	set_theme_mod( 'show_front_page_title', '' );

	// Layout
	set_theme_mod( 'set_page_width', 'narrow-content' );
	set_theme_mod( 'set_sidebar_pos', 'sidebar-left-right' );
	set_theme_mod( 'set_header_mode', 'contained-header' );
	set_theme_mod( 'set_footer_widgets', '3' );
	set_theme_mod( 'set_main_menu_pos', 'below-slider' );

	// Basic Colors
	set_theme_mod( 'set_wrapper_bg', '' );
	set_theme_mod( 'set_primary_color', '' );
	set_theme_mod( 'set_text_color', '' );
	set_theme_mod( 'set_header_bg', '' );
	set_theme_mod( 'set_slider_bg', '' );
	set_theme_mod( 'set_footer_bg', '' );
	set_theme_mod( 'set_credits_bg', '' );

	// Menu Colors
	set_theme_mod( 'set_topbar_bg', '' );
	set_theme_mod( 'set_topbar_color', '' );
	set_theme_mod( 'set_mmenu_bg', '' );
	set_theme_mod( 'set_mmenu_color', '' );
	set_theme_mod( 'set_fmenu_bg', '' );
	set_theme_mod( 'set_fmenu_color', '' );

	// Slider
	set_theme_mod( 'show_home_slider', '1' );
	set_theme_mod( 'show_slider_always', '' );
	set_theme_mod( 'set_slider_category', 'slides' );
	set_theme_mod( 'set_slider_slides', '3' );
	set_theme_mod( 'set_slider_width', '1000' );
	set_theme_mod( 'set_slider_height', '300' );
	set_theme_mod( 'set_slider_timerspeed', '4500' );
	set_theme_mod( 'set_slider_animationspeed', '500' );
	set_theme_mod( 'show_slider_bullets', '1' );
	set_theme_mod( 'show_slider_navbuttons', '1' );
	set_theme_mod( 'show_slider_caption', '1' );
	set_theme_mod( 'show_slider_timer', '1' );
	set_theme_mod( 'show_slider_numbers', '1' );
	set_theme_mod( 'set_slider_pauseonhover', '1' );
	set_theme_mod( 'set_slider_keynav', '1' );

	do_action( 'tangerine_default_theme_settings' );
	
	$response = ob_get_contents ();
				ob_end_clean ();
				echo $response;
				die(1);
}

// Admin menu notices on theme switch
function tangerine_switch_theme_notice_default() {
	?>
		<div class="error">
			<p><?php _e( 'Default settings were loaded for', TANGERINE_TEXTDOMAIN ); ?> <?php echo get_option( 'current_theme' ); ?>.</p>
		</div>
	<?php
}

function tangerine_switch_theme_notice_custom() {
	?>
		<div class="updated">
			<p><?php _e( 'Your customized settings were loaded for', TANGERINE_TEXTDOMAIN ); ?> <?php echo get_option( 'current_theme' ); ?>.</p>
		</div>
	<?php
}

add_action('wp_ajax_reset_theme_defaults', 'tangerine_default_theme_settings');

/*==================================================*/
/* Custom Controls
/*==================================================*/

class WP_Customize_Textarea_Control extends WP_Customize_Control {

	public $description = '';
	public $rows = '10';

	function render_content() {
		?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<span style="color: #bbb; width:100%; display: inline-block;"><img src="<?php echo get_template_directory_uri().'/settings/images/info.png' ?>" style="margin-right: 5px; vertical-align: text-bottom;" /><?php echo esc_html( $this->description ); ?></span>
			<textarea rows=" <?php echo esc_html( $this->rows ) ?> " style="width:100%; max-width: 100%; margin-top: 10px;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
		<?php
	}
}

class WP_Customize_Text_Control extends WP_Customize_Control {

	public $description = '';
	public $extra = '';
	public $width = '45';

	function render_content() {
		?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<span style="color: #bbb; width: 100%; display: inline-block;"><img src="<?php echo get_template_directory_uri().'/settings/images/info.png' ?>" style="margin-right: 5px; vertical-align: text-bottom;" /><?php echo esc_html( $this->description ); ?></span>
			<input style="margin-top: 10px; width: <?php echo esc_html( $this->width ); ?>%; float: left;" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
			<span style="float: left; margin: 14px 10px 0;"> <?php echo esc_html( $this->extra ); ?> </span>
			</label>
		<?php
	}
}

class WP_Customize_Select_Control extends WP_Customize_Control {

	public $description = '';

	function render_content() {

		if ( empty( $this->choices ) )
			return;
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span style="color: #bbb; width:100%; display: inline-block;"><img src="<?php echo get_template_directory_uri().'/settings/images/info.png' ?>" style="margin-right: 5px; vertical-align: text-bottom;" /><?php echo esc_html( $this->description ); ?></span>
				<select <?php $this->link(); ?> style="width: 50%; text-transform: capitalize; margin-top: 10px;">
					<?php
						foreach ( $this->choices as $value => $label ) {
							$selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
							echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
						}
					?>
				</select>
			</label>
		<?php
	}
}

class WP_Customize_Multiselect_Control extends WP_Customize_Control {

	public $description = '';

	function render_content() {

		if ( empty( $this->choices ) )
			return;
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span style="color: #bbb; width:100%; display: inline-block;"><img src="<?php echo get_template_directory_uri().'/settings/images/info.png' ?>" style="margin-right: 5px; vertical-align: text-bottom;" /><?php echo esc_html( $this->description ); ?></span>
				<select <?php $this->link(); ?> multiple="multiple" style="height: 50%; width: 100%; text-transform: capitalize; margin-top: 10px;">
					<?php
						foreach ( $this->choices as $value => $label ) {
							$selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
							echo '<option style="padding: 4px;" value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
						}
					?>
				</select>
			</label>
		<?php
	}
}

class WP_Customize_Ajax_Button_Control extends WP_Customize_Control {

	public $description = '';
	public $button_text = '';
	public $button_id = '';
	public $action = '';

	function render_content() {
		?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<span style="color: #bbb; width: 100%; display: inline-block;"><img src="<?php echo get_template_directory_uri().'/settings/images/info.png' ?>" style="margin-right: 5px; vertical-align: text-bottom;" /><?php echo esc_html( $this->description ); ?></span>
			<input id="<?php echo esc_html( $this->button_id ); ?>" type="button" style="margin-top:10px; float:left;" class="button button-primary save" value="<?php echo esc_html( $this->button_text ); ?>" />
			<span class="spinner" style="display: none; float:left; margin-top:14px; margin-left: 10px;"></span>
			</label>

			<script>
				jQuery(document).ready(function($){

					$("#<?php echo esc_html( $this->button_id ); ?>").on('click', function() {
						var $spinner = $(this).next('.spinner');

						$spinner.fadeIn('fast');

						$.ajax({
							url: "<?php echo admin_url('admin-ajax.php'); ?>",
							type: 'GET',
							data: { action: '<?php echo esc_html( $this->action ); ?>' }
						})

						.done(function () {
							$spinner.fadeOut('fast');
							location.reload(true);
						});

					});	

				});
			</script>
		<?php
	}
}
