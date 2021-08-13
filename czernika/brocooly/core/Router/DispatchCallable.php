<?php

declare(strict_types=1);

namespace Brocooly\Router;

use Brocooly\Http\Controllers\BaseController;

class DispatchCallable
{
	public static function dispatch( $callable ) {
		if ( is_array( $callable ) ) {
			// This is controller method.
			return static::dispatchControllerMethod( $callable );
		}

		if ( is_subclass_of( $callable, BaseController::class ) ) {
			// Call invokable class.
			$class = static::callController( $callable );
			return call_user_func_array( $class, func_get_args() );
		}

		return call_user_func_array( $callable, func_get_args() );
	}

	/**
	 * Call method from Controller class.
	 *
	 * @param array $callback
	 * @return void
	 */
	private static function dispatchControllerMethod( array $callback ) {
		[ $object, $method ] = $callback;
		$class               = static::callController( $object );
		return call_user_func_array( [ $class, $method ], func_get_args() );
	}

	/**
	 * Inject all dependencies into Controller
	 *
	 * @param string $instance | class instance name.
	 * @return object
	 */
	private static function callController( string $instance ) {
		$class = app()->make( $instance );
		return $class;
	}
}
