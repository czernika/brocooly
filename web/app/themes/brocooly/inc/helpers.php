<?php
/**
 * All your custom filters and functions may be placed here.
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Honeybadger\Honeybadger;

use function Env\env;

if ( ! function_exists( 'clearPhone' ) ) {

	/**
	 * Remove non-digits from phone number.
	 * Only plus sign allowed also.
	 *
	 * @param string $phone | phone number to clear.
	 * @return string
	 */
	function clearPhone( string $phone ) {
		return preg_replace( '/[^0-9+]/', '', esc_attr( $phone ) );
	}
}

/**
 * --------------------------------------------------------------------------
 * Honeybadger app
 * --------------------------------------------------------------------------
 *
 * Honeybadger simplifies your production stack by combining three of the most common types of monitoring into a single, easy to use platform.
 * Honeybadger provides all the context you need to understand what is causing each exception, who's affected by it, and makes it easy to follow up with those users once the fix has been deployed.
 *
 * @link https://www.honeybadger.io/
 * @since 0.8.9
 */
if ( ! function_exists( 'honeyBadger' ) ) {

	/**
	 * Set honeybadger notifications
	 * ONLY in production mode.
	 */
	function honeyBadger() {
		$api_key = env( 'HONEY_KEY' );
		if ( isProduction() && $api_key ) {
			$honeybadger = Honeybadger::new( compact( 'api_key' ) );
			return $honeybadger;
		}

		return null;
	}
}

if ( ! function_exists( 'notify' ) ) {

	/**
	 * Notify on errors.
	 *
	 * @param Throwable $th | error message.
	 */
	function notify( Throwable $th ) {
		return honeyBadger() ? honeyBadger()->notify( $th ) : null;
	}
}
