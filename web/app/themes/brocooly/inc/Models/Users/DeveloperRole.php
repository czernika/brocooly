<?php

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
	public string $name = 'developer';

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
	 *
	 * @return array
	 */
	public function capabilities() {
		return $this->as( 'administrator' );
	}
}
