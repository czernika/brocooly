<?php

declare(strict_types=1);

namespace Theme\Containers\SearchSection\Web\Controllers;

use Theme\Http\Controllers\Controller;
use Theme\Containers\SearchSection\Actions\GetSearchPageInformationAction;

class SearchController extends Controller
{

	private $searchObject;

	public function __construct( GetSearchPageInformationAction $searchInfo ) {
		$this->searchObject = $searchInfo;
	}

	public function __invoke() {
		$s = $this->searchObject->getSearchQuery();
		view( 'content/search.twig', compact( 's' ) );
	}
}
