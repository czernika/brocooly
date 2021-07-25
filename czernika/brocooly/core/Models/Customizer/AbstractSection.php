<?php
/**
 * Abstract customizer section
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Brocooly\Models\Customizer;

abstract class AbstractSection
{

	/**
	 * Section id
	 *
	 * @var string
	 */
	public static string $id = 'unknown';

	/**
	 * Section settings
	 *
	 * @throws Exception
	 */
	public function options() {
		throw new \Exception(
			sprintf(
				'Options for "%s" section is not defined!',
				$this->id,
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
			sprintf(
				'Controls settings for "%s" section are not defined!',
				$this->id,
			),
			true,
		);
	}
}
