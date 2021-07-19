<?php
/**
 *
 */

declare(strict_types=1);

namespace Brocooly\Models\Users;

class Role
{

	/**
	 * Role name
	 *
	 * @var string
	 */
	public string $name = '';

	/**
	 * Return role name in human readable format
	 *
	 * @return string
	 */
	public function label() {
		return '';
	}

	/**
	 * Get user capabilities
	 *
	 * @return array
	 */
	public function capabilities() {
		return [];
	}

	protected function as( string $role ) {
		if ( $role ) {
			$caps = get_role( $role )->capabilities;
			return $caps;
		}

		return null;
	}
}
