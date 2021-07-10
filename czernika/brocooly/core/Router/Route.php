<?php

declare(strict_types=1);

namespace Brocooly\Router;

use Brocooly\Controllers\AbstractController;

class Route
{
    private static array $routes = [];

	public static function __callStatic( $name, $arguments ) {
		[ $condition, $callback ]              = $arguments;
		static::$routes[ $name ][ $condition ] = $callback;
	}

	public static function resolve() {
		foreach ( static::$routes as $request => $options ) {
			if ( 'get' === $request ) {
				self::handleGetRequest( $options );
				break;
			}
		}
	}

	private static function handleGetRequest( $options ) {

		foreach ( $options as $condition => $callback ) {

			if ( call_user_func( $condition ) ) {
				if ( is_array( $callback ) ) {
					return self::dispatchControllerMethod( $callback );
				} else {

					if ( is_subclass_of( $callback, AbstractController::class ) ) {
						$class = self::callController( $callback );
						return call_user_func_array( [ $class, '__invoke' ], func_get_args() );
					}

					return call_user_func_array( $callback, func_get_args() );

				}
				break;
			}
		}
	}

	public static function ajax( $action, $callback ) {
		[ $class, $method ] = $callback;
		$class              = app()->injectOn( app()->make( $class ) );

		add_action( "wp_ajax_$action", [ $class, $method ] );
		add_action( "wp_ajax_nopriv_$action", [ $class, $method ] );
	}

	private static function dispatchControllerMethod( $callback ) {
		[ $class, $method ] = $callback;
		$class              = self::callController( $class );
		return call_user_func_array( [ $class, $method ], func_get_args() );
	}

	private static function callController( $instance ) {
		$class = app()->injectOn( app()->make( $instance ) );
		return $class;
	}
}
