<?php
/**
 * Redirect handler
 *
 * @package Brocooly
 * @since 0.8.0
 */

declare(strict_types=1);

namespace Brocooly\Router;

class Redirect
{

	public static function to( string $to ) {
		wp_safe_redirect( esc_url( $to ) );
		exit;
	}

	public static function home() {
		return esc_url( home_url( '/' ) );
	}

	public static function from() {
		return esc_url( filter_input( INPUT_SERVER, 'REQUEST_URI' ) );
	}
}
