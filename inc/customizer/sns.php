<?php
/**
 * My Customizer Color
 *
 * @package WordPress
 */

if ( ! function_exists( 'my_customize_sns' ) ) {

	/**
	 * カスタマイザーの管理
	 *
	 * @param object $wp_customize カスタマイザーを管理するオブジェクト.
	 * @return void
	 */
	function my_customize_sns( $wp_customize ) {

		// SNS.
		$wp_customize->add_panel(
			'my_sns',
			array(
				'priority' => 35,
				'title'    => __( 'SNS', 'raccoon' ),
			)
		);

		// SNSリンク.
		$wp_customize->add_section(
			'my_sns_links',
			array(
				'title'    => __( 'SNSリンク', 'raccoon' ),
				'panel'    => 'my_sns',
				'priority' => 45,
			)
		);

		// Twitter.
		$wp_customize->add_setting( 'my_sns_links_twitter' );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_sns_links_twitter',
				array(
					'label'    => __( 'Twiiter', 'raccoon' ),
					'section'  => 'my_sns_links',
					'settings' => 'my_sns_links_twitter',
					'type'     => 'url',
					'priority' => 1,
				)
			)
		);

		// Facebook.
		$wp_customize->add_setting( 'my_sns_links_facebook' );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_sns_links_facebook',
				array(
					'label'    => __( 'Facebook', 'raccoon' ),
					'section'  => 'my_sns_links',
					'settings' => 'my_sns_links_facebook',
					'priority' => 1,
				)
			)
		);

		// Instagram.
		$wp_customize->add_setting( 'my_sns_links_instagram' );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_sns_links_instagram',
				array(
					'label'    => __( 'Instagram', 'raccoon' ),
					'section'  => 'my_sns_links',
					'settings' => 'my_sns_links_instagram',
					'priority' => 1,
				)
			)
		);

		// Youtube.
		$wp_customize->add_setting( 'my_sns_links_youtube' );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_sns_links_youtube',
				array(
					'label'    => __( 'Youtube', 'raccoon' ),
					'section'  => 'my_sns_links',
					'settings' => 'my_sns_links_youtube',
					'priority' => 1,
				)
			)
		);

		// Line.
		$wp_customize->add_setting( 'my_sns_links_line' );
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'my_sns_links_line',
				array(
					'label'    => __( 'Line@', 'raccoon' ),
					'section'  => 'my_sns_links',
					'settings' => 'my_sns_links_line',
					'priority' => 1,
				)
			)
		);

	}
}
add_action( 'customize_register', 'my_customize_sns' );
