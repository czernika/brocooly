<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Repositories;

use Theme\Models\WP\Post;
use Theme\Containers\BlogSection\Contracts\Repositories\PostRepositoryContract;

class PostRepository implements PostRepositoryContract
{
	public function getPostsForBlog() {
		$posts = Post::paginate( get_option( 'posts_per_page' ) )->get();
		return $posts;
	}

	public function current() {
		$post = Post::current();
		return $post;
	}
}
