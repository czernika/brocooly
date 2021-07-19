<?php

declare(strict_types=1);

namespace Brocooly\Providers;

use Theme\Models\WP\User;
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

	private function registerRoles() {
		$roles = $this->app->get( 'custom_roles' );

		if ( ! empty( $roles ) ) {
			foreach ( $roles as $roleClass ) {
				$role = $this->app->get( $roleClass );
				add_action(
					'after_switch_theme',
					function() use ( $role ) {

						Assert::null(
							get_role( $role->name ),
							sprintf(
								'Role %s already exists',
								$role->name,
							),
						);

						add_role(
							$role->name,
							$role->label(),
							$role->capabilities(),
						);
					}
				);

				add_action(
					'switch_theme',
					function() use ( $role ) {
						remove_role( $role->name );
					}
				);
			}
		}
	}
}
