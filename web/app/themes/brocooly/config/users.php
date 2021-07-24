<?php
/**
 * Settings related to users, roles and permissions.
 *
 * @package Brocooly
 * @since 0.8.2
 */

use Theme\Models\Users\DeveloperRole;

return [

	/**
	 * --------------------------------------------------------------------------
	 * Register custom user role
	 * --------------------------------------------------------------------------
	 *
	 * Add role, if it does not exist.
	 *
	 * Be sure to use this function (and similar role functions) only in an activation hook or within a conditional block.
	 * There is no need for this to execute every time the page loads, and it will keep updating the database every time it’s called.
	 *
	 * NOTE: New role will be available after theme switching and will NOT be removed if you comment or remove this line in this section. However it is will not be available in other themes. Please use `remove_role()` to erase it from database.
	 *
	 * @see https://developer.wordpress.org/reference/functions/add_role/#user-contributed-notes
	 */
	'roles' => [
		// DeveloperRole::class,
	],

];
