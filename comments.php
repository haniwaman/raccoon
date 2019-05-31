<?php
/**
 * Comment
 *
 * @package WordPress
 */

if ( post_password_required() || ! comments_open() ) {
	return;
}
?>

<!-- comments -->
<div class="comments">
	<?php if ( have_comments() ) : ?>
	<div class="comments-title">コメント（<?php echo esc_html( get_comments_number() ); ?>）</div><!-- /comments-title -->
	<ul class="comments-list">
		<?php
		wp_list_comments(
			array(
				'avatar_size' => '54',
				'type'        => 'all', /* all / comment / trackback / pingback / pings */
			)
		);
		?>
	</ul><!-- /comments-list -->
	<?php endif; ?>

	<?php if ( get_comment_pages_count() > 1 ) : ?>
	<nav class="comments-nav">
		<ul>
			<li class="comments-prev"><?php previous_comments_link( '前のコメント' ); ?></li>
			<li class="comments-next"><?php next_comments_link( '次のコメント' ); ?></li>
		</ul>
	</nav>
	<?php endif; ?>

	<?php comment_form(); ?>
</div><!-- /comments -->
