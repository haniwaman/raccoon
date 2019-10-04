<?php
/**
 * Relation
 */

?>

<?php if ( 'post' === get_post_type() ) : ?>
<!-- p-relation -->
<div class="p-relation">
	<div class="e-head"><?php esc_html_e( 'Relation Posts', 'raccoon' ); ?></div><!-- /e-head -->

	<?php
	$raccoon_relation_query = new WP_Query(
		array(
			'post_type'      => 'post',
			'posts_per_page' => 8,
			'cat'            => get_the_category()[0]->term_id,
			'post__not_in'   => array( get_the_ID() ),
		)
	);
	?>

	<?php if ( $raccoon_relation_query->have_posts() ) : ?>
<div class="e-items">
<!-- p-relation-items -->
<div class="p-relation-items">
		<?php while ( $raccoon_relation_query->have_posts() ) : ?>
			<?php $raccoon_relation_query->the_post(); ?>

<div <?php post_class( array( 'e-item' ) ); ?>>

<!-- e-img -->
<div class="e-img">
	<div class="e-cover">
		<a href="<?php the_permalink(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'raccoon_thumbnail' );
				} else {
					echo '<img src="' . esc_url( get_template_directory_uri() ) . '/src/img/noimg.png" alt="">';
				}
				?>
		</a>
	</div><!-- /e-cover -->
</div><!-- /e-img -->

<!-- e-body -->
<div class="e-body">
	<div class="e-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!-- /e-title -->
</div><!-- /e-body -->

</div><!-- /e-item -->

	<?php endwhile; ?>
</div><!-- /p-relation-items -->
</div><!-- /e-items -->
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

<div class="e-btn">
	<a class="c-button" href="<?php echo esc_url( get_category_link( get_the_category()[0]->cat_ID ) ); ?>"><?php esc_html_e( 'More Relation Posts', 'raccoon' ); ?></a>
</div><!-- /e-btn -->

</div><!-- /p-relation -->
<?php endif; ?>
