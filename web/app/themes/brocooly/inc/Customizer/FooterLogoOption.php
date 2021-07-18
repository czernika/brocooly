<?php
/**
 * Create footer logo
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Theme\Customizer;

use Brocooly\Facades\Mod;
use Brocooly\Customizer\AbstractOption;

class FooterLogoOption extends AbstractOption
{

	/**
	 * Create footer logo instance
	 *
	 * Will be available as `get_theme_mod( 'brocooly_footer_logo )`
	 *
	 * You need to specify WordPress section id
	 * For `Site Title & Tagline` it's `title_tagline`
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
					'save_as' => 'id',
				],
			]
		);
	}
}
