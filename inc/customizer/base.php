<?php
/**
 * My Customizer Function
 *
 * @package WordPress
 */

require_once get_template_directory() . '/inc/customizer/color.php';
require_once get_template_directory() . '/inc/customizer/sns.php';
require_once get_template_directory() . '/inc/customizer/parts.php';
require_once get_template_directory() . '/inc/customizer/layout.php';

if ( ! function_exists( 'my_sanitize_checkbox' ) ) {
	/**
	 * チェックボックスのサニタイズ
	 *
	 * @param [type] $checked チェックボックスの値.
	 * @return boolean trueかfalseで返す.
	 */
	function my_sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}
}


if ( ! function_exists( 'my_sanitize_select' ) ) {
	/**
	 * ラジオボタンとセレクトボックスのサニタイズ
	 *
	 * @param [type] $input .
	 * @param [type] $setting .
	 * @return [type] .
	 */
	function my_sanitize_select( $input, $setting ) {
		$input   = sanitize_key( $input );
		$choices = $setting->manager->get_control( $setting->id )->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}


if ( ! function_exists( 'my_sanitize_image' ) ) {
	/**
	 * アップロード画像のサニタイズ
	 *
	 * @param [type] $image .
	 * @param [type] $setting .
	 * @return [type] .
	 */
	function my_sanitize_image( $image, $setting ) {
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'bmp'          => 'image/bmp',
			'tif|tiff'     => 'image/tiff',
			'ico'          => 'image/x-icon',
		);
		$file  = wp_check_filetype( $image, $mimes );
		return ( $file['ext'] ? $image : $setting->default );
	}
}
