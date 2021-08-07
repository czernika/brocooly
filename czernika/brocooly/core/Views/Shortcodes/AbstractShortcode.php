<?php
/**
 * A shortcode lets you do nifty things with very little effort.
 * Think of a shortcode as a shortcut to add features to your website that would normally require lots of complicated computer code and technical ability.
 *
 * A shortcode is written inside two square brackets.
 * For example, the [gallery] shortcode can be used to add a photo gallery of images to any page or post.
 *
 * @see https://developer.wordpress.org/reference/functions/add_shortcode/
 * @package Brocooly
 * @since 0.4.0
 */

declare(strict_types=1);

namespace Brocooly\Views\Shortcodes;

abstract class AbstractShortcode
{

	/**
	 * Shortcode tag to be searched in post content
	 *
	 * @var string
	 */
	const SHORTCODE_ID = 'shortcode';

	/**
	 * Render shortcode
	 *
	 * The callback function to run when the shortcode is found.
	 *
	 * @param array $atts | shortocde attributes.
	 *
	 * @example available on front as:
	 * ```
	 * {% apply shortcodes %}
	 *   [shortcode_id example_atts="value"]
	 * {% endapply %}
	 * ```
	 * @throws Exception
	 */
	public function render( array $atts = [] ) {
		throw new \Exception(
			/* translators: 1: shortcode id. */
			sprintf(
				'No render callback was set for "%s" shortcode!',
				static::SHORTCODE_ID,
			),
			true,
		);
	}
}
