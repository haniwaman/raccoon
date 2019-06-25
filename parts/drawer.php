<?php
/**
 * Drawer
 *
 * @package WordPress
 */

?>

<!-- drawer -->
<div class="drawer">
<div class="hamburger-close"></div>

<div class="hamburger-icon m_drawer">
	<div class="hamburger-open"></div><!-- /hamburger-open -->
	<div class="hamburger-text"><span class="m_open">MENU</span><span class="m_close">CLOSE</span></div><!-- /hamburger-text -->
</div><!-- /hamburger-icon -->

<!-- drawer-content m_left -->
<div class="drawer-content widget-sp">
<?php if ( is_active_sidebar( 'spmenu' ) ) : ?>
	<?php dynamic_sidebar( 'spmenu' ); ?>
<?php else : ?>
	<?php
	wp_nav_menu(
		array(
			'container'       => false,
			'depth'           => 2,
			'theme_location'  => 'header',
			'container'       => 'nav',
			'container_class' => 'drawer-nav',
			'menu_class'      => 'drawer-list',
		)
	);
	?>
<?php endif; ?>
</div><!-- /drawer-content -->
</div><!-- /drawer -->
