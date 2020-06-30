<?php
/**
 * Single Content
 */

?>

<!-- p-entry -->
<article <?php post_class( array( 'l-entry', 'p-entry' ) ); ?>>

	<div class="l-entry__header">
		<div class="p-entry-header">
			<div class="l-breadcrumb"><?php raccoon_breadcrumb(); ?></div><!-- /l-breadcrumb -->
			<h1 class="p-entry-header__title"><?php the_title(); ?></h1><!-- /p-entry-header__title -->
			<div class="p-entry-header__meta">
				<div class="p-entry-header__label"><?php raccoon_the_post_category(); ?></div><!-- /p-entry-header__label -->
				<time class="p-entry-header__published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
			</div><!-- /p-entry-header__meta -->
			<?php
			$raccoon_meta_bottom_content = '';
			apply_filters( 'raccoon_single_meta_bottom', $raccoon_meta_bottom_content );
			?>
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

		<?php raccoon_the_post_tags(); ?>

		<?php
		$raccoon_tags_bottom_content = '';
		apply_filters( 'raccoon_single_tags_bottom', $raccoon_tags_bottom_content );
		?>

		<?php if ( get_theme_mod( 'raccoon_parts_relation_check' ) ) : ?>
			<?php get_template_part( 'parts/relation' ); ?>
		<?php endif; ?>

		<?php comments_template(); ?>

</article><!-- /p-entry -->

		<?php
		$prev_post = get_previous_post();
		$next_post = get_next_post();
		?>
<nav class="p-entry-pager">
		<?php if ( $next_post ) : ?>
	<div class="p-entry-pager__next">
			<a href="<?php the_permalink( $next_post->ID ); ?>" class="p-entry-pager__head"><?php esc_html_e( 'Next Post', 'raccoon' ); ?></a>
			<a href="<?php the_permalink( $next_post->ID ); ?>" class="p-entry-pager-item p-entry-pager-item--left">
				<div class="p-entry-pager-item__img">
				<?php
				if ( has_post_thumbnail( $next_post->ID ) ) {
					echo get_the_post_thumbnail( $next_post->ID, 'thumbnail' );
				} else {
					echo '<img src="' . esc_url( get_template_directory_uri() ) . '/src/img/no-thumbnail.png">';
				}
				?>
				</div><!-- /p-entry-pager-item__img -->
				<div class="p-entry-pager-item__body">
					<div class="p-entry-pager-item__title"><?php echo esc_html( mb_strimwidth( get_the_title( $next_post->ID ), 0, 64, '&hellip;', 'UTF-8' ) ); ?></div>
				</div><!-- /p-entry-pager-item__body -->
			</a><!-- /p-entry-pager-item -->
	</div><!-- /p-entry-pager__next -->
			<?php endif; ?>
		<?php if ( $prev_post ) : ?>
	<div class="p-entry-pager__prev">
		<a href="<?php the_permalink( $prev_post->ID ); ?>" class="p-entry-pager__head"><?php esc_html_e( 'Prev Post', 'raccoon' ); ?></a>
		<a href="<?php the_permalink( $prev_post->ID ); ?>" class="p-entry-pager-item p-entry-pager-item--right">
			<div class="p-entry-pager-item__img">
			<?php
			if ( has_post_thumbnail( $prev_post->ID ) ) {
				echo get_the_post_thumbnail( $prev_post->ID, 'thumbnail' );
			} else {
				echo '<img src="' . esc_url( get_template_directory_uri() ) . '/src/img/no-thumbnail.png">';
			}
			?>
			</div><!-- /p-entry-pager-item__img -->
			<div class="p-entry-pager-item__body">
				<div class="p-entry-pager-item__title"><?php echo esc_html( mb_strimwidth( get_the_title( $prev_post->ID ), 0, 64, '&hellip;', 'UTF-8' ) ); ?></div>
			</div><!-- /p-entry-pager-item__body -->
		</a><!-- /p-entry-pager-item -->
	</div><!-- /p-entry-pager__prev -->
			<?php endif; ?>
</nav><!-- /p-entry-pager -->
