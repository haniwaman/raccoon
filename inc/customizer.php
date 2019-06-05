<?php
/**
 * My Customizer
 *
 * @package WordPress
 */

/**
 * カスタマイザー追加
 *
 * @param object $wp_customize カスタマイザーを管理するオブジェクト.
 * @return void
 */
function my_customize_register( $wp_customize ) {

	/* base_color */
	$wp_customize->add_setting( 'my_base_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'headerbase_color_background_color',
			array(
				'label'    => __( 'ベース色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_base_color',
				'priority' => 1,
			)
		)
	);

	/* background_color */
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'background_color',
			array(
				'label'    => __( '背景色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'background_color',
				'priority' => 2,
			)
		)
	);

	/* header_textcolor */
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_textcolor',
			array(
				'label'    => __( 'ヘッダーテキスト色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'header_textcolor',
				'priority' => 3,
			)
		)
	);

	/* header_background_color */
	$wp_customize->add_setting( 'my_header_background_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_header_background_color',
			array(
				'label'    => __( 'ヘッダー背景色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_header_background_color',
				'priority' => 4,
			)
		)
	);

	/* header_logo_color */
	$wp_customize->add_setting( 'my_header_logo_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_header_logo_color',
			array(
				'label'    => __( 'ロゴテキスト色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_header_logo_color',
				'priority' => 5,
			)
		)
	);

	/* header_infomation_text_color */
	$wp_customize->add_setting( 'my_header_infomation_text_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_header_infomation_text_color',
			array(
				'label'    => __( 'お知らせテキスト色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_header_infomation_text_color',
				'priority' => 6,
			)
		)
	);

	/* header_infomation_background_color */
	$wp_customize->add_setting( 'my_header_infomation_background_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_header_infomation_background_color',
			array(
				'label'    => __( 'お知らせ背景色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_header_infomation_background_color',
				'priority' => 7,
			)
		)
	);

	/* widget_heading_text_color */
	$wp_customize->add_setting( 'my_widget_title_text_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_widget_title_text_color',
			array(
				'label'    => __( 'ウィジェット見出しテキスト色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_widget_title_text_color',
				'priority' => 8,
			)
		)
	);

	/* widget_title_background_color */
	$wp_customize->add_setting( 'my_widget_title_background_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_widget_title_background_color',
			array(
				'label'    => __( 'ウィジェット見出し背景色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_widget_title_background_color',
				'priority' => 9,
			)
		)
	);

	/* btn_textcolor */
	$wp_customize->add_setting( 'my_btn_textcolor' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_btn_textcolor',
			array(
				'label'    => __( 'ボタンテキスト色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_btn_textcolor',
				'priority' => 10,
			)
		)
	);

	/* btn_background_color */
	$wp_customize->add_setting( 'my_btn_background_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_btn_background_color',
			array(
				'label'    => __( 'ボタン背景色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_btn_background_color',
				'priority' => 11,
			)
		)
	);
}
add_action( 'customize_register', 'my_customize_register' );
