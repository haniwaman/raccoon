<?php
/**
 * Main Visual Image
 *
 * @package WordPress
 */

?>

<?php if ( get_header_image() ) : ?>
<!-- mv -->
<div id="mv" class="mv-image">
	<img src="<?php echo esc_url( get_header_image() ); ?>" alt="">
</div><!-- /mv -->
<?php endif ?>
