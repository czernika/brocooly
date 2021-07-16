<?php
/**
 * Define which request to handle
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Router;

use Brocooly\Controllers\BaseController;

class Route
{
	/**
	 * Routes array
	 *
	 * @var array
	 */
    private static array $routes = [];

	/**
	 * Handle any request
	 *
	 * @param string $name | method name.
	 * @param array  $arguments | passed arguments.
	 * @return void
	 */
	public static function __callStatic( string $name, array $arguments ) {
		[ $condition, $callback ]              = $arguments;
		static::$routes[ $name ][ $condition ] = $callback;
	}

	/**
	 * Handle GET request
	 *
	 * @param array $options | passed options.
	 * @return void
	 */
	private static function handleGetRequest( array $options ) {
		foreach ( $options as $condition => $callback ) {
			if ( call_user_func( $condition ) ) {
				if ( is_array( $callback ) ) {
					return self::dispatchControllerMethod( $callback );
				} else {
					if ( is_subclass_of( $callback, BaseController::class ) ) {
						$class = self::callController( $callback );
						return call_user_func_array( $class, func_get_args() );
					}

					return call_user_func_array( $callback, func_get_args() );
				}
				break;
			}
		}
	}

	/**
	 * Handle simple view request
	 *
	 * @param array $options | passed options.
	 * @return void
	 */
	private static function handleViewMethod( array $options ) {
		foreach ( $options as $condition => $view ) {
			if ( call_user_func( $condition ) ) {
				return view( $view );
				break;
			}
		}
	}

	/**
	 * Resolve which view to render
	 */
	public static function resolve() {
		foreach ( static::$routes as $request => $options ) {
			if ( 'get' === $request ) {
				self::handleGetRequest( $options );
			}

			if ( 'view' === $request ) {
				self::handleViewMethod( $options );
			}
		}
	}

	/**
	 * Handle AJAX requests
	 *
	 * @param string       $action | action name.
	 * @param string|array $callback | callable function.
	 * @return void
	 */
	public static function ajax( string $action, $callback ) {
		[ $class, $method ] = $callback;
		$class              = app()->injectOn( app()->make( $class ) );

		add_action( "wp_ajax_$action", [ $class, $method ] );
		add_action( "wp_ajax_nopriv_$action", [ $class, $method ] );
	}

	/**
	 * Call method from Controller class.
	 *
	 * @param array $callback
	 * @return void
	 */
	private static function dispatchControllerMethod( array $callback ) {
		[ $class, $method ] = $callback;
		$class              = self::callController( $class );
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
