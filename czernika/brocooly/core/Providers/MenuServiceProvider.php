<?php
/**
 * Menu Service Provider
 * Registers a navigation menu location for a theme.
 *
 * @see https://developer.wordpress.org/reference/functions/register_nav_menu/
 * @package Brocooly
 * @since 0.1.2
 */

declare(strict_types=1);

namespace Brocooly\Providers;

use Timber\Menu;
use Timber\Timber;
use Webmozart\Assert\Assert;
use Brocooly\Support\Facades\Ctx;

class MenuServiceProvider extends AbstractService
{

	/**
	 * Register menus
	 */
	public function register() {
		$this->app->set( 'menus', config( 'menus.menus' ) );
		$this->app->set( 'menus_postfix', config( 'menus.postfix' ) );
	}

	/**
	 * Create menu instances
	 */
	public function boot() {
		$menus = $this->app->get( 'menus' );

		Assert::isArray(
			$menus,
			/* translators: 1 - type of variable */
			sprintf(
				'`app.menus` key must be an array, %s given',
				gettype( $menus )
			)
		);

		if ( ! empty( $menus ) ) {
			foreach ( $menus as $menuClass ) {
				$menu = $this->app->get( $menuClass );

				Assert::stringNotEmpty(
					$menu::LOCATION,
					/* translators: 1 - menu class */
					sprintf(
						'Name property was not provided for %s menu',
						$menuClass
					)
				);

				Assert::methodExists(
					$menu,
					'label',
					/* translators: 1 - menu class name */
					sprintf(
						'%s menu must have `label()` method which should return string',
						$menuClass
					)
				);

				/**
				 * Register menu in WordPress
				 */
				add_action(
					'after_setup_theme',
					function() use ( $menu ) {
						register_nav_menu( $menu::LOCATION, $menu->label() );
					}
				);

				/**
				 * Add them into context
				 */
				if ( $this->locationWasSetInAdminArea( $menu::LOCATION ) ) {
					Ctx::set(
						$this->getMenuName( $menu::LOCATION ),
						$this->getMenuObject( $menu::LOCATION )
					);
				}
			}
		}
	}

	/**
	 * Get Timber menu name
	 *
	 * @example
	 * ```
	 * {{ primary_menu }} will be available on front
	 * ```
	 * @param string $location | Menu location identifier, like a slug.
	 * @return string
	 */
	private function getMenuName( string $location ) {
		$menuName = $location . $this->app->get( 'menus_postfix' );
		return $menuName;
	}

	/**
	 * Get menu object
	 * Depends on version
	 *
	 * @param string $location | Menu location id.
	 * @return object|false
	 */
	private function getMenuObject( string $location ) {
		if ( isTimberNext() ) {
			return Timber::get_menu( $location );
		}

		return new Menu( $location );
	}

	/**
	 * Check if menu was set in admin area
	 *
	 * @see https://developer.wordpress.org/reference/functions/get_nav_menu_locations/
	 * @param string $location | Menu location to check.
	 * @return bool
	 */
	private function locationWasSetInAdminArea( string $location ) {

		/**
		 * Retrieve all registered navigation menu locations and the menus assigned to them
		 */
		$menuLocations = get_nav_menu_locations();
		return in_array( $location, array_keys( $menuLocations ), true );
	}
}
