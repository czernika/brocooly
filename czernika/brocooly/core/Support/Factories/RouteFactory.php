<?php
/**
 * Call Router methods
 *
 * @see \Brocooly\Router\Router
 * 
 * @package Brocooly
 * @since 0.10.2
 */

declare(strict_types=1);

namespace Brocooly\Support\Factories;

class RouteFactory extends AbstractFactory
{	

	/**
	 * Call Router methods
	 *
	 * @param string $method | method name.
	 * @param array  $args | arguments for method.
	 * @return void
	 */
	public static function create( string $method, array $args ) {
		return app( 'routing' )->$method( ...$args );
	}
}
