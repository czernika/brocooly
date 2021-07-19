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
	 * Taxonomy slug
	 * Must be unique
	 *
	 * @var string
	 */
	protected static string $taxName = 'category';

	/**
	 * Post type related to taxonomy
	 * Same as for `register_taxonomy`
	 *
	 * @var array|string
	 */
	protected static $postTypes = 'post';

	/**
	 * Taxonomy options
	 * Same as for `register_taxonomy`
	 *
	 * @var array
	 */
	protected array $options = [];

	/**
	 * Get post type name
	 *
	 * @return string
	 */
	public function getName() {
		if ( ! static::$taxName ) {
			throw new \Exception( 'You must specify taxonomy name', true );
		}

		return static::$taxName;
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function getPostTypes() {
		if ( ! static::$postTypes ) {
			throw new \Exception(
				sprintf(
					'You must specify post type related to %s taxonomy',
					static::$taxName
				),
				true
			);
		}

		return static::$postTypes;
	}

	/**
	 * Set post type options
	 *
	 * @param array $options
	 * @return void
	 */
	public function setOptions( array $options ) {
		$this->options = $options;
	}

	/**
	 * Get post type options
	 *
	 * @return string
	 */
	public function getOptions() {
		return $this->options;
	}

	/**
	 * Create metabox container for post types
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
						->where( 'term_taxonomy', '=', static::$taxName );
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
		$arguments[] = static::$taxName;
		return QueryBuilder::$method( ...$arguments );
	}

}
