<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Repositories;

use Theme\Models\WP\Post;
use Theme\Containers\BlogSection\Contracts\Repositories\PostRepositoryContract;

class PostRepository implements PostRepositoryContract
{
	public function all() {
		$posts = Post::all();
		return $posts;
	}

	public function current() {
		$post = Post::current();
		return $post;
	}

	public function paginate( int $postsPerPage = 10 ) {
		$posts = Post::paginate( $postsPerPage )->get();
		return $posts;
	}
}
