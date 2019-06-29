<?php
/**
 * SNS Buttons
 *
 * @package WordPress
 */

?>

<!-- sns-buttons -->
<nav class="sns-buttons">
	<ul>
		<li><a class="m_twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" rel="nofollow" target="_blank"><i class="fab fa-twitter"></i><?php esc_html_e( 'ツイート', 'raccoon' ); ?></a></li>
		<li><a class="m_facebook" href="https://www.facebook.com/share.php?u=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><i class="fab fa-facebook-f"></i><?php esc_html_e( 'シェア', 'raccoon' ); ?></a></li>
		<li><a class="m_hatena" href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" rel="nofollow" target="_blank"><i>B!</i><?php esc_html_e( 'はてブ', 'raccoon' ); ?></a></li>
		<li><a class="m_line" href="https://social-plugins.line.me/lineit/share?url=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><i class="fab fa-line"></i>LINE</a></li>
		<li><a class="m_pocket" href="https://getpocket.com/edit?url=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><i class="fab fa-get-pocket"></i><?php esc_html_e( 'ポケット', 'raccoon' ); ?></a></li>
	</ul>
</nav><!-- /sns-buttons -->
