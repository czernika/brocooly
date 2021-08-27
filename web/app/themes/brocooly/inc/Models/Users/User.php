<?php
/**
 * Base user model for all roles
 *
 * @package Brocooly
 * @since 0.8.5
 */

declare(strict_types=1);

namespace Theme\Models\Users;

use Brocooly\Support\Facades\Meta;
use Brocooly\Support\Traits\Avatar;
use Brocooly\Models\Users\User as BaseUser;

class User extends BaseUser
{
	use Avatar;
}
