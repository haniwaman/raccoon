<?php
/**
 * Relation
 */

?>

<?php if ( 'post' === get_post_type() ) : ?>
<!-- p-relation -->
<div class="p-relation">
	<div class="p-relation__head"><?php esc_html_e( 'Relation Posts', 'raccoon' ); ?></div><!-- /e-head -->

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
<div class="p-relation__items">
<!-- p-relation-items -->
<div class="p-relation-items">
		<?php while ( $raccoon_relation_query->have_posts() ) : ?>
			<?php $raccoon_relation_query->the_post(); ?>

<div <?php post_class( array( 'p-relation-item' ) ); ?>>

<!-- p-relation-item__img -->
<div class="p-relation-item__img">
	<div class="p-relation-item__img-cover">
		<a href="<?php the_permalink(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'raccoon_thumbnail' );
				} else {
					echo '<img src="' . esc_url( get_template_directory_uri() ) . '/src/img/noimg.png" alt="">';
				}
				?>
		</a>
	</div><!-- /p-relation-item__img-cover -->
</div><!-- /p-relation-item__img -->

<!-- p-relation-item__body -->
<div class="p-relation-item__body">
	<div class="p-relation-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!-- /p-relation-item__title -->
</div><!-- /p-relation-item__body -->

</div><!-- /p-relation-item__item -->

	<?php endwhile; ?>
</div><!-- /p-relation-items -->
</div><!-- /e-items -->
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

<div class="p-relation__btn">
	<a class="c-button" href="<?php echo esc_url( get_category_link( get_the_category()[0]->cat_ID ) ); ?>"><?php esc_html_e( 'More Relation Posts', 'raccoon' ); ?></a>
</div><!-- /p-relation__btn -->

</div><!-- /p-relation -->
<?php endif; ?>
