<?php
/**
 * My Customizer Performance
 *
 * @package WordPress
 */

if ( ! function_exists( 'my_customize_performance' ) ) {

	/**
	 * Add Customizer Performance
	 *
	 * @param object $wp_customize Customizer Object.
	 * @return void
	 */
	function my_customize_performance( $wp_customize ) {

		// Performance.
		$wp_customize->add_panel(
			'my_performance',
			array(
				'priority' => 55,
				'title'    => __( 'Performance', 'raccoon' ),
			)
		);

		// CSS Inline.
		$wp_customize->add_section(
			'my_performance_inline',
			array(
				'title'    => __( 'CSS Inline', 'raccoon' ),
				'panel'    => 'my_performance',
				'priority' => 10,
			)
		);
		// Checkbox.
		$wp_customize->add_setting(
			'my_performance_inline_check',
			array(
				'default' => false,
				array( 'sanitize_callback' => 'my_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_performance_inline_check',
				array(
					'label'    => __( 'Enable to CSS Inline', 'raccoon' ),
					'section'  => 'my_performance_inline',
					'settings' => 'my_performance_inline_check',
					'type'     => 'checkbox',
				)
			)
		);
	}
}
add_action( 'customize_register', 'my_customize_performance' );
