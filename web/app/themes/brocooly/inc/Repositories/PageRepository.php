<?php
/**
 * Page Repository
 *
 * @package Brocooly
 * @since 0.12.0
 */

declare(strict_types=1);

namespace Theme\Repositories;

use Theme\Models\WP\Page;
use Theme\Contracts\Repositories\PageRepositoryContract;

class PageRepository implements PageRepositoryContract
{

	/**
	 * Get current page object
	 *
	 * @return \Timber\Post
	 */
	public function current() {
		$post = Page::current();
		return $post;
	}
}
