<?php
/**
 * Modal
 *
 * @package WordPress
 */

?>

<!-- modal -->
<div class="modal">
<div class="modal-close"></div>

<div class="modal-icon">
	<div class="modal-open"></div><!-- /modal-open -->
	<div class="modal-text"><span class="m_open">MENU</span><span class="m_close">CLOSE</span></div><!-- /modal-text -->
</div><!-- /modal-icon -->

<!-- modal-content -->
<div class="modal-content">

<?php if ( is_active_sidebar( 'modal' ) ) : ?>
	<?php dynamic_sidebar( 'modal' ); ?>
<?php endif; ?>

</div><!-- /modal-content -->
</div><!-- /modal -->
