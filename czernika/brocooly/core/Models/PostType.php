<?php
/**
 * Abstract post type model
 *
 * @package Brocooly
 * @since 0.2.0
 */

declare(strict_types=1);

namespace Brocooly\Models;

use Timber\Post;
use Carbon_Fields\Container;
use Brocooly\Builders\QueryBuilder;

abstract class PostType extends Post
{

	/**
	 * Post type slug
	 * Must be unique
	 *
	 * @var string
	 */
	protected static string $name = 'post';

	/**
	 * Post type options
	 * Same as for `register_post_type`
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
		if ( ! static::$name ) {
			throw new \Exception( 'You must specify post type name', true );
		}

		return static::$name;
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
		$container = Container::make( 'post_meta', $id, $label )
						->where( 'post_type', '=', static::$name );
		return $container;
	}

	/**
	 * Get posts by query
	 *
	 * @param string $name | method name.
	 * @param array  $arguments | method options.
	 * @return void
	 */
	public static function __callStatic( string $name, array $arguments ) {
		$arguments[] = static::$name;
		return QueryBuilder::$name( ...$arguments );
	}

}
