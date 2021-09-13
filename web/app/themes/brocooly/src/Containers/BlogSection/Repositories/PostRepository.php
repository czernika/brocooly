<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Repositories;

use Theme\Models\WP\Post;
use Brocooly\Support\Facades\Option;
use Theme\Containers\BlogSection\Contracts\Repositories\PostRepositoryContract;

class PostRepository implements PostRepositoryContract
{
	public function getPostsForBlog() {
		$postsPerPage = Option::get( 'posts_per_page' );
		$posts        = Post::paginate( $postsPerPage )->get();
		return $posts;
	}

	public function current() {
		$post = Post::current();
		return $post;
	}
}
