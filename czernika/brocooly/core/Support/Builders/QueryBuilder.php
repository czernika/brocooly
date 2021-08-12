<?php
/**
 * Query builder.
 * Wrapper fow WP_Query
 *
 * @package Brocooly
 * @since 0.10.2
 */

declare(strict_types=1);

namespace Brocooly\Support\Builders;

use Timber\Timber;
use Timber\PostQuery;

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
	 * Author query
	 *
	 * @param integer|array $authorId | array of authors id.
	 * @return self
	 */
	public function whereAuthor( $authorId ) {
		if ( is_array( $authorId ) ) {
			$authorQuery = [ 'author__in' => $authorId ];
		} else {
			$authorQuery = [ 'author' => $authorId ];
		}
		static::$queryParams = array_merge( $authorQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Set post status to query
	 *
	 * @param string|array $status | post status.
	 * @return self
	 */
	public static function whereStatus( $status ) {
		$sortQuery           = [ 'post_status' => $status ];
		static::$queryParams = array_merge( $sortQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Sort query
	 *
	 * @param string $order | order type.
	 * @param string $orderby | order by.
	 * @return self
	 */
	public function sort( string $order, string $orderby ) {
		$sortQuery           = [
			'order'   => $order,
			'orderby' => $orderby,
		];
		static::$queryParams = array_merge( $sortQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Sort posts by ASC
	 *
	 * @return self
	 */
	public function sortASC() {
		$sortQuery           = [ 'order' => 'ASC' ];
		static::$queryParams = array_merge( $sortQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Sort posts by DESC
	 *
	 * @return self
	 */
	public function sortDESC() {
		$sortQuery           = [ 'order' => 'DESC' ];
		static::$queryParams = array_merge( $sortQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Set offset to query
	 *
	 * @param integer $offset | number of posts to offset.
	 * @return self
	 */
	public function offset( int $offset ) {
		$offsetQuery         = [ 'offset' => $offset ];
		static::$queryParams = array_merge( $offsetQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Ignore sticky posts
	 *
	 * @return self
	 */
	public function noSticky() {
		$noStickyQuery       = [ 'ignore_sticky_posts' => true ];
		static::$queryParams = array_merge( $noStickyQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Suppress filter
	 *
	 * @return self
	 */
	public function suppress() {
		$suppressQuery       = [ 'suppress_filters' => true ];
		static::$queryParams = array_merge( $suppressQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Date query AFTER date
	 *
	 * @param string $date | date after.
	 * @return self
	 */
	public function after( string $date ) {
		$dateQuery           = [
			'date_query' => [
				'after' => $date,
			],
		];
		static::$queryParams = array_merge( $dateQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Date query BEFORE date
	 *
	 * @param string $date | date before.
	 * @return self
	 */
	public function before( string $date ) {
		$dateQuery           = [
			'date_query' => [
				'before' => $date,
			],
		];
		static::$queryParams = array_merge( $dateQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Date query BETWEEN date
	 *
	 * @param string $before | date before.
	 * @param string $after | date after.
	 * @return self
	 */
	public function between( $before, $after ) {
		$dateQuery           = [
			'date_query' => [
				[
					'before' => $before,
				],
				[
					'after' => $after,
				],
			],
		];
		static::$queryParams = array_merge( $dateQuery, static::$queryParams );

		return new self();
	}

	/**
	 * Get posts by custom query
	 *
	 * @param string $name | post type name.
	 * @param array  $query | query array.
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
	 * Get query depends on version
	 *
	 * @param array $query | query.
	 * @return array|null
	 */
	protected static function getQuery( array $query ) {
		if ( isTimberNext() ) {
			return Timber::get_posts( $query );
		}

		return new PostQuery( $query );
	}

	/**
	 * Get posts by query
	 *
	 * @return object
	 */
	public static function get() {
		$posts = Timber::get_posts( static::$queryParams );
		return $posts;
	}

	/**
	 * Get posts collection
	 *
	 * @return object
	 */
	public static function collect() {
		return collect( static::get() );
	}

	/**
	 * Get first post of a query
	 *
	 * @return object
	 */
	public static function first() {
		$post = static::collect()->first();
		return $post;
	}

	/**
	 * Get first post of a query
	 *
	 * @return object
	 */
	public static function last() {
		$post = static::collect()->last();
		return $post;
	}

	/**
	 * Get first post of a query
	 *
	 * @return object
	 */
	public static function shuffle() {
		$post = static::collect()->shuffle();
		return $post;
	}

	/**
	 * Get first post of a query
	 *
	 * @return object
	 */
	public static function random() {
		$post = static::collect()->random();
		return $post;
	}
}
