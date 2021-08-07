<?php
/**
 * Handle Requests
 *
 * @package Brocooly
 * @since 0.9.1
 */

declare(strict_types=1);

namespace Brocooly\Http\Request;

class WPRequest
{
	/**
	 * Get request object or its key
	 *
	 * @param string|null $key | query argument.
	 * @return mixed
	 */
	public static function getQuery( $key = null ) {
		global $wp_query;

		if ( isset( $key ) ) {
			return get_query_var( $key );
		}

		return $wp_query;
	}

	/**
	 * Get queried object
	 *
	 * @return object
	 */
	public static function queried() {
		return get_queried_object();
	}

	/**
	 * Get search query string
	 *
	 * @return string
	 */
	public static function searchQuery() {
		return get_search_query();
	}
}
