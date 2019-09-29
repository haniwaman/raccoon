<?php
/**
 * Single Content
 */

?>

<!-- p-entry -->
<article <?php post_class( array( 'p-entry' ) ); ?>>

	<div class="e-header">
		<div class="p-entry-header">
			<div class="e-breadcrumb"><?php raccoon_breadcrumb(); ?></div><!-- /e-breadcrumb -->
			<h1 class="e-title"><?php the_title(); ?></h1><!-- /e-title -->
			<div class="e-meta">
				<div class="e-label"><?php raccoon_the_post_category(); ?></div><!-- /e-label -->
				<time class="e-published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
				<?php if ( get_the_modified_time( 'Y.m.d' ) !== get_the_time( 'Y.m.d' ) ) : ?>
				<time class="e-update" datetime="<?php the_modified_time( 'c' ); ?>"><?php the_modified_time( get_option( 'date_format' ) ); ?></time>
				<?php endif; ?>
			</div><!-- /e-meta -->
			<?php if ( 'select01' === get_theme_mod( 'raccoon_parts_sns_select_place' ) || 'select03' === get_theme_mod( 'raccoon_parts_sns_select_place' ) ) : ?>
				<div class="e-sns"><?php get_template_part( 'parts/sns' ); ?></div><!-- /e-sns -->
			<?php endif; ?>
			<figure class="e-img">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'raccoon_thumbnail' );
			}
			?>
			</figure><!-- /e-img -->
		</div><!-- /p-entry-header -->
	</div><!-- /e-header -->

	<?php $rc_heading = get_theme_mod( 'raccoon_parts_heading_select' ) ? 'rc-' . get_theme_mod( 'raccoon_parts_heading_select' ) : ''; ?>
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

		<?php raccoon_the_post_tags(); ?>

		<?php if ( 'select02' === get_theme_mod( 'raccoon_parts_sns_select_place' ) || 'select03' === get_theme_mod( 'raccoon_parts_sns_select_place' ) ) : ?>
			<?php get_template_part( 'parts/sns' ); ?>
		<?php endif; ?>

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
	<div class="e-next">
			<a href="<?php the_permalink( $next_post->ID ); ?>" class="e-head"><?php esc_html_e( 'Next Post', 'raccoon' ); ?></a>
			<a href="<?php the_permalink( $next_post->ID ); ?>" class="p-entry-pager-item">
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
					<div class="e-title"><?php echo esc_html( mb_strimwidth( get_the_title( $next_post->ID ), 0, 64, __( '...', 'raccoon' ), 'UTF-8' ) ); ?></div>
				</div><!-- /e-body -->
			</a><!-- /p-entry-pager-item -->
	</div><!-- /e-next -->
			<?php endif; ?>
		<?php if ( $prev_post ) : ?>
	<div class="e-prev">
		<a href="<?php the_permalink( $prev_post->ID ); ?>" class="e-head"><?php esc_html_e( 'Prev Post', 'raccoon' ); ?></a>
		<a href="<?php the_permalink( $prev_post->ID ); ?>" class="p-entry-pager-item">
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
				<div class="e-title"><?php echo esc_html( mb_strimwidth( get_the_title( $prev_post->ID ), 0, 64, __( '...', 'raccoon' ), 'UTF-8' ) ); ?></div>
			</div><!-- /e-body -->
		</a><!-- /p-entry-pager-item -->
	</div><!-- /e-prev -->
			<?php endif; ?>
</nav><!-- /p-entry-pager -->
