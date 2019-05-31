<?php
/**
 * Sidebar
 *
 * @package WordPress
 */
?>

<!-- secondary -->
<aside id="secondary">
<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar' ); ?>
<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-fixed' ) ) : ?>
<div id="sidebar-fixed">
	<?php dynamic_sidebar( 'sidebar-fixed' ); ?>
</div><!-- /sidebar-fixed -->
<?php endif; ?>
</aside><!-- secondary -->

