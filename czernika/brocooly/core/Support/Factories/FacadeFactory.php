<?php
/**
 * Call method with args for provided factory
 *
 * @package Brocooly
 * @since 0.11.1
 */

declare(strict_types=1);

namespace Brocooly\Support\Factories;

class FacadeFactory
{
	/**
	 * Call filesystem methods
	 *
	 * @param string $method | method name.
	 * @param array  $args | method arguments.
	 * @return void
	 */
	public static function create( string $method, array $args, $factory ) {
		return app( $factory )->$method( ...$args );
	}
}
