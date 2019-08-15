<?php
/**
 * Export Customize CSS
 *
 * @package WordPress
 */


echo '<style>';

/* First View */
load_template( get_template_directory() . '/src/css/header.css' );

/* サイトの背景色 */
if ( get_theme_mod( 'my_colors_site_background' ) ) {
	echo 'body{background-color:' . esc_attr( get_theme_mod( 'my_colors_site_background' ) ) . ';}';
}

/* サイトの文字色 */
if ( get_theme_mod( 'my_colors_site_text' ) ) {
	echo esc_attr( '#content{color:' . get_theme_mod( 'my_colors_site_text' ) . ';}' );
}

/* ヘッダー背景色 */
if ( get_theme_mod( 'my_colors_header_background' ) ) {
	echo esc_attr( '#header{background:' . get_theme_mod( 'my_colors_header_background' ) . ';}' );
}

/* ヘッダーテキスト色 */
if ( get_theme_mod( 'my_colors_header_text' ) ) {
	echo esc_attr( '.p-header-nav li > a{color:' . get_theme_mod( 'my_colors_header_text' ) . ';}' );
}

/* ヘッダーロゴ色 */
if ( get_theme_mod( 'my_colors_header_logo' ) ) {
	echo esc_attr( '.p-header-logo a{color:' . get_theme_mod( 'my_colors_header_logo' ) . ';}' );
}

/* フッター背景色 */
if ( get_theme_mod( 'my_colors_footer_background' ) ) {
	echo esc_attr( '#footer{background:' . get_theme_mod( 'my_colors_footer_background' ) . ';}' );
}

/* フッターテキスト色 */
if ( get_theme_mod( 'my_colors_footer_text' ) ) {
	echo esc_attr( '#footer{color:' . get_theme_mod( 'my_colors_footer_text' ) . ';}' );
}

/* Twitter色 */
if ( get_theme_mod( 'my_colors_sns_twitter' ) ) {
	echo esc_attr( '.p-sns-buttons li a.m-twitter{background:' . get_theme_mod( 'my_colors_sns_twitter' ) . ';}' );
}

/* Facebook色 */
if ( get_theme_mod( 'my_colors_sns_facebook' ) ) {
	echo esc_attr( '.p-sns-buttons li a.m-facebook{background:' . get_theme_mod( 'my_colors_sns_facebook' ) . ';}' );
}

/* はてなブックマーク色 */
if ( get_theme_mod( 'my_colors_sns_hatena' ) ) {
	echo esc_attr( '.p-sns-buttons li a.m-hatena{background:' . get_theme_mod( 'my_colors_sns_hatena' ) . ';}' );
}

/* LINE色 */
if ( get_theme_mod( 'my_colors_sns_line' ) ) {
	echo esc_attr( '.p-sns-buttons li a.m-line{background:' . get_theme_mod( 'my_colors_sns_line' ) . ';}' );
}

/* Pocket色 */
if ( get_theme_mod( 'my_colors_sns_pocket' ) ) {
	echo esc_attr( '.p-sns-buttons li a.m-pocket{background:' . get_theme_mod( 'my_colors_sns_pocket' ) . ';}' );
}

/* RSS色 */
if ( get_theme_mod( 'my_colors_sns_rss' ) ) {
	echo esc_attr( '.p-sns-buttons li a.m-rss{background:' . get_theme_mod( 'my_colors_sns_rss' ) . ';}' );
}

/* コンテンツのリンク色 */
if ( get_theme_mod( 'my_colors_content_link' ) ) {
	echo esc_attr( '.e-body a{color:' . get_theme_mod( 'my_colors_content_link' ) . ';}' );
}

/* レイアウト */
if ( get_theme_mod( 'my_layout_all_radio' ) ) {
	switch ( get_theme_mod( 'my_layout_all_radio' ) ) {
		case 'one':
			echo '#l-primary{width:100%;margin-bottom:32px;}';
			echo '#l-secondary{width:100%;}';
			break;
		case 'two-right':
			echo '#content>.inner{flex-direction:row;}';
			echo '#l-secondary{margin-left:auto;margin-right:0;}';
			break;
		case 'two-left':
			echo '#content>.inner{flex-direction:row-reverse;}';
			echo '#l-secondary{margin-left:0;margin-right:auto;}';
			break;
	}
}

echo '</style>';
