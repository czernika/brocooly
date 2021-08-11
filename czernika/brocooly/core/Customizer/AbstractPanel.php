<?php
/**
 * Abstract customizer panel
 *
 * @see https://kirki.org/docs/setup/panels-sections/
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
	const PANEL_ID = 'abstract';

	/**
	 * Panel settings
	 * Return array of options
	 * or string in case only title required
	 *
	 * @throws \Exception | If no options were defined.
	 */
	public function options() {
		throw new \Exception(
			/* translators: 1 - customizer panel id. */
			sprintf(
				'Options for "%s" panel is not defined!',
				esc_html( static::PANEL_ID ),
			),
		);
	}
}
