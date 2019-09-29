<?php
/**
 * Export Customize CSS
 */

echo '<style>';

if ( get_theme_mod( 'raccoon_performance_inline_check' ) ) {
	/* First View */
	load_template( get_template_directory() . '/src/css/header.min.css' );
}

/* Site Background Color */
if ( get_theme_mod( 'raccoon_colors_site_background' ) ) {
	echo 'body{background-color:' . esc_attr( get_theme_mod( 'raccoon_colors_site_background' ) ) . ';}';
}

/* Site Text Color */
if ( get_theme_mod( 'raccoon_colors_site_text' ) ) {
	echo esc_attr( 'body{color:' . get_theme_mod( 'raccoon_colors_site_text' ) . ';}' );
}

/* Header Background Color */
if ( get_theme_mod( 'raccoon_colors_header_background' ) ) {
	echo esc_attr( '.p-header{background:' . get_theme_mod( 'raccoon_colors_header_background' ) . ';}' );
}

/* Header Text Color */
if ( get_theme_mod( 'raccoon_colors_header_text' ) ) {
	echo esc_attr( '.p-header-nav li > a{color:' . get_theme_mod( 'raccoon_colors_header_text' ) . ';}' );
}

/* Logo Color */
if ( get_theme_mod( 'raccoon_colors_header_logo' ) ) {
	echo esc_attr( '.p-header-logo a{color:' . get_theme_mod( 'raccoon_colors_header_logo' ) . ';}' );
}

/* Footer Background Color */
if ( get_theme_mod( 'raccoon_colors_footer_background' ) ) {
	echo esc_attr( '.p-footer{background:' . get_theme_mod( 'raccoon_colors_footer_background' ) . ';}' );
}

/* Footer Text Color */
if ( get_theme_mod( 'raccoon_colors_footer_text' ) ) {
	echo esc_attr( '.p-footer{color:' . get_theme_mod( 'raccoon_colors_footer_text' ) . ';}' );
}

/* Contents Link Color */
if ( get_theme_mod( 'raccoon_colors_content_link' ) ) {
	echo esc_attr( '.p-entry-content a{color:' . get_theme_mod( 'raccoon_colors_content_link' ) . ';}' );
}

/* Layout */
if ( get_theme_mod( 'raccoon_layout_all_radio' ) ) {
	switch ( get_theme_mod( 'raccoon_layout_all_radio' ) ) {
		case 'one':
			echo '.l-primary{width:100%;margin-bottom:32px;}';
			echo '.l-secondary{width:100%;}';
			break;
		case 'two-right':
			echo '.l-primary{order:1}';
			echo '.l-secondary{margin-left:auto;margin-right:0;order:2}';
			break;
		case 'two-left':
			echo '.l-primary{order:2}';
			echo '.l-secondary{margin-left:0;margin-right:auto;order:1}';
			break;
	}
}

echo '</style>';
