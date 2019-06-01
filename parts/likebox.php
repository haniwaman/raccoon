<?php
/**
 * Facebook Like Box
 *
 * @package WordPress
 */

$facebook_url      = 'https://www.facebook.com/haniwaman/';
$post_thumbnail_id = get_post_thumbnail_id();
?>

<!-- likebox -->
<div class="likebox">
	<div class="likebox-img">
		<?php
		if ( $post_thumbnail_id ) {
			echo wp_get_attachment_image( $post_thumbnail_id, 'my_thumbnail' );
		} else {
			echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/noimg.png" alt="">';
		}
		?>
	</div><!-- /likebox-img -->

	<div class="likebox-body">
		<p class="likebox-lead">このページが役に立ったら<br>いいね！お願いします</p>
		<div class="likebox-btn">
			<div class="fb-like" data-href="<?php echo esc_url( $facebook_url ); ?>" data-width="" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
		</div><!-- /likebox-btn -->
		<p class="likebox-content">運営の励みになります...。</p>
	</div><!-- /likebox-body -->
</div><!-- /likebox -->
