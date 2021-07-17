<?php
/**
 * Helper methods
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Brocooly\App;
use Timber\Timber;
use Brocooly\Router\View;
use Brocooly\Storage\Config;
use Brocooly\Loaders\AssetsLoader;

if ( ! function_exists( 'isTimberNext' ) ) {

	/**
	 * Return application instance
	 */
	function isTimberNext() {
		return version_compare( Timber::$version, '2', '>=' );
	}
}

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
	 * @param $key | key value.
	 * @param $default | default value if key was set and not found
	 *
	 * @return mixed
	 */
	function config( $key = null, $default = null ) {
		if ( Config::get( $key ) || null === $default ) {
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
	 * @return string
	 */
	function asset( $filePath ) {
		$asset = ( new AssetsLoader( app() ) )->asset( $filePath );

		if ( $asset ) {
			$public         = trailingslashit( config( 'assets.public', 'public/' ) );
			$publicFilePath = BROCOOLY_THEME_URI . $public . $asset;
			return $publicFilePath;
		}

		return BROCOOLY_THEME_URI . 'resources/' . $filePath;
	}
}

if ( ! function_exists( 'view' ) ) {

	/**
	 * Render helper
	 *
	 * @param string $views | view file to be rendered.
	 * @param array  $ctx | context to pass with
	 * @return void
	 */

	function view( string $views, array $ctx = [] ) {
		return View::make( $views, $ctx );
	}
}

if ( ! function_exists( 'mod' ) ) {

	/**
	 * Theme mod wrapper
	 *
	 * @param string $key | theme mod helper.
	 * @param mixed  $default | default value.
	 * @return void
	 */

	function mod( string $key, $default = null ) {
		$prefix   = app()->get( 'customizer_prefix' );
		$themeMod = $prefix . $key;
		return get_theme_mod( $themeMod, $default );
	}
}
