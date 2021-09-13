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

	/**
	 * List of protected CarbonFields meta.
	 * ! You need to register meta first
	 *
	 * @example `{{ post.thumbnail_url }}`
	 *
	 * Alternatively you may use it in regular way as
	 * `{{ post.meta('_thumbnail_url') }}` with underscore,
	 * or
	 * `{{ fn('carbon_get_post_meta', post.ID, 'thumbnail_url') }}`
	 *
	 * @var array
	 */
	protected array $allowedMeta = [
		'thumbnail_url',
		'thumbnail_alt',
	];
}
