<?php
/**
 * Post model
 *
 * @package Brocooly
 * @since 0.2.0
 */

declare(strict_types=1);

namespace Theme\Models\WP;

use Brocooly\Models\PostType;
use Brocooly\Support\Facades\Meta;
use Brocooly\Support\Traits\Thumbnail;

class Post extends PostType
{
	use Thumbnail;
}
