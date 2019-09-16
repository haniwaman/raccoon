<?php
/**
 * My Customizer Layout
 *
 * @package WordPress
 */

if ( ! function_exists( 'my_customize_layout' ) ) {
	/**
	 * Add Customizer Layout
	 *
	 * @param object $wp_customize Customizer Object.
	 * @return void
	 */
	function my_customize_layout( $wp_customize ) {

		$wp_customize->add_panel(
			'my_layout',
			array(
				'title'    => __( 'Layout', 'raccoon' ),
				'priority' => 35,
			)
		);

		/* Site */
		$wp_customize->add_section(
			'my_layout_all',
			array(
				'title'    => __( 'Site', 'raccoon' ),
				'panel'    => 'my_layout',
				'priority' => 1,
			)
		);

		$wp_customize->add_setting(
			'my_layout_all_radio',
			array(
				'default'           => 'two-right',
				'sanitize_callback' => 'my_sanitize_select',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_layout_all_radio',
				array(
					'label'    => __( 'Select Column', 'raccoon' ),
					'section'  => 'my_layout_all',
					'settings' => 'my_layout_all_radio',
					'priority' => 1,
					'type'     => 'radio',
					'choices'  => array(
						'one'       => __( 'One Column', 'raccoon' ),
						'two-right' => __( 'Two Column(Side Right)', 'raccoon' ),
						'two-left'  => __( 'Two Column(Side Left)', 'raccoon' ),
					),
				)
			)
		);

		/* Archive */
		$wp_customize->add_section(
			'my_layout_archive',
			array(
				'title'    => __( 'Archive', 'raccoon' ),
				'panel'    => 'my_layout',
				'priority' => 3,
			)
		);

		$wp_customize->add_setting(
			'my_layout_archive_check',
			array(
				'default' => 'horizon',
				array( 'sanitize_callback' => 'my_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_layout_archive_check',
				array(
					'label'    => __( 'Archive Layout', 'raccoon' ),
					'section'  => 'my_layout_archive',
					'settings' => 'my_layout_archive_check',
					'priority' => 1,
					'type'     => 'radio',
					'choices'  => array(
						'horizon'  => __( 'Horizon', 'raccoon' ),
						'vertical' => __( 'Vertical', 'raccoon' ),
					),
				)
			)
		);

		/* Article */
		$wp_customize->add_section(
			'my_layout_page',
			array(
				'title'    => __( 'Article', 'raccoon' ),
				'panel'    => 'my_layout',
				'priority' => 3,
			)
		);
	}
}
add_action( 'customize_register', 'my_customize_layout' );
