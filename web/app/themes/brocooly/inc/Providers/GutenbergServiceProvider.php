<?php
/**
 * Gutenberg Service Provider
 * Register main theme features for Gutenberg Editor
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Theme\Providers;

use Brocooly\Providers\AbstractService;

class GutenbergServiceProvider extends AbstractService
{

	/**
	 * Setup Gutenberg editor features
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
	 * Register Gutenberg features
	 */
	public function registerFeatures() {
		add_theme_support( 'align-wide' );
	}
}
