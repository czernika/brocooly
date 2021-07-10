<?php
/**
 * Helper methods
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Brocooly\App;

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
