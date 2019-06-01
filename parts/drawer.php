<?php
/**
 * Drawer
 *
 * @package WordPress
 */

?>

<!-- drawer -->
<div class="drawer">
<div class="drawer-close"></div>

<div class="drawer-icon">
	<div class="drawer-open"></div><!-- /drawer-open -->
	<div class="drawer-text"><span class="m_open">MENU</span><span class="m_close">CLOSE</span></div><!-- /drawer-text -->
</div><!-- /drawer-icon -->

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
