<?php
/**
 * App Context singleton
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Storage;

use Theme\Context as ThemeContext;
use Timber\Timber;

class Context
{

	/**
	 * Context instance
	 *
	 * @var mixed
	 */
    private static $instance;

	/**
	 * All context data
	 *
	 * @var array
	 */
	private static array $registry = [];

	/**
	 * Instantiate Context object
	 */
	public static function instantiate() {
		$context        = self::getTimberContext();
		self::$registry = $context;
		
		return self::$instance ?? new self();
	}

	/**
	 * Set context value
	 *
	 * @param string $key | key name.
	 * @param mixed $value | key value.
	 * @return void
	 */
	public static function set( string $key, $value ) {
		self::$registry[ $key ] = $value;
	}

	/**
	 * Set context value
	 *
	 * @param array $ctx | custom context array.
	 * @return void
	 */
	public static function merge( array $ctx ) {
		self::$registry = array_merge( self::$registry, $ctx );
	}

	/**
	 * Get key from Context data
	 *
	 * @param string|null $key | key name.
	 * @return array|mixed
	 */
	public static function get( $key = null ) {
		if ( isset( self::$registry[ $key ] ) ) {
			return self::$registry[ $key ];
		}

		return self::$registry;
	}

	/**
	 * Remove key from context
	 *
	 * @param string $key
	 * @return void
	 */
	public static function delete( string $key ) {
		unset( self::$registry[ $key ] );
	}

	/**
	 * Get Timber context
	 *
	 * @return array
	 */
	private static function getTimberContext() {
		return Timber::context();
	}

	/**
	 * Capsulate singleton
	 */
	private function __construct() {}
	private function __clone() {}
	private function __wakeup() {}
}
