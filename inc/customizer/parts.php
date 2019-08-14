<?php
/**
 * My Customizer Parts
 *
 * @package WordPress
 */

if ( ! function_exists( 'my_customize_parts' ) ) {

	/**
	 * カスタマイザーの管理
	 *
	 * @param object $wp_customize カスタマイザーを管理するオブジェクト.
	 * @return void
	 */
	function my_customize_parts( $wp_customize ) {

		// 投稿.
		$wp_customize->add_panel(
			'my_parts',
			array(
				'priority' => 55,
				'title'    => __( '投稿', 'raccoon' ),
			)
		);

		// いいねボックス.
		$wp_customize->add_section(
			'my_parts_likebox',
			array(
				'title'    => __( 'いいねボックス', 'raccoon' ),
				'panel'    => 'my_parts',
				'priority' => 10,
			)
		);

		// チェックボックス.
		$wp_customize->add_setting(
			'my_parts_likebox_check',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'my_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_likebox_check',
				array(
					'label'    => __( '表示する', 'raccoon' ),
					'section'  => 'my_parts_likebox',
					'settings' => 'my_parts_likebox_check',
					'type'     => 'checkbox',
				)
			)
		);

		// テキストエリア.
		$wp_customize->add_setting( 'my_parts_likebox_txt', array( 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_likebox_txt',
				array(
					'label'    => __( 'テキスト', 'raccoon' ),
					'section'  => 'my_parts_likebox',
					'settings' => 'my_parts_likebox_txt',
					'type'     => 'textarea',
					'priority' => 1,
				)
			)
		);

		// FacebookページURL.
		$wp_customize->add_setting( 'my_parts_likebox_url', array( 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_likebox_url',
				array(
					'label'    => __( 'FacebookページURL', 'raccoon' ),
					'section'  => 'my_parts_likebox',
					'settings' => 'my_parts_likebox_url',
					'type'     => 'url',
					'priority' => 1,
				)
			)
		);

		// SNSシェアボタン.
		$wp_customize->add_section(
			'my_parts_sns',
			array(
				'title'    => __( 'SNSシェアボタン', 'raccoon' ),
				'panel'    => 'my_parts',
				'priority' => 20,
			)
		);

		// チェックボックス（Twitter）.
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

		// チェックボックス（Facebook）.
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

		// チェックボックス（はてなブックマーク）.
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
					'label'    => __( 'はてなブックマーク', 'raccoon' ),
					'section'  => 'my_parts_sns',
					'settings' => 'my_parts_sns_check_hatena',
					'type'     => 'checkbox',
				)
			)
		);

		// チェックボックス（LINE）.
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

		// チェックボックス（Pocket）.
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

		// チェックボックス（RSS）.
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
				'default' => 'select1',
				array( 'sanitize_callback' => 'my_sanitize_select' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_sns_select_type',
				array(
					'label'    => __( 'ボタンの種類', 'raccoon' ),
					'section'  => 'my_parts_sns',
					'settings' => 'my_parts_sns_select_type',
					'type'     => 'select',
					'choices'  => array(
						'select1' => 'オリジナル',
						'select2' => '公式',
					),
				)
			)
		);

		$wp_customize->add_setting(
			'my_parts_sns_select_place',
			array(
				'default' => 'select2',
				array( 'sanitize_callback' => 'my_sanitize_select' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_sns_select_place',
				array(
					'label'    => __( '表示する場所', 'raccoon' ),
					'section'  => 'my_parts_sns',
					'settings' => 'my_parts_sns_select_place',
					'type'     => 'select',
					'choices'  => array(
						'select1' => 'コンテンツ上',
						'select2' => 'コンテンツ下',
						'select3' => 'コンテンツ上下',
						'select4' => '表示しない',
					),
				)
			)
		);

		// 関連記事.
		$wp_customize->add_section(
			'my_parts_relation',
			array(
				'title'    => __( '関連記事', 'raccoon' ),
				'panel'    => 'my_parts',
				'priority' => 30,
			)
		);

		// チェックボックス.
		$wp_customize->add_setting(
			'my_parts_relation_check',
			array(
				'default' => true,
				array( 'sanitize_callback' => 'my_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_parts_relation_check',
				array(
					'label'    => __( '表示する', 'raccoon' ),
					'section'  => 'my_parts_relation',
					'settings' => 'my_parts_relation_check',
					'type'     => 'checkbox',
				)
			)
		);
	}
}
add_action( 'customize_register', 'my_customize_parts' );
