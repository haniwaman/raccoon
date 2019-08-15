<?php
/**
 * Index
 *
 * @package WordPress
 */

get_header(); ?>



<?php get_template_part( 'mv' ); ?>



<!-- l-content -->
<div id="l-content">
<div class="l-inner">
<div class="l-row">

<!-- l-primary -->
<main id="l-primary">

	<?php
	if ( have_posts() ) :
		?>
	<!-- p-archive-header -->
	<div class="p-archive-header">
		<?php my_breadcrumb(); ?>
		<h1 class="archive-title"><?php the_archive_title(); ?></h1><!-- /archive-title -->
		<div class="archive-description"><?php the_archive_description(); ?></div><!-- /archive-description -->
		<?php get_search_form(); ?>
	</div><!-- /p-archive-header -->

	<!-- p-entry-items -->
	<?php if ( 'horizon' === get_theme_mod( 'my_layout_archive_check' ) ) : ?>
	<div class="p-entry-items m-square">
	<?php elseif ( 'vertical' === get_theme_mod( 'my_layout_archive_check' ) ) : ?>
	<div class="p-entry-items">
	<?php else: ?>
	<div class="p-entry-items m-square">
	<?php endif; ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>

	<!-- p-entry-item -->
	<div <?php post_class( array( 'p-entry-item' ) ); ?>>

		<!-- e-img -->
		<div class="e-img">
			<a href="<?php the_permalink(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'my_thumbnail' );
				} else {
					echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/noimg.png" alt="">';
				}
				?>
			</a>
		</div><!-- /e-img -->

		<!-- e-body -->
		<div class="e-body">
			<div class="e-meta">
				<div class="e-label"><?php my_the_post_category(); ?></div><!-- /e-label -->
				<time class="e-published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time><!-- /e-published -->
			</div><!-- /e-meta -->
			<h2 class="e-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><!-- /e-title -->
			<div class="e-excerpt"><?php the_excerpt(); ?></div><!-- /e-excerpt -->
			<div class="e-auther">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 30 ); ?>
				<?php the_author_meta( 'display_name' ); ?>
			</a>
			</div><!-- /e-auther -->
		</div><!-- /e-body -->

	</div><!-- /p-entry-item -->
			<?php
		endwhile;
		?>
		</div><!-- /p-entry-items -->

		<?php if ( paginate_links() ) : ?>
		<!-- p-pagenation -->
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
		<?php
		endif;
	?>
</main><!-- /l-primary -->

<?php get_sidebar(); ?>

</div><!-- /l-row -->
</div><!-- /l-inner -->
</div><!-- /l-content -->



<?php get_footer(); ?>
