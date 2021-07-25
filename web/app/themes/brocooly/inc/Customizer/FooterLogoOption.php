<?php
/**
 * Create second logo
 * Mostly used in footer or mobile version of the site
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Theme\Customizer;

use Brocooly\Support\Facades\Mod;
use Brocooly\Customizer\AbstractOption;

class FooterLogoOption extends AbstractOption
{

	/**
	 * Create footer logo
	 *
	 * Will be available as:
	 *
	 * @example
	 * ```
	 * PHP: get_theme_mod( 'brocooly_footer_logo )
	 * Twig: {{ mod('footer_logo') }}
	 * ```
	 *
	 * You need to specify WordPress section id
	 * For `Site Title & Tagline` it is `title_tagline`
	 *
	 * No need to specify setting's type if you're using Mod factory
	 *
	 * @see https://developer.wordpress.org/themes/customize-api/customizer-objects/#sections
	 * @return array
	 */
	public function settings() {
		return Mod::image(
			[
				'settings' => 'footer_logo',
				'section'  => 'title_tagline',
				'label'    => esc_html__( 'Footer logo', 'brocooly' ),
				'choices'  => [
					'save_as' => 'url',
				],
			]
		);
	}
}
