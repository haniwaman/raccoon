<?php
/**
 * SearchForm
 */

?>

<!-- p-search-form -->
<form role="search" method="get" class="p-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s"><?php esc_html_e( 'Search:', 'raccoon' ); ?></label>
	<input type="search" class="search-field m-full" value="<?php echo esc_html( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Site Search', 'raccoon' ); ?>" name="s" id="s">
	<button type="submit" class="c-button search-submit"><?php esc_html_e( 'Search', 'raccoon' ); ?></button>
</form><!-- /p-search-form -->
