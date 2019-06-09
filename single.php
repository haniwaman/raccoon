<?php
/**
 * Single
 *
 * @package WordPress
 */

get_header(); ?>



<?php get_template_part( 'mv/mv', 'image' ); ?>



<!-- content -->
<div id="content">
<div class="inner">

<!-- primary -->
<main id="primary">

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

<!-- entry -->
<article <?php post_class( array( 'entry' ) ); ?>>

	<!-- entry-header -->
	<div class="entry-header">
		<?php my_breadcrumb(); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->

		<!-- entry-meta -->
		<div class="entry-meta">
			<div class="entry-label"><?php my_the_post_category(); ?></div><!-- /entry-item-label -->
			<time class="entry-published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
			<?php if ( get_the_modified_time() !== get_the_time() ) : ?>
			<time class="entry-update" datetime="<?php the_modified_time( 'c' ); ?>"><?php the_modified_time( get_option( 'date_format' ) ); ?></time>
			<?php endif; ?>
		</div><!-- /entry-meta -->

		<?php get_template_part( 'parts/sns' ); ?>

		<!-- entry-img -->
		<figure class="entry-img">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'my_thumbnail' );
		}
		?>
		</figure><!-- /entry-img -->
	</div><!-- /entry-header -->

	<!-- entry-body -->
	<div class="entry-body rc_heading1">
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
	</div><!-- /entry-body -->

		<?php my_the_post_tags(); ?>

		<?php get_template_part( 'parts/likebox' ); ?>
		<?php get_template_part( 'parts/sns' ); ?>
		<?php get_template_part( 'parts/relation' ); ?>

		<?php comments_template(); ?>

</article><!-- /entry -->

		<?php
		$prev_post = get_previous_post();
		$next_post = get_next_post();
		?>
<!-- entry-pager -->
<nav class="entry-pager">
		<?php if ( $next_post ) : ?>
	<div class="entry-next">
		<a href="<?php the_permalink( $next_post->ID ); ?>" class="entry-pager-head">次の記事</a>
		<a href="<?php the_permalink( $next_post->ID ); ?>" class="entry-pager-item">
			<div class="entry-pager-img">
			<?php
			if ( has_post_thumbnail( $next_post->ID ) ) {
				echo get_the_post_thumbnail( $next_post->ID, 'thumbnail' );
			} else {
				echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/no-thumbnail.png">';
			}
			?>
			</div><!-- /entry-pager-img -->
			<div class="entry-pager-body">
				<div class="entry-pager-title"><?php echo esc_html( mb_strimwidth( get_the_title( $next_post->ID ), 0, 64, '…', 'UTF-8' ) ); ?></div>
			</div><!-- /entry-pager-body -->
		</a><!-- /entry-pager-item -->
	</div><!-- /entry-next -->
			<?php endif; ?>
		<?php if ( $prev_post ) : ?>
	<div class="entry-prev">
		<a href="<?php the_permalink( $prev_post->ID ); ?>" class="entry-pager-head">前の記事</a>
		<a href="<?php the_permalink( $prev_post->ID ); ?>" class="entry-pager-item">
			<div class="entry-pager-img">
			<?php
			if ( has_post_thumbnail( $prev_post->ID ) ) {
				echo get_the_post_thumbnail( $prev_post->ID, 'thumbnail' );
			} else {
				echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/no-thumbnail.png">';
			}
			?>
			</div><!-- /entry-pager-img -->
			<div class="entry-pager-body">
				<div class="entry-pager-title"><?php echo esc_html( mb_strimwidth( get_the_title( $prev_post->ID ), 0, 64, '…', 'UTF-8' ) ); ?></div>
			</div><!-- /entry-pager-body -->
		</a><!-- /entry-pager-item -->
	</div><!-- /entry-prev -->
			<?php endif; ?>
</nav><!-- /entry-pager -->

		<?php
endwhile;
endif;
?>

</main><!-- /primary -->


<?php get_sidebar(); ?>


</div><!-- /inner -->
</div><!-- /content -->


<?php get_footer(); ?>
