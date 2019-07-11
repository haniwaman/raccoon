<?php
/**
 * My template tags Functions
 *
 * @package WordPress
 */

if ( ! function_exists( 'my_get_post_categories' ) ) {
	/**
	 * カテゴリー取得
	 *
	 * @param integer $id 投稿id.
	 * @return array $this_categories id name link の配列.
	 * @codex https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/get_the_category
	 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/get_category_link
	 */
	function my_get_post_categories( $id ) {
		global $post;
		$this_categories = array();
		if ( 0 === $id ) {
			$id = $post->ID;
		}
		$categories = get_the_category( $id );
		if ( ! $categories ) {
			return false;
		}
		$category_num = count( $categories );
		for ( $i = 0; $i < $category_num; $i++ ) {
			$this_categories[ $i ]['id']   = $categories[ $i ]->cat_ID;
			$this_categories[ $i ]['name'] = $categories[ $i ]->name;
			$this_categories[ $i ]['slug'] = $categories[ $i ]->slug;
			$this_categories[ $i ]['link'] = get_category_link( $categories[ $i ]->cat_ID );
		}
		return $this_categories;
	}
}

if ( ! function_exists( 'my_the_post_category' ) ) {
	/**
	 * カテゴリーを1つだけ表示
	 *
	 * @param boolean $anchor aタグで出力するかどうか.
	 * @param integer $id 投稿id.
	 * @return void
	 */
	function my_the_post_category( $anchor = true, $id = 0 ) {
		$this_categories = my_get_post_categories( $id );
		$this_color      = '';
		if ( function_exists( 'the_field' ) ) {
			$this_color = get_field( 'color', 'category_' . $this_categories[0]['id'] );
		}
		if ( isset( $this_categories[0] ) ) {
			if ( $anchor ) {
				echo '<a style="' . esc_attr( 'background:' . $this_color ) . ';" href="' . esc_url( $this_categories[0]['link'] ) . '">' . esc_html( $this_categories[0]['name'] ) . '</a>';
			} else {
				echo '<span style="' . esc_attr( 'background:' . $this_color ) . ';">' . esc_html( $this_categories[0]['name'] ) . '</span>';
			}
		}
	}
}


if ( ! function_exists( 'my_get_post_tags' ) ) {
	/**
	 * タグ取得
	 *
	 * @param integer $id 投稿id.
	 * @return array $this_tags id name link の配列.
	 * @codex https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/get_the_tags
	 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/get_category_link
	 */
	function my_get_post_tags( $id = 0 ) {
		global $post;
		$this_tags = array();
		if ( 0 === $id ) {
			$id = $post->ID;
		}
		$tags = get_the_tags( $id );
		if ( ! $tags ) {
			return false;
		}
		$tags_num = count( $tags );
		for ( $i = 0; $i < $tags_num; $i++ ) {
			$this_tags[ $i ]['id']   = $tags[ $i ]->term_id;
			$this_tags[ $i ]['name'] = $tags[ $i ]->name;
			$this_tags[ $i ]['slug'] = $tags[ $i ]->slug;
			$this_tags[ $i ]['link'] = get_tag_link( $tags[ $i ]->term_id );
		}
		return $this_tags;
	}
}


if ( ! function_exists( 'my_the_post_tags' ) ) {
	/**
	 * タグ一覧を表示
	 *
	 * @param integer $id 投稿id.
	 * @return void
	 */
	function my_the_post_tags( $id = 0 ) {
		$this_tags = my_get_post_tags( $id );
		if ( $this_tags ) {
			$i             = 0;
			$this_tags_num = count( $this_tags );
			echo '<div class="entry-tags">';
			for ( $i; $i < $this_tags_num; $i++ ) {
				echo '<div class="entry-tag"><a href="' . esc_url( $this_tags[ $i ]['link'] ) . '">' . esc_html( $this_tags[ $i ]['name'] ) . '</a></div><!-- /entry-tag -->';
			}
			echo '</div><!-- /entry-tags -->';
		}
	}
}


if ( ! function_exists( 'my_get_post_terms' ) ) {
	/**
	 * ターム取得
	 *
	 * @param string $taxonomy タクソノミーのスラッグ名.
	 * @return array ターム情報.
	 */
	function my_get_post_terms( $taxonomy ) {
		$this_terms = array();
		$terms      = get_the_terms( get_the_ID(), $taxonomy );
		$term_num   = count( $terms );
		for ( $i = 0; $i < $term_num; $i++ ) {
			$this_terms[ $i ]['id']   = $terms[ $i ]->term_id;
			$this_terms[ $i ]['name'] = $terms[ $i ]->name;
			$this_terms[ $i ]['slug'] = $terms[ $i ]->slug;
			$this_terms[ $i ]['link'] = get_term_link( $terms[ $i ]->term_id, $taxonomy );
		}
		return $this_terms;
	}
}


if ( ! function_exists( 'my_the_post_term' ) ) {
	/**
	 * タームを1つだけ表示
	 *
	 * @param string $taxonomy タクソノミーのスラッグ名.
	 */
	function my_the_post_term( $taxonomy ) {
		$this_terms = my_get_post_terms( $taxonomy );
		if ( isset( $this_terms[0] ) ) {
			echo '<div class="shopnews-tag m_' . esc_attr( $this_terms[0]['slug'] ) . '">' . esc_html( $this_terms[0]['name'] ) . '</div>';
		}
	}
}
