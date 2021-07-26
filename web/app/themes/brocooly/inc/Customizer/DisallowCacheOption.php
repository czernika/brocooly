<?php
/**
 * Reset cache with `pragma` meta tag
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Theme\Customizer;

use Brocooly\Support\Facades\Mod;
use Brocooly\Models\Customizer\AbstractOption;

class DisallowCacheOption extends AbstractOption
{

	/**
	 * Create disallow cache checkbox
	 *
	 * You need to specify WordPress section id
	 * For `Site Title & Tagline` it's `title_tagline`
	 *
	 * @link https://kirki.org/docs/controls/
	 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/#sections
	 * @return array
	 */
	public function settings() {
		return Mod::checkbox(
			[
				'settings'    => 'no_cache',
				'section'     => 'title_tagline',
				'label'       => esc_html__( 'Disallow Site Cache', 'brocooly' ),
				'description' => esc_html__( 'This option will force cache to be cleared. Use it for some time if there are some issues with cache only', 'brocooly' ),
			]
		);
	}
}
