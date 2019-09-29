<?php
/**
 * Sidebar
 */

?>

<!-- l-secondary -->
<aside class="l-secondary">
<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar' ); ?>
<?php endif; ?>

<?php if ( is_active_sidebar( 'p-sidebar-fixed' ) ) : ?>
<!-- .p-sidebar-fixed -->
<div class="p-sidebar-fixed">
	<?php dynamic_sidebar( 'p-sidebar-fixed' ); ?>
</div><!-- /p-sidebar-fixed -->
<?php endif; ?>
</aside><!-- l-secondary -->

