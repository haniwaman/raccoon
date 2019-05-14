<?php
/**
 * My Breadcrumb Functions
 *
 * @package WordPress
 */

/**
 * パンくずリストの表示
 *
 * @return void
 */
function my_breadcrumb() {
	$breadcrumb_html       = '';
	$breadcrumb_beore      = '<nav class="breadcrumb"><div class="inner"><ul class="breadcrumb-list">';
	$breadcrumb_after      = '</ul></div></nav>';
	$breadcrumb_home       = 'ホーム';
	$breadcrumb_home_tag   = '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . $breadcrumb_home . '</a></li>';
	$breadcrumb_bridge     = '<i class="fas fa-caret-right"></i>';
	$breadcrumb_bridge_tag = '<li><span class="breadcrumb_bridge">' . $breadcrumb_bridge . '</span></li>';

	if ( is_single() ) {
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$breadcrumb_html .= '<li><span class="breadcrumb_current">' . get_the_title() . '</span></li>';
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

	} elseif ( is_page() ) {
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$breadcrumb_html .= '<li><span class="breadcrumb_current">' . get_the_title() . '</span></li>';
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

	} elseif ( is_category() ) { /* カテゴリーアーカイブの場合 */
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$this_categories  = my_get_post_categories();
		if ( isset( $this_categories[0] ) ) {
			$breadcrumb_html .= '<li><span class="breadcrumb_current">' . $this_categories[0]['name'] . '</span></li>';
		}
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

	} elseif ( is_tag() ) { /* タグアーカイブの場合 */
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$this_tags        = my_get_post_tags();
		if ( isset( $this_tags[0] ) ) {
			$breadcrumb_html .= '<li><span class="breadcrumb_current">' . $this_tags[0]['name'] . '</span></li>';
		}
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

	} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
		$title = '' . post_type_archive_title( '', false ) . '';

	} elseif ( is_tax() ) { /* タームアーカイブの場合 */
		$title = '' . single_term_title( '', false );

	} elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$breadcrumb_html .= '<li><span class="breadcrumb_current">「' . get_query_var( 's' ) . '」の検索結果</span></li>';
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

	} elseif ( is_author() ) { /* 作者アーカイブの場合 */
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$breadcrumb_html .= '<li><span class="breadcrumb_current">' . get_the_author() . '</span></li>';
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

	} elseif ( is_date() ) { /* 日付アーカイブの場合 */

	} elseif ( is_404() ) { /* 404ページの場合 */
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$breadcrumb_html .= '<li><span class="breadcrumb_current">404</span></li>';
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );
	}
}


