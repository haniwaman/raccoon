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
	<th><label><?php esc_html_e( '色', 'raccoon' ); ?></label></th>
	<td>
		<input name="my_category_color" class="my-color-picker" type="text" value="
		<?php
		if ( isset( $cat_meta['my_category_color'][0] ) ) {
			echo esc_html( $cat_meta['my_category_color'][0] );}
		?>
		" size="40">
		<p class="description"><?php esc_html_e( 'カテゴリーに紐づく色です。', 'raccoon' ); ?></p>
	</td>
</tr>
<tr class="form-field">
	<th><label>画像</label></th>
	<td>
		<div class="my-img-btns">
			<div class="my-btn my-img-select"><span class="my-img-icon"></span><?php esc_html_e( '画像を選択', 'raccoon' ); ?></div>
			<div class="my-btn my-img-clear"><?php esc_html_e( '画像をクリア', 'raccoon' ); ?></div>
		</div><!-- /my-img-btns -->
		<input name="my_category_img" class="my-img-url" type="hidden" value="
		<?php
		if ( isset( $cat_meta['my_category_img'][0] ) ) {
			echo esc_html( $cat_meta['my_category_img'][0] );}
		?>
		" size="40">
		<div class="my-img-show">
			<?php if ( isset( $cat_meta['my_category_img'][0] ) ) : ?>
				<img src="<?php echo esc_html( $cat_meta['my_category_img'][0] ); ?>">
			<?php endif; ?>
		</div><!-- /my-img-show -->
	<p class="description"><?php esc_html_e( 'カテゴリーに紐づく画像です。', 'raccoon' ); ?></p>
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
	<label for="color"><?php esc_html_e( '色', 'raccoon' ); ?></label>
	<input name="my_category_color" class="my-color-picker" type="text" value="<?php echo esc_html( $default_color ); ?>" size="40">
	<p class="description"><?php esc_html_e( 'カテゴリーに紐づく色です。', 'raccoon' ); ?></p>
</div><!-- /form-field -->

<div class="form-field">
	<label><?php esc_html_e( '画像', 'raccoon' ); ?></label>
	<div class="my-img-btns">
		<div class="my-btn my-img-select"><span class="my-img-icon"></span><?php esc_html_e( '画像を選択', 'raccoon' ); ?></div>
		<div class="my-btn my-img-clear"><?php esc_html_e( '画像をクリア', 'raccoon' ); ?></div>
	</div><!-- /my-img-btns -->
	<input name="my_category_img" class="my-img-url" type="hidden" value="" size="40">
	<div class="my-img-show">
		<?php if ( isset( $cat_meta['my_category_img'][0] ) ) : ?>
			<img src="<?php echo esc_html( $cat_meta['my_category_img'][0] ); ?>">
		<?php endif; ?>
	</div><!-- /my-img-show -->
	<p class="description"><?php esc_html_e( 'カテゴリーに紐づく画像です。', 'raccoon' ); ?></p>
</div><!-- /form-field -->
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

	if ( isset( $_POST['my_category_color'] ) ) {
		update_term_meta( $category_id, 'my_category_color', sanitize_hex_color( trim( $_POST['my_category_color'] ) ) );
	}

	if ( isset( $_POST['my_category_img'] ) ) {
		update_term_meta( $category_id, 'my_category_img', esc_url_raw( trim( $_POST['my_category_img'] ) ) );
	}
}
add_action( 'created_term', 'my_category_fileds_save' );
add_action( 'edited_term', 'my_category_fileds_save' );
