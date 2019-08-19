<?php
/**
 * Main Visual
 *
 * @package WordPress
 */

?>

<?php if ( get_header_image() ) : ?>

<div class="c-mainvisual c-mainvisual--low c-mainvisual--mask p-mainvisual">
	<?php if ( get_header_image() ) : ?>
	<img src="<?php echo esc_url( get_header_image() ); ?>" alt="">
<?php endif; ?>

</div><!-- /c-mainvisual -->
<?php endif ?>
