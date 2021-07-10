<?php
/**
 * Helper methods
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Brocooly\App;
use Brocooly\Storage\Config;

if ( ! function_exists( 'app' ) ) {

	/**
	 * Return application instance
	 *
	 * @return App\Brocooly
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
