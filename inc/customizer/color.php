<?php
/**
 * Raccoon Customizer Color
 */

if ( ! function_exists( 'raccoon_customize_color' ) ) {
	/**
	 * Add Customizer Color
	 *
	 * @param object $wp_customize Customizer Object.
	 * @return void
	 */
	function raccoon_customize_color( $wp_customize ) {

		$wp_customize->remove_section( 'colors' );

		// Color.
		$wp_customize->add_panel(
			'raccoon_colors',
			array(
				'priority' => 35,
				'title'    => __( 'Color', 'raccoon' ),
			)
		);

		// Site.
		$wp_customize->add_section(
			'raccoon_colors_site',
			array(
				'title'    => __( 'Site', 'raccoon' ),
				'panel'    => 'raccoon_colors',
				'priority' => 1,
			)
		);

		// Background Color.
		$wp_customize->add_setting( 'raccoon_colors_site_background', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_site_background',
				array(
					'label'    => __( 'Background Color', 'raccoon' ),
					'section'  => 'raccoon_colors_site',
					'settings' => 'raccoon_colors_site_background',
					'priority' => 3,
				)
			)
		);

		// Text Color.
		$wp_customize->add_setting( 'raccoon_colors_site_text', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_site_text',
				array(
					'label'    => __( 'Text Color', 'raccoon' ),
					'section'  => 'raccoon_colors_site',
					'settings' => 'raccoon_colors_site_text',
					'priority' => 4,
				)
			)
		);

		// Header.
		$wp_customize->add_section(
			'raccoon_colors_header',
			array(
				'title'    => __( 'Header', 'raccoon' ),
				'panel'    => 'raccoon_colors',
				'priority' => 2,
			)
		);

		// Background Color.
		$wp_customize->add_setting( 'raccoon_colors_header_background', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_header_background',
				array(
					'label'    => __( 'Background Color', 'raccoon' ),
					'section'  => 'raccoon_colors_header',
					'settings' => 'raccoon_colors_header_background',
					'priority' => 1,
				)
			)
		);

		// Text Color.
		$wp_customize->add_setting( 'raccoon_colors_header_text', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_header_text',
				array(
					'label'    => __( 'Text Color', 'raccoon' ),
					'section'  => 'raccoon_colors_header',
					'settings' => 'raccoon_colors_header_text',
					'priority' => 2,
				)
			)
		);

		// Logo Color.
		$wp_customize->add_setting( 'raccoon_colors_header_logo', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_header_logo',
				array(
					'label'    => __( 'Logo Color', 'raccoon' ),
					'section'  => 'raccoon_colors_header',
					'settings' => 'raccoon_colors_header_logo',
					'priority' => 3,
				)
			)
		);

		// Footer.
		$wp_customize->add_section(
			'raccoon_colors_footer',
			array(
				'title'    => __( 'Footer', 'raccoon' ),
				'panel'    => 'raccoon_colors',
				'priority' => 2,
			)
		);

		// Background Color.
		$wp_customize->add_setting( 'raccoon_colors_footer_background', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_footer_background',
				array(
					'label'    => __( 'Background Color', 'raccoon' ),
					'section'  => 'raccoon_colors_footer',
					'settings' => 'raccoon_colors_footer_background',
					'priority' => 1,
				)
			)
		);

		// Text Color.
		$wp_customize->add_setting( 'raccoon_colors_footer_text', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_footer_text',
				array(
					'label'    => __( 'Text Color', 'raccoon' ),
					'section'  => 'raccoon_colors_footer',
					'settings' => 'raccoon_colors_footer_text',
					'priority' => 2,
				)
			)
		);

		// Contents.
		$wp_customize->add_section(
			'raccoon_colors_content',
			array(
				'title'    => __( 'Contents', 'raccoon' ),
				'panel'    => 'raccoon_colors',
				'priority' => 2,
			)
		);

		// Link Color.
		$wp_customize->add_setting( 'raccoon_colors_content_link', array( 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_content_link',
				array(
					'label'    => __( 'Link', 'raccoon' ),
					'section'  => 'raccoon_colors_content',
					'settings' => 'raccoon_colors_content_link',
					'priority' => 1,
				)
			)
		);
	}
}
add_action( 'customize_register', 'raccoon_customize_color' );
