<?php
/**
 * Archive Content
 *
 * @package WordPress
 */

?>

<!-- p-entry-item -->
<div <?php post_class( array( 'p-entry-item' ) ); ?>>

	<!-- e-img -->
	<div class="e-img">
		<div class="e-cover">
			<a href="<?php the_permalink(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'my_thumbnail' );
				} else {
					echo '<img src="' . esc_url( get_template_directory_uri() ) . '/src/img/noimg.png" alt="">';
				}
				?>
			</a>
		</div><!-- /e-cover -->
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
