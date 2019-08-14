<?php
/**
 * SNS Buttons
 *
 * @package WordPress
 */

?>

<?php if ( 'select1' === get_theme_mod( 'my_parts_sns_select_type' ) ) : ?>

<!-- sns-buttons -->
<nav class="sns-buttons">
	<ul>
	<?php if ( get_theme_mod( 'my_parts_sns_check_twitter' ) ) : ?>
		<li><a class="m-twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" rel="nofollow" target="_blank"><i class="fab fa-twitter"></i><?php esc_html_e( 'ツイート', 'raccoon' ); ?></a></li>
<?php endif; ?>
	<?php if ( get_theme_mod( 'my_parts_sns_check_facebook' ) ) : ?>
		<li><a class="m-facebook" href="https://www.facebook.com/share.php?u=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><i class="fab fa-facebook-f"></i><?php esc_html_e( 'シェア', 'raccoon' ); ?></a></li>
		<?php endif; ?>
	<?php if ( get_theme_mod( 'my_parts_sns_check_hatena' ) ) : ?>
		<li><a class="m-hatena" href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" rel="nofollow" target="_blank"><i>B!</i><?php esc_html_e( 'はてブ', 'raccoon' ); ?></a></li>
		<?php endif; ?>
	<?php if ( get_theme_mod( 'my_parts_sns_check_line' ) ) : ?>
		<li><a class="m-line" href="https://social-plugins.line.me/lineit/share?url=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><i class="fab fa-line"></i>LINE</a></li>
		<?php endif; ?>
	<?php if ( get_theme_mod( 'my_parts_sns_check_pocket' ) ) : ?>
		<li><a class="m-pocket" href="https://getpocket.com/edit?url=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><i class="fab fa-get-pocket"></i><?php esc_html_e( 'ポケット', 'raccoon' ); ?></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'my_parts_sns_check_rss' ) ) : ?>
		<li><a class="m-rss" href="<?php bloginfo( 'rss2_url' ); ?>" rel="nofollow" target="_blank"><i class="fas fa-rss-square"></i><?php esc_html_e( 'RSS', 'raccoon' ); ?></a></li>
		<?php endif; ?>
	</ul>
</nav><!-- /sns-buttons -->

<?php elseif ( 'select2' === get_theme_mod( 'my_parts_sns_select_type' ) ) : ?>

<!-- sns-buttons-org -->
<nav class="sns-buttons-org">
	<ul>
	<?php if ( get_theme_mod( 'my_parts_sns_check_twitter' ) ) : ?>
		<li><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-lang="ja" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></li>
<?php endif; ?>
	<?php if ( get_theme_mod( 'my_parts_sns_check_facebook' ) ) : ?>
		<li><div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( get_permalink() ); ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">シェア</a></div></li>
<?php endif; ?>
	<?php if ( get_theme_mod( 'my_parts_sns_check_hatena' ) ) : ?>
		<li><a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="basic-label-counter" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20"></a><script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script></li>
<?php endif; ?>
	<?php if ( get_theme_mod( 'my_parts_sns_check_line' ) ) : ?>
		<li><div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="2" data-url="<?php the_permalink(); ?>"></div><script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script></li>
<?php endif; ?>
	<?php if ( get_theme_mod( 'my_parts_sns_check_pocket' ) ) : ?>
		<li><a data-pocket-label="pocket" data-pocket-count="none" class="pocket-btn" data-lang="en"></a><script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script></li>
<?php endif; ?>
<?php if ( get_theme_mod( 'my_parts_sns_check_rss' ) ) : ?>
		<li><a href='<?php bloginfo( 'rss2_url' ); ?>' target='blank'><img src='' alt=''></a></li>
<?php endif; ?>
	</ul>
</nav><!-- /sns-buttons-org -->

<?php endif; ?>
