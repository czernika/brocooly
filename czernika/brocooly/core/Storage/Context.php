<?php

declare(strict_types=1);

namespace Brocooly\Storage;

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

	public static function instantiate() {
		return self::$instance ?? new self();
	}

	private function __construct() {}

	private function __clone() {}

	private function __wakeup() {}

	private static function getTimberContext() {
		return Timber::context();
	}

	public static function set( $key, $value ) {
		self::$registry[ $key ] = $value;
	}

	public static function get( $key = null ) {
		$registry      = self::$registry;
		$timberContext = self::getTimberContext();
		$context       = array_merge( $registry, $timberContext );

		if ( isset( $key ) ) {
			return $context[ $key ];
		}

		return $context;
	}
}
