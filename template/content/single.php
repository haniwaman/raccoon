<?php
/**
 * Single Content
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
			<?php if ( get_the_modified_time( 'Y.m.d' ) !== get_the_time( 'Y.m.d' ) ) : ?>
			<time class="e-update" datetime="<?php the_modified_time( 'c' ); ?>"><?php the_modified_time( get_option( 'date_format' ) ); ?></time>
			<?php endif; ?>
		</div><!-- /e-meta -->

		<?php if ( 'select1' === get_theme_mod( 'my_parts_sns_select_place' ) || 'select3' === get_theme_mod( 'my_parts_sns_select_place' ) ) : ?>
			<?php get_template_part( 'parts/sns' ); ?>
		<?php endif; ?>

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

		<?php my_the_post_tags(); ?>

		<?php get_template_part( 'parts/likebox' ); ?>

		<?php if ( 'select2' === get_theme_mod( 'my_parts_sns_select_place' ) || 'select3' === get_theme_mod( 'my_parts_sns_select_place' ) ) : ?>
			<?php get_template_part( 'parts/sns' ); ?>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'my_parts_relation_check' ) ) : ?>
			<?php get_template_part( 'parts/relation' ); ?>
		<?php endif; ?>

		<?php comments_template(); ?>

</article><!-- /p-entry -->

		<?php
		$prev_post = get_previous_post();
		$next_post = get_next_post();
		?>
<!-- p-entry-pager -->
<nav class="p-entry-pager">
		<?php if ( $next_post ) : ?>
	<div class="e-next">
		<a href="<?php the_permalink( $next_post->ID ); ?>" class="e-head">次の記事</a>
		<a href="<?php the_permalink( $next_post->ID ); ?>" class="e-item">
			<div class="e-img">
			<?php
			if ( has_post_thumbnail( $next_post->ID ) ) {
				echo get_the_post_thumbnail( $next_post->ID, 'thumbnail' );
			} else {
				echo '<img src="' . esc_url( get_template_directory_uri() ) . '/src/img/no-thumbnail.png">';
			}
			?>
			</div><!-- /e-img -->
			<div class="e-body">
				<div class="e-title"><?php echo esc_html( mb_strimwidth( get_the_title( $next_post->ID ), 0, 64, '…', 'UTF-8' ) ); ?></div>
			</div><!-- /e-body -->
		</a><!-- /e-item -->
	</div><!-- /e-next -->
			<?php endif; ?>
		<?php if ( $prev_post ) : ?>
	<div class="e-prev">
		<a href="<?php the_permalink( $prev_post->ID ); ?>" class="e-head">前の記事</a>
		<a href="<?php the_permalink( $prev_post->ID ); ?>" class="e-item">
			<div class="e-img">
			<?php
			if ( has_post_thumbnail( $prev_post->ID ) ) {
				echo get_the_post_thumbnail( $prev_post->ID, 'thumbnail' );
			} else {
				echo '<img src="' . esc_url( get_template_directory_uri() ) . '/src/img/no-thumbnail.png">';
			}
			?>
			</div><!-- /e-img -->
			<div class="e-body">
				<div class="e-title"><?php echo esc_html( mb_strimwidth( get_the_title( $prev_post->ID ), 0, 64, '…', 'UTF-8' ) ); ?></div>
			</div><!-- /e-body -->
		</a><!-- /e-item -->
	</div><!-- /e-prev -->
			<?php endif; ?>
</nav><!-- /p-entry-pager -->
