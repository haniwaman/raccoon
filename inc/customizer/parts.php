<?php
/**
 * Raccoon Customizer Parts
 */

if ( ! function_exists( 'raccoon_customize_parts' ) ) {

	/**
	 * Add Customizer Layout
	 *
	 * @param object $wp_customize Customizer Object.
	 * @return void
	 */
	function raccoon_customize_parts( $wp_customize ) {

		// Single.
		$wp_customize->add_panel(
			'raccoon_parts',
			array(
				'priority' => 55,
				'title'    => __( 'Single', 'raccoon' ),
			)
		);

		// Contents.
		$wp_customize->add_section(
			'raccoon_parts_content',
			array(
				'title'    => __( 'Contents', 'raccoon' ),
				'panel'    => 'raccoon_parts',
				'priority' => 10,
			)
		);
		$wp_customize->add_setting(
			'raccoon_parts_heading_select',
			array(
				'default' => 'heading00',
				array( 'sanitize_callback' => 'raccoon_sanitize_select' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_parts_heading_select',
				array(
					'label'    => __( 'Heading Pattern', 'raccoon' ),
					'section'  => 'raccoon_parts_content',
					'settings' => 'raccoon_parts_heading_select',
					'priority' => 1,
					'type'     => 'select',
					'choices'  => array(
						'heading00' => __( 'Default', 'raccoon' ),
						'heading01' => __( 'Pattern01', 'raccoon' ),
					),
				)
			)
		);

		// SNS Share Button.
		$wp_customize->add_section(
			'raccoon_parts_sns',
			array(
				'title'    => __( 'SNS Share Button', 'raccoon' ),
				'panel'    => 'raccoon_parts',
				'priority' => 20,
			)
		);

		// Checkbox(Twitter).
		$wp_customize->add_setting(
			'raccoon_parts_sns_check_twitter',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'raccoon_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_parts_sns_check_twitter',
				array(
					'label'    => __( 'Twitter', 'raccoon' ),
					'section'  => 'raccoon_parts_sns',
					'settings' => 'raccoon_parts_sns_check_twitter',
					'type'     => 'checkbox',
				)
			)
		);

		// Checkbox(Facebook).
		$wp_customize->add_setting(
			'raccoon_parts_sns_check_facebook',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'raccoon_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_parts_sns_check_facebook',
				array(
					'label'    => __( 'Facebook', 'raccoon' ),
					'section'  => 'raccoon_parts_sns',
					'settings' => 'raccoon_parts_sns_check_facebook',
					'type'     => 'checkbox',
				)
			)
		);

		// Checkbox(Hatena Bookmark).
		$wp_customize->add_setting(
			'raccoon_parts_sns_check_hatena',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'raccoon_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_parts_sns_check_hatena',
				array(
					'label'    => __( 'Hatena Bookmark', 'raccoon' ),
					'section'  => 'raccoon_parts_sns',
					'settings' => 'raccoon_parts_sns_check_hatena',
					'type'     => 'checkbox',
				)
			)
		);

		// Checkbox(LINE).
		$wp_customize->add_setting(
			'raccoon_parts_sns_check_line',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'raccoon_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_parts_sns_check_line',
				array(
					'label'    => __( 'LINE', 'raccoon' ),
					'section'  => 'raccoon_parts_sns',
					'settings' => 'raccoon_parts_sns_check_line',
					'type'     => 'checkbox',
				)
			)
		);

		// Checkbox(Pocket).
		$wp_customize->add_setting(
			'raccoon_parts_sns_check_pocket',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'raccoon_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_parts_sns_check_pocket',
				array(
					'label'    => __( 'Pocket', 'raccoon' ),
					'section'  => 'raccoon_parts_sns',
					'settings' => 'raccoon_parts_sns_check_pocket',
					'type'     => 'checkbox',
				)
			)
		);

		// Checkbox(RSS).
		$wp_customize->add_setting(
			'raccoon_parts_sns_check_rss',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'raccoon_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_parts_sns_check_rss',
				array(
					'label'    => __( 'RSS', 'raccoon' ),
					'section'  => 'raccoon_parts_sns',
					'settings' => 'raccoon_parts_sns_check_rss',
					'type'     => 'checkbox',
				)
			)
		);

		$wp_customize->add_setting(
			'raccoon_parts_sns_select_type',
			array(
				'default' => 'select01',
				array( 'sanitize_callback' => 'raccoon_sanitize_select' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_parts_sns_select_type',
				array(
					'label'    => __( 'Button Type', 'raccoon' ),
					'section'  => 'raccoon_parts_sns',
					'settings' => 'raccoon_parts_sns_select_type',
					'type'     => 'select',
					'choices'  => array(
						'select01' => 'Original',
					),
				)
			)
		);

		$wp_customize->add_setting(
			'raccoon_parts_sns_select_place',
			array(
				'default' => 'select04',
				array( 'sanitize_callback' => 'raccoon_sanitize_select' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_parts_sns_select_place',
				array(
					'label'    => __( 'Place', 'raccoon' ),
					'section'  => 'raccoon_parts_sns',
					'settings' => 'raccoon_parts_sns_select_place',
					'type'     => 'select',
					'choices'  => array(
						'select01' => 'Above Contents',
						'select02' => 'Below Contents',
						'select03' => 'Between Contents',
						'select04' => 'Not Display',
					),
				)
			)
		);

		// Related Posts.
		$wp_customize->add_section(
			'raccoon_parts_relation',
			array(
				'title'    => __( 'Related Posts', 'raccoon' ),
				'panel'    => 'raccoon_parts',
				'priority' => 30,
			)
		);

		// Checkbox.
		$wp_customize->add_setting(
			'raccoon_parts_relation_check',
			array(
				'default' => false,
				array( 'sanitize_callback' => 'raccoon_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_parts_relation_check',
				array(
					'label'    => __( 'Enable to Display', 'raccoon' ),
					'section'  => 'raccoon_parts_relation',
					'settings' => 'raccoon_parts_relation_check',
					'type'     => 'checkbox',
				)
			)
		);
	}
}
add_action( 'customize_register', 'raccoon_customize_parts' );
