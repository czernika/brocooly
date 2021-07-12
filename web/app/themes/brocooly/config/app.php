<?php
/**
 * Register main App features
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Theme\Menus\PrimaryMenu;

return [

	/**
	 *--------------------------------------------------------------------------
	 * Theme menus
	 *--------------------------------------------------------------------------
	 *
	 * Register theme menu location
	 * and add it to global context
	 *
	 */
	'menus' => [
		PrimaryMenu::class,
	]

];
