<?php
/**
 * SNS Original Buttons
 *
 * @package WordPress
 */

?>

<!-- sns-buttons-org -->
<nav class="sns-buttons-org">
	<ul>
		<li><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-via="haniwa008" data-lang="ja" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></li>
		<li><div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( get_permalink() ); ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">シェア</a></div></li>
		<li><a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="basic-label-counter" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20"></a><script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script></li>
		<li><div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="2" data-url="<?php the_permalink(); ?>"></div><script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script></li>
		<li><a data-pocket-label="pocket" data-pocket-count="none" class="pocket-btn" data-lang="en"></a><script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script></li>
	</ul>
</nav><!-- /sns-buttons-org -->
