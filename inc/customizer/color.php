<?php
/**
 * My Customizer Color
 *
 * @package WordPress
 */

if ( ! function_exists( 'my_customize_color' ) ) {
	/**
	 * Add Customizer Color
	 *
	 * @param object $wp_customize Customizer Object.
	 * @return void
	 */
	function my_customize_color( $wp_customize ) {

		$wp_customize->remove_section( 'colors' );

		// Color.
		$wp_customize->add_panel(
			'my_colors',
			array(
				'priority' => 35,
				'title'    => __( 'Color', 'raccoon' ),
			)
		);

		// Site.
		$wp_customize->add_section(
			'my_colors_site',
			array(
				'title'    => __( 'Site', 'raccoon' ),
				'panel'    => 'my_colors',
				'priority' => 1,
			)
		);

		// Background Color.
		$wp_customize->add_setting( 'my_colors_site_background', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_site_background',
				array(
					'label'    => __( 'Background Color', 'raccoon' ),
					'section'  => 'my_colors_site',
					'settings' => 'my_colors_site_background',
					'priority' => 3,
				)
			)
		);

		// Text Color.
		$wp_customize->add_setting( 'my_colors_site_text', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_site_text',
				array(
					'label'    => __( 'Text Color', 'raccoon' ),
					'section'  => 'my_colors_site',
					'settings' => 'my_colors_site_text',
					'priority' => 4,
				)
			)
		);

		// Header.
		$wp_customize->add_section(
			'my_colors_header',
			array(
				'title'    => __( 'Header', 'raccoon' ),
				'panel'    => 'my_colors',
				'priority' => 2,
			)
		);

		// Background Color.
		$wp_customize->add_setting( 'my_colors_header_background', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_header_background',
				array(
					'label'    => __( 'Background Color', 'raccoon' ),
					'section'  => 'my_colors_header',
					'settings' => 'my_colors_header_background',
					'priority' => 1,
				)
			)
		);

		// Text Color.
		$wp_customize->add_setting( 'my_colors_header_text', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_header_text',
				array(
					'label'    => __( 'Text Color', 'raccoon' ),
					'section'  => 'my_colors_header',
					'settings' => 'my_colors_header_text',
					'priority' => 2,
				)
			)
		);

		// Logo Color.
		$wp_customize->add_setting( 'my_colors_header_logo', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_header_logo',
				array(
					'label'    => __( 'Logo Color', 'raccoon' ),
					'section'  => 'my_colors_header',
					'settings' => 'my_colors_header_logo',
					'priority' => 3,
				)
			)
		);

		// Footer.
		$wp_customize->add_section(
			'my_colors_footer',
			array(
				'title'    => __( 'Footer', 'raccoon' ),
				'panel'    => 'my_colors',
				'priority' => 2,
			)
		);

		// Background Color.
		$wp_customize->add_setting( 'my_colors_footer_background', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_footer_background',
				array(
					'label'    => __( 'Background Color', 'raccoon' ),
					'section'  => 'my_colors_footer',
					'settings' => 'my_colors_footer_background',
					'priority' => 1,
				)
			)
		);

		// Text Color.
		$wp_customize->add_setting( 'my_colors_footer_text', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_footer_text',
				array(
					'label'    => __( 'Text Color', 'raccoon' ),
					'section'  => 'my_colors_footer',
					'settings' => 'my_colors_footer_text',
					'priority' => 2,
				)
			)
		);

		// SNS.
		$wp_customize->add_section(
			'my_colors_sns',
			array(
				'title'    => __( 'SNS', 'raccoon' ),
				'panel'    => 'my_colors',
				'priority' => 2,
			)
		);

		// Twitter Color.
		$wp_customize->add_setting(
			'my_colors_sns_twitter',
			array(
				'default'           => '#1da1f2',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_sns_twitter',
				array(
					'label'    => __( 'Twitter', 'raccoon' ),
					'section'  => 'my_colors_sns',
					'settings' => 'my_colors_sns_twitter',
					'priority' => 1,
				)
			)
		);

		// Facebook Color.
		$wp_customize->add_setting(
			'my_colors_sns_facebook',
			array(
				'default'           => '#3b5998',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_sns_facebook',
				array(
					'label'    => __( 'Facebook', 'raccoon' ),
					'section'  => 'my_colors_sns',
					'settings' => 'my_colors_sns_facebook',
					'priority' => 1,
				)
			)
		);

		// Hatena Bookmark Color.
		$wp_customize->add_setting(
			'my_colors_sns_hatena',
			array(
				'default'           => '#018fde',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_sns_hatena',
				array(
					'label'    => __( 'Hatena Bookmark', 'raccoon' ),
					'section'  => 'my_colors_sns',
					'settings' => 'my_colors_sns_hatena',
					'priority' => 1,
				)
			)
		);

		// LINE Color.
		$wp_customize->add_setting(
			'my_colors_sns_line',
			array(
				'default'           => '#00b902',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_sns_line',
				array(
					'label'    => __( 'LINE', 'raccoon' ),
					'section'  => 'my_colors_sns',
					'settings' => 'my_colors_sns_line',
					'priority' => 1,
				)
			)
		);

		// Pocket Color.
		$wp_customize->add_setting(
			'my_colors_sns_pocket',
			array(
				'default'           => '#ef4156',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_sns_pocket',
				array(
					'label'    => __( 'Pocket', 'raccoon' ),
					'section'  => 'my_colors_sns',
					'settings' => 'my_colors_sns_pocket',
					'priority' => 1,
				)
			)
		);

		// RSS Color.
		$wp_customize->add_setting(
			'my_colors_sns_rss',
			array(
				'default'           => '#ea781a',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_sns_rss',
				array(
					'label'    => __( 'RSS', 'raccoon' ),
					'section'  => 'my_colors_sns',
					'settings' => 'my_colors_sns_rss',
					'priority' => 1,
				)
			)
		);

		// Contents.
		$wp_customize->add_section(
			'my_colors_content',
			array(
				'title'    => __( 'Contents', 'raccoon' ),
				'panel'    => 'my_colors',
				'priority' => 2,
			)
		);

		// Link Color.
		$wp_customize->add_setting( 'my_colors_content_link', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'my_colors_content_link',
				array(
					'label'    => __( 'Link', 'raccoon' ),
					'section'  => 'my_colors_content',
					'settings' => 'my_colors_content_link',
					'priority' => 1,
				)
			)
		);
	}
}
add_action( 'customize_register', 'my_customize_color' );
