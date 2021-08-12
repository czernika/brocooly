<?php

declare(strict_types=1);

namespace Brocooly\Support\Builders;

use Timber\Timber;

class PostTypeQueryBuilder
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
	 * @param array  $query | query array.
	 * @param string $name | post type name.
	 * @return array|null
	 */
	public static function query( string $name, array $query ) {
		$postQuery = [
			'post_type'     => $name,
			'no_found_rows' => true,
		];
		$query     = array_merge( $query, $postQuery, static::$queryParams );
		$posts     = static::getQuery( $query );

		return $posts;
	}

	/**
	 * Get all posts
	 *
	 * @param string $name | post type name.
	 * @return array|null
	 */
	public static function all( string $name ) {
		$postQuery = [
			'post_type'      => $name,
			'posts_per_page' => 500, // TODO: provide an option.
			'no_found_rows'  => true,
		];
		$query     = array_merge( $postQuery, static::$queryParams );
		$posts     = static::getQuery( $query );

		return $posts;
	}

	/**
	 * Get posts with pagination
	 *
	 * @param int    $postsPerPage | post type name.
	 * @param string $name | post type name.
	 *
	 * @return array|null
	 */
	public static function paginate( string $name, int $postsPerPage ) {
		$postQuery = [
			'post_type'      => $name,
			'posts_per_page' => $postsPerPage,
			'paged'          => max( 1, get_query_var( 'paged' ) ),
		];
		$query     = array_merge( $postQuery, static::$queryParams );
		$posts     = static::getQuery( $query );

		return $posts;
	}

	/**
	 * Get current post object
	 *
	 * @return object
	 */
	public static function current() {
		if ( isTimberNext() ) {
			return Timber::get_post();
		}

		return new \Timber\Post();
	}

	/**
	 * Get query depends on version
	 *
	 * @param array $query | query.
	 * @return array|null
	 */
	private static function getQuery( array $query ) {
		if ( isTimberNext() ) {
			return Timber::get_posts( $query );
		}

		return new \Timber\PostQuery( $query );
	}
}
