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
		'html5', /* HTML5のタグで出力 */
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
	add_theme_support( 'editor-styles' ); /* 編集画面用CSS追加 */
	add_theme_support(
		'custom-logo', /* カスタマイザーでロゴ画像 */
		array(
			'width'       => 400,
			'height'      => 160,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	add_theme_support(
		'custom-header',  /* カスタマイザーでヘッダー画像 */
		array(
			'width'       => 1920,
			'height'      => 700,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	if ( ! isset( $content_width ) ) {
		$content_width = 840; /* コンテンツ幅 */
	}
	load_theme_textdomain( 'raccoon', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_setup' );



/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init() {

	/* CSS */
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/lib/fontawesome/css/all.min.css', array(), '5.8.2', 'all' );
	wp_enqueue_style( 'my', get_template_directory_uri() . '/css/style.css', array(), '1.0.1', 'all' );
	wp_enqueue_style( 'df', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ), 'all' );

	/* JavaScript */
	wp_enqueue_script( 'stickyfill', get_template_directory_uri() . '/lib/stickyfill/stickyfill.min.js', array(), '2.1.0', true );
	wp_enqueue_script( 'my', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.1', true );

	/* 投稿・固定 */
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_script_init' );



/**
 * <body>タグ直後の追記
 *
 * @codex https://developer.wordpress.org/reference/functions/wp_body_open/
 */
function my_body_open() {
	/*
	 Facebookプラグイン */
	// echo '<div id="fb-root"></div>';
	// echo '<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.3"></script>';
}
add_action( 'wp_body_open', 'my_body_open' );



/**
 * <head>タグ直前の追記
 *
 * @return 追加する
 */
function my_head() {
	return '';
}
add_action( 'wp_head', 'my_head' );



/**
 * 編集画面用のスタイルシート
 *
 * @return void
 */
function my_editor_style() {
	// add_editor_style( get_template_directory_uri() . '/css/admin/editor-style.css' );
}
// add_action( 'admin_init', 'my_editor_style' );



/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
function my_menu_init() {
	register_nav_menus(
		array(
			'header' => __( 'ヘッダーメニュー', 'raccoon' ),
			'footer' => __( 'フッターメニュー', 'raccoon' ),
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
			'name'          => __( 'サイドバー', 'raccoon' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div><!-- /widget -->',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div><!-- /widget-title -->',
		)
	);
	register_sidebar(
		array(
			'name'          => __( '追従', 'raccoon' ),
			'id'            => 'sidebar-fixed',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div><!-- /widget -->',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div><!-- /widget-title -->',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'スマホメニュー', 'raccoon' ),
			'id'            => 'spmenu',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div><!-- /widget -->',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div><!-- /widget-title -->',
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
 * パンくずのタイトルの書き換え
 *
 * @param string $title 変換前のタイトル.
 * @return string $title 変換後のタイトル.
 */
function my_breadcrumb_title( $title ) {
	if ( is_home() ) {
		$title = __( 'ブログ', 'raccoon' );
	} else {
		$title = mb_strimwidth( $title, 0, 64, '…', 'UTF-8' );
	}
	$title = '';
	return $title;
}
add_filter( 'raccoon_breadcrumb_title', 'my_breadcrumb_title' );



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
	} elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
		$title = '"' . esc_html( get_query_var( 's' ) ) . '"' . __( 'の検索結果', 'raccoon' );
	} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
		$title = '' . post_type_archive_title( '', false ) . '';
	} elseif ( is_tax() ) { /* タームアーカイブの場合 */
		$title = '' . single_term_title( '', false );
	} elseif ( is_author() ) { /* 作者アーカイブの場合 */
		$title = '' . get_the_author() . '';
	} elseif ( is_date() ) { /* 日付アーカイブの場合 */
		$title = '';
		if ( get_query_var( 'year' ) ) {
			$title .= get_query_var( 'year' ) . __( '年', 'raccoon' );
		}
		if ( get_query_var( 'monthnum' ) ) {
			$title .= get_query_var( 'monthnum' ) . __( '月', 'raccoon' );
		}
		if ( get_query_var( 'day' ) ) {
			$title .= get_query_var( 'day' ) . __( '日', 'raccoon' );
		}
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'my_archive_title' );



/**
 * パスワードで保護されたページのフォーム
 *
 * @return $my_password_form パスワード入力のHTMLフォーム.
 */
function my_password_form() {
	$my_password_form  = '<p>' . __( 'このコンテンツはパスワードで保護されています。閲覧するには以下にパスワードを入力してください。', 'raccoon' ) . '</p>';
	$my_password_form .= '<form class="post_password" action="' . home_url() . '/wp-login.php?action=postpass" class="post-password-form" method="post">';
	$my_password_form .= '<input name="post_password" type="password" placeholder="' . __( 'パスワード入力', 'raccoon' ) . '" class="post_password-field">';
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



/**
 * 抜粋する文字数を変更
 *
 * @param int $length 抜粋する文字数.
 * @return int 抜粋する文字数.
 * @codex https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/the_excerpt
 */
function my_excerpt_length( $length ) {
	$length = 100;
	return $length;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );



/**
 * 抜粋した文字の後ろにつける省略記号の変更
 *
 * @param string $more 省略記号の文字.
 * @return string 省略記号の文字.
 * @codex https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/the_excerpt
 */
function my_excerpt_more( $more ) {
	$more = '…';
	return $more;
}
add_filter( 'excerpt_more', 'my_excerpt_more' );


/**
 * カスタマイザー追加
 */
require_once get_template_directory() . '/inc/customizer.php';


