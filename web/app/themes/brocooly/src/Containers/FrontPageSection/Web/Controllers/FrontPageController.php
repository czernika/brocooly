<?php

declare(strict_types=1);

namespace Theme\Containers\FrontPageSection\Web\Controllers;

use Theme\Http\Controllers\Controller;
use Theme\Containers\FrontPageSection\Actions\GetMainScreen;

class FrontPageController extends Controller
{

	private $mainScreen;

	public function __construct( GetMainScreen $mainScreen ) {
		$this->mainScreen = $mainScreen;
	}

	public function __invoke() {
		$hello = $this->mainScreen->getHelloWorld();
		return view( 'content/front-page.twig', compact( 'hello' ) );
	}
}
