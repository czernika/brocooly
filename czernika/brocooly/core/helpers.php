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
	function config( $key = null ) {
		return Config::get( $key );
	}
}

if ( ! function_exists( 'dd' ) ) {
	function dd( $val ) {
		echo '<pre>';
		print_r( $val );
		echo '</pre>';
		die();
	}
}

if ( ! function_exists( 'dump' ) ) {
	function dump( $val ) {
		echo '<pre>';
		print_r( $val );
		echo '</pre>';
	}
}

if ( ! function_exists( 'asset' ) ) {
	function asset( $filePath ) {
		$asset          = ( new AssetsLoader( app() ) )->asset( $filePath );
		$public         = trailingslashit( config( 'assets.public' ) ) ?? 'public/';
		$publicFilePath = BROCOOLY_THEME_URI . $public . $asset;
		return $publicFilePath;
	}
}
