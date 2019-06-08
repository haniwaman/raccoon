<?php
/**
 * Main Visual Slider
 *
 * @package WordPress
 */

?>

<!-- mv-slide -->
<div id="mv" class="mv-slide">

<?php
$mv_query = new WP_Query(
	array(
		'post_type' => 'page',
		'name'      => 'front-page',
	)
);
?>
<?php if ( $mv_query->have_posts() ) : ?>
	<?php while ( $mv_query->have_posts() ) : ?>
		<?php $mv_query->the_post(); ?>
		<?php $mv_is_slide = false; ?>

<!-- swiper-container -->
<div class="swiper-container">
	<div class="swiper-wrapper">
		<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
			<?php if ( get_field( 'img' . $i ) ) : ?>
		<a href="" class="swiper-slide"><img src="<?php echo esc_url( wp_get_attachment_image_src( get_field( 'img' . $i ), 'large' )[0] ); ?>" alt="<?php get_post_meta( get_field( 'img' . $i ), '_wp_attachment_image_alt', true ); ?>"></a><!-- /swiper-slide -->
				<?php $mv_is_slide = true; ?>
		<?php endif; ?>
		<?php endfor; ?>
	</div><!-- /swiper-wrapper -->
	<div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>
</div><!-- /swiper-container -->

<?php endwhile; ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>

</div><!-- /mv-slide -->
