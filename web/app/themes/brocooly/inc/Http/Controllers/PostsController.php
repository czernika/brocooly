<?php
/**
 * All requests for posts - both singular and archive.
 *
 * In this example we just provide current object for singular post with breadcrumbs
 * and default posts query with extra information about sidebar and blog title.
 *
 * @package Brocooly
 * @since 0.2.1
 */

declare(strict_types=1);

namespace Theme\Http\Controllers;

use Theme\Http\Controllers\Controller;
use Theme\Contracts\PostServiceContract;
use Theme\Contracts\PostRepositoryContract;

class PostsController extends Controller
{

	/**
	 * PostService object
	 *
	 * @var object
	 */
	private PostServiceContract $postService;

	/**
	 * PostRepository object
	 *
	 * @var object
	 */
	private PostRepositoryContract $postRepository;

	public function __construct(
		PostServiceContract $postServiceContract,
		PostRepositoryContract $postRepositoryContract
	) {
		$this->postService    = $postServiceContract;
		$this->postRepository = $postRepositoryContract;
	}

	/**
	 * Render archive page
	 *
	 * Note that Timber handles `posts` context with default query params by itself
	 * so no need to create it. But if you wish you may override it.
	 */
	public function index() {
		$blog = [
			'sidebar' => is_active_sidebar( 'blog' ),
			'title'   => $this->postService->getBlogTitle(),
		];
		view( 'content/post/index.twig', compact( 'blog' ) );
	}

	/**
	 * Render singular page
	 */
	public function single() {
		$post      = $this->postRepository->current();
		$ancestors = $this->postService->getBlogCrumbs();
		view( 'content/post/single.twig', compact( 'ancestors', 'post' ) );
	}
}
