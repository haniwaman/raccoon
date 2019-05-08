<?php
/**
 * SearchForm
 *
 * @package WordPress
 */

?>

<!-- search-form -->
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" value="<?php echo get_search_query(); ?>" placeholder="サイト内検索 …" name="s" id="s">
	<button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
	<!-- <input type="submit" class="search-submit" value="&#xf002" /> -->
</form><!-- /search-form -->
