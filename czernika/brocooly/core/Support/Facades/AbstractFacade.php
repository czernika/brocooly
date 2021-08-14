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
	public static function __callStatic( string $name, array $arguments = [] ) {
		$factory = app( static::accessor() );
		return $factory::create( $name, $arguments );
	}

	/**
	 * Accessor key at config
	 *
	 * @throws \Exception | if no accessor was provided.
	 */
	protected static function accessor() {
		throw new \Exception( 'Facade requires accessor to return string' );
	}
}
