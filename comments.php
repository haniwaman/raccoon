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

<!-- p-comments -->
<div class="p-comments">
	<?php if ( have_comments() ) : ?>
	<div class="e-title">コメント（<?php echo esc_html( get_comments_number() ); ?>）</div><!-- /e-title -->
	<div class="e-list">
		<ul class="p-comments-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => '54',
					'type'        => 'all', /* all / comment / trackback / pingback / pings */
				)
			);
			?>
		</ul><!-- /p-comments-list -->
	</div><!-- /e-list -->
	<?php endif; ?>

	<?php if ( get_comment_pages_count() > 1 ) : ?>
	<div class="e-nav">
		<nav class="p-comments-nav">
			<ul>
				<li class="e-prev"><?php previous_comments_link( '前のコメント' ); ?></li><!-- /e-prev -->
				<li class="e-next"><?php next_comments_link( '次のコメント' ); ?></li><!-- /e-next -->
			</ul>
		</nav><!-- /p-comments-nav -->
	</div><!-- /e-nav -->
	<?php endif; ?>

	<div class="e-form"><?php comment_form(); ?></div><!-- /e-form -->
</div><!-- /p-comments -->
