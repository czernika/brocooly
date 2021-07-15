<?php
/**
 * Abstract shortcode class
 *
 * @package Brocooly
 * @since 0.4.0
 */

declare(strict_types=1);

namespace Brocooly\Shortcodes;

abstract class AbstractShortcode
{

	/**
	 * Shortcode name
	 *
	 * @var string
	 */
	public string $id = '';

	/**
	 * Render shortcode
	 *
	 * @var array $atts | shortocde attributes.
	 * @throws Exception
	 */
	public function render( array $atts ) {
		throw new \Exception(
			sprintf(
				'No render callback was set for "%s" shortcode!',
				$this->id,
			),
			true,
		);
	}
}
