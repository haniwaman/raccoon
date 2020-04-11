<?php
/**
 * Footer Content
 */

?>

<!-- footer -->
<footer class="l-footer p-footer">

<div class="p-footer-menu">
<div class="l-inner">

<div class="l-row">
<div class="l-row__col l-row__col12 l-row__col04-tab">
	<div class="e-widget">
	<?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
		<?php dynamic_sidebar( 'footer-left' ); ?>
	<?php endif; ?>
	</div><!-- /e-widget -->
</div><!-- /l-row__col04 -->

<div class="l-row__col l-row__col12 l-row__col04-tab">
	<div class="e-widget">
	<?php if ( is_active_sidebar( 'footer-center' ) ) : ?>
		<?php dynamic_sidebar( 'footer-center' ); ?>
	<?php endif; ?>
	</div><!-- /e-widget -->
</div><!-- /l-row__col04 -->

<div class="l-row__col l-row__col12 l-row__col04-tab">
	<div class="e-widget m-last">
	<?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
		<?php dynamic_sidebar( 'footer-right' ); ?>
	<?php endif; ?>
	</div><!-- /e-widget -->
</div><!-- /l-row__col04 -->
</div><!-- /l-row -->

</div><!-- /l-inner -->
</div><!-- /p-footer-menu -->

<div class="p-footer-copy">
<div class="l-inner">

<div class="p-copy"><?php esc_html_e( 'Copyright', 'raccoon' ); ?><span class="e-symbol">&copy;</span><?php echo date_i18n( __( 'Y', 'raccoon' ) ); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a><?php esc_html_e( 'All Rights Reserved.', 'raccoon' ); ?></div><!-- /p-copy -->

</div><!-- /l-inner -->
</div><!-- /p-footer-copy -->

</footer><!-- /l-footer -->

<div class="p-floating"><a href="#"><div class="c-icon-arrow-top"><span></span></div></a></div><!-- /p-floating -->
