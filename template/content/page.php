<?php
/**
 * Page Content
 */

?>

<!-- p-entry -->
<article <?php post_class( array( 'l-entry', 'p-entry' ) ); ?>>

	<!-- l-entry__header -->
	<div class="l-entry__header">
		<div class="p-entry-header">
		<div class="l-breadcrumb"><?php raccoon_breadcrumb(); ?></div><!-- /l-breadcrumb -->
			<h1 class="p-entry-header__title"><?php the_title(); ?></h1><!-- /p-entry-header__title -->
			<figure class="p-entry-header__img">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'raccoon_thumbnail' );
			}
			?>
			</figure><!-- /p-entry-header__img -->
		</div><!-- /p-entry-header -->
	</div><!-- /l-entry__header -->

	<?php $rc_heading = get_theme_mod( 'raccoon_parts_heading_select' ) ? 'rc-' . get_theme_mod( 'raccoon_parts_heading_select' ) : ''; ?>
	<!-- l-entry__body -->
	<div class="l-entry__body">
		<div class="p-entry-content <?php echo esc_attr( $rc_heading ); ?>">
		<?php the_content(); ?>
		<?php
		wp_link_pages(
			array(
				'before'         => '<nav class="p-entry-links">',
				'after'          => '</nav>',
				'link_before'    => '',
				'link_after'     => '',
				'next_or_number' => 'number',
				'separator'      => '',
			)
		);
		?>
		</div><!-- /p-entry-content -->
	</div><!-- /l-entry__body -->

	<?php comments_template(); ?>

</article><!-- /p-entry -->
