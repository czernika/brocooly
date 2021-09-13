<?php
/**
 * Admin role class
 * Defines properties for administrator user role
 *
 * @package Brocooly
 * @since 0.14.0
 */

declare(strict_types=1);

namespace Theme\Models\Users;

class Admin extends User
{

	/**
	 * Role name
	 * As administrator role already exists,
	 * it MUST be exactly the same as WordPress role.
	 * Otherwise it will be registered again after theme switch
	 *
	 * @link https://wordpress.org/support/article/roles-and-capabilities/
	 * @var string
	 */
	const ROLE = 'administrator';

}
