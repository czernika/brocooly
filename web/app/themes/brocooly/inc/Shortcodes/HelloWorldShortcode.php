<?php
/**
 * A shortcode lets you do nifty things with very little effort.
 * Think of a shortcode as a shortcut to add features to your website that would normally require lots of complicated computer code and technical ability.
 *
 * A shortcode is written inside two square brackets.
 * For example, the [gallery] shortcode can be used to add a photo gallery of images to any page or post.
 *
 * ! Don't forget to register this class inside `app.php` file
 *
 * @see https://developer.wordpress.org/reference/functions/add_shortcode/
 * @package Brocooly
 * @since 0.4.0
 */

declare(strict_types=1);

namespace Theme\Shortcodes;

use Brocooly\Router\View;
use Brocooly\Shortcodes\AbstractShortcode;

class HelloWorldShortcode extends AbstractShortcode
{
	/**
	 * Shortcode tag to be searched in post content
	 *
	 * @var string
	 */
	public string $id = 'hello-world';

	/**
	 * Render shortcode
	 *
	 * The callback function to run when the shortcode is found.
	 * ! Function called by the shortcode should never produce output of any kind. 
	 *
	 * @var array $atts | shortocde attributes.
	 * @example available on front as:
	 * ```
	 * {% apply shortcodes %}
	 *   [hello-world example="value"]
	 * {% endapply %}
	 * ```
	 * @throws Exception
	 */
	public function render( array $atts ) {
		$example = false;
		if ( isset( $atts['example'] ) ) {
			$example = sanitize_text_field( $atts['example'] );
		}

		// ! shortcodes HAVE TO return something
		return View::compile( '@shortcodes/hello-world.twig', compact( 'example' ) );
	}
}
