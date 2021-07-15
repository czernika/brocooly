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
		add_theme_support( 'align-wide' );
	}
}
