<?php
/**
 * Relation
 *
 * @package WordPress
 */

?>

<!-- relation -->
<div class="relation">

<div class="relation-head"><span>関連</span>の記事</div><!-- /relation-head -->

<?php
$relation_query = new WP_Query(
	array(
		'post_type'      => 'post',
		'posts_per_page' => 8,
		'cat'            => get_the_category()[0]->cat_ID,
	)
);
?>
<?php if ( $relation_query->have_posts() ) : ?>
<!-- relation-items -->
<div class="relation-items">
	<?php while ( $relation_query->have_posts() ) : ?>
		<?php $relation_query->the_post(); ?>

<div <?php post_class( array( 'relation-item' ) ); ?>>

<!-- relation-iitem-img -->
<div class="relation-iitem-img">
	<a href="<?php the_permalink(); ?>">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'my_thumbnail' );
		} else {
			echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/noimg.png" alt="">';
		}
		?>
	</a>
</div><!-- /relation-item-img -->

<!-- relation-item-body -->
<div class="relation-item-body">
	<div class="relation-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!-- /relation-item-title -->
</div><!-- /relation-item-body -->

</div><!-- /relation-item -->

	<?php endwhile; ?>
</div><!-- /relation-items -->
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<div class="relation-btn">
	<a class="btn" href="<?php echo esc_url( get_category_link( get_the_category()[0]->cat_ID ) ); ?>">同じカテゴリーの一覧を見る</a>
</div><!-- /relation-btn -->

</div><!-- /relation -->
