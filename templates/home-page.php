<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

	<!-- BEGIN #content -->
	<section id="content" class="small-12 <?php if( get_theme_mod('tangerine_sidebar') != 'sidebar-none' ) { echo 'large-8'; } ?> <?php if( get_theme_mod( 'tangerine_sidebar' ) == 'sidebar-left') { echo 'push-4'; } ?> columns">

		<article class="<?php echo get_post_type( $post ); ?>">

			<div class="details">
				<?php the_content(); ?>
			</div>

		</article>

	</section>
	<!-- END #content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
