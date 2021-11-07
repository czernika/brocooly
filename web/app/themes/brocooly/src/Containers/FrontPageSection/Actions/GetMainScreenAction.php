<?php

declare(strict_types=1);

namespace Theme\Containers\FrontPageSection\Actions;

use Theme\Containers\FrontPageSection\Tasks\GetHelloWorld;
use Theme\Containers\FrontPageSection\Contracts\Actions\GetMainScreenActionContract;

class GetMainScreenAction implements GetMainScreenActionContract
{
	public function getHelloWorld() : string
	{
		$helloWorld = task( GetHelloWorld:s:class );
		return $helloWorld;
	}
}
