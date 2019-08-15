<?php
/**
 * My Breadcrumb Functions
 *
 * @package WordPress
 */

if ( ! function_exists( 'my_breadcrumb' ) ) {

	/**
	 * パンくずリストの表示
	 *
	 * @param string $object_type タクソノミー名.
	 * @return void
	 */
	function my_breadcrumb( $object_type = '' ) {
		$breadcrumb_html       = '';
		$breadcrumb_beore      = '<nav class="p-breadcrumb"><div class="l-inner"><ul>';
		$breadcrumb_after      = '</ul></div></nav>';
		$breadcrumb_home       = apply_filters( 'raccoon_breadcrumb_home', __( 'ホーム', 'raccoon' ) );
		$breadcrumb_home_tag   = '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . $breadcrumb_home . '</a></li>';
		$breadcrumb_bridge     = '<i class="fas fa-caret-right"></i>';
		$breadcrumb_bridge_tag = '<li><span class="e-bridge">' . $breadcrumb_bridge . '</span></li>';

		if ( is_front_page() ) { /* フロントページの場合 */
			echo '';

		} elseif ( is_home() ) { /* 投稿一覧の場合 */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="e-current">' . apply_filters( 'raccoon_breadcrumb_title', get_the_title() ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_attachment() ) { /* メディアページの場合 */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="e-current">' . apply_filters( 'raccoon_breadcrumb_title', get_the_title() ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_single() ) { /* 投稿ページの場合 */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			if ( 'post' !== get_post_type() ) {
				$breadcrumb_html .= '<li><a href="' . esc_url( get_post_type_archive_link( get_post_type() ) ) . '">' . esc_html( get_post_type_object( get_post_type() )->labels->name ) . '</a></li>' . $breadcrumb_bridge_tag;
			} else {
				$this_categories = my_get_post_categories( get_the_ID() );
				$thie_parents    = get_ancestors( $this_categories[0]['id'], 'category' );
				if ( $thie_parents ) {
					$thie_parents = array_reverse( $thie_parents );
					for ( $i = 0; $i < count( $thie_parents ); $i++ ) {
						$this_parent_category = get_category( $thie_parents[ $i ] );
						$breadcrumb_html     .= '<li><a href="' . get_category_link( $this_parent_category->term_id ) . '">' . $this_parent_category->cat_name . '</a></li>' . $breadcrumb_bridge_tag;
					}
				}
				$breadcrumb_html .= '<li><a href="' . $this_categories[0]['link'] . '">' . $this_categories[0]['name'] . '</a></li>' . $breadcrumb_bridge_tag;
			}
			$breadcrumb_html .= '<li><span class="e-current">' . apply_filters( 'raccoon_breadcrumb_title', get_the_title() ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_page() ) { /* 固定ページの場合 */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$thie_parents     = get_ancestors( get_the_ID(), 'page' );
			if ( $thie_parents ) {
				$thie_parents       = array_reverse( $thie_parents );
				$this_parents_count = count( $thie_parents );
				for ( $i = 0; $i < $this_parents_count; $i++ ) {
					$breadcrumb_html .= '<li><a href="' . get_permalink( $thie_parents[ $i ] ) . '">' . get_the_title( $thie_parents[ $i ] ) . '</a></li>' . $breadcrumb_bridge_tag;
				}
			}
			$breadcrumb_html .= '<li><span class="e-current">' . apply_filters( 'raccoon_breadcrumb_title', get_the_title() ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_category() ) { /* カテゴリーアーカイブの場合 */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$thie_parents     = get_ancestors( get_query_var( 'cat' ), 'category' );
			if ( $thie_parents ) {
				$thie_parents       = array_reverse( $thie_parents );
				$this_parents_count = count( $thie_parents );
				for ( $i = 0; $i < $this_parents_count; $i++ ) {
					$this_parent_category = get_category( $thie_parents[ $i ] );
					$breadcrumb_html     .= '<li><a href="' . get_category_link( $this_parent_category->term_id ) . '">' . $this_parent_category->cat_name . '</a></li>' . $breadcrumb_bridge_tag;
				}
			}
			$breadcrumb_html .= '<li><span class="e-current">' . apply_filters( 'raccoon_breadcrumb_title', single_cat_title( '', false ) ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="e-current">' . apply_filters( 'raccoon_breadcrumb_title', '"' . get_query_var( 's' ) . '"' . __( 'の検索結果', 'raccoon' ) ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_tag() ) { /* タグアーカイブの場合 */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="e-current">' . apply_filters( 'raccoon_breadcrumb_title', single_tag_title( '', false ) ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="e-current">' . apply_filters( 'raccoon_breadcrumb_title', post_type_archive_title( '', false ) ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_tax() ) { /* タームアーカイブの場合 */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><a href="' . esc_url( get_post_type_archive_link( get_post_type() ) ) . '">' . esc_html( get_post_type_object( get_post_type() )->labels->name ) . '</a></li>' . $breadcrumb_bridge_tag;
			if ( $object_type ) {
				$thie_parents = get_ancestors( get_queried_object_id(), $object_type );
				if ( $thie_parents ) {
					$thie_parents       = array_reverse( $thie_parents );
					$this_parents_count = count( $thie_parents );
					for ( $i = 0; $i < $this_parents_count; $i++ ) {
						$this_parent_term = get_term( $thie_parents[ $i ], $object_type );
						$breadcrumb_html .= '<li><a href="' . get_category_link( $this_parent_term->term_id ) . '">' . $this_parent_term->name . '</a></li>' . $breadcrumb_bridge_tag;
					}
				}
			}
			$breadcrumb_html .= '<li><span class="e-current">' . apply_filters( 'raccoon_breadcrumb_title', single_term_title( '', false ) ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_author() ) { /* 作者アーカイブの場合 */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="e-current">' . apply_filters( 'raccoon_breadcrumb_title', get_the_author() ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_date() ) { /* 日付アーカイブの場合 */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$this_year        = get_query_var( 'year' );
			$this_month       = get_query_var( 'monthnum' );
			$this_day         = get_query_var( 'day' );
			if ( $this_year ) {
				$breadcrumb_html .= '<li><a href="' . get_year_link( $this_year ) . '">' . $this_year . __( '年', 'raccoon' ) . '</a></li>' . $breadcrumb_bridge_tag;
			}
			if ( $this_month ) {
				$breadcrumb_html .= '<li><a href="' . get_month_link( $this_year, $this_month ) . '">' . $this_month . __( '月', 'raccoon' ) . '</a></li>' . $breadcrumb_bridge_tag;
			}
			if ( $this_day ) {
				$breadcrumb_html .= '<li><a href="' . get_day_link( $this_year, $this_month, $this_day ) . '">' . $this_day . __( '日', 'raccoon' ) . '</a></li>' . $breadcrumb_bridge_tag;
			}
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_404() ) { /* 404ページの場合 */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="e-current">404</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		}
	}
}
