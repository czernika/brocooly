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
use Brocooly\Http\Controllers\BaseController;

class PostsController extends BaseController
{

	/**
	 * Blog page title
	 *
	 * @var string
	 */
	private string $title;

	/**
	 * Posts object
	 *
	 * @var object
	 */
	private PostServiceContract $posts;

	public function __construct( PostServiceContract $postServiceContract ) {
		$this->posts = $postServiceContract;
		$this->title = get_the_title( get_option( 'page_for_posts' ) );
	}

	/**
	 * Load archive page
	 */
	public function index() {
		$is_sidebar_active = is_active_sidebar( 'blog' );
		$title             = $this->title;
		view( 'content/post/index.twig', compact( 'is_sidebar_active', 'title' ) );
	}

	/**
	 * Load singular page
	 */
	public function single() {
		$post      = $this->posts->current();
		$ancestors = [
			[
				'title' => $this->title,
				'link'  => get_post_type_archive_link( 'post' ),
			],
		];
		view( 'content/post/single.twig', compact( 'ancestors', 'post' ) );
	}
}
