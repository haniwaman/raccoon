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
<div class="l-row l-row--middle">

<?php
$logo_tag = is_front_page() ? 'h1' : 'div';
?>

<div class="e-logo">
<<?php echo esc_attr( $logo_tag ); ?> class="p-header-logo">
<?php if ( has_custom_logo() ) : ?>
	<?php the_custom_logo(); ?>
<?php else : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( apply_filters( 'raccoon_logo', get_bloginfo( 'name' ) ) ); ?></a>
<?php endif; ?>
</<?php echo esc_attr( $logo_tag ); ?>><!-- /p-header-logo -->
</div><!-- /e-logo -->

<div class="e-global">
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
</div><!-- /e-global -->

<div class="e-drawer">
<?php get_template_part( 'parts/drawer' ); ?>
</div><!-- /e-drawer -->

</div><!-- /l-row -->
</div><!-- /l-inner -->
</header><!-- /header -->



<?php get_template_part( 'parts/infomation' ); ?>
