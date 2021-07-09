<?php
/**
 * Helper methods
 *
 * @package Czernika
 * @since 0.1.0
 */

use App\Brocooly;

if ( ! function_exists( 'app' ) ) {

	/**
	 * Return application instance
	 *
	 * @return App\Brocooly
	 */
	function app() {
		return Brocooly::getApp();
	}
}
