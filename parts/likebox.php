<?php
/**
 * Facebook Like Box
 *
 * @package WordPress
 */

$post_thumbnail_id = get_post_thumbnail_id();
$facebook_url      = 'https://developers.facebook.com/docs/plugins/';
if ( get_theme_mod( 'my_parts_likebox_url' ) ) {
	$facebook_url = get_theme_mod( 'my_parts_likebox_url' );
}
$facebook_txt = 'このページが役に立ったら<br>いいね！お願いします';
if ( get_theme_mod( 'my_parts_likebox_txt' ) ) {
	$facebook_txt = nl2br( get_theme_mod( 'my_parts_likebox_txt' ) );
}
$facebook_check = get_theme_mod( 'my_parts_likebox_check' );
?>

<?php if ( $facebook_check ) : ?>
<!-- likebox -->
<div class="likebox">
	<div class="likebox-img" style="background-image:url(<?php echo esc_url( wp_get_attachment_image_src( $post_thumbnail_id, 'my_thumbnail' )[0] ); ?>);"></div><!-- /likebox-img -->
	<div class="likebox-body">
		<p class="likebox-lead"><?php echo wp_kses_post( $facebook_txt ); ?></p>
		<div class="likebox-btn">
			<div class="fb-like" data-href="<?php echo esc_url( $facebook_url ); ?>" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
		</div><!-- /likebox-btn -->
	</div><!-- /likebox-body -->
</div><!-- /likebox -->
<?php endif; ?>
