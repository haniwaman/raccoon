<?php
/**
 * Main Visual
 *
 * @package WordPress
 */

?>

<?php if ( get_header_image() ) : ?>

<div class="c-mainvisual c-mainvisual--mask">
	<?php if ( get_header_image() ) : ?>
	<img src="<?php echo esc_url( get_header_image() ); ?>" alt="">
<?php endif; ?>
</div><!-- /mainvisual -->

<?php endif ?>
