<?php
/*
Template Name: Home Blog
*/
?>

<?php get_header(); ?>

	<!-- BEGIN #content -->
	<section id="content" class="small-12 large-8 columns">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article class="<?php echo get_post_type( $post ); ?>">

				<?php if( is_single() || is_page() ): ?>
					<h2><?php the_title(); ?></h2>

					<div class="details">
						<?php the_content(); ?>
					</div>
				<?php else: ?>
					<h2><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

					<div class="excerpt">
						<?php the_excerpt(); ?>
					</div>
				<?php endif; ?>

			</article>

		<?php endwhile; endif; ?>

	</section>
	<!-- END #content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
