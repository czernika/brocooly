<?php

declare(strict_types=1);

namespace Brocooly\Router;

use Webmozart\Assert\Assert;

class RequestHandler
{

	private static $routes = [];

	public static function defineRoute( $routes ) {
		static::$routes = $routes;

		$routeWasDefined = static::handleGetRequest();
		return $routeWasDefined;
	}

	private static function handleGetRequest() {
		$routes = collect( static::$routes )
					->except( [ 'post' ] )
					->all();

		foreach ( $routes['get'] as $route ) {
			if ( call_user_func( $route['name'] ) ) {
				DispatchCallable::dispatch( $route['callback'] );
				return true;
			}
		}
		return false;
	}

	public static function handlePostRequest( $key ) {
		$routes = collect( static::$routes['post'] );

		$routesCollection = $routes->filter(
			function( $r ) use ( $key ) {
				return $r['name'] === $key;
			}
		);

		Assert::notEmpty( $routesCollection->toArray(), sprintf( 'Route %s was not found', $key ) );

		if ( $_POST && ! empty( $_POST ) ) { // phpcs:ignore WordPress.Security.NonceVerification
			DispatchCallable::dispatch( $routesCollection->first()['callback'] );
			return true;
		}
		return false;
	}
}
