<?php
/**
 * Abstract sidebar
 *
 * @package Brocooly
 * @since 0.4.0
 */

declare(strict_types=1);

namespace Brocooly\Models\Widgets;

abstract class AbstractSidebar
{

	public string $id = '';

    /**
	 * Get sidebar options
	 *
	 * @throws Exception
	 */
	public function options() {
		throw new \Exception(
			sprintf(
				'No sidebar options was set for "%s" sidebar!',
				$this->id,
			),
			true,
		);
	}
}
