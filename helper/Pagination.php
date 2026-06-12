<?php
class Pagination {
	public static function paginate( $query = null, string $type = 'list' ): string {
		global $wp_query;

		// Use the main query if no custom query is provided
		if ( ! $query || ! is_a( $query, 'WP_Query' ) ) {
			$query = $wp_query;
		}

		$paged = max( 1, get_query_var( 'paged', 1 ) );
		$big = 999999999; // Unique placeholder for pagination base

		// Get the current category link if on a category page
		$base = ( is_category() )
			? str_replace( $big, '%#%', esc_url( get_category_link( get_queried_object_id() ) . 'page/%#%/' ) )
			: str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) );

		$args = [
			'base'      => $base, // Use the custom base for category pages
			'format'    => ( get_option('permalink_structure') ? 'page/%#%/' : '?paged=%#%' ),
			'current'   => $paged,
			'total'     => $query->max_num_pages,
			'type'      => 'array',
			'prev_text' => 'قبل',
			'next_text' => 'بعد',
			'end_size'  => 1,
			'mid_size'  => 1,
		];

		$pages = paginate_links( $args );

		if ( is_array( $pages ) ) {
			$pagination = '<ul class="pagination pagination-bordered">';

			foreach ( $pages as $page ) {
				if ( strpos( $page, 'current' ) !== false ) {
					$pagination .= '<li class="page-item active">' . str_replace( 'page-numbers', 'page-link', $page ) . '</li>';
				} else {
					$pagination .= '<li class="page-item">' . str_replace( 'page-numbers', 'page-link', $page ) . '</li>';
				}
			}

			$pagination .= '</ul>';
			return $pagination;
		}

		return '';
	}
}
?>