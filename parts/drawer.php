<?php
/**
 * Drawer
 *
 * @package WordPress
 */

?>

<div class="drawer">
	<div class="drawer-icon js-drawer for-drawer01" data-target="for-drawer01">
		<div class="drawer-bars">
				<span class="drawer-bar"></span>
				<span class="drawer-bar"></span>
				<span class="drawer-bar"></span>
		</div><!-- /drawer-bars -->
	</div><!-- /drawer-icon -->
	<div class="drawer-close js-drawer for-drawer01"></div>
	<div class="drawer-content for-drawer01 m-left">
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
