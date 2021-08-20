<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Tasks;

use Theme\Containers\BlogSection\Contracts\Repositories\PostRepositoryContract;

class GetAllBlogPostsTask
{

	private $postRepository;

	public function __construct( PostRepositoryContract $postRepository ) {
		$this->postRepository = $postRepository;
	}

	public function run() {
		$posts = $this->postRepository->all();
		return $posts;
	}
}
