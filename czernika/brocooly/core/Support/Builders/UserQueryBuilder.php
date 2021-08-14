<?php
/**
 * Users query handler.
 *
 * @package Brocooly
 * @since 0.10.2
 */

declare(strict_types=1);

namespace Brocooly\Support\Builders;

class UserQueryBuilder
{

	/**
	 * Get all users
	 *
	 * @return array
	 */
	public static function all() {
		return get_users();
	}

	/**
	 * Get user by specific parameters.
	 *
	 * @param array $args | arguments for users to find.
	 * @return array
	 */
	public static function getBy( array $args ) {
		return get_users( $args );
	}

	/**
	 * Get current user object
	 *
	 * @return \WP_User
	 */
	public static function current() {
		return wp_get_current_user();
	}

	/**
	 * Get user by key.
	 *
	 * @param string $key | key to find.
	 * @param mixed  $value | value to get by.
	 * @return \WP_User
	 */
	public static function where( string $key, $value ) {
		return get_user_by( $key, $value );
	}

	/**
	 * Get user by id
	 *
	 * @param integer $id | user id.
	 * @return \WP_User|false
	 */
	public static function find( int $id ) {
		return get_userdata( $id );
	}

	/**
	 * Get current authenticated user or false.
	 *
	 * @return \WP_User|false
	 */
	public static function auth() {
		if ( is_user_logged_in() ) {
			return static::current();
		}

		return false;
	}

}
