<?php
/**
 * Create abstract factory
 *
 * @package Brocooly
 * @since 0.2.0
 */

declare(strict_types=1);

namespace Brocooly\Support\Facades;

class AbstractFacade
{
	public static function __callStatic( string $name, array $arguments = [] ) {
		$facade = app( static::accessor() );
		return $facade::create( $name, $arguments );
	}

	/**
	 * Accessor key at config
	 *
	 * @throws Exception
	 */
	protected static function accessor() {
		throw new \Exception(
			'Facade requires accessor to return string',
			true,
		);
	}
}
