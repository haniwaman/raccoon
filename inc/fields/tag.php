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
	<th><label for="color"><?php esc_html_e( '色', 'raccoon' ); ?></label></th>
	<td>
		<input name="my_tag_color" class="my-color-picker" type="text" value="
		<?php
		if ( isset( $tag_meta['my_tag_color'][0] ) ) {
			echo esc_html( $tag_meta['my_tag_color'][0] );}
		?>
		" size="40">
		<p class="description"><?php esc_html_e( 'タグに紐づく色です。', 'raccoon' ); ?></p>
	</td>
</tr>
<tr class="form-field">
	<th><label><?php esc_html_e( '画像', 'raccoon' ); ?></label></th>
	<td>
		<div class="my-img-btns">
			<div class="my-btn my-img-select"><span class="my-img-icon"></span><?php esc_html_e( '画像を選択', 'raccoon' ); ?></div>
			<div class="my-btn my-img-clear"><?php esc_html_e( '画像をクリア', 'raccoon' ); ?></div>
		</div><!-- /my-img-btns -->
		<input name="my_tag_img" class="my-img-url" type="hidden" value="
		<?php
		if ( isset( $tag_meta['my_tag_img'][0] ) ) {
			echo esc_html( $tag_meta['my_tag_img'][0] );}
		?>
		" size="40">
		<div class="my-img-show">
			<?php if ( isset( $tag_meta['my_tag_img'][0] ) ) : ?>
				<img src="<?php echo esc_html( $tag_meta['my_tag_img'][0] ); ?>">
			<?php endif; ?>
		</div><!-- /my-img-show -->
		<p class="description"><?php esc_html_e( 'タグに紐づく画像です。', 'raccoon' ); ?></p>
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
	<label for="color"><?php esc_html_e( '色', 'raccoon' ); ?></label>
	<input name="my_tag_color" class="my-color-picker" type="text" value="<?php echo esc_html( $default_color ); ?>" size="40">
	<p class="description"><?php esc_html_e( 'タグに紐づく色です。', 'raccoon' ); ?></p>
</div><!-- /form-field -->

<div class="form-field">
	<label><?php esc_html_e( '画像', 'raccoon' ); ?></label>
	<div class="my-img-btns">
		<div class="my-btn my-img-select"><span class="my-img-icon"></span><?php esc_html_e( '画像を選択', 'raccoon' ); ?></div>
		<div class="my-btn my-img-clear"><?php esc_html_e( '画像をクリア', 'raccoon' ); ?></div>
	</div><!-- /my-img-btns -->
	<input name="my_tag_img" class="my-img-url" type="hidden" value="" size="40">
	<div class="my-img-show">
		<?php if ( isset( $tag_meta['my_tag_img'][0] ) ) : ?>
			<img src="<?php echo esc_html( $tag_meta['my_tag_img'][0] ); ?>">
		<?php endif; ?>
	</div><!-- /my-img-show -->
	<p class="description"><?php esc_html_e( 'タグに紐づく画像です。', 'raccoon' ); ?></p>
</div><!-- /form-field -->
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

	if ( isset( $_POST['my_tag_color'] ) ) {
		update_term_meta( $tag_id, 'my_tag_color', sanitize_hex_color( trim( $_POST['my_tag_color'] ) ) );
	}

	if ( isset( $_POST['my_tag_img'] ) ) {
		update_term_meta( $tag_id, 'my_tag_img', esc_url_raw( trim( $_POST['my_tag_img'] ) ) );
	}
}
add_action( 'created_term', 'my_tag_fileds_save' );
add_action( 'edited_term', 'my_tag_fileds_save' );
