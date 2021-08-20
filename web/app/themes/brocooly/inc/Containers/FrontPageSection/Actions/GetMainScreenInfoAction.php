<?php

declare(strict_types=1);

namespace Theme\Containers\FrontPageSection\Actions;

use Theme\Containers\FrontPageSection\Tasks\GetMainScreenHelloPhrase;

class GetMainScreenInfoAction
{
	public function getHelloPhrase() {
		return task( GetMainScreenHelloPhrase::class );
	}
}
