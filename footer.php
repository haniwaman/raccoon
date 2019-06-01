<?php
/**
 * Footer
 *
 * @package WordPress
 */

?>

<!-- footer -->
<footer id="footer">
<div class="inner">

<div class="copy">Copyright &copy; <?php echo esc_html( date( 'Y' ) ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a> All Rights Reserved.</div><!-- /copy -->

</div><!-- /inner -->
</footer><!-- /footer -->

<div class="totop"><a href="#"><i class="fas fa-chevron-up"></i></a></div><!-- /totop -->

<?php wp_footer(); ?>
</body>
</html>
