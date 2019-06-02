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
<?php
	wp_nav_menu(
		array(
			'container'       => false,
			'depth'           => 2,
			'theme_location'  => 'drawer',
			'container'       => 'nav',
			'container_class' => 'drawer-nav',
			'menu_class'      => 'drawer-list',
		)
	);
	?>
</div><!-- /drawer-content -->
</div><!-- /drawer -->
