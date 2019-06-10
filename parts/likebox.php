<?php
/**
 * Facebook Like Box
 *
 * @package WordPress
 */

$facebook_url      = 'https://developers.facebook.com/docs/plugins/';
$post_thumbnail_id = get_post_thumbnail_id();
?>

<!-- likebox -->
<div class="likebox">
	<div class="likebox-img" style="background-image:url(<?php echo esc_url( wp_get_attachment_image_src( $post_thumbnail_id, 'my_thumbnail' )[0] ); ?>);">
	a
	</div><!-- /likebox-img -->

	<div class="likebox-body">
		<p class="likebox-lead">このページが役に立ったら<br>いいね！お願いします</p>
		<div class="likebox-btn">
			<div class="fb-like" data-href="<?php echo esc_url( $facebook_url ); ?>" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
		</div><!-- /likebox-btn -->
		<p class="likebox-content">運営の励みになります...。</p>
	</div><!-- /likebox-body -->
</div><!-- /likebox -->
