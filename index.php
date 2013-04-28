<?php get_header(); ?>

	<!-- BEGIN #content -->
	<?php get_sidebar(); ?>

	<section id="content" class="small-12 <?php dynamic_content_styles(); ?> columns">

		<?php if ( is_page() ): ?>

			<?php if ( !is_front_page() && get_theme_mod( 'show_breadcrumbs' ) == '1' ) { breadcrumbs(); } ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article class="<?php echo get_post_type( $post ); ?>">

					<h2><?php the_title(); ?></h2>
					<div class="details">
						<?php the_content(); ?>
					</div>

				</article>

			<?php endwhile; endif; ?>

		<?php else: ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article class="<?php echo get_post_type( $post ); ?>">

					<?php if ( is_single() ): ?>

						<h2><?php the_title(); ?></h2>
						<p class="date round secondary label">Posted on: <span class="time"><?php echo get_the_date(); ?></span> by: <span class="author"><?php echo get_the_author(); ?></span></p>

						<div class="details">
							<?php the_content(); ?>
						</div>

						<?php comments_template(); ?>

					<?php else: ?>

						<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
						<p class="date round secondary label">Posted on: <span class="time"><?php echo get_the_date(); ?></span> by: <span class="author"><?php echo get_the_author(); ?></span></p>

						<div class="excerpt">
							<?php if ( has_post_thumbnail() ) : ?>
								<a id="link-<?php the_ID(); ?>" class="th featured" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_post_thumbnail( 'thumbnail' ); ?>
								</a>
							<?php endif; ?>

							<?php the_excerpt(); ?>
							
						</div>

					<?php endif; ?>

				</article>

			<?php endwhile; ?>

				<?php if( !is_single() ) { echo '<hr>'; pagination(); } ?>

			<?php else: ?>

				<p><?php _e( 'Sorry, no posts match your criteria.' ); ?></p>

			<?php endif; ?>

		<?php endif; ?>


	</section>
	<!-- END #content -->

	<?php get_sidebar( 'right' ); ?>

<?php get_footer(); ?>
