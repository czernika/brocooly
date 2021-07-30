<?php
/**
 * All requests for posts
 *
 * @package Brocooly
 * @since 0.2.1
 */

declare(strict_types=1);

namespace Theme\Http\Controllers;

use Theme\Http\Controller;
use Theme\Contracts\PostServiceContract;
use Theme\Contracts\PostRepositoryContract;

class PostsController extends Controller
{

	/**
	 * PostSerivce object
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
	 * Load archive page
	 */
	public function index() {
		$is_sidebar_active = is_active_sidebar( 'blog' );
		$title             = $this->postService->getBlogTitle();
		view( 'content/post/index.twig', compact( 'is_sidebar_active', 'title' ) );
	}

	/**
	 * Load singular page
	 */
	public function single() {
		$post      = $this->postRepository->current();
		$ancestors = $this->postService->getBlogCrumbs();
		view( 'content/post/single.twig', compact( 'ancestors', 'post' ) );
	}
}
