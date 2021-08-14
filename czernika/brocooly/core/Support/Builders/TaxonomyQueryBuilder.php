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

class TaxonomyQueryBuilder extends QueryBuilder
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
	 * Taxonomy slug
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
		$taxQuery            = [
			'posts_per_archive_page' => $postsPerPage,
			'paged'                  => max( 1, get_query_var( 'paged' ) ),
			'no_found_rows'          => false,
		];
		static::$queryParams = array_merge( static::$queryParams, $taxQuery );
		return new static();
	}

	/**
	 * Set post type for query.
	 * ! This function should NOT be called first
	 * Consider to use `where`
	 *
	 * @param string|array $postTypes | post types.
	 * @return self
	 */
	public static function wherePostType( $postTypes = 'post' ) {
		$taxQuery            = [ 'post_type' => $postTypes ];
		static::$queryParams = array_merge( static::$queryParams, $taxQuery );
		return new static();
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
	public static function whereTerm( string $name, string $key, $value, $operator = 'IN' ) {
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
		return new static();
	}

	/**
	 * Set AND relation to a taxonomy query
	 *
	 * @param string $key | field.
	 * @param mixed  $value | field value.
	 * @param string $operator | field operator.
	 * @return self
	 */
	public static function andWhereTerm( string $key, $value, string $operator = 'IN' ) {
		$taxQuery            = static::setQuery( 'AND', $key, $value, $operator );
		static::$queryParams = array_merge_recursive( static::$queryParams, $taxQuery );
		return new static();
	}

	/**
	 * Set OR relation to a taxonomy query
	 *
	 * @param string $key | field.
	 * @param mixed  $value | field value.
	 * @param string $operator | field operator.
	 * @return self
	 */
	public static function orWhereTerm( string $key, $value, string $operator = 'IN' ) {
		$taxQuery            = static::setQuery( 'OR', $key, $value, $operator );
		static::$queryParams = array_merge_recursive( static::$queryParams, $taxQuery );
		return new static();
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
