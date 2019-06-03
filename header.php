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

<?php
$logo_tag = 'div';
if ( is_front_page() ) {
	$logo_tag = 'h1';
}
?>
<!-- header-logo -->
<<?php echo esc_attr( $logo_tag ); ?> class="header-logo">
<?php if ( has_custom_logo() ) : ?>
	<?php the_custom_logo(); ?>
<?php else : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
<?php endif; ?>
</<?php echo esc_attr( $logo_tag ); ?>><!-- /header-logo -->

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
