<?php
/**
 * My Customizer Layout
 *
 * @package WordPress
 */

if ( ! function_exists( 'my_customize_layout' ) ) {

	/**
	 * カスタマイザーの管理
	 *
	 * @param object $wp_customize カスタマイザーを管理するオブジェクト.
	 * @return void
	 */
	function my_customize_layout( $wp_customize ) {

		$wp_customize->add_panel(
			'my_layout',
			array(
				'title'    => __( 'レイアウト', 'raccoon' ),
				'priority' => 35,
			)
		);

		/* 全体 */
		$wp_customize->add_section(
			'my_layout_all',
			array(
				'title'    => __( '全体', 'raccoon' ),
				'panel'    => 'my_layout',
				'priority' => 1,
			)
		);

		$wp_customize->add_setting( 'my_layout_all_radio', array( 'default' => 'two-right', 'sanitize_callback' => 'my_sanitize_select' ) );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_layout_all_radio',
				array(
					'label'    => __( 'カラム選択', 'raccoon' ),
					'section'  => 'my_layout_all',
					'settings' => 'my_layout_all_radio',
					'priority' => 1,
					'type'     => 'radio',
					'choices'  => array(
						'one' => '1カラム',
						'two-right' => '2カラム（サイドメニュー右）',
						'two-left' => '2カラム（サイドメニュー左）',
					),
				)
			)
		);

		/* ヘッダー */
		$wp_customize->add_section(
			'my_layout_header',
			array(
				'title'    => __( 'ヘッダー', 'raccoon' ),
				'panel'    => 'my_layout',
				'priority' => 2,
			)
		);

		$wp_customize->add_setting( 'my_layout_header_check', array( 'default' => false, array( 'sanitize_callback' => 'my_sanitize_checkbox' ), ) );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_layout_header_check',
				array(
					'label'    => __( 'インフォメーション', 'raccoon' ),
					'section'  => 'my_layout_header',
					'settings' => 'my_layout_header_check',
					'priority' => 1,
					'type'     => 'checkbox',
				)
			)
		);
	}
}
add_action( 'customize_register', 'my_customize_layout' );
