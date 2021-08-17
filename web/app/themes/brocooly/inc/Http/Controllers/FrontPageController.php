<?php
/**
 * Controller to handle requests on front page
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Theme\Http\Controllers;

use Theme\Http\Controllers\Controller;
use Theme\Contracts\PageServiceContract;
class FrontPageController extends Controller
{

	/**
	 * PageService object
	 *
	 * @var object
	 */
	private PageServiceContract $pageService;

	public function __construct( PageServiceContract $pageServiceContract ) {
		$this->pageService = $pageServiceContract;
	}

	/**
	 * Render front page
	 *
	 * @return void
	 */
	public function __invoke() {
		$hello = $this->pageService->getHelloPhrase();
		view( 'content/front-page.twig', compact( 'hello' ) );
	}
}
