<?php
/**
 *
 */

declare(strict_types=1);

namespace Brocooly\Providers;

use Theme\Models\Users\User;
use Webmozart\Assert\Assert;

class UserServiceProvider extends AbstractService
{
	public function register() {
		$this->app->set( 'custom_roles', config( 'users.roles' ) );
	}

	public function boot() {
		$this->registerUser();
		$this->registerRoles();
	}

	private function registerUser() {
		$user = $this->app->get( User::class );

		if ( method_exists( $user, 'fields' ) ) {
			add_action(
				'carbon_fields_register_fields',
				[ $user, 'fields' ],
			);
		}
	}

	/**
	 * Register and deregister custom user roles
	 *
	 * NOTE: When to call
	 * Make sure the global $wp_roles is available before attempting to add or modify a role. The best practice is to use a plugin (or theme) activation hook to make changes to roles (since you only want to do it once!).
	 *
	 * mu-plugins loads too early, so use an action hook (like 'init') to wrap your add_role() call if you’re doing this in the context of an mu-plugin.
	 *
	 * @see https://developer.wordpress.org/reference/functions/add_role/#user-contributed-notes
	 * @return void
	 */
	private function registerRoles() {
		$roles = $this->app->get( 'custom_roles' );

		if ( ! empty( $roles ) ) {
			foreach ( $roles as $roleClass ) {
				$role = $this->app->get( $roleClass );
				add_action(
					'after_switch_theme',
					function() use ( $role ) {

						Assert::null(
							get_role( $role::ROLE ),
							/* translators: 1: role slug. */
							sprintf(
								'Role %s already exists',
								$role::ROLE,
							),
						);

						add_role(
							$role::ROLE,
							$role->label(),
							$role->capabilities(),
						);
					}
				);

				add_action(
					'switch_theme',
					function() use ( $role ) {
						remove_role( $role::ROLE );
					}
				);
			}
		}
	}
}
