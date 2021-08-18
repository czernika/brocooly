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
	 * Register contracts
	 */
	public function register() {
		$this->app->wire(
			'Theme\Contracts\Services\*ServiceContract',
			'Theme\Services\*Service',
		);
		$this->app->wire(
			'Theme\Contracts\Repositories\*RepositoryContract',
			'Theme\Repositories\*Repository',
		);
	}

	/**
	 * Setup theme features
	 *
	 * This hook is called during each page load, after the theme is initialized.
	 * It is generally used to perform basic setup, registration, and init actions for a theme.
	 *
	 * @see https://developer.wordpress.org/reference/hooks/after_setup_theme/
	 * @return void
	 */
	public function boot() {
		add_action( 'after_setup_theme', [ $this, 'registerFeatures' ] );
	}

	/**
	 * Register main theme features
	 */
	public function registerFeatures() {
		// Add custom theme logo support.
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
