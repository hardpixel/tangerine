<?php

// Register the custom post types
add_action( 'init', 'slider_register_cpt' );

// Register the shortcodes
add_action( 'init', 'slider_register_shortcode' );

// Add meta box for slides
add_action( 'add_meta_boxes', 'create_slide_metaboxes' );

// Save meta box data
add_action( 'save_post', 'slide_save_meta', 1, 2 );

// Custom post type icon
add_action( 'admin_head', 'slide_cpt_icon' );

// Edit post editor meta boxes
add_action( 'do_meta_boxes', 'slider_edit_metaboxes' );

// Edit slide columns in 'all_items' view
add_filter( 'manage_edit-slides_columns', 'slider_columns' );

// Add slide-specific columns to the 'all_items' view
add_action( 'manage_posts_custom_column', 'slider_add_columns' );

// Order the slides by the 'order' attribute in the 'all_items' column view
add_filter( 'pre_get_posts', 'slider_column_order' );


function slider_register_cpt() {
	$labels = array(
		'name'                 => __( 'Slides', TANGERINE_TEXTDOMAIN ),
		'singular_name'        => __( 'Slide', TANGERINE_TEXTDOMAIN ),
		'all_items'            => __( 'All Slides', TANGERINE_TEXTDOMAIN ),
		'add_new'              => __( 'Add New', TANGERINE_TEXTDOMAIN ),
		'add_new_item'         => __( 'Add New', TANGERINE_TEXTDOMAIN ),
		'edit_item'            => __( 'Edit Slide', TANGERINE_TEXTDOMAIN ),
		'new_item'             => __( 'New Slide', TANGERINE_TEXTDOMAIN ),
		'view_item'            => __( 'View Slide', TANGERINE_TEXTDOMAIN ),
		'search_items'         => __( 'Search Slides', TANGERINE_TEXTDOMAIN ),
		'not_found'            => __( 'No Slide found', TANGERINE_TEXTDOMAIN ),
		'not_found_in_trash'   => __( 'No Slide found in Trash', TANGERINE_TEXTDOMAIN ),
		'parent_item_colon'    => ''
	);

	$args = array(
		'labels'               => $labels,
		'public'               => true,
		'publicly_queryable'   => true,
		'_builtin'             => false,
		'show_ui'              => true,
		'query_var'            => true,
		'rewrite'              => array( "slug" => "slides" ),
		'capability_type'      => 'post',
		'hierarchical'         => false,
		'menu_position'        => 20,
		'supports'             => array( 'title', 'thumbnail', 'page-attributes' ),
		'taxonomies'           => array(),
		'has_archive'          => true,
		'show_in_nav_menus'    => false
	);

	register_post_type( 'slides', $args );
}

function slider_register_shortcode() {
	add_shortcode( 'slider', 'tangerine_slider_shortcode' );
}

function tangerine_slider_shortcode() {
	$slider = tangerine_home_slider();
	return $slider;
}

function create_slide_metaboxes() {
	add_meta_box( 'slider_metabox_1', __( 'Slide Caption', TANGERINE_TEXTDOMAIN ), 'slider_metabox_1', 'slides', 'normal', 'default' );
	add_meta_box( 'slider_metabox_2', __( 'Slide Link', TANGERINE_TEXTDOMAIN ), 'slider_metabox_2', 'slides', 'normal', 'default' );
}

function slider_metabox_1() {

	global $post;

	// Retrieve the metadata values if they already exist
	$slide_caption = get_post_meta( $post->ID, '_slide_caption', true ); ?>

	<textarea id="slider-caption-setting" rows="4" style="width: 100%;" name="slide_caption"><?php echo $slide_caption; ?></textarea>
	<span class="description"><?php echo _e( 'The caption of this slide.', TANGERINE_TEXTDOMAIN ); ?></span>

<?php }

function slider_metabox_2() {

	global $post;

	// Retrieve the metadata values if they already exist
	$slide_link_url = get_post_meta( $post->ID, '_slide_link_url', true ); ?>

	<input type="text" style="width: 100%;" name="slide_link_url" value="<?php echo $slide_link_url; ?>" />
	<span class="description"><?php echo _e( 'The URL this slide should link to.', TANGERINE_TEXTDOMAIN ); ?></span>

<?php }

function slide_save_meta( $post_id, $post ) {
	if ( isset( $_POST['slide_caption'] ) ) {
		update_post_meta( $post_id, '_slide_caption', strip_tags( $_POST['slide_caption'] ) );
	}

	if ( isset( $_POST['slide_link_url'] ) ) {
		update_post_meta( $post_id, '_slide_link_url', strip_tags( $_POST['slide_link_url'] ) );
	}
}

function slide_cpt_icon() {
?>
	<style type="text/css" media="screen">
		#menu-posts-slides .wp-menu-image {
			background: url('<?php echo get_template_directory_uri(); ?>/images/slides-icon.png') no-repeat 6px -17px !important;
		}
		#menu-posts-slides:hover .wp-menu-image {
			background-position: 6px 7px !important;
		}

		#set-post-thumbnail {
			display: table;
			text-align: center;
			width: 100%;
		}

		#set-post-thumbnail img {
			width: 50%;
			height: auto;
		}
	</style>
<?php
}

function slider_edit_metaboxes() {
	// Remove metaboxes
	remove_meta_box( 'postimagediv', 'slides', 'side' );
	remove_meta_box( 'pageparentdiv', 'slides', 'side' );
	remove_meta_box( 'hybrid-core-post-template', 'slides', 'side' );
	remove_meta_box( 'theme-layouts-post-meta-box', 'slides', 'side' );
	remove_meta_box( 'post-stylesheets', 'slides', 'side' );

	// Add the previously removed meta boxes - with modified properties
	add_meta_box( 'postimagediv', __( 'Slide Featured Image', TANGERINE_TEXTDOMAIN ), 'post_thumbnail_meta_box', 'slides', 'normal', 'high' );
	add_meta_box( 'pageparentdiv', __( 'Slide Order', TANGERINE_TEXTDOMAIN ), 'page_attributes_meta_box', 'slides', 'side', 'low' );

}

function slider_columns( $columns ) {
	$columns = array(
		'cb'       => '<input type="checkbox" />',
		'image'    => __( 'Image', 'tangerine-orbit' ),
		'title'    => __( 'Title', 'tangerine-orbit' ),
		'order'    => __( 'Order', 'tangerine-orbit' ),
		'link'     => __( 'Link', 'tangerine-orbit' ),
		'date'     => __( 'Date', 'tangerine-orbit' )
	);

	return $columns;
}

function slider_add_columns( $column ) {
	global $post;

	// Get the post edit link for the post
	$edit_link = get_edit_post_link( $post->ID );

	// Add column 'Image'
	if ( $column == 'image' )
		echo '<a href="' . $edit_link . '" title="' . $post->post_title . '">' . get_the_post_thumbnail( $post->ID, array( 60, 60 ), array( 'title' => trim( strip_tags(  $post->post_title ) ) ) ) . '</a>';

	// Add column 'Order'
	if ( $column == 'order' )
		echo '<a href="' . $edit_link . '">' . $post->menu_order . '</a>';

	// Add column 'Caption'
	if ( $column == 'caption' )
		echo '<a href="' . get_post_meta( $post->ID, "_slide_caption", true ) . '" target="_blank" >' . get_post_meta( $post->ID, "_slide_caption", true ) . '</a>';

	// Add column 'Link'
	if ( $column == 'link' )
		echo '<a href="' . get_post_meta( $post->ID, "_slide_link_url", true ) . '" target="_blank" >' . get_post_meta( $post->ID, "_slide_link_url", true ) . '</a>';
}

function slider_column_order( $wp_query ) {
	if ( is_admin() ) {

		$post_type = $wp_query->query['post_type'];

		if ( $post_type == 'slides' ) {
			$wp_query->set( 'orderby', 'menu_order' );
			$wp_query->set( 'order', 'ASC' );
		}
	}
}

if ( !function_exists( 'slider_style_opt' ) ) {

	function slider_style_opt() {
		if ( get_theme_mod( 'set_slider_pauseonhover' ) == '1' ) { echo 'pauseonhover '; }
		if ( get_theme_mod( 'set_slider_keynav' ) == '1' ) { echo 'keynav '; }
		if ( get_theme_mod( 'show_slider_navbuttons' ) == '' ) { echo 'no-buttons '; }
		if ( get_theme_mod( 'show_slider_timer' ) == '' ) { echo 'no-timer '; }
		if ( get_theme_mod( 'show_slider_numbers' ) == '' ) { echo 'no-numbers'; }
	}

}

if ( !function_exists( 'slider_data_opt' ) ) {

	function slider_data_opt() {
		echo 'timer_speed:'. get_theme_mod( 'set_slider_timerspeed' ) .';',
		'animation_speed:'. get_theme_mod( 'set_slider_animationspeed' ) .';';
		if ( get_theme_mod( 'show_slider_bullets' ) == '1' ) { echo 'bullets:true;'; } else { echo 'bullets:false;'; }
	}

}

if ( !function_exists( 'tangerine_home_slider' ) ) {

	function tangerine_home_slider() {
		if ( get_theme_mod( 'show_home_slider' ) == '1' ) { ?>

		<div id="main-slider">

			<div id="orbit-slider" class="home-slider <?php slider_style_opt(); ?> <?php echo get_theme_mod( 'set_slider_category' ); ?>">

				<ul data-orbit data-options="<?php slider_data_opt(); ?>">

					<?php 
						$slides = new WP_Query( array( 'showposts' => get_theme_mod( 'set_slider_slides' ), 'post_type' => get_theme_mod( 'set_slider_category' ), 'order' => 'ASC', 'orderby' => 'menu_order' ) );
					?>

					<?php if ( $slides->have_posts() ) : ?>

						<?php while ( $slides->have_posts() ) : $slides->the_post(); ?>
						
							<li class="slide">

								<?php global $post; ?>

								<?php if ( get_post_type() == 'slides' ) : ?>

									<?php if ( has_post_thumbnail() ) : ?>
										<a id="link-<?php the_ID(); ?>" href="<?php $slide_link = get_post_meta( $post->ID, '_slide_link_url', true ); if ( $slide_link != '' ) { echo $slide_link; } else { echo '#'; } ?>" title="<?php the_title(); ?>">
											<?php the_post_thumbnail( 'slider-large', array( 'class' => 'slide-thumbnail' ) ); ?>
										</a>
									<?php else: ?>
										<a id="link-<?php the_ID(); ?>" href="#" title="<?php the_title(); ?>">
											<img src="<?php echo get_template_directory_uri().'/images/image-placeholder.png' ?>" alt="<?php the_title(); ?>" />
										</a>
									<?php endif; ?>

									<?php if ( get_theme_mod( 'show_slider_caption' ) == '1' ) : ?>
										<div id="caption-<?php the_ID(); ?>" class="orbit-caption">
											<h4><?php the_title(); ?></h4>
											<p><?php echo get_post_meta( $post->ID, '_slide_caption', true ); ?></p>
										</div>
									<?php endif; ?>

								<?php else: ?>

									<?php if ( has_post_thumbnail() ) : ?>
										<a id="link-<?php the_ID(); ?>" class="small-12 large-6 columns" style="padding: 0;" href="<?php $slide_link = get_post_meta( $post->ID, '_slide_link_url', true ); if ( $slide_link != '' ) { echo $slide_link; } else { echo '#'; } ?>" title="<?php the_title(); ?>">
											<?php the_post_thumbnail( 'slider-medium', array( 'class' => 'slide-thumbnail medium' ) ); ?>
										</a>
									<?php else: ?>
										<a id="link-<?php the_ID(); ?>" class="small-12 large-6 columns" style="padding: 0;" href="#" title="<?php the_title(); ?>">
											<img class="slide-thumbnail medium" src="<?php echo get_template_directory_uri().'/images/image-placeholder-small.png' ?>" alt="<?php the_title(); ?>" />
										</a>
									<?php endif; ?>

									<?php if ( get_theme_mod( 'show_slider_caption' ) == '1' ) : ?>
										<div id="caption-<?php the_ID(); ?>" class="orbit-caption show-for-small">
											<h4><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
											<p><?php the_excerpt(); ?></p>
										</div>
									<?php endif; ?>

									<div id="excerpt-<?php the_ID(); ?>" class="orbit-excerpt small-6 columns hide-for-small">
										<h2><?php the_title(); ?></h2>
										<p><?php the_excerpt(); ?></p>
									</div>

								<?php endif; ?>

							</li>
						<?php endwhile; ?>

					<?php endif; ?>

				</ul>
			</div>
		</div>

	<?php }
	}

}

?>
