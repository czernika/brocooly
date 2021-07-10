<?php

declare(strict_types=1);

namespace Theme\Controllers;

use Brocooly\Router\View;
use Brocooly\Controllers\AbstractController;

class FrontPageController extends AbstractController
{
    public function __invoke() {
		View::make( 'index.twig' );
	}
}
