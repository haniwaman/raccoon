<?php
/**
 * Main Visual
 *
 * @package WordPress
 */

?>

<?php if ( get_header_image() ) : ?>
<!-- mv -->
<div id="mv" class="mv-image">
<?php if ( get_header_image() ) : ?>
	<img src="<?php echo esc_url( get_header_image() ); ?>" alt="">
<?php endif; ?>
</div><!-- /mv -->
<?php endif ?>
