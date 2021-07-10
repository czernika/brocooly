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
	 * @param string|null $key
	 * @return array|mixed
	 */
	public static function get( $key = null ) {

		if ( $key === null ) {
			return static::$data;
		}

		/**
		 * string $file - basename of file inside config directory
		 * string $data - array key to get inside $file
		 */
		[ $file, $data ] = explode( '.', $key );

		Assert::fileExists(
			BROCOOLY_THEME_PATH . 'config/' . $file . '.php',
			sprintf(
				'File %s not exists',
				esc_html( '/config/' . $file . '.php' )
			),
		);

		Assert::keyExists(
			static::$data[ $file ],
			$data,
			sprintf(
				'Key "%1$s" not exists in %2$s file',
				esc_html( $data ),
				esc_html( '/config/' . $file . '.php' )
			),
		);

		return static::$data[ $file ][ $data ];
	}

	/**
	 * Remove key from data
	 *
	 * @param string $key
	 * @return void
	 */
	public static function delete( string $key ) {
		unset( static::$data[ $key ] );
	}
}
