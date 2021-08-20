<?php
/**
 * Handle maintenance mode
 *
 * @package Brocooly
 * @since 0.12.3
 */

add_action(
	'wp',
	function () {
		if ( current_user_can( 'edit_themes' ) || is_user_logged_in() ) {
			return;
		}

		if ( (bool) env( 'MAINTENANCE_MODE' ) || wp_is_maintenance_mode() ) {

			$protocol = $_SERVER['SERVER_PROTOCOL'];
			if ( 'HTTP/1.1' !== $protocol && 'HTTP/1.0' !== $protocol ) {
				$protocol = 'HTTP/1.0';
			}

			header( "$protocol 503 Service Unavailable", true, 503 );
			header( 'Content-Type: text/html; charset=utf-8' );
			header( 'Retry-After: 600' );

			view( env( 'MAINTENANCE_TEMPLATE' ) );
			die();
		}
	}
);
