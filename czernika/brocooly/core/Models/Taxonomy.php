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
use Brocooly\Support\Builders\QueryBuilder;

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
	 */
	public function getName() {
		if ( ! static::TAXONOMY ) {
			throw new \Exception( 'You must specify taxonomy name', true );
		}

		return static::TAXONOMY;
	}

	/**
	 * Get taxonomy post types
	 *
	 * @return void
	 */
	public function getPostTypes() {
		if ( ! static::$postTypes ) {
			throw new \Exception(
				/* translators: 1: taxonomy slug. */
				sprintf(
					'You must specify post type related to %s taxonomy',
					static::TAXONOMY
				),
				true
			);
		}

		return static::$postTypes;
	}

	/**
	 * Set taxonomy options
	 *
	 * @throws Exception
	 */
	protected function options() {
		throw new \Exception( 'You must specify post type options', true );
	}

	/**
	 * Return taxonomy options
	 *
	 * @throws Exception
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
	 * @param string $name | method name.
	 * @param array  $arguments | method options.
	 * @return void
	 */
	public static function __callStatic( string $method, array $arguments ) {
		$arguments[] = static::TAXONOMY;
		return QueryBuilder::$method( ...$arguments );
	}

}
