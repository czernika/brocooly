<?php

declare(strict_types=1);

namespace Theme\Containers\PageSection\Repositories;

use Theme\Models\WP\Page;
use Theme\Containers\PageSection\Contracts\Repositories\PageRepositoryContract;

class PageRepository implements PageRepositoryContract
{
	public function current() {
		$page = Page::current();
		return $page;
	}
}
