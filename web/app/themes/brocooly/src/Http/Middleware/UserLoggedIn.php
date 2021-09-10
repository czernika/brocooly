<?php
/**
 * Check if is user logged in.
 * Otherwise redirect to home page
 *
 * @package Brocooly
 * @since 0.8.0
 */

declare(strict_types=1);

namespace Theme\Http\Middleware;

use Brocooly\Support\Facades\Redirect;
use Brocooly\Http\Middleware\AbstractMiddleware;

class UserLoggedIn extends AbstractMiddleware
{
	public function handle() {
		if ( ! is_user_logged_in() ) {
			Redirect::home();
		}
	}
}
