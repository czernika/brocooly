<?php
/**
 * Helper functions
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Brocooly\App;
use Timber\Timber;
use Brocooly\Router\View;
use Brocooly\Router\Router;
use Brocooly\Storage\Config;
use Brocooly\Loaders\AssetsLoader;
use Brocooly\Http\Request\Request;

use function Env\env;

if ( ! function_exists( 'isTimberNext' ) ) {

	/**
	 * Compare Timber version is it later than 2.0
	 *
	 * @return bool
	 */
	function isTimberNext() {
		return version_compare( Timber::$version, '2', '>=' );
	}
}

if ( ! function_exists( 'isCurrentEnv' ) ) {

	/**
	 * Define if application is running in $env mode
	 *
	 * @param string $env | environment.
	 * @return bool
	 */
	function isCurrentEnv( string $env ) {
		return env( 'WP_ENV' ) === $env;
	}
}

if ( ! function_exists( 'isProduction' ) ) {

	/**
	 * Define if application is running in production mode
	 *
	 * @return bool
	 */
	function isProduction() {
		return isCurrentEnv( 'production' );
	}
}

if ( ! function_exists( 'container' ) ) {

	/**
	 * Return container instance
	 *
	 * @return \DI\Container
	 */
	function container() {
		return once(
			function() {
				return require_once CORE_PATH . '/container.php';
			}
		);
	}
}

if ( ! function_exists( 'app' ) ) {

	/**
	 * Return application instance
	 *
	 * @param string|null $key | key to get.
	 */
	function app( $key = null ) {
		$container = container();
		$app       = new App( $container );
		if ( isset( $key ) ) {
			return $app->get( $key );
		}
		return $app;
	}
}

if ( ! function_exists( 'config' ) ) {

	/**
	 * Return configuration object or provided default value
	 *
	 * @param string $key | key value.
	 * @param mixed  $default | default value if key was set and not found.
	 * @return mixed
	 */
	function config( string $key = null, $default = null ) {
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
	 * @param string $filePath | value to check.
	 * @return string
	 */
	function asset( string $filePath ) {
		$asset = app( AssetsLoader::class )->asset( $filePath );

		if ( $asset ) {
			$public         = trailingslashit( config( 'assets.public' ) );
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
	 * @param array  $ctx | context to pass with.
	 * @return string
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
	 * @return mixed
	 */
	function mod( string $key, $default = null ) {
		$prefix   = app( 'customizer_prefix' );
		$themeMod = $prefix . $key;
		return get_theme_mod( $themeMod, $default );
	}
}

if ( ! function_exists( 'request' ) ) {

	/**
	 * Get WordPress request object
	 *
	 * @param string|null $key | key from request.
	 * @return mixed
	 */
	function request( $key = null ) {
		$request = app( Request::class );
		if ( isset( $key ) ) {
			return $request->get( $key );
		}

		return $request;
	}
}

if ( ! function_exists( 'action' ) ) {

	/**
	 * Set action form handler
	 *
	 * @param string|null $name | action name.
	 * @return callable
	 */
	function action( string $name ) {
		Router::action( $name );
	}
}
