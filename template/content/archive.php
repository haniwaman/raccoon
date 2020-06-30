<?php
/**
 * Archive Content
 */

?>

<!-- p-entry-item -->
<div <?php post_class( array( 'p-entry-item' ) ); ?>>

	<!-- p-entry-item__img -->
	<div class="p-entry-item__img">
		<div class="p-entry-item__img-cover">
			<a href="<?php the_permalink(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'raccoon_thumbnail' );
				} else {
					echo '<img src="' . esc_url( get_template_directory_uri() ) . '/src/img/noimg.png" alt="">';
				}
				?>
			</a>
		</div><!-- /p-entry-item__img-cover -->
	</div><!-- /p-entry-item__img -->

	<!-- p-entry-item__body -->
	<div class="p-entry-item__body">
		<div class="p-entry-item__meta">
			<div class="p-entry-item__label"><?php raccoon_the_post_category(); ?></div><!-- /p-entry-item__label -->
			<time class="p-entry-item__published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time><!-- /p-entry-item__published -->
		</div><!-- /p-entry-item__meta -->
		<h2 class="p-entry-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><!-- /p-entry-item__title -->
		<div class="p-entry-item__excerpt"><?php the_excerpt(); ?></div><!-- /p-entry-item__excerpt -->
		<div class="p-entry-item__author">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 30 ); ?>
				<?php the_author_meta( 'display_name' ); ?>
			</a>
		</div><!-- /p-entry-item__author -->
	</div><!-- /p-entry-item__body -->

</div><!-- /p-entry-item -->
