<?php

declare(strict_types=1);

namespace Theme\Containers\FrontPageSection\Contracts\Actions;

interface GetMainScreenActionContract
{
	public function getHelloWorld() : string;
}
