<?php
/**
 * 404
 *
 * @package WordPress
 */

get_header(); ?>



<?php get_template_part( 'mv' ); ?>



<!-- content -->
<div id="content">
<div class="inner">

<!-- primary -->
<main id="primary">

<!-- archive-header -->
<div class="archive-header">
	<?php my_breadcrumb(); ?>
	<h1 class="archive-title">404</h1><!-- /archive-title -->
	<div class="archive-description"><p><?php esc_html_e( 'コンテンツが存在しません。', 'raccoon' ); ?></p></div><!-- /archive-description -->
	<?php get_search_form(); ?>
</div><!-- /archive-header -->

<!-- entry -->
<article <?php post_class( array( 'entry' ) ); ?>>

<!-- entry-body -->
<div class="entry-body four04-content">
	<p><?php esc_html_e( '申し訳ございません。コンテンツが存在しません。', 'raccoon' ); ?></p>
</div><!-- /entry-body -->
<div class="four04-link"><a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'トップへ戻る', 'raccoon' ); ?></a></div>

</article><!-- /entry -->

</main><!-- /primary -->


<?php get_sidebar(); ?>


</div><!-- /inner -->
</div><!-- /content -->



<?php get_footer(); ?>
