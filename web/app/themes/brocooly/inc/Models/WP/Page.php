<?php
/**
 * Page model
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
	 * Post type name
	 *
	 * @var string
	 */
	protected static string $name = 'page';
}
