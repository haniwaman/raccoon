<?php
/**
 * Functions
 *
 * @package WordPress
 */

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
	if ( ! isset( $content_width ) ) {
		$content_width = 840;
	}
}
add_action( 'after_setup_theme', 'my_setup' );
// add_filter( 'feed_links_show_comments_feed', '__return_false' );
// add_filter( 'feed_links_show_posts_feed', '__return_false' );

/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init() {
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array(), '5.7.2', 'all' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/asset/swiper.min.css', array(), '4.5.0', 'all' );
	wp_enqueue_style( 'my', get_template_directory_uri() . '/css/style.css', array(), '1.0.1', 'all' );
	wp_enqueue_style( 'df', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/asset/swiper.min.js', array(), '4.5.0', true );
	wp_enqueue_script( 'my', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.1', true );
}
add_action( 'wp_enqueue_scripts', 'my_script_init' );



/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
function my_menu_init() {
	register_nav_menus(
		array(
			'header' => 'ヘッダーメニュー',
			'footer' => 'フッターメニュー',
			'drawer' => 'ドロワーメニュー',
		)
	);
}
add_action( 'init', 'my_menu_init' );



/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
function my_widget_init() {
	register_sidebar(
		array(
			'name'          => 'サイドバー',
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
}
add_action( 'widgets_init', 'my_widget_init' );



/**
 * 画像サイズ
 */
add_image_size( 'my_thumbnail', 840, 600, true );




/**
 * テンプレートタグ
 */
require_once get_template_directory() . '/inc/tags.php';




/**
 * パンくずリスト
 */
require_once get_template_directory() . '/inc/breadcrumb.php';



/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title( $title ) {

	if ( is_category() ) { /* カテゴリーアーカイブの場合 */
		$title = '' . single_cat_title( '', false ) . '';
	} elseif ( is_tag() ) { /* タグアーカイブの場合 */
		$title = '' . single_tag_title( '', false ) . '';
	} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
		$title = '' . post_type_archive_title( '', false ) . '';
	} elseif ( is_tax() ) { /* タームアーカイブの場合 */
		$title = '' . single_term_title( '', false );
	} elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
		$title = '「' . esc_html( get_query_var( 's' ) ) . '」の検索結果';
	} elseif ( is_author() ) { /* 作者アーカイブの場合 */
		$title = '' . get_the_author() . '';
	} elseif ( is_date() ) { /* 日付アーカイブの場合 */
		$title = '';
		if ( get_query_var( 'year' ) ) {
			$title .= get_query_var( 'year' ) . '年';
		}
		if ( get_query_var( 'monthnum' ) ) {
			$title .= get_query_var( 'monthnum' ) . '月';
		}
		if ( get_query_var( 'day' ) ) {
			$title .= get_query_var( 'day' ) . '日';
		}
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'my_archive_title' );


/**
 * パンくずのタイトルの書き換え
 *
 * @param string $title 変換前のタイトル.
 * @return string $title 変換後のタイトル.
 */
function my_breadcrumb_title( $title ) {
	if ( is_home() ) {
		$title = 'ブログ';
	} else {
		$title = mb_strimwidth( $title, 0, 64, '…', 'UTF-8' );
	}
	return $title;
}
add_filter( 'raccoon_breadcrumb_title', 'my_breadcrumb_title' );

/**
 * パスワードで保護されたページのフォーム
 *
 * @return $my_password_form パスワード入力のHTMLフォーム.
 */
function my_password_form() {
	$my_password_form  = '<p>このコンテンツはパスワードで保護されています。閲覧するには以下にパスワードを入力してください。</p>';
	$my_password_form .= '<form class="post_password" action="' . home_url() . '/wp-login.php?action=postpass" class="post-password-form" method="post">';
	$my_password_form .= '<input name="post_password" type="password" placeholder="パスワード入力" class="post_password-field">';
	$my_password_form .= '<input type="submit" name="Submit" value="確定" class="post_password-submit">';
	$my_password_form .= '</form>';

	return $my_password_form;
}
add_filter( 'the_password_form', 'my_password_form' );



/**
 * ウィジェットの投稿件数をaタグ内に
 *
 * @param string $output もともと出力するHTMLタグ.
 * @return string $output 変換後に出力するHTMLタグ.
 */
function my_list_anchor( $output ) {
	$output = preg_replace( '/<\/a>.*?\((\d+)\)/', ' <span>($1)</span></a>', $output );
	return $output;
}
add_filter( 'wp_list_categories', 'my_list_anchor' );
add_filter( 'get_archives_link', 'my_list_anchor' );
