<?php
/**
 * My Post Columns
 *
 * @package WordPress
 */

if ( ! function_exists( 'my_add_post_columns' ) ) {
	/**
	 * 管理画面の投稿一覧ページにオリジナルな列を追加
	 *
	 * @param array $columns 変更前の列の配列.
	 * @return array $columns 変更後の列の配列.
	 */
	function my_add_post_columns( $columns ) {
		global $post_type;
		if ( in_array( $post_type, array( 'post', 'page' ), true ) ) {
			$columns['thumbnail'] = __( 'アイキャッチ画像', 'raccoon' );
			$index_id             = 1;
			$columns              = array_merge(
				array_slice( $columns, 0, $index_id ),
				[ 'id' => 'ID' ],
				array_slice( $columns, $index_id )
			);

		}
		return $columns;
	}
}
add_filter( 'manage_posts_columns', 'my_add_post_columns' );
add_filter( 'manage_pages_columns', 'my_add_post_columns' );

if ( ! function_exists( 'my_show_post_columns' ) ) {
	/**
	 * 管理画面の投稿一覧ページにオリジナルな列に表示
	 *
	 * @param string $column_name 列名.
	 * @param int    $post_id 投稿ID.
	 * @return void
	 */
	function my_show_post_columns( $column_name, $post_id ) {
		if ( 'thumbnail' === $column_name ) {
			$thumbnail_id = get_post_thumbnail_id( $post_id );
			if ( $thumbnail_id ) {
				$thumbnail_img = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail' );
				echo '<img src="' . esc_url( $thumbnail_img[0] ) . '">';
			} else {
				echo esc_html_e( 'アイキャッチ画像が設定されていません', 'raccoon' );
			}
		} elseif ( 'id' === $column_name ) {
			echo esc_html( $post_id );
		}
	}
}
add_action( 'manage_posts_custom_column', 'my_show_post_columns', 10, 2 );
add_action( 'manage_pages_custom_column', 'my_show_post_columns', 10, 2 );


if ( ! function_exists( 'my_sort_post_columns' ) ) {
	/**
	 * 管理画面の投稿一覧ページにオリジナルなソート対象列を追加
	 *
	 * @param array $columns 変更前のソート対象列の配列.
	 * @return array $columns 変更後のソート対象列の配列.
	 */
	function my_sort_post_columns( $columns ) {
		$columns['id'] = 'ID';
		return $columns;
	}
}
add_filter( 'manage_edit-post_sortable_columns', 'my_sort_post_columns' );
add_filter( 'manage_edit-page_sortable_columns', 'my_sort_post_columns' );
