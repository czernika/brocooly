<?php
/**
 * All your custom filters and functions may be placed here.
 *
 * @package Brocooly
 * @since 0.1.0
 */

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
