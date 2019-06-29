<?php
/**
 * My Customizer Color
 *
 * @package WordPress
 */

/**
 * カスタマイザーの管理
 *
 * @param object $wp_customize カスタマイザーを管理するオブジェクト.
 * @return void
 */
function my_customize_test( $wp_customize ) {

	// テスト.
	$wp_customize->add_panel(
		'my_test',
		array(
			'title'    => __( 'テスト', 'raccoon' ),
			'priority' => 1,
		)
	);

	// WP_Customize_Control.
	$wp_customize->add_section(
		'my_test_non',
		array(
			'title'    => __( 'Parent', 'raccoon' ),
			'panel'    => 'my_test',
			'priority' => 45,
		)
	);

	$wp_customize->add_setting( 'my_sns_none_1' );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'my_sns_none_1',
			array(
				'label'    => __( 'タイトル', 'raccoon' ),
				'section'  => 'my_test_non',
				'settings' => 'my_sns_none_1',
				'priority' => 1,
			)
		)
	);

	// WP_Customize_Background_Image_Control.
	$wp_customize->add_section(
		'my_test_background',
		array(
			'title'    => __( 'Background_Image', 'raccoon' ),
			'panel'    => 'my_test',
			'priority' => 45,
		)
	);
	$wp_customize->add_setting( 'my_test_background_1' );
	$wp_customize->add_control(
		new WP_Customize_Background_Image_Control(
			$wp_customize,
			'my_test_background_1',
			array(
				'label'    => __( 'タイトル', 'raccoon' ),
				'section'  => 'my_test_background',
				'settings' => 'my_test_background_1',
				'priority' => 1,
			)
		)
	);

	// WP_Customize_Code_Editor_Control.
	$wp_customize->add_section(
		'my_test_code',
		array(
			'title'    => __( 'Code_Editor', 'raccoon' ),
			'panel'    => 'my_test',
			'priority' => 45,
		)
	);
	$wp_customize->add_setting( 'my_test_code_1' );
	$wp_customize->add_control(
		new WP_Customize_Code_Editor_Control(
			$wp_customize,
			'my_test_code_1',
			array(
				'label'    => __( 'タイトル', 'raccoon' ),
				'section'  => 'my_test_code',
				'settings' => 'my_test_code_1',
				'priority' => 1,
			)
		)
	);

	// WP_Customize_Color_Control.
	$wp_customize->add_section(
		'my_test_color',
		array(
			'title'    => __( 'Color', 'raccoon' ),
			'panel'    => 'my_test',
			'priority' => 45,
		)
	);
	$wp_customize->add_setting( 'my_test_color_1' );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'my_test_color_1',
			array(
				'label'    => __( 'タイトル', 'raccoon' ),
				'section'  => 'my_test_color',
				'settings' => 'my_test_color_1',
				'priority' => 1,
			)
		)
	);

	// WP_Customize_Date_Time_Control.
	$wp_customize->add_section(
		'my_test_date',
		array(
			'title'    => __( 'Date_Time', 'raccoon' ),
			'panel'    => 'my_test',
			'priority' => 45,
		)
	);
	$wp_customize->add_setting( 'my_test_date_1' );
	$wp_customize->add_control(
		new WP_Customize_Date_Time_Control(
			$wp_customize,
			'my_test_date_1',
			array(
				'label'    => __( 'タイトル', 'raccoon' ),
				'section'  => 'my_test_date',
				'settings' => 'my_test_date_1',
				'priority' => 1,
			)
		)
	);

	// WP_Customize_Header_Image_Control.
	$wp_customize->add_section(
		'my_test_header',
		array(
			'title'    => __( 'Header_Image', 'raccoon' ),
			'panel'    => 'my_test',
			'priority' => 45,
		)
	);
	$wp_customize->add_setting( 'my_test_header_1' );
	$wp_customize->add_control(
		new WP_Customize_Header_Image_Control(
			$wp_customize,
			'my_test_header_1',
			array(
				'label'    => __( 'タイトル', 'raccoon' ),
				'section'  => 'my_test_header',
				'settings' => 'my_test_header_1',
				'priority' => 1,
			)
		)
	);

	// WP_Customize_Image_Control.
	$wp_customize->add_section(
		'my_test_image',
		array(
			'title'    => __( 'Image', 'raccoon' ),
			'panel'    => 'my_test',
			'priority' => 45,
		)
	);
	$wp_customize->add_setting( 'my_test_image_1' );
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'my_test_image_1',
			array(
				'label'    => __( 'タイトル', 'raccoon' ),
				'section'  => 'my_test_image',
				'settings' => 'my_test_image_1',
				'priority' => 1,
			)
		)
	);

	// WP_Customize_Media_Control.
	$wp_customize->add_section(
		'my_test_media',
		array(
			'title'    => __( 'Media', 'raccoon' ),
			'panel'    => 'my_test',
			'priority' => 45,
		)
	);
	$wp_customize->add_setting( 'my_test_media_1' );
	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'my_test_media_1',
			array(
				'label'    => __( 'タイトル', 'raccoon' ),
				'section'  => 'my_test_media',
				'settings' => 'my_test_media_1',
				'priority' => 1,
			)
		)
	);

	// WP_Customize_Upload_Control.
	$wp_customize->add_section(
		'my_test_upload',
		array(
			'title'    => __( 'Upload', 'raccoon' ),
			'panel'    => 'my_test',
			'priority' => 45,
		)
	);
	$wp_customize->add_setting( 'my_test_upload_1' );
	$wp_customize->add_control(
		new WP_Customize_Upload_Control(
			$wp_customize,
			'my_test_upload_1',
			array(
				'label'    => __( 'タイトル', 'raccoon' ),
				'section'  => 'my_test_upload',
				'settings' => 'my_test_upload_1',
				'priority' => 1,
			)
		)
	);

	// WP_Customize_Control(checkbox).
	$wp_customize->add_section(
		'my_test_checkbox',
		array(
			'title'    => __( 'Checkbox', 'raccoon' ),
			'panel'    => 'my_test',
			'priority' => 45,
		)
	);
	$wp_customize->add_setting( 'my_test_checkbox_1', array( 'default' => 'checked' ) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'my_test_checkbox_1',
			array(
				'label'    => __( 'タイトル', 'raccoon' ),
				'section'  => 'my_test_checkbox',
				'settings' => 'my_test_checkbox_1',
				'type'     => 'checkbox',
				'priority' => 1,
			)
		)
	);

	// WP_Customize_Control(radio).
	$wp_customize->add_section(
		'my_test_radio',
		array(
			'title'    => __( 'Radio', 'raccoon' ),
			'panel'    => 'my_test',
			'priority' => 45,
		)
	);
	$wp_customize->add_setting( 'my_test_radio_1', array( 'default' => 'radio1' ) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'my_test_radio_1',
			array(
				'label'    => __( 'タイトル', 'raccoon' ),
				'section'  => 'my_test_radio',
				'settings' => 'my_test_radio_1',
				'type'     => 'radio',
				'choices'  => array(
					'radio1' => 'ラジオ1',
					'radio2' => 'ラジオ2',
					'radio3' => 'ラジオ3',
				),
				'priority' => 1,
			)
		)
	);

	// WP_Customize_Control(select).
	$wp_customize->add_section(
		'my_test_select',
		array(
			'title'    => __( 'Select', 'raccoon' ),
			'panel'    => 'my_test',
			'priority' => 45,
		)
	);
	$wp_customize->add_setting( 'my_test_select_1', array( 'default' => 'select1' ) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'my_test_select_1',
			array(
				'label'    => __( 'タイトル', 'raccoon' ),
				'section'  => 'my_test_select',
				'settings' => 'my_test_select_1',
				'type'     => 'select',
				'choices'  => array(
					'select1' => 'セレクト1',
					'select2' => 'セレクト2',
					'select3' => 'セレクト3',
				),
				'default'  => 'select1',
				'priority' => 1,
			)
		)
	);

}
add_action( 'customize_register', 'my_customize_test' );
