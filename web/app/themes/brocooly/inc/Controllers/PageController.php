<?php
/**
 * Controller to handle requests on every page
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Controllers;

use Brocooly\Controllers\BaseController;
use Theme\Contracts\PageServiceContract;

class PageController extends BaseController
{

	/**
	 * Pages object
	 *
	 * @var object
	 */
	private PageServiceContract $pages;

	public function __construct( PageServiceContract $pageServiceContract ) {
		$this->pages = $pageServiceContract;
	}

	/**
	 * Load singular page
	 */
	public function single() {
		$post = $this->pages->current();
		view( 'content/page/single.twig', compact( 'post' ) );
	}
}
