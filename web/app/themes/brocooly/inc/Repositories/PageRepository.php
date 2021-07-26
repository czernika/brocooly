<?php

declare(strict_types=1);

namespace Theme\Repositories;

use Theme\Models\WP\Page;
use Theme\Contracts\PageRepositoryContract;

class PageRepository implements PageRepositoryContract
{

	/**
	 * Get current post
	 */
	public function current() {
		$post = Page::current();
		return $post;
	}
}
