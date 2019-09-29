<?php
/**
 * Page
 */

get_header(); ?>



<?php get_template_part( 'template/mainvisual/page' ); ?>



<!-- l-content -->
<div class="l-content p-content">
<div class="l-inner">
<div class="l-row">

<!-- l-primary -->
<main id="a-main" class="l-primary">

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

		<?php get_template_part( 'template/content/page' ); ?>

		<?php
endwhile;
endif;
?>

</main><!-- /l-primary -->


<?php get_sidebar(); ?>


</div><!-- /l-row -->
</div><!-- /l-inner -->
</div><!-- /l-content -->


<?php get_footer(); ?>
