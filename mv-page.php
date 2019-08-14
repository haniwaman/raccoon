<?php
/**
 * Main Visual
 *
 * @package WordPress
 */

?>

<?php if ( get_header_image() ) : ?>

<!-- c-mainvisual -->
<div class="c-mainvisual c-mainvisual--mask">
<?php if ( get_header_image() ) : ?>
	<img src="<?php echo esc_url( get_header_image() ); ?>" alt="">
<?php endif; ?>

<div class="c-mainvisual__content">
	<h1 class="c-mainvisual__title"><?php the_title(); ?></h1><!-- /c-mainvisual__title -->
	<div class="c-mainvisual__lead"><?php the_excerpt(); ?></div><!-- /c-mainvisual__lead -->
</div><!-- /c-mainvisual__content -->

</div><!-- /c-mainvisual -->
<?php endif ?>
