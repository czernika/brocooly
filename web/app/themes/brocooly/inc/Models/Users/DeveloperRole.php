<?php
/**
 * Create Developer role for app
 *
 * @package Brocooly
 * @since 0.12.0 
 */

declare(strict_types=1);

namespace Theme\Models\Users;

use Brocooly\Models\Users\Role;

class DeveloperRole extends Role
{

	/**
	 * Role name
	 *
	 * @var string
	 */
	const ROLE = 'developer';

	/**
	 * Return role name in human readable format
	 *
	 * @return string
	 */
	public function label() {
		return esc_html__( 'Developer', 'brocooly' );
	}

	/**
	 * Get user capabilities
	 * We will set same level of caps as admin has
	 *
	 * @return array
	 */
	public function capabilities() {
		return $this->as( 'administrator' );
	}
}
