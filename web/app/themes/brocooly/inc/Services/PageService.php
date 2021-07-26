<?php
/**
 * Page Service
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Services;

use Theme\Contracts\PageServiceContract;

class PageService implements PageServiceContract
{

	/**
	 * Get phrase on Hello screen
	 *
	 * @return string
	 */
	public function getHelloPhrase() {
		return sprintf(
			/* translators: 1 - theme version */
			esc_html__( 'Welcome to Brocooly Framework v%s', 'brocooly' ),
			wp_get_theme()->get( 'Version' ),
		);
	}
}
