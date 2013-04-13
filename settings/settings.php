<?php

/*==================================================*/
/* Includes, defines, start
/*==================================================*/

	ob_start();

	define( 'ACTIVATE_TANGERINE', true );

	if( ACTIVATE_TANGERINE )
	{
		include( 'includes/customizer.php' );
		require_once( ABSPATH . WPINC . '/class-wp-customize-control.php' );

		$tangerine = new Tangerine();
	}


/*==================================================*/
/* Tangerine
/*==================================================*/

	class Tangerine	{
		function __construct() {
			add_action( 'after_setup_theme', array( &$this, 'after_theme_setup' ) );

			add_action( 'admin_menu', array( &$this, 'admin_menu' ) );
			add_action( 'customize_register', array( &$this, 'customize_register' ) );
		}

		function after_theme_setup() {
			// set_theme_mod( 'tangerine_sidebar', 'sidebar-none' );
		}

		function admin_menu() {
			add_theme_page( __( 'Customize' ), __( 'Customize' ), 'edit_theme_options', 'customize.php' );
		}

		function customize_register( $customize ) {
			$customizer = new Tangerine_Customizer( $customize );
		}
	}


/*==================================================*/
/* Custom Controls
/*==================================================*/

	class WP_Customize_Textarea_Control extends WP_Customize_Control {

	public $description = '';

	function render_content() {
		?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<span style="color: #bbb; width:100%; display: inline-block;"><img src="<?php echo get_template_directory_uri().'/settings/images/info.png' ?>" style="margin-right: 5px; vertical-align: text-bottom;" /><?php echo esc_html( $this->description ); ?></span>
			<textarea rows="10" style="width:100%; max-width: 100%; margin-top: 10px;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
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
		<?php }
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
		<?php }
	}
