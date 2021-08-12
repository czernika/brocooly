<?php
/**
 * Set taxonomy query
 *
 * @package Brocooly
 * @since 0.10.2
 */

declare(strict_types=1);

namespace Brocooly\Support\Builders;

use Timber\Term;
use Timber\Timber;

class TaxonomyQueryBuilder
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
	 * Taxonomy slug name
	 *
	 * @var string
	 */
	private static string $taxonomy;

	/**
	 * Get all posts of current taxonomy
	 *
	 * @param string $name | post type name.
	 * @param array  $args | additional arguments.
	 * @return object
	 */
	public static function all( string $name, array $args = [] ) {
		$terms = get_terms( $name, $args );
		return $terms;
	}

	/**
	 * Set posts per page for query.
	 * ! This function should NOT be called first
	 * Consider to use `where`
	 *
	 * @param integer $postsPerPage | posts per page.
	 * @return self
	 */
	public static function paginate( int $postsPerPage = 10 ) {
		$taxQuery            = [ 'posts_per_page' => $postsPerPage ];
		static::$queryParams = array_merge( static::$queryParams, $taxQuery );
		return new self();
	}

	/**
	 * Set post type for query.
	 * ! This function should NOT be called first
	 * Consider to use `where`
	 *
	 * @param string|array $postTypes | post types.
	 * @return self
	 */
	public static function wherePostType( $post_type = 'post' ) {
		$taxQuery            = [ 'post_type' => $post_type ];
		static::$queryParams = array_merge( static::$queryParams, $taxQuery );
		return new self();
	}

	/**
	 * Set taxonomy query params
	 *
	 * @param string $name | taxonomy name. No need to pass it.
	 * @param string $key | field.
	 * @param mixed  $value | field value.
	 * @param string $operator | field operator.
	 * @return self
	 */
	public static function where( string $name, string $key, $value, $operator = 'IN' ) {
		static::$taxonomy = $name;

		$taxQuery = [
			'tax_query' => [
				[
					'taxonomy' => static::$taxonomy,
					'field'    => $key,
					'terms'    => $value,
					'operator' => $operator,
				],
			],
		];

		static::$queryParams = array_merge_recursive( static::$queryParams, $taxQuery );
		return new self();
	}

	/**
	 * Set AND relation to a taxonomy query
	 *
	 * @param string $key | field.
	 * @param mixed  $value | field value.
	 * @param string $operator | field operator.
	 * @return self
	 */
	public static function andWhere( string $key, $value, string $operator = 'IN' ) {
		$taxQuery            = static::setQuery( 'AND', $key, $value, $operator );
		static::$queryParams = array_merge_recursive( static::$queryParams, $taxQuery );
		return new self();
	}

	/**
	 * Set OR relation to a taxonomy query
	 *
	 * @param string $key | field.
	 * @param mixed  $value | field value.
	 * @param string $operator | field operator.
	 * @return self
	 */
	public static function orWhere( string $key, $value, string $operator = 'IN' ) {
		$taxQuery            = static::setQuery( 'OR', $key, $value, $operator );
		static::$queryParams = array_merge_recursive( static::$queryParams, $taxQuery );
		return new self();
	}

	/**
	 * Get posts by query
	 *
	 * @param mixed $key | term to get by id or slug.
	 * @return object
	 */
	public static function get( $key = null ) {
		if ( isset( $key ) ) {
			return new Term( $key );
		}

		$posts = Timber::get_posts( static::$queryParams );
		return $posts;
	}

	/**
	 * Set query relation
	 *
	 * @param string $relation | taxonomy relation - OR or AND.
	 * @param string $key | field.
	 * @param mixed  $value | field value.
	 * @param string $operator | field operator.
	 * @return array
	 */
	private static function setQuery( string $relation, string $key, $value, string $operator ) {
		$query = [
			'tax_query' => [
				'relation' => $relation,
				[
					'taxonomy' => static::$taxonomy,
					'field'    => $key,
					'terms'    => $value,
					'operator' => $operator,
				],
			],
		];
		return $query;
	}
}
