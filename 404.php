<?php
/**
 * 404
 */

get_header(); ?>

<?php get_template_part( 'template/mainvisual/page' ); ?>

<!-- l-content -->
<div class="l-content p-content">
<div class="l-inner l-content__inner">

<!-- l-primary -->
<main id="a-main" class="l-primary">

<!-- p-archive-header -->
<div class="p-archive-header">
	<?php raccoon_breadcrumb(); ?>
	<h1 class="p-archive-header__title">404</h1><!-- /p-archive-header__title -->
	<div class="p-archive-header__description"><p><?php esc_html_e( 'Contents is not found.', 'raccoon' ); ?></p></div><!-- /p-archive-header__description -->
	<div class="p-archive-header__form"><?php get_search_form(); ?></div><!-- /p-archive-header__form -->
</div><!-- /p-archive-header -->

<article <?php post_class( 'p-notfound' ); ?>>

	<div class="p-notfound__body">
		<p><?php esc_html_e( 'Sorry. Contents is not found.', 'raccoon' ); ?></p>
	</div><!-- /.p-notfound__body -->
	<div class="p-notfound__link"><a class="c-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'raccoon' ); ?></a></div>

</article><!-- /p-entry -->

</main><!-- /l-primary -->


<?php get_sidebar(); ?>

</div><!-- /l-inner -->
</div><!-- /l-content -->



<?php get_footer(); ?>
