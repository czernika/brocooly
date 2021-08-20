<?php

declare(strict_types=1);

namespace Theme\Containers\PageSection\Tasks;

use Theme\Containers\PageSection\Contracts\Repositories\PageRepositoryContract;

class GetCurrentPageTask
{

	private $pageRepository;

	public function __construct( PageRepositoryContract $pageRepositoryContract )
	{
		$this->pageRepository = $pageRepositoryContract;
	}

	public function run() {
		$page = $this->pageRepository->current();
		return $page;
	}
}
