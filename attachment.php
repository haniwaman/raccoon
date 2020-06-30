<?php
/**
 * Attachment
 */

get_header(); ?>



<?php get_template_part( 'template/mainvisual/page' ); ?>



<!-- l-content -->
<div class="l-content p-content">
<div class="l-inner l-content__inner">

<!-- l-primary -->
<main id="a-main" class="l-primary">

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

<!-- p-entry -->
<article <?php post_class( array( 'l-entry', 'p-entry' ) ); ?>>

	<!-- l-entry__header -->
	<div class="l-entry__header">
		<div class="p-entry-header">
			<div class="l-breadcrumb"><?php raccoon_breadcrumb(); ?></div><!-- /l-breadcrumb -->
			<h1 class="p-entry-header__title"><?php the_title(); ?></h1><!-- /p-entry-header__title -->
			<div class="p-entry-header__meta">
			<div class="p-entry-header__label"><span><?php echo esc_html( get_post_mime_type( get_the_ID() ) ); ?></span></div><!-- /p-entry-header__label -->
				<time class="p-entry-header__published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
			</div><!-- /p-entry-header__meta -->

			<figure class="p-attachment-img">
			<?php if ( wp_attachment_is_image( get_the_ID() ) ) : ?>
				<?php echo wp_get_attachment_image( get_the_ID(), 'raccoon_thumbnail' ); ?>
			<?php elseif ( false !== strpos( get_post_mime_type( get_the_ID() ), 'video' ) ) : ?>
				<video src="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>" controls></video>
			<?php elseif ( false !== strpos( get_post_mime_type( get_the_ID() ), 'audio' ) ) : ?>
				<audio src="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>" controls></audio>
			<?php else : ?>
				<div class="p-attachment-btn">
					<a class="c-button" href="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>" rel="noopener" target="_blank"><?php esc_html_e( 'URL of this attachment', 'raccoon' ); ?></a>
				</div><!-- /attachment-btn -->
			<?php endif; ?>
				<figcaption class="p-attachment-img__caption"><?php the_excerpt(); ?></figcaption>
			</figure><!-- /p-attachment-img -->
		</div><!-- /p-entry-header -->
	</div><!-- /l-entry__header -->

		<?php $rc_heading = get_theme_mod( 'raccoon_parts_heading_select' ) ? 'rc-' . get_theme_mod( 'raccoon_parts_heading_select' ) : ''; ?>
	<div class="l-entry__body">
		<div class="p-entry-content <?php echo esc_attr( $rc_heading ); ?>">
		<?php the_content(); ?>
		</div><!-- /p-entry-content -->
	</div><!-- /l-entry__body -->

</article><!-- /p-entry -->

	<?php endwhile; ?>
<?php endif; ?>

</main><!-- /l-primary -->

<?php get_sidebar(); ?>


</div><!-- /l-inner -->
</div><!-- /l-content -->



<?php get_footer(); ?>
