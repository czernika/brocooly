<?php
/**
 * Page model
 * Pages are for non-chronological content: pages like 'About' or 'Contact' would be common examples.
 *
 * @package Brocooly
 * @since 0.2.0
 */

declare(strict_types=1);

namespace Theme\Models\WP;

use Brocooly\Models\PostType;
use Brocooly\Support\Facades\Meta;

class Page extends PostType
{

	/**
	 * Post type slug
	 *
	 * @var string
	 */
	const POST_TYPE = 'page';
}
