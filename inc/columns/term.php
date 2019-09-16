<?php
/**
 * My Term Columns
 *
 * @package WordPress
 */

if ( ! function_exists( 'my_add_terms_columns' ) ) {
	/**
	 * 管理画面のターム一覧ページにオリジナルな列を追加
	 *
	 * @param array $columns 変更前の列の配列.
	 * @return array $columns 変更後の列の配列.
	 */
	function my_add_terms_columns( $columns ) {
		$index                = 1;
		$columns              = array_merge(
			array_slice( $columns, 0, $index ),
			[ 'id' => 'ID' ],
			array_slice( $columns, $index )
		);
		$columns['color']     = __( '色', 'raccoon' );
		$columns['thumbnail'] = __( '画像', 'raccoon' );
		return $columns;
	}
}
add_filter( 'manage_edit-category_columns', 'my_add_terms_columns' );
add_filter( 'manage_edit-post_tag_columns', 'my_add_terms_columns' );

if ( ! function_exists( 'my_show_terms_columns' ) ) {
	/**
	 * 管理画面のターム一覧ページにオリジナルな列に表示
	 *
	 * @param string $content 表示されるコンテンツ.
	 * @param string $column_name 列名.
	 * @param int    $term_id タームID.
	 * @return string $content 表示されるコンテンツ.
	 */
	function my_show_terms_columns( $content, $column_name, $term_id ) {
		if ( 'id' === $column_name ) {
			$content = esc_html( $term_id );
		} elseif ( 'color' === $column_name ) {
			$term_meta = get_term_meta( $term_id );
			if ( isset( $term_meta['my_term_color'][0] ) ) {
				$content = '<span style="color:' . esc_attr( $term_meta['my_term_color'][0] ) . '">' . esc_html( $term_meta['my_term_color'][0] ) . '</span>';
			} else {
				$content = __( '色が設定されていません', 'raccoon' );
			}
		} elseif ( 'thumbnail' === $column_name ) {
			$term_meta = get_term_meta( $term_id );
			if ( isset( $term_meta['my_term_img'][0] ) ) {
				$content = '<img src="' . esc_html( $term_meta['my_term_img'][0] ) . '">';
			} else {
				$content = __( '画像が設定されていません', 'raccoon' );
			}
		}
		return $content;
	}
}
add_action( 'manage_category_custom_column', 'my_show_terms_columns', 10, 3 );
add_action( 'manage_post_tag_custom_column', 'my_show_terms_columns', 10, 3 );


if ( ! function_exists( 'my_sort_terms_columns' ) ) {
	/**
	 * 管理画面のターム一覧ページにオリジナルなソート対象列を追加
	 *
	 * @param array $columns 変更前のソート対象列の配列.
	 * @return array $columns 変更後のソート対象列の配列.
	 */
	function my_sort_terms_columns( $columns ) {
		$columns['id'] = 'ID';
		return $columns;
	}
}
add_filter( 'manage_edit-category_sortable_columns', 'my_sort_terms_columns' );
add_filter( 'manage_edit-post_tag_sortable_columns', 'my_sort_terms_columns' );
