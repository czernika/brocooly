<?php

declare(strict_types=1);

namespace Theme\Repositories;

use Theme\Models\WP\Post;
use Theme\Contracts\PostRepositoryContract;

class PostRepository implements PostRepositoryContract
{
	/**
	 * Get all posts with default pagination
	 */
	public function all() {
		$posts = Post::all();
		return $posts;
	}

	/**
	 * Get current post
	 */
	public function current() {
		$post = Post::current();
		return $post;
	}
}
