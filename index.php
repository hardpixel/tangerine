<?php get_header(); ?>

	<!-- BEGIN #content -->
	<?php get_sidebar(); ?>

	<section id="content" class="small-12 <?php dynamic_content_styles(); ?> columns">

		<?php if( !is_front_page() && is_page() && get_theme_mod('show_breadcrumbs') == '1' ) { breadcrumbs(); } ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article class="<?php echo get_post_type( $post ); ?>">

				<?php if( is_single() || is_page() ): ?>
					<h2><?php the_title(); ?></h2>

					<?php if( is_single() ): ?>
						<p class="date round secondary label">Posted on: <span class="time"><?php echo get_the_date(); ?></span> by: <span class="author"><?php echo get_the_author(); ?></span></p>
					<?php endif; ?>

					<div class="details">
						<?php the_content(); ?>
					</div>
				<?php else: ?>
					<h2><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
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

		<?php endwhile; endif; ?>

		<?php if( !is_single() && !is_page() ) { echo '<hr>'; pagination(); } ?>

	</section>
	<!-- END #content -->

	<?php get_sidebar( 'right' ); ?>

<?php get_footer(); ?>
