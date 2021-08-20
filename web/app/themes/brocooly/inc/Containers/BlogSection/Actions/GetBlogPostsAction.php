<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Actions;

use Theme\Containers\BlogSection\Tasks\GetBlogTitleTask;
use Theme\Containers\BlogSection\Tasks\GetAllBlogPostsTask;
use Theme\Containers\BlogSection\Tasks\IsActiveSidebarTask;

class GetBlogPostsAction
{
	public function getBlogPosts() {
		return task( GetAllBlogPostsTask::class );
	}

	public function getBlogInformation() {
		$info = [
			'sidebar' => task( IsActiveSidebarTask::class ),
			'title'   => task( GetBlogTitleTask::class ),
		];
		return $info;
	}
}
