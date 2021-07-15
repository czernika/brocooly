<?php
/**
 * Theme Service Provider
 * Register main theme features here
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Theme\Providers;

use Brocooly\Providers\AbstractService;

class ThemeServiceProvider extends AbstractService
{

	/**
	 * Logo width
	 *
	 * @var int
	 */
	private int $logoWidth = 190; // px.

	/**
	 * Logo height
	 *
	 * @var int
	 */
	private int $logoHeight = 190; // px.

	/**
	 * Setup theme features
	 *
	 * @return void
	 */
	public function boot() {
		add_action( 'after_setup_theme', [ $this, 'registerFeatures' ] );
	}

	/**
	 * Register main theme features
	 */
	public function registerFeatures() {

		// Add support for post thumbnails
		add_theme_support( 'post-thumbnails' );

		// Add custom logo
		add_theme_support(
			'custom-logo',
			[
				'height'      => $this->logoHeight,
				'width'       => $this->logoWidth,
				'flex-width'  => true,
				'flex-height' => false,
			]
		);
	}
}
