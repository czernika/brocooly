<?php
/**
 * Your menu is the list of links that are typically displayed at the top of your site.
 * A menu makes it easy for your visitors to find their way around your site’s pages and other content
 *
 * The menu location determines where on your site your menu appears
 *
 * @see https://developer.wordpress.org/reference/functions/register_nav_menu/
 * @package Brocooly
 * @since 0.4.0
 */

declare(strict_types=1);

namespace Brocooly\Views\Menus;

abstract class AbstractMenu
{
	/**
	 * Menu location id
	 * First parameter for `register_nav_menu()`
	 *
	 * @var string
	 */
	const LOCATION = 'menu';

	/**
	 * Get menu label in admin area
	 * Second parameter for `register_nav_menu()`
	 *
	 * @throws Exception
	 */
	public function label() {
		throw new \Exception(
			/* translators: 1: menu location id. */
			sprintf(
				'No label callback was set for "%s" menu!',
				static::LOCATION,
			),
			true,
		);
	}
}
