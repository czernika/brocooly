<?php
/**
 * Create footer logo
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Theme\Customizer;

use Brocooly\Customizer\AbstractOption;
use Brocooly\Facades\Mod;

class FooterLogoOption extends AbstractOption
{

	/**
	 * Create footer logo instance
	 *
	 * Will be available as `get_theme_mod( 'brocooly_footer_logo )`
	 * under `Site identity` WordPress section
	 *
	 * @return array
	 */
	public function options() {
		return Mod::image([
			'settings'    => 'footer_logo',
			'section'     => 'title_tagline',
			'label'       => esc_html__( 'Footer logo', 'brocooly' ),
			'choices'     => [
				'save_as' => 'id',
			],
		]);
	}
}
