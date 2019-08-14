<?php
/**
 * Page
 *
 * @package WordPress
 */

get_header(); ?>



<?php get_template_part( 'mv', 'page' ); ?>



<!-- l-content -->
<div id="l-content">
<div class="l-inner">
<div class="l-row">

<!-- l-primary -->
<main id="l-primary">

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
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

	<!-- e-body -->
	<div class="e-body rc_heading01">
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

		<?php
endwhile;
endif;
?>

</main><!-- /l-primary -->


<?php get_sidebar(); ?>


</div><!-- /l-row -->
</div><!-- /l-inner -->
</div><!-- /l-content -->


<?php get_footer(); ?>
