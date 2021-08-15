<?php
/**
 * Application Config instance
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Storage;

use Webmozart\Assert\Assert;

class Config
{

	/**
	 * Configuration data
	 *
	 * @var array
	 */
	public static array $data = [];

	/**
	 * Set config value
	 *
	 * @param string $key | key name.
	 * @param mixed  $value | key value.
	 * @return void
	 */
	public static function set( string $key, $value ) {
		static::$data[ $key ] = $value;
	}

	/**
	 * Get configuration value by key
	 * If no key passed return whole array
	 *
	 * @param string|null $key | key to get.
	 * @return array|mixed
	 */
	public static function get( string $key = null ) {

		if ( null === $key ) {
			return static::$data;
		}

		/**
		 * String $file - basename of file inside config directory
		 * String $data - array key to get inside $file
		 */
		[ $file, $data ] = explode( '.', $key );

		Assert::fileExists(
			BROCOOLY_THEME_PATH . 'config/' . $file . '.php',
			/* translators: 1: file name. */
			sprintf(
				'File %s not exists',
				esc_html( wp_normalize_path( BROCOOLY_THEME_PATH . 'config/' . $file . '.php' ) )
			),
		);

		if ( key_exists( $data, static::$data[ $file ] ) ) {
			return static::$data[ $file ][ $data ];
		}

		return null;
	}

	/**
	 * Remove key from data
	 *
	 * @param string $key | key to delete.
	 * @return void
	 */
	public static function delete( string $key ) {
		unset( static::$data[ $key ] );
	}
}
