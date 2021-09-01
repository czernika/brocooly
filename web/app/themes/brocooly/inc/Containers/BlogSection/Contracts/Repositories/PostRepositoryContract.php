<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Contracts\Repositories;

interface PostRepositoryContract
{
	public function getPostsForBlog();

	public function current();
}
