<?php
/**
 * My Fields Functions
 *
 * @package WordPress
 */


if ( ! function_exists( 'my_tag_fields_edit' ) ) {

	/**
	 * タグ編集画面に入力項目の追加
	 *
	 * @param object $tag タグのオブジェクト.
	 * @return void
	 */
	function my_tag_fields_edit( $tag ) {

		$tag_meta = get_term_meta( $tag->term_id );
		?>

<tr class="form-field">
	<th><label for="color">色</label></th>
	<td>
		<input name="my_tag_meta[my_tag_color]" class="my_color_picker" type="text" value="
		<?php
		if ( isset( $tag_meta['my_tag_color'][0] ) ) {
			echo esc_html( $tag_meta['my_tag_color'][0] );}
		?>
		" size="40">
		<p class="description">タグに紐づく色です。</p>
	</td>
</tr>
		<?php
	}
}
add_action( 'edit_tag_form_fields', 'my_tag_fields_edit' );

if ( ! function_exists( 'my_tag_fields_set' ) ) {

	/**
	 * タグ追加画面に入力項目の追加
	 *
	 * @param object $tag タグのオブジェクト.
	 * @return void
	 */
	function my_tag_fields_set( $tag ) {

		$default_color = '#666';
		?>

<div class="form-field">
	<label for="color">色</label>
	<input name="my_tag_meta[my_tag_color]" class="my_color_picker" type="text" value="<?php echo esc_html( $default_color ); ?>" size="40">
	<p class="description">タグに紐づく色です。</p>
</div>
		<?php
	}
}
add_action( 'post_tag_add_form_fields', 'my_tag_fields_set' );

/**
 * タグの入力項目の保存
 *
 * @param int $tag_id タグID.
 * @return void
 */
function my_tag_fileds_save( $tag_id ) {

	if ( isset( $_POST['my_tag_meta'] ) ) {
		$tag_keys = array_keys( $_POST['my_tag_meta'] );
		foreach ( $tag_keys as $key ) {
			update_term_meta( $tag_id, $key, $_POST['my_tag_meta'][ $key ] );
		}
	}
}
add_action( 'created_term', 'my_tag_fileds_save' );
add_action( 'edited_term', 'my_tag_fileds_save' );
