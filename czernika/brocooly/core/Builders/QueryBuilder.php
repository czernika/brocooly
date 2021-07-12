<?php
/**
 * Query builder
 *
 * @package Brocooly
 * @since 0.2.0
 */

declare(strict_types=1);

namespace Brocooly\Builders;

use Timber\Timber;

class QueryBuilder
{

	/**
	 * Default query parameters
	 *
	 * @var array
	 */
	private static array $queryParams = [
		'merge_default' => true,
	];

	/**
	 * Get posts by custom query
	 *
	 * @param string $name | post type name.
	 * @param array  $query | query array.
	 * @return array|null
	 */
	public static function query( array $query, string $name = '' ) {
		$postQuery = [
			'post_type' => $name,
		];
		$query = array_merge( $query, $postQuery, self::$queryParams );
		$posts = Timber::get_posts( $query );

		return $posts;
	}

	/**
	 * Get all posts
	 *
	 * @param string $name | post type name.
	 * @return array|null
	 */
	public static function all( string $name = '' ) {
		$postQuery = [
			'post_type'      => $name,
			'posts_per_page' => -1,
		];
		$query = array_merge( $postQuery, self::$queryParams );
		$posts = Timber::get_posts( $query );

		return $posts;
	}
}
