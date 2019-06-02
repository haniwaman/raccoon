<?php
/**
 * Header
 *
 * @package WordPress
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- header -->
<header id="header">
<div class="inner">

<!-- header-logo -->
<div class="header-logo">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>" alt=""></a>
</div><!-- /header-logo -->

<?php
wp_nav_menu(
	array(
		'container'       => false,
		'depth'           => 2,
		'theme_location'  => 'header',
		'container'       => 'nav',
		'container_class' => 'header-nav',
		'menu_class'      => 'header-list',
	)
);
?>

<?php // get_template_part( 'parts/drawer' ); ?>
<?php get_template_part( 'parts/modal' ); ?>
<?php // get_template_part( 'parts/accordion' ); ?>

</div><!-- /inner -->
</header><!-- /header -->
