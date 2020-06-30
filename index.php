<?php
/**
 * Index
 */

get_header(); ?>

<?php get_template_part( 'template/mainvisual/page' ); ?>

<!-- l-content -->
<div class="l-content p-content">
<div class="l-inner l-content__inner">

<!-- l-primary -->
<main id="a-main" class="l-primary">

	<?php
	if ( have_posts() ) :
		?>
	<!-- p-archive-header -->
	<div class="p-archive-header">
		<?php raccoon_breadcrumb(); ?>
		<h1 class="e-title"><?php the_archive_title(); ?></h1><!-- /e-title -->
		<div class="e-description"><?php the_archive_description(); ?></div><!-- /e-description -->
		<div class="e-form"><?php get_search_form(); ?></div><!-- /e-form -->
	</div><!-- /p-archive-header -->

	<!-- p-entry-items -->
		<?php if ( 'horizon' === get_theme_mod( 'raccoon_layout_archive_check' ) ) : ?>
	<div class="p-entry-items p-entry-items--square">
	<?php elseif ( 'vertical' === get_theme_mod( 'raccoon_layout_archive_check' ) ) : ?>
	<div class="p-entry-items">
	<?php else : ?>
	<div class="p-entry-items p-entry-items--square">
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
		<div class="p-pagination">
			<?php
			echo wp_kses_post(
				paginate_links(
					array(
						'end_size'  => 0,
						'mid_size'  => 1,
						'prev_next' => true,
						'prev_text' => '&lt;',
						'next_text' => '&gt;',
					)
				)
			);
			?>
		</div><!-- /p-pagination -->
		<?php endif; ?>
		<?php endif; ?>
</main><!-- /l-primary -->

<?php get_sidebar(); ?>

</div><!-- /l-inner -->
</div><!-- /l-content -->


<?php get_footer(); ?>
