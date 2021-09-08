<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Web\Controllers;

use Timber\Helper;
use Theme\Http\Controllers\Controller;
use Theme\Containers\BlogSection\Actions\GetBlogPostsAction;
use Theme\Containers\BlogSection\Actions\GetBlogArticleAction;

class PostsController extends Controller
{

	private $posts;

	private $article;

	public function __construct(
		GetBlogPostsAction $blogPostsAction,
		GetBlogArticleAction $blogArticleAction
	) {
		$this->posts   = $blogPostsAction;
		$this->article = $blogArticleAction;
	}

	public function index() {
		$blog  = $this->posts->getBlogInformation();
		$posts = $this->posts->getBlogPosts();
		return view( 'content/post/index.twig', compact( 'posts', 'blog' ) );
	}

	public function single() {
		$post      = $this->article->getPost();
		$ancestors = $this->article->getPostAncestors();
		return view( 'content/post/single.twig', compact( 'ancestors', 'post' ) );
	}
}
