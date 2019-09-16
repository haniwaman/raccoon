<?php
/**
 * 404
 *
 * @package WordPress
 */

get_header(); ?>



<?php get_template_part( 'mv' ); ?>



<!-- l-content -->
<div class="l-content p-content">
<div class="l-inner">
<div class="l-row">

<!-- l-primary -->
<main class="l-primary">

<!-- p-archive-header -->
<div class="p-archive-header">
	<?php my_breadcrumb(); ?>
	<h1 class="e-title">404</h1><!-- /e-title -->
	<div class="e-description"><p><?php esc_html_e( 'Contents is not found.', 'raccoon' ); ?></p></div><!-- /e-description -->
	<div class="e-form"><?php get_search_form(); ?></div><!-- /e-form -->
</div><!-- /p-archive-header -->

<article <?php post_class( 'p-notfound' ); ?>>

	<div class="e-body">
		<p><?php esc_html_e( 'Sorry. Contents is not found.', 'raccoon' ); ?></p>
	</div><!-- /e-body -->
	<div class="e-link"><a class="c-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'raccoon' ); ?></a></div>

</article><!-- /p-entry -->

</main><!-- /l-primary -->


<?php get_sidebar(); ?>

</div><!-- /l-row -->
</div><!-- /l-inner -->
</div><!-- /l-content -->



<?php get_footer(); ?>
