<?php
/**
 * Check if is user logged in.
 * Otherwise redirect to home page
 *
 * @package Brocooly
 * @since 0.8.0
 */

declare(strict_types=1);

namespace Theme\Middleware;

use Brocooly\Router\Redirect;

class UserLoggedIn
{

	public function handle() {
		if ( ! is_user_logged_in() ) {
			Redirect::to( '/' );
		}
	}
}
