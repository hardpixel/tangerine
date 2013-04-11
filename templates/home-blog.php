<?php
/*
Template Name: Home Blog
*/
?>

<?php get_header(); ?>

	<!-- BEGIN #content -->
	<section id="content" class="small-12 <?php if( get_theme_mod('tangerine_sidebar') != 'sidebar-none' ) { echo 'large-8'; } ?> <?php if( get_theme_mod( 'tangerine_sidebar' ) == 'sidebar-left') { echo 'push-4'; } ?> columns">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article class="<?php echo get_post_type( $post ); ?>">

				<h2><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<p class="date round secondary label">Posted on: <span class="time"><?php echo get_the_date(); ?></span> by: <span class="author"><?php echo get_the_author(); ?></span></p>

				<div class="excerpt">
					<?php the_excerpt(); ?>
				</div>

			</article>

		<?php endwhile; endif; ?>

		<?php pagination(); ?>

	</section>
	<!-- END #content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
