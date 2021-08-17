<?php
/**
 * Post model
 * Posts are entries that display in reverse order on your home page and/or blog page.
 * Posts usually have comment fields beneath them and are included in your site’s RSS feed.
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
