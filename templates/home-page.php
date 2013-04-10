<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

	<!-- BEGIN #content -->
	<section id="content" class="small-12 large-8 columns">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article class="<?php echo get_post_type( $post ); ?>">

					<div class="details">
						<?php the_content(); ?>
					</div>

			</article>

		<?php endwhile; endif; ?>

	</section>
	<!-- END #content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
