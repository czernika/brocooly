<?php

declare(strict_types=1);

namespace Brocooly\Support\Builders;

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
	 * Get all posts
	 *
	 * @param string $name | post type name.
	 * @return array|null
	 */
	public static function all( string $name, $args = [] ) {
		$terms = get_terms( $name, $args );
		return $terms;
	}

	public static function postsById( string $name, $ids ) {
		$taxQuery = [
			'tax_query' => [
				'taxonomy' => $name,
				'field'    => 'id',
				'terms'    => $ids,
			],
		];
		$query    = array_merge( static::$queryParams, $taxQuery );
		$posts    = Timber::get_posts( $query );

		return $posts;
	}
}
