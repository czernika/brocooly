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

	private static bool $__route_was_hit = false;

	/**
	 * Handle any request
	 *
	 * @param string $name | method name.
	 * @param array  $arguments | passed arguments.
	 * @return void
	 */
	public static function __callStatic( string $name, array $arguments ) {

		if ( count( $arguments ) > 1 ) {
			[ $condition, $callback ] = $arguments;
		} else {
			$condition = $name;
			$callback  = $arguments[0];
			$name      = 'query';
		}

		$id = uniqid();

		static::$routes[ $name ][ $id ]['condition'] = $condition;
		static::$routes[ $name ][ $id ]['callback']  = $callback;
	}

	/**
	 * Handle GET request
	 *
	 * @param array $options | passed options.
	 */
	private static function handleConditionalRequest( array $options ) {
		foreach ( array_values( $options ) as $option ) {

			$condition = static::setCondition( $option['condition'] );

			if ( call_user_func( ...$condition ) ) {
				$callback = $option['callback'];

				if ( is_array( $callback ) ) {
					static::$__route_was_hit = true;
					return static::dispatchControllerMethod( $callback );
				} else {
					if ( is_subclass_of( $option['callback'], BaseController::class ) ) {
						$class                   = static::callController( $callback );
						static::$__route_was_hit = true;
						return call_user_func_array( $class, func_get_args() );
					}
					static::$__route_was_hit = true;
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
	 */
	private static function handleViewMethod( array $options ) {
		foreach ( array_values( $options ) as $option ) {
			if ( call_user_func( $option['condition'] ) ) {
				static::$__route_was_hit = true;
				return view( $option['callback'] );
			}
		}
	}

	/**
	 * Resolve which view to render
	 */
	public static function resolve() {
		foreach ( static::$routes as $request => $options ) {
			if ( ! static::$__route_was_hit ) {
				if ( in_array( $request, [ 'query', 'condition' ], true ) ) {
					static::handleConditionalRequest( $options );
				}

				if ( 'view' === $request ) {
					static::handleViewMethod( $options );
				}
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
		$classObject        = app()->make( $class );

		add_action( "wp_ajax_$action", [ $classObject, $method ] );
		add_action( "wp_ajax_nopriv_$action", [ $classObject, $method ] );
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
