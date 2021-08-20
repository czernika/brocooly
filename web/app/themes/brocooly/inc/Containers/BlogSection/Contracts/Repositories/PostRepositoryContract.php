<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Contracts\Repositories;

interface PostRepositoryContract
{
	public function all();

	public function paginate( int $postsPerPage = 10 );

	public function current();
}
