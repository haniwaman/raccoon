<?php
/**
 * Export Customize CSS
 *
 * @package WordPress
 */


echo '<style>';

/* First view */
echo '@keyframes fadeInDown{from{opacity:0;transform:translateY(-50px)}to{opacity:1;transform:translateY(0)}}.fadein{opacity:0.1;transform:translate(0, 30px);transition:all 0.5s ease 0s}.fadein.m_anim{opacity:1;transform:translate(0, 0)}#header{width:100%;background:#fff;z-index:20}#header.m_anim{animation:fadeInDown 0.5s ease 0s 1 normal none}#header.m_fixed{position:fixed;top:0;left:0;box-shadow:0 1px 3px rgba(0,0,0,0.16)}#header>.inner{display:flex;flex-wrap:wrap;align-items:center;padding-top:0;padding-bottom:0}@media screen and (max-width: 767px){#header>.inner{height:60px}}.header-logo{margin-right:auto}.header-logo a{transition:all 0.3s ease 0s;display:block;text-decoration:none;font-size:28px;font-weight:700}.header-logo a:hover{opacity:.6}.header-logo img{vertical-align:middle;width:auto;max-height:80px}@media screen and (max-width: 767px){.header-logo img{max-height:60px}}@media screen and (max-width: 767px){.header-nav{display:none}}.header-nav .header-list{display:flex}.header-nav li{margin-right:12px;position:relative;z-index:22;padding:16px 0}.header-nav li:hover>.sub-menu{visibility:visible;opacity:1}.header-nav li:last-child{margin-right:0}.header-nav li:last-child .sub-menu{left:auto;right:0}.header-nav li>a{text-decoration:none;display:block;padding:6px 8px;font-size:14px;transition:all 0.3s ease 0s}.header-nav li>a:hover{opacity:.6}.header-nav li.m_pickup a{background:#e65100;color:#fff;font-weight:700;box-shadow:0 0 3px 0 rgba(0,0,0,0.16)}.header-nav .sub-menu{font-size:16px;transition:all 0.3s ease 0s;position:absolute;top:100%;left:0;width:100%;opacity:0;z-index:21;min-width:200px;visibility:hidden;display:block;padding:0}.header-nav .sub-menu li{margin-bottom:2px;margin-right:0;height:auto;display:block;padding:0}.header-nav .sub-menu li a{display:block;height:auto;line-height:1.6;background:#efa336;color:#fff;padding:8px 28px 8px 16px;font-size:14px;font-weight:400;letter-spacing:0.05em}.mv-page{position:relative}.mv-page::before{content:"";width:100%;height:100%;position:absolute;top:0;left:0;background:rgba(0,0,0,0.16)}.mv-page>.e-content{position:absolute;width:500px;max-width:100%;top:50%;left:50%;transform:translate(-50%, -50%);text-align:center;color:#fff}.mv-page>.e-content>.e-title{font-size:24px;font-weight:700}.mv-page>.e-content>.e-lead{font-size:14px;margin-top:8px}';

/* サイトのメイン色 */
if ( get_theme_mod( 'my_colors_site_main' ) ) {
	/* ページネーション */
	echo esc_attr( '.page-numbers.current{background:' . get_theme_mod( 'my_colors_site_main' ) . ';border-color:' . get_theme_mod( 'my_colors_site_main' ) . ';}' );
	echo esc_attr( '.pagenation a:hover{background:' . get_theme_mod( 'my_colors_site_main' ) . ';border-color:' . get_theme_mod( 'my_colors_site_main' ) . ';}' );
	echo esc_attr( '.pagenation a.next:hover, .pagenation a.prev:hover{background:' . get_theme_mod( 'my_colors_site_main' ) . ';border-color:' . get_theme_mod( 'my_colors_site_main' ) . ';}' );
	echo esc_attr( '.entry-links .post-page-numbers.current{background:' . get_theme_mod( 'my_colors_site_main' ) . ';border-color:' . get_theme_mod( 'my_colors_site_main' ) . ';}' );
	echo esc_attr( '.entry-links a:hover{background:' . get_theme_mod( 'my_colors_site_main' ) . ';border-color:' . get_theme_mod( 'my_colors_site_main' ) . ';}' );
	/* インフォメーション */
	echo esc_attr( '.infomation a{background:' . get_theme_mod( 'my_colors_site_main' ) . ';}' );
	/* カレンダー */
	echo esc_attr( '#wp-calendar a{color:' . get_theme_mod( 'my_colors_site_main' ) . ';}' );

}

/* サイトのアクセント色 */
if ( get_theme_mod( 'my_colors_site_accent' ) ) {
	/* ピックアップ */
	echo esc_attr( '.header-nav li.m_pickup a{background:' . get_theme_mod( 'my_colors_site_accent' ) . ';}' );
	echo esc_attr( '.sticky::before{background:' . get_theme_mod( 'my_colors_site_accent' ) . ';}' );
	/* フローティング */
	echo esc_attr( '.floating a{background:' . get_theme_mod( 'my_colors_site_accent' ) . ';}' );
	/* ボタン */
	echo esc_attr( 'form button,input[type="submit"],input[type="button"],.btn{background:' . get_theme_mod( 'my_colors_site_accent' ) . ';}' );

}

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
	echo esc_attr( '.header-nav li > a{color:' . get_theme_mod( 'my_colors_header_text' ) . ';}' );
}

/* ヘッダーロゴ色 */
if ( get_theme_mod( 'my_colors_header_logo' ) ) {
	echo esc_attr( '.header-logo a{color:' . get_theme_mod( 'my_colors_header_logo' ) . ';}' );
}

/* フッター背景色 */
if ( get_theme_mod( 'my_colors_footer_background' ) ) {
	echo esc_attr( '#footer{background:' . get_theme_mod( 'my_colors_footer_background' ) . ';}' );
}

/* フッターテキスト色 */
if ( get_theme_mod( 'my_colors_footer_text' ) ) {
	echo esc_attr( '#footer{color:' . get_theme_mod( 'my_colors_footer_text' ) . ';}' );
}

/* ウィジェット見出し背景色 */
if ( get_theme_mod( 'my_colors_widget_background' ) ) {
	echo esc_attr( '.widget-title{background:' . get_theme_mod( 'my_colors_widget_background' ) . ';}' );
}
/* ウィジェット見出しテキスト色 */
if ( get_theme_mod( 'my_colors_widget_text' ) ) {
	echo esc_attr( '.widget-title{color:' . get_theme_mod( 'my_colors_widget_text' ) . ';}' );
}

/* Twitter色 */
if ( get_theme_mod( 'my_colors_sns_twitter' ) ) {
	echo esc_attr( '.sns-buttons li a.m_twitter{background:' . get_theme_mod( 'my_colors_sns_twitter' ) . ';}' );
}

/* Facebook色 */
if ( get_theme_mod( 'my_colors_sns_facebook' ) ) {
	echo esc_attr( '.sns-buttons li a.m_facebook{background:' . get_theme_mod( 'my_colors_sns_facebook' ) . ';}' );
}

/* はてなブックマーク色 */
if ( get_theme_mod( 'my_colors_sns_hatena' ) ) {
	echo esc_attr( '.sns-buttons li a.m_hatena{background:' . get_theme_mod( 'my_colors_sns_hatena' ) . ';}' );
}

/* LINE色 */
if ( get_theme_mod( 'my_colors_sns_line' ) ) {
	echo esc_attr( '.sns-buttons li a.m_line{background:' . get_theme_mod( 'my_colors_sns_line' ) . ';}' );
}

/* Pocket色 */
if ( get_theme_mod( 'my_colors_sns_pocket' ) ) {
	echo esc_attr( '.sns-buttons li a.m_pocket{background:' . get_theme_mod( 'my_colors_sns_pocket' ) . ';}' );
}

/* Feedly色 */
if ( get_theme_mod( 'my_colors_sns_feedly' ) ) {
	echo esc_attr( '.sns-buttons li a.m_feedly{background:' . get_theme_mod( 'my_colors_sns_feedly' ) . ';}' );
}

/* RSS色 */
if ( get_theme_mod( 'my_colors_sns_rss' ) ) {
	echo esc_attr( '.sns-buttons li a.m_rss{background:' . get_theme_mod( 'my_colors_sns_rss' ) . ';}' );
}

/* コンテンツのリンク色 */
if ( get_theme_mod( 'my_colors_content_link' ) ) {
	echo esc_attr( '.entry-body a{color:' . get_theme_mod( 'my_colors_content_link' ) . ';}' );
}

/* レイアウト */
if ( get_theme_mod( 'my_layout_all_radio' ) ) {
	switch ( get_theme_mod( 'my_layout_all_radio' ) ) {
		case 'one':
			echo '#primary{width:100%;margin-bottom:32px;}';
			echo '#secondary{width:100%;}';
			break;
		case 'two-right':
			echo '#content>.inner{flex-direction:row;}';
			echo '#secondary{margin-left:auto;margin-right:0;}';
			break;
		case 'two-left':
			echo '#content>.inner{flex-direction:row-reverse;}';
			echo '#secondary{margin-left:0;margin-right:auto;}';
			break;
	}
}

echo '</style>';
