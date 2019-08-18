<?php
/**
 * Index
 *
 * @package WordPress
 */

get_header(); ?>



<?php get_template_part( 'template/mainvisual/page' ); // get_template_part( 'template/mainvisual/index' ); ?>

<!-- l-content -->
<div class="l-content p-content">
<div class="l-inner">
<div class="l-row">

<!-- l-primary -->
<main class="l-primary">

	<?php
	if ( have_posts() ) :
		?>
	<!-- p-archive-header -->
	<div class="p-archive-header">
		<?php my_breadcrumb(); ?>
		<h1 class="e-title"><?php the_archive_title(); ?></h1><!-- /e-title -->
		<div class="e-description"><?php the_archive_description(); ?></div><!-- /e-description -->
		<div class="e-form"><?php get_search_form(); ?></div><!-- /e-form -->
	</div><!-- /p-archive-header -->

	<!-- p-entry-items -->
		<?php if ( 'horizon' === get_theme_mod( 'my_layout_archive_check' ) ) : ?>
	<div class="p-entry-items m-square">
	<?php elseif ( 'vertical' === get_theme_mod( 'my_layout_archive_check' ) ) : ?>
	<div class="p-entry-items">
	<?php else : ?>
	<div class="p-entry-items m-square">
	<?php endif; ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template/content/archive' ); ?>

			<?php
		endwhile;
		?>
		</div><!-- /p-entry-items -->

		<?php if ( paginate_links() ) : ?>
		<div class="p-pagenation">
			<?php
			echo wp_kses_post(
				paginate_links(
					array(
						'end_size'  => 0,
						'mid_size'  => 1,
						'prev_next' => true,
						'prev_text' => '<i class="fas fa-angle-left"></i>',
						'next_text' => '<i class="fas fa-angle-right"></i>',
					)
				)
			);
			?>
		</div><!-- /p-pagenation -->
		<?php endif; ?>
		<?php endif; ?>
</main><!-- /l-primary -->

<?php get_sidebar(); ?>

</div><!-- /l-row -->
</div><!-- /l-inner -->
</div><!-- /l-content -->



<?php get_footer(); ?>
