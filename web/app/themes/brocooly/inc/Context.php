<?php
/**
 * Theme Context
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Theme;

class Context
{

	/**
	 * Get theme custom object
	 * ! It HAS to be static and has to be named `get()`
	 *
	 * @return array
	 */
	public static function get() {

		/**
		 * Add values here
		 * TODO: improve such logic
		 */
		$context = [
			'queried'     => get_queried_object(),
			'is_front'    => is_front_page(),
			'is_singular' => is_singular(),
			'nonce'       => wp_create_nonce( 'brocooly_nonce_action' ),
		];

		return $context;
	}
}
