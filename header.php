<?php
/**
 * Header
 *
 * @package WordPress
 */

?>

<?php get_header( 'meta' ); ?>

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



<?php get_template_part( 'parts/infomation' ); ?>
