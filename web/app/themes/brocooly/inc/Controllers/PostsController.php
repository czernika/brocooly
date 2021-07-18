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
use Brocooly\Controllers\BaseController;
use Brocooly\Middleware\UserLoggedIn;

class PostsController extends BaseController
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
		$posts             = $this->posts->all();
		$is_sidebar_active = is_active_sidebar( 1 );
		$title             = get_the_title( get_option( 'page_for_posts' ) );
		view( 'content/post/index.twig', compact( 'posts', 'is_sidebar_active', 'title' ) );
	}

	/**
	 * Load singular page
	 */
	public function single() {
		$post      = $this->posts->current();
		$ancestors = [
			[
				'title' => get_the_title( get_option( 'page_for_posts' ) ),
				'link'  => get_post_type_archive_link( 'post' ),
			],
		];
		view( 'content/post/single.twig', compact( 'post', 'ancestors' ) );
	}
}
