<?php

declare(strict_types=1);

namespace Brocooly\Support\Builders;

use Timber\Post;
use Timber\Timber;

class PostTypeQueryBuilder extends QueryBuilder
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
	 * Post type slug
	 *
	 * @var string
	 */
	private static string $postType;

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
		static::$postType    = $name;
		$postQuery           = [
			'post_type'      => static::$postType,
			'posts_per_page' => $postsPerPage,
			'paged'          => max( 1, get_query_var( 'paged' ) ),
		];
		static::$queryParams = array_merge( $postQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Meta query builder
	 *
	 * @param string $name | post type name.
	 * @param string $key | meta key.
	 * @param mixed  $value | meta value.
	 * @param string $compare_key | compare key.
	 * @param string $compare | compare value.
	 * @param string $type | meta type.
	 * @return self
	 */
	public static function whereMeta( string $name, string $key, $value, string $compare_key = '=', string $compare = '=', string $type = 'CHAR' ) {

		static::$postType = $name;

		if ( is_array( $value ) ) {
			$compare = 'IN';
		}
		$metaQuery        = [
			'meta_query' => [
				[
					'key'         => $key,
					'value'       => $value,
					'compare_key' => $compare_key,
					'compare'     => $compare,
					'type'        => $type,
				],
			],
		];

		static::$queryParams = array_merge( $metaQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Meta query builder for OR relationship
	 *
	 * @param string $key | meta key.
	 * @param mixed  $value | meta value.
	 * @param string $compare_key | compare key.
	 * @param string $compare | compare value.
	 * @param string $type | meta type.
	 * @return self
	 */
	public static function orWhere( string $key, $value, string $compare_key = '=', string $compare = '=', string $type = 'CHAR' ) {

		if ( is_array( $value ) ) {
			$compare = 'IN';
		}

		$metaQuery = [
			'meta_query' => [
				'relation' => 'OR',
				[
					'key'         => $key,
					'value'       => $value,
					'compare_key' => $compare_key,
					'compare'     => $compare,
					'type'        => $type,
				],
			],
		];

		static::$queryParams = array_merge_recursive( $metaQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Meta query builder for AND relationship
	 *
	 * @param string $key | meta key.
	 * @param mixed  $value | meta value.
	 * @param string $compare_key | compare key.
	 * @param string $compare | compare value.
	 * @param string $type | meta type.
	 * @return self
	 */
	public static function andWhere( string $key, $value, string $compare_key = '=', string $compare = '=', string $type = 'CHAR' ) {

		if ( is_array( $value ) ) {
			$compare = 'IN';
		}

		$metaQuery        = [
			'meta_query' => [
				'relation' => 'AND',
				[
					'key'         => $key,
					'value'       => $value,
					'compare_key' => $compare_key,
					'compare'     => $compare,
					'type'        => $type,
				],
			],
		];

		static::$queryParams = array_merge_recursive( $metaQuery, static::$queryParams );

		return new self();
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

		return new Post();
	}
}
