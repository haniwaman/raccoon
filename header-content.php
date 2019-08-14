<?php
/**
 * Header Content
 *
 * @package WordPress
 */

?>

<!-- header -->
<header class="l-header p-header">
<div class="l-inner">
<div class="l-row m-middle">

<?php
$logo_tag = 'div';
if ( is_front_page() ) {
	$logo_tag = 'h1';
}
?>
<!-- p-header-logo -->
<<?php echo esc_attr( $logo_tag ); ?> class="p-header-logo">
<?php if ( has_custom_logo() ) : ?>
	<?php the_custom_logo(); ?>
<?php else : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( apply_filters( 'raccoon_logo', get_bloginfo( 'name' ) ) ); ?></a>
<?php endif; ?>
</<?php echo esc_attr( $logo_tag ); ?>><!-- /p-header-logo -->

<?php
wp_nav_menu(
	array(
		'container'       => false,
		'depth'           => 2,
		'theme_location'  => 'header',
		'container'       => 'nav',
		'container_class' => 'p-header-nav',
	)
);
?>

<?php get_template_part( 'parts/drawer' ); ?>

</div><!-- /l-row -->
</div><!-- /l-inner -->
</header><!-- /header -->



<?php get_template_part( 'parts/infomation' ); ?>
