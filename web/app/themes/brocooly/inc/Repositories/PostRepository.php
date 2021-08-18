<?php
/**
 * Post Repository
 *
 * @package Brocooly
 * @since 0.12.0
 */

declare(strict_types=1);

namespace Theme\Repositories;

use Theme\Models\WP\Post;
use Theme\Contracts\Repositories\PostRepositoryContract;

class PostRepository implements PostRepositoryContract
{
	/**
	 * Get all posts
	 *
	 * @return \Timber\PostQuery
	 */
	public function all() {
		$posts = Post::all();
		return $posts;
	}

	/**
	 * Get all posts with pagination
	 *
	 * @param integer $postsPerPage | posts per page.
	 * @return \Timber\PostQuery
	 */
	public function paginate( int $postsPerPage = 10 ) {
		$posts = Post::paginate( $postsPerPage )->get();
		return $posts;
	}

	/**
	 * Get current post
	 *
	 * @return \Timber\Post
	 */
	public function current() {
		$post = Post::current();
		return $post;
	}
}
