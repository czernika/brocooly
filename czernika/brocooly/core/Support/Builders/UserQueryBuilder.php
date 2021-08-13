<?php

declare(strict_types=1);

namespace Brocooly\Support\Builders;

class UserQueryBuilder
{

	public static function all() {
		return get_users();
	}

	public static function getBy( array $args ) {
		return get_users( $args );
	}

}
