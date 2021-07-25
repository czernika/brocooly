<?php
/**
 * Abstract customizer option
 * Same parameters as for any Kirki control option
 *
 * @link https://kirki.org/docs/controls/
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
	public function settings() {
		throw new \Exception(
			'Controls settings was not defined',
			true,
		);
	}
}
