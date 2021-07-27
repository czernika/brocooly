<?php
/**
 * Define which request to handle
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Router;

use Brocooly\Http\Controllers\BaseController;

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
		[ $condition, $callback ] = $arguments;

		$id = isset( $arguments[2] ) ? $arguments[2] : uniqid();

		static::$routes[ $name ][ $id ]['condition'] = $condition;
		static::$routes[ $name ][ $id ]['callback']  = $callback;
	}

	/**
	 * Handle GET request
	 *
	 * @param array $options | passed options.
	 */
	private static function handleGetRequest( array $options ) {
		foreach ( array_values( $options ) as $option ) {

			$condition = static::setCondition( $option['condition'] );

			if ( call_user_func( ...$condition ) ) {
				if ( is_array( $option['callback'] ) ) {
					return static::dispatchControllerMethod( $option['callback'] );
				} else {
					if ( is_subclass_of( $option['callback'], BaseController::class ) ) {
						$class = static::callController( $option['callback'] );
						return call_user_func_array( $class, func_get_args() );
					}

					return call_user_func_array( $option['callback'], func_get_args() );
				}
				break;
			}
		}
	}

	/**
	 * Handle simple view request
	 *
	 * @param array $options | passed options.
	 */
	private static function handleViewMethod( array $options ) {
		foreach ( array_values( $options ) as $option ) {
			if ( call_user_func( $option['condition'] ) ) {
				return view( $option['callback'] );
			}
		}
	}

	/**
	 * Resolve which view to render
	 */
	public static function resolve() {
		foreach ( static::$routes as $request => $options ) {
			if ( 'get' === $request ) {
				static::handleGetRequest( $options );
				continue;
			}

			if ( 'view' === $request ) {
				static::handleViewMethod( $options );
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
		[ $object, $method ] = $callback;
		$class              = static::callController( $object );
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

	/**
	 * Set condition to array format
	 *
	 * @param array|string $condition | condition.
	 * @return array
	 */
	private static function setCondition( $condition ) {
		return (array) $condition;
	}
}
