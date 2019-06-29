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
	add_theme_support( 'custom-background' ); /* カスタマイザーで背景色 */
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
 * </head>タグ直前の追記
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/wp_head
 */
function my_wp_head() {
	echo '<style>';

	echo '@keyframes fadeInDown{from{opacity:0;transform:translateY(-50px)}to{opacity:1;transform:translateY(0)}}.fadein{opacity:0.1;transform:translate(0, 30px);transition:all 0.5s ease 0s}.fadein.m_anim{opacity:1;transform:translate(0, 0)}#header{width:100%;background:#fff;z-index:20}#header.m_anim{animation:fadeInDown 0.5s ease 0s 1 normal none}#header.m_fixed{position:fixed;top:0;left:0;box-shadow:0 1px 3px rgba(0,0,0,0.16)}#header>.inner{display:flex;flex-wrap:wrap;align-items:center;padding-top:0;padding-bottom:0}@media screen and (max-width: 767px){#header>.inner{height:60px}}.header-logo{margin-right:auto}.header-logo a{transition:all 0.3s ease 0s;display:block;text-decoration:none;font-size:28px;font-weight:700}.header-logo a:hover{opacity:.6}.header-logo img{vertical-align:middle;width:auto;max-height:80px}@media screen and (max-width: 767px){.header-logo img{max-height:60px}}@media screen and (max-width: 767px){.header-nav{display:none}}.header-nav .header-list{display:flex}.header-nav li{margin-right:12px;position:relative;z-index:22;padding:16px 0}.header-nav li:hover>.sub-menu{visibility:visible;opacity:1}.header-nav li:last-child{margin-right:0}.header-nav li:last-child .sub-menu{left:auto;right:0}.header-nav li>a{text-decoration:none;display:block;padding:6px 8px;font-size:14px;transition:all 0.3s ease 0s}.header-nav li>a:hover{opacity:.6}.header-nav li.m_pickup a{background:#e65100;color:#fff;font-weight:700;box-shadow:0 0 3px 0 rgba(0,0,0,0.16)}.header-nav .sub-menu{font-size:16px;transition:all 0.3s ease 0s;position:absolute;top:100%;left:0;width:100%;opacity:0;z-index:21;min-width:200px;visibility:hidden;display:block;padding:0}.header-nav .sub-menu li{margin-bottom:2px;margin-right:0;height:auto;display:block;padding:0}.header-nav .sub-menu li a{display:block;height:auto;line-height:1.6;background:#efa336;color:#fff;padding:8px 28px 8px 16px;font-size:14px;font-weight:400;letter-spacing:0.05em}';

	/* サイトのメイン色 */
	if ( get_theme_mod( 'my_colors_site_main' ) ) {
		/* ページネーション */
		echo '.page-numbers.current{background:' . esc_attr( get_theme_mod( 'my_colors_site_main' ) ) . ';border-color:' . esc_attr( get_theme_mod( 'my_colors_site_main' ) ) . ';}';
		echo '.pagenation a:hover{background:' . esc_attr( get_theme_mod( 'my_colors_site_main' ) ) . ';border-color:' . esc_attr( get_theme_mod( 'my_colors_site_main' ) ) . ';}';
		echo '.pagenation a.next:hover, .pagenation a.prev:hover{background:' . esc_attr( get_theme_mod( 'my_colors_site_main' ) ) . ';border-color:' . esc_attr( get_theme_mod( 'my_colors_site_main' ) ) . ';}';
		echo '.entry-links .post-page-numbers.current{background:' . esc_attr( get_theme_mod( 'my_colors_site_main' ) ) . ';border-color:' . esc_attr( get_theme_mod( 'my_colors_site_main' ) ) . ';}';
		echo '.entry-links a:hover{background:' . esc_attr( get_theme_mod( 'my_colors_site_main' ) ) . ';border-color:' . esc_attr( get_theme_mod( 'my_colors_site_main' ) ) . ';}';
		/* インフォメーション */
		echo '.infomation a{background:' . esc_attr( get_theme_mod( 'my_colors_site_main' ) ) . ';}';
		/* カレンダー */
		echo '#wp-calendar a{color:' . esc_attr( get_theme_mod( 'my_colors_site_main' ) ) . ';}';

	}

	/* サイトのアクセント色 */
	if ( get_theme_mod( 'my_colors_site_accent' ) ) {
		/* ピックアップ */
		echo '.header-nav li.m_pickup a{background:' . esc_attr( get_theme_mod( 'my_colors_site_accent' ) ) . ';}';
		echo '.sticky::before{background:' . esc_attr( get_theme_mod( 'my_colors_site_accent' ) ) . ';}';
		/* フローティング */
		echo '.floating a{background:' . esc_attr( get_theme_mod( 'my_colors_site_accent' ) ) . ';}';
		/* ボタン */
		echo 'form button,input[type="submit"],input[type="button"],.btn{background:' . esc_attr( get_theme_mod( 'my_colors_site_accent' ) ) . ';}';

	}

	/* サイトの背景色 */
	if ( get_theme_mod( 'my_colors_site_background' ) ) {
		echo 'body{background-color:' . esc_attr( get_theme_mod( 'my_colors_site_background' ) ) . ';}';
	}

	/* サイトの文字色 */
	if ( get_theme_mod( 'my_colors_site_text' ) ) {
		echo '#content{color:' . esc_attr( get_theme_mod( 'my_colors_site_text' ) ) . ';}';
	}

	/* ヘッダー背景色 */
	if ( get_theme_mod( 'my_colors_header_background' ) ) {
		echo '#header{background:' . esc_attr( get_theme_mod( 'my_colors_header_background' ) ) . ';}';
	}

	/* ヘッダーテキスト色 */
	if ( get_theme_mod( 'my_colors_header_text' ) ) {
		echo '.header-nav li > a{color:' . esc_attr( get_theme_mod( 'my_colors_header_text' ) ) . ';}';
	}

	/* ヘッダーロゴ色 */
	if ( get_theme_mod( 'my_colors_header_logo' ) ) {
		echo '.header-logo a{color:' . esc_attr( get_theme_mod( 'my_colors_header_logo' ) ) . ';}';
	}

	/* フッター背景色 */
	if ( get_theme_mod( 'my_colors_footer_background' ) ) {
		echo '#footer{background:' . esc_attr( get_theme_mod( 'my_colors_footer_background' ) ) . ';}';
	}

	/* フッターテキスト色 */
	if ( get_theme_mod( 'my_colors_footer_text' ) ) {
		echo '#footer{color:' . esc_attr( get_theme_mod( 'my_colors_footer_text' ) ) . ';}';
	}

	/* ウィジェット見出し背景色 */
	if ( get_theme_mod( 'my_colors_widget_background' ) ) {
		echo '.widget-title{background:' . esc_attr( get_theme_mod( 'my_colors_widget_background' ) ) . ';}';
	}
	/* ウィジェット見出しテキスト色 */
	if ( get_theme_mod( 'my_colors_widget_text' ) ) {
		echo '.widget-title{color:' . esc_attr( get_theme_mod( 'my_colors_widget_text' ) ) . ';}';
	}

	/* Twitter色 */
	if ( get_theme_mod( 'my_colors_sns_twitter' ) ) {
		echo '.sns-buttons li a.m_twitter{background:' . esc_attr( get_theme_mod( 'my_colors_sns_twitter' ) ) . ';}';
	}

	/* Facebook色 */
	if ( get_theme_mod( 'my_colors_sns_facebook' ) ) {
		echo '.sns-buttons li a.m_facebook{background:' . esc_attr( get_theme_mod( 'my_colors_sns_facebook' ) ) . ';}';
	}

	/* はてなブックマーク色 */
	if ( get_theme_mod( 'my_colors_sns_hatena' ) ) {
		echo '.sns-buttons li a.m_hatena{background:' . esc_attr( get_theme_mod( 'my_colors_sns_hatena' ) ) . ';}';
	}

	/* LINE色 */
	if ( get_theme_mod( 'my_colors_sns_line' ) ) {
		echo '.sns-buttons li a.m_line{background:' . esc_attr( get_theme_mod( 'my_colors_sns_line' ) ) . ';}';
	}

	/* Pocket色 */
	if ( get_theme_mod( 'my_colors_sns_pocket' ) ) {
		echo '.sns-buttons li a.m_pocket{background:' . esc_attr( get_theme_mod( 'my_colors_sns_pocket' ) ) . ';}';
	}

	/* コンテンツのリンク色 */
	if ( get_theme_mod( 'my_colors_content_link' ) ) {
		echo '.entry-body a{color:' . esc_attr( get_theme_mod( 'my_colors_content_link' ) ) . ';}';
	}

	echo '</style>';
}
add_action( 'wp_head', 'my_wp_head' );



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
require_once get_template_directory() . '/inc/customizer/color.php';
require_once get_template_directory() . '/inc/customizer/sns.php';
require_once get_template_directory() . '/inc/customizer/test.php';


