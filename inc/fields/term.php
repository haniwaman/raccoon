<?php
/**
 * My Fields Functions
 *
 * @package WordPress
 */


if ( ! function_exists( 'my_term_fields_edit' ) ) {

	/**
	 * ターム編集画面に入力項目の追加
	 *
	 * @param object $term タームのオブジェクト.
	 * @return void
	 */
	function my_term_fields_edit( $term ) {

		$term_meta = get_term_meta( $term->term_id );
		$term_name = '';
		switch ( $term->taxonomy ) {
			case 'category':
				$term_name = 'カテゴリー';
				break;
			case 'post_tag':
				$term_name = 'タグ';
				break;
			default:
				$term_name = 'ターム';
				break;
		}
		?>

<tr class="form-field">
	<th><label><?php esc_html_e( '色', 'raccoon' ); ?></label></th>
	<td>
		<input name="my_term_color" class="my-color-picker" type="text" value="
		<?php
		if ( isset( $term_meta['my_term_color'][0] ) ) {
			echo esc_html( $term_meta['my_term_color'][0] );}
		?>
		" size="40">
		<p class="description"><?php echo esc_html( $term_name ) . esc_html__( 'に紐づく色です。', 'raccoon' ); ?></p>
	</td>
</tr>
<tr class="form-field">
	<th><label><?php esc_html_e( '画像', 'raccoon' ); ?></label></th>
	<td>
		<div class="my-img-btns">
			<div class="my-btn my-img-select"><span class="my-img-icon"></span><?php esc_html_e( '画像を選択', 'raccoon' ); ?></div>
			<div class="my-btn my-img-clear"><?php esc_html_e( '画像をクリア', 'raccoon' ); ?></div>
		</div><!-- /my-img-btns -->
		<input name="my_term_img" class="my-img-url" type="hidden" value="
		<?php
		if ( isset( $term_meta['my_term_img'][0] ) ) {
			echo esc_html( $term_meta['my_term_img'][0] );}
		?>
		" size="40">
		<div class="my-img-show">
			<?php if ( isset( $term_meta['my_term_img'][0] ) ) : ?>
				<img src="<?php echo esc_html( $term_meta['my_term_img'][0] ); ?>">
			<?php endif; ?>
		</div><!-- /my-img-show -->
	<p class="description"><?php echo esc_html( $term_name ) . esc_html__( 'に紐づく画像です。', 'raccoon' ); ?></p>
	</td>
</tr>
		<?php
	}
}
add_action( 'edit_category_form_fields', 'my_term_fields_edit' );
add_action( 'edit_tag_form_fields', 'my_term_fields_edit' );

if ( ! function_exists( 'my_term_fields_set' ) ) {

	/**
	 * ターム追加画面に入力項目の追加
	 *
	 * @param object $term ターム（スラッグ）名.
	 * @return void
	 */
	function my_term_fields_set( $term ) {

		$default_color = '#666';
		$term_name     = '';
		switch ( $term ) {
			case 'category':
				$term_name = 'カテゴリー';
				break;
			case 'post_tag':
				$term_name = 'タグ';
				break;
			default:
				$term_name = 'ターム';
				break;
		}
		?>

<div class="form-field">
	<label for="color"><?php esc_html_e( '色', 'raccoon' ); ?></label>
	<input name="my_term_color" class="my-color-picker" type="text" value="<?php echo esc_html( $default_color ); ?>" size="40">
	<p class="description"><?php echo esc_html( $term_name ) . esc_html__( 'に紐づく色です。', 'raccoon' ); ?></p>
</div><!-- /form-field -->

<div class="form-field">
	<label><?php esc_html_e( '画像', 'raccoon' ); ?></label>
	<div class="my-img-btns">
		<div class="my-btn my-img-select"><span class="my-img-icon"></span><?php esc_html_e( '画像を選択', 'raccoon' ); ?></div>
		<div class="my-btn my-img-clear"><?php esc_html_e( '画像をクリア', 'raccoon' ); ?></div>
	</div><!-- /my-img-btns -->
	<input name="my_term_img" class="my-img-url" type="hidden" value="" size="40">
	<div class="my-img-show">
		<?php if ( isset( $term_meta['my_term_img'][0] ) ) : ?>
			<img src="<?php echo esc_html( $term_meta['my_term_img'][0] ); ?>">
		<?php endif; ?>
	</div><!-- /my-img-show -->
	<p class="description"><?php echo esc_html( $term_name ) . esc_html__( 'に紐づく画像です。', 'raccoon' ); ?></p>
</div><!-- /form-field -->
		<?php
	}
}
add_action( 'category_add_form_fields', 'my_term_fields_set' );
add_action( 'post_tag_add_form_fields', 'my_term_fields_set' );

/**
 * タームの入力項目の保存
 *
 * @param int $term_id タームID.
 * @return void
 */
function my_term_fileds_save( $term_id ) {

	if ( isset( $_POST['my_term_color'] ) ) {
		update_term_meta( $term_id, 'my_term_color', sanitize_hex_color( trim( $_POST['my_term_color'] ) ) );
	}

	if ( isset( $_POST['my_term_img'] ) ) {
		update_term_meta( $term_id, 'my_term_img', esc_url_raw( trim( $_POST['my_term_img'] ) ) );
	}
}
add_action( 'created_term', 'my_term_fileds_save' );
add_action( 'edited_term', 'my_term_fileds_save' );
