<?php
/**
 * Register shortcodes
 *
 * @package Brocooly
 * @since 0.4.0
 */

declare(strict_types=1);

namespace Brocooly\Providers;

class ShortcodeServiceProvider extends AbstractService
{

	/**
	 * Register shortcode
	 */
    public function register() {
		$this->app->set( 'shortcodes', config( 'app.shortcodes', [] ) );
	}

	/**
	 * Create shortcodes
	 */
	public function boot() {
		$shortcodes = $this->app->get( 'shortcodes' );

		if ( ! empty( $shortcodes ) ) {
			foreach ( $shortcodes as $shortcode ) {
				$shortcodeClass = $this->app->make( $shortcode );
				add_shortcode( $shortcodeClass->id, [ $shortcodeClass, 'render' ] );
			}
		}
	}
}
