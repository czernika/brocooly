<?php

declare(strict_types=1);

namespace Theme\Containers\SearchSection\Tasks;

use Brocooly\Http\Request\WPRequest;

class GetSearchQueryTask
{
	public function run() {
		$searchQuery = WPRequest::getSearchQuery();
		return $searchQuery;
	}
}
