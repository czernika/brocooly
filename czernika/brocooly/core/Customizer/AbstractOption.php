<?php
/**
 * Abstract customizer option
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Brocooly\Customizer;

class AbstractOption
{

	/**
	 * Option settings
	 *
	 * @throws Exception
	 */
	public function options() {
		throw new \Exception(
			'Controls settings was not defined',
			true,
		);
	}
}
