<?php

declare(strict_types=1);

namespace Theme\Containers\FrontPageSection\Actions;

use Theme\Containers\FrontPageSection\Tasks\GetHelloWorld;

class GetMainScreen
{
	public function getHelloWorld() {
		return task( GetHelloWorld::class );
	}
}
