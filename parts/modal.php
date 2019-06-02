<?php
/**
 * Modal
 *
 * @package WordPress
 */

?>

<!-- modal -->
<div class="modal">
<div class="hamburger-close"></div>

<div class="hamburger-icon m_modal">
	<div class="hamburger-open"></div><!-- /hamburger-open -->
	<div class="hamburger-text"><span class="m_open">MENU</span><span class="m_close">CLOSE</span></div><!-- /hamburger-text -->
</div><!-- /hamburger-icon -->

<!-- modal-content -->
<div class="modal-content widget-sp">

<?php if ( is_active_sidebar( 'modal' ) ) : ?>
	<?php dynamic_sidebar( 'modal' ); ?>
<?php endif; ?>

</div><!-- /modal-content -->
</div><!-- /modal -->
