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
	const ROLE = 'role';

	/**
	 * Return role name in human readable format
	 *
	 * @return string
	 */
	public function label() {
		return esc_html( 'Custom role', 'brocooly' );
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
