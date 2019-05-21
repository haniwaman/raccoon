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

	if ( is_front_page() ) { /* フロントページの場合 */
		echo '';

	} elseif ( is_home() ) { /* 投稿一覧の場合 */
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$breadcrumb_html .= '<li><span class="breadcrumb_current">' . get_the_title() . '</span></li>';
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

	} elseif ( is_single() ) { /* 投稿ページの場合 */
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		if ( 'post' !== get_post_type() ) {
			$breadcrumb_html .= '<li><a href="' . esc_url( get_post_type_archive_link( get_post_type() ) ) . '">' . esc_html( get_post_type_object( get_post_type() )->labels->name ) . '</a></li>' . $breadcrumb_bridge_tag;
		}
		$breadcrumb_html .= '<li><span class="breadcrumb_current">' . get_the_title() . '</span></li>';
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

	} elseif ( is_page() ) { /* 固定ページの場合 */
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$breadcrumb_html .= '<li><span class="breadcrumb_current">' . get_the_title() . '</span></li>';
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

	} elseif ( is_category() ) { /* カテゴリーアーカイブの場合 */
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$breadcrumb_html .= '<li><span class="breadcrumb_current">' . single_cat_title( '', false ) . '</span></li>';
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

	} elseif ( is_tag() ) { /* タグアーカイブの場合 */
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$breadcrumb_html .= '<li><span class="breadcrumb_current">' . single_tag_title( '', false ) . '</span></li>';
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

	} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$breadcrumb_html .= '<li><span class="breadcrumb_current">' . post_type_archive_title( '', false ) . '</span></li>';
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

	} elseif ( is_tax() ) { /* タームアーカイブの場合 */
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$breadcrumb_html .= '<li><a href="' . esc_url( get_post_type_archive_link( get_post_type() ) ) . '">' . esc_html( get_post_type_object( get_post_type() )->labels->name ) . '</a></li>' . $breadcrumb_bridge_tag;
		$breadcrumb_html .= '<li><span class="breadcrumb_current">' . single_term_title( '', false ) . '</span></li>';
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

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
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$this_year        = get_query_var( 'year' );
		$this_month       = get_query_var( 'monthnum' );
		$this_day         = get_query_var( 'day' );
		if ( $this_year ) {
			$breadcrumb_html .= '<li><a href="' . get_year_link( $this_year ) . '">' . $this_year . '年</a></li>' . $breadcrumb_bridge_tag;
		}
		if ( $this_month ) {
			$breadcrumb_html .= '<li><a href="' . get_month_link( $this_year, $this_month ) . '">' . $this_month . '月</a></li>' . $breadcrumb_bridge_tag;
		}
		if ( $this_day ) {
			$breadcrumb_html .= '<li><a href="' . get_day_link( $this_year, $this_month, $this_day ) . '">' . $this_day . '日</a></li>' . $breadcrumb_bridge_tag;
		}
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );

	} elseif ( is_404() ) { /* 404ページの場合 */
		$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
		$breadcrumb_html .= '<li><span class="breadcrumb_current">404</span></li>';
		$breadcrumb_html .= $breadcrumb_after;
		echo wp_kses_post( $breadcrumb_html );
	}
}


