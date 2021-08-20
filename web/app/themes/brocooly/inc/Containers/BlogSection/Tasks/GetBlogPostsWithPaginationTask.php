<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Tasks;

use Theme\Containers\BlogSection\Contracts\PostRepositoryContract;

class GetBlogPostsWithPaginationTask
{
	private $postRepository;

	private $postsPerPage = 10;

	public function __construct( PostRepositoryContract $postRepository ) {
		$this->postRepository = $postRepository;
	}

	public function run() {
		$posts = $this->postRepository->paginate( $this->postsPerPage );
		return $posts;
	}
}
