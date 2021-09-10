<?php

declare(strict_types=1);

namespace Theme\Containers\PageSection\Actions;

use Theme\Containers\PageSection\Tasks\GetCurrentPageTask;

class GetCurrentPageAction
{
	public function getCurrentPage() {
		return task( GetCurrentPageTask::class );
	}
}
