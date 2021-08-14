<?php
/**
 * Create abstract factory
 *
 * @package Brocooly
 * @since 0.2.0
 */

declare(strict_types=1);

namespace Brocooly\Support\Facades;

abstract class AbstractFacade
{

	/**
	 * Factory name
	 *
	 * @var null|object
	 */
	protected static $factory = null;

	public static function __callStatic( string $name, array $arguments = [] ) {
		$factory  = app( static::accessor() );
		return $factory::create( $name, $arguments, static::$factory );
	}

	/**
	 * Accessor key.
	 * By default is FacadeFactory
	 *
	 * @return string
	 */
	protected static function accessor() {
		return 'facade';
	}
}
