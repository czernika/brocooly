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
	'menus' => [
		PrimaryMenu::class,
	],

];
