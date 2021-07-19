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
		$facade = app()->get( static::accessor() );
		return $facade::create( $name, $arguments );
	}

	/**
	 * Accessor key at config
	 *
	 * @return string
	 */
	protected static function accessor() {
		return 'facade';
	}
}
