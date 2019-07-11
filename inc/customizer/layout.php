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

		// レイアウト.
		$wp_customize->add_panel(
			'my_layout',
			array(
				'priority' => 35,
				'title'    => __( 'レイアウト', 'raccoon' ),
			)
		);

		// 固定.
		$wp_customize->add_section(
			'my_layout_page',
			array(
				'title'    => __( '固定', 'raccoon' ),
				'panel'    => 'my_layout',
				'priority' => 20,
			)
		);

		// 固定のパターン.
		$wp_customize->add_setting( 'my_layout_page_radio' );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_layout_page_radio',
				array(
					'label'    => __( '固定のパターン', 'raccoon' ),
					'section'  => 'my_layout_page',
					'settings' => 'my_layout_page_radio',
					'priority' => 1,
					'type'     => 'radio',
					'choices'  => array(
						'radio1' => 'レイアウト1',
						'radio2' => 'レイアウト2',
						'radio3' => 'レイアウト3',
					),
				)
			)
		);

		// 投稿.
		$wp_customize->add_section(
			'my_layout_single',
			array(
				'title'    => __( '投稿', 'raccoon' ),
				'panel'    => 'my_layout',
				'priority' => 10,
			)
		);

		// 投稿のパターン.
		$wp_customize->add_setting( 'my_layout_single_radio' );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_layout_single_radio',
				array(
					'label'    => __( '投稿のパターン', 'raccoon' ),
					'section'  => 'my_layout_single',
					'settings' => 'my_layout_single_radio',
					'priority' => 1,
					'type'     => 'radio',
					'choices'  => array(
						'radio1' => 'レイアウト1',
						'radio2' => 'レイアウト2',
						'radio3' => 'レイアウト3',
					),
				)
			)
		);

		// 一覧.
		$wp_customize->add_section(
			'my_layout_archive',
			array(
				'title'    => __( '一覧', 'raccoon' ),
				'panel'    => 'my_layout',
				'priority' => 20,
			)
		);

		// 一覧のパターン.
		$wp_customize->add_setting( 'my_layout_archive_radio' );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_layout_archive_radio',
				array(
					'label'    => __( '一覧のパターン', 'raccoon' ),
					'section'  => 'my_layout_archive',
					'settings' => 'my_layout_archive_radio',
					'priority' => 1,
					'type'     => 'radio',
					'choices'  => array(
						'radio1' => 'レイアウト1',
						'radio2' => 'レイアウト2',
						'radio3' => 'レイアウト3',
					),
				)
			)
		);
	}
}
add_action( 'customize_register', 'my_customize_layout' );
