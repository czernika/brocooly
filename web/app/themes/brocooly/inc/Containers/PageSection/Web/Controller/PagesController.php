<?php

declare(strict_types=1);

namespace Theme\Containers\PageSection\Web\Controller;

use Theme\Containers\PageSection\Actions\GetCurrentPageAction;
use Theme\Http\Controllers\Controller;

class PagesController extends Controller
{

	private $page;

	public function __construct( GetCurrentPageAction $page ) {
		$this->page = $page;
	}

	public function single() {
		$post = $this->page->getCurrentPage();
		view( 'content/page/single.twig', compact( 'post' ) );
	}
}
