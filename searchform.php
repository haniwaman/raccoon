<?php
/**
 * SearchForm
 *
 * @package WordPress
 */

?>

<!-- p-search-form -->
<form role="search" method="get" class="p-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s"><?php esc_html_e( '検索:', 'raccoon' ); ?></label>
	<input type="search" class="search-field m-full" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'サイト内検索 …', 'raccoon' ); ?>" name="s" id="s">
	<button type="submit" class="c-btn search-submit">検索</button>
</form><!-- /p-search-form -->
