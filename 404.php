<?php
/**
 * 404
 *
 * @package WordPress
 */

get_header(); ?>


<!-- mv -->
<div id="mv">
<div class="inner">
</div><!-- /inner -->
</div><!-- /mv -->


<?php my_breadcrumb(); ?>


<!-- content -->
<div id="content">
<div class="inner">

<!-- primary -->
<main id="primary">

<!-- archive-header -->
<div class="archive-header">
	<h1 class="archive-title">404</h1><!-- /archive-title -->
	<div class="archive-description"><p>コンテンツが存在しません。</p></div><!-- /archive-description -->
	<?php get_search_form(); ?>
</div><!-- /archive-header -->

<!-- entry -->
<article <?php post_class( array( 'entry' ) ); ?>>

<p>何か代替となるコンテンツを配置する</p>

</article><!-- /entry -->

</main><!-- /primary -->


<?php get_sidebar(); ?>


</div><!-- /inner -->
</div><!-- /content -->


<?php get_footer(); ?>
