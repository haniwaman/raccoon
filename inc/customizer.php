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

	/* セクション削除 */
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'header_image' );
}
add_action( 'customize_register', 'my_customize_register' );
