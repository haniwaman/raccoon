<?php
/**
 * My Fields Functions
 *
 * @package WordPress
 */


if ( ! function_exists( 'my_category_fields_edit' ) ) {

	/**
	 * カテゴリー編集画面に入力項目の追加
	 *
	 * @param object $category カテゴリーのオブジェクト.
	 * @return void
	 */
	function my_category_fields_edit( $category ) {

		$cat_meta = get_term_meta( $category->term_id );
		?>

<tr class="form-field">
	<th><label for="color">色</label></th>
	<td>
		<input name="my_category_meta[my_category_color]" class="my_color_picker" type="text" value="
		<?php
		if ( isset( $cat_meta['my_category_color'][0] ) ) {
			echo esc_html( $cat_meta['my_category_color'][0] );}
		?>
		" size="40">
		<p class="description">カテゴリーに紐づく色です。</p>
	</td>
</tr>
		<?php
	}
}
add_action( 'edit_category_form_fields', 'my_category_fields_edit' );

if ( ! function_exists( 'my_category_fields_set' ) ) {

	/**
	 * カテゴリー追加画面に入力項目の追加
	 *
	 * @param object $category カテゴリーのオブジェクト.
	 * @return void
	 */
	function my_category_fields_set( $category ) {

		$default_color = '#666';
		?>

<div class="form-field">
	<label for="color">色</label>
	<input name="my_category_meta[my_category_color]" class="my_color_picker" type="text" value="<?php echo esc_html( $default_color ); ?>" size="40">
	<p class="description">カテゴリーに紐づく色です。</p>
</div>
		<?php
	}
}
add_action( 'category_add_form_fields', 'my_category_fields_set' );

/**
 * カテゴリーの入力項目の保存
 *
 * @param int $category_id カテゴリーID.
 * @return void
 */
function my_category_fileds_save( $category_id ) {

	if ( isset( $_POST['my_category_meta'] ) ) {
		$category_keys = array_keys( $_POST['my_category_meta'] );
		foreach ( $category_keys as $key ) {
			update_term_meta( $category_id, $key, $_POST['my_category_meta'][ $key ] );
		}
	}
}
add_action( 'edited_term', 'my_category_fileds_save' );
