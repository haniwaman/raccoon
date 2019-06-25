<?php
/**
 * My Customizer
 *
 * @package WordPress
 */

/**
 * カスタマイザーの管理
 *
 * @param object $wp_customize カスタマイザーを管理するオブジェクト.
 * @return void
 */
function my_customize_register( $wp_customize ) {

	/* my_widget_background */
	$wp_customize->add_setting( 'my_widget_background' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_widget_background',
			array(
				'label'    => __( 'ウィジェット 見出し背景色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_widget_background',
				'priority' => 1,
			)
		)
	);
	/* my_widget_color */
	$wp_customize->add_setting( 'my_widget_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_widget_color',
			array(
				'label'    => __( 'ウィジェット 見出しテキスト色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_widget_color',
				'priority' => 2,
			)
		)
	);

	/* my_btn_background */
	$wp_customize->add_setting( 'my_btn_background' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_btn_background',
			array(
				'label'    => __( 'ボタン 背景色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_btn_background',
				'priority' => 3,
			)
		)
	);
	/* my_btn_color */
	$wp_customize->add_setting( 'my_btn_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_btn_color',
			array(
				'label'    => __( 'ボタン テキスト色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_btn_color',
				'priority' => 4,
			)
		)
	);

	/* my_floating_background */
	$wp_customize->add_setting( 'my_floating_background' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_floating_background',
			array(
				'label'    => __( 'フローティング 背景色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_floating_background',
				'priority' => 5,
			)
		)
	);
	/* my_floating_color */
	$wp_customize->add_setting( 'my_floating_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_floating_color',
			array(
				'label'    => __( 'フローティング テキスト色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_floating_color',
				'priority' => 6,
			)
		)
	);

	/* my_pickup_background */
	$wp_customize->add_setting( 'my_pickup_background' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_pickup_background',
			array(
				'label'    => __( 'ピックアップ 背景色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_pickup_background',
				'priority' => 7,
			)
		)
	);
	/* my_pickup_color */
	$wp_customize->add_setting( 'my_pickup_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_pickup_color',
			array(
				'label'    => __( 'ピックアップ テキスト色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_pickup_color',
				'priority' => 8,
			)
		)
	);

	/* my_pagenation_background */
	$wp_customize->add_setting( 'my_pagenation_background' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_pagenation_background',
			array(
				'label'    => __( 'ページネーション 背景色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_pagenation_background',
				'priority' => 9,
			)
		)
	);
	/* my_pagenation_color */
	$wp_customize->add_setting( 'my_pagenation_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_pagenation_color',
			array(
				'label'    => __( 'ページネーション テキスト色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_pagenation_color',
				'priority' => 10,
			)
		)
	);

	/* my_infomation_background */
	$wp_customize->add_setting( 'my_infomation_background' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_infomation_background',
			array(
				'label'    => __( 'インフォメーション 背景色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_infomation_background',
				'priority' => 11,
			)
		)
	);
	/* my_infomation_color */
	$wp_customize->add_setting( 'my_infomation_color' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_infomation_color',
			array(
				'label'    => __( 'インフォメーション テキスト色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_infomation_color',
				'priority' => 12,
			)
		)
	);

	/* my_footer_background */
	$wp_customize->add_setting( 'my_footer_background' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_footer_background',
			array(
				'label'    => __( 'フッター 背景色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_footer_background',
				'priority' => 13,
			)
		)
	);

	/* my_twitter_background */
	$wp_customize->add_setting( 'my_twitter_background' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_twitter_background',
			array(
				'label'    => __( 'Twitter色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_twitter_background',
				'priority' => 11,
			)
		)
	);

	/* my_facebook_background */
	$wp_customize->add_setting( 'my_facebook_background' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_facebook_background',
			array(
				'label'    => __( 'Facebook色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_facebook_background',
				'priority' => 11,
			)
		)
	);

	/* my_hatena_background */
	$wp_customize->add_setting( 'my_hatena_background' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_hatena_background',
			array(
				'label'    => __( 'はてな色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_hatena_background',
				'priority' => 11,
			)
		)
	);

	/* my_line_background */
	$wp_customize->add_setting( 'my_line_background' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_line_background',
			array(
				'label'    => __( 'LINE色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_line_background',
				'priority' => 11,
			)
		)
	);

	/* my_pocket_background */
	$wp_customize->add_setting( 'my_pocket_background' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_pocket_background',
			array(
				'label'    => __( 'Pocket色', 'raccoon' ),
				'section'  => 'colors',
				'settings' => 'my_pocket_background',
				'priority' => 11,
			)
		)
	);
}
add_action( 'customize_register', 'my_customize_register' );
