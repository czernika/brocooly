<?php
/**
 * Register menu locations
 *
 * @package Brocooly
 * @since 0.7.0
 */

use Theme\Menus\PrimaryMenu;

return [

	/**
	 *--------------------------------------------------------------------------
	 * Menu classes
	 *--------------------------------------------------------------------------
	 *
	 * Register theme menu location
	 * and add it to global context
	 */
	'menus'   => [
		PrimaryMenu::class,
	],

	/**
	 *--------------------------------------------------------------------------
	 * Menu postfix
	 *--------------------------------------------------------------------------
	 *
	 * Every theme menu location will get this postfix
	 * And will be available under this name in view files
	 */
	'postfix' => '_menu',

];
