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
	protected static array $queryParams = [
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
			'posts_per_page' => config( 'views.limit' ) ?? 500,
			'no_found_rows'  => true,
		];
		$query     = array_merge( $postQuery, static::$queryParams );
		$posts     = static::getQuery( $query );

		return $posts;
	}

	/**
	 * Get post by id
	 *
	 * @param string $name | post type name.
	 * @param integer $id | post id.
	 * @return \Timber\Post object
	 */
	public static function find( string $name, int $id ) {
		if ( isTimberNext() ) {
			return Timber::get_post( $id );
		}

		return new Post( $id );
	}

	/**
	 * Get posts with pagination
	 *
	 * @param string $name | post type name.
	 * @param int    $postsPerPage | post type name.
	 *
	 * @return array|null
	 */
	public static function paginate( string $name, int $postsPerPage ) {
		static::$postType    = $name;
		$postQuery           = [
			'post_type'      => static::$postType,
			'posts_per_page' => $postsPerPage,
			'paged'          => max( 1, get_query_var( 'paged' ) ),
			'no_found_rows'  => false,
		];
		static::$queryParams = array_merge( $postQuery, static::$queryParams );

		return new static();
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
