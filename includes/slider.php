<?php

	function home_slider() {
	if( get_theme_mod( 'show_home_slider' ) == '1' ) { ?>

		<div id="main-slider">

			<div id="orbit-slider" class="home-slider <?php if( get_theme_mod('tangerine_orbit_pauseonhover') == '1' ) { echo 'pauseonhover'; } ?>
				<?php if( get_theme_mod('tangerine_orbit_keynav') == '1' ) { echo 'keynav'; } ?>
				<?php if( get_theme_mod('tangerine_orbit_navbuttons') == '' ) { echo 'no-buttons'; } ?>
				<?php if( get_theme_mod('tangerine_orbit_timer') == '' ) { echo 'no-timer'; } ?>
				<?php if( get_theme_mod('tangerine_orbit_numbers') == '' ) { echo 'no-numbers'; } ?>">

				<ul data-orbit data-options="timer_speed:<?php echo get_theme_mod('tangerine_orbit_timerspeed'); ?>;
					animation_speed:<?php echo get_theme_mod('tangerine_orbit_animationspeed'); ?>;
					bullets:<?php if( get_theme_mod('tangerine_orbit_bullets') == '1' ) { echo 'true'; } else { echo 'false'; } ?>;">

					<?php $slides = new WP_Query( array( 'showposts' => get_theme_mod('tangerine_slider_slides'), 'post_type' => get_theme_mod('tangerine_slider_category'), 'order' => 'DESC', 'orderby' => 'date' ) );

					if ( $slides->have_posts() ) : ?>

						<?php while ( $slides->have_posts() ) : $slides->the_post(); ?>
							<li class="slide">

								<?php global $post; ?>

								<?php if( get_post_type() == 'slides' ) : ?>

									<?php if ( has_post_thumbnail() ) : ?>
										<a id="link-<?php the_ID(); ?>" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_post_thumbnail( 'slider-large-thumbnail', array( 'class'	=> 'slide-thumbnail' ) ); ?>
										</a>
									<?php else: ?>
										<a id="link-<?php the_ID(); ?>" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
											<img src="<?php echo get_template_directory_uri().'/images/image-placeholder.png' ?>" alt="" />
										</a>
									<?php endif; ?>

									<?php if( get_theme_mod('tangerine_orbit_caption') == '1') : ?>
										<div id="caption-<?php the_ID(); ?>" class="orbit-caption">
											<h5><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
											<p><?php echo get_post_meta( $post->ID, "_slide_caption", true ); ?></p>
										</div>
									<?php endif; ?>

								<?php else: ?>

									<?php if ( has_post_thumbnail() ) : ?>
										<a id="link-<?php the_ID(); ?>" class="small-12 large-6 columns" style="padding: 0;" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_post_thumbnail( 'slider-medium-thumbnail', array( 'class'	=> 'slide-thumbnail medium' ) ); ?>
										</a>
									<?php else: ?>
										<a id="link-<?php the_ID(); ?>" class="small-12 large-6 columns" style="padding: 0;" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
											<img class="slide-thumbnail medium" src="<?php echo get_template_directory_uri().'/images/image-placeholder-small.png' ?>" alt="" />
										</a>
									<?php endif; ?>

									<?php if( get_theme_mod('tangerine_orbit_caption') == '1') : ?>
										<div id="caption-<?php the_ID(); ?>" class="orbit-caption show-for-small">
											<h5><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
											<p><?php the_excerpt(); ?></p>
										</div>
									<?php endif; ?>

									<div id="excerpt-<?php the_ID(); ?>" class="orbit-excerpt small-6 columns hide-for-small">
										<h5><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
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

} ?>
