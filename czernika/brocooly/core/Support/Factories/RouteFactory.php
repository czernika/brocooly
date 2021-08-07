<?php

declare(strict_types=1);

namespace Brocooly\Support\Factories;

class RouteFactory extends AbstractFactory
{
	public static function create( string $method, array $args ) {
		return app()->get( 'routing' )->$method( ...$args );
	}
}
