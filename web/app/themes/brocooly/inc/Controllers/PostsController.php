<?php
/**
 * All requests for posts
 *
 * @package Brocooly
 * @since 0.2.1
 */

declare(strict_types=1);

namespace Theme\Controllers;

use Theme\Contracts\PostServiceContract;
use Brocooly\Controllers\AbstractController;

class PostsController extends AbstractController
{

	/**
	 * Posts object
	 *
	 * @var object
	 */
	private PostServiceContract $posts;

	public function __construct( PostServiceContract $postServiceContract ) {
		$this->posts = $postServiceContract;
	}

	/**
	 * Load archive page
	 */
    public function index() {
		$posts = $this->posts->all();
		view( 'content/post/index.twig', compact( 'posts' ) );
	}

	/**
	 * Load singular page
	 */
	public function single() {
		$post = $this->posts->current();
		view( 'content/post/single.twig', compact( 'post' ) );
	}
}
