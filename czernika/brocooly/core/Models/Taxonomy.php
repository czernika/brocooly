<?php
/**
 * Abstract taxonomy model
 *
 * @package Brocooly
 * @since 0.2.1
 */

declare(strict_types=1);

namespace Brocooly\Models;

use Timber\Term;
use Carbon_Fields\Container;
use Brocooly\Support\Builders\TaxonomyQueryBuilder;

abstract class Taxonomy extends Term
{

	/**
	 * Register taxonomy or not
	 * Sometimes you don't want to register taxonomy as it is already may be registered
	 * but you want to add extra metaboxes or queries
	 *
	 * In that case just set this variable to `true`
	 *
	 * @var bool
	 */
	public bool $doNotRegister = false;

	/**
	 * Taxonomy slug
	 *
	 * @var string
	 */
	const TAXONOMY = 'category';

	/**
	 * Post type related to taxonomy
	 * Same as for `register_taxonomy`
	 *
	 * @var array|string
	 */
	protected static $postTypes = 'post';

	/**
	 * Get post type name
	 *
	 * @return string
	 * @throws \Exception | taxonomy name was not set.
	 */
	public function getName() {
		if ( ! static::TAXONOMY ) {
			throw new \Exception( 'You must specify taxonomy name' );
		}

		return static::TAXONOMY;
	}

	/**
	 * Get taxonomy post types
	 *
	 * @return string|array
	 * @throws \Exception | Post type was not set.
	 */
	public function getPostTypes() {
		if ( ! static::$postTypes ) {
			throw new \Exception(
				/* translators: 1: taxonomy slug. */
				sprintf(
					'You must specify post type related to %s taxonomy',
					static::TAXONOMY
				)
			);
		}

		return static::$postTypes;
	}

	/**
	 * Set taxonomy options
	 *
	 * @throws \Exception | Taxonomy options were not set.
	 */
	protected function options() {
		throw new \Exception( 'You must specify taxonomy options' );
	}

	/**
	 * Return taxonomy options
	 *
	 * @return array
	 */
	public function getOptions() {
		return $this->options();
	}

	/**
	 * Create metabox container for taxonomy
	 *
	 * @param string $id | container id.
	 * @param string $label | container label.
	 * @param array  $fields | array of custom fields.
	 * @return void
	 */
	protected function createFields( string $id, string $label, array $fields ) {
		$this->setContainer( $id, $label )
			->add_fields( $fields );
	}

	/**
	 * Set metabox container
	 *
	 * @param string $id | container id.
	 * @param string $label | container label.
	 * @return object
	 */
	protected function setContainer( string $id, string $label ) {
		$container = Container::make( 'term_meta', $id, $label )
						->where( 'term_taxonomy', '=', static::TAXONOMY );
		return $container;
	}

	/**
	 * Get posts by query
	 *
	 * @param string $method | method name.
	 * @param array  $arguments | method options.
	 * @return void
	 */
	public static function __callStatic( string $method, array $arguments ) {
		array_unshift( $arguments, static::TAXONOMY );
		return TaxonomyQueryBuilder::$method( ...$arguments );
	}

	/**
	 * Create new term
	 *
	 * @param string $term | term name.
	 * @param array  $data | additional data, like parent, slug, description.
	 * @return array | term taxonomy data.
	 */
	public static function create( string $term, array $data ) {
		return wp_insert_term( $term, static::TAXONOMY, $data );
	}

}
