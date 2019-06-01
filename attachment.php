<?php
/**
 * Attachment
 *
 * @package WordPress
 */

get_header(); ?>

<?php my_breadcrumb(); ?>

<!-- content -->
<div id="content">
<div class="inner">

<!-- primary -->
<main id="primary">

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

<!-- entry -->
<article <?php post_class( array( 'entry' ) ); ?>>

	<!-- entry-header -->
	<div class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->

		<!-- entry-meta -->
		<div class="entry-meta">
		<div class="entry-label"><span><?php echo esc_html( get_post_mime_type( get_the_ID() ) ); ?></span></div><!-- /entry-item-label -->
			<time class="entry-published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
		</div><!-- /entry-meta -->

		<figure class="entry-img">
		<?php if ( wp_attachment_is_image( get_the_ID() ) ) : ?>
			<img src="<?php echo esc_url( wp_get_attachment_image_src( get_the_ID(), 'my_thumbnail' )[0] ); ?>" alt="<?php echo esc_attr( get_post_meta( get_the_ID(), '_wp_attachment_image_alt', true ) ); ?>">
		<?php elseif ( false !== strpos( get_post_mime_type( get_the_ID() ), 'video' ) ) : ?>
			<video src="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>" controls></video>
		<?php elseif ( false !== strpos( get_post_mime_type( get_the_ID() ), 'audio' ) ) : ?>
			<audio src="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>" controls></audio>
		<?php else : ?>
			<div class="attachment-btn">
				<a class="btn" href="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>" rel="noopener" target="_blank">この添付のURL</a>
			</div><!-- /attachment-btn -->
		<?php endif; ?>
			<figcaption class="entry-img-caption"><?php the_excerpt(); ?></figcaption>
		</figure><!-- /entry-img -->
	</div><!-- /entry-header -->

	<!-- entry-body -->
	<div class="entry-body">
		<?php the_content(); ?>
	</div><!-- /entry-body -->

</article><!-- /entry -->

	<?php endwhile; ?>
<?php endif; ?>

</main><!-- /primary -->

<?php get_sidebar(); ?>


</div><!-- /inner -->
</div><!-- /content -->

<?php get_footer(); ?>
