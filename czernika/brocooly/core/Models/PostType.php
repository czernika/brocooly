<?php
/**
 * Abstract post type model
 *
 * @package Brocooly
 * @since 0.2.0
 */

declare(strict_types=1);

namespace Brocooly\Models;

use Brocooly\Builders\QueryBuilder;
use Timber\Post;

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
