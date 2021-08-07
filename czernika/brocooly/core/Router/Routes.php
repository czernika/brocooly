<?php

declare(strict_types=1);

namespace Brocooly\Router;

class Routes
{
	private static array $routes = [];

	public static function getRoutes() {
		return static::$routes;
	}

	public static function addRoute( $method, $name, $callback ) {
		$routeId = wp_unique_id();

		static::$routes[ $method ][ $routeId ]['name']     = $name;
		static::$routes[ $method ][ $routeId ]['callback'] = $callback;
	}
}
