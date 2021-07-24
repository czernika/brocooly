<?php

declare(strict_types=1);

namespace Brocooly\Storage;

class Context
{

	/**
	 * All context data
	 *
	 * @var array
	 */
	private static array $registry = [];

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
	 * Capsulate singleton
	 */
	private function __construct() {}
	private function __clone() {}
	private function __wakeup() {}
}
