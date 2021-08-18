<?php
/**
 * Register menu locations
 *
 * @package Brocooly
 * @since 0.7.0
 */

use Theme\UI\Menus\PrimaryMenu;

return [

	/**
	 * --------------------------------------------------------------------------
	 * Menu classes
	 * --------------------------------------------------------------------------
	 *
	 * Register theme menu location and add it to global context
	 */
	'menus'   => [
		PrimaryMenu::class,
	],

	/**
	 * --------------------------------------------------------------------------
	 * Menu postfix
	 * --------------------------------------------------------------------------
	 *
	 * Every theme menu location will get this postfix
	 * And will be available under this name in view files
	 *
	 * @example
	 * ```
	 * `primary` menu will be available as:
	 *
	 * {{ dump(primary_menu) }} - contain \Timber\Menu object
	 * ```
	 */
	'postfix' => '_menu',

];
