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

abstract class AbstractOption
{

	/**
	 * Option settings
	 *
	 * @throws \Exception | If option settings was not set.
	 */
	public function settings() {
		throw new \Exception(
			/* translators: 1 - class name. */
			sprintf(
				'No settings were specified for "%s" class',
				get_class( $this ),
			)
		);
	}
}
