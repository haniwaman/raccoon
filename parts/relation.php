<?php
/**
 * Relation
 *
 * @package WordPress
 */

?>

<?php if ( 'post' === get_post_type() ) : ?>
<!-- p-relation -->
<div class="p-relation">
	<div class="e-head"><span>関連</span>の記事</div><!-- /e-head -->

	<?php
	$relation_query = new WP_Query(
		array(
			'post_type'      => 'post',
			'posts_per_page' => 8,
			'cat'            => get_the_category()[0]->term_id,
		)
	);
	?>

	<?php if ( $relation_query->have_posts() ) : ?>
<!-- p-relation-items -->
<div class="p-relation-items">
		<?php while ( $relation_query->have_posts() ) : ?>
			<?php $relation_query->the_post(); ?>

<div <?php post_class( array( 'e-item' ) ); ?>>

<!-- e-img -->
<div class="e-img">
	<a href="<?php the_permalink(); ?>">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'my_thumbnail' );
			} else {
				echo '<img src="' . esc_url( get_template_directory_uri() ) . '/src/img/noimg.png" alt="">';
			}
			?>
	</a>
</div><!-- /e-img -->

<!-- e-body -->
<div class="e-body">
	<div class="e-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!-- /e-title -->
</div><!-- /e-body -->

</div><!-- /e-item -->

	<?php endwhile; ?>
</div><!-- /p-relation-items -->
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

<div class="e-btn">
	<a class="c-btn" href="<?php echo esc_url( get_category_link( get_the_category()[0]->cat_ID ) ); ?>">同じカテゴリーの一覧を見る</a>
</div><!-- /e-btn -->

</div><!-- /p-relation -->
<?php endif; ?>
