<?php
/**
 * Abstract customizer section
 *
 * @see https://kirki.org/docs/setup/panels-sections/
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Brocooly\Customizer;

abstract class AbstractSection
{

	/**
	 * Section id
	 *
	 * @var string
	 */
	const SECTION_ID = 'abstract';

	/**
	 * Section settings
	 *
	 * @throws \Exception | If no options were defined.
	 */
	public function options() {
		throw new \Exception(
			/* translators: 1 - customizer section id. */
			sprintf(
				'Options for "%s" customizer section is not defined!',
				esc_html( static::SECTION_ID ),
			),
		);
	}

	/**
	 * Section options
	 *
	 * @throws \Exception | If no controls for customizer section were defined.
	 */
	public function controls() {
		throw new \Exception(
			/* translators: 1 - customizer section id. */
			sprintf(
				'Controls settings for "%s" customizer section are not defined!',
				esc_html( static::SECTION_ID ),
			),
		);
	}
}
