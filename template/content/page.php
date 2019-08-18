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
		<?php my_breadcrumb(); ?>
		<h1 class="e-title"><?php the_title(); ?></h1><!-- /e-title -->

		<!-- e-meta -->
		<div class="e-meta">
			<div class="e-label"><?php my_the_post_category(); ?></div><!-- /e-label -->
			<time class="e-published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
		</div><!-- /entry-meta -->

		<?php get_template_part( 'parts/sns' ); ?>

		<!-- e-img -->
		<figure class="e-img">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'my_thumbnail' );
		}
		?>
		</figure><!-- /e-img -->
	</div><!-- /e-header -->

	<?php $rc_heading = get_theme_mod( 'my_parts_heading_select' ) ? 'rc-' . get_theme_mod( 'my_parts_heading_select' ) : ''; ?>
	<!-- e-body -->
	<div class="e-body <?php echo esc_attr( $rc_heading ); ?>">
		<?php the_content(); ?>
		<?php
		wp_link_pages(
			array(
				'before'         => '<nav class="entry-links">',
				'after'          => '</nav>',
				'link_before'    => '',
				'link_after'     => '',
				'next_or_number' => 'number',
				'separator'      => '',
			)
		);
		?>
	</div><!-- /e-body -->

</article><!-- /p-entry -->
