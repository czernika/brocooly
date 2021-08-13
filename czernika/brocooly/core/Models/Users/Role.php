<?php
/**
 * Create new role
 *
 * @package Brocooly
 * @since 0.10.2
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

	/**
	 * Return user's capabilities same as already registered role.
	 *
	 * @param string $role | role name.
	 * @return \WP_Role|null
	 */
	protected function as( string $role ) {
		$roleCaps = get_role( $role );
		if ( $roleCaps ) {
			$caps = $roleCaps->capabilities;
			return $caps;
		}

		return null;
	}


	private static function getRoleObject() {
		return get_role( static::ROLE );
	}

	protected static function get() {
		return static::getRoleObject();
	}

	protected static function getName() {
		return static::get()->name;
	}

	protected static function getCapabilities() {
		return static::get()->capabilities;
	}

	protected static function addCap( $caps ) {
		static::get()->add_cap( $caps );
	}

	protected static function removeCap( $caps ) {
		static::get()->remove_cap( $caps );
	}
}
