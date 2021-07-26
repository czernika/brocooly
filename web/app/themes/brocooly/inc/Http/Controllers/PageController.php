<?php
/**
 * Controller to handle requests on every page
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Http\Controllers;

use Theme\Contracts\PageRepositoryContract;
use Brocooly\Http\Controllers\BaseController;

class PageController extends BaseController
{

	/**
	 * PageRepository object
	 *
	 * @var object
	 */
	private PageRepositoryContract $pageRepository;

	public function __construct(
		PageRepositoryContract $pageRepositoryContract
	) {
		$this->pageRepository = $pageRepositoryContract;
	}

	/**
	 * Load singular page
	 */
	public function single() {
		$post = $this->pageRepository->current();
		view( 'content/page/single.twig', compact( 'post' ) );
	}
}
