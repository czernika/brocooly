<?php
/**
 * Menu Service Provider
 * Register nav menus and add them into global context
 *
 * @package Brocooly
 * @since 0.1.2
 */

declare(strict_types=1);

namespace Brocooly\Providers;

use Timber\Timber;
use Brocooly\Storage\Context;

class MenuServiceProvider extends AbstractService
{

	/**
	 * Menu prefix
	 *
	 * @var string
	 */
	private string $prefix = '_menu';

	/**
	 * Register menus
	 */
	public function register() {
		$this->app->set( 'menus', config( 'app.menus', [] ) );
	}

	/**
	 * Create menu instances
	 */
	public function boot() {
		$menus = $this->app->get( 'menus' );

		if ( ! empty( $menus ) ) {
			foreach ( $menus as $menuClass ) {
				$menu = $this->app->make( $menuClass );

				/**
				 * Register menu in WordPress
				 */
				add_action(
					'after_setup_theme',
					function() use ( $menu ) {
						register_nav_menu( $menu->name, $menu->label() );
					}
				);

				/**
				 * Add them into context
				 */
				if ( $this->locationWasSetInAdminArea( $menu->name ) ) {
					Context::set(
						$this->getMenuName( $menu->name ),
						$this->getMenuObject( $menu->name )
					);
				}
			}
		}
	}

	/**
	 * Get Timber menu name
	 * @example {{ primary_menu }} will be available on front
	 *
	 * @param string $location | menu id.
	 * @return string
	 */
	private function getMenuName( string $location ) {
		$menuName = $location . $this->prefix;
		return $menuName;
	}

	/**
	 * Get menu object
	 * Depends on version
	 *
	 * @param string $location | menu id.
	 * @return object|false
	 */
	private function getMenuObject( string $location ) {
		if ( version_compare( Timber::class, '2', '>=' ) ) {
			return Timber::get_menu( $location );
		}

		return new \Timber\Menu( $location );
	}

	/**
	 * Check if menu was set in admin area
	 *
	 * @param string $location
	 * @return void
	 */
	private function locationWasSetInAdminArea( string $location ) {
		return in_array( $location, array_keys( get_nav_menu_locations() ), true );
	}
}
