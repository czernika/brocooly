<?php

declare(strict_types=1);

namespace Brocooly\Router;

class RequestHandler
{
	public static function defineRoute( $method, $routes ) {
		switch ( $method ) {
			case 'get':
				$routeWasDefined = static::handleGetRequest( $routes );
				break;

			default:
				$routeWasDefined = static::handleGetRequest( $routes );
				break;
		}

		return $routeWasDefined;
	}

	private static function handleGetRequest( $routes ) {
		foreach ( $routes as $route ) {
			if ( call_user_func( $route['name'] ) ) {
				DispatchCallable::dispatch( $route['callback'] );
				return true;
			}
		}
		return false;
	}
}
