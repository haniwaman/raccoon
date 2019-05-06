<?php
/**
 * 404
 *
 * @package WordPress
 */

get_header(); ?>


<!-- content -->
<div id="content">
<div class="inner">

<!-- primary -->
<main id="primary">

<!-- entry -->
<article <?php post_class( array( 'entry' ) ); ?>>

	<p>コンテンツが存在しません。</p>

</article><!-- /entry -->

</main><!-- /primary -->


<?php get_sidebar(); ?>


</div><!-- /inner -->
</div><!-- /content -->


<?php get_footer(); ?>
