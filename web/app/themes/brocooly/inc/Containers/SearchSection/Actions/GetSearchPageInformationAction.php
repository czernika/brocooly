<?php

declare(strict_types=1);

namespace Theme\Containers\SearchSection\Actions;

use Theme\Containers\SearchSection\Tasks\GetSearchQueryTask;

class GetSearchPageInformationAction
{
	public function getSearchQuery() {
		return task( GetSearchQueryTask::class );
	}
}
