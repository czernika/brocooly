<?php
/**
 * Abstract customizer panel
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Brocooly\Customizer;

abstract class AbstractPanel
{

	/**
	 * Panel id
	 *
	 * @var string
	 */
    public static string $id = 'unknown';

	/**
	 * Panel settings
	 *
	 * @throws Exception
	 */
	public function options() {
		throw new \Exception(
			sprintf(
				'Options for "%s" panel is not defined!',
				$this->id,
			),
			true,
		);
	}
}
