<?php
/**
 *
 */

declare(strict_types=1);

namespace Theme\Middleware;

use Brocooly\Router\Request;

class UserLoggedIn
{

	public function handle() {
		if ( ! is_user_logged_in() ) {
			Request::to( '/' );
		}
	}
}
