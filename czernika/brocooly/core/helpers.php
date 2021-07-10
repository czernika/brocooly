<?php
/**
 * Helper methods
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Brocooly\App;
use Brocooly\Loaders\AssetsLoader;
use Brocooly\Storage\Config;

if ( ! function_exists( 'app' ) ) {

	/**
	 * Return application instance
	 */
	function app() {
		return App::getApp();
	}
}

if ( ! function_exists( 'config' ) ) {

	/**
	 * Return configuration object or provided default value
	 */
	function config( $key = null, $default = null ) {
		if ( Config::get( $key ) || $default === null ) {
			return Config::get( $key );
		}
		
		return $default;
	}
}

if ( ! function_exists( 'dd' ) ) {

	/**
	 * Dump and die helper
	 *
	 * @param mixed $val | value to check.
	 * @return void
	 */
	function dd( $val ) {
		echo '<pre>';
		print_r( $val );
		echo '</pre>';
		die();
	}
}

if ( ! function_exists( 'dump' ) ) {

	/**
	 * Dump helper
	 *
	 * @param mixed $val | value to check.
	 * @return void
	 */
	function dump( $val ) {
		echo '<pre>';
		print_r( $val );
		echo '</pre>';
	}
}

if ( ! function_exists( 'asset' ) ) {

	/**
	 * Get asset path from manifest file
	 *
	 * @param mixed $val | value to check.
	 * @return void
	 */
	function asset( $filePath ) {
		$asset          = ( new AssetsLoader( app() ) )->asset( $filePath );
		$public         = trailingslashit( config( 'assets.public', 'public/' ) );
		$publicFilePath = BROCOOLY_THEME_URI . $public . $asset;
		return $publicFilePath;
	}
}
