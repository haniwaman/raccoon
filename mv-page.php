<?php
/**
 * Main Visual
 *
 * @package WordPress
 */

?>

<?php if ( get_header_image() ) : ?>
<!-- mv -->
<div id="mv" class="mv-page">
<?php if ( get_header_image() ) : ?>
	<img src="<?php echo esc_url( get_header_image() ); ?>" alt="">
<?php endif; ?>

<div class="e-content">
	<h1 class="e-title"><?php the_title(); ?></h1><!-- /e-title -->
	<div class="e-lead"><?php the_excerpt(); ?></div><!-- /e-lead -->
</div><!-- /e-content -->

</div><!-- /mv -->
<?php endif ?>
