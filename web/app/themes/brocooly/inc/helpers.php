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

if ( ! function_exists( 'carbonPostMeta' ) ) {

	/**
	 * Carbon Fields post meta
	 *
	 * @param string   $key | key ti retrieve.
	 * @param int|null $id | post ID.
	 * @return mixed
	 */
	function carbonPostMeta( string $key, $id = null ) {
		if ( class_exists( 'Carbon_Fields\Carbon_Fields' ) ) {
			$postId = $id ?? get_the_ID();
			$meta   = carbon_get_post_meta( $postId, $key );
			return $meta;
		}

		return null;
	}
}
