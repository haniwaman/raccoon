<?php
/**
 * Functions
 *
 * @package WordPress
 */

/**
 * WordPress Init
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
	add_theme_support( 'editor-styles' );
	add_theme_support(
		'custom-logo',
		array(
			'width'       => 400,
			'height'      => 160,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	add_theme_support(
		'custom-header',
		array(
			'width'       => 1920,
			'height'      => 700,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	add_theme_support( 'custom-background' );
	if ( ! isset( $content_width ) ) {
		$content_width = 840;
	}
	load_theme_textdomain( 'raccoon', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_setup' );



/**
 * Load CSS and JavaScript
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script() {

	/* CSS */
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/src/lib/fontawesome/css/all.min.css', array(), '5.8.2', 'all' );
	if ( ! get_theme_mod( 'my_performance_inline_check' ) ) {
		wp_enqueue_style( 'header', get_template_directory_uri() . '/src/css/header.css', array(), '1.0.1', 'all' );
	}
	wp_enqueue_style( 'my', get_template_directory_uri() . '/src/css/style.css', array(), '1.0.1', 'all' );
	wp_enqueue_style( 'df', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ), 'all' );

	/* JavaScript */
	wp_enqueue_script( 'stickyfill', get_template_directory_uri() . '/src/lib/stickyfill/stickyfill.min.js', array(), '2.1.0', true );
	wp_enqueue_script( 'object-fit-images', get_template_directory_uri() . '/src/lib/object-fit-images/ofi.min.js', array(), '3.2.4', true );
	wp_enqueue_script( 'intersection-observer', get_template_directory_uri() . '/src/lib/intersection-observer/intersection-observer.js', array(), '2.1.0', true );
	wp_enqueue_script( 'my', get_template_directory_uri() . '/src/js/script.js', array( 'jquery' ), '1.0.1', true );

	/* Post or Single */
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_script' );



/**
 * Add Text After <body>Tag
 *
 * @codex https://developer.wordpress.org/reference/functions/wp_body_open/
 */
function my_body_open() {
	/* Facebook Plugin */
	echo '<div id="fb-root"></div>';
	echo '<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.3"></script>';
}
add_action( 'wp_body_open', 'my_body_open' );



/**
 * Add Text Before </head>Tag
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/wp_head
 */
function my_wp_head() {

	require_once get_template_directory() . '/inc/customizer/export.php';
}
add_action( 'wp_head', 'my_wp_head' );



/**
 * Load CSS and JavaScript for WP Admin
 *
 * @return void
 */
function my_admin_script() {
	add_editor_style( get_template_directory_uri() . '/src/css/admin/editor-style.css' );
	wp_enqueue_style( 'admin', get_template_directory_uri() . '/src/css/admin/style.css', array(), '1.0.1', 'all' );
	wp_enqueue_media();
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script( 'admin', get_template_directory_uri() . '/src/js/admin/script.js', array( 'wp-color-picker' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'my_admin_script' );




/**
 * Add WP Admin Menu
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
function my_menu_init() {
	register_nav_menus(
		array(
			'header' => __( 'Header', 'raccoon' ),
			'footer' => __( 'Footer', 'raccoon' ),
		)
	);
}
add_action( 'init', 'my_menu_init' );



/**
 * Add WP Admin Widget
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
function my_widget_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'raccoon' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
			'after_widget'  => '</div><!-- /p-widget -->',
			'before_title'  => '<div class="e-title">',
			'after_title'   => '</div><!-- /e-title -->',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Sticky', 'raccoon' ),
			'id'            => 'p-sidebar-fixed',
			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
			'after_widget'  => '</div><!-- /p-widget -->',
			'before_title'  => '<div class="e-title">',
			'after_title'   => '</div><!-- /e-title -->',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Smartphone Menu', 'raccoon' ),
			'id'            => 'spmenu',
			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
			'after_widget'  => '</div><!-- /p-widget -->',
			'before_title'  => '<div class="e-title">',
			'after_title'   => '</div><!-- /e-title -->',
		)
	);
}
add_action( 'widgets_init', 'my_widget_init' );



/**
 * Image Size
 */
add_image_size( 'my_thumbnail', 840, 600, true );




/**
 * Template Tags
 */
require_once get_template_directory() . '/inc/tags.php';




/**
 * Breadcrumb List
 */
require_once get_template_directory() . '/inc/breadcrumb.php';

/**
 * Change Breadcrumb List Title
 *
 * @param string $title Before Title.
 * @return string $title After Title.
 */
function my_breadcrumb_title( $title ) {
	if ( is_home() ) {
		$title = __( 'Blog', 'raccoon' );
	} else {
		$title = mb_strimwidth( $title, 0, 64, __( '...', 'raccoon' ), 'UTF-8' );
	}
	$title = '';
	return $title;
}
add_filter( 'raccoon_breadcrumb_title', 'my_breadcrumb_title' );



/**
 * Change Archive Title
 *
 * @param string $title Before Title.
 * @return string $title After Title.
 */
function my_archive_title( $title ) {

	if ( is_category() ) { /* Category */
		$title = '' . single_cat_title( '', false ) . '';
	} elseif ( is_tag() ) { /* Tag */
		$title = '' . single_tag_title( '', false ) . '';
	} elseif ( is_search() ) { /* Search */
		$title = '"' . esc_html( get_query_var( 's' ) ) . '"' . __( ' Search Results', 'raccoon' );
	} elseif ( is_post_type_archive() ) { /* PostType */
		$title = '' . post_type_archive_title( '', false ) . '';
	} elseif ( is_tax() ) { /* Term */
		$title = '' . single_term_title( '', false );
	} elseif ( is_author() ) { /* Archive */
		$title = '' . get_the_author() . '';
	} elseif ( is_date() ) { /* Date */
		$title = '';
		if ( get_query_var( 'year' ) ) {
			$title .= get_query_var( 'year' ) . __( 'Year', 'raccoon' );
		}
		if ( get_query_var( 'monthnum' ) ) {
			$title .= get_query_var( 'monthnum' ) . __( 'Month', 'raccoon' );
		}
		if ( get_query_var( 'day' ) ) {
			$title .= get_query_var( 'day' ) . __( 'Day', 'raccoon' );
		}
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'my_archive_title' );



/**
 * Password Protect Form
 *
 * @return $my_password_form HTML Form.
 */
function my_password_form() {
	$my_password_form  = '<p>' . __( 'This content is password protected. Enter your password below to view it.', 'raccoon' ) . '</p>';
	$my_password_form .= '<form class="post_password" action="' . home_url() . '/wp-login.php?action=postpass" class="post-password-form" method="post">';
	$my_password_form .= '<input name="post_password" type="password" placeholder="' . __( 'Enter Password', 'raccoon' ) . '" class="post_password-field">';
	$my_password_form .= '<input type="submit" name="Submit" value="Confirm" class="post_password-submit">';
	$my_password_form .= '</form>';

	return $my_password_form;
}
add_filter( 'the_password_form', 'my_password_form' );



/**
 * Into a-Tag Posts Num
 *
 * @param string $output Before HTML Tag.
 * @return string $output After HTML Tag.
 */
function my_list_anchor( $output ) {
	$output = preg_replace( '/<\/a>.*?\((\d+)\)/', ' <span>($1)</span></a>', $output );
	return $output;
}
add_filter( 'wp_list_categories', 'my_list_anchor' );
add_filter( 'get_archives_link', 'my_list_anchor' );



/**
 * Change Excerpt Num
 *
 * @param int $length Before Excerpt Num.
 * @return int $length After Excerpt Num.
 * @codex https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/the_excerpt
 */
function my_excerpt_length( $length ) {
	$length = 100;
	return $length;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );



/**
 * Change Excerpt Ellipsis
 *
 * @param string $more Before Ellipsis.
 * @return string After Ellipsis.
 * @codex https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/the_excerpt
 */
function my_excerpt_more( $more ) {
	$more = __( '...', 'raccoon' );
	return $more;
}
add_filter( 'excerpt_more', 'my_excerpt_more' );


/**
 * Add WP Admin Customizer
 */
require_once get_template_directory() . '/inc/customizer/base.php';


/**
 * Add WP Admin Fields
 */
require_once get_template_directory() . '/inc/fields/base.php';


/**
 * Add WP Admin Columns
 */
require_once get_template_directory() . '/inc/columns/base.php';
