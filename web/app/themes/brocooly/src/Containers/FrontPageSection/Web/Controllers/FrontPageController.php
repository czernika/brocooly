<?php

declare(strict_types=1);

namespace Theme\Containers\FrontPageSection\Web\Controllers;

use Theme\Containers\FrontPageSection\Actions\GetMainScreenInfoAction;
use Theme\Http\Controllers\Controller;

class FrontPageController extends Controller
{
	private $frontPage;

	public function __construct( GetMainScreenInfoAction $getMainScreenInfoAction ) {
		$this->frontPage = $getMainScreenInfoAction;
	}

	public function __invoke() {
		$hello = $this->frontPage->getHelloPhrase();
		return view( 'content/front-page.twig', compact( 'hello' ) );
	}
}
