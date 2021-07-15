<?php
/**
 * Page Service
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Services;

use Theme\Models\WP\Page;
use Theme\Contracts\PageServiceContract;

class PageService implements PageServiceContract
{

	/**
	 * Get current post
	 */
	public function current() {
		$post = Page::current();
		return $post;
	}
}
