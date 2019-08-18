<?php
/**
 * Page Content
 *
 * @package WordPress
 */

?>

<!-- p-entry -->
<article <?php post_class( array( 'p-entry' ) ); ?>>

	<!-- e-header -->
	<div class="e-header">
		<div class="p-entry-header">
		<div class="e-breadcrumb"><?php my_breadcrumb(); ?></div><!-- /e-breadcrumb -->
			<h1 class="e-title"><?php the_title(); ?></h1><!-- /e-title -->
			<div class="e-meta">
				<div class="e-label"><?php my_the_post_category(); ?></div><!-- /e-label -->
				<time class="e-published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time><!-- /e-published -->
			</div><!-- /e-meta -->
			<?php if ( 'select01' === get_theme_mod( 'my_parts_sns_select_place' ) || 'select03' === get_theme_mod( 'my_parts_sns_select_place' ) ) : ?>
				<div class="e-sns"><?php get_template_part( 'parts/sns' ); ?></div><!-- /e-sns -->
			<?php endif; ?>
			<figure class="e-img">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'my_thumbnail' );
			}
			?>
			</figure><!-- /e-img -->
		</div><!-- /p-entry-header -->
	</div><!-- /e-header -->

	<?php $rc_heading = get_theme_mod( 'my_parts_heading_select' ) ? 'rc-' . get_theme_mod( 'my_parts_heading_select' ) : ''; ?>
	<!-- e-body -->
	<div class="e-body">
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
	</div><!-- /e-body -->

</article><!-- /p-entry -->
