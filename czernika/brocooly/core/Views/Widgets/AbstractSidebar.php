<?php
/**
 * Abstract sidebar
 *
 * @package Brocooly
 * @since 0.4.0
 */

declare(strict_types=1);

namespace Brocooly\Views\Widgets;

abstract class AbstractSidebar
{

	/**
	 * Sidebar id
	 *
	 * @var string
	 */
	const SIDEBAR_ID = 'sidebar';

	/**
	 * Get sidebar options
	 *
	 * @throws Exception
	 */
	public function options() {
		throw new \Exception(
			/* translators: 1: sidebar location id. */
			sprintf(
				'No sidebar options was set for "%s" sidebar!',
				static::SIDEBAR_ID,
			),
			true,
		);
	}
}
