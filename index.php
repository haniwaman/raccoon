<?php
/**
 * Index
 *
 * @package WordPress
 */

get_header(); ?>


<?php get_template_part( 'mv/mv-image' ); ?>

<?php my_breadcrumb(); ?>

<!-- content -->
<div id="content">
<div class="inner">

<!-- primary -->
<main id="primary">

	<?php
	if ( have_posts() ) :
		?>
	<!-- archive-header -->
	<div class="archive-header">
		<h1 class="archive-title"><?php the_archive_title(); ?></h1><!-- /archive-title -->
		<div class="archive-description"><?php the_archive_description(); ?></div><!-- /archive-description -->
		<?php get_search_form(); ?>
	</div><!-- /archive-header -->

	<!-- entries -->
	<div class="entries entries-square">
		<?php
		while ( have_posts() ) :
			the_post();
			?>

	<!-- entry-item -->
	<div <?php post_class( array( 'entry-item' ) ); ?>>

		<!-- entry-item-img -->
		<div class="entry-item-img">
			<a href="<?php the_permalink(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'my_thumbnail' );
				} else {
					echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/noimg.png" alt="">';
				}
				?>
			</a>
		</div><!-- /entry-item-img -->

		<!-- entry-item-body -->
		<div class="entry-item-body">
			<div class="entry-item-meta">
				<div class="entry-item-label"><?php my_the_post_category(); ?></div><!-- /entry-item-label -->
				<time class="entry-item-published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time><!-- /entry-item-published -->
			</div><!-- /entry-item-meta -->
			<h2 class="entry-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><!-- /entry-item-title -->
			<div class="entry-item-excerpt"><?php the_excerpt(); ?></div><!-- /entry-item-excerpt -->
			<div class="entry-item-auther">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 30 ); ?>
				<?php the_author_meta( 'display_name' ); ?>
			</a>
			</div><!-- /entry-item-auther -->
		</div><!-- /entry-item-body -->

	</div><!-- /entry-item -->
			<?php
		endwhile;
		?>
		</div><!-- /entries -->
		<?php if ( paginate_links() ) : ?>
		<!-- pagenation -->
		<div class="pagenation">
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
		</div><!-- /pagenation -->
		<?php endif; ?>
		<?php
		endif;
	?>
</main><!-- /primary -->

<?php get_sidebar(); ?>

</div><!-- /inner -->
</div><!-- /content -->



<?php get_footer(); ?>
