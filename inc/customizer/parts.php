<?php
/**
 * My Customizer Parts
 *
 * @package WordPress
 */

if ( ! function_exists( 'my_customize_parts' ) ) {

	/**
	 * Add Customizer Layout
	 *
	 * @param object $wp_customize Customizer Object.
	 * @return void
	 */
	function my_customize_parts( $wp_customize ) {

		// Single.
		$wp_customize->add_panel(
			'my_parts',
			array(
				'priority' => 55,
				'title'    => __( 'Single', 'raccoon' ),
			)
		);

		// Contents.
		$wp_customize->add_section(
			'my_parts_content',
			array(
				'title'    => __( 'Contents', 'raccoon' ),
				'panel'    => 'my_parts',
				'priority' => 10,
			)
		);
		$wp_customize->add_setting(
			'my_parts_heading_select',
			array(
				'default' => 'heading00',
				array( 'sanitize_callback' => 'my_sanitize_select' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_heading_select',
				array(
					'label'    => __( 'Heading Pattern', 'raccoon' ),
					'section'  => 'my_parts_content',
					'settings' => 'my_parts_heading_select',
					'priority' => 1,
					'type'     => 'select',
					'choices'  => array(
						'heading00' => __( 'Default', 'raccoon' ),
						'heading01' => __( 'Pattern01', 'raccoon' ),
					),
				)
			)
		);

		// LikeBox.
		$wp_customize->add_section(
			'my_parts_likebox',
			array(
				'title'    => __( 'LikeBox', 'raccoon' ),
				'panel'    => 'my_parts',
				'priority' => 10,
			)
		);

		// Checkbox.
		$wp_customize->add_setting(
			'my_parts_likebox_check',
			array(
				'default' => false,
				array( 'sanitize_callback' => 'my_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_likebox_check',
				array(
					'label'    => __( 'Enable to Display', 'raccoon' ),
					'section'  => 'my_parts_likebox',
					'settings' => 'my_parts_likebox_check',
					'type'     => 'checkbox',
				)
			)
		);

		// Textarea.
		$wp_customize->add_setting( 'my_parts_likebox_txt', array( 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_likebox_txt',
				array(
					'label'    => __( 'Text', 'raccoon' ),
					'section'  => 'my_parts_likebox',
					'settings' => 'my_parts_likebox_txt',
					'type'     => 'textarea',
					'priority' => 1,
				)
			)
		);

		// Facebook Page URL.
		$wp_customize->add_setting( 'my_parts_likebox_url', array( 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_likebox_url',
				array(
					'label'    => __( 'Facebook Page URL', 'raccoon' ),
					'section'  => 'my_parts_likebox',
					'settings' => 'my_parts_likebox_url',
					'type'     => 'url',
					'priority' => 1,
				)
			)
		);

		// SNS Share Button.
		$wp_customize->add_section(
			'my_parts_sns',
			array(
				'title'    => __( 'SNS Share Button', 'raccoon' ),
				'panel'    => 'my_parts',
				'priority' => 20,
			)
		);

		// Checkbox(Twitter).
		$wp_customize->add_setting(
			'my_parts_sns_check_twitter',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'my_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_sns_check_twitter',
				array(
					'label'    => __( 'Twitter', 'raccoon' ),
					'section'  => 'my_parts_sns',
					'settings' => 'my_parts_sns_check_twitter',
					'type'     => 'checkbox',
				)
			)
		);

		// Checkbox(Facebook).
		$wp_customize->add_setting(
			'my_parts_sns_check_facebook',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'my_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_sns_check_facebook',
				array(
					'label'    => __( 'Facebook', 'raccoon' ),
					'section'  => 'my_parts_sns',
					'settings' => 'my_parts_sns_check_facebook',
					'type'     => 'checkbox',
				)
			)
		);

		// Checkbox(Hatena Bookmark).
		$wp_customize->add_setting(
			'my_parts_sns_check_hatena',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'my_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_sns_check_hatena',
				array(
					'label'    => __( 'Hatena Bookmark', 'raccoon' ),
					'section'  => 'my_parts_sns',
					'settings' => 'my_parts_sns_check_hatena',
					'type'     => 'checkbox',
				)
			)
		);

		// Checkbox(LINE).
		$wp_customize->add_setting(
			'my_parts_sns_check_line',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'my_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_sns_check_line',
				array(
					'label'    => __( 'LINE', 'raccoon' ),
					'section'  => 'my_parts_sns',
					'settings' => 'my_parts_sns_check_line',
					'type'     => 'checkbox',
				)
			)
		);

		// Checkbox(Pocket).
		$wp_customize->add_setting(
			'my_parts_sns_check_pocket',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'my_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_sns_check_pocket',
				array(
					'label'    => __( 'Pocket', 'raccoon' ),
					'section'  => 'my_parts_sns',
					'settings' => 'my_parts_sns_check_pocket',
					'type'     => 'checkbox',
				)
			)
		);

		// Checkbox(RSS).
		$wp_customize->add_setting(
			'my_parts_sns_check_rss',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'my_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_sns_check_rss',
				array(
					'label'    => __( 'RSS', 'raccoon' ),
					'section'  => 'my_parts_sns',
					'settings' => 'my_parts_sns_check_rss',
					'type'     => 'checkbox',
				)
			)
		);

		$wp_customize->add_setting(
			'my_parts_sns_select_type',
			array(
				'default' => 'select01',
				array( 'sanitize_callback' => 'my_sanitize_select' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_sns_select_type',
				array(
					'label'    => __( 'Button Type', 'raccoon' ),
					'section'  => 'my_parts_sns',
					'settings' => 'my_parts_sns_select_type',
					'type'     => 'select',
					'choices'  => array(
						'select01' => 'Original'
					),
				)
			)
		);

		$wp_customize->add_setting(
			'my_parts_sns_select_place',
			array(
				'default' => 'select04',
				array( 'sanitize_callback' => 'my_sanitize_select' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_sns_select_place',
				array(
					'label'    => __( 'Place', 'raccoon' ),
					'section'  => 'my_parts_sns',
					'settings' => 'my_parts_sns_select_place',
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
			'my_parts_relation',
			array(
				'title'    => __( 'Related Posts', 'raccoon' ),
				'panel'    => 'my_parts',
				'priority' => 30,
			)
		);

		// Checkbox.
		$wp_customize->add_setting(
			'my_parts_relation_check',
			array(
				'default' => false,
				array( 'sanitize_callback' => 'my_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_relation_check',
				array(
					'label'    => __( 'Enable to Display', 'raccoon' ),
					'section'  => 'my_parts_relation',
					'settings' => 'my_parts_relation_check',
					'type'     => 'checkbox',
				)
			)
		);
	}
}
add_action( 'customize_register', 'my_customize_parts' );
