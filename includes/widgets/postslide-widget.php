<?php

class Widget extends WP_Widget {

	public function __construct()
	{
		parent::__construct(
			'latest_posts_slider', // Base ID
			'Latest Posts Slider', // Name
			array( 'description' => __( 'Show a slider of latest posts.', TANGERINE_TEXTDOMAIN ), )
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$pshow = apply_filters( 'posts_show', $instance['pshow'] );
		$animation = apply_filters( 'posts_animation', $instance['animation'] );
		$ptype = apply_filters( 'post_type', $instance['ptype'] );
		$caption = apply_filters( 'post_caption', $instance['caption'] );

		echo $before_widget;
		if ( ! empty( $title ) ) echo $before_title . $title . $after_title;

		$postwidget = new WP_Query(array( 'post_type' => $ptype, 'showposts' => $pshow ));

		if( $postwidget->have_posts() ) :
		?>

			<div class="posts-slider <?php if( $caption == '') { echo 'no-caption'; } ?>" data-orbit data-options="timer_speed:<?php echo esc_attr( $animation ); ?>; bullets:false;">
				<?php while($postwidget->have_posts()) : $postwidget->the_post(); ?>

					<div id="post-slide-<?php the_ID(); ?>" class="post-slide">
						<?php if ( has_post_thumbnail() ) : ?>
							<a id="link-<?php the_ID(); ?>" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail( 'slider-medium-thumbnail', array( 'class'	=> 'slide-thumbnail' ) ); ?>
							</a>

						<?php else: ?>

							<a id="link-<?php the_ID(); ?>" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
								<img src="<?php echo get_template_directory_uri().'/images/image-placeholder-small.png' ?>" alt="" />
							</a>

						<?php endif; ?>

						<?php if( $caption != '') : ?>
							<div id="caption-<?php the_ID(); ?>" class="orbit-caption">
								<h5 class="small-10 column small-offset-1"><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
							</div>
						<?php endif; ?>
					</div>

				<?php wp_reset_query(); endwhile; ?>
			</div>

			<script type="text/javascript">
				jQuery(document).ready( function($){
					if( $('.posts-slider').hasClass('no-caption') ){
						$('.widget_latest_posts_slider').find('a.orbit-prev, a.orbit-next').css('display', 'none');
					}
				});
			</script>

		<?php endif; ?>
		<?php
		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['pshow'] = strip_tags( $new_instance['pshow'] );
		$instance['animation'] = strip_tags( $new_instance['animation'] );
		$instance['ptype'] = $new_instance['ptype'] ;
		$instance['caption'] = $new_instance['caption'] ;

		return $instance;
	}

	public function form( $instance ) {
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : __( 'Latest Posts', 'text_domain' );
		$pshow = isset( $instance[ 'pshow' ] ) ? $instance[ 'pshow' ] : __( '5', 'text_domain' );
		$animation = isset( $instance[ 'animation' ] ) ? $instance[ 'animation' ] : __( '4000', 'text_domain' );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'pshow' ); ?>"><?php _e( 'Posts to show:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'pshow' ); ?>" name="<?php echo $this->get_field_name( 'pshow' ); ?>" type="text" value="<?php echo esc_attr( $pshow ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'animation' ); ?>"><?php _e( 'Slides amination speed (ms):' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'animation' ); ?>" name="<?php echo $this->get_field_name( 'animation' ); ?>" type="text" value="<?php echo esc_attr( $animation ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'ptype' ); ?>"><?php _e( 'Post type:' ); ?></label>

			<?php $ptypes = get_post_types(array( 'publicly_queryable' => true, 'capability_type' => 'post' ));

				echo '<select class="widefat" id="'. $this->get_field_id( 'ptype' ) .'" name="'. $this->get_field_name( 'ptype' ) .'" style="text-transform: capitalize;">';

				foreach ($ptypes  as $post_type ) {
					echo '<option '. selected( $instance['ptype'], $post_type ) .'>'. $post_type .'</option>';
				} echo '</select>';
			?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'caption' ); ?>"><?php _e( 'Show caption:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'caption' ); ?>" name="<?php echo $this->get_field_name( 'caption' ); ?>" type="checkbox" <?php if( isset( $instance['caption'] ) ) { checked( $instance['caption'] , 'on' ); } ?> />
		</p>

		<?php
	}

}

?>
