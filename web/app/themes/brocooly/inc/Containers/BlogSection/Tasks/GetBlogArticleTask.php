<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Tasks;

use Theme\Containers\BlogSection\Contracts\PostRepositoryContract;

class GetBlogArticleTask
{
	private $postRepository;

	public function __construct( PostRepositoryContract $postRepository ) {
		$this->postRepository = $postRepository;
	}

	public function run() {
		$post = $this->postRepository->current();
		return $post;
	}
}
