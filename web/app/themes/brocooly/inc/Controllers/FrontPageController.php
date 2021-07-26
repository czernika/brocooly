<?php
/**
 * Controller to handle requests on front page
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Theme\Controllers;

use Brocooly\Http\Controllers\BaseController;
use Theme\Contracts\PageServiceContract;

class FrontPageController extends BaseController
{

	/**
	 * Page object
	 *
	 * @var object
	 */
	private PageServiceContract $page;

	public function __construct( PageServiceContract $pageServiceContract ) {
		$this->page = $pageServiceContract;
	}

	public function __invoke() {
		$hello = $this->page->getHelloPhrase();
		view( 'content/front-page.twig', compact( 'hello' ) );
	}
}
