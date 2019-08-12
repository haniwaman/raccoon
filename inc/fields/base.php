<?php
/**
 * My Fields Functions
 *
 * @package WordPress
 */

if ( ! function_exists( 'my_category_fields' ) ) {

	/**
	 * カラーピッカー
	 *
	 * @param string $name name属性.
	 * @param string $value value属性.
	 * @return void
	 */
	function my_colorpicker( $name, $value ) { ?>
<input type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>" >

		<?php
		wp_enqueue_script( 'wp-color-picker' );
		$data = 'jQuery(function() {
			var options = {
					defaultColor: false,
					change: function(event, ui){},
					clear: function() {},
					hide: true,
					palettes: true
			};
			jQuery("input:text[name=' . $name . ']").wpColorPicker(options);
		});';
		wp_add_inline_script( 'wp-color-picker', $data, 'after' );
	}
}
require_once get_template_directory() . '/inc/fields/category.php';
