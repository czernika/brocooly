<?php
/**
 * Controller to handle requests on every page
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Http\Controllers;

use Theme\Http\Controllers\Controller;
use Theme\Contracts\Repositories\PageRepositoryContract;

class PageController extends Controller
{

	/**
	 * PageRepository object
	 *
	 * @var object
	 */
	private PageRepositoryContract $pageRepository;

	public function __construct( PageRepositoryContract $pageRepositoryContract ) {
		$this->pageRepository = $pageRepositoryContract;
	}

	/**
	 * Render singular page
	 */
	public function single() {
		$post = $this->pageRepository->current();
		view( 'content/page/single.twig', compact( 'post' ) );
	}
}
