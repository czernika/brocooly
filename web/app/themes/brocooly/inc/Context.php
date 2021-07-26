<?php
/**
 * Theme Timber context.
 * This context will be available on any page as key value.
 * This array will be added to the global context through the `timber/context` filter
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Theme;

class Context
{

	/**
	 * Set theme custom object
	 *
	 * @return array | custom theme context.
	 */
	public static function get() {
		$context = [
			'is_front'    => is_front_page(),
			'is_singular' => is_singular(),
			'nonce'       => wp_create_nonce( 'brocooly_nonce_action' ),
		];

		return $context;
	}
}
