<?php
/**
 * Abstract customizer section
 *
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
	 * @throws Exception
	 */
	public function options() {
		throw new \Exception(
			/* translators: 1: customizer section id. */
			sprintf(
				'Options for "%s" section is not defined!',
				static::SECTION_ID,
			),
			true,
		);
	}

	/**
	 * Section options
	 *
	 * @throws Exception
	 */
	public function controls() {
		throw new \Exception(
			/* translators: 1: customizer section id. */
			sprintf(
				'Controls settings for "%s" section are not defined!',
				static::SECTION_ID,
			),
			true,
		);
	}
}
